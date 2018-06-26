<?php

pcntl_async_signals(true);

pcntl_signal(SIGCLD, function () {
    $pid = pcntl_wait($status, WUNTRACED);
    fwrite(STDOUT, "child: $pid exited\n");
});

$pid = pcntl_fork();
if ($pid === 0) {
    fwrite(STDOUT, "child exit\n");
} else {
    // mock busy work
    sleep(1);
}