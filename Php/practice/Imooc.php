<?php
function autoload($className)
{
    require $className . ".php";
}

spl_autoload_register('autoload');

$im = new Person();
var_dump($im);
