<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DBUsers";

$db_connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



// $sql = "CREATE TABLE MyUsers(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL,
//     lastname VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     phone VARCHAR(30),
//     gender VARCHAR(20),
//     username VARCHAR(20),
//     user_password VARCHAR(20),
//     created_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// )";

// $db_connection->exec($sql);
// $db_connection = null;
