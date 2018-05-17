<?php

namespace DesignPattern\Demo_23;

interface Filter
{
    public function execute(string $request): void;
}
