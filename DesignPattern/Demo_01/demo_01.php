<?php

namespace DesignPattern\Demo_01;

include '../../include.php';

/**
 * 简单工厂模式
 */
$shapeFactory = new ShapeFactory();

$shape = $shapeFactory->getShape('circle');
$shape->draw();

$shape = $shapeFactory->getShape('square');
$shape->draw();
