<?php

namespace DesignPattern\Demo_02;

class ColorFactory extends AbstractFactory
{
    public function getShape(string $shapeType): Shape
    {
        return null;
    }

    public function getColor(string $color): Color
    {
        if ($color == null) {
            return null;
        }

        if ($color == 'red') {
            return new RedColor();
        } elseif ($color == 'blue') {
            return new BlueColor();
        }

        return null;
    }
}
