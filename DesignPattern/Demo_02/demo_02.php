<?php

namespace DesignPattern\Demo_02;

include '../../include.php';
/**
 * 抽象工厂模式
 */
$shapeFactory = FactoryProducer::getFactory('shape');
$colorFactory = FactoryProducer::getFactory('color');
$shape = $shapeFactory->getShape('circle');
$color = $colorFactory->getColor('red');
$shape->draw();
$color->fill();
