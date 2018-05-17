<?php

namespace DesignPattern\Demo_13;

interface Iterator
{
    public function hasNext(): bool;

    public function next();
}
