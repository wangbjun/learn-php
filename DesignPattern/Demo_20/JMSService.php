<?php

namespace DesignPattern\Demo_20;

class JMSService implements BusinessService
{
    public function doProcessing(): void
    {
        echo "Processing task by invoking JMS Service\n";
    }
}
