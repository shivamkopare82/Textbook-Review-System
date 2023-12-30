<?php
session_start();

// Check if the user is logged in (adjust this condition based on your login logic)
if (!isset($_SESSION['id'])) {
    // User is not logged in, redirect them to the login page
    header('Location: login_form.php'); // Replace 'login_form.php' with your login page URL
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Submit Textbook</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
        }

        .container .content {
            text-align: center;
        }

        .container .content h3 {
            font-size: 30px;
            color: #333;
        }

        .container .content h3 span {
            background: hwb(41 5% 0%);
            color: #fff;
            border-radius: 5px;
            padding: 0 15px;
        }

        .container .content h1 {
            font-size: 50px;
            color: #333;
        }

        .container .content h1 span {
            color: #FFB30E;
        }

        .container .content p {
            font-size: 25px;
            margin-bottom: 20px;
        }

        .container .content .btn {
            display: inline-block;
            padding: 10px 30px;
            font-size: 20px;
            background: #333;
            color: #fff;
            margin: 0 5px;
            text-transform: capitalize;
        }

        .container .content .btn:hover {
            background: #FFB30E;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 60px;
            /* background: #ffb30e; */
            background-image: url('images/book.jpg');
            /* Replace 'your-image-url.jpg' with the URL or path to your background image */
            background-size: cover;
            /* This will cover the entire container */
            background-repeat: no-repeat;
            /* This will prevent the background image from repeating */
            background-position: center center;
        }

        .form-container form {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 500px;
        }

        .form-container form h3 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .form-container form input,
        .form-container form select {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

        .form-container form select option {
            background: #fff;
        }

        .form-container form .form-btn {
            background: #007bff;
            color: black;
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
        }

        .form-container form .form-btn:hover {
            background: #007bff;
            color: #fff;
        }

        .form-container form p {
            margin-top: 10px;
            font-size: 20px;
            color: #333;
        }

        .form-container form p a {
            color: #007bff;
        }

        .form-container form .error-msg {
            margin: 10px 0;
            display: block;
            background: #FFB30E;
            color: #fff;
            border-radius: 5px;
            font-size: 20px;
            padding: 10px;
        }

        body,
        h2,
        form {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        /* Container styles */
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('images/blue.jpg');
            /* Update with your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            filter: blur(10);
        }

        /* Form container styles */
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Form styles */
        form {
            text-align: center;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-msg {
            margin: 10px 0;
            background-color: #FFB30E;
            color: #fff;
            border-radius: 5px;
            font-size: 18px;
            padding: 10px;
        }
    </style>
</head>


<body>
    <div class="form-container">
        <form action="sub_textbook_process.php" method="POST" enctype="multipart/form-data">
            <h2>Submit Textbook</h2>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br><br>

            <label for="author">Author(s):</label>
            <input type="text" name="author" id="author" required><br><br>

            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" id="publisher" required><br><br>

            

            <label for="publication_date">Publication Date:</label>
            <input type="date" name="publication_date" id="publication_date" required><br><br>

            <label for="file">Upload Textbook (PDF, DOC, etc.):</label>
            <input type="file" name="file" id="file" required><br><br>
            
            <label for="picture">Picture:</label>
            <input type="file" name="picture" id="picture" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>