<?php
$parentId = posix_getpid();
fwrite(STDOUT, "my pid: $parentId\n");
$childNum = 10;
foreach (range(1, $childNum) as $index) {
    $pid = pcntl_fork();
    if ($pid === -1) {
        fwrite(STDERR, "failed to fork!\n");
        exit;
    }
    // parent code
    if ($pid > 0) {
        fwrite(STDOUT, "fork the {$index}th child, pid: $pid\n");
    } else {
        $myPid    = posix_getpid();
        $parentId = posix_getppid();
        fwrite(STDOUT, "I'm the {$index}th child and my pid: $myPid, parentId: $parentId\n");
        sleep(5);
//        exit;
    }
}