<?php

namespace DesignPattern\Demo_13;

class NameIterator implements Iterator
{
    private $index = 0;

    public $names = ["Robert", "John", "Lora", "Julie"];

    public function hasNext(): bool
    {
        if ($this->index < count($this->names)) {
            return true;
        }

        return false;
    }

    public function next()
    {
        if ($this->hasNext()) {
            return $this->names[$this->index++];
        }

        return null;
    }
}
