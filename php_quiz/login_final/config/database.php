<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myAppDB";

$db_connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
