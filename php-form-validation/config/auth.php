<?php

require_once __DIR__ . "/database.php";
require_once __DIR__ . "/../src/inc/post.php";

if (isset($_POST['submit']) && $first_errors == 1 && $last_errors == 1 && $email_errors == 1 && $phone_errors == 1 && $username_errors == 1 && $gender_errors == 1 && $password_errors == 1) {
    $sql = "INSERT INTO MyUsers (
        firstname,
        lastname,
        email,
        phone,
        gender,
        username,
        user_password,
        emailOtp,
        isEmailVerify
    )
    VALUES (:firstname, :lastname, :email, :phone, :gender, :username, :user_password, :otp, :isactive)";
    $query = $db_connection->prepare($sql);
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_INT);
    $query->bindParam(':gender', $gender, PDO::PARAM_STR);
    $query->bindParam(':username', $user_name, PDO::PARAM_STR);
    $query->bindParam(':user_password', $password, PDO::PARAM_STR);
    $query->bindParam(':otp', $otp, PDO::PARAM_STR);
    $query->bindParam(':isactive', $email_verify, PDO::PARAM_STR);
    $query->execute();
    $lastInsertedId = $db_connection->lastInsertId();


    $subject = "Email verification otp";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: maiwuyashem@gmail.com" . "\r\n" . "CC: {$email}";
    $message .= "<html><div>Dear {$firstname}</div></br></br>";
    $message .= "<div>Thank you for registering. Your OTP for account verification is <strong>{$otp}</strong></div></body></html>";
    mail($email, $subject, $message, $headers);
    header("Location: ../../project/public/verify.php ");
    exit;
}

$db_connection = null;
