<?php
use SPL\ObserverDemo;
use SPL\SubjectDemo;

require "ObserverDemo.php";
require "SubjectDemo.php";

$observer1 = new ObserverDemo(1, 'A');
$observer2 = new ObserverDemo(2, 'B');
$observer3 = new ObserverDemo(3, 'C');
$subject = new SubjectDemo();
$subject->attach($observer1);
$subject->attach($observer2);
$subject->attach($observer3);
$subject->notify();
echo "----------------------------------------\n";
$subject->detach($observer1);
$subject->notify();
