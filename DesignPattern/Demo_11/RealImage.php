<?php

namespace DesignPattern\Demo_11;

class RealImage implements Image
{
    private $fileName;

    public function __construct(String $fileName)
    {
        $this->fileName = $fileName;
        $this->loadFromDisk($fileName);
    }

    private function loadFromDisk(String $fileName)
    {
        echo "Load File: {$fileName}\n";
    }

    public function display(): void
    {
        echo "Displaying File: {$this->fileName}";
    }
}
