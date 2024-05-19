
<?php

session_start();
require_once __DIR__ . "/../../config/database.php";


$db = $db_connection;

$login = $userErr = $passErr = '';


function user_logged_in()
{
    return isset($_SESSION["username"]);
}

if (isset($_POST["login"])) {

    $validUsername = "/^[a-z]\w{2,23}[^_]$/i";

    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if (empty($user_name)) {
        $userErr = "username is Required";
    } else if (!preg_match($validUsername, $username)) {
        $userErr = "Invalid Username";
    } else {
        $userErr = true;
    }


    if (empty($password)) {
        $passErr = "Password is Required";
    } else {
        $passErr = true;
    }

    if ($userErr == 1 && $passErr == 1) {
        function legal_input($value)
        {
            $value = trim($value);
            $value = stripcslashes($value);
            $value = htmlspecialchars($value);
            return $value;
        }

        $user_name = legal_input($user_name);
        $password =  legal_input($password);
        echo $user_name;
        echo $password;

        function find_user($user_name)
        {
            global $db;

            $sql = "SELECT username, user_password FROM myAppUsers WHERE username=:username";
            $action = $db->prepare($sql);
            $action->bindValue(':username', $user_name, PDO::PARAM_STR);
            $action->execute();
            return $action->fetch(PDO::FETCH_ASSOC);
        }


        function login($user_name, $password)
        {
            $user = find_user($user_name);

            if ($user && password_verify($password, $user["user_password"])) {
                $_SESSION["user_id"] = $user["id"];
                header("Location: http://localhost/login_final/landing/landing.php ");
                exit;
                return true;
            }

            return false;
        }
        $login = login($user_name, $password);
        echo $login;
    }



    // login($user_name, $password);
    // echo $login;
    // if ($login) {
    //     header("Location: http://localhost/login_final/landing/landing.php ");
    //     exit;
    // }


}







?>
