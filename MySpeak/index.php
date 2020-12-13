<?php
set_time_limit(0);

use App\SeniverseWeather;
use App\Speak;

require 'Speak.php';
require 'WeatherInterface.php';
require 'SeniverseWeather.php';

define('APP_ID', '23144372');
define('API_KEY', 'RbFQSFVTWrpH4j7sCKiVrjap');
define('SECRET_KEY', 'Cs3H1U9YfKL0sHjkGFATZ6Sb0UnthPP7');
define('W_KEY', 'm1x4jj25p8mn7yiq');

$speak = new Speak(new AipSpeech(APP_ID, API_KEY, SECRET_KEY), new SeniverseWeather());

if ($argc >= 2) {
    $speak->run($argv[1]);
    exit(0);
}
while (true) {
    $hour = date("H:i");
    if ($hour == "09:00" || $hour == "11:00" || $hour == "12:00" || $hour == "14:00" || $hour == "16:00" ||
        $hour == "18:00" || $hour == "21:00" || $hour == "22:00" || $hour == "23:00" || $hour == "00:00") {
        print_r('Speak at: ' . date("Y-m-d H:i:s"));
        $speak->run();
        sleep(3600);
    }
    sleep(50);
}
