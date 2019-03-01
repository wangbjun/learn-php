<?php
$arr = [1, 12, 3, 5, 9, 10, 34, 55, 99, 10];

function printArr($arr)
{
    $str = '[';
    foreach ($arr as $key) {
        $str .= $key . ',';
    }

    $str = trim($str, ',') . ']';

    echo $str . "\n";
}

function swap(&$a, &$b)
{
    list($b, $a) = [$a, $b];
}
