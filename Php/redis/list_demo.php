<?php
$redis = new Redis();
$redis->connect('localhost', 6379);
$orderIds = [1, 2, 3, 4, 5, 6, 7, 8, 9];
//foreach ($orderIds as $id) {
//    $redis->lPush('order', $id);
//}
$res = $redis->lRange('order', 0, -1);
//$redis->lPop('order');
$redis->rPush('order', 8);
//$redis->flushAll();
var_dump($res);
