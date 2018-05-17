<?php

namespace DesignPattern\Demo_08;

class Employee
{
    private $name;

    private $dept;

    private $salary;

    private $subordinates;

    public function __construct(string $name, string $dept, int $salary)
    {
        $this->name         = $name;
        $this->dept         = $dept;
        $this->salary       = $salary;
        $this->subordinates = [];
    }

    public function add(Employee $employee)
    {
        $this->subordinates[] = $employee;
    }

    public function remove(Employee $employee)
    {
        unset($this->subordinates[array_search($employee, $this->subordinates)]);
    }

    public function getSubordinates()
    {
        return $this->subordinates;
    }

    public function toString()
    {
        return "Employee: [ Name:{$this->name}, Dept: {$this->dept}, Salary: {$this->salary}\n";
    }
}
