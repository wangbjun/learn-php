<?php
$totalPage = 100;
$url = "http://10.100.133.99/xhprof/index.php?page=1&ms=1000&day=7";
$file = "/home/jwang/Documents/xhprof.txt";
$fp = fopen($file, 'w+');
foreach (range(1, $totalPage) as $page) {
    $html = file_get_contents("http://10.100.133.99/xhprof/index.php?page=$page&ms=1000&day=7");
    preg_match_all("/<a .*>(.*)<\\/a>/", $html, $matches);
    if (isset($matches[1])) {
        foreach ($matches[1] as $match) {
            fwrite($fp, $match."\n");
        }
    }
}
fclose($fp);