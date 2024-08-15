<?php

namespace App\Core;

use Exception;

require '../controllers/NoteController.php';

// $uri = currentURI()['path'];
// $uri = $_SERVER['REQUEST_URI'];
class Router
{
    public $method;
    public $request;
    protected $routes = [];
    public function __construct($method, $request)
    {
        $this->method = $method;
        $this->request = $request;
    }
    public function get($path, $callback)
    {

        $idIfExists = currentPathVal();
        dd($this->method['REQUEST_URI']);
        if ($this->method['REQUEST_METHOD'] === 'GET' && $path === $this->method['REQUEST_URI']) {
            $this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']] = $callback;
        }
    }

    public function register()
    {
        dd($this->routes);
        if ($this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']]) {
            $class = $this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']][0];
            $classMethod =  $this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']][1];
            if (class_exists($class)) {
                if (method_exists(new $class(), $classMethod)) {
                    $classObject = new $class();
                    call_user_func([$classObject, $classMethod]);
                }
            }
        } else {
            throw new Exception("Method does not exist in class");
        };
    }

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

// $routes = [
//     '/' => __DIR__ . '/../controllers/index.php',
//     '/notes' => __DIR__ . '/../controllers/notes/notes.php',
//     '/note' => __DIR__ . '/../controllers/notes/note.php',
//     '/notes/create' => __DIR__ . '/../controllers/notes/createNote.php',
//     '/notes/store' => __DIR__ . '/../controllers/notes/storeNote.php',
//     '/contact' => __DIR__ . '/../controllers/contact.php',
//     '/about' => __DIR__ . '/../controllers/about.php'
// ];

// routeToController($uri, $routes);
