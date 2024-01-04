<?php
require_once('config.php');
// Database Connection Details
$hostname_login = DB_HOST;
$database_login = DB_DATABASE;
$username_login = DB_USER;
$password_login = DB_PASSWORD;

$db_login = mysqli_connect($hostname_login, $username_login, $password_login, $database_login);


// Check the connection
if (!$db_login) {
    die("Connection failed: " . mysqli_connect_error());
}
?>