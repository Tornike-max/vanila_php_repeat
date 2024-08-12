<?php
require 'functions/functions.php';

// require 'router.php';

require 'models/Database.php';
$config = require 'config/config.php';

$db = new Database($config);
$posts = $db->query('select * from posts');

$users = $db->selectUsers("select * from users where id = :id");


foreach ($users as $user) {
    echo "<li>$user[name]</li>";
};
foreach ($posts as $post) {
    echo "<li>$post[title]</li>";
};
