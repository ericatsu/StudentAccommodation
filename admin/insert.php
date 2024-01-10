<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <h1>Add Record</h1>
        <form method="post" action="add_accommodation.php">
            <div class="form-group">
                <label for="studentNo">Student ID</label>
                <input type="text" class="form-control" id="studentNo" name="studentNo" required>
            </div>
            <div class="form-group">
                <label for="studentFirstName">First Name</label>
                <input type="text" class="form-control" id="studentFirstName" name="studentFirstName" required>
            </div>
            <div class="form-group">
                <label for="studentMiddleInitial">Middle Initial</label>
                <input type="text" class="form-control" id="studentMiddleInitial" name="studentMiddleInitial">
            </div>
            <div class="form-group">
                <label for="studentLastName">Last Name</label>
                <input type="text" class="form-control" id="studentLastName" name="studentLastName">
            </div>
            <div class="form-group">
                <label for="studentSex">Sex</label>
                <select class="form-control" id="studentSex" name="studentSex" required>
                    <option value="">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="studentDOB">Date of Birth</label>
                <input type="date" class="form-control" id="studentDOB" name="studentDOB" required>
            </div>
            <div class="form-group">
                <label for="studentHomeStreet">Home Street</label>
                <input type="text" class="form-control" id="studentHomeStreet" name="studentHomeStreet">
            </div>
            <div class="form-group">
                <label for="studentHomeCity">Home City</label>
                <input type="text" class="form-control" id="studentHomeCity" name="studentHomeCity">
            </div>
            <div class="form-group">
                <label for="studentHomeState">Home State</label>
                <input type="text" class="form-control" id="studentHomeState" name="studentHomeState">
            </div>
            <div class="form-group">
                <label for="studentHomeZipCode">Home Zip Code</label>
                <input type="text" class="form-control" id="studentHomeZipCode" name="studentHomeZipCode">
            </div>
            <div class="form-group">
                <label for="studentHomeTelNo">Home Tel No</label>
                <input type="text" class="form-control" id="studentHomeTelNo" name="studentHomeTelNo">
            </div>


            <h3>Accommodation Type</h3>
            <div class="form-group">
                <label for="accommodationTypeRequired">Type of Accommodation</label>
                <select class="form-control" id="accommodationTypeRequired" name="accommodationTypeRequired" required>
                    <option value="">Select</option>
                    <option value="hall">Hall</option>
                    <option value="apartment">Apartment</option>
                </select>
            </div>

            <h3>Hall Information</h3>
            <div id="hallFields" style="display: none;">
                <div class="form-group">
                    <label for="hallName">Hall Name</label>
                    <input type="text" class="form-control" id="hallName" name="hallName">
                </div>
                <div class="form-group">
                    <label for="roomNo">Room Number</label>
                    <input type="text" class="form-control" id="roomNo" name="roomNo">
                </div>
                <div class="form-group">
                    <label for="placeNo">Place Number</label>
                    <input type="text" class="form-control" id="placeNo" name="placeNo">
                </div>
                <div class="form-group">
                    <label for="duration">Lease Duration</label>
                    <input type="text" class="form-control" id="duration" name="leaseDuration">
                </div>
            </div>


            <h3>Apartment Information</h3>
            <div id="apartmentFields" style="display: none;">
                <div class="form-group">
                    <label for="apartNo">Apartment Number</label>
                    <input type="text" class="form-control" id="apartNo" name="apartNo">
                </div>
                <div class="form-group">
                    <label for="duration">Lease Duration</label>
                    <input type="text" class="form-control" id="duration" name="leaseDuration">
                </div>
            </div>

            <h3>Lease Information</h3>
            <div class="form-group">
                <label for="dateStart">Lease Start Date</label>
                <input type="date" class="form-control" id="dateStart" name="dateStart">
            </div>
            <div class="form-group">
                <label for="dateLeave">Lease Leave Date</label>
                <input type="date" class="form-control" id="dateLeave" name="dateLeave">
            </div>

            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>

    <script>
        document.getElementById('accommodationTypeRequired').addEventListener('change', function() {
            var hallFields = document.getElementById('hallFields');
            var apartmentFields = document.getElementById('apartmentFields');

            if (this.value === 'hall') {
                hallFields.style.display = 'block';
                apartmentFields.style.display = 'none';
            } else if (this.value === 'apartment') {
                hallFields.style.display = 'none';
                apartmentFields.style.display = 'block';
            } else {
                hallFields.style.display = 'none';
                apartmentFields.style.display = 'none';
            }
        });
    </script>
</body>

</html>