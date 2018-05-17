<?php
namespace Nothing;

class IteratorTest implements \Iterator
{
    private $item = ['id' => 1, 'name' => 'php'];

    public function current()
    {
        return current($this->item);
    }

    public function next()
    {
        return next($this->item);
    }

    public function key()
    {
        return key($this->item);
    }

    public function valid()
    {
        return ($this->current() !== false);
    }

    public function rewind()
    {
        reset($this->item);
    }
}

$test = new IteratorTest();
foreach ($test as $k => $v) {
    echo $k.",".$v."\n";
}
