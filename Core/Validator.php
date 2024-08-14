<?php

namespace App\Core\Validator;

class Validator
{
    public static function string($val, $min = 1, $max = INF)
    {
        $result = strlen($val) >= $min && strlen($val) <= $max;

        return $result;
    }

    public static function isEmpty($val)
    {
        $result = $val === '';

        return $result;
    }
}
