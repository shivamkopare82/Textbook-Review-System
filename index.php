<?php
session_start();
if (!isset($_SESSION['id'])) {
} else {
   $userId = $_SESSION['id'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>HOME</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- owl carousel style -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <style>
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 10px;
        display: inline-block;
        width: 300px;
    }

    .card-body {
        padding: 10px;
    }

    .card-title {
        font-size: 1.25rem;
        margin-bottom: 5px;
    }

    .card-text {
        color: #777;
    }
    .book-image {
        width: 200px; /* Set your desired width */
        height: 300px; /* Set your desired height */
        object-fit: cover;
    }
</style>

</head>

<body>
   <!--header section start -->
   <div class="header_section">
      <div class="header_bg">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <!-- <a class="logo" href="index.html"><img src="images/logo.png"></a> -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="logout.php">About</a>
                     </li>
                     <!-- <li class="nav-item">
                           <a class="nav-link" href="userprofile.php?id=<?php echo $_SESSION['id']; ?>">Profile</a>
                        </li> -->
                     <li class="nav-item">
                        <?php if (isset($_SESSION['id'])) : ?>
                           <a class="nav-link" href="userprofile.php?id=<?php echo $_SESSION['id']; ?>">Profile</a>
                        <?php endif; ?>
                     </li>

                     <?php
                     if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                     }
                     if (isset($_SESSION['id'])) {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="logout.php">Logout</a>';
                        echo '</li>';
                     } else {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="login_form.php">Login</a>';
                        echo '</li>';
                     }
                     ?>
                  </ul>
                  <div class="call_section">
                     <ul>
                        <li><a href="#"><img src="images/fb-icon.png"></a></li>
                        <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                        <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                        <li><a href="#"><img src="images/instagram-icon.png"></a></li>
                        <div class="donate_bt"><a href="#"><img src="images/search-icon.png"></a></div>
                     </ul>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      <!--banner section start -->
      <div class="banner_section layout_padding">
         <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="banner_taital_main">
                        <div class="row">
                           <div class="col-md-6">
                              <h1 class="banner_taital">Review Your Book By Experts.</h1>
                              <p class="banner_text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto commodi, fugit quis facere illo itaque?</p>
                              <div class="btn_main">
                                 <div class="about_bt active">
                                    <?php
                                    // Check if $_SESSION['id'] is set before creating the link
                                    if (isset($_SESSION['id'])) {
                                       echo '<a href="postbook.php?UserID=' . $_SESSION['id'] . '">Post Your Book</a>';
                                    } else {
                                       echo '<a href="login_form.php">Post Your Book</a>';
                                    }
                                    ?>
                                 </div>
                                 <div class="quote_bt"><a href="#">Get A Quote</a></div>
                              </div>


                           </div>
                           <div class="col-md-6">
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="banner_taital_main">
                        <div class="row">
                           <div class="col-md-6">
                              <h1 class="banner_taital">Review Your Book By Experts.</h1>
                              <p class="banner_text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto omnis cum provident.</p>
                              <div class="btn_main">
                                 <div class="about_bt active"><a href="#">About Us</a></div>
                                 <div class="quote_bt"><a href="#">Get A Quote</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="image_1"><img src="images/img-8.png"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="banner_taital_main">
                        <div class="row">
                           <div class="col-md-6">
                              <h1 class="banner_taital">Review Your Book By Experts.</h1>
                              <p class="banner_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, ipsam?</p>
                              <div class="btn_main">
                                 <div class="about_bt active"><a href="#">About Us</a></div>
                                 <div class="quote_bt"><a href="#">Get A Quote</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class="fa fa-arrow-left" style="font-size:24px"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class="fa fa-arrow-right" style="font-size:24px"></i>
            </a>
         </div>
      </div>
   </div>
<div>
<!-- <h2>REVIEWED BY EXPERTS</h2> -->
<?php
// Connect to your database and retrieve recommended books
// require 'conn.php';

// $sql = "SELECT * FROM recommended_books";
// $result = $conn->query($sql);

// // Check if there are recommended books
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $bookId = $row['book_id'];
//         $bookTitle = $row['book_title'];
//         $bookPicture = $row['book_picture'];
//         $author = $row['book_author'];

//         // Display recommended books in cards
//         echo '<div class="card">';
//         echo '<div class="card-body">';
//         echo '<img src="' . $bookPicture . '" alt="Book Cover" class="book-image">';
//         echo '<h5 class="card-title">' . $bookTitle . '</h5>';
//         echo '<p class="card-text">Author: ' . $author . '</p>';
//         echo '</div>';
//         echo '</div>';
//     }
// } else {
//     echo 'No recommended books yet.';
// }
?>

</div>

   <div class="footer_section layout_padding">
      <div class="container">
         <div class="subscribe_bt"><a href="#">Subscribe</a></div>
         <input type="text" class="email_text" placeholder="Enter Your Email" name="Enter Your Email">
         <div class="footer_section_2">
            <div class="row">
               <div class="col-lg-3 margin_top">
                  <div class="call_text"><a href="#"><img src="images/call-icon1.png"><span class="padding_left_15">Call Now +01 9876543210</span></a></div>
                  <div class="call_text"><a href="#"><img src="images/mail-icon1.png"><span class="padding_left_15">demo@gmail.com</span></a></div>
               </div>
               <div class="col-lg-3">
                  <div class="information_main">
                     <h4 class="information_text">Information</h4>
                     <p class="many_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="information_main">
                     <h4 class="information_text">Helpful Links</h4>
                     <div class="footer_menu">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><a href="about.html">About</a></li>
                           <li><a href="services.html">Services</a></li>
                           <li><a href="blog.html">Blog</a></li>
                           <li><a href="news.html">News</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="information_main">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
  
   <div class="copyright_section">
      <div class="container">
         <p class="copyright_text">© 2020 All Rights Reserved. <a href="https://html.design">Free html Templates</a></p>
      </div>
   </div>
   
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- javascript -->
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>