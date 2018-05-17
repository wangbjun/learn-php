<?php

namespace DesignPattern\Demo_17;

interface Strategy
{
    public function doOperation(int $num1, int $num2): int;
}
