<?php
$connectionPath = $_SERVER['DOCUMENT_ROOT'] . '/database/connection.php';

if (file_exists($connectionPath)) {
    $conn = require_once($connectionPath);
} else {
    echo "File not found: $connectionPath";
    exit;
}

$studentNo = $_POST['studentNo'];
$studentFirstName = $_POST['studentFirstName'];
$studentSex = $_POST['studentSex'];
$studentDOB = $_POST['studentDOB'];  
$accommodationTypeRequired = $_POST['accommodationTypeRequired']; 
$accommodationDuration = $_POST['accommodationDuration']; 

$sql = "CALL BookAccommodation(?, ?, ?, ?, ?, ?, @leaseNo, @message)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssssss", $studentNo, $studentFirstName, $studentSex, $studentDOB, $accommodationTypeRequired, $accommodationDuration);
$stmt->execute();

$result = $conn->query("SELECT @leaseNo as leaseNo, @message as message");
$row = $result->fetch_assoc();

echo $row['message'];

$stmt->close();
$conn->close();
?>
