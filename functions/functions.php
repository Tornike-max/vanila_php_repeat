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


function dd($val)
{
    echo '<pre>';
    var_dump($val);
    echo '</pre>';
    die();
}


function abort($responseCode)
{
    http_response_code($responseCode);
    require 'views/404.php';
    die();
}
