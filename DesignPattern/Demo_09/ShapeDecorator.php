<?php

namespace DesignPattern\Demo_09;

class ShapeDecorator implements Shape
{
    protected $decoratedShape;

    public function __construct(Shape $shape)
    {
        $this->decoratedShape = $shape;
    }

    public function draw(): void
    {
        $this->decoratedShape->draw();
    }
}
