<?php

$uri = currentURI()['path'];
// $uri = $_SERVER['REQUEST_URI'];



// if ($uri === '/') {
//     require 'controllers/index.php';
// } elseif ($uri === '/contact') {
//     require 'controllers/contact.php';
// } elseif ($uri === '/about') {
//     require 'controllers/about.php';
// }

$routes = [
    '/' => 'controllers/index.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',
    '/notes/create' => 'controllers/createNote.php',
    '/notes/store' => 'controllers/storeNote.php',
    '/contact' => 'controllers/contact.php',
    '/about' => 'controllers/about.php'
];

routeToController($uri, $routes);
