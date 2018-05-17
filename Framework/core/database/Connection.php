<?php

namespace App\Core\Database;

use PDO;
use PDOException;

class Connection
{
    public static function make($config)
    {
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['user'],
                $config['pass'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}