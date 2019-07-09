<?php

namespace App;

require 'AipSpeech.php';

class Speak
{
    private $aip_speech;

    private $weather;

    public function __construct(\AipSpeech $aip_speech, WeatherInterface $weather)
    {
        $this->aip_speech = $aip_speech;

        $this->weather = $weather;
    }


    public function run($text = '')
    {
        $part_one = $this->getHello();

        $part_two = $this->getWeek();

        $part_three = $this->weather->getWeather();

        if (!$text) {
            $text = $part_one.','.$part_two.$part_three;
        }
        $audio = $this->getAudio($text);

        $file_name = '/tmp/audio.mp3';

        file_put_contents($file_name, $audio);

        exec('play '.$file_name);
    }

    private function getAudio(string $text)
    {
        print_r("\nText: ".$text);
        return $this->aip_speech->synthesis($text, 'zh', 1, array(
            'vol' => 6,
            'spd' => 5,
        ));
    }

    private function getWeek()
    {
        $week = date("w");
        switch ($week) {
            case 1:
                $week = "星期一";
                break;
            case 2:
                $week = "星期二";
                break;
            case 3:
                $week = "星期三";
                break;
            case 4:
                $week = "星期四";
                break;
            case 5:
                $week = "星期五";
                break;
            case 6:
                $week = "星期六";
                break;
            case 0:
                $week = "星期日";
                break;
            default:
        };

        return $week.".";
    }

    private function getHello()
    {
        $hour  = date('H:i');
        $hello = '';
        switch ($hour) {
            case $hour == '08:00':
            case $hour == '10:00':
                $hello .= '上午好！';
                break;
            case $hour == '12:00':
                $hello .= '中午好！';
                break;
            case $hour == '14:00':
            case $hour == '17:00':
                $hello .= '下午好！';
                break;
            case $hour == '18:00':
                $hello .= '傍晚好！';
                break;
            case $hour == '20:00':
            case $hour == '23:00':
                $hello .= '晚上好！';
                break;
            default:
                break;
        }
        $hello .= '现在是北京时间,'.date('H').'点整';

        return $hello;
    }
}
