<?php

namespace DesignPattern\Demo_02;

class FactoryProducer
{
    public static function getFactory(string $choice):AbstractFactory
    {
        if ($choice == 'shape') {
            return new ShapeFactory();
        } elseif ($choice == 'color') {
            return new ColorFactory();
        }

        return null;
    }
}
