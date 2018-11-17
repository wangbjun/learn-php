<?php
set_time_limit(0);

use App\SeniverseWeather;
use App\Speak;

require 'Speak.php';
require 'WeatherInterface.php';
require 'SeniverseWeather.php';

define('APP_ID', '9726425');
define('API_KEY', 'T33KsWSGD9TrAVSPiL0wvPZXTXlfY7ak');
define('SECRET_KEY', 'AWsrpSh4XIuV63rf4fGYZSTs4M7RDyov');
define('W_KEY', 'm1x4jj25p8mn7yiq');

$speak = new Speak(new AipSpeech(APP_ID, API_KEY, SECRET_KEY), new SeniverseWeather());

while (true) {
    $hour = date("H:i");
    if ($hour == "09:00" || $hour == "11:00" || $hour == "12:00" || $hour == "14:00" || $hour == "16:00" ||
        $hour == "18:00" || $hour == "21:00" || $hour == "23:00") {
        print_r('Speak at: ' . date("Y-m-d H:i:s"));
        $speak->run();
        sleep(3600);
    }
    sleep(50);
}
