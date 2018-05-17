<?php
$redis = new Redis();
$redis->connect('localhost', 6379);
$order = [
    'id' => 1,
    'name' => '小米6',
    'price' => 2499,
    'created_at' => '2017-07-14'
];
$redis->publish("order", json_encode($order));
$redis->publish("blog", json_encode($order));
