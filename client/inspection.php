<?php
// Include any necessary PHP files, configurations, or functions here
// Fetch inspection details from the database based on apartment
// Example: $inspectionDetails = fetchInspectionDetails($apartmentId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accommodation Inspection</title>
    <!-- Add any additional styles or scripts here -->
</head>
<body>

    <header>
        <h1>Accommodation Inspection</h1>
    </header>

    <nav>
        <!-- Include navigation links if needed -->
    </nav>

    <section>
        <h2>Apartment Inspection Schedule</h2>

        <?php if ($inspectionDetails): ?>
            <!-- Display inspection details -->
            <p>Dear <?php echo $inspectionDetails['apartNo']; ?> Residents,</p>
            <p>Below is the information on the upcoming inspection for your apartment:</p>

            <ul>
                <li>Inspection Date: <?php echo $inspectionDetails['dateOfInspection']; ?></li>
                <li>Results: <?php echo $inspectionDetails['status']; ?></li>
                <li>Comments: <?php echo $inspectionDetails['comments']; ?></li>
                <!-- Add more inspection details as needed -->
            </ul>
        <?php else: ?>
            <p>No inspection details found.</p>
        <?php endif; ?>
    </section>

    <!-- Add more sections with content as needed -->

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Student Accommodation System</p>
    </footer>

</body>
</html>
