<?php

namespace DesignPattern\Demo_15;

abstract class Observer
{
    protected $subject;

    abstract public function update(string $state);
}
