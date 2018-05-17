<?php

namespace DesignPattern\Demo_03;

class Simple
{
    private static $instance;

    private static $count;

    private function __construct()
    {
        static::$count++;
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function sayHello()
    {
        echo "Hello";
    }

    public function getCount()
    {
        return static::$count;
    }
}
