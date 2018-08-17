####PHP中闭包的应用案例

一. 什么是闭包？

先卡卡百度百科的介绍：

>闭包包含自由（未绑定到特定对象）变量，这些变量不是在这个代码块内或者任何全局上下文中定义的，而是在定义代码块的环境中定义（局部变量）。
“闭包” 一词来源于以下两者的结合：要执行的代码块（由于自由变量被包含在代码块中，这些自由变量以及它们引用的对象没有被释放）和为自由变量提供绑定的计算环境（作用域）。
在PHP、Scala、Scheme、Common Lisp、Smalltalk、Groovy、JavaScript、Ruby、 Python、Go、Lua、objective c、swift 以及Java（Java8及以上）等语言中都能找到对闭包不同程度的支持。

说实话，这个介绍虽然专业，但是有点僵硬不太容易理解，闭包是一种设计思想，而不是一种语法特性，在PHP语言里面，匿名函数就是闭包的一种实现。

二.匿名函数

这个我相信大家都多多少少用过，看一下代码：
```
$f = function () {
    $a = 1;
    $b = 2;
    return $a + $b;
};
var_dump($f);
```
输出结果是：
```
class Closure#1 (0) {
}
```
可见，PHP中匿名函数就是闭包，也可以理解为闭包就是把这个函数赋值给一个变量，这时候这个变量保存的就是这个函数的内存地址。

如何去调用这个闭包函数呢？很简单，在这个例子里面只要 **$f()** 就可以了
```
var_dump($f()); #结果是：3
```

当然这个匿名函数也是可以传参的，你可以这样写：
```
$f = function ($c) {
    $a = 1;
    $b = 2;
    return $a + $b + $c;
};
```
这样你在调用的时候就可以传入参数，类似 **$f(3)**, 但是有一点需要注意，如果这时候你想在定义闭包函数的时候使用外部变量，举个例子
```
$out = 100;
$f = function ($c) {
    $a = 1;
    $b = 2;
    return $out - ($a + $b + $c); #报错，无法引用外部变量out
};
```
这时候就体现了闭包封闭的特性，但是PHP提供了一个 use 关键字，可以使用下面这个写法：
```
$out = 100;
$f = function ($c) use ($out) {
    $a = 1;
    $b = 2;
    return $out - ($a + $b + $c);
};
```

三.闭包到底有啥用？

一般来说还是在框架以及一些架构设计里面会用到，这里先举2个小例子：
```
$arr = [1, 2, 3, 4, 5];

//使用array_reduce求和

function sum($arr)
{
    return array_reduce($arr, function ($x, $y) {
        return $x + $y;
    });
}

var_dump(sum($arr));
```
代码里面使用了 array_reduce 这个函数求一个数组的和，但是，如果不需要立刻求和，而是在后面的代码中，根据需要再计算怎么办？可以不返回求和的结果，而是返回求和的函数！
```
function lazySum($arr)
{
    return function () use ($arr) {
        return array_reduce($arr, function ($x, $y) {
            return $x + $y;
        });
    };
}
$sum = lazySum($arr);
var_dump($sum());
```
结果是一样的，虽然这种写法有点奇怪

---

有一道面试题就涉及到了闭包的特性：
```
function plus()
{
    $funcArr = [];
    for ($i = 1; $i <= 3; $i++) {
        $funcArr[] = function () use (&$i) {
            return $i * $i;
        };
    }
    return $funcArr;
}

$res = plus();

var_dump($res[0]());
var_dump($res[1]());
var_dump($res[2]());
```
plus 函数会返回3个闭包函数，然后依次调用这个几个函数, 有人以为结果可能是1,4,9，其实结果都是16，需要注意的是use $i 那里使用的是引用传递，
这就意味着在生成这3个闭包函数的时候$i的值并不是循环的时候的1,2,3，而且到最后 $i++ 之后的值也就是 4，这说明闭包函数是调用的时候才会执行。


四.闭包在PHP框架里面使用

1.一个是IOC容器
```
<?php

/**
 * 闭包的使用IOC
 * Class Container
 */
class Container
{
    protected static $bindings;

    public static function bind(string $abstract, Closure $concrete)
    {
        static::$bindings[$abstract] = $concrete;
    }

    public static function make(string $abstract)
    {
        return call_user_func(static::$bindings[$abstract]);
    }
}


class talk
{
    public function greet($target)
    {
        echo "Hello " . $target->getName();
    }
}

class say
{
    public function getName()
    {
        return "World\n";
    }
}

$talk = new talk();

Container::bind('foo', function () {
    return new say();
});

$talk->greet(Container::make('foo'));

```
接触过laravel框架的应该都见过这种写法，laravel框架称之为服务容器，其设计思想基本上就是这样，也就是在框架初始化的时候注册绑定一堆服务，然后框架里面随时就可以调用这些服务了。


2.闭包路由
```
/**
 * 演示闭包的使用,路由
 * Class App
 */
class App
{
    protected $routes = [];
    protected $responseStatus = '200 OK';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hello World';

    public function addRoute(string $path, Closure $callback)
    {
        $this->routes[$path] = $callback->bindTo($this, __CLASS__);
    }

    public function dispatch(string $path)
    {
        foreach ($this->routes as $routePath => $callback) {
            if ($routePath === $path) {
                $callback();
            }
        }
        header('HTTP/1.1 ' . $this->responseStatus);
        header('Content-Type: ' . $this->responseContentType);
        header('Content-Length: ' . mb_strlen($this->responseBody));
        echo $this->responseBody;
    }

}
```
```
require 'App.php';

$app = new App();

$app->addRoute("/", function () {
    $this->responseBody = "Hello Closure!\n";
});

$app->dispatch("/");
```