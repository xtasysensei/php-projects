<?php

require_once __DIR__ . "/post.php";


?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="container" method="post">

    <h1>Sign Up</h1>
    <hr /><br>
    <label for="">First Name:</label><br>
    <input class="info" type="text" name="firstname" value="<?php echo htmlspecialchars($firstname) ?>" placeholder="enter your firstname">
    <small style="font-size: 14px; color: red;"><?php if ($first_errors != 1) {
                                                    echo "<br>{$first_errors}";
                                                } ?></small><br><br>

    <label for="">Last Name:</label><br>
    <input class="info" type="text" name="lastname" value="<?php echo htmlspecialchars($lastname) ?>" placeholder="enter your lastname">
    <small style="font-size: 14px; color: red;"><?php if ($last_errors != 1) {
                                                    echo "<br>{$last_errors}";
                                                } ?></small><br><br>

    <label for="">Email:</label><br>
    <input class="info" type="email" name="email" value="<?php echo htmlspecialchars($email) ?>" placeholder="enter your email">
    <small style="font-size: 14px; color: red;"><?php if ($email_errors != 1) {
                                                    echo "<br>{$email_errors}";
                                                } ?></small><br><br>

    <label for="">Phone:</label><br>
    <input class="info" type="tel" name="phone" value="<?php echo htmlspecialchars($phone) ?>" placeholder="enter your phone number">
    <small style="font-size: 14px; color: red;"><?php if ($phone_errors != 1) {
                                                    echo "<br>{$phone_errors}";
                                                } ?></small><br><br>

    <span class="sort-radio">
        <label for="">Gender:</label>

        <label for="">Male</label> <input type="radio" name="gender" value="male" />|<label for="">Female</label> <input type="radio" name="gender" value="female" />
    </span>
    <small style="font-size: 14px; color: red;"><?php if ($gender_errors != 1) {
                                                    echo "<br>{$gender_errors}";
                                                } ?></small><br><br>

    <label for="">Username:</label><br>
    <input class="info" type="text" name="username" value="<?php echo htmlspecialchars($user_name) ?>" placeholder="enter your username">
    <small style="font-size: 14px; color: red;"><?php if ($username_errors != 1) {
                                                    echo "<br>{$username_errors}";
                                                } ?></small><br><br>


    <label for="">New Password:</label><br>
    <input class="info" type="password" name="password" placeholder="enter a password">
    <small style="font-size: 14px; color: red;"><?php if ($password_errors != 1) {
                                                    echo "<br>{$password_errors}";
                                                } ?></small><br><br>

    <label for="">Confirm Password:</label><br>
    <input class="info" type="password" name="confirm_password" placeholder="confirm password"><br>
    <small style="font-size: 14px; color: red;"><?php if (isset($password) && $password_match_errors != 1) {
                                                    echo "<br>{$password_match_errors}";
                                                } ?></small><br><br>
    <button class="btn" type="submit" name="submit" value="submit">sign up!</button><br>
    <p>Already have an account?<a class="refs" href="./login.php">Login</a></p>
</form>

<?php
require_once __DIR__ . "/../../config/auth.php"
?>