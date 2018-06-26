<?php

$pid = posix_getpid();
$cid = pcntl_fork();
if ($cid == 0) {
    $myPid  = posix_getpid();
    $myPPid = posix_getppid();
    fwrite(STDOUT, "my pid: $myPid, my pPid $myPPid\n");

    sleep(5);

    $myPid  = posix_getpid();
    $myPPid = posix_getppid();
    fwrite(STDOUT, "my pid: $myPid, my pPid $myPPid\n");
} else {
    fwrite(STDOUT, "$pid => $cid, parent exit\n");
}