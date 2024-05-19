<?php
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/post.php";

function unique_username($user_name)
{
    global $db_connection;
    $sql = "SELECT username FROM  MyUsers WHERE username=:username";
    $query = $db_connection->prepare($sql);
    $query->bindParam(':username', $user_name, PDO::PARAM_STR);
    $query->execute();
    $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function unique_email($email)
{

    global $db_connection;
    $sql = "SELECT email FROM  MyUsers WHERE email=:email";
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
