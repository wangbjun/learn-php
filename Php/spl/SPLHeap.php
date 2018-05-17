<?php

namespace SPL;

class SPLHeap extends \SplHeap
{
    protected function compare($value1, $value2)
    {
        return $value1 > $value2 ? -1 : 1;
    }
}

$hp = new SPLHeap();
//$hp->insert(1);
$hp->insert(9);
$hp->insert(7);
$hp->insert(7);
$hp->insert(5);
$hp->insert(11);
$hp->insert(55);
$hp->insert(55);
$hp->insert(20);

//$hp->rewind();
//foreach ($hp as $value) {
//    echo $value . "\n";
//}

var_dump($hp->extract());
var_dump($hp->top());
var_dump($hp->top());
var_dump($hp->top());
