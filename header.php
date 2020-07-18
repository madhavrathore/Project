<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Online Examination System</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/TimeCircles.css" />
    <script src="style/TimeCircles.js"></script>
    
</head>
<body>
  <?php 
  if(!isset($_SESSION['user_id']))
  {
  ?>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top scrolling-navbar ">
            <div class="container">
              <a class="navbar-brand" style="color:white"; href="about us.php"> 
                <strong>ABOUT US</strong>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <b><a class="nav-link" style="color:white"; href="Homepage.php">Home
                      <span class="sr-only">(current)</span>
                    </a></b>
                  </li>
                  <li class="nav-item">
                    <b><a class="nav-link" style="color: white"; href="companyprofile.php">Profile</a></b>
                  </li>
                  <li>
                    <li class="nav-item">
                      <b><a class="nav-link" style="color: white"; href="contact.php">Contact us</a></b>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
    <?php
      }
    ?>

  <?php
  if(isset($_SESSION['user_id']))
  {
  ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="Homepage.php">User</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="enroll_exam.php">Enroll Exam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="change_password.php">Change Password</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>    
      </ul>
    </div>  
  </nav>

  <?php
  }
  ?>