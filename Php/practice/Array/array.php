<?php
$arr1 = [10, 2, 5, 7, 9, 13];
//$arr2 = ['a', 'c', 'd'];
//var_dump(array_combine($arr1, $arr2));
//1.系统函数
//echo max($arr1);

//2.自定义函数
function getMax($arr)
{
    $max = 0;
    for ($i=0; $i < count($arr); $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    return $max;
}
echo getMax($arr1);
echo "\n-----------------\n";

//3.array_reduce函数
echo array_reduce($arr1, function ($a, $b) {
    return $a > $b ? $a : $b;
});
echo "\n-----------------\n";
//4.排序
sort($arr1);
print_r($arr1);
echo "\n++++++++++++++++++\n";
$request_url = "age=1";
list($key, $val) = explode('=', $request_url);
var_dump($key, $val);

echo "\n++++++++++++++++++\n";

require "Person.php";
$p = new Person();
$p->say();
var_dump($p);
