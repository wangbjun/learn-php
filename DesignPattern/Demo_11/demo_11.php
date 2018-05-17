<?php

namespace DesignPattern\Demo_11;

include "../../include.php";
/**
 * 代理模式
 */
$image = new ProxyImage("image.jpg");

$image->display();
