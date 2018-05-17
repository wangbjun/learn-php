<?php

namespace SPL;

$fixArr    = new \SplFixedArray(10);
$fixArr[0] = 1;
$fixArr[1] = 2;
$fixArr[2] = 3;

foreach ($fixArr as $value) {
    echo $value . "\n";
}
