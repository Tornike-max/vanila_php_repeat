<?php

$config = require 'config/config.php';

$db = new Database($config);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = getData();
    $errors = [];
    if (!Validator::isEmpty($data['body'])) {
        $errors = [
            'error' => 'Body is required'
        ];
        require 'views/createNote.php';
    }

    if (!Validator::string($data['body'], 1, 500)) {
        $errors = [
            'error' => 'The body can not be more than 55 characters'
        ];
        require 'views/createNote.php';
    }
    if (empty($errors)) {
        $data['user_id'] = 1;

        $db->create('notes', $data);


        require 'views/createNote.php';
    }
}
