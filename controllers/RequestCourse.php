<?php
if (!isset($_SESSION)) {
    session_start();
}


include('../database/connect.php');
// variable declaration
$student_name   = "";
$course_name    = "";
$student_id     = "";
$student_email  = "";
$student_phone  = "";
$time           = "";


// call the add() function if Add_btn is clicked
if (isset($_POST['Add_btn'])) {
    add();
}

// ADD course
function add()
{
    // call these variables with the global keyword to make them available in function
    global $conn, $course_name, $student_name, $student_id, $student_email, $student_phone, $time;


    $course_name     = $_POST["course_name"];
    $student_name    = $_POST["student_name"];
    $student_id      = $_POST["student_id"];
    $student_email   = $_POST["student_email"];
    $student_phone   = $_POST["student_phone"];


    date_default_timezone_set('Asia/Dhaka');
    $time = date('d-m-Y h:i A', time());








    $query = "INSERT INTO course_requests (course_name, student_name,student_email, student_phone, student_id, time)
    VALUES ('$course_name', '$student_name', '$student_email','$student_phone','$student_id','$time')";

    if (mysqli_query($conn, $query)) {


        $_SESSION["status"] = "<b>$course_name</b>  course request has been submitted <i class='fas fa-check-circle'></i>";
        header('location: ../student/request.php');
    } else {
        $_SESSION["error"] = 'Failed to request the Course !';
        header('location: ../student/request.php');
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
