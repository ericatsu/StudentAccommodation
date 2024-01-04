<?php
require_once('../../database/connection.php');

$procedureCall = "CALL InsertRoom(?, ?, ?, ?, ?)";

$placeNo = $_POST['placeNo'];  
$roomNo = $_POST['roomNo'];  
$rentPerSemester = $_POST['rentPerSemester'];  
$hallName = $_POST['hallName'];  
$apartNo = $_POST['apartNo'];  


$stmt = $conn->prepare($procedureCall);
$stmt->bind_param("iidsi", $placeNo, $roomNo, $rentPerSemester, $hallName, $apartNo);


$stmt->execute();


if ($stmt->error) {
    echo "Error: " . $stmt->error;
} else {
    echo "Record inserted successfully!";
}

$stmt->close();
$conn->close();
?>
