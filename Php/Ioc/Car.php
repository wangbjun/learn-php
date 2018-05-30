<?php

namespace App\Ioc;

class Car implements Visit
{
    public function go()
    {
        echo "I driver.....";
    }
}