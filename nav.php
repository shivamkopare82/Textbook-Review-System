<?php
// session_start(); // Start the session at the beginning of your PHP script
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Your HTML head content -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
   <!-- Your HTML body content -->
   <div class="header_bg">
      <div class="container">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Other navigation items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.html">About</a>
                  </li>
                  <li class="nav-item">
                     <?php if (isset($_SESSION['id'])) : ?>
                        <a class="nav-link" href="userprofile.php?id=<?php echo $_SESSION['id']; ?>">Profile</a>
                     <?php endif; ?>
                  </li>
                  <?php
                  // No need to check session_status() again; session has already been started at the beginning
                  // Check if the user is logged in
                  if (isset($_SESSION['id'])) {
                     // If logged in, show logout button
                     echo '<li class="nav-item">';
                     echo '<a class="nav-link" href="logout.php">Logout</a>';
                     echo '</li>';
                  } else {
                     // If not logged in, show login button
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
               <!-- Rest of your navigation elements -->
            </div>
         </nav>
      </div>
   </div>
</body>
</html>
