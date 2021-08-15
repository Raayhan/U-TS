<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include('../database/connect.php');
// variable declaration

$email      = "";
$id         = "";
$password   = "";
$errors     = array();

// call the register() function if register_btn is clicked
if (isset($_POST['change_btn'])) {
	change();
}

    



function change(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $email, $id;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
     
    $email        = $_POST["email"];
    $id           = $_POST["id"];
    $password     = $_POST["password"];

    if (isset($_SESSION['student'])){

        $res = mysqli_query($conn,"SELECT * FROM `students` WHERE `id` = '".$id."' AND `password` = '".$password."'");

        $num = mysqli_num_rows($res);
        
        //check if there was not a match
        
        if($num == 0){
        
        //if not display error message
        $_SESSION["error"]='Invalid Password <i class="fas fa-times-circle"></i>';
        header('location:../../pages/settings.php');
        
        }
        else{



      $query = ("UPDATE students SET email = '$email' WHERE id = '$id'");

    if (mysqli_query($conn, $query)) {
      
      
      $_SESSION["error"]="Email Changed Successfully <i class='fas fa-check-circle'></i>";
			header('location: ../pages/settings.php');
      }
    else {
      $_SESSION["error"]="Failed to Change Email <i class='fas fa-times-circle'></i>";
			header('location: ../pages/settings.php');
      }




			
		}

}

if (isset($_SESSION['teacher'])){

    $res = mysqli_query($conn,"SELECT * FROM `teachers` WHERE `id` = '".$id."' AND `password` = '".$password."'");

    $num = mysqli_num_rows($res);
    
    //check if there was not a match
    
    if($num == 0){
    
    //if not display error message
    $_SESSION["error"]='Invalid Password <i class="fas fa-times-circle"></i>';
    header('location:../../pages/settings.php');
    
    }
    else{



  $query = ("UPDATE teachers SET email = '$email' WHERE id = '$id'");

if (mysqli_query($conn, $query)) {
  
  
  $_SESSION["error"]="Email Changed Successfully <i class='fas fa-check-circle'></i>";
        header('location: ../pages/settings.php');
  }
else {
  $_SESSION["error"]="Failed to Change Email <i class='fas fa-times-circle'></i>";
        header('location: ../pages/settings.php');
  }




        
    }

}
}