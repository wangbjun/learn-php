<?php

namespace DesignPattern\Demo_16;

class StopState implements State
{
    public function doAction(Context $context): void
    {
        echo "In stop state:";
        $context->setState($this);
    }

    public function toString()
    {
        return "Stop State\n";
    }
}
