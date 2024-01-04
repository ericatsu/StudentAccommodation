<?php
require_once('../../database/connection.php');

$procedureCall = "CALL InsertApartment(?, ?, ?)";

$apartNo = $_POST['apartNo'];  
$apartAddress = $_POST['apartAddress'];  
$noOfRoomsInApart = $_POST['noOfRoomsInApart'];  


$stmt = $conn->prepare($procedureCall);
$stmt->bind_param(
    "iss",
    $apartNo,
    $apartAddress,
    $noOfRoomsInApart
);


$stmt->execute();


if ($stmt->error) {
    echo "Error: " . $stmt->error;
} else {
    echo "Record inserted successfully!";
}


$stmt->close();
$conn->close();
?>
