<?php

namespace App\bitmap;

class Bitmap
{
    const MAX    = 10000;
    const SHIFT  = 5;
    const MASK   = 0x1F;
    const DIGITS = 32;

    private $bits = [];

    public function __construct()
    {
        $len = 1 + self::MAX / self::DIGITS;
        for ($i = 0; $i < $len; $i++) {
            $this->bits[$i] = 0;
        }
    }

    public function set(int $n)
    {
        $key = $n >> self::SHIFT;
        $value = $this->bits[$n >> self::SHIFT] | (1 << ($n & self::MASK));
        $this->bits[$key] = $value;
    }

    public function clear(int $n)
    {
        $this->bits[$n >> self::SHIFT] &= (~(1 << ($n & self::MASK)));
    }

    public function test(int $n)
    {
        return $this->bits[$n >> self::SHIFT] & (1 << ($n & self::MASK));
    }
}

$bitmap = new Bitmap();

for ($i = 0; $i < Bitmap::MAX; $i++) {
    $bitmap->clear($i);
}

$exampleData = [100, 23, 34, 5454, 1, 677, 834, 123, 355, 6784, 2345, 98, 9782, 432, 2342, 872, 732, 2334];
foreach ($exampleData as $item) {
    $bitmap->set($item);
}

for ($i = 1; $i <= Bitmap::MAX; $i++) {
    if ($bitmap->test($i)) {
        printf("%d ", $i);
    }
}
