<?php
$str = [3,4,7,12,82,9,25];

//找出第几大的数是第几个，比如第3大的数是第4个12

$str = array_flip($str);

krsort($str);

$i = 1;
foreach ($str as $key => $item) {
    if ($i == 3) {
        var_dump($key, $item);
    }
    $i++;
}