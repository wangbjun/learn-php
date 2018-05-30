<?php

namespace App\Ioc;

class Leg implements Visit
{
    public function go()
    {
        echo "I walk.....";
    }
}