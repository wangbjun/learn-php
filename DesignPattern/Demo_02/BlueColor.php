<?php

namespace DesignPattern\Demo_02;

class BlueColor implements Color
{
    public function fill()
    {
        echo __METHOD__."\n";
    }
}
