<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include_once('sidebar.php')
            ?>

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
            $("#menu-item-3").click(function() {
                $("#content").load("user_activity.php");
            });
        });
    </script>
</body>

</html>