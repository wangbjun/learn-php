<?php

namespace DesignPattern\Demo_06;

class GreenCircle implements DrawAPI
{
    public function drawCircle(int $radius, int $x, int $y):void
    {
        echo "Draw Circle[color: green,radius:{$radius},x:{$x},y:{$y}";
    }
}
