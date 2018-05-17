<?php
/**
 * Created by PhpStorm.
 * User: jwang
 * Date: 18-3-28
 * Time: 下午3:39
 */

namespace DesignPattern\Demo_26;


class Square implements Shape
{
    function draw(): void
    {
        echo "Square ....\n";
    }
}