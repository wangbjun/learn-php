<?php
/**
 * 13
 * 1 + 9 = 10
 * 1 + 0 = 1
 *
 * 25
 * 4+25 = 29
 * 4+81 = 85
 * 64+25 = 89
 * 64+81 = 145
 * 1+16+25 = 42
 * 16+4 = 20
 * 4+0 = 4
 */

function luck($n)
{
    static $arr = [];

    if ($n <= 0) {
        return false;
    }
    if ($n == 1) {
        return true;
    }

    $index = 1;
    $sum = 0;
    $n = $n."";
    $c = strlen($n."");
    for ($i = 0;$i < $c;$i++) {
        $m = $n[$i];
        $sum += pow($m, 2);
    }
    if ($sum == 1) {
        return true;
    }
    $index++;
    if (isset($arr[$sum])) {
        return false;
    }else {
        $arr[$sum] = $index;
    }

    return luck($sum);
}

var_dump(luck(19));
var_dump(luck(29));
var_dump(luck(10));
var_dump(luck(25));