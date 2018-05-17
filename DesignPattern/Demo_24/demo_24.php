<?php

namespace DesignPattern\Demo_24;

include "../../include.php";

/**
 * 服务定位器模式
 */
$sl = new ServiceLocator();

$service = $sl->getService('Service1');
$service->execute();

$service = $sl->getService('Service2');
$service->execute();

$service = $sl->getService('Service1');
$service->execute();
