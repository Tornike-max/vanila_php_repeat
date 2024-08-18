<?php

$data = getData();

if ($data['_method'] === 'DELETE' && isset($_SESSION['user'])) {
    session_destroy();

    header('Location: /login');
}
