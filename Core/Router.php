<?php

namespace App\Core;


class Router
{
    protected $routes = [];
    protected $method;
    public function __construct($method)
    {
        $this->method = strtoupper($method);
    }

    protected function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public function get($uri, $controller)
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        $this->add($uri, $controller, 'POST');
    }

    public function patch($uri, $controller)
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller)
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function delete($uri, $controller)
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function register($uri)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $this->method) {
                return require $route['controller'];
            };
        }
        abort();
    }
}

// use Exception;

// require '../controllers/NoteController.php';

// $uri = currentURI()['path'];
// $uri = $_SERVER['REQUEST_URI'];
// class Router
// {
//     public $method;
//     public $request;
//     protected $routes = [];
//     public function __construct($method, $request)
//     {
//         $this->method = $method;
//         $this->request = $request;
//     }
//     public function get($path, $callback)
//     {

//         $idIfExists = currentPathVal();
//         dd($this->method['REQUEST_URI']);
//         if ($this->method['REQUEST_METHOD'] === 'GET' && $path === $this->method['REQUEST_URI']) {
//             $this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']] = $callback;
//         }
//     }

//     public function register()
//     {
//         dd($this->routes);
//         if ($this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']]) {
//             $class = $this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']][0];
//             $classMethod =  $this->routes[$this->method['REQUEST_METHOD']][$this->method['REQUEST_URI']][1];
//             if (class_exists($class)) {
//                 if (method_exists(new $class(), $classMethod)) {
//                     $classObject = new $class();
//                     call_user_func([$classObject, $classMethod]);
//                 }
//             }
//         } else {
//             throw new Exception("Method does not exist in class");
//         };
//     }

//     public function post() {}

//     public function put() {}

//     public function patch() {}

//     public function delete() {}
// }



// if ($uri === '/') {
//     require 'controllers/index.php';
// } elseif ($uri === '/contact') {
//     require 'controllers/contact.php';
// } elseif ($uri === '/about') {
//     require 'controllers/about.php';
// }


// routeToController($uri, $routes);
