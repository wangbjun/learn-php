<?php

namespace DesignPattern\Demo_17;

include "../../include.php";
/**
 * 策略模式
 */
$context = new Context(new OperationAdd());
echo $context->execute(3, 2);
echo "\n";
$context->setStrategy(new OperationPlus());
echo $context->execute(5, 2);
