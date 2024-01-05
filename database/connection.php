<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Qwerty@12');
define('DB_DATABASE', 'studentaccommodation_db');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// You can optionally set character set if needed
mysqli_set_charset($conn, "utf8");

return $conn;
?>
