<?php
require_once('../../database/connection.php');

$procedureCall = "CALL InsertStudent(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$studentNo = $_POST['studentNo'];  
$studentFirstName = $_POST['studentFirstName'];  
$studentMiddleInitial = $_POST['studentMiddleInitial'];  
$studentLastName = $_POST['studentLastName'];  
$studentHomeStreet = $_POST['studentHomeStreet'];  
$studentHomeCity = $_POST['studentHomeCity'];  
$studentHomeState = $_POST['studentHomeState'];  
$studentHomeZipCode = $_POST['studentHomeZipCode'];  
$studentHomeTelNo = $_POST['studentHomeTelNo'];  
$studentSex = $_POST['studentSex'];  
$studentDOB = $_POST['studentDOB'];  
$studentType = $_POST['studentType'];  
$studentStatus = $_POST['studentStatus'];  
$accommodationTypeRequired = $_POST['accommodationTypeRequired'];  
$accommodationDuration = $_POST['accommodationDuration'];  

// Prepare and bind parameters
$stmt = $conn->prepare($procedureCall);
$stmt->bind_param(
    "ississsssssssssi",
    $studentNo,
    $studentFirstName,
    $studentMiddleInitial,
    $studentLastName,
    $studentHomeStreet,
    $studentHomeCity,
    $studentHomeState,
    $studentHomeZipCode,
    $studentHomeTelNo,
    $studentSex,
    $studentDOB,
    $studentType,
    $studentStatus,
    $accommodationTypeRequired,
    $accommodationDuration
);

$stmt->execute();


if ($stmt->error) {
    echo "Error: " . $stmt->error;
} else {
    echo "Record inserted successfully!";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
