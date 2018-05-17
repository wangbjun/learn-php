<?php

namespace DesignPattern\Demo_20;

class Client
{
    private $businessService;

    public function __construct(BusinessDelegate $business_service)
    {
        $this->businessService = $business_service;
    }

    public function doTask()
    {
        $this->businessService->doTask();
    }
}
