<?php
$config = require 'config/config.php';

$db = new Database($config);
$notes = $db->query('select * from notes where user_id = :id', 1);

include_once 'views/notes.php';
