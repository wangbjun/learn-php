<?php

namespace DesignPattern\Demo_05;

class AudioPlayer implements MediaPlayer
{
    public function play(string $audioType, string $fileName)
    {
        if ($audioType == 'mp3') {
            echo "Playing mp3 file." . $fileName . "\n";
        } elseif ($audioType == 'vlc' || $audioType == 'mp4') {
            (new MediaAdapter($audioType))->play($audioType, $fileName);
        } else {
            echo "Invalid file type ." . $fileName;
        }
    }
}
