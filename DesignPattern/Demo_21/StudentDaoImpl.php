<?php

namespace DesignPattern\Demo_21;

class StudentDaoImpl implements StudentDao
{
    private $students = [];

    public function __construct()
    {
        $student1 = new Student("Robert", 1);
        $student2 = new Student("John", 2);
        $this->students[] = $student1;
        $this->students[] = $student2;
    }

    public function deleteStudent(string $no):void
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

    public function getStudent(int $no): Student
    {
        foreach ($this->students as $student) {
            if ($student->getNo() == $no) {
                return $student;
            }
        }

        return null;
    }

    public function updateStudent(Student $stu): void
    {
        foreach ($this->students as $student) {
            if ($student->getNo() == $stu->getNo()) {
                $student->setName($stu->getName());
            }
        }
    }
}
