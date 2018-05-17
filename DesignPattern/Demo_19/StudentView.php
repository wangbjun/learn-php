<?php

namespace DesignPattern\Demo_19;

class StudentView
{
    public function printStudent(String $studentName, String $studentNo): void
    {
        echo "Student: Name {$studentName}, No {$studentNo}\n";
    }
}
