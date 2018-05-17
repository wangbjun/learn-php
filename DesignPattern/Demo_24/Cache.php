<?php

namespace DesignPattern\Demo_24;

class Cache
{
    private $services = [];

    public function getService(string $serviceName)
    {
        foreach ($this->services as $service) {
            if ($service->getName() == $serviceName) {
                echo "Return Cached $serviceName Object\n";
                return $service;
            }
        }

        return null;
    }

    public function addService(Service $ser)
    {
        $exists = false;

        foreach ($this->services as $service) {
            if ($service->getName() == $ser->getName()) {
                $exists = true;
            }
        }

        if (!$exists) {
            $this->services[] = $ser;
        }
    }
}
