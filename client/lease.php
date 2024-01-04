<?php
// Include the necessary PHP files, configurations, or functions here
// You may include the database connection file and any other required files

// Assume you have a function to fetch lease details based on leaseNo
function fetchLeaseDetails($leaseNo) {
    // Include your database connection
    require_once('../database/connection.php');

    // Fetch lease details from the database
    $query = "SELECT * FROM Lease WHERE leaseNo = ?";
    $stmt = $db_login->prepare($query);
    $stmt->bind_param('s', $leaseNo);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query was successful
    if ($result) {
        // Fetch the result into an associative array
        $leaseDetails = $result->fetch_assoc();
    } else {
        // Handle the case where the query fails
        echo "Error: " . $db_login->error;
        // You might want to set $leaseDetails to an empty array or handle it as appropriate
        $leaseDetails = [];
    }

    // Close the database connection
    $stmt->close();
    $db_login->close();

    return $leaseDetails;
}

// Assume you have a lease number (replace '123' with the actual lease number)
$leaseNo = '123';

// Fetch lease details based on the lease number
$leaseDetails = fetchLeaseDetails($leaseNo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lease Agreement</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<a href="../index.php"><h2>Lease Agreement</h2></a>

    <!-- Lease Agreement Form -->
    <form>
        <?php if (!empty($leaseDetails)): ?>
            <!-- Display Lease Agreement Details -->
            <div class="mb-3">
                <label for="leaseNo" class="form-label">Lease Number: <?php echo $leaseDetails['leaseNo']; ?></label>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration: <?php echo $leaseDetails['duration']; ?></label>
            </div>

            <div class="mb-3">
                <label for="dateStart" class="form-label">Start Date: <?php echo $leaseDetails['dateStart']; ?></label>
            </div>

            <div class="mb-3">
                <label for="dateLeave" class="form-label">Leave Date: <?php echo $leaseDetails['dateLeave']; ?></label>
            </div>

            <!-- Include any additional form fields based on your requirements -->

            <!-- Action Buttons -->
            <div class="mb-3">
                <button type="button" class="btn btn-primary">Review and Sign</button>
                <a href="index.php" class="btn btn-secondary">Back to Home</a>
            </div>
        <?php else: ?>
            <!-- Handle the case where leaseDetails is empty -->
            <p>Lease details not found.</p>
        <?php endif; ?>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
