<?php

namespace DesignPattern\Demo_04;

class VegBurger extends Burger
{
    public function name()
    {
        return 'Veg Burger';
    }

    public function price()
    {
        return 25.0;
    }
}
