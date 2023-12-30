<?php
session_start();

if (!isset($_SESSION['id'])) {
  // Redirect to the login page or handle unauthorized access
  header("Location: login_form.php"); // Change 'login.php' to your actual login page
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $mysqli = new mysqli('localhost', 'root', '', 'mini');

  if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
  }

  // Get data from the form
  $reviewerUserId = $_SESSION['id'];
  $textbookId = $_POST['Textbook_ID']; // Assuming you have an input field with name="textbook_id"
  $readabilityRating = $_POST['readability_rating'];
  $accuracyRating = $_POST['accuracy_rating'];
  $completenessRating = $_POST['completeness_rating'];
  $comments = $_POST['comments'];

  // Insert the review into the 'reviews' table
  $sql = "INSERT INTO reviews (Reviewer_User_ID, Textbook_ID, Readability_Rating, Accuracy_Rating, Completeness_Rating, Comments)
          VALUES (?, ?, ?, ?, ?, ?)";

  $stmt = $mysqli->prepare($sql);
  if ($stmt) {
    $stmt->bind_param("iiiiis", $reviewerUserId, $textbookId, $readabilityRating, $accuracyRating, $completenessRating, $comments);

    if ($stmt->execute()) {
      // Redirect to view_ebook.php with textbook_id in the query string
      header("Location: view_ebook.php?textbook_id=$textbookId");
      exit();
    } else {
      echo "Error submitting review: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Error preparing SQL statement: " . $mysqli->error;
  }

  $mysqli->close();
} else {
  echo "Invalid request method.";
}
?>
