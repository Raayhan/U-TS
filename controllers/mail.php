
<?php
if(!isset($_SESSION))
{
    session_start();
}


include('../database/connect.php');

$name        = "";
$email       = "";
$phone       = "";
$message     = "";
$formcontent = "";
$recipient   = "";
$subject     = "";
$mailheader  = "";

if (isset($_POST['btnSubmit'])) {
	contact();
}

function contact(){
 global $name,$email,$phone,$message,$formcontent,$recipient,$subject,$mailheader;
$name = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$message = $_POST['Message'];
$formcontent="From: $name \n Message: $message";
$recipient = "rayhan.rakib@northsouth.edu";
$subject = "Support-NSU-TS";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

$_SESSION["error"]=" Your message has been sent <i class='fas fa-check-circle'></i>";
header('location: ../pages/support.php');

}

?>