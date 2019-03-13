<?php

// 二分查找
function binarySearch($arr, $value)
{
    $len = count($arr);
    $left = 0;
    $right = $len - 1;

    while ($left <= $right) {
        $mid = floor(($right + $left) / 2);
        if ($value > $arr[$mid]) {
            $left = $mid + 1;
        } elseif ($value < $arr[$mid]) {
            $right = $mid - 1;
        } else {
            return $mid;
        }
    }

    return -1;
}

function binarySearch2($arr, $n, $value)
{
    if ($n <= 1) {
        return -1;
    }
    $mid = intval($n / 2);

    if ($value > $arr[$mid]) {
        return binarySearch2($arr, $n + 1, $value);
    } elseif ($value < $arr[$mid]) {
        return binarySearch2($arr, $n - 1, $value);
    } else {
        return $mid;
    }
}


$arr = [1, 2, 12, 23, 29, 78, 100];

var_dump(binarySearch($arr, 78));
var_dump(binarySearch2($arr,count($arr), 78));