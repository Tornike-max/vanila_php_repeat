<?php

use App\Core\Database\Database;

$config = require '../config/config.php';
// $id = substr(currentURI()['query'], -1);
$id = $_GET['id'];

$db = new Database($config);
$note = $db->findOrFail('notes', $id);

view('../views/notes/note.php', [
    'note' => $note
]);
