<?php

namespace DesignPattern\Demo_14;

class CareTaker
{
    private $mementoList = [];

    public function add(Memento $state)
    {
        $this->mementoList[] = $state;
    }

    public function get(int $index):Memento
    {
        return $this->mementoList[$index];
    }
}