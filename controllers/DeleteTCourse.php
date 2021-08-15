<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include('../database/connect.php');
// variable declaration
$id    = "";
$name  = "";
$errors   = array();

// call the delete() function if DeleteCourse_btn is clicked
if (isset($_POST['DeleteCourse_btn'])) {
	delete();
}

// DELETE Course
function delete(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $id,$name;

	
      $id     = $_POST["id"];
	  $name   = $_POST["course_name"];






$query = "DELETE FROM teacher_courses WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
      
            $_SESSION["status"]="<b>$name</b> has been deleted <i class='fas fa-check-circle'></i>";
			header('location: ../teacher/tuitions.php');
      }
    else {
        $_SESSION["error"]='Failed to Delete the Course !';
	    header('location: ../teacher/tuitions.php');
      }




			
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
