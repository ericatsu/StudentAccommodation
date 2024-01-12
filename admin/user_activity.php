<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <h2>User Activity</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>LogID</th>
                    <th>Activity Type</th>
                    <th>Activity Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../database/connection.php');

                $query = "SELECT * FROM Useractivitylog";
                $result = $conn->query($query);

                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                while ($activity = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $activity['logID'] . '</td>';
                    echo '<td>' . $activity['activityType'] . '</td>';
                    echo '<td>' . $activity['activityTime'] . '</td>';
                    echo '</tr>';
                }

                $result->free();


                $conn->close();
                ?>
            </tbody>
        </table>
    </div>



    <script>

    </script>

</body>

</html>