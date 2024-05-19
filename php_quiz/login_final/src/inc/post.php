<?php
session_start();
//require_once __DIR__ . "/check_avail.php";

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
    $validPassword = '/^(?=.*\d)(?=.*[@#\-_$%^&+=!\])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=!\?]{8,20}$/';


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_name = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];

    function legal_input($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}
