<?php

namespace Nothing;

/**
 * 模拟队列
 * Class Deque
 * @package Nothing
 */
class Deque
{
    private $queue = [];

    public function addFirst($item)
    {
        return array_unshift($this->queue, $item);
    }

    public function addLast($item)
    {
        return array_push($this->queue, $item);
    }

    public function removeFirst()
    {
        return array_shift($this->queue);
    }

    public function removeLast()
    {
        return array_pop($this->queue);
    }

    public function bubbleSort($arr, $flag = "asc")
    {
        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len - $i - 1; $j++) {
                if ($flag == "asc") {
                    $compare = $arr[$j] > $arr[$j + 1];
                } else {
                    $compare = $arr[$j] < $arr[$j + 1];
                }
                if ($compare) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }

        print_r($arr);
    }

    public function binSch($array, $low, $high, $k)
    {
        if ($low <= $high) {
            $mid = intval(($low + $high) / 2);
            if ($array[$mid] == $k) {
                return $mid;
            } elseif ($k < $array[$mid]) {
                return $this->binSch($array, $low, $mid - 1, $k);
            } else {
                return $this->binSch($array, $mid + 1, $high, $k);
            }
        }

        return -1;
    }
}


$deque = new Deque();
$deque->bubbleSort([1, 7, 2, 9, 3, 15], "asc");
$res = $deque->binSch([1, 3, 5, 6, 77, 84], 0, 5, '12');
var_dump($res);
