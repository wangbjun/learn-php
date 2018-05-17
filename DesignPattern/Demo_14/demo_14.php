<?php

namespace DesignPattern\Demo_14;

include "../../include.php";

/**
 * 备忘录模式
 */
$originator = new Originator();
$careTaker = new CareTaker();

$originator->setState("State #1\n");
$originator->setState("State #2\n");

$careTaker->add($originator->saveStateToMemento());

$originator->setState("State #3\n");

$careTaker->add($originator->saveStateToMemento());

$originator->setState("State #4\n");

echo "Current State:".$originator->getState();
$originator->getStateFromMemento($careTaker->get(0));
echo "Current State:".$originator->getState();
$originator->getStateFromMemento($careTaker->get(1));
echo "Current State:".$originator->getState();
