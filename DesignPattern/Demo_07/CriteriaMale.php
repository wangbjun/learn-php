<?php

namespace DesignPattern\Demo_07;

class CriteriaMale implements Criteria
{
    public function meetCriteria(array $persons): array
    {
        $malePersons = [];
        foreach ($persons as $person) {
            if (strtolower($person->getGender()) == 'male') {
                $malePersons[] = $person;
            }
        }

        return $malePersons;
    }
}
