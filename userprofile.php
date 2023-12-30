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
  $profilePicture = $row['image'];
  $contactInformation = $row['mobile'];
  $address = $row['address'];
  // Add more fields as needed
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>PROFILE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      background: #f7f7ff;
      margin-top: 20px;
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid transparent;
      border-radius: .25rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }

      .me-2 {
      margin-right: .5rem !important;
    }
  </style>
</head>

<body>
  <?php include 'nav.php' ?>
  <div class="container">
    <div class="main-body">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                <div class="mt-3">
                  <h4><?php echo $username; ?></h4>
                  <p class="text-secondary mb-1"></p>
                  <p class="text-muted font-size-sm"></p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
                </div>
              </div>
              <hr class="my-4">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                      <circle cx="12" cy="12" r="10"></circle>
                      <line x1="2" y1="12" x2="22" y2="12"></line>
                      <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                    </svg>Website</h6>
                  <span class="text-secondary">Lorem, ipsum dolor.</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                      <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                    </svg>Github</h6>
                  <span class="text-secondary">Lorem, ipsum dolor.</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info">
                      <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                    </svg>Twitter</h6>
                  <span class="text-secondary">Lorem, ipsum dolor.</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                      <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                      <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>Instagram</h6>
                  <span class="text-secondary">Lorem, ipsum dolor.</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary">
                      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>Facebook</h6>
                  <span class="text-secondary">Lorem, ipsum dolor.</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $username; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $email; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $contactInformation; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="<?php echo $address; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                  <a href="editprofile.php" class="btn btn-primary px-4">Edit Profile</a>
                </div>
              </div>

            </div>

          </div>

          <div class="col-lg-13">
            <div class="card">
              <div class="card-body">
              <div class="col-sm-9 text-secondary">
                  <a href="#" class="btn btn-primary px-4">Assigned Book</a>
                </div>
                <hr>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Book Title</th>
                      <th>Author</th>
                      <th>Published Year</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Database connection
                    $mysqli = new mysqli('localhost', 'root', '', 'mini');
                    if ($mysqli->connect_error) {
                      die('Database connection failed: ' . $mysqli->connect_error);
                    }

                    // Retrieve assigned books for the logged-in user
                    $userId = $_SESSION['id'];
                    $sql = "SELECT
                          at.Assignment_ID,
                          t.Textbook_ID,
                          t.Title AS book_title,
                          t.Author,
                          t.Publisher,
                          t.Publication_Date,
                          t.File_Path,
                          t.Upload_Date
                          FROM
                            assigned_textbooks at
                          JOIN
                            textbooks t ON at.Textbook_ID = t.Textbook_ID
                          WHERE
                          at.User_ID = $userId";

                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        $bookTitle = $row['book_title'];
                        $author = $row['Author'];
                        $publishedYear = $row['Publication_Date'];
                        $textbookID = $row['Textbook_ID'];
                        $file_path = $row['File_Path'];

                        echo "<tr>";
                        echo "<td>$bookTitle</td>";
                        echo "<td>$author</td>";
                        echo "<td>$publishedYear</td>";
                        echo "<td><a href='view_ebook.php?textbook_id=$textbookID&file_path=$file_path' class='btn btn-primary'>Review</a></td>";                        
                        echo "</tr>";
                      }
                    } else {
                      echo "<tr><td colspan='3'>No assigned books found.</td></tr>";
                    }

                    // Close the database connection
                    $mysqli->close();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>