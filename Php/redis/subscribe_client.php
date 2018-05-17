<?php
$redis = new Redis();
$redis->connect('localhost', 6379);
$redis->subscribe(['order', 'blog'], function ($redis, $chan, $msg) {
    var_dump($redis);
    var_dump($chan);
    var_dump($msg);
});
