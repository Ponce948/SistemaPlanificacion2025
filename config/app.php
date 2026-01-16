<?php

return [
    'host' => '127.0.0.1',
    'dbname' => 'web-php',
    'username' => 'root',          // ← aquí ROOT
    'password' => 'Admin123$',     // ← aquí tu contraseña de MySQL
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];
