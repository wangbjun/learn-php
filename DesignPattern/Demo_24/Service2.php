<?php

namespace DesignPattern\Demo_24;

class Service2 implements Service
{
    public function execute(): void
    {
        echo "Execute Service2...\n";
    }

    public function getName(): string
    {
        return "Service2";
    }
}
