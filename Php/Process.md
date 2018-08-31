PHP多进程

1.多开几个进程，这种方式简单实用，推荐，比如说使用shell脚本:
```
#!/bin/bash
 
for((i=1;i<=8;i++))
do    
    /usr/bin/php multiprocessTest.php &
done
 
wait
```

2.pcntl扩展

php多进程需要pcntl，posix扩展支持，可以通过 php -m 查看，而且多进程实现只能在cli模式下，虽然是个残废，不妨也了解一下, 实际上这些都是调用了Linux的系统API
举个例子：
```
<?php
foreach (range(1, 5) as $index) {
    $pid = pcntl_fork();
    if ($pid === -1) {
        echo "failed to fork!\n";
        exit;
    } elseif ($pid) {
        pcntl_wait($status); //父进程必须等待一个子进程退出后，再创建下一个子进程。
        echo "I am the parent, pid: $pid\n";
    } else {
        $cid = posix_getpid();
        echo "fork the {$index}th child, pid: $cid\n";
        exit; //必须
    }
}

```

这个例子非常简单，循环创建5个进程，在各个进程里面打印一句话，主要使用的方法就是函数 pcntl_fork，一次调用两次返回，在父进程中返回子进程pid，
在子进程中返回0，出错返回-1。

执行结果如下：
```
fork the 1th child, pid: 7326
I am the parent, pid: 7326
fork the 2th child, pid: 7327
I am the parent, pid: 7327
fork the 3th child, pid: 7328
I am the parent, pid: 7328
fork the 4th child, pid: 7329
I am the parent, pid: 7329
fork the 5th child, pid: 7330
I am the parent, pid: 7330
```
先解释一下为什么会产生10条打印结果，第一条结果是子进程打印的，第二条是在父进程打印的！

###第一个坑:
如果是在循环中创建子进程,那么子进程中最后要exit,防止子进程进入循环!

###第二个坑:
必须等待子进程执行完任务, 有一个简单方法是使用 pcntl_wait，如果不加这个你会发现一个是执行的顺序不固定，第二个就是创建的进程会少于5个,
但是加了你会发现这个完全变成并行了...上面的结果就是

然后找了找，发现下面这种写法：
```
<?php

$ids = [];

foreach (range(1, 5) as $index) {
    $ids[] = $pid = pcntl_fork();
    if ($pid === -1) {
        echo "failed to fork!\n";
        exit;
    } elseif ($pid) {
        echo "I am the parent, pid: $pid\n";
    } else {
        $cid = posix_getpid();
        echo "fork the {$index}th child, pid: $cid\n";
        exit;
    }
}

foreach ($ids as $i => $pid) {
    if ($pid) {
        pcntl_waitpid($pid, $status);
    }
}

```
结果如下：
```
fork the 1th child, pid: 8392
I am the parent, pid: 8392
I am the parent, pid: 8393
fork the 2th child, pid: 8393
I am the parent, pid: 8394
I am the parent, pid: 8395
I am the parent, pid: 8396
fork the 3th child, pid: 8394
fork the 4th child, pid: 8395
fork the 5th child, pid: 8396
```

找了一张图,大体解释了总体流程：

