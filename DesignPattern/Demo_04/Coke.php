<?php

namespace DesignPattern\Demo_04;

class Coke extends ColdDrink
{
    public function name()
    {
        return 'Coke';
    }

    public function price()
    {
        return 30.0;
    }
}
