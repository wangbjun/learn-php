<?php

namespace DesignPattern\Demo_23;

include "../../include.php";

/**
 * 拦截过滤器模式
 */

$filterManager = new FilterManager(new Target());

$filterManager->setFilter(new LogFilter());
$filterManager->setFilter(new AuthenticationFilter());

$client = new Client();
$client->setFilterManager($filterManager);
$client->sendRequest('Hello');
