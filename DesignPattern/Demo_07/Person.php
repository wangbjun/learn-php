<?php

namespace DesignPattern\Demo_07;

class Person
{
    private $name;
    private $gender;
    private $maritalStatus;

    public function __construct(String $name, String $gender, String $maritalStatus)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->maritalStatus = $maritalStatus;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }
}
