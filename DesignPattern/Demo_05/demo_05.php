<?php

namespace DesignPattern\Demo_05;

include "../../include.php";

/**
 * 适配器模式
 */
$audioPlayer = new AudioPlayer();
$audioPlayer->play('mp3', 'This is a mp3');
$audioPlayer->play('mp4', 'This is a mp4');
$audioPlayer->play('vlc', 'This is a vlc');
$audioPlayer->play('mp5', 'This is a mp5');
