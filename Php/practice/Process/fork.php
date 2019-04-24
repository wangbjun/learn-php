<?php

$ids = [];

foreach (range(1, 5) as $index) {
    $ids[] = $pid = pcntl_fork();
    if ($pid === -1) {
        echo "failed to fork!\n";
        exit;
    } elseif ($pid) {
        $pid = posix_getpid();
        echo "I am the parent, pid: $pid\n";
    } else {
        $cid = posix_getpid();
        echo "fork the {$index}th child, pid: $cid\n";
        exit;
    }
}

foreach ($ids as $i => $pid) {
    if ($pid) {
        pcntl_waitpid($pid, $status);
    }
}
