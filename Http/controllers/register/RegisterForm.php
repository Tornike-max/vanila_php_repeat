<?php

namespace App\Http\Controllers;

class RegisterForm
{
    public $errors = [];

    public function validate($data, $users)
    {
        foreach ($users as $user) {
            if ($data['email'] === $user['email']) {
                $this->errors = [
                    'email' => [
                        'error' => 'Email must be unique'
                    ]
                ];
            }
        };

        if (strpos($data['email'], '@') === false) {
            $this->errors = [
                'email' => [
                    'error' => 'Invalid email address',
                ]
            ];
        }

        if ($data['password'] !== $data['password_confirmation']) {
            $this->errors = [
                'password' => [
                    'error' => 'Passwords should match',
                ]
            ];
        };

        if (strlen($data['password']) < 6) {
            $this->errors = [
                'password' => [
                    'error' => 'Password must be at least 6 characters long'
                ]
            ];
        }

        if (strlen($data['name']) < 2) {
            $this->errors = [
                'name' => [
                    'error' => 'Name should be at least 2 characters long',
                ]
            ];
        }


        return $this->errors;
    }
}
