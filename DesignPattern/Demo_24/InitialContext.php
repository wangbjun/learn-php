<?php

namespace DesignPattern\Demo_24;

class InitialContext
{
    public function lookup(string $jndiName)
    {
        if ($jndiName == 'Service1') {
            echo "Lookup and creating a new service1\n";
            return new Service1();
        } elseif ($jndiName == 'Service2') {
            echo "Lookup and creating a new service2\n";
            return new Service2();
        }

        return null;
    }
}
