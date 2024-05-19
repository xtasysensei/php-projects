<?php
require_once __DIR__ . "/../../config/database.php";
 require_once __DIR__ . "/post.php";

if(!empty($_POST['username'])

    $sql = "SELECT username FROM  myAppUsers WHERE username=:username";
    $query = $db_connection->prepare($sql);
    $query->bindParam(':username', $user_name, PDO::PARAM_STR);
    $query->execute();
    $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $username_errors = USERNAME_EXIST;
    } else {
    }
}

function unique_email($email)
{

    global $db_connection;
    $sql = "SELECT email FROM  myAppUsers WHERE email=:email";
    $query = $db_connection->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
