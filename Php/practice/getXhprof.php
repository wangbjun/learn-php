<?php
$totalPage = 27;   //总共多少页
$ms        = 5000; //多少毫秒
$day       = 3;    //多少天内，1,3,7天
$dir       = "/home/jwang/Documents/"; //保存位置

$file = $dir."xhprof.txt";
$fp = fopen($file, 'w+');
foreach (range(1, $totalPage) as $page) {
    $html = file_get_contents("http://10.100.133.99/xhprof/index.php?page=$page&ms=$ms&day=$day");
    preg_match_all("/<a .*>(.*)<\\/a>/", $html, $matches);
    if (isset($matches[1])) {
        foreach ($matches[1] as $match) {
            fwrite($fp, $match."\n");
        }
    }
}
fclose($fp);

$fp = file($file);
if (!$fp) {
    var_dump("文件读取失败!\n");
}

foreach ($fp as $key => $item) {
    $item = rtrim(parse_url(trim($item))['path'], "/");
    if (substr($item, 0, 1) != '/') {
        unset($fp[$key]);
        continue;
    }
    $fp[$key] = preg_replace("/\/\d+/", "/*", $item);
}

$res = array_count_values($fp);

uasort($res, function ($a, $b) {
    return $a < $b;
});
$saveFile = fopen($dir."xhprof_sort.txt", 'w+');

foreach ($res as $key => $value) {
    $key = trim($key);
    $str = sprintf("%-50s ===============> %s 次\n", $key, $value);
    fwrite($saveFile, $str);
}

fclose($saveFile);
