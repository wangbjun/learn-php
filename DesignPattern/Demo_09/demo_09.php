<?php

namespace DesignPattern\Demo_09;

include "../../include.php";

/**
 * 装饰设计模式
 */
$circle = new Circle();

$redCircle = new RedShapeDecorator(new Circle());

$redRectangle = new RedShapeDecorator(new Rectangle());

$circle->draw();

$redCircle->draw();

$redRectangle->draw();
