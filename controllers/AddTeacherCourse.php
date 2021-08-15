<?php
if (!isset($_SESSION)) {
	session_start();
}


include('../database/connect.php');
// variable declaration
$teacher_name = "";
$course_name  = "";
$nsu_id       = "";
$email        = "";
$phone        = "";
$department   = "";
$time         = "";
$errors       = array();

// call the add() function if Add_btn is clicked
if (isset($_POST['Add_btn'])) {
	add();
}

// ADD course
function add()
{
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $course_name, $teacher_name, $nsu_id, $email, $department, $phone, $time;


	$course_name     = $_POST["course_name"];
	$teacher_name    = $_POST["teacher_name"];
	$nsu_id          = $_POST["nsu_id"];
	$email           = $_POST["email"];
	$phone           = $_POST["phone"];
	$department      = $_POST["department"];


	date_default_timezone_set('Asia/Dhaka');
	$time = date('d-m-Y h:i A', time());








	$query = "INSERT INTO teacher_courses (course_name, teacher_name,email, phone, nsu_id, department, time)
    VALUES ('$course_name', '$teacher_name', '$email','$phone','$nsu_id','$department','$time')";

	if (mysqli_query($conn, $query)) {


		$_SESSION["status"] = "<b>$course_name</b>  has been added <i class='fas fa-check-circle'></i>";
		header('location: ../teacher/tuitions.php');
	} else {
		$_SESSION["error"] = 'Failed to Add the Course !';
		header('location: ../teacher/tuitions.php');
	}
}







function display_error()
{
	global $errors;

	if (count($errors) > 0) {
		echo '<div class="error">';
		foreach ($errors as $error) {
			echo $error . '<br>';
		}
		echo '</div>';
	}
}
