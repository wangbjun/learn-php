<?php
/**
 * php 文件锁
 */
const FILE = "/tmp/f.lock";

if (!file_exists(FILE)) {
    touch(FILE);
}

$fp = fopen(FILE, 'w+');

if (flock($fp, LOCK_EX + LOCK_NB)) {
    echo "已经锁定\n";
    fwrite($fp, "lock\n");
    sleep(5);
    flock($fp, LOCK_UN);
    echo "任务完成！\n";
} else {
    echo "请稍后！\n";
}

fclose($fp);
