<?php
require('../database/connect.php');
include('../controllers/AddTeacher.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Titlebar Icon -->
  <link rel="icon" href="../img/icon.png" type="image/x-icon" />
  <!-- Css Files -->
  <link rel="stylesheet" href="../css/style.css" />
  <!-- JavaScript Files -->
  <script src="../js/script.js"></script>
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/753fbd11bf.js" crossorigin="anonymous"></script>

  <title>Teacher Registration | UTS</title>
</head>

<body>
  <!-- Header Start -->
  <header class="site-header">
    <div class="wrapper site-header__wrapper">
      <div class="site-header__start">
        <a href="/" class="brand"><i class="fab fa-accusoft"></i> University Tuition Service</a>
      </div>
      <div class="site-header__middle">
        <nav class="nav">
          <div class="nav__toggle" aria-expanded="false" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div>
          <ul class="nav__wrapper">
            <li class="nav__item"><a href="#">Home</a></li>
            <li class="nav__item"><a href="#">About</a></li>
            <li class="nav__item"><a href="#">Services</a></li>
            <li class="nav__item"><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>
      <div class="site-header__end">
        <a href="#">Sign in</a>
      </div>
    </div>
  </header>
  <!-- Header End -->
  <div class="registration-container">
    <h1 class="text-center pt-5"><i class="fab fa-accusoft"></i></h1>
    <h2 class="text-center">Teacher Registration</h2><br>

    <div class="form-section">
      <form action="/controllers/AddTeacher.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder=" Teacher Name" required autofocus>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder=" Teacher Email" required>
        <label for="phone">Phone</label>
        <input type="number" name="phone" placeholder=" Teacher Phone" required>
        <div class="row">
          <div class="column-form">
            <label for="department">Department</label>
            <select name="department" class="form-select">
              <option class="hidden" selected disabled>Select Department</option>
              <option value="ECE">ECE</option>
              <option value="BBA">BBA</option>
              <option value="Architecture">Architecture</option>
              <option value="Pharmacy">Pharmacy</option>
              <option value="Civil Engineering">Civil Engineering</option>
              <option value="English">English</option>
              <option value="Enviromental Science">Environmental Science</option>
              <option value="Others">Others</option>
            </select>
          </div>
          <div class="column-form">
            <label for="department">Gender</label>
            <select name="gender" class="form-select">
              <option class="hidden" selected disabled>Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
            </select>
          </div>
        </div>
        <label for="nsu_id">NSU ID</label>
        <input type="number" name="nsu_id" placeholder=" Teacher ID" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder=" Enter Password" required>
        <label for="cpassword">Confirm Password</label>
        <input type="password" name="cpassword" placeholder=" Confirm Password" required>
        <input type="submit" name="register_btn" value="Register" class="RegisterButton">
      </form>
      <div>
        <h6>Already have an account? <a class="text-blue" href="login.php">Login as a Teacher</a></h6>
      </div>
    </div>

  </div>

  </div>
  <!-- Welcome Page Start -->

  <!-- Welcome Page End -->
  <div class="footer">
    <div class="row">
      <div class="column">
        <h4><i class="fab fa-accusoft"></i> University Tuition Service</h4>
        <p class="small">All right reserved ??</p>

      </div>
      <div class="column">
        <h4>Links</h4>
        <div class="small">
          <ul>
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/header.js"></script>
</body>

</html>