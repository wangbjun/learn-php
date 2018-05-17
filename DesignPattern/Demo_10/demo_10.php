<?php

namespace DesignPattern\Demo_10;

include "../../include.php";

/**
 * 享元模式
 */
$colors = ['Red', 'Green', 'Blue', 'White', 'Black'];

for ($i = 0; $i < 10; $i++) {
    $circle = ShapeFactory::getCircle($colors[array_rand($colors)]);

    try {
        $circle->setX(random_int(1, 100));
        $circle->setY(random_int(1, 100));
    } catch (\Exception $exception) {
        var_dump($exception);
    }

    $circle->setRadius(100);
    $circle->draw();
}
