<?php
require_once('../database/connection.php');

// Fetch updated data from the database
$query = "SELECT * FROM Student";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Generate HTML for the table
$html = '<table class="table table-striped table-bordered">
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
            <tbody>';

while ($student = $result->fetch_assoc()) {
    $html .= '<tr>';
    $html .= '<td>' . $student['studentNo'] . '</td>';
    $html .= '<td>' . $student['studentFirstName'] . '</td>';
    $html .= '<td>' . $student['studentMiddleInitial'] . '</td>';
    $html .= '<td>' . $student['studentLastName'] . '</td>';
    $html .= '<td>' . $student['studentHomeStreet'] . '</td>';
    $html .= '<td>' . $student['studentHomeCity'] . '</td>';
    $html .= '<td>' . $student['studentHomeState'] . '</td>';
    $html .= '<td>' . $student['studentHomeZipCode'] . '</td>';
    $html .= '<td>' . $student['studentHomeTelNo'] . '</td>';
    $html .= '<td>' . $student['studentSex'] . '</td>';
    $html .= '<td>' . $student['studentDOB'] . '</td>';
    $html .= '<td>' . $student['studentType'] . '</td>';
    $html .= '<td>' . $student['studentStatus'] . '</td>';
    $html .= '<td>' . $student['accommodationTypeRequired'] . '</td>';
    $html .= '<td>' . $student['accommodationDuration'] . '</td>';
    $html .= '<td>';
    $html .= '<div class="btn-group" role="group">';
    $html .= '<button type="button" class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#updateModal' . $student['studentNo'] . '">Update</button>';
    $html .= '<a href="delete.php?studentNo=' . $student['studentNo'] . '" class="btn btn-danger btn-sm">Delete</a>';
    $html .= '</div>';
    $html .= '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

$result->free();
$conn->close();

// Send the generated HTML as the response
echo $html;
?>
