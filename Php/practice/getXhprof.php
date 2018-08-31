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
