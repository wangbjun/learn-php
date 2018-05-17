<?php

namespace DesignPattern\Demo_06;

include "../../include.php";
/**
 * 桥接模式
 */
$circle = new Circle(5, 2, 4, new RedCircle());
$circle->draw();
