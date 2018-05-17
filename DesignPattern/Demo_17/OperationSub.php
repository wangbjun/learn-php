<?php

namespace DesignPattern\Demo_17;

class OperationSub implements Strategy
{
    public function doOperation(int $num1, int $num2): int
    {
        return $num1 - $num2;
    }
}
