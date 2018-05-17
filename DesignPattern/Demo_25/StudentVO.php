<?php

namespace DesignPattern\Demo_25;

class StudentVO
{
    private $no;

    private $name;

    public function __construct(string $name, string $no)
    {
        $this->name = $name;
        $this->no = $no;
    }

    /**
     * @return mixed
     */
    public function getNo(): string
    {
        return $this->no;
    }

    /**
     * @param mixed $no
     */
    public function setNo(String $no): void
    {
        $this->no = $no;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName(String $name): void
    {
        $this->name = $name;
    }

}