<?php

namespace DesignPattern\Demo_11;

class ProxyImage implements Image
{
    private $realImage;

    private $fileName;

    public function __construct(String $fileName)
    {
        $this->fileName = $fileName;
    }

    public function display(): void
    {
        if ($this->realImage == null) {
            $this->realImage = new RealImage($this->fileName);
        }

        $this->realImage->display();
    }
}
