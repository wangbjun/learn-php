<?php

namespace DesignPattern\Demo_24;

class Service1 implements Service
{
    public function execute(): void
    {
        echo "Execute Service1...\n";
    }

    public function getName(): string
    {
        return "Service1";
    }
}
