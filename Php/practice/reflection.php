<?php
require 'Person.php';

//正常调用
//$person = new Person();

//反射调用
$person = new ReflectionClass('Person');
var_dump($person);

$instance = $person->newInstance();
var_dump($instance);

$instance->name = 'JWang';
var_dump($instance);
$instance->say();
