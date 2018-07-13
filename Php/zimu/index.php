<?php
$file = file_get_contents('fy.txt');

$file = json_decode($file, true);

$output = fopen('fy.srt', 'w+');
foreach ($file as $key => $item) {
    $start = formatSrt($item['bg']);
    $end   = formatSrt($item['ed']);
    fwrite($output, $key + 1);
    fwrite($output, "\n");
    fwrite($output, $start . " --> " . $end . "\n");
    fwrite($output, $item['onebest'] . "\n\n");
}
fclose($output);

function formatSrt($time)
{
    if ($time < 1000) {
        return "00:00:00,$time";
    }
    $s  = intval($time / 1000);
    $sl = $time % 1000;
    if ($s < 60) {
        if ($s < 10) {
            $s = "0$s";
        }
        return "00:00:$s,$sl";
    }
    $m  = intval($s / 60);
    $ml = $s % 60;
    if ($m < 60) {
        if ($m < 10) {
            $m = "0$m";
        }
        return "00:$m:$ml,$sl";
    }
    $h  = intval($m / 60);
    $hl = $m % 60;
    if ($h < 60) {
        if ($h < 10) {
            $h = "0$h";
        }
        return "$h:$hl:$m,$sl";
    }
}
