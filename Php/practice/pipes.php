<?php

interface Step
{
    public static function go(Closure $next);
}

class FirstStep implements Step
{
    public static function go(Closure $next)
    {
        echo "开启session，获取数据\n";
        $next();
        echo "保存数据，关闭session\n";
    }
}

class SecondStep implements Step
{
    public static function go(Closure $next)
    {
        echo "开始效验，检测数据\n";
        $next();
        echo "保存数据，关闭校验\n";
    }
}

class ThirdStep implements Step
{
    public static function go(Closure $next)
    {
        echo "开始提取数据\n";
        $next();
        echo "提取数据完毕\n";
    }
}

function goFun($step, $className)
{
    return function () use ($step, $className) {
        return $className::go($step);
    };
}

function then()
{
    $steps   = ['FirstStep', 'SecondStep', 'ThirdStep'];
    $prepare = function () {
        echo "请求向路由器传递，返回响应\n";
    };
    call_user_func(array_reduce(array_reverse($steps), "goFun", $prepare));
}

then();