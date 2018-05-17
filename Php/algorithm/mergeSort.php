<?php

$arr = [91, 12, 3, 5, 9, 10, 34, 55];

//系统自带函数
//sort($arr);
$temp = [];

$arr = mergeSort($arr, 0, count($arr) - 1, $temp);

var_dump($arr);
var_dump(binarySearch(34, $arr, 0, count($arr) - 1));

//选择排序
function mergeSort(array &$arr, int $left, int $right, array $temp)
{
    if ($left < $right) {
        $mid = ($left + $right) / 2;
        mergeSort($arr, $left, $mid, $temp);
        mergeSort($arr, $mid + 1, $right, $temp);
        mergeArray($arr, $left, $mid, $right, $temp);
    }

    return $arr;
}

function mergeArray(array &$arr, int $left, int $mid, int $right, array $temp)
{
    $i = $left;//左序列指针
    $j = $mid + 1;//右序列指针
    $t = 0;//临时数组指针
    while ($i <= $mid && $j <= $right) {
        if ($arr[$i] <= $arr[$j]) {
            $temp[$t++] = $arr[$i++];
        } else {
            $temp[$t++] = $arr[$j++];
        }
    }
    while ($i <= $mid) {//将左边剩余元素填充进temp中
        $temp[$t++] = $arr[$i++];
    }
    while ($j <= $right) {//将右序列剩余元素填充进temp中
        $temp[$t++] = $arr[$j++];
    }
    $t = 0;
    //将temp中的元素全部拷贝到原数组中
    while ($left <= $right) {
        $arr[$left++] = $temp[$t++];
    }
}

//二分查找
function binarySearch($target, array $arr, $start, $end)
{
    if ($start <= $end) {
        $mid = floor(($start + $end) / 2);
        if ($arr[$mid] == $target) {
            return $mid;
        } elseif ($arr[$mid] > $target) {
            return binarySearch($target, $arr, $start, $mid - 1);
        } elseif ($arr[$mid] < $target) {
            return binarySearch($target, $arr, $mid + 1, $end);
        } else {
            return false;
        }
    } else {
        return false;
    }
}
