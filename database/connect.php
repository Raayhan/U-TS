<?php
$servername = "localhost";
$username = "root";
$password = "admin";
// Create connection
$conn = mysqli_connect($servername, $username, $password, "university-ts");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set('Asia/Dhaka');
