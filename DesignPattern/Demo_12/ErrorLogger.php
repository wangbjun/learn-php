<?php

namespace DesignPattern\Demo_12;

class ErrorLogger extends AbstractLogger
{
    public function __construct(int $level)
    {
        $this->level = $level;
    }

    protected function write(String $message): void
    {
        echo "Error::Logger: " . $message."\n";
    }
}
