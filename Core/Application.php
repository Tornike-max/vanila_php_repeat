<?php

namespace App\Core;

use App\Core\Database;
use App\Core\Validator\Validator;

class Application
{
    public static Application $app;
    public Database $db;
    public Validator $validator;

    public function __construct($config)
    {
        self::$app = $this;
        $this->db = new Database($config);
        $this->validator = new Validator();
    }
};
