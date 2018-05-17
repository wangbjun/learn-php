<?php

namespace DesignPattern\Demo_01;

class ShapeFactory
{
    public function getShape(string $shapeType):Shape
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
}
