<?php

namespace DesignPattern\Demo_22;

include "../../include.php";

/**
 * 前端控制器模式
 */

$frontController = new FrontController();
$frontController->dispatchRequest('home');
$frontController->dispatchRequest('student');
