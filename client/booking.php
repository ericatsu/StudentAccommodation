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
$hallName = $_POST['hallName'];              
$apartmentNumber = $_POST['apartmentNumber'];
$leaseDuration = $_POST['leaseDuration'];
$leaseStartDate = $_POST['leaseStartDate'];
$leaseLeaveDate = $_POST['leaseLeaveDate'];
$roomNumber = $_POST['roomNumber'];            
$placeNumber = $_POST['placeNumber'];    

$sql = "CALL BookAccommodation(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @leaseNo, @message)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param(
    "sssssssssssssssssssss",
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
    $accommodationDuration,
    $hallName,
    $apartmentNumber,
    $leaseDuration,
    $leaseStartDate,
    $leaseLeaveDate,
    $roomNumber,
    $placeNumber
);

$stmt->execute();

$result = $conn->query("SELECT @leaseNo as leaseNo, @message as message");
$row = $result->fetch_assoc();

echo $row['message'];

$stmt->close();
$conn->close();
?>
