<?php

namespace DesignPattern\Demo_18;

class Football extends Game
{
    public function init(): void
    {
        echo "Game footBall init...\n";
    }

    public function startPlay(): void
    {
        echo "Game footBall start...\n";
    }

    public function endPlay(): void
    {
        echo "Game footBall end...\n";
    }
}
