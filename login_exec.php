<?php
require_once('./database/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if it's an admin login
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['admin_username'] = $username;
        header('Location: dashboard.php');
        exit();
    }

    $sql = "SELECT * FROM Student WHERE studentFirstName = ? AND studentNo = ?";
    $stmt = $db_login->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['student_username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid credentials";
        header('Location: login.php');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}
?>
