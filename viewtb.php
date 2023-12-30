<?php
$mysqli = new mysqli('localhost', 'root', '', 'mini');

if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

$sql = "SELECT * FROM textbooks";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo '<h1>List of Textbooks</h1>';
    echo '<ul>';

    while ($row = $result->fetch_assoc()) {
        $bookId = $row['Textbook_ID'];
        $title = $row['Title'];
        $file_path = $row['File_Path'];

        echo "<li><a href='view_ebook.php?bookId=$bookId'>$title</a></li>";
    }

    echo '</ul>';
} else {
    echo 'No textbooks available.';
}

$mysqli->close();
?>
