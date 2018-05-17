<?php

namespace DesignPattern\Demo_18;

class Cricket extends Game
{
    public function init(): void
    {
        echo "Game Cricket init...\n";
    }

    public function startPlay(): void
    {
        echo "Game Cricket start...\n";
    }

    public function endPlay(): void
    {
        echo "Game Cricket end...\n";
    }
}
