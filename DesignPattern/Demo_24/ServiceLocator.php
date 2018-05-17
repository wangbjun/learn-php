<?php

namespace DesignPattern\Demo_24;

class ServiceLocator
{
    private $cache;

    public function __construct()
    {
        $this->cache = new Cache();
    }

    public function getService(string $jndiName)
    {
        $service = $this->cache->getService($jndiName);

        if ($service != null) {
            return $service;
        }

        $context = new InitialContext();

        $service = $context->lookup($jndiName);

        $this->cache->addService($service);

        return $service;
    }
}