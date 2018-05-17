<?php

namespace DesignPattern\Demo_04;

class ChickenBurger extends Burger
{
    public function price()
    {
        return 50.0;
    }

    public function name()
    {
        return 'Chicken Burger';
    }
}
