<?php

namespace DesignPattern\Demo_07;

class CriteriaFemale implements Criteria
{
    public function meetCriteria(array $persons): array
    {
        $femalePersons = [];
        foreach ($persons as $person) {
            if (strtolower($person->getGender()) == 'female') {
                $femalePersons[] = $person;
            }
        }

        return $femalePersons;
    }
}
