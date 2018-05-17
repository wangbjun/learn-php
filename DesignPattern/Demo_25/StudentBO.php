<?php

namespace DesignPattern\Demo_25;

class StudentBO
{
    private $students = [];

    public function __construct()
    {
        $this->students[] = new StudentVO('JWang', 25);
        $this->students[] = new StudentVO('Jun', 15);
    }

    public function deleteStudent(string $no): void
    {
        foreach ($this->students as $key => $student) {
            if ($student->getNo() == $no) {
                unset($this->students[$key]);
            }
        }
    }

    public function getAllStudents(): array
    {
        return $this->students;
    }

    public function getStudent(int $no): StudentVO
    {
        foreach ($this->students as $student) {
            if ($student->getNo() == $no) {
                return $student;
            }
        }

        return null;
    }

    public function updateStudent(StudentVO $stu): void
    {
        foreach ($this->students as $student) {
            if ($student->getNo() == $stu->getNo()) {
                $student->setName($stu->getName());
            }
        }
    }
}
