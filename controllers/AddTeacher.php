<?php
if(!isset($_SESSION))
    {
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
function register(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $name, $email, $phone, $gender ,$department, $password;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
      $name         = $_POST["name"];
      $email        = $_POST["email"];
      $password     = $_POST["password"];
      $phone        = $_POST["phone"];
      $gender       = $_POST["gender"];
	  $department   = $_POST["department"];
	  $nsu_id       = $_POST["nsu_id"];

	  date_default_timezone_set('Asia/Dhaka');
	  $time = date('d-m-Y');
      






    $query = "INSERT INTO teachers (name, email, password, phone, gender, department,nsu_id, member_since)
    VALUES ('$name', '$email', '$password', '$phone', '$gender', '$department', '$nsu_id','$time')";

    if (mysqli_query($conn, $query)) {
		$logged_in_teacher_id = mysqli_insert_id($conn);

		$_SESSION['teacher'] = getUserById($logged_in_teacher_id); // put logged in user in session
		$_SESSION['success']  = "You are now logged in";
		header('location: ../teacher/dashboard.php');
      
      }
    else {
	 echo "Error: " . $query . "<br>" . mysqli_error($conn);
	 header('location: ../teacher/register.php');
      }




			// get id of the created user
			
		}



// return user array from their id
function getUserById($id){
	global $conn;
	$query = "SELECT * FROM teachers WHERE id=" . $id;
	$result = mysqli_query($conn, $query);

	$teacher = mysqli_fetch_assoc($result);
	return $teacher;
}




function display_error() {
	global $errors;

  	if (count($errors) > 0){
	   	echo '<div class="error">';
			foreach ($errors as $error){
			echo $error .'<br>';
			}
		echo '</div>';
	}
}


function isSignedIn()
{
	if (isset($_SESSION['teacher'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked

if (isset($_GET['TeacherSignout'])) {
	session_destroy();
	unset($_SESSION['teacher']);
	header("location: index.php");
}
