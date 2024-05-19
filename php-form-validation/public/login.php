<?php
session_start();
$user_name = '';
require_once __DIR__ . "/../config/database.php";


$db = $db_connection;

$login = $userErr = $passErr = $detailErr = '';

if (isset($_POST["login"])) {
    $user_name = $_POST["username"];
    $password = $_POST["password"];

    function legal_input($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    if (empty($user_name)) {
        $userErr = "*Username is Required";
    } else {
        $userErr = 1;
        $user_name = legal_input($user_name);
    }

    if (empty($password)) {
        $passErr = "*Password is Required";
    } else {
        $passErr = 1;
        $password =  legal_input($password);
    }

    $sql = "SELECT username, isEmailVerify, user_password FROM MyUsers WHERE username=:username";
    $action = $db->prepare($sql);
    $action->bindValue(':username', $user_name);
    $action->execute();
    $result = $action->fetch(PDO::FETCH_ASSOC);

    if ($result === false) {
        $detailErr = "*Invalid details!";
    } else {
        $validPassword = password_verify($password, $result['user_password']);
        if ($result['isEmailVerify'] == 1) {
            $verified = true;
        }

        if ($validPassword && $verified) {
            $_SESSION['username'] = $user_name;
            // echo "<script>window.location.replace('/../project/landing/landing.php')</script>";
            header("Location: http://localhost/project/landing/landing.php ");
            exit;
        } else if ($validPassword && !$verified) {
            $detailErr = "Please verify your account";
        } else {
            $detailErr = "*Invalid username or password!";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="container">
        <h1>Login</h1>
        <hr />
        <br />
        <div style="color: red; font-size: 14px;"><?php echo $detailErr; ?><br><br></div><br>
        <label for="">Username:</label><br>
        <input class="info" type="text" name="username" placeholder="enter your username" value="<?php echo htmlspecialchars($user_name) ?>" />
        <small style="font-size: 14px; color: red;"><?php if ($userErr != 1) {
                                                        echo $userErr;
                                                    } ?></small><br><br>
        <label for="">Password:</label><br>
        <input class="info" type="password" name="password" placeholder="enter your password" /><br>
        <small style="font-size: 14px; color: red;"><?php if ($passErr != 1) {
                                                        echo $passErr;
                                                    } ?></small><br>


        <a class="refs" href="forgot.php">Forgot Password?</a><br><br>
        <button class="btn" type="submit" name="login" value="login"><strong>Login!</strong></button><br>
        <p>Dont have an account?<a class="refs" href="index.php">Sign up</a></p>

    </form>
</body>

</html>