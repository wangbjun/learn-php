<?php

namespace DesignPattern\Demo_02;

abstract class AbstractFactory
{
    abstract public function getColor(string $colorType):Color;

    abstract public function getShape(string $shapeType):Shape;
}
