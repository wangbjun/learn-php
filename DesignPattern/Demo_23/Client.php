<?php

namespace DesignPattern\Demo_23;

class Client
{
    /**
     * @var FilterManager
     */
    private $filterManager;

    public function setFilterManager(FilterManager $filterManager)
    {
        $this->filterManager = $filterManager;
    }

    public function sendRequest(string $request)
    {
        $this->filterManager->filterRequest($request);
    }
}
