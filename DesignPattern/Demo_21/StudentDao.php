<?php

namespace DesignPattern\Demo_21;

interface StudentDao
{
    public function getAllStudents(): array;

    public function getStudent(int $no): Student;

    public function updateStudent(Student $student): void;

    public function deleteStudent(string $no): void;
}
