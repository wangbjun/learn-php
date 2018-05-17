<?php

namespace App\Core;

use Exception;

class App
{
    protected static $register = [];

    public static function bind($key, $value)
    {
        static::$register[$key] = $value;
    }

    public static function get($key)
    {
        if (array_key_exists($key, static::$register)) {
            return static::$register[$key];
        }
        throw new Exception("No register {$key} found !");
    }
}
