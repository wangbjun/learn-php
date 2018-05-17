<?php

namespace DesignPattern\Demo_14;

class Originator
{
    private $state;

    public function setState(String $state): void
    {
        $this->state = $state;
    }

    public function getState(): String
    {
        return $this->state;
    }

    public function saveStateToMemento(): Memento
    {
        return new Memento($this->state);
    }

    public function getStateFromMemento(Memento $memento)
    {
        $this->state = $memento->getState();
    }
}
