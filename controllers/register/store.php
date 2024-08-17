<?php

use App\Core\Database;

if (!$_SESSION['user']) {
    $data = getData();

    if (!empty($data)) {
        $config = require '../config/config.php';
        $db = new Database($config);
        $errors = [];


        if ($data['password'] !== $data['password_confirmation']) {
            $errors = [
                'password' => [
                    'error' => 'Passwords should match',
                ]
            ];
            return view('../views/auth/register.view.php', [
                'errors' => $errors
            ]);
        };

        if (strlen($data['name'] < 2)) {
            $errors = [
                'name' => [
                    'error' => 'Name should be at least 2 characters long',
                ]
            ];

            return view('../views/auth/register.view.php', [
                'errors' => $errors
            ]);
        }

        if (strpos($data['email'], '@') === false) {
            $errors = [
                'email' => [
                    'error' => 'Invalid email address',
                ]
            ];

            return view('../views/auth/register.view.php', [
                'errors' => $errors
            ]);
        }

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $validatedData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        $register = $db->register('insert into users (name,email,created_at,password) values(:name,:email,:created_at,:password)', $validatedData);
        return view('../views/auth/login.view.php');
    }
} else {
    return view('../views/404.php');
}
