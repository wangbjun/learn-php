<?php
$a = "hello";
$b = &$a;
unset($b);
$b = "world";
echo $a, $b;
echo $a, $b;
echo $a, $b;