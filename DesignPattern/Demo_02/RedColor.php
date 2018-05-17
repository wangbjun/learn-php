<?php

namespace DesignPattern\Demo_02;

class RedColor implements Color
{
    public function fill()
    {
        echo __METHOD__."\n";
    }
}