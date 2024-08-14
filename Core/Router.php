<?php

$uri = currentURI()['path'];
// $uri = $_SERVER['REQUEST_URI'];
class Router
{
    public function get() {}

    public function post() {}

    public function put() {}

    public function patch() {}

    public function delete() {}
}



// if ($uri === '/') {
//     require 'controllers/index.php';
// } elseif ($uri === '/contact') {
//     require 'controllers/contact.php';
// } elseif ($uri === '/about') {
//     require 'controllers/about.php';
// }

$routes = [
    '/' => __DIR__ . '/../controllers/index.php',
    '/notes' => __DIR__ . '/../controllers/notes/notes.php',
    '/note' => __DIR__ . '/../controllers/notes/note.php',
    '/notes/create' => __DIR__ . '/../controllers/notes/createNote.php',
    '/notes/store' => __DIR__ . '/../controllers/notes/storeNote.php',
    '/contact' => __DIR__ . '/../controllers/contact.php',
    '/about' => __DIR__ . '/../controllers/about.php'
];

routeToController($uri, $routes);
