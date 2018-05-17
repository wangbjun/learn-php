<?php
function xrange($start, $end, $step = 50)
{
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}
$range = xrange(1, 10, 2);
while ($range->valid()) {
    echo $range->current()."\n";
    $range->next();
}
//var_dump($range->current());
//var_dump($range->key());
//
//$range->next();
//
//var_dump($range->current());
//
//var_dump($range->key());
//
//$range->next();
//var_dump($range->valid());
//
//var_dump($range->current());
//var_dump($range->key());

$ben = call_user_func(function () {
    $hello = (yield 'my name is ben ,what\'s your name' . PHP_EOL);
    try {
        $jump = (yield '[yield] I jump, you jump'.PHP_EOL);
    } catch (Exception $exception) {
        echo '[Exception]'.$exception->getMessage().PHP_EOL;
    }
    echo $hello;
});

$sayHello = $ben->current();
echo $sayHello;
$jump = $ben->send('[main] say hello');
echo $jump;
$ben->throw(new Exception('[main] No, i can not jump'));
