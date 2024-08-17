<?php

use App\Core\Database;

if (!$_SESSION['user']) {

    $data = getData();

    if (!empty($data)) {
        $config = require '../config/config.php';
        $db = new Database($config);
        $errors = [];
        if (strpos($data['email'], '@') === false) {
            $errors = [
                'email' => [
                    'error' => 'Invalid email address',
                ]
            ];

            return view('../views/auth/login.view.php', [
                'errors' => $errors
            ]);
        }

        $user = $db->getUser('select * from users where email = :email', $data['email']);

        if (isset($user) && password_verify($data['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            return view('../views/index.view.php');
        } else {
            $errors = [
                'password' => [
                    'error' => 'password is not correct',
                ]
            ];

            return view('../views/auth/login.view.php', [
                'errors' => $errors
            ]);
        }
    }
} else {
    return view('../views/404.php');
}
