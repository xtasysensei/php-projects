<?php
$user_name = '';
require_once __DIR__ . "/../src/inc/login-script.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="container">
        <h1>Login</h1>
        <hr />
        <br />
        <label for="">Username:</label><br>
        <input class="info" type="text" name="username" placeholder="enter your username" value="<?php echo htmlspecialchars($user_name) ?>" />
        <small style="font-size: 13px;"><?php if ($userErr != 1) {
                                            echo $userErr;
                                        } ?></small><br><br>
        <label for="">Password:</label><br>
        <input class="info" type="password" name="password" placeholder="enter your password" /><br>
        <small style="font-size: 13px;"><?php if ($passErr != 1) {
                                            echo $passErr;
                                        } ?></small><br>


        <input type="checkbox" name="remember" value="remember" id="">
        <label for="">Remember me</label><br><br>

        <button class="btn" type="submit" name="login" value="login"><strong>Login!</strong></button><br>
        <p>Dont have an account?<a href="index.php">Sign up</a></p>

    </form>
</body>

</html>