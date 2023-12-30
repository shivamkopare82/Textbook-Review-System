<?php
session_start();

if (!isset($_SESSION['id'])) {
  // Redirect to the login page or handle unauthorized access
  header("Location: login_form.php"); // Change 'login.php' to your actual login page
  exit();
}

$mysqli = new mysqli('localhost', 'root', '', 'mini');

if ($mysqli->connect_error) {
  die('Database connection failed: ' . $mysqli->connect_error);
}

$userId = $_SESSION['id']; // Retrieve the UserID from the session
$sql = "SELECT * FROM userform WHERE id = $userId";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $username = $row['username'];
  $email = $row['email'];
  $contactInformation = $row['mobile'];
  $address = $row['address'];
  // Add more fields as needed
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve and sanitize user inputs
  $newUsername = $mysqli->real_escape_string($_POST['new_username']);
  $newEmail = $mysqli->real_escape_string($_POST['new_email']);
  $newContactInformation = $mysqli->real_escape_string($_POST['new_mobile']);
  $newAddress = $mysqli->real_escape_string($_POST['new_address']);
  // Add more fields as needed

  // Update user's details in the database
  $updateSql = "UPDATE userform SET username = '$newUsername', email = '$newEmail', mobile = '$newContactInformation', address = '$newAddress' WHERE id = $userId";
  if ($mysqli->query($updateSql)) {
    // Redirect to the user profile page after successful update
    header("Location: userprofile.php");
    exit();
  } else {
    // Handle the update error, you can add specific error handling here
    echo "Update failed: " . $mysqli->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Edit Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    /* Your CSS styles here */
  </style>
</head>

<body>
  <?php include 'nav.php' ?>
  <div class="container">
    <div class="main-body">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="mb-3">Edit Profile</h5>
              <form method="POST" action="">
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="new_username" value="<?php echo $username; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="new_email" value="<?php echo $email; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Mobile</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="new_mobile" value="<?php echo $contactInformation; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="new_address" value="<?php echo $address; ?>">
                  </div>
                </div>
                <!-- Add more fields as needed -->
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
