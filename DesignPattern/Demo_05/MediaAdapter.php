<?php

namespace DesignPattern\Demo_05;

class MediaAdapter implements MediaPlayer
{
    private $advanceMusicPlayer;

    public function __construct(string $audioType)
    {
        if ($audioType == 'vlc') {
            $this->advanceMusicPlayer = new VlcPlayer();
        } elseif ($audioType == 'mp4') {
            $this->advanceMusicPlayer = new Mp4Player();
        }
    }

    public function play(string $audioType, string $fileName)
    {
        $this->advanceMusicPlayer->playVlc($fileName);
    }
}
