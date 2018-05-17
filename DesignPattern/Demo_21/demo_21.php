<?php

namespace DesignPattern\Demo_21;

include "../../include.php";

/**
 * 数据对象访问模式
 */
$studentDao = new StudentDaoImpl();

foreach ($studentDao->getAllStudents() as $student) {
    echo "{$student->getNo()}---{$student->getName()}\n";
}
//单个对象
echo $studentDao->getStudent(1)->getName();

//删除对象
$studentDao->deleteStudent(1);
var_dump($studentDao);

$studentDao->updateStudent(new Student("Xhz", 2));

var_dump($studentDao);
