<?php
/**
 * redis实战
 *
 * 实现悲观锁机制
 *
 * @author TIGERB <https://github.com/TIGERB>
 * @example php pessmistic-lock.php
 */

$timeout = 50000;

$redis = new Redis();
$redis->connect('localhost', 6379);

do {
    $now_time = microtime(true) * 1000;
    $micro_timeout = $now_time + $timeout + 1;
    $is_lock = $redis->setnx('lock.count', $micro_timeout); //如果key不存在的时候才设置返回1，否则返回0
    if (!$is_lock) {
        $get_time = $redis->get('lock.count');
        if ($get_time > $now_time) {
            usleep(1000000);
            echo $now_time . "\n";
            continue;
        }
    }
    echo $micro_timeout . "\n";
    // 超时,抢锁,可能有几毫秒级时间差可忽略
    $previousTime = $redis->getset('lock.count', $micro_timeout);
    if ((int)$previousTime < $now_time) {
        break;
    }
} while (!$is_lock);

$count = $redis->get('count') ?: 0;

// file_put_contents('/var/log/count.log.1', ($count+1));
// 业务逻辑
echo "执行count加1操作～ \n\n";
$redis->set('count', $count + 1);
sleep(10);
// 删除锁
$redis->del('lock.count');
// 打印count值
$count = $redis->get('count');
echo "count值为：$count \n";
