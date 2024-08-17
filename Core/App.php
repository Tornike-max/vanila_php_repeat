<?php

namespace App\Core;


class App
{
    public Database $db;
    public static App $app;

    public function __construct($config)
    {
        self::$app = $this;
        $this->db = new Database($config);
    }
}
