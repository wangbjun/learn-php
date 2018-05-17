<?php

namespace DesignPattern\Demo_03;

include "../../include.php";

/**
 * 单例模式
 */
$instance = Simple::getInstance();
Simple::getInstance();
var_dump($instance->getCount());
