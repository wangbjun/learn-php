<?php

namespace DesignPattern\Demo_19;

class StudentController
{
    private $studentModel;

    private $studentView;

    public function __construct(Student $student, StudentView $student_view)
    {
        $this->studentModel = $student;
        $this->studentView  = $student_view;
    }

    public function setStudentName(String $name): void
    {
        $this->studentModel->setName($name);
    }

    public function getStudentName(): string
    {
        return $this->studentModel->getName();
    }

    public function setStudentNo(String $no): void
    {
        $this->studentModel->setNo($no);
    }

    public function getStudentNo(): string
    {
        return $this->studentModel->getNo();
    }

    public function updateView(): void
    {
        $this->studentView->printStudent($this->studentModel->getName(), $this->studentModel->getNo());
    }
}
