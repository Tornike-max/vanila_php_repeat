<?php

use App\Core\Database as CoreDatabase;

$config = require '../config/config.php';
// $id = substr(currentURI()['query'], -1);
$id = $_GET['id'] ?? null;
if (!$id) {
    die('ID not provided!');
}


$db = new CoreDatabase($config);
$note = $db->findOrFail('notes', $id);
view('../views/notes/note.php', [
    'note' => $note
]);
