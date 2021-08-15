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
$password   = "";
$nsu_id     = "";
$time       = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register()
{
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $name, $email, $phone, $gender, $department, $password, $time;

	// receive all input values from the form. Call the e() function
	// defined below to escape form values
	$name         = $_POST["name"];
	$email        = $_POST["email"];
	$password     = $_POST["password"];
	$cpassword    = $_POST["cpassword"];
	$phone        = $_POST["phone"];
	$gender       = $_POST["gender"];
	$department   = $_POST["department"];
	$nsu_id       = $_POST["nsu_id"];


	date_default_timezone_set('Asia/Dhaka');
	$time = date('d-m-Y');





	$query = "INSERT INTO students (name, email, password, phone, gender, department, nsu_id, member_since)
    VALUES ('$name', '$email', '$password', '$phone', '$gender', '$department','$nsu_id','$time')";

	if (mysqli_query($conn, $query)) {
		// get id of the created user
		$logged_in_student_id = mysqli_insert_id($conn);

		$_SESSION['student'] = getUserById($logged_in_student_id); // put logged in user in session

		header('location: ../../student/dashboard.php');
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
		header('location: ../../index.php');
	}
}



// return user array from their id
function getUserById($id)
{
	global $conn;
	$query = "SELECT * FROM students WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$student = mysqli_fetch_assoc($result);
	return $student;
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


function isSignedIn()
{
	if (isset($_SESSION['student'])) {
		return true;
	} else {
		return false;
	}
}

// log user out if logout button clicked

if (isset($_GET['StudentSignout'])) {
	session_destroy();
	unset($_SESSION['student']);
	header("location: ../../index.php");
}
