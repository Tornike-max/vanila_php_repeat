<?php

use App\Core\Database;
use App\Http\Controllers\RegisterForm;

require 'RegisterForm.php';

if (!isset($_SESSION['user'])) {
    $data = getData();

    if (!empty($data)) {
        $config = require '../config/config.php';
        $db = new Database($config);
        $register = new RegisterForm();
        $users = $db->findAll('users');

        $_SESSION['old']['name'] = $data['name'];
        $_SESSION['old']['email'] = $data['email'];


        $validationErrors = $register->validate($data, $users);

        if (!empty($validationErrors)) {
            $_SESSION['_flash'] = $validationErrors;
            header('Location: /register');
            exit();
        }

        $data['password'] = hashedPassword($data['password']);

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
