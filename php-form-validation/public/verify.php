<?php
session_start();
require_once __DIR__ . "/../config/database.php";
$detailErr = $email = "";

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}

if (isset($_SESSION["firstname"])) {
    $firstname = $_SESSION["firstname"];
}

if (isset($_POST['verify'])) {

    $otp = $_POST['emailotp'];
    $sql = "SELECT emailOtp FROM MyUsers WHERE email=:email";
    $query = $db_connection->prepare($sql);
    $query->execute(array(':email' => $email));
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $dbopt = $row['emailOtp'];
    }
    if ($dbopt != $otp) {
        $detailErr = "*Please enter the correct otp";
    } else {
        $email_verify = 1;
        $sql = "UPDATE MyUsers SET isEmailVerify=:emailverify WHERE email=:email";
        $action = $db_connection->prepare($sql);
        $action->bindParam(':email', $email, PDO::PARAM_STR);
        $action->bindParam(':emailverify', $email_verify, PDO::PARAM_STR);
        $action->execute();
        echo "<script>alert('OTP verified!')</script>";
        header("Location: ../../project/public/login.php ");
    }
};

if (isset($_POST['resend'])) {
    $otp = mt_rand(100000, 999999);
    $sql = "UPDATE MyUsers SET emailOtp=:otp WHERE email=:email";
    $statement = $db_connection->prepare($sql);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':otp', $otp, PDO::PARAM_STR);
    $statement->execute();

    $subject = "Email verification otp";
    $header .= "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $header .= "From: maiwuyashem@gmail.com" . "\r\n" . "CC: {$email}";
    $mess .= "<html><body><div>Dear {$firstname}</div></br></br>";
    $mess .= "<div>Thank you for registering. Your OTP for account verification is <strong>{$otp}</strong></div></body></html>";
    mail($email, $subject, $mess, $header);
    $detailErr = "We've resent the code to your email";
}

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
        <h1>Verify</h1>
        <hr />
        <br />
        <div style="color: red; font-size: 14px;"><?php echo $detailErr; ?></div><br>
        <p style="font-size: 15px;">We've sent a six digit code to <?php echo "<emp style='color: #efa424;'>{$email}</emp>"; ?></p><br>
        <p style="font-size: 15px;">Please enter the code verify your account</p><br>

        <label for="">Email OTP:</label><br>
        <input class="info" type="text" name="emailotp" placeholder="enter code" /><br><br>

        <button class="btn" type="submit" name="verify" value="verify"><strong> Verify!</strong></button><br>
        <p style="font-size: 14px;">Haven't recieved code? <button class="resend" name="resend" value="resend">Resend otp</button></p><br>

    </form>
</body>

</html>