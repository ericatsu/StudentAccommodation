<?php
// Include any necessary PHP files, configurations, or functions here
// Fetch reminder details from the database based on student
// Example: $reminderDetails = fetchReminderDetails($studentId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder Letters</title>
    <!-- Add any additional styles or scripts here -->
</head>
<body>

    <header>
        <h1>Reminder Letters</h1>
    </header>

    <nav>
        <!-- Include navigation links if needed -->
    </nav>

    <section>
        <h2>Payment Reminders</h2>

        <?php if ($reminderDetails): ?>
            <!-- Display reminder details -->
            <p>Dear <?php echo $reminderDetails['studentName']; ?>,</p>
            <p>According to our records, it seems that your payment for the accommodation is overdue.</p>
            <p>Below are the details of the reminder:</p>

            <ul>
                <li>Invoice Number: <?php echo $reminderDetails['invoiceNumber']; ?></li>
                <li>Due Date: <?php echo $reminderDetails['dueDate']; ?></li>
                <li>Last Reminder Sent: <?php echo $reminderDetails['dateReminder2sent']; ?></li>
                <!-- Add more reminder details as needed -->
            </ul>

            <!-- Include information on consequences of non-payment -->
            <p>Please be aware of the consequences of non-payment, including possible eviction and other penalties.</p>
        <?php else: ?>
            <p>No reminder details found.</p>
        <?php endif; ?>
    </section>

    <!-- Add more sections with content as needed -->

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Student Accommodation System</p>
    </footer>

</body>
</html>
