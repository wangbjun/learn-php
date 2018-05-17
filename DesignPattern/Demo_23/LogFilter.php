<?php

namespace DesignPattern\Demo_23;

class LogFilter implements Filter
{
    public function execute(string $request): void
    {
        echo "Log Request...\n";
    }
}
