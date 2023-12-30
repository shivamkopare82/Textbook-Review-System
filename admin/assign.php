<?php
include 'conn.php';

if (!isset($_GET['Textbook_ID']) || empty($_GET['Textbook_ID'])) {
    die('Invalid textbook ID.');
}

$textbookId = $_GET['Textbook_ID'];

$sqlUsers = "SELECT id, username FROM userform";
$resultUsers = $mysqli->query($sqlUsers);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['User_ID'];

    // Fetch the username from the userform table
    $sqlUsername = "SELECT username FROM userform WHERE id = '$userId'";
    $usernameResult = $mysqli->query($sqlUsername);

    if ($usernameResult->num_rows == 1) {
        $rowUsername = $usernameResult->fetch_assoc();
        $username = $rowUsername['username'];

        // Fetch textbook name from the textbooks table
        $sqlTextbookInfo = "SELECT Title FROM textbooks WHERE Textbook_ID = '$textbookId'";
        $textbookInfo = $mysqli->query($sqlTextbookInfo);

        if ($textbookInfo->num_rows == 1) {
            $rowTextbook = $textbookInfo->fetch_assoc();
            $textbookName = $rowTextbook['Title'];

            // Textbook exists, proceed with assignment
            $sqlAssign = "INSERT INTO assigned_textbooks (User_ID, Textbook_ID, username, textbook_name) VALUES ('$userId', '$textbookId', '$username', '$textbookName')";

            if ($mysqli->query($sqlAssign) === TRUE) {
                echo "Textbook assigned successfully!";
            } else {
                echo "Error assigning textbook: " . $mysqli->error;
            }
        } else {
            echo "Textbook with ID $textbookId does not exist.";
        }
    } else {
        echo "User with ID $userId does not exist.";
    }
}

$mysqli->close();
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assign Textbook</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <?php include 'nav.php' ?>
        <div class="container mt-5">
            <h2>Assign Textbook</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="user_id">Select User:</label>
                    <select class="form-control" id="user_id" name="User_ID" required>
                        <option value="" disabled selected>Select a user</option>
                        <?php
                        while ($rowUsers = $resultUsers->fetch_assoc()) {
                            echo '<option value="' . $rowUsers['id'] . '">' . $rowUsers['username'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Assign Textbook</button>
            </form>
        </div>
    </body>

    </html>
