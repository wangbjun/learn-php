<?php

namespace DesignPattern\Demo_20;

include "../../include.php";

/**
 * 业务委托模式
 */
$businessDelegate = new BusinessDelegate();

$client = new Client($businessDelegate);

$businessDelegate->setServiceType('ejb');
$client->doTask();

$businessDelegate->setServiceType('jms');
$client->doTask();
