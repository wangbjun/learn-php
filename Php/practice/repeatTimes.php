<?php
$file = "/home/jwang/Documents/xhprof.txt";
$fp = file($file);
if (!$fp) {
    var_dump("文件读取失败!\n");
}

$res = array_count_values($fp);

uasort($res, function ($a, $b) {
    return $a < $b;
});
$saveFile = fopen("/home/jwang/Documents/xhprof_sort.txt", 'w+');

foreach ($res as $key => $value) {
    fwrite($saveFile, trim($key)." =================> ".$value."次\n");
}

fclose($saveFile);
