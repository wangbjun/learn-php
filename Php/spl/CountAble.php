<?php

namespace SPL;

class CountAble implements \Countable
{
    public function count()
    {
        return 10;
    }
}

$cable = new CountAble();
var_dump($cable->count());
