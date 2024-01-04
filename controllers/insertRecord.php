<?php
  require_once('../database/connection.php');

  try {
    // Establish database connection
    $conn = new PDO("mysql:host=$hostname_login;dbname=$database_login", $username_login, $password_login);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query
    $sql = "INSERT INTO your_table (column1, column2)
    VALUES (:value1, :value2)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':value1', $value1);
    $stmt->bindParam(':value2', $value2);

    // Set values and execute
    $value1 = 'your_value1';
    $value2 = 'your_value2';
    $stmt->execute();

    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>