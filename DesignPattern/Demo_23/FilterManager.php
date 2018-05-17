<?php

namespace DesignPattern\Demo_23;

class FilterManager
{
    private $filterChain;

    public function __construct(Target $target)
    {
        $this->filterChain = new FilterChain();
        $this->filterChain->setTarget($target);
    }

    public function setFilter(Filter $filter)
    {
        $this->filterChain->addFilter($filter);
    }

    public function filterRequest(string $request)
    {
        $this->filterChain->execute($request);
    }
}
