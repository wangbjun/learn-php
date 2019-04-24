<?php
$urls = [
    'https://www.baidu.com',
    "https://www.mi.com",
    "https://www.qingyidai.com"
];

$ids = [];

foreach ($urls as $url) {
    $ids[] = $pid = pcntl_fork();
    if ($pid === -1) {
        echo "failed to fork!\n";
        exit;
    } elseif ($pid) {
    } else {
        echo "start get url: ".$url."\n";
        crawler($url);
        exit;
    }
}

//爬取网页，取出网页标题
function crawler($url)
{
    $content = file_get_contents($url);

    preg_match("/<title>(.*)<\/title>/", $content, $matches);

    echo $matches[1]."\n";
}

foreach ($ids as $i => $pid) {
    if ($pid) {
        pcntl_waitpid($pid, $status);
    }
}