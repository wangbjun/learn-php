<?php

$arr = [1, 12, 3, 5, 9, 10, 34, 55];

//系统自带函数
//sort($arr);

bubbleSort($arr);

var_dump($arr);

//冒泡排序
function bubbleSort(&$arr)
{
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        $swapCounter = 0;
        for ($k = 0; $k < $len - 1; $k++) {
            if ($arr[$k] > $arr[$k + 1]) {
                $temp = $arr[$k];
                $arr[$k] = $arr[$k + 1];
                $arr[$k + 1] = $temp;
                $swapCounter++;
            }
        }
        if ($swapCounter == 0) {
            break;
        }
    }
}
