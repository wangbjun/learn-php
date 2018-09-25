<?php

require_once 'arr.php';

selectionSort($arr);

printArr($arr);

//选择排序
function selectionSort(&$arr)
{
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        $min_key = $i;
        for ($k = $i + 1; $k < $len; $k++) {
            if ($arr[$k] < $arr[$min_key]) {
                $min_key = $k;
            }
        }
        //如果找到更小的值则交换位置
        if ($min_key != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$min_key];
            $arr[$min_key] = $temp;
        }
    }
}
