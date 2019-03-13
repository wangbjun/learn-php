<?php

// 将一个数组中的元素随机（打乱）

function myShuffle(&$arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        $randIndex = mt_rand(0, $len-1);
        list($arr[$i], $arr[$randIndex]) = [$arr[$randIndex], $arr[$i]];
    }
}


$arr = [91,46,1,41,23,45];

myShuffle($arr);

var_dump($arr);

function get_king_monkey($m, $n)
{
    $arr = range(1, $m);

    $i = 0;

    while (count($arr) > 1) {
        $i++;
        $s = array_shift($arr);
        if ($i % $n != 0) {
            array_push($arr, $s);
        }
    }

    return $arr[0];
}


var_dump(get_king_monkey(9, 2));