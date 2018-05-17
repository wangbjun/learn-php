<?php

namespace DesignPattern\Demo_20;

class BusinessDelegate
{
    private $lookupService;

    private $businessService;

    private $serviceType;

    public function __construct()
    {
        $this->lookupService = new BusinessLookUp();
    }

    public function setServiceType(String $type)
    {
        $this->serviceType = $type;
    }

    public function doTask()
    {
        $this->businessService = $this->lookupService->getBusinessService($this->serviceType);
        $this->businessService->doProcessing();
    }
}
