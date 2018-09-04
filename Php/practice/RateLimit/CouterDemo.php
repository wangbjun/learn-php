<?php

class CouterDemo
{
    private static $timestamp;
    private $limitCount;
    private $interVal;
    private static $reqCount;

    public function __construct()
    {
        self::$timestamp  = time();
        $this->limitCount = 100;
        $this->interVal   = 1;
        self::$reqCount   = 0;
    }

    public function grant()
    {
        $now = time();
        if ($now < self::$timestamp + $this->interVal) {
            if (self::$reqCount < $this->limitCount) {
                ++self::$reqCount;
                return true;
            } else {
                return false;
            }
        } else {
            self::$timestamp = time();
            self::$reqCount  = 0;
            return false;
        }
    }
}

$demo = new CouterDemo();

foreach (range(1, 1000) as $item) {
    if ($demo->grant()) {
        echo "执行业务逻辑成功！ --- $item\n";
    } else {
        echo "限流！ --- $item\n";
    }
    usleep(1000);
}
