<?php

$arr = [91, 12, 3, 5, 9, 10, 34, 55];

//系统自带函数
//sort($arr);

insertionSort($arr);

var_dump($arr);

//插入排序
function insertionSort(&$arr)
{
    $len = count($arr);

    for ($i = 1; $i < $len; $i++) {
        if ($arr[$i - 1] > $arr[$i]) {
            $temp = $arr[$i];
            $j = $i;
            while ($j > 0 && $arr[$j - 1] > $temp) {
                $arr[$j] = $arr[$j - 1];
                $j--;
            }
            $arr[$j] = $temp;
        }
    }
}
