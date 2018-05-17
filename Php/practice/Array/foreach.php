<?php

$data = [1, 2, 3];
foreach ($data as $key => $value) {
    $value = &$data[$key];
}
var_dump($data);
$len = count($data);
for ($i = 0; $i < $len; $i++) {
    echo $data[$i] . ',';
}
echo "\n===============================\n";
//list each 遍历数组
reset($data);
while (list($a, $b) = each($data)) {
    echo $a . "=>" . $b . "\n";
}

function getFunc()
{
    global $data;
    //静态变量是局部变量，只初始化一次，递归调用退出
    static $a = 1;
//    var_dump($data);
    var_dump($GLOBALS['data']);
    print_r($data);
//    var_dump($GLOBALS);
    echo $a++;
}

$ser = serialize(getFunc());
print_r($ser);

getFunc();
