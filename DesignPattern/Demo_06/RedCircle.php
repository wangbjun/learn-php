<?php

namespace DesignPattern\Demo_06;

class RedCircle implements DrawAPI
{
    public function drawCircle(int $radius, int $x, int $y):void
    {
        echo "Draw Circle[color: red,radius:{$radius},x:{$x},y:{$y}";
    }
}
