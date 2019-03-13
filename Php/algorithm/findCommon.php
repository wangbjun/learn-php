<?php
// 两个有序int集合相同元素的最优算法
/**
 * @param $arr1 [1,5,7,8,10]
 * @param $arr2 [2,4,5,9,11]
 * @return array
 */
function findCommon($arr1, $arr2)
{
    $common = [];
    $i = $j = 0;
    $count1 = count($arr1);
    $count2 = count($arr2);

    while ($i < $count1 && $j < $count2) {
        if ($arr1[$i] < $arr2[$j]) {
            $i++;
        }elseif ($arr1[$i] > $arr2[$j]) {
            $j++;
        }else {
            $common[] = $arr1[$i];
            $i++;
            $j++;
        }
    }

    return array_unique($common);
}


$arr1 = [1,5,9,11,12];
$arr2 = [2,3,4,9,11];

var_dump(findCommon($arr1, $arr2));

var_dump(array_intersect($arr1, $arr2));