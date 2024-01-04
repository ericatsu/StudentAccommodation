<?php
require_once('config.php');
// Database Connection Details
$hostname_login = DB_HOST;
$database_login = DB_DATABASE;
$username_login = DB_USER;
$password_login = DB_PASSWORD;


$conn = new PDO("mysql:host=$hostname_login;dbname=$database_login", $username_login, $password_login);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


return $conn;
?>