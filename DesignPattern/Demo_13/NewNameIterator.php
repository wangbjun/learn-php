<?php

namespace DesignPattern\Demo_13;

/**
 * 实现iterator迭代器
 * Class NewNameIterator
 * @package DesignPattern\Demo_13
 */
class NewNameIterator implements \Iterator
{
    private $index = 0;

    public $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function current()
    {
        return $this->items[$this->index];
    }


    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        if ($this->index < count($this->items)) {
            return true;
        }

        return false;
    }

    public function rewind()
    {
        $this->index = 0;
    }
}
