<?php

namespace DesignPattern\Demo_06;

class Circle extends Shape
{
    private $radius;
    private $x;
    private $y;

    public function __construct(int $radius, int $x, int $y, DrawAPI $drawAPI)
    {
        parent::__construct($drawAPI);
        $this->radius = $radius;
        $this->x = $x;
        $this->y = $y;
    }

    public function draw(): void
    {
        $this->drawAPI->drawCircle($this->radius, $this->x, $this->y);
    }
}
