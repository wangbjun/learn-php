<?php

namespace DesignPattern\Demo_15;

class HexaObserver extends Observer
{
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;

        $this->subject->attach($this);
    }

    public function update(string $state)
    {
        echo "$state ---> Hexa update\n";
    }
}
