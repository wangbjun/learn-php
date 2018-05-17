<?php

namespace DesignPattern\Demo_04;

abstract class ColdDrink implements Item
{
    public function packing()
    {
        return new Bottle();
    }

    abstract public function price();
}
