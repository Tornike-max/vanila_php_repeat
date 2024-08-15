<?php

use App\Controllers\NoteController;
use App\Core\Router;

require __DIR__ . '/../functions/functions.php';
require __DIR__ . '/../Core/Database.php';
require __DIR__ . '/../Core/Validator.php';

require __DIR__ . '/../Core/Router.php';
$router = new Router($_SERVER, $_REQUEST);

$router->get('/', [NoteController::class, 'index']);
$router->get('/note?id={id}', [NoteController::class, 'show']);

$router->register();
