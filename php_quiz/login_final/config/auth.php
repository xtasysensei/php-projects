<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/../src/inc/post.php";

echo $firstname;
if (isset($_POST['submit']) && $first_errors == 1 && $last_errors == 1 && $email_errors == 1 && $phone_errors == 1 && $username_errors == 1 && $gender_errors == 1 && $password_errors == 1) {
    $sql = "INSERT INTO myAppUsers (
        firstname,
        lastname,
        email,
        phone,
        gender,
        username,
        user_password
    )
    VALUES (':fname', ':lname', ':email', ':phone', ':gender', ':username', ':passsword')";
    $query = $db_connection->prepare($sql);

    $query->bindParam(':fname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_INT);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':username', $user_name, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);

    $query->execute();
    header("Location: http://localhost/login_final/landing/landing.php ");
    exit;
}




$db_connection = null;
