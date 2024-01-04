<?php
// Include the database connection file
require_once('connection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check student credentials
    $sql = "SELECT * FROM Student WHERE studentFirstName = ? AND studentNo = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $db_login->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the result
    $result = $stmt->get_result();
    
    // Check if the student is found
    if ($result->num_rows === 1) {
        // Student is found, set session variables
        $_SESSION['student_username'] = $username;
        
        header('Location: index.php'); 
        exit();
    } else {
        // Student not found, redirect to the login page with an error message
        $_SESSION['login_error'] = "Invalid username or password";
        header('Location: login.php');
        exit();
    }
} else {
    // If the request method is not POST, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
