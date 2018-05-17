<?php

return [
    'database' => [
        'name' => 'blog',
        'user' => 'root',
        'pass' => '123456',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ]
];
