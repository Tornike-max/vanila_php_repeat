<?php

namespace App\Http\Controllers;


class LoginForm
{
    public $errors = [];

    public function validate($data)
    {
        if (strpos($data['email'], '@') === false) {
            $this->errors = [
                'email' => [
                    'error' => 'Invalid email address',
                ]
            ];
        }
        if (strlen($data['password']) < 6) {
            $this->errors = [
                'password' => [
                    'error' => 'Password should be at least 6 characters long'
                ]
            ];
        }

        return $this->errors;
    }

    public function login($user, $data)
    {
        if (isset($user) && password_verify($data['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            return view('../views/index.view.php');
        } else {
            return $this->errors = [
                'password' => [
                    'error' => 'password is not correct',
                ]
            ];
        }
    }
}
