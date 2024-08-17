<?php

use App\Core\Router;

session_start();
require __DIR__ . '/../functions/functions.php';
require __DIR__ . '/../Core/Database.php';
require __DIR__ . '/../Core/Validator.php';

require __DIR__ . '/../Core/Router.php';

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router = new Router($method);

$routes = require __DIR__ . '/../routes.php';




// $router = new Router($_SERVER, $_REQUEST);

// $router->get('/', [NoteController::class, 'index']);
// $router->get('/note?id={id}', [NoteController::class, 'show']);

// $router->register();
