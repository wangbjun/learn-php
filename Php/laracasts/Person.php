<?php

namespace OOP;

class Person
{
    public $name;

    private $age;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        if ($age > 18) {
            $this->age = $age;
        } else {
            throw new \Exception('too young');
        }
    }

    public function getAge()
    {
        return $this->age;
    }
}


$john = new Person('John');
$john->setAge(30);

var_dump($john);
var_dump($john->getAge());
