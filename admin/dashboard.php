<?php
// Include the database connection file
require_once('../database/connection.php');

// Fetch statistics for the dashboard
function fetchDashboardStatistics()
{
    global $db_login;

    $statistics = array();

    // Example: Count total students
    $queryTotalStudents = "SELECT COUNT(*) AS totalStudents FROM Student";
    $resultTotalStudents = mysqli_query($db_login, $queryTotalStudents);

    if ($resultTotalStudents) {
        $rowTotalStudents = mysqli_fetch_assoc($resultTotalStudents);
        $statistics['totalStudents'] = $rowTotalStudents['totalStudents'];
    } else {
        $statistics['totalStudents'] = 0;
    }

    // Add more queries to fetch other statistics as needed

    return $statistics;
}

// Fetch alerts for the dashboard
function fetchDashboardAlerts()
{
    global $db_login;

    $alerts = array();

    // Example: Check for pending applications
    $queryPendingApplications = "SELECT COUNT(*) AS pendingApplications FROM Application WHERE status = 'Pending'";
    $resultPendingApplications = mysqli_query($db_login, $queryPendingApplications);

    if ($resultPendingApplications) {
        $rowPendingApplications = mysqli_fetch_assoc($resultPendingApplications);
        $pendingApplications = $rowPendingApplications['pendingApplications'];

        if ($pendingApplications > 0) {
            $alerts[] = "There are {$pendingApplications} pending applications.";
        }
    }

    // Add more queries to fetch other alerts as needed

    return $alerts;
}

// Close the database connection
mysqli_close($db_login);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include_once('sidebar.php')
            ?>

            <!-- Main content -->
            <div class="col-12 col-md-9" id="main-content">
                <?php
                include_once('header.php')
                ?>

              <div id="content"></div>
            </div>
        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#content").load("home.php");
            
            $("#menu-item-0").click(function() {
                $("#content").load("home.php");
            });
            $("#menu-item-1").click(function() {
                $("#content").load("insert.php");
            });
            $("#menu-item-2").click(function() {
                $("#content").load("allrecords.php");
            });
        });
    </script>
</body>

</html>