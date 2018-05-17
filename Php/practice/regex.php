<?php
$str = '<b>123456</b>';
$pattern = '/[0-9]/';
$res = preg_replace($pattern, '', $str);
var_dump($res);

$chinese = "中文匹配";
$pattern = '/[\x{4e00}-\x{9fa5}]+/u';
preg_match($pattern, $chinese, $res);
var_dump($res);

preg_match('/^139\d{8}$/', '13912311235', $match);
var_dump($match);

//匹配img标签里面的src值
$str = '<img id="" class="" src="http://iiifood.cn/logo.jpg" />';
$pattern = '/^<img.*?src="(.*)".*?\/?>$/i';
preg_match($pattern, $str, $match);
var_dump($match);
