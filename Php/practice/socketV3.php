<?php
set_time_limit(0);

$ip = '127.0.0.1';
$port = 8888;

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

socket_bind($sock, $ip, $port);

socket_listen($sock, 4);

echo "Server Started, Listen On $ip:$port\n";

socket_set_nonblock($sock);

$clients = [];

while (true) {
    $rs = array_merge([$sock], $clients);
    $ws = [];
    $es = [];

    $ready = socket_select($rs, $ws, $es, 3);
    if (!$ready) {
        continue;
    }

    if (in_array($sock, $rs)) {
        $clients[] = socket_accept($sock);
        $key = array_search($sock, $rs);
        unset($rs[$key]);
    }

    foreach ($rs as $client) {
        $input = socket_read($client, 8096);
        if ($input == null) {
            $key = array_search($client, $clients);
            unset($clients[$key]);
            continue;
        }
        echo "input: " . $input;

        //解析参数，计算结果
        preg_match("/(\d+)(\W)(\d+)/", $input, $params);
        if (count($params) === 4) {
            $a = intval($params[1]);
            $b = intval($params[3]);
            $m = $params[2];
        } else {
            continue;
        }

        switch ($m) {
            case '+';
                $result = $a + $b;
                break;
            case '-';
                $result = $a - $b;
                break;
            case '*';
                $result = $a * $b;
                break;
            case '/';
                $result = $a / $b;
                break;
            default:
                $result = $a + $b;
        }

        $output = "output: $result\n";
        echo $output;
        socket_write($client, $output, strlen($output));
    }
}
