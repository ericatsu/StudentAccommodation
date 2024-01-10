<?php 
session_start();

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accommodation System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">StudAccommodation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./client/application.php">Apply</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./client/accommodation.php">Accommodation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./client/lease.php">Leases</a></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./client/invoice.php">Invoices</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="login.php" role="button">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    include_once("./views/hero.php");
    ?>
    <section>
        <h2>System Overview</h2>
        <p>
            Provide a brief overview of the Student Accommodation System. Describe its features,
            benefits, and any important information users may need.
        </p>
    </section>



    <?php
    include_once("./views/footer.php");
    ?>

</body>

</html>