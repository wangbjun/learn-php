<?php
/**
 * 并行请求
 * @param array $urls
 * @return array
 */
function multiRequest(array $urls)
{
    if (!is_array($urls) && is_string($urls)) {
        $urls[] = $urls;
    }

    $ch = [];
    $mh = curl_multi_init();
    $res = [];

    foreach ($urls as $k => $url) {
        $ch[$k] = curl_init($url);
        curl_setopt($ch[$k], CURLOPT_HEADER, 0);
        curl_setopt($ch[$k], CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch[$k], CURLOPT_TIMEOUT, 3);
        curl_multi_add_handle($mh, $ch[$k]);
    }

    $active = null;

    do {
        curl_multi_exec($mh, $active);
        curl_multi_select($mh);
    } while ($active > 0);

    foreach ($ch as $k => $v) {
        $res[] = curl_multi_getcontent($v);
        curl_multi_remove_handle($mh, $v);
    }

    curl_multi_close($mh);

    return $res;
}


$res = multiRequest(['http://www.baidu.com', 'http://www.immoc.com']);
$reg = "/.?<meta\s?(.+?)\s?\/?>/";

foreach ($res as $k => $v) {
    $matches[] = preg_match_all($reg, $v, $matches);
    $res[$k] = $matches[1];
}

var_dump($res);


