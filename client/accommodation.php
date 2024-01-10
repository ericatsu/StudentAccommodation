<?php
// Include the database connection file
require_once('../database/connection.php');

// Fetch available accommodations from the database
$query = "
    SELECT
        'Apartment' AS accommodationType,
        apartNo AS roomNo,
        '' AS hallName,
        apartAddress AS placeNo,
        noOfRoomsInApart AS monthlyRentalRate
    FROM apartment
    UNION
    SELECT
        'Hall' AS accommodationType,
        '' AS roomNo,
        hallName AS hallName,
        '' AS placeNo,
        noOfRoomsInHall AS monthlyRentalRate
    FROM hall
    UNION
    SELECT
        'Room' AS accommodationType,
        roomNo AS roomNo,
        hallName AS hallName,
        placeNo AS placeNo,
        rentPerSemester AS monthlyRentalRate
    FROM room
";

$result = mysqli_query($db_login, $query);

// Check if the query was successful
if ($result) {
    // Fetch the result into an associative array
    $accommodations = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Handle the case where the query fails
    echo "Error: " . mysqli_error($db_login);
    // You might want to set $accommodations to an empty array or handle it as appropriate
    $accommodations = [];
}

// Close the database connection
mysqli_close($db_login);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodation Listing</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<a href="../index.php"><h2 class="mb-4">Available Accommodations</h2></a>

    <!-- Accommodation Listing Table -->
    <table class="table">
        <thead>
        <tr>
            <th>Accommodation Type</th>
            <th>Room Number</th>
            <th>Hall Name</th>
            <th>Place Number</th>
            <th>Monthly Rental Rate</th>
            <!-- Add more columns based on your database attributes -->
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetch and display accommodations from the database
        // Replace this with your actual database query and loop
        foreach ($accommodations as $accommodation) {
            echo "<tr>";
            echo "<td>{$accommodation['accommodationType']}</td>";
            echo "<td>{$accommodation['roomNo']}</td>";
            echo "<td>{$accommodation['hallName']}</td>";
            echo "<td>{$accommodation['placeNo']}</td>";
            echo "<td>{$accommodation['monthlyRentalRate']}</td>";
            // Add more columns based on your database attributes
            echo "<td><a href='select_accommodation.php?id={$accommodation['id']}'>Select</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
