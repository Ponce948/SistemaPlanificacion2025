<?php

$title = 'Entidades';

// $db viene creado en public/index.php usando la clase Database
$entidades = $db->query('SELECT * FROM entidades ORDER BY id DESC')->get();

require __DIR__ . '/../../resources/entidades.template.php';
