<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'Qwerty@12');
define('DB_DATABASE', 'studentaccommodation_db');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

    // Process Accommodation Information
    $accommodationTypeRequired = $_POST['accommodationTypeRequired'];
    $dateStart = $_POST['dateStart'];
    $dateLeave = $_POST['dateLeave'];

    // Common parameters for both Hall and Apartment
    $placeNo = $_POST['placeNo'];
    $duration = $_POST['duration'];

    // Hall Information
    $hallName = $_POST['hallName'];
    $roomNo = $_POST['roomNo'];
    $rentPerSemester = $_POST['rentPerSemester'];

    // Apartment Information
    $apartNo = $_POST['apartNo'];
    $apartAddress = $_POST['apartAddress'];
    $noOfRoomsInApart = $_POST['noOfRoomsInApart'];

    try {
        $conn->begin_transaction();

        // Insert student details into the Student table
        $stmt = $conn->prepare("INSERT INTO Student (
        studentNo,
        studentFirstName,
        studentMiddleInitial,
        studentLastName,
        studentHomeStreet,
        studentHomeCity,
        studentHomeState,
        studentHomeZipCode,
        studentHomeTelNo,
        studentSex,
        studentDOB,
        studentType,
        studentStatus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "sssssssssssss",
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
            $studentStatus
        );
        $stmt->execute();
        $stmt->close();

        // Insert accommodation details based on accommodation type
        if ($accommodationTypeRequired === 'hall') {
            $stmt = $conn->prepare("INSERT INTO Lease (
                studentNo,
        placeNo,
        duration,
        dateStart,
        dateLeave
            ) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssss",
                $studentNo,
                $placeNo,
                $duration,
                $dateStart,
                $dateLeave
            );
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO Room (placeNo,
            roomNo,
            rentPerSemester,
            hallName
        ) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $placeNo, $roomNo, $rentPerSemester, $hallName);
            $stmt->execute();
            $stmt->close();
        } elseif ($accommodationTypeRequired === 'apartment') {
            $stmt = $conn->prepare("INSERT INTO Apartment (
                apartNo,
                apartAddress,
                noOfRoomsInApart
            ) VALUES (?, ?, ?)");

            $stmt->bind_param(
                "sss",
                $apartNo,
                $apartAddress,
                $noOfRoomsInApart
            );
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO Lease (
                studentNo,
                placeNo,
                duration,
                dateStart,
                dateLeave
            ) VALUES (?, ?, ?, ?, ?)");

            $stmt->bind_param(
                "sssss",
                $studentNo,
                $placeNo,
                $duration,
                $dateStart,
                $dateLeave
            );
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO Room (
                placeNo,
                roomNo,
                rentPerSemester,
                apartNo
            ) VALUES (?, ?, ?, ?)");

            $stmt->bind_param(
                "ssss",
                $placeNo,
                $roomNo,
                $rentPerSemester,
                $apartNo
            );
            $stmt->execute();
            $stmt->close();
        }

        $conn->commit();
        $_SESSION['message'] = "Accommodation booked successfully.";
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['message'] = "Error: " . $e->getMessage();
    } finally {
        $conn->close();
        header('Location: ../index.php');
        exit;
    }
} else {
    header('Location: ../index.php');
    exit;
}
?>
