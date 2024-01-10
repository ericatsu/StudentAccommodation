<?php
require_once('../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['studentNo'])) {
        $studentNo = $_GET['studentNo'];

        // Delete the row from the database
        $query = "DELETE FROM Student WHERE studentNo = ?";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die("Error in prepare statement: " . $conn->error);
        }

        $stmt->bind_param("i", $studentNo);
        $stmt->execute();

        if ($stmt->error) {
            echo "Error: " . $stmt->error;
        } else {
            echo "Record deleted successfully.";
        }

        $stmt->close();
    } else {
        echo "Invalid request. Missing studentNo parameter.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
