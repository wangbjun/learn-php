<?php
/**
 * Created by PhpStorm.
 * User: jwang
 * Date: 18-3-28
 * Time: 下午3:41
 */

namespace DesignPattern\Demo_26;


class ShapeMaker
{
    private $circle;
    private $rectangle;
    private $square;

    public function __construct()
    {
        $this->circle = new Circle();
        $this->rectangle = new Rectangle();
        $this->square = new Square();
    }

    public function drawCircle()
    {
        $this->circle->draw();
    }

    public function drawRectangle()
    {
        $this->rectangle->draw();
    }

    public function drawSquare()
    {
        $this->square->draw();
    }
}