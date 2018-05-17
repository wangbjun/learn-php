<?php

namespace DesignPattern\Demo_13;

use DesignPattern\Demo_07\Person;

include "../../include.php";
/**
 * 迭代器模式
 */
for ($items = new NameIterator(); $items->hasNext();) {
    echo $items->next()."\n";
}


$person[] = new Person('jun', 'male', 'yes');
$person[] = new Person('jwang', 'male', 'yes');
$person[] = new Person('hike', 'male', 'yes');
$person[] = new Person('mary', 'male', 'yes');

$iterator = new NewNameIterator($person);

foreach ($iterator as $value) {
    var_dump($value->getName());
}