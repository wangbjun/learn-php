<?php
$arr   = [1, 4, 5, 6, 6, 2, 3, 4, 19];
$arr_k = [
    'a' => 1,
    'b' => 3,
    'c' => 9,
    'd' => 5,
    'e' => 4,
    'f' => 5,
];

//sort($arr);
//sort($arr_k);
uasort($arr, function ($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return $a > $b;
});
uasort($arr_k, function ($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return $a > $b;
});

var_dump($arr);
var_dump($arr_k);
