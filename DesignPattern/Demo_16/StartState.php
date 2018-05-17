<?php

namespace DesignPattern\Demo_16;

class StartState implements State
{
    public function doAction(Context $context): void
    {
        echo "In start state:";
        $context->setState($this);
    }

    public function toString()
    {
        return "Start State\n";
    }
}
