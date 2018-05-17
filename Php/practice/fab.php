<?php
function fab($num)
{
    $n = 0;
    $a = 0;
    $b = 1;
    $res = [];
    while ($n < $num) {
        $res[] = $b;
        $temp = $b;
        $b = $a + $b;
        $a = $temp;
        $n++;
    }

    return $res;
}


//var_dump(fab(10));

echo date('Y-m-d H:i:s', strtotime("-1 day"));
$file = './hello.txt';
$handle = fopen($file, 'r');
$content = "Hello World" . fread($handle, filesize($file));
$handle = fopen($file, 'w');
fwrite($handle, $content);
fclose($handle);

$dir = '/var/www/demo/Php';

//读取所有目录
function read_all_dir($dir)
{
    $result = array();
    $handle = opendir($dir);
    if ($handle) {
        while (($file = readdir($handle)) !== false) {
            if ($file != '.' && $file != '..') {
                $cur_path = $dir . DIRECTORY_SEPARATOR . $file;
                if (is_dir($cur_path)) {
                    $result['dir'][$cur_path] = read_all_dir($cur_path);
                } else {
                    $result['file'][] = $cur_path;
                }
            }
        }
        closedir($handle);
    }
    return $result;
}

var_dump(read_all_dir($dir));
