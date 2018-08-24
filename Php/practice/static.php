<?php
/**
 * 静态变量可以当缓存
 */
function staticTest()
{
    static $arr = [];
    if (empty($arr)) {
        var_dump("init arr\n");
        $arr = [1, 2, 3, 4, 5];
    }
    var_dump($arr);
}

foreach (range(1, 10) as $item) {
    staticTest();
}
