<?php
// Include any necessary PHP files, configurations, or functions here
// Fetch student details, accommodation details, and lease information from the database
// Example: $studentDetails = fetchStudentDetails($studentId);
// Example: $accommodationDetails = fetchAccommodationDetails($studentId);
// Example: $leaseDetails = fetchLeaseDetails($studentId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Add any additional styles or scripts here -->
</head>
<body>

    <header>
        <h1>Student Profile</h1>
    </header>

    <nav>
        <!-- Include navigation links if needed -->
    </nav>

    <section>
        <h2>Personal Information</h2>

        <?php if ($studentDetails): ?>
            <!-- Display student details -->
            <p>Name: <?php echo $studentDetails['studentFirstName'] . ' ' . $studentDetails['studentLastName']; ?></p>
            <p>Address: <?php echo $studentDetails['studentHomeStreet'] . ', ' . $studentDetails['studentHomeCity'] . ', ' . $studentDetails['studentHomeState'] . ' ' . $studentDetails['studentHomeZipCode']; ?></p>
            <p>Phone: <?php echo $studentDetails['studentHomeTelNo']; ?></p>
            <!-- Add more student details as needed -->
        <?php else: ?>
            <p>No student details found.</p>
        <?php endif; ?>
    </section>

    <section>
        <h2>Accommodation Information</h2>

        <?php if ($accommodationDetails): ?>
            <!-- Display accommodation details -->
            <p>Accommodation Type: <?php echo $accommodationDetails['accommodationType']; ?></p>
            <p>Room Number: <?php echo $accommodationDetails['roomNo']; ?></p>
            <p>Place Number: <?php echo $accommodationDetails['placeNo']; ?></p>
            <p>Monthly Rental Rate: <?php echo $accommodationDetails['rentPerSemester']; ?></p>
            <!-- Add more accommodation details as needed -->
        <?php else: ?>
            <p>No accommodation details found.</p>
        <?php endif; ?>
    </section>

    <section>
        <h2>Lease Information</h2>

        <?php if ($leaseDetails): ?>
            <!-- Display lease details -->
            <p>Lease Number: <?php echo $leaseDetails['leaseNo']; ?></p>
            <p>Duration: <?php echo $leaseDetails['duration']; ?></p>
            <p>Start Date: <?php echo $leaseDetails['dateStart']; ?></p>
            <p>End Date: <?php echo $leaseDetails['dateLeave']; ?></p>
            <!-- Add more lease details as needed -->
        <?php else: ?>
            <p>No lease details found.</p>
        <?php endif; ?>
    </section>

    <!-- Add more sections with content as needed -->

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Student Accommodation System</p>
    </footer>

</body>
</html>
