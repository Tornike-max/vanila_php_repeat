<?php

$uri = currentURI()['path'];


// if ($uri === '/') {
//     require 'controllers/index.php';
// } elseif ($uri === '/contact') {
//     require 'controllers/contact.php';
// } elseif ($uri === '/about') {
//     require 'controllers/about.php';
// }

$routes = [
    '/' => 'controllers/index.php',
    '/contact' => 'controllers/contact.php',
    '/about' => 'controllers/about.php'
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort(404);
}
