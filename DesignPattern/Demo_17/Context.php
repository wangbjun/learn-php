<?php

namespace DesignPattern\Demo_17;

class Context
{
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function getStrategy()
    {
        return $this->strategy;
    }

    public function execute(int $num1, int $num2)
    {
        return $this->strategy->doOperation($num1, $num2);
    }
}
