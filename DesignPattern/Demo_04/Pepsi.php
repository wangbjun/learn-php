<?php

namespace DesignPattern\Demo_04;

class Pepsi extends ColdDrink
{
    public function price()
    {
        return 35.0;
    }

    public function name()
    {
        return 'Pepsi';
    }
}
