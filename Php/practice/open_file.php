<?php
$file = '/var/www/html/index.php';

$fh = fopen($file, 'r+');

while ($fr = fgets($fh)) {
    var_dump($fr);
}