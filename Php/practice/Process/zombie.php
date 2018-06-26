<?php

foreach (range(1, 10) as $i) {
    $pid = pcntl_fork();
    if ($pid == 0) {
        fwrite(STDOUT, "child exit\n");
        exit;
    }
}

sleep(200);
exit;