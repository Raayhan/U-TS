<?php
if(!isset($_SESSION))
    {
        session_start();
    }


include('../database/connect.php');
// variable declaration

$password    = "";
$newPassword = "";
$id          = "";
$errors      = array();

// call the register() function if register_btn is clicked
if (isset($_POST['change_btn'])) {
	change();
}

    



function change(){
	// call these variables with the global keyword to make them available in function
	global $conn, $errors, $password, $newPassword, $id;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
     
    
    $id           = $_POST["id"];
    $password     = $_POST["password"];
    $newPassword  = $_POST["newPassword"];

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



      $query = ("UPDATE students SET password = '$newPassword' WHERE id = '$id'");

    if (mysqli_query($conn, $query)) {
      
      
      $_SESSION["error"]="Password Changed Successfully <i class='fas fa-check-circle'></i>";
			header('location: ../pages/settings.php');
      }
    else {
      $_SESSION["error"]="Failed to Change Password <i class='fas fa-times-circle'></i>";
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



  $query = ("UPDATE teachers SET password = '$newPassword' WHERE id = '$id'");

if (mysqli_query($conn, $query)) {
  
  
  $_SESSION["error"]="Password Changed Successfully <i class='fas fa-check-circle'></i>";
        header('location: ../pages/settings.php');
  }
else {
  $_SESSION["error"]="Failed to Change Password <i class='fas fa-times-circle'></i>";
        header('location: ../pages/settings.php');
  }




        
    }

}
}