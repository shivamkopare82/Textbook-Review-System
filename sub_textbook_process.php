<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login_form.php");
    exit();
}

$mysqli = new mysqli('localhost', 'root', '', 'mini');

if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $publication_date = $_POST['publication_date'];

    // Handle file upload for the textbook file
    $file_name = $_FILES['file']['name'];
    $file_tmp_name = $_FILES['file']['tmp_name'];
    $uploaded_file_path = 'uploads/' . $file_name;

    // Handle file upload for the picture
    $picture_name = $_FILES['picture']['name'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $uploaded_picture_path = 'uploads/' . $picture_name;

    if (empty($title) || empty($author) || empty($publisher) || empty($publication_date)) {
        $errors[] = "All fields are required.";
    } elseif ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "File upload failed with error code " . $_FILES['file']['error'];
    } elseif (!move_uploaded_file($file_tmp_name, $uploaded_file_path)) {
        $errors[] = 'Error: File upload failed.';
    } elseif (empty($picture_name)) {
        $errors[] = "Picture is required.";
    } elseif ($_FILES['picture']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Picture upload failed with error code " . $_FILES['picture']['error'];
    } elseif (!move_uploaded_file($picture_tmp_name, $uploaded_picture_path)) {
        $errors[] = 'Error: Picture upload failed.';
    } else {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO textbooks (Title, Author, Publisher, Publication_Date, File_Path, Uploader_User_ID, Picture_Path)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $uploader_user_id = $_SESSION['id'];

            // Bind parameters and set types
            $stmt->bind_param("sssssis", $title, $author, $publisher, $publication_date, $uploaded_file_path, $uploader_user_id, $uploaded_picture_path);

            // Execute the prepared statement
            if ($stmt->execute()) {
                header('Location: index.php');
                exit();
            } else {
                $errors[] = 'Error: Textbook submission failed.';
            }

            // Close the statement
            $stmt->close();
        } else {
            $errors[] = 'Error: Prepare statement failed.';
        }
    }
}

$mysqli->close();

if (!empty($errors)) {
    // Store errors in the session and redirect back to the submission form
    $_SESSION['errors'] = $errors;
    header('Location: postbook.php');
    exit();
}
?>
