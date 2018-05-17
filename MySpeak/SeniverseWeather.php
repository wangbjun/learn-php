<?php

namespace App;

class SeniverseWeather implements WeatherInterface
{
    public function getWeather()
    {
        //获取天气情况
        $weather_api = "https://api.seniverse.com/v3/weather/now.json?" .
                       "key=" . W_KEY . "&location=beijing&language=zh-Hans&unit=c";
        $w_result    = json_decode(file_get_contents($weather_api));
        $text        = "当前的天气状况是:" . $w_result->results[0]->now->text . ", " .
            "温度:" . $w_result->results[0]->now->temperature . "度";

        return $text;
    }
}
