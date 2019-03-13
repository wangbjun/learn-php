<?php

// 反转数组
function reverse(&$arr)
{
    $len = count($arr);

    for ($i = 0; $i < $len / 2; $i++) {
        list($arr[$i], $arr[$len - $i - 1]) = [$arr[$len - $i - 1], $arr[$i]];
    }
}

$arr = [1, 6, 1, 23, 15, 45];

reverse($arr);

var_dump($arr);

// 反转字符串
function reverseStr(&$str)
{
    $len = strlen($str);

    for ($i = 0; $i < $len / 2; $i++) {
        list($str[$i], $str[$len - $i - 1]) = [$str[$len - $i - 1], $str[$i]];
    }
}

$str = "abd214ts";

reverseStr($str);

var_dump($str);