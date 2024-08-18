<?php

use App\Core\Database;
use App\Core\Validator;

$config = require '../config/config.php';

$db = new Database($config);
$id = $_GET['id'];


$data = getData();

if (isset($id) && $data['_method'] === 'PATCH') {
    $update = $db->update('notes', $id, 'body', $data['body']);
    if ($update) {
        header('Location: /notes');
    } else {
        $errors[] = [
            'error' => "Can't update",
            'status' => false
        ];

        return view('../views/notes/editNote.php', [
            'errors' => $errors
        ]);
    }
}
