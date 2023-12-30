<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: ../login_form.php");
    exit();
}
?>
<?php
require '../conn.php';
$sql = "SELECT * FROM authorcredibility";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .table-container {
            padding-top: 20px;
            margin-left: 225px;
            transition: margin-left 0.5s ease;
            /* Added transition effect */
        }

        .reviewed-button {
            background-color: #1186fa;
            color: white;
            border: none;
        }

        .reviewed-button:hover {
            background-color: darkblue;
        }

        @media (max-width: 768px) {
            .table-container {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <?php
    include 'nav.php';
    ?>
    <?php
    include '../conn.php';
    ?>
    <div class="content">
        <div class="container table-container">
            <h2>TEXTBOOK REVIEWS</h2>
            <br>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Review ID</th>
                            <th>Textbook_ID</th>
                            <th>Textbook_Title</th>
                            <th>Review By</th>
                            <th>View Details</th>
                            <th>Recommend</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['textbook_id'] . '</td>';
                            echo '<td>' . $row['textbook_title'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td><a class="btn reviewed-button" href="detailedreview.php?id=' . $row['id'] . '">View Details</a></td>';
                            echo '<td>';
                            echo '<form method="post" action="recommend_book.php">';
                            echo '<input type="hidden" name="book_id" value="' . $row['id'] . '">';
                            echo '<input type="hidden" name="book_title" value="' . $row['textbook_title'] . '">';
                            echo '<button type="submit" name="recommend" class="btn btn-success">&#10004; </button>';

                            echo '<button type="submit" name="recommend" class="btn btn-danger">&#10008; </button>';

                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No Reviews Yet</p>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>