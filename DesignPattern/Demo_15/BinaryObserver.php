<?php

namespace DesignPattern\Demo_15;

class BinaryObserver extends Observer
{
    public function __construct(Subject $subject)
    {
        $this->subject = $subject;

        $this->subject->attach($this);
    }

    public function update(string $state)
    {
        echo "$state ---> Binary update\n";
    }
}
