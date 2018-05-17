<?php

namespace DesignPattern\Demo_04;

abstract class Burger implements Item
{
    public function packing()
    {
        return new Wrapper();
    }

    abstract public function price();
}
