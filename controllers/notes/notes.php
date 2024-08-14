<?php

use App\Core\Database\Database;

$config = require '../config/config.php';

$db = new Database($config);
$notes = $db->query('select * from notes where user_id = :id', 1);

view('../views/notes/notes.php', [
    'notes' => $notes
]);
