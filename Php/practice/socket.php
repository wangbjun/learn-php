<?php

namespace demo;

set_time_limit(0);

$ip = '127.0.0.1';
$port = 8888;

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);


socket_bind($sock, $ip, $port);

socket_listen($sock, 4);

echo "Server Started, Listen On $ip:$port\n";

while (true) {
    $accept = socket_accept($sock);

    $buf = socket_read($accept, 8192);

    echo "Receive Msg： " . $buf . "\n";

    $response = "HTTP/1.1 200 OK\r\n";
    $response .= "Server: Socket-Http\r\n";
    $response .= "Content-Type: text/html\r\n";
    $response .= "Content-Length: 13\r\n\r\n";
    $response .= "Hello World!\n";

    socket_write($accept, $response, 8192);

    socket_close($accept);
}
