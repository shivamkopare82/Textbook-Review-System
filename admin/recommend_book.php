<?php
require '../conn.php'; 


$bookId = $_POST['book_id']; // Modify this based on your code

$query = "SELECT * FROM textbooks WHERE textbook_id = '$bookId'";

$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Fetch the book details
        $bookDetails = mysqli_fetch_assoc($result);

        $bookTitle = $bookDetails['Title'];
        $bookAuthor = $bookDetails['Author'];
        $bookPicture = $bookDetails['Picture_Path'];
        
        // SQL query to insert book details into the recommended_books table
        $insertQuery = "INSERT INTO recommended_books (book_id, book_title, book_author, book_picture) VALUES ('$bookId', '$bookTitle', '$bookAuthor', '$bookPicture')";

        if (mysqli_query($conn, $insertQuery)) {
           
            exit();
        } else {
            echo 'Failed to recommend the book.';
        }
    } else {
        echo 'Book not found.';
    }
} else {
    echo 'Error in the SQL query: ' . mysqli_error($conn);
}
?>
