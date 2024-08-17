<?php

if ($_SESSION['user'] === '') {
    return view('../views/auth/login.view.php');
} else {
    return view('../views/404.php');
}
