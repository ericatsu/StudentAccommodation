<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar min-vh-100">
        <div class="position-sticky">
            <div class="text-center my-3">
                    <i class="bi bi-list-task" style="font-size: 2rem; color: white;"> StudRecord</i>
                </div>
            <ul class="nav flex-column">
                <?php
                $menu_items = ['Dashboard', 'Add', 'Records', 'Company', 'Messages', 'Tasks', 'Products', 'Documents', 'Settings'];
                foreach ($menu_items as $index => $item) {
                    $id = "menu-item-" . $index;
                    echo "<li class='nav-item'>
                                    <a class='nav-link active' aria-current='page' href='#' id='$id'>
                                    <i class='bi bi-list-task'></i> $item
                                    </a>
                                  </li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>