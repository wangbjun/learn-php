<?php
set_time_limit(0);

$ip = '127.0.0.1';
$port = 8888;

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_bind($sock, $ip, $port);

socket_listen($sock, 512);

echo "Server Started, Listen On $ip:$port\n";

$global = [];


while (true) {
    $accept = socket_accept($sock);

    $buf = socket_read($accept, 8192);

    echo "Receive Msg： " . $buf . "\n";

    $params = json_decode($buf, true);
    $m = $params['m'];
    $a = $params['a'];
    $b = $params['b'];

    switch ($m) {
        case '+';
            $response = $a + $b;
            break;
        case '-';
            $response = $a - $b;
            break;
        case '*';
            $response = $a * $b;
            break;
        case '/';
            $response = $a / $b;
            break;
        default:
            $response = $a + $b;
    }

    socket_write($accept, $response, 8192);

    socket_close($accept);
}
