<?php
// Include the necessary PHP files, configurations, or functions here
// You may include the database connection file and any other required files

// Fetch invoice details from the database based on invoiceNo
// Example: $invoiceDetails = fetchInvoiceDetails($invoiceNo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Invoice</h2>

    <!-- Invoice Details Section -->
    <div>
        <?php if (!empty($invoiceDetails)): ?>
            <p>Invoice Number: <?php echo $invoiceDetails['invoiceNo']; ?></p>
            <p>Semester: <?php echo $invoiceDetails['semester']; ?></p>
            <p>Date Due: <?php echo $invoiceDetails['dateDue']; ?></p>
            <p>Date Paid: <?php echo $invoiceDetails['datePaid']; ?></p>

            <!-- Display additional details based on your database structure -->

            <!-- Payment Method Section -->
            <h4>Payment Method</h4>
            <p>Method: <?php echo $invoiceDetails['paymentMethodName']; ?></p>
            <p>Account Number: <?php echo $invoiceDetails['accountNumber']; ?></p>
            <!-- Add more payment method details based on your database structure -->

            <!-- Invoice Table -->
            <table class="table">
                <thead>
                <tr>
                    <!-- Add table headers based on your database attributes -->
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($invoiceDetails['items'] as $item): ?>
                    <tr>
                        <td><?php echo $item['description']; ?></td>
                        <td><?php echo $item['amount']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Total Amount Section -->
            <p>Total Amount: <?php echo $invoiceDetails['totalAmount']; ?></p>

        <?php else: ?>
            <!-- Handle the case where invoiceDetails is empty -->
            <p>Invoice details not found.</p>
        <?php endif; ?>
    </div>

    <!-- Action Buttons -->
    <div class="mt-3">
        <a href="../index.php" class="btn btn-secondary">Back to Home</a>
    </div>
</div>

<!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
