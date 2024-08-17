<?php

use App\Core\Database as CoreDatabase;

$config = require '../config/config.php';

$db = new CoreDatabase($config);
$notes = $db->query("select * from notes where user_id = :id order by id desc", 1);

view('../views/notes/notes.php', [
    'notes' => $notes
]);
