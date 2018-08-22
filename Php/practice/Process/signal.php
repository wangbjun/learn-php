<?php

//ctrl+c
pcntl_signal(SIGINT, function () {
    fwrite(STDOUT, "receive signal: " . SIGINT . " do nothing ...\n");
});
//kill
pcntl_signal(SIGTERM, function () {
    fwrite(STDOUT, "receive signal: " . SIGTERM . " I will exit!\n");
    exit;
});
//kill -9 是不容许被注册的
//pcntl_signal(SIGKILL, function () {
//    fwrite(STDOUT, "receive signal: " . SIGKILL . " do nothing ...\n");
//});

while (true) {
    pcntl_signal_dispatch();
    fwrite(STDOUT, "I am in a loop!\n");
    sleep(1);
}
