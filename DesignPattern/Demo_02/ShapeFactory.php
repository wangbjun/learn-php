<?php

namespace DesignPattern\Demo_02;

class ShapeFactory extends AbstractFactory
{
    public function getShape(string $shapeType): Shape
    {
        if ($shapeType == null) {
            return null;
        }

        if ($shapeType == 'circle') {
            return new Circle();
        } elseif ($shapeType == 'square') {
            return new Square();
        }

        return null;
    }

    public function getColor(string $color): Color
    {
        return null;
    }
}
