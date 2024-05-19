<?php
session_start();
require_once __DIR__ . "/check_avail.php";
$firstname = $lastname = $password = $phone = $email  = $gender = $user_name = "";
$first_errors = $last_errors = $email_errors = $phone_errors = $gender_errors = $username_errors = $password_errors = $password_match_errors = '';

$set_firstName = $set_lastName = $set_email = $set_password = $set_gender = $set_phone = $set_username = '';

const FIRSTNAME_REQUIRED = "* Please enter a valid first name";
const LASTNAME_REQUIRED = "* Please enter a valid last name";
const EMAIL_REQUIRED = "* Please enter a valid email address";
const EMAIL_EXIST = "* Email already exists";
const PHONE_REQUIRED = "* Please enter a valid phone number";
const GENDER_REQUIRED = "* Please select your gender";
const USERNAME_REQUIRED = "* Please enter a valid username";
const USERNAME_EXIST = "* Username already exists";
const PASSWORD_REQUIRED = "* Please enter a valid password";
const PASSWORD_MATCH = "* The password you entered doesn't match";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $validName = "/^[a-zA-Z ]*$/";
    $digitPassword = "/(?=.*?[0-9])/";
    $validEmail = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    $validUsername = "/^[a-z]\w{2,23}[^_]$/i";
    $validPassword = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/';


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_name = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];
    $otp = mt_rand(100000, 999999);

    function legal_input($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    if (empty($firstname)) {
        $first_errors = FIRSTNAME_REQUIRED;
    } else if (!preg_match($validName, $firstname)) {
        $first_errors = FIRSTNAME_REQUIRED;
    } else {
        $first_errors = 1;
        $firstname = legal_input($firstname);
        $_SESSION['firstname'] = $firstname;
    }

    if (empty($lastname)) {
        $last_errors = LASTNAME_REQUIRED;
    } else if (!preg_match($validName, $lastname)) {
        $last_errors = LASTNAME_REQUIRED;
    } else {
        $last_errors = 1;
        $lastname = legal_input($lastname);
    }


    $check_email = unique_email($email);

    if (empty($email)) {
        $email_errors = EMAIL_REQUIRED;
    } else if (!preg_match($validEmail, $email)) {
        $email_errors = EMAIL_REQUIRED;
    } else if ($check_email) {
        $email_errors = EMAIL_EXIST;
    } else {
        $email_errors = 1;
        $email = legal_input($email);
        $_SESSION["email"] = $email;
        $email_verify = 0;
    }


    if (empty($password)) {
        $password_errors = PASSWORD_REQUIRED;
    } //elseif (!preg_match($validPassword, $_POST['password'])) {
    //$password_errors = "*Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
    else if (!password_verify($confirm_password, $password)) {
        $password_match_errors = PASSWORD_MATCH;
    } else {
        $password_errors = 1;
        $password = legal_input($password);
    }

    if (empty($phone)) {
        $phone_errors = PHONE_REQUIRED;
    } else if (!preg_match($digitPassword, $phone)) {
        $phone_errors = PHONE_REQUIRED;
    } else {
        $phone_errors = 1;
        $phone = legal_input($phone);
    }

    $check_username = unique_username($user_name);

    if (empty($user_name)) {
        $username_errors = USERNAME_REQUIRED;
    } else if (!preg_match($validUsername, $user_name)) {
        $username_errors = USERNAME_REQUIRED;
    } else if ($check_username) {
        $username_errors = USERNAME_EXIST;
    } else {
        $username_errors = 1;
        $user_name = legal_input($user_name);
        $_SESSION["username"] = $user_name;
    }

    if (empty($_POST['gender'])) {
        $gender_errors = GENDER_REQUIRED;
    } else {
        $gender_errors = 1;
        $gender = legal_input($_POST['gender']);
    }
}
