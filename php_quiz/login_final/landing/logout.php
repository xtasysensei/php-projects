<?php

function logout()
{
    session_start();
    unset($_SESSION["username"]);
    session_destroy();

    header("Location: http://localhost/login_final/public/login.php ");
    exit;
}

logout();
