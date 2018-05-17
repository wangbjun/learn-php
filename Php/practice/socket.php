<?php
namespace demo;

set_time_limit(0);
$ip = '127.0.0.1';
$port = 1935;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
    echo "socket create 失败，原因是：" . socket_strerror($sock) . "\n";
}

if (($ret = socket_bind($sock, $ip, $port)) < 0) {
    echo "socket bind 失败，原因是：" . socket_strerror($ret) . "\n";
}


if (($ret = socket_listen($sock, 4)) < 0) {
    echo "socket listen 失败，原因是：" . socket_strerror($ret) . "\n";
}
$count = 0;
echo "正在监听 $ip:$port ...\n";


do {
    if (($msgSock = socket_accept($sock)) < 0) {
        echo "socket accept 失败，原因是：" . socket_strerror($msgSock) . "\n";
    } else {
        $msg = "Socket.php 测试成功！\n";
        socket_write($msgSock, $msg, 8192);
        echo "测试写入成功\n";
        $buf = socket_read($msgSock, 8192);
        $tallBack = "收到的信息：" . $buf . "\n";
        echo $tallBack;
        if (++$count >= 5) {
            break;
        }
    }

} while (true);

socket_close($sock);
