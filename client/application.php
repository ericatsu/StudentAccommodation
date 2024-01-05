<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Book Your Accommodation</h1>
    <form action="booking.php" method="post">
      <div class="form-group">
        <label for="studentNo">Student Number</label>
        <input type="text" class="form-control" id="studentNo" name="studentNo" required>
      </div>
      <div class="form-group">
        <label for="studentFirstName">Name</label>
        <input type="text" class="form-control" id="studentFirstName" name="studentFirstName" required>
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
        <label for="accommodationTypeRequired">Type of Accommodation</label>
        <select class="form-control" id="accommodationTypeRequired" name="accommodationTypeRequired" required>
          <option value="">Select</option>
          <option value="Hall">Hall</option>
          <option value="Hotels">Hotels</option>
          <option value="Flat">Flat</option>
          <option value="Self-Contain">Self-Contain</option>
          <option value="Bangalow">Bangalow</option>
        </select>
      </div>
      <div class="form-group">
        <label for="accommodationDuration">Duration (in months)</label>
        <input type="number" class="form-control" id="accommodationDuration" name="accommodationDuration" min="1" max="12" required>
      </div>
      <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
  </div>
  <script>
    $(document).ready(function() {
      $("button[type='submit']").on("click", function(event) {
        event.preventDefault();
        // Get the user input from the form
        var studentNo = $("#studentNo").val();
        var name = $("#studentFirstName").val();
        var sex = $("#studentSex").val();
        var dob = $("#studentDOB").val();
        var type = $("#accommodationTypeRequired").val();
        var duration = $("#accommodationDuration").val();
        // Validate the user input
        if (studentNo == "" || name == "" || sex == "" || dob == "" || type == "" || duration == "") {
          alert("Please fill in all the fields.");
        } else {
          alert("You have entered the following data:\nStudent Number: " + studentNo + "\nName: " + name + "\nSex: " + sex + "\nDate of Birth: " + dob + "\nType of Accommodation: " + type + "\nDuration: " + duration + "\nAre you sure you want to book now?");
          $("form").submit();
        }
      });
    });
  </script>
</body>
</html>
