<?php

namespace DesignPattern\Demo_12;

class FileLogger extends AbstractLogger
{
    public function __construct(int $level)
    {
        $this->level = $level;
    }

    protected function write(String $message): void
    {
        echo "File ::Logger: " . $message."\n";
    }
}
