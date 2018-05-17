<?php

namespace DesignPattern\Demo_23;

class FilterChain
{
    private $filters = [];

    private $target;

    public function addFilter(Filter $filter)
    {
        $this->filters[] = $filter;
    }

    public function setTarget(Target $target)
    {
        $this->target = $target;
    }

    public function execute(string $request)
    {
        foreach ($this->filters as $filter) {
            $filter->execute($request);
        }
        $this->target->execute($request);
    }
}
