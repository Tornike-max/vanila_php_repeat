<?php

function filterBooks($books, $by, $val)
{
    $filteredBooks = array_filter($books, fn($book) => $book[$by] === $val);

    return $filteredBooks;
};

function countPages($books)
{
    $reduced = array_reduce($books, fn($accum, $cur) => $accum + $cur['pages'], 0);
    return $reduced;
}

function mapBooks($books)
{
    $mappedBooks = array_map(fn($book) => $book, $books);
    return $mappedBooks;
}

function isUri($value)
{
    if ($_SERVER['REQUEST_URI'] === $value) {
        return true;
    } else {
        return false;
    }
}

function currentURI()
{
    return parse_url($_SERVER['REQUEST_URI']);
}

function currentPathVal()
{
    $idIndex = strpos(currentURI()['query'], '=');
    $idIfExists = substr(currentURI()['query'], $idIndex + 1) ?? null;
    return $idIfExists;
}


function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
    die();
}


function abort($responseCode = 404)
{
    http_response_code($responseCode);
    require "../views/$responseCode.php";
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}


function isAuth($condition, $status = 403)
{
    if (!$condition) {
        abort($status);
    }
}

function hasData($data)
{
    if (!$data) {
        abort(404);
    }
    return true;
}


function getData()
{
    $data = $_REQUEST;


    return $data;
}


function view($path, $attributes = [])
{
    extract($attributes);
    require $path;
}
