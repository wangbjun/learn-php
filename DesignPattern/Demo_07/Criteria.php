<?php

namespace DesignPattern\Demo_07;

interface Criteria
{
    public function meetCriteria(array $persons): array;
}
