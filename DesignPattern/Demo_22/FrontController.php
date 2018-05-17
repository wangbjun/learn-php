<?php

namespace DesignPattern\Demo_22;

class FrontController
{
    private $dispatcher;

    public function __construct()
    {
        $this->dispatcher = new Dispatcher();
    }

    private function isAuthenticUser()
    {
        echo "User is authenticated successfully!\n";
        return true;
    }

    private function trackRequest(string $request)
    {
        echo "Page requested: " . $request . "\n";
    }

    public function dispatchRequest(string $request)
    {
        $this->trackRequest($request);
        if ($this->isAuthenticUser()) {
            $this->dispatcher->dispatch($request);
        }
    }
}
