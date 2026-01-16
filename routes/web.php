<?php

use App\Controllers\AboutController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\LinkController;
use App\Controllers\PostController;
use App\Controllers\EntidadesController;
use App\Controllers\ObjetivosController;
use App\Controllers\ProyectosController;
use Framework\Middleware\Authenticated;

$router->get('/',       [HomeController::class,     'index']);
$router->get('/about',  [AboutController::class,    'index']);
$router->get('/post',   [PostController::class,     'show']);

$router->get('/links',           [LinkController::class, 'index']);
$router->get('/links/create',    [LinkController::class, 'create'],  Authenticated::class);
$router->post('/links/store',    [LinkController::class, 'store'],   Authenticated::class);
$router->get('/links/edit',      [LinkController::class, 'edit'],    Authenticated::class);
$router->put('/links/update',    [LinkController::class, 'update'],  Authenticated::class);
$router->delete('/links/delete', [LinkController::class, 'destroy'], Authenticated::class);

$router->get('/entidades',        [EntidadesController::class, 'index'], Authenticated::class);
$router->get('/entidades/create', [EntidadesController::class, 'create'], Authenticated::class);
$router->post('/entidades/store', [EntidadesController::class, 'store'], Authenticated::class);

$router->get('/objetivos',        [ObjetivosController::class, 'index'], Authenticated::class);
$router->get('/objetivos/create', [ObjetivosController::class, 'create'], Authenticated::class);
$router->post('/objetivos/store', [ObjetivosController::class, 'store'], Authenticated::class);

$router->get('/proyectos',        [ProyectosController::class, 'index'], Authenticated::class);
$router->get('/proyectos/create', [ProyectosController::class, 'create'], Authenticated::class);
$router->post('/proyectos/store', [ProyectosController::class, 'store'], Authenticated::class);

$router->get('/entidades/edit',   [EntidadesController::class, 'edit'],   Authenticated::class);
$router->put('/entidades/update', [EntidadesController::class, 'update'], Authenticated::class);
$router->delete('/entidades/delete', [EntidadesController::class, 'destroy'], Authenticated::class);

$router->get('/objetivos/edit',   [ObjetivosController::class, 'edit'],   Authenticated::class);
$router->put('/objetivos/update', [ObjetivosController::class, 'update'], Authenticated::class);
$router->delete('/objetivos/delete', [ObjetivosController::class, 'destroy'], Authenticated::class);

$router->get('/proyectos/edit',   [ProyectosController::class, 'edit'],   Authenticated::class);
$router->put('/proyectos/update', [ProyectosController::class, 'update'], Authenticated::class);
$router->delete('/proyectos/delete', [ProyectosController::class, 'destroy'], Authenticated::class);


$router->get('/login',  [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->post('/logout', [AuthController::class, 'logout'], Authenticated::class);