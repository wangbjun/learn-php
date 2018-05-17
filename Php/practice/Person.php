<?php

class Person
{
    public $name;
    public $address;
    protected $age;
    private $salary;

    public function say()
    {
        echo $this->name;
    }

    protected function get()
    {
        echo $this->salary;
    }

    private function what()
    {
        echo $this->address;
    }
}
