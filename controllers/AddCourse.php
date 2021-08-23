<?php
if (!isset($_SESSION)) {
	session_start();
}


include('../database/connect.php');
// variable declaration
$course_name    = "";
$student_name   = "";
$teahcer_name   = "";
$teacher_id     = "";
$student_id     = "";
$teacher_email  = "";
$teacher_phone  = "";
$time           = "";
$teacher_department = "";
$errors   = array();

// call the add() function if ADDCourse_btn is clicked
if (isset($_POST['ADDCourse_btn'])) {
	add();
}

// ADD course
function add()
{
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $course_name, $teacher_name, $teacher_id, $student_id, $teacher_department, $teacher_email, $teacher_phone;


	$course_name     	= $_POST["course_name"];
	$student_name    	= $_POST["student_name"];
	$teacher_name    	= $_POST["teacher_name"];
	$teacher_id      	= $_POST["teacher_id"];
	$student_id      	= $_POST["student_id"];
	$teacher_email   	= $_POST["teacher_email"];
	$teacher_phone   	= $_POST["teacher_phone"];
	$teacher_department = $_POST["teacher_department"];


	date_default_timezone_set('Asia/Dhaka');
	$time = date('d-m-Y h:i A', time());





	$query = "INSERT INTO student_courses (course_name, student_name, teacher_name, teacher_id,student_id,teacher_email,teacher_phone,teacher_department,time)
    VALUES ('$course_name', '$student_name', '$teacher_name', '$teacher_id', '$student_id','$teacher_email','$teacher_phone','$teacher_department','$time')";
	if (isset($_SESSION['teacher'])) {
		if (mysqli_query($conn, $query)) {


			$_SESSION["status"] = "<b>$course_name</b> has been added <i class='fas fa-check-circle'></i>";
			header('location: ../teacher/request.php');
		} else {
			$_SESSION["error"] = 'Failed to Add the Course !';
			header('location: ../teacher/request.php');
		}
	} else {
		if (mysqli_query($conn, $query)) {


			$_SESSION["status"] = "<b>$course_name</b> has been added <i class='fas fa-check-circle'></i>";
			header('location: ../student/tuitions.php');
		} else {
			$_SESSION["error"] = 'Failed to Add the Course !';
			header('location: ../student/tuitions.php');
		}
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
