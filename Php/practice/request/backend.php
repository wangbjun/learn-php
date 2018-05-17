<?php
var_dump($_GET['ids']);
var_dump($_REQUEST);
$input = json_decode(file_get_contents('php://input'), true);
var_dump($input);
