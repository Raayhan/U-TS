<?php
session_start();
require_once '../database/connect.php';

unset($_SESSION['student']);
session_destroy();
$_SESSION["error"]='Signout Successful';
header("Location: ../student/login.php");
exit;
