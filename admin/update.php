<?php
require_once('../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $query = "UPDATE Student SET 
        studentFirstName = ?,
        studentMiddleInitial = ?,
        studentLastName = ?,
        studentHomeStreet = ?,
        studentHomeCity = ?,
        studentHomeState = ?,
        studentHomeZipCode = ?,
        studentHomeTelNo = ?,
        studentSex = ?,
        studentDOB = ?,
        studentType = ?,
        studentStatus = ?,
        accommodationTypeRequired = ?,
        accommodationDuration = ?
        WHERE studentNo = ?";

    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssssssssssi",
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
        $studentNo
    );
    $stmt->execute();

    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Record updated successfully.";
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
