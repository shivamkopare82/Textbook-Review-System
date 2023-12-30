<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: ../login_form.php");
    exit();
}

require '../conn.php';

if (isset($_GET['id'])) {
    $reviewId = $_GET['id'];
    function getCriteriaScore($conn, $tableName, $columnName, $reviewId)
    {
        $query = "SELECT $columnName FROM $tableName WHERE id = $reviewId";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row[$columnName];
        }

        return 0;
    }

    $sumA = getCriteriaScore($conn, 'authorcredibility', 'sumA', $reviewId);
    $sumB = getCriteriaScore($conn, 'publishercredibility', 'sumB', $reviewId);
    $sumC = getCriteriaScore($conn, 'generalassessment', 'sumC', $reviewId);
    $sumD = getCriteriaScore($conn, 'physicalappearancestructure', 'sumD', $reviewId);
    $sumE = getCriteriaScore($conn, 'subjectmatter', 'sumE', $reviewId);
    $sumF = getCriteriaScore($conn, 'languageassessment', 'sumF', $reviewId);
    $sumG = getCriteriaScore($conn, 'illustrations', 'sumG', $reviewId);
}
    $totalAllottedScore = $sumA + $sumB + $sumC + $sumD + $sumE + $sumF + $sumG;

    $percentageA = number_format(($sumA / 50) * 100, 2);
    $percentageB = number_format(($sumB / 25) * 100, 2);
    $percentageC = number_format(($sumC / 14) * 100, 2);
    $percentageD = number_format(($sumD / 130) * 100, 2);
    $percentageE = number_format(($sumE / 81) * 100, 2);
    $percentageF = number_format(($sumF / 24) * 100, 2);
    $percentageG = number_format(($sumG / 28) * 100, 2);

    $totalPercentage = number_format(($totalAllottedScore / 352) * 100, 2);
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
            /* Adjusted to match the width of the sidebar */
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
    <?php include 'nav.php'; ?>
    <div class="content">
        <div class="container table-container">
            <h2>Detailed Score</h2>
            <hr>
            <br>
            <h4>Author 1 Review:</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SR.NO.</th>
                        <th>CRITERIA</th>
                        <th>TOTAL SCORE</th>
                        <th>ALLOTED SCORE</th>
                        <th>IN (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A.</td>
                        <td>Author Credibility</td>
                        <td>50</td>
                        <td><?php echo $sumA; ?></td>
                        <td><?php echo $percentageA . "%"; ?></td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Publisher Credibility</td>
                        <td>25</td>
                        <td><?php echo $sumB; ?></td>
                        <td><?php echo $percentageB . "%"; ?></td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>In General</td>
                        <td>14</td>
                        <td><?php echo $sumC; ?></td>
                        <td><?php echo $percentageC . "%"; ?></td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Physical Appearance, Structure & Organisation</td>
                        <td>130</td>
                        <td><?php echo $sumD; ?></td>
                        <td><?php echo $percentageD . "%"; ?></td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>Subject Matters</td>
                        <td>81</td>
                        <td><?php echo $sumE; ?></td>
                        <td><?php echo $percentageE . "%"; ?></td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Language</td>
                        <td>24</td>
                        <td><?php echo $sumF; ?></td>
                        <td><?php echo $percentageF . "%"; ?></td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Illustration</td>
                        <td>28</td>
                        <td><?php echo $sumG; ?></td>
                        <td><?php echo $percentageG . "%"; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total Score</td>
                        <td>352</td>
                        <td><?php echo $totalAllottedScore; ?></td>
                        <td><?php echo $totalPercentage . "%"; ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <hr>
            <h4>Author 2 Review: </h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SR.NO.</th>
                        <th>CRITERIA</th>
                        <th>TOTAL SCORE</th>
                        <th>ALLOTED SCORE</th>
                        <th>IN (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A.</td>
                        <td>Author Credibility</td>
                        <td>50</td>
                        <td>46</td>
                        <td>92.00%</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Publisher Credibility</td>
                        <td>25</td>
                        <td>25</td>
                        <td>100.00%</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>In General</td>
                        <td>14</td>
                        <td>12</td>
                        <td>85.71%</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Physical Appearance, Structure & Organisation</td>
                        <td>130</td>
                        <td>103</td>
                        <td>79.23%</td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>Subject Matters</td>
                        <td>81</td>
                        <td>56</td>
                        <td>69.14%</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Language</td>
                        <td>24</td>
                        <td>17</td>
                        <td>70.83%</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Illustration</td>
                        <td>28</td>
                        <td>24</td>
                        <td>85.71%</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total Score</td>
                        <td>352</td>
                        <td>283</td>
                        <td>80.40%</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <hr>
            <h4>Author 3 Review:</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SR.NO.</th>
                        <th>CRITERIA</th>
                        <th>TOTAL SCORE</th>
                        <th>ALLOTED SCORE</th>
                        <th>IN (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A.</td>
                        <td>Author Credibility</td>
                        <td>50</td>
                        <td>40</td>
                        <td>80.00%</td>
                    </tr>
                    <tr>
                        <td>B.</td>
                        <td>Publisher Credibility</td>
                        <td>25</td>
                        <td>22</td>
                        <td>88.00%</td>
                    </tr>
                    <tr>
                        <td>C.</td>
                        <td>In General</td>
                        <td>14</td>
                        <td>10</td>
                        <td>71.43%</td>
                    </tr>
                    <tr>
                        <td>D.</td>
                        <td>Physical Appearance, Structure & Organisation</td>
                        <td>130</td>
                        <td>92</td>
                        <td>70.77%</td>
                    </tr>
                    <tr>
                        <td>E.</td>
                        <td>Subject Matters</td>
                        <td>81</td>
                        <td>51</td>
                        <td>62.96%</td>
                    </tr>
                    <tr>
                        <td>F.</td>
                        <td>Language</td>
                        <td>24</td>
                        <td>16</td>
                        <td>66.67%</td>
                    </tr>
                    <tr>
                        <td>G.</td>
                        <td>Illustration</td>
                        <td>28</td>
                        <td>22</td>
                        <td>78.57%</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total Score</td>
                        <td>352</td>
                        <td>253</td>
                        <td>71.88%</td>
                    </tr>
                </tbody>
            </table>
            <?php
                // Total scores for each review
                $totalScore1 = 241;
                $totalScore2 = 283;
                $totalScore3 = 253;

                // Calculate the average total score
                $averageTotalScore = ($totalScore1 + $totalScore2 + $totalScore3) / 3;
            ?>
            <h5>Total Score of Review 1: <?php echo $totalScore1 ?></h5> 
            <hr>
            <h5>Total Score of Review 2: <?php echo $totalScore2 ?></h5>
            <hr>

            <h5>Total Score of Review 3: <?php echo $totalScore3 ?></h5>
            <hr>
            

            <h5>Average Total Score is <?php echo $averageTotalScore ?></h5>
<hr>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>