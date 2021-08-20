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

  //Check if the username or password boxes were not filled in



  $res = mysqli_query($conn, "SELECT * FROM `admin` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");

  $num = mysqli_num_rows($res);

  //check if there was not a match

  if ($num == 0) {

    //if not display error message
    $_SESSION["error"] = 'Invalid Email or Password';
    header('location:../../admin/login.php');
  } else {

    $logged_in_admin_id = mysqli_fetch_assoc($res);

    $_SESSION['admin'] = ($logged_in_admin_id); // put logged in user in session
    header('location:../../admin/dashboard.php');
  }
}
