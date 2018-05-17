<?php

namespace DesignPattern\Demo_15;

include "../../include.php";

/**
 * 观察者模式
 */
$subject = new Subject();

new BinaryObserver($subject);
new HexaObserver($subject);

$subject->setState(5);
$subject->notifyAll();
