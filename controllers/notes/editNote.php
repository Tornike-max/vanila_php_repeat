<?php

use App\Core\Database;

$config = require '../config/config.php';
$db = new Database($config);
$id = $_GET['id'];

$data = $db->findOrFail('notes', $id);
if (!isset($data)) {
    header("Location: /notes/edit?=$id");
};

view('../views/notes/editNote.php', [
    'data' => $data
]);
