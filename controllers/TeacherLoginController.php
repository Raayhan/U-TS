<?php

//allow sessions to be passed so we can see if the user is logged in

if (!isset($_SESSION)) {
  session_start();
}

//connect to the database so we can check, edit, or insert data to our users table

include('../database/connect.php');

//include out functions file giving us access to the protect() function made earlier





//If the user has submitted the form

if (isset($_POST['login_btn'])) {
  //protect the posted value then store them to variables

  $email = ($_POST['email']);

  $password = ($_POST['password']);



  $res = mysqli_query($conn, "SELECT * FROM `teachers` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");

  $num = mysqli_num_rows($res);

  //check if there was not a match

  if ($num == 0) {

    $_SESSION["error"] = 'Invalid Email or Password';
    header('location:../teacher/login.php');
  } else {

    $logged_in_teacher_id = mysqli_fetch_assoc($res);

    $_SESSION['teacher'] = ($logged_in_teacher_id); // put logged in user in session
    $_SESSION['status']  = "Welcome";
    header('location:../teacher/dashboard.php');
  }
}
