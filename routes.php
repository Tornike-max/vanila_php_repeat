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


$router->get('/', '../controllers/index.php');
$router->get('/notes', '../controllers/notes/notes.php');
$router->get('/note', '../controllers/notes/note.php');
$router->get('/notes/create', '../controllers/notes/createNote.php');
$router->post('/notes/store', '../controllers/notes/storeNote.php');
$router->delete('/notes/delete', '../controllers/notes/deleteNote.php');
$router->get('/notes/edit', '../controllers/notes/editNote.php');
$router->patch('/notes/update', '../controllers/notes/updateNote.php');


$router->get('/about', '../controllers/about.php');
$router->get('/contact', '../controllers/contact.php');


$router->get('/register', '../controllers/register/create.php');
$router->post('/register/store', '../controllers/register/store.php');


$router->get('/login', '../controllers/login/create.php');
$router->post('/login/store', '../controllers/login/store.php');
$router->delete('/session/destroy', '../controllers/login/destroy.php');






$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$router->register($uri);
