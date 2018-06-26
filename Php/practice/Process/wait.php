<?php

$pid = pcntl_fork();

if ($pid == 0) {
    $myPid = posix_getpid();
    fwrite(STDOUT, "child $myPid exited!\n");
} else {
    sleep(5);
    $status = 0;
    $pid    = pcntl_wait($status, WUNTRACED);
    if ($pid > 0) {
        fwrite(STDOUT, "child: $pid exited!\n");
    }

    sleep(5);
    fwrite(STDOUT, "parent exit!\n");
}