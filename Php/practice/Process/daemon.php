<?php

$pid = pcntl_fork();

switch ($pid) {
    case -1:
        fwrite(STDOUT, "fork failed!\n");
        exit(1);
        break;
    case 0:
        if (posix_setsid() === -1) {
            fwrite(STDERR, "fail to set child as the session leader!\n");
            exit;
        }
        file_put_contents("/tmp/daemon.out", "php daemon example\n", FILE_APPEND);
        while (true) {
            sleep(5);
            file_put_contents("/tmp/daemon.out", "now: " . date("Y-m-d H:i:s") . "\n", FILE_APPEND);
        }
        break;
    default:
        exit;
}