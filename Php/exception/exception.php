<?php
require_once 'classEx.php';

try {
    $classEx = new classEx();
    $classEx->test();
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
