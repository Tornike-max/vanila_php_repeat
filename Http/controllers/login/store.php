<?php

use App\Core\Database;
use App\Http\Controllers\LoginForm;

require 'loginForm.php';

if (!isset($_SESSION['user'])) {

    $data = getData();

    if (!empty($data)) {
        $config = require '../config/config.php';
        $db = new Database($config);

        $loginForm = new LoginForm();

        $validationErrors = $loginForm->validate($data);


        if (!empty($validationErrors)) {
            return view('../views/auth/login.view.php', [
                'errors' => $validationErrors
            ]);
        }

        $user = $db->getUser('select * from users where email = :email', $data['email']);

        $loginForm->login($user, $data);
    }
} else {
    return view('../views/404.php');
}
