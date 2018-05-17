<?php

namespace DesignPattern\Demo_07;

class OrCriteria implements Criteria
{
    private $criteria;

    private $otherCriteria;

    public function __construct(Criteria $criteria, Criteria $otherCriteria)
    {
        $this->criteria = $criteria;
        $this->otherCriteria = $otherCriteria;
    }

    public function meetCriteria(array $persons): array
    {
        $firstCriteriaItems = $this->criteria->meetCriteria($persons);

        $otherCriteriaItems = $this->otherCriteria->meetCriteria($persons);

        foreach ($persons as $person) {
            if (!in_array($person, $otherCriteriaItems) && !in_array($person, $firstCriteriaItems)) {
                $firstCriteriaItems[] = $person;
            }
        }

        return $firstCriteriaItems;
    }
}
