<?php
$file = "/home/jwang/Documents/xhprof.txt";
$fp = file($file);
if (!$fp) {
    var_dump("文件读取失败!\n");
}

foreach ($fp as $key => $item) {
    $item = parse_url(trim($item))['path'];
    $fp[$key] = preg_replace("/\/\d+/", "/*", $item);
}

$res = array_count_values($fp);

uasort($res, function ($a, $b) {
    return $a < $b;
});
$saveFile = fopen("/home/jwang/Documents/xhprof_sort.txt", 'w+');

foreach ($res as $key => $value) {
    $key = trim($key);
    fwrite($saveFile, $key." =================> ".$value."次\n");
}

fclose($saveFile);
