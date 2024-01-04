<?php
 $connectionPath = __DIR__ . '/../../database/connection.php';

 if (file_exists($connectionPath)) {
     $conn = require_once($connectionPath);
 } else {
     echo "File not found: $connectionPath";
     exit;
 }
 
 if (!$conn) {
     die("Connection failed: " . print_r($conn->errorInfo(), true));
 }
 
 $procedureCall = "CALL InsertHall(?, ?, ?, ?, ?, ?)";
 
 $hallName = isset($_POST['hallName']) ? $_POST['hallName'] : '';  
 $hallAddress = isset($_POST['hallAddress']) ? $_POST['hallAddress'] : '';
 $hallTelNo = isset($_POST['hallTelNo']) ? $_POST['hallTelNo'] : '';
 $hallFaxNo = isset($_POST['hallFaxNo']) ? $_POST['hallFaxNo'] : '';
 $noOfRoomsInHall = isset($_POST['noOfRoomsInHall']) ? $_POST['noOfRoomsInHall'] : '';
 $managerEmployeeNo = isset($_POST['managerEmployeeNo']) ? $_POST['managerEmployeeNo'] : '';
    
 $stmt = $conn->prepare($procedureCall);
 
 if ($stmt === false) {
     die("Prepare failed: " . print_r($conn->errorInfo(), true));
 }
 
 $stmt->bind_param("ssssii", $hallName, $hallAddress, $hallTelNo, $hallFaxNo, $noOfRoomsInHall, $managerEmployeeNo);
 
 $result = $stmt->execute();
 
 if ($result === false) {
     die("Execute failed: " . print_r($stmt->errorInfo(), true));
 } else {
     echo "Record inserted successfully!";
 }
 
 $stmt->close();
 $conn = null;
  
 
?>
