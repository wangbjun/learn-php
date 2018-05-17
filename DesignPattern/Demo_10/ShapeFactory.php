<?php

namespace DesignPattern\Demo_10;

class ShapeFactory
{
    private static $circleMap = [];

    public static function getCircle(String $color)
    {
        if (array_key_exists($color, static::$circleMap)) {
            $circle = static::$circleMap[$color];
        } else {
            $circle                    = new Circle($color);
            static::$circleMap[$color] = new Circle($color);
            echo "Creating circle of color : {$color}\n";
        }

        return $circle;
    }
}
