<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet"> 
    <title>Document</title>
</head>
<body>
    <!-- ---------------star navigation---------------------- -->
    <nav class="navbar navbar-expand-sm navbar-dark pl-3 fixed-top bg scrolled">
  <a class="navbar-brand" href="index.php">Learning</a>
  <small class="navbar-text">Learn and implement</small>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav custom-nav pl-5">
      <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
      <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
      <?php
      if(!isset($_SESSION))
      {
        session_start();
      }
      if(isset($_SESSION['is_login']))
      {
        echo '
        <li class="nav-item custom-nav-item"><a href="student/studentProfile.php" class="nav-link">My profile</a></li>
      <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
        ';
      }
      else{
        echo '
        <li class="nav-item custom-nav-item"><a href="" class="nav-link" data-toggle="modal" data-target="#stuLoginModelCenter
      ">Login</a></li>
      <li class="nav-item custom-nav-item"><a href="" class="nav-link" data-toggle="modal" data-target="#stuRegModelCenter">Signup</a></li>
        ';
      }


      ?>
      
      
      <li class="nav-item custom-nav-item"><a href="student/stuFeedback.php" class="nav-link">Feedback</a></li>
      <li class="nav-item custom-nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
    </ul>
  </div>
</nav>