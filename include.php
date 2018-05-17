<?php
# 自动加载类
spl_autoload_register(function ($class) {
    $file = __DIR__.'/'.$class.'.php';
    $file = str_replace('\\', '/', $file);
    include $file;
});