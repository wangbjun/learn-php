<?php

namespace DesignPattern\Demo_10;

class Circle implements Shape
{
    private $color;

    private $x;

    private $y;

    private $radius;

    public function __construct(String $color)
    {
        $this->color = $color;
    }

    public function setX(int $x)
    {
        $this->x = $x;
    }

    public function setY(int $y)
    {
        $this->y = $y;
    }

    public function setRadius(int $radius)
    {
        $this->radius = $radius;
    }

    public function draw(): void
    {
        echo "Circle: Draw() [ Color: {$this->color}, x: {$this->x}, y: {$this->y}\n";
    }
}
