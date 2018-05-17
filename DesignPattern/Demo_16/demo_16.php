<?php

namespace DesignPattern\Demo_16;

include "../../include.php";

/**
 * 状态模式
 */
$context = new Context();

$startState = new StartState();
$stopState  = new StopState();

$startState->doAction($context);
echo $startState->toString();

$stopState->doAction($context);
echo $stopState->toString();
