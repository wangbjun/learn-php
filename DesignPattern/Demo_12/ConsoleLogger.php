<?php

namespace DesignPattern\Demo_12;

class ConsoleLogger extends AbstractLogger
{
    public function __construct(int $level)
    {
        $this->level = $level;
    }

    protected function write(String $message): void
    {
        echo "Standard Console::Logger: " . $message."\n";
    }
}
