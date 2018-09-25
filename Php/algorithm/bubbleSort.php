<?php

require_once 'arr.php';

bubbleSort($arr);
//bubbleSort2($arr);

printArr($arr);

//冒泡排序
function bubbleSort(&$arr)
{
    $len  = count($arr);
    $flag = true;
    for ($i = 1; $i < $len && $flag; $i++) {
        $flag = false;
        for ($k = $i + 1; $k < $len; $k++) {
            if ($arr[$i] > $arr[$k]) {
                swap($arr[$i], $arr[$k]);
                $flag = true;
            }
        }
    }
}

function bubbleSort2(&$arr)
{
    $len  = count($arr);
    $flag = true;
    for ($i = 1; $i < $len && $flag; $i++) {
        $flag = false;
        for ($k = $len - 2; $k >= $i; $k--) {
            if ($arr[$k] > $arr[$k + 1]) {
                swap($arr[$k], $arr[$k + 1]);
                $flag = true;
            }
        }
    }
}
