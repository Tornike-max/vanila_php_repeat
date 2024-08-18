<?php

if (!isset($_SESSION['user'])) {
    return view('../views/auth/register.view.php', [
        'errors' => $_SESSION['_flash'] ?? [],
        'old' => $_SESSION['old'] ?? []
    ]);
} else {
    return view('../views/404.php');
}
