<?php

namespace DesignPattern\Demo_24;

interface Service
{
    public function getName(): string;

    public function execute(): void;
}
