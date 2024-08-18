<?php

if (!isset($_SESSION['user'])) {
    return view('../views/auth/register.view.php');
} else {
    return view('../views/404.php');
}
