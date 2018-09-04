<?php
namespace App\Ioc;
/**
 * 一个依赖注入容器demo
 */
require_once 'vendor/autoload.php';

$app = new Container();
//$app->bind(Visit::class, Car::class);
$app->bind(Visit::class, Leg::class);
$app->bind('traveller', Traveller::class);

$traveller = $app->make('traveller');
$traveller->visitTibet();
