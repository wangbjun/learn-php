<?php
namespace demo;

set_time_limit(0);
$port = 1935;
$ip = '127.0.0.1';

/*
+-------------------------------
*    @socket连接整个过程
+-------------------------------
*    @socket_create
*    @socket_connect
*    @socket_write
*    @socket_read
*    @socket_close
+--------------------------------
*/
if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
    echo "socket_create() failed: reason: " . socket_strerror($sock);
}
echo "正在连接{$ip},端口{$port}\r\n";

if (($ret = socket_connect($sock, $ip, $port)) < 0) {
    echo "socket_connect 连接失败" . socket_strerror($sock);
}

$in = "Hello World Socket";

if (!socket_write($sock, $in, strlen($in))) {
    echo "socket_write() failed: reason: " . socket_strerror($sock);
    echo "\r\n";
} else {
    echo "发送到服务器信息成功！\r\n";
    echo "发送的内容为:{$in}\r\n";
}

$out = socket_read($sock, 8192);
echo "接收服务器消息成功！\r\n";
echo "接收内容为{$out}\r\n";
echo "关闭socket\r\n";
socket_close($sock);
