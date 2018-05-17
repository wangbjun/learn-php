<?php

namespace DesignPattern\Demo_05;

class VlcPlayer implements AdvancedMediaPlayer
{
    public function playMp4(string $fileName)
    {
    }

    public function playVlc(string $fileName)
    {
        echo "Playing Vlc file.".$fileName."\n";
    }
}
