<?php

return [
    'db' => [
        "mysql" => [
            'host' => 'localhost',
            'dbname' => 'blog_site',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ],

        "sqlite" => [
            'dbname' => 'blog_site',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
            ],

        "postgresql" => [
            'host' => 'localhost',
            'dbname' => 'blog_site',
            'username' => 'postgres',
            'password' => '',
            'charset' => 'utf8',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ],

        "sqlserver" => [
            'host' => 'localhost',
            'dbname' => 'blog_site',
            'username' => 'sa',
            'password' => '',
            'charset' => 'utf8',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ]
    ]
];
