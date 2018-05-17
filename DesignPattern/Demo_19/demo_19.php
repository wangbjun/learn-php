<?php

namespace DesignPattern\Demo_19;

include "../../include.php";

/**
 * MVC设计模式
 */
$student = new StudentController(new Student('Jun', '1159'), new StudentView());
$student->updateView();
$student->setStudentName('JWang');
$student->setStudentNo('2150');
$student->updateView();
