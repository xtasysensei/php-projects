<?php

function logout()
{
    session_start();
    unset($_SESSION["username"]);
    unset($_SESSION["firstname"]);
    unset($_SESSION["email"]);
    session_destroy();

    header("Location: http://localhost/project/public/login.php ");
    exit;
}

logout();
