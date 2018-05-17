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