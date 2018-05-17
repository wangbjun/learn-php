<?php
require 'App.php';

$app = new App();

$app->addRoute("/", function (){
    $this->responseBody = "Hello Closure!\n";
});

$app->dispatch("/");