<?php

namespace DesignPattern\Demo_20;

class EJBService implements BusinessService
{
    public function doProcessing(): void
    {
        echo "Processing task by invoking EJB Service\n";
    }
}