![](http://ww1.sinaimg.cn/large/005QvKRmly1fury9b76dqj30bn0j0t98.jpg)

说简单其实也挺简单，几行代码就可以写出一个多进程程序，实现并行编程，但是这里其实还有不少坑，比如僵尸进程，孤儿进程, 守护进程，具体的我也不太熟悉不多讲，再看一个关于进程信号的东西，
咱们项目里面也有用到，咱们项目里面有时候会用到一些脚本，比如处理redis队列的脚本，通常的做法是写一个while死循环一直从redis里面取数据处理，为了防止内存泄露或者假死，一般都会定时的杀掉脚本重启脚本，
但是杀的不好可能会导致数据丢失，举个例子，假如你这个脚本刚好从redis取了一条数据正在处理中，操作还未完成，你突然终止进程，那这个数据就丢失了。
至于说服务器挂掉这种情况毕竟不多见，真要解决这种问题还得从队列上入手。

```
<?php

//ctrl+c
pcntl_signal(SIGINT, function () {
    fwrite(STDOUT, "receive signal: " . SIGINT . " do nothing ...\n");
});

//kill
pcntl_signal(SIGTERM, function () {
    fwrite(STDOUT, "receive signal: " . SIGTERM . " I will exit!\n");
    exit;
});

while (true) {
    pcntl_signal_dispatch();
    echo "do something。。。\n";
    sleep(5);
}
```
![](http://ww1.sinaimg.cn/large/005QvKRmly1fusovdhwxqj30mh08dt9g.jpg)

Linux进程信号分为很多种，kill -l 可以查看，PHP里面定义了43种，咱就说说常用的几种：

SIGINT 2 这个其实相对于 ctrl+c

SIGTERM 15 就是 kill 默认的参数，表示终止信号，但是你发了信号程序不一定响应

SIGKILL 9 就是 kill -9, 表示立马终止，这个信号在PHP里面是无法注册的，所以一定能成功

看明白了这个就可以读懂上面的例子了，其中 pcntl_signal 是注册信号处理handler，第一个参数是你需要注册的信号，第二个是处理操作，可以是匿名函数或者一个函数名，可以注册多个信号。
pcntl_signal_dispatch 调用每个等待信号通过pcntl_signal() 安装的处理器。早期PHP还有一种写法是使用 ticks，性能非常差，php5.3之后建议都使用 pcntl_signal_dispatch。

说明一下：pcntl_signal()函数仅仅是注册信号和它的处理方法，真正接收到信号并调用其处理方法的是pcntl_signal_dispatch()函数必须在循环里调用，为了检测是否有新的信号等待dispatching。

上面的例子执行结果就是当你使用 ctrl+c 的话是无法终止程序的，只有使用 kill pid 这种形式才可以，但是并不是立马就退出，它是代码执行到循环顶部 pcntl_signal_dispatch 地方的时候才会退出，
这就保证了你使用kill杀掉进程的时候并不会丢失数据，说好听点这也算是平滑重启吧！

由于进程的系统开销比较大，一般不太适合拿来做大规模并发程序，拿来写个3-5个进程的后台脚本倒是有点用，下面就是我写的一个用来爬取xhprof的数据的脚本，
使用了3个进程同时爬取实战，路径，免费课的日志然后做统计根据出现次数排序！

```
<?php
define("TOTAL_PAGE", 100);   //总共多少页
define("MS", 2000);          //毫秒
define("DAY", 3);            //几天内
define("SAVE_DIR", "/home/jwang");   //保存目录

$servers = [
    'mkw' => '10.100.133.99',
    'sz'  => '10.100.135.23',
    'lj'  => '10.100.17.13',
];

$ids = [];

foreach ($servers as $key => $server) {
    $ids[] = $pid = pcntl_fork();
    if ($pid === -1) {
        echo "failed to fork!\n";
        exit;
    } elseif ($pid) {
    } else {
        download($server, $key);
    }
}

foreach ($ids as $i => $pid) {
    if ($pid) {
        pcntl_waitpid($pid, $status);
    }
}

function download($server, $fileName)
{
    $saveDir = SAVE_DIR;
    if (!is_dir(SAVE_DIR)) {
        $saveDir = __DIR__;
    }

    $file = $saveDir . "/xhprof_{$fileName}_tmp.txt";
    $fp   = fopen($file, 'w+');
    foreach (range(1, TOTAL_PAGE) as $page) {
        print_r("### " . date('Y-m-d H:i:s') . ": 正在爬取 $server -> $fileName 第 $page 页...\n");
        try {
            $html = file_get_contents("http://{$server}/xhprof/index.php?page={$page}&ms=" . MS . "&day=" . DAY);
        } catch (Exception $exception) {
            var_dump("网络请求失败!\n");
            exit;
        }
        if (!$html) {
            var_dump("网络请求失败!\n");
            exit;
        }

        preg_match_all("/<a .*>(.*)<\\/a>/", $html, $matches);
        if (isset($matches[1])) {
            if (count($matches[1]) <= 3) {
                break;
            }
            foreach ($matches[1] as $match) {
                fwrite($fp, $match . "\n");
            }
        }
    }
    fclose($fp);
    print_r("### " . date('Y-m-d H:i:s') . ": 爬取完成，开始处理数据...\n");
    print_r("---------------------------------------------------------- \n");
    $fp = file($file);
    if (!$fp) {
        var_dump("文件读取失败!\n");
    }

    foreach ($fp as $key => $item) {
        $item = rtrim(parse_url(trim($item))['path'], "/");
        if (substr($item, 0, 1) != '/') {
            unset($fp[$key]);
            continue;
        }
        $fp[$key] = preg_replace("/\/\d+/", "/*", $item);
    }

    $res = array_count_values($fp);

    uasort($res, function ($a, $b) {
        return $a < $b;
    });
    $saveFile = fopen($saveDir . "/xhprof_{$fileName}.txt", 'w+');

    foreach ($res as $key => $value) {
        $key = trim($key);
        $str = sprintf("%-50s ===============> %s 次\n", $key, $value);
        fwrite($saveFile, $str);
    }

    fclose($saveFile);
    unlink($file);
    exit;
}
```
最后还忘记说了一个坑，在子进程里面使用mysql 或者 redis 这类程序有个bug，假如你使用的是单例模式的话，这个连接被多个子进程使用就会出问题，
所以如果要使用，必须在各个子进程内部新建一个连接！