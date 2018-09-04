<?php

class LeakyBucketDemo
{
    private static $time;
    private static $water;
    private static $size;
    private static $rate;

    public function __construct()
    {
        self::$time  = time();
        self::$water = 0;
        self::$size  = 10;
        self::$rate  = 3;
    }

    public function grant()
    {
        $now = time();
        $out = intval(($now - self::$time) / 0.8 * self::$rate);

        self::$water = max(0, self::$water - $out);
        if (self::$water + 1 <= self::$size) {
            ++self::$water;
            return true;
        } else {
            return false;
        }
    }
}

$demo = new LeakyBucketDemo();

foreach (range(1, 1000) as $item) {
    if ($demo->grant()) {
        echo "执行业务逻辑成功！ --- $item\n";
    } else {
        echo "限流！ --- $item\n";
    }
}
