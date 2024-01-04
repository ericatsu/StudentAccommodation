<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accommodation Application</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <a href="../index.php"><h2>Student Accommodation Application</h2></a>
    <form action="process_application.php" method="post">

            <!-- Student Information Section -->
            <div class="card mt-4">
                <div class="card-header">
                    Student Information
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="studentNo">Student Number</label>
                            <input type="text" class="form-control" id="studentNo" name="studentNo" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="middleInitial">Middle Initial</label>
                            <input type="text" class="form-control" id="middleInitial" name="middleInitial">
                        </div>
                    </div>

                    <!-- Add other student information fields here -->

                </div>
            </div>

            <!-- Accommodation Preferences Section -->
            <div class="card mt-4">
                <div class="card-header">
                    Accommodation Preferences
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="accommodationType">Accommodation Type Required</label>
                        <select class="form-control" id="accommodationType" name="accommodationType" required>
                            <option value="">Select Type</option>
                            <option value="hall">Hall</option>
                            <option value="apartment">Apartment</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="accommodationDuration">Accommodation Duration</label>
                        <input type="text" class="form-control" id="accommodationDuration" name="accommodationDuration" required>
                    </div>

                    <!-- Add other accommodation preferences fields here -->

                </div>
            </div>

            <!-- Additional Information for Hall Accommodation Section -->
            <div class="card mt-4">
                <div class="card-header">
                    Additional Information for Hall Accommodation
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="hallName">Hall Name</label>
                        <input type="text" class="form-control" id="hallName" name="hallName">
                    </div>

                    <!-- Add other hall-specific fields here -->

                </div>
            </div>

            <!-- Additional Information for Apartment Accommodation Section -->
            <div class="card mt-4">
                <div class="card-header">
                    Additional Information for Apartment Accommodation
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="apartmentNumber">Apartment Number</label>
                        <input type="text" class="form-control" id="apartmentNumber" name="apartmentNumber">
                    </div>

                    <!-- Add other apartment-specific fields here -->

                </div>
            </div>

            <!-- Lease Information Section -->
            <div class="card mt-4">
                <div class="card-header">
                    Lease Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="leaseDuration">Lease Duration</label>
                        <input type="text" class="form-control" id="leaseDuration" name="leaseDuration" required>
                    </div>
                    <div class="form-group">
                        <label for="leaseStartDate">Lease Start Date</label>
                        <input type="date" class="form-control" id="leaseStartDate" name="leaseStartDate" required>
                    </div>
                    <div class="form-group">
                        <label for="leaseLeaveDate">Lease Leave Date</label>
                        <input type="date" class="form-control" id="leaseLeaveDate" name="leaseLeaveDate">
                    </div>

                    <!-- Add other lease information fields here -->

                </div>
            </div>

            <!-- Room Preferences Section -->
            <div class="card mt-4">
                <div class="card-header">
                    Room Preferences
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="roomNumber">Room Number</label>
                        <input type="text" class="form-control" id="roomNumber" name="roomNumber">
                    </div>
                    <div class="form-group">
                        <label for="placeNumber">Place Number</label>
                        <input type="text" class="form-control" id="placeNumber" name="placeNumber">
                    </div>

                    <!-- Add other room preferences fields here -->

                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-4">Submit Application</button>

        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
