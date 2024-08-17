<?php

$data = getData();

if ($data['_method'] === 'DELETE' && isset($_SESSION['user'])) {
    $_SESSION['user'] = '';
    if ($_SESSION['user'] === '') {
        return view('../views/auth/login.view.php');
    }
}
