<?php

pcntl_signal(SIGINT, function () {
    fwrite(STDOUT, "receive signal: " . SIGINT . " do nothing ...\n");
});

while (true) {
    pcntl_signal_dispatch();
    sleep(1);
}