<?php

// $routes = [
//     '/' => __DIR__ . '/../controllers/index.php',
//     '/notes' => __DIR__ . '/../controllers/notes/notes.php',
//     '/note' => __DIR__ . '/../controllers/notes/note.php',
//     '/notes/create' => __DIR__ . '/../controllers/notes/createNote.php',
//     '/notes/store' => __DIR__ . '/../controllers/notes/storeNote.php',
//     '/contact' => __DIR__ . '/../controllers/contact.php',
//     '/about' => __DIR__ . '/../controllers/about.php'
// ];


$router->get('/', '../Http/controllers/index.php');
$router->get('/notes', '../Http/controllers/notes/notes.php');
$router->get('/note', '../Http/controllers/notes/note.php');
$router->get('/notes/create', '../Http/controllers/notes/createNote.php');
$router->post('/notes/store', '../Http/controllers/notes/storeNote.php');
$router->delete('/notes/delete', '../Http/controllers/notes/deleteNote.php');
$router->get('/notes/edit', '../Http/controllers/notes/editNote.php');
$router->patch('/notes/update', '../Http/controllers/notes/updateNote.php');


$router->get('/about', '../Http/controllers/about.php');
$router->get('/contact', '../Http/controllers/contact.php');


$router->get('/register', '../Http/controllers/register/create.php');
$router->post('/register/store', '../Http/controllers/register/store.php');


$router->get('/login', '../Http/controllers/login/create.php');
$router->post('/login/store', '../Http/controllers/login/store.php');
$router->delete('/session/destroy', '../Http/controllers/login/destroy.php');






$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$router->register($uri);
