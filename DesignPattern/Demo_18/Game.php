<?php

namespace DesignPattern\Demo_18;

abstract class Game
{
    abstract public function init(): void;

    abstract public function startPlay(): void;

    abstract public function endPlay(): void;

    final public function play()
    {
        $this->init();
        $this->startPlay();
        $this->endPlay();
    }
}
