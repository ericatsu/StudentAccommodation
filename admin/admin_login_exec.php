<?php
// Include the database connection file
require_once('connection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to check admin credentials
    $sql = "SELECT * FROM Admin WHERE username = ? AND password = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $db_login->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the result
    $result = $stmt->get_result();
    
    // Check if the admin is found
    if ($result->num_rows === 1) {
        // Admin is found, set session variables
        $_SESSION['admin_username'] = $username;
        
        // Redirect to the admin dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        // Admin not found, redirect to the login page with an error message
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
