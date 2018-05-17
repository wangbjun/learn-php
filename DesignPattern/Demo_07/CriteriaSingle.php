<?php

namespace DesignPattern\Demo_07;

class CriteriaSingle implements Criteria
{
    public function meetCriteria(array $persons): array
    {
        $singlePersons = [];
        foreach ($persons as $person) {
            if (strtolower($person->getMaritalStatus()) == 'single') {
                $singlePersons[] = $person;
            }
        }

        return $singlePersons;
    }
}
