<?php

namespace IP;

require "MyIp.php";

$url = "https://ipip.yy.com/get_ip_info.php";
$ip = new MyIp($url);
$ip->setMailTo("wangbenjun@gmail.com");
$ip->run();
