<?php
$config = require 'config/config.php';
// $id = substr(currentURI()['query'], -1);
$id = $_GET['id'];

$db = new Database($config);
$note = $db->findOrFail('notes', $id);
// dd($note);

include_once 'views/note.php';
