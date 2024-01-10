<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    $accommodationTypeRequired = $_POST['accommodationTypeRequired'];
    $hallName = $_POST['hallName'];
    $apartNo = $_POST['apartNo'];
    $duration = isset($_POST['duration']) ? $_POST['duration'] : null;
    $dateStart = $_POST['dateStart'];
    $dateLeave = $_POST['dateLeave'];
    $roomNo = $_POST['roomNo'];
    $placeNo = $_POST['placeNo'];
    $accommodationDuration = isset($_POST['accommodationDuration']) ? $_POST['accommodationDuration'] : null;

    $query = "CALL BookAccommodation(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param(
        "isssssssssssssssssss",
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
        $accommodationTypeRequired,
        $accommodationDuration,
        $hallName,
        $apartNo,
        $duration,
        $dateStart,
        $dateLeave,
        $roomNo,
        $placeNo
    );

    $stmt->execute();
    $stmt->close();

    echo '<script>
        alert("Accommodation booked successfully.");
        window.location.href = "dashboard.php";
         </script>';
}
