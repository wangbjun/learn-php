<?php

namespace DesignPattern\Demo_20;

class BusinessLookUp
{
    public function getBusinessService(string $serviceName): BusinessService
    {
        if ($serviceName == 'ejb') {
            return new EJBService();
        } else {
            return new JMSService();
        }
    }
}
