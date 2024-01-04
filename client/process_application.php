<?php
    // Correct the paths to your PHP files
    $connectionPath = $_SERVER['DOCUMENT_ROOT'] . '/database/connection.php';
    $insertHallPath = $_SERVER['DOCUMENT_ROOT'] . '/controllers/insert/insertHall.php';
    $insertApartmentPath = $_SERVER['DOCUMENT_ROOT'] . '/controllers/insert/insertApartment.php';
    $insertStudentPath = $_SERVER['DOCUMENT_ROOT'] . '/controllers/insert/insertStudent.php';
    $insertRoomPath = $_SERVER['DOCUMENT_ROOT'] . '/controllers/insert/insertRoom.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $accommodationType = $_POST['accommodationType'];

        if (file_exists($connectionPath)) {
            include($connectionPath);
        } else {
            echo "File not found: $connectionPath";
        }

        switch ($accommodationType) {
            case 'hall':
                if (file_exists($insertHallPath)) {
                    include($insertHallPath);
                } else {
                    echo "File not found: $insertHallPath";
                }
                break;
            case 'apartment':
                if (file_exists($insertApartmentPath)) {
                    include($insertApartmentPath);
                } else {
                    echo "File not found: $insertApartmentPath";
                }
                break;
            case 'student':
                if (file_exists($insertStudentPath)) {
                    include($insertStudentPath);
                } else {
                    echo "File not found: $insertStudentPath";
                }
                break;
            case 'room':
                if (file_exists($insertRoomPath)) {
                    include($insertRoomPath);
                } else {
                    echo "File not found: $insertRoomPath";
                }
                break;
            default:
                echo "Invalid accommodation type selected.";
                break;
        }
    }
?>
