<?php
// Database connection settings
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mini';

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .table-container {
            padding-top: 20px;
            margin-left: 225px;
            /* Adjusted to match the width of the sidebar */
            transition: margin-left 0.5s ease;
            /* Added transition effect */
        }

        @media (max-width: 768px) {
            .table-container {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <?php include 'nav.php' ?>
    <div class="content">
        <div class="container table-container">
            <?php
            // Retrieve all textbook details from the database
            $sql = "SELECT * FROM textbooks";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Textbook ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Publication Date</th>
                            <th>File Path</th>
                            <th>Upload Date</th>
                            <th>Uploader User ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['Textbook_ID'] . '</td>';
                            echo '<td>' . $row['Title'] . '</td>';
                            echo '<td>' . $row['Author'] . '</td>';
                            echo '<td>' . $row['Publisher'] . '</td>';
                            echo '<td>' . $row['Publication_Date'] . '</td>';
                            echo '<td>' . $row['File_Path'] . '</td>';
                            echo '<td>' . $row['Upload_Date'] . '</td>';
                            echo '<td>' . $row['Uploader_User_ID'] . '</td>';
                            echo '<td>';
                            echo '<a href="assign.php?Textbook_ID=' . $row['Textbook_ID'] . '" class="btn btn-primary me-2">Assign</a>'; // Corrected assignment URL
                            echo '<a href="delete.php?textbook_id=' . $row['Textbook_ID'] . '" class="btn btn-danger">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>
                </table>
            <?php
            } else {
                echo 'No textbooks available.';
            }
            $mysqli->close();
            ?>
        </div>
    </div>
</body>

</html>