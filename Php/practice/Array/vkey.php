<?php

try {
    $conn = mysqli_connect("localhost", 'root', '123456', 'blog', 3306);
} catch (\Exception $e) {
    print_r($e->errorMessage());
}

$sql = "SELECT * FROM nmg_bestgood_hall";
mysqli_query($conn, "set charset utf8");
$arr = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);

$area = array_unique(array_column($arr, 'hall_area'));

$res = [];

foreach ($area as $value) {
    $tmp = [];
    foreach ($arr as $item) {
        if ($item['hall_area'] == $value) {
            $tmp[$value][] = $item;
        }
    }
    $res[] = [
        'hall' => array_values($tmp),
        'address' => $value,
        ];
}

var_dump($res);
