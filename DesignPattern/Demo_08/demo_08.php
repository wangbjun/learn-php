<?php

namespace DesignPattern\Demo_08;

include "../../include.php";

/**
 * 组合模式
 */
$ceo             = new Employee("John", "CEO", 30000);
$headSales       = new Employee("Robert", "Head Sales", 20000);
$headMarketing   = new Employee("Michel", "Head Marketing", 20000);
$clerk1          = new Employee("Laura", "Marketing", 10000);
$clerk2          = new Employee("Bob", "Marketing", 10000);
$salesExecutive1 = new Employee("Richard", "Sales", 10000);
$salesExecutive2 = new Employee("Rob", "Sales", 10000);
$ceo->add($headSales);
$ceo->add($headMarketing);
$headSales->add($salesExecutive1);
$headSales->add($salesExecutive2);
$headMarketing->add($clerk1);
$headMarketing->add($clerk2);

echo $ceo->toString();
foreach ($ceo->getSubordinates() as $item) {
    echo $item->toString();
    foreach ($item->getSubordinates() as $value) {
        echo $value->toString();
    }
}
