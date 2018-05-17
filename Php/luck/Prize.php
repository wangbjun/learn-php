<?php

namespace Luck;

class Prize
{
    protected $id;

    protected $name;

    protected $desc;

    protected $probability;

    protected $limitNumber;


    /**
     * Prize constructor.
     *
     * @param $id
     * @param $name
     * @param $desc
     * @param $probability
     * @param $limitNumber
     *
     * @throws \Exception
     */
    public function __construct($id, $name, $desc, $probability, $limitNumber = null)
    {
        if (! $id || ! $name || ! $desc) {
            throw  new \Exception('缺少必要参数');
        }
        $this->id          = $id;
        $this->name        = $name;
        $this->desc        = $desc;
        $this->probability = $probability * 1000; //放大1000倍
        $this->limitNumber = $limitNumber;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getProbability()
    {
        return $this->probability;
    }

    /**
     * @param mixed $probability
     */
    public function setProbability($probability)
    {
        $this->probability = $probability;
    }

    /**
     * @return mixed
     */
    public function getLimitNumber()
    {
        return $this->limitNumber;
    }

    /**
     * @param mixed $limitNumber
     */
    public function setLimitNumber($limitNumber)
    {
        $this->limitNumber = $limitNumber;
    }
}
