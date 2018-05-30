<?php

namespace App\Ioc;

class Traveller
{
    protected $trafficTool;

    public function __construct(Visit $visit)
    {
        $this->trafficTool = $visit;
    }

    public function visitTibet()
    {
        $this->trafficTool->go();
    }
}