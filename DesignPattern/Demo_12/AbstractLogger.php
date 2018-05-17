<?php

namespace DesignPattern\Demo_12;

abstract class AbstractLogger
{
    public const INFO = 1;

    public const DEBUG = 2;

    public const ERROR = 3;

    protected $level;

    protected $nextLogger;

    public function setNextLogger(AbstractLogger $nextLogger)
    {
        $this->nextLogger = $nextLogger;
    }

    public function logMessage(int $level, String $message):void
    {
        if ($this->level <= $level) {
            $this->write($message);
        }
        if ($this->nextLogger != null) {
            $this->nextLogger->logMessage($level, $message);
        }
    }

    abstract protected function write(String $message): void;
}
