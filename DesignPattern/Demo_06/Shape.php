<?php

namespace DesignPattern\Demo_06;

abstract class Shape
{
    protected $drawAPI;

    public function __construct(DrawAPI $drawAPI)
    {
        $this->drawAPI = $drawAPI;
    }

    abstract public function draw():void;
}
