<?php
session_start();
require_once '../database/connect.php';

unset($_SESSION['admin']);
session_destroy();
$_SESSION["error"]='Signout Successful';
header("Location: ../admin/login.php");
exit;
?>