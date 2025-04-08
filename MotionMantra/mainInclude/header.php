<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <!-- Student Testimonial Owl Slider CSS -->
    <link rel="stylesheet" type="text/css" href="css/owl.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/testyslider.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    
    <style>
      /* Navbar Styling */
      .navbar {
        background-color: rgba(0, 0, 0, 0.8);
        transition: all 0.3s ease;
      }
      .navbar-brand, .navbar-text, .nav-link {
        color: white !important;
      }
      .navbar-toggler {
        border-color: white;
      }
      .navbar-toggler-icon {
        filter: invert(1);
      }
      .navbar-nav .nav-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
      }

      /* Body Styling */
      body {
        font-family: 'Ubuntu', sans-serif;
        background-color: #f8f9fa;
      }

      /* Buttons */
      .btn {
        border-radius: 20px;
        transition: background-color 0.3s;
      }
      .btn:hover {
        background-color: #343a40;
        color: white;
      }
    </style>
    
    <title>MotionMantra</title>
  </head>
  <body>
     <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
      <a href="index.php" class="navbar-brand">MotionMantra</a>
      <img src="image/logo.png" alt="MotionMantra Logo" style="height: 40px; margin-right: 10px;">
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">
          <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Online Training</a></li>
          <li class="nav-item custom-nav-item"><a href="http://localhost/merchandise/" class="nav-link">Merchandise</a></li>
          <?php 
              session_start();   
              if (isset($_SESSION['is_login'])){
                echo '<li class="nav-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link">My Profile</a></li> <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
              } else {
                echo '<li class="nav-item custom-nav-item"><a href="#login" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a></li> <li class="nav-item custom-nav-item"><a href="#signup" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Signup</a></li>';
              }
          ?> 
          <li class="nav-item custom-nav-item"><a href="admin/adminlogin.php" class="nav-link">Admin</a></li>
          <li class="nav-item custom-nav-item"><a href="#Feedback" class="nav-link">Feedback</a></li>
          <li class="nav-item custom-nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </nav> <!-- End Navigation -->
  </body>
</html>
