<?php

namespace DesignPattern\Demo_05;

class Mp4Player implements AdvancedMediaPlayer
{
    public function playMp4(string $fileName)
    {
        echo "Playing mp4 file.".$fileName."\n";
    }

    public function playVlc(string $fileName)
    {
    }
}
