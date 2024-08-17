<?php

use App\Core\Database as CoreDatabase;

$config = require '../config/config.php';

$data = getData();
$id = $_GET['id'];
$errors = [];
if (isset($id) && $data['_method'] === 'DELETE') {
    $db = new CoreDatabase($config);
    $db->delete('notes', $id);
    return header('Location: /notes');
} else {
    $errors[] = [
        'error' => 'Error while deleting note',
        'status' => 'false'
    ];
    return $errors;
}
