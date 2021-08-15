<?php
session_start();
require_once '../database/connect.php';

unset($_SESSION['teacher']);
session_destroy();
$_SESSION["error"]='Signout Successful';
header("Location: ../teacher/login.php");
exit;
?>