<?php
if (!isset($_SESSION)) {
  session_start();
}


include('../database/connect.php');
// variable declaration
$name       = "";
$email      = "";
$phone      = "";
$gender     = "";
$department = "";
$nsu_id     = "";
$id         = "";
$errors   = array();

// call the register() function if update_btn is clicked
if (isset($_POST['update_btn'])) {
  $password = $_POST["password"];
  $user_id = $_POST["id"];
  $res = mysqli_query($conn, "SELECT * FROM `students` WHERE `id` = '" . $user_id . "' AND `password` = '" . $password . "'");

  $num = mysqli_num_rows($res);

  //check if there was not a match

  if ($num == 0) {

    //if not display error message
    $_SESSION["error"] = 'Incorrect Password';
    header('location:../../student/profile.php');
  } else {

    update();
  }
}


function update()
{
  // call these variables with the global keyword to make them available in function
  global $conn, $errors, $name, $email, $phone, $gender, $department, $id;

  // receive all input values from the form. Call the e() function
  // defined below to escape form values
  $name         = $_POST["name"];
  $email        = $_POST["email"];
  $phone        = $_POST["phone"];
  $gender       = $_POST["gender"];
  $department   = $_POST["department"];
  $nsu_id       = $_POST["nsu_id"];
  $id           = $_POST["id"];
  $password     = $_POST["password"];



  $query = ("UPDATE students SET name = '$name',
      email = '$email', phone = '$phone', nsu_id = '$nsu_id', department = '$department', gender = '$gender'
      WHERE id = '$id'");

  if (mysqli_query($conn, $query)) {


    $_SESSION["status"] = "Profile Updated <i class='fas fa-check-circle'></i>";
    header('location: ../student/profile.php');
  } else {
    $_SESSION["error"] = "Failed to Update Profile <i class='fas fa-times-circle'></i>";
    header('location: ../student/profile.php');
  }
}
