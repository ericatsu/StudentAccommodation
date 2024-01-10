<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4" id="studentTableContainer">
        <h2>Student Records</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>StudentID</th>
                    <th>FirstName</th>
                    <th>Middle</th>
                    <th>LastName</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>State</th>
                    <th>ZipCode</th>
                    <th>Mobile</th>
                    <th>Sex</th>
                    <th>DOB</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Accommodation</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../database/connection.php');

                $query = "SELECT * FROM Student";
                $result = $conn->query($query);

                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                while ($student = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $student['studentNo'] . '</td>';
                    echo '<td>' . $student['studentFirstName'] . '</td>';
                    echo '<td>' . $student['studentMiddleInitial'] . '</td>';
                    echo '<td>' . $student['studentLastName'] . '</td>';
                    echo '<td>' . $student['studentHomeStreet'] . '</td>';
                    echo '<td>' . $student['studentHomeCity'] . '</td>';
                    echo '<td>' . $student['studentHomeState'] . '</td>';
                    echo '<td>' . $student['studentHomeZipCode'] . '</td>';
                    echo '<td>' . $student['studentHomeTelNo'] . '</td>';
                    echo '<td>' . $student['studentSex'] . '</td>';
                    echo '<td>' . $student['studentDOB'] . '</td>';
                    echo '<td>' . $student['studentType'] . '</td>';
                    echo '<td>' . $student['studentStatus'] . '</td>';
                    echo '<td>' . $student['accommodationTypeRequired'] . '</td>';
                    echo '<td>' . $student['accommodationDuration'] . '</td>';
                    echo '<td>';
                    echo '<div class="btn-group" role="group">';
                    echo '<button type="button" class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#updateModal' . $student['studentNo'] . '">Update</button>';
                    echo '<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="deleteStudent(' . $student['studentNo'] . ')">Delete</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }

                $result->free();


                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php
    $conn = include('../database/connection.php');
    if (!$conn || $conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM Student";
    $result = $conn->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result) {
        while ($student = $result->fetch_assoc()) {
            echo '<div class="modal fade" id="updateModal' . $student['studentNo'] . '" tabindex="-1" aria-labelledby="updateModalLabel' . $student['studentNo'] . '" aria-hidden="true">';
            echo '<div class="modal-dialog">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title" id="updateModalLabel' . $student['studentNo'] . '">Update Student</h5>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            echo '<form id="updateForm' . $student['studentNo'] . '">';
            echo '<div class="mb-3">';
            echo '<input type="hidden" name="studentNo" value="' . $student['studentNo'] . '">';
            echo '<label for="studentFirstName" class="form-label">First Name</label>';
            echo '<input type="text" class="form-control" id="studentFirstName' . $student['studentNo'] . '" value="' . $student['studentFirstName'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentMiddleInitial" class="form-label">Middle Initial</label>';
            echo '<input type="text" class="form-control" id="studentMiddleInitial' . $student['studentNo'] . '" value="' . $student['studentMiddleInitial'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentLastName" class="form-label">Last Name</label>';
            echo '<input type="text" class="form-control" id="studentLastName' . $student['studentNo'] . '" value="' . $student['studentLastName'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentHomeStreet" class="form-label">Street</label>';
            echo '<input type="text" class="form-control" id="studentHomeStreet' . $student['studentNo'] . '" value="' . $student['studentHomeStreet'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentHomeCity" class="form-label">City</label>';
            echo '<input type="text" class="form-control" id="studentHomeCity' . $student['studentNo'] . '" value="' . $student['studentHomeCity'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentHomeState" class="form-label">State</label>';
            echo '<input type="text" class="form-control" id="studentHomeState' . $student['studentNo'] . '" value="' . $student['studentHomeState'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentHomeZipCode" class="form-label">Zip Code</label>';
            echo '<input type="text" class="form-control" id="studentHomeZipCode' . $student['studentNo'] . '" value="' . $student['studentHomeZipCode'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentHomeTelNo" class="form-label">Mobile</label>';
            echo '<input type="text" class="form-control" id="studentHomeTelNo' . $student['studentNo'] . '" value="' . $student['studentHomeTelNo'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentSex" class="form-label">Sex</label>';
            echo '<input type="text" class="form-control" id="studentSex' . $student['studentNo'] . '" value="' . $student['studentSex'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentDOB" class="form-label">Date of Birth</label>';
            echo '<input type="date" class="form-control" id="studentDOB' . $student['studentNo'] . '" value="' . $student['studentDOB'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentType" class="form-label">Type</label>';
            echo '<input type="text" class="form-control" id="studentType' . $student['studentNo'] . '" value="' . $student['studentType'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="studentStatus" class="form-label">Status</label>';
            echo '<input type="text" class="form-control" id="studentStatus' . $student['studentNo'] . '" value="' . $student['studentStatus'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="accommodationTypeRequired" class="form-label">Accommodation Type</label>';
            echo '<input type="text" class="form-control" id="accommodationTypeRequired' . $student['studentNo'] . '" value="' . $student['accommodationTypeRequired'] . '">';
            echo '</div>';

            echo '<div class="mb-3">';
            echo '<label for="accommodationDuration" class="form-label">Accommodation Duration</label>';
            echo '<input type="text" class="form-control" id="accommodationDuration' . $student['studentNo'] . '" value="' . $student['accommodationDuration'] . '">';
            echo '</div>';

            echo '</form>';

            echo '</div>';
            echo '<div class="modal-footer">';
            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
            echo '<button type="button" class="btn btn-primary" onclick="submitForm(' . $student['studentNo'] . ')">Save changes</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        $result->free();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    ?>

    <script>
        function submitForm(studentNo) {
            var form = $('#updateForm' + studentNo);
            var formData = form.serialize();

            $.ajax({
                type: 'POST',
                url: 'update.php',
                data: formData,
                success: function(response) {
                    alert('Update successful');

                    refreshTable();
                },
                error: function(response) {
                    alert('Update failed');
                }
            });
        }

        function deleteStudent(studentNo) {
        if (confirm('Are you sure you want to delete this student?')) {
            $.ajax({
                type: 'GET',
                url: 'delete.php?studentNo=' + studentNo,
                success: function(response) {
                    alert(response);
                    refreshTable();
                },
                error: function(response) {
                    alert('Deletion failed');
                }
            });
        }
    }

        function refreshTable() {
            $.ajax({
                type: 'GET',
                url: 'get_updated_data.php',
                success: function(response) {
                    $('#studentTableContainer').html(response);
                },
                error: function(response) {
                    alert('Failed to fetch updated data');
                }
            });
        }
    </script>

</body>

</html>