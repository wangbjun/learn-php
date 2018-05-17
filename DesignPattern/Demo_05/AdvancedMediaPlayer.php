<?php

namespace DesignPattern\Demo_05;

interface AdvancedMediaPlayer
{
    public function playVlc(string $fileName);
    public function playMp4(string $fileName);
}
