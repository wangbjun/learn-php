<?php

namespace DesignPattern\Demo_25;

include "../../include.php";

/**
 * 传输对象模式，貌似和数据对象访问模式一样啊
 */
$studentBO = new StudentBO();

foreach ($studentBO->getAllStudents() as $student) {
    echo "{$student->getNo()}---{$student->getName()}\n";
}
//单个对象
echo $studentBO->getStudent(15)->getName();

//删除对象
$studentBO->deleteStudent(25);
var_dump($studentBO);

$studentBO->updateStudent(new StudentVO("Xhz", 2));

var_dump($studentBO);
