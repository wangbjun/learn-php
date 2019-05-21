<?php
namespace demo;

set_time_limit(0);

$port = 8888;
$ip = '127.0.0.1';

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

echo "Connecting $ip:$port\n";

socket_connect($sock, $ip, $port);

$input = "Hello World Socket";

socket_write($sock, $input, strlen($input));

$out = socket_read($sock, 8192);

echo "Receive Msg: $out\n";

socket_close($sock);
