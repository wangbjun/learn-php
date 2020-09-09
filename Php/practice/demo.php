<?php
$a = "hello";
$b = &$a;
unset($b);
$b = "world";
echo $a, $b;
echo $a, $b;
echo $a, $b;

echo "\n";

echo "before do\n";
doSomething();
echo "after do\n";


function doSomething()
{
    pow(2,10);
    echo "doSomething\n";
    return;
}