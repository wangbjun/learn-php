<?php

namespace DesignPattern\Demo_07;

include "../../include.php";
/**
 * 过滤器模式
 */
$persons = [];

array_push($persons, new Person("Robert", "Male", "Married"));
array_push($persons, new Person("John", "Male", "Single"));
array_push($persons, new Person("Laura", "Female", "Married"));
array_push($persons, new Person("Diana", "Male", "Single"));
array_push($persons, new Person("Mike", "Female", "Single"));
array_push($persons, new Person("Bobby", "Male", "Married"));
array_push($persons, new Person("Jwang", "Female", "Single"));

$male = new CriteriaMale();
$female = new CriteriaFemale();
$single = new CriteriaSingle();
$singleMale = new AndCriteria($single, $male);
$singleOrFemale = new OrCriteria($single, $female);

printPersons($male->meetCriteria($persons));
echo "+++++++++++++++++++++++++++++++++++\n";
printPersons($female->meetCriteria($persons));
echo "+++++++++++++++++++++++++++++++++++\n";
printPersons($single->meetCriteria($persons));
echo "+++++++++++++++++++++++++++++++++++\n";
printPersons($singleMale->meetCriteria($persons));
echo "+++++++++++++++++++++++++++++++++++\n";
printPersons($singleOrFemale->meetCriteria($persons));


function printPersons(array $persons):void
{
    foreach ($persons as $person) {
        echo "Person: [name: {$person->getName()}, gender: {$person->getGender()}, " .
            "Marital Status: {$person->getMaritalStatus()}]\n";
    }
}
