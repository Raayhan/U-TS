<?php
require('../database/connect.php');
include('../controllers/AddTeacher.php');
include('../controllers/TeacherLoginController.php');

if (!isset($_SESSION['teacher'])) {
    // not logged in
    $_SESSION["error"] = 'You must login first !';
    header('Location: login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Titlebar Icon -->
    <link rel="icon" href="../img/icon.png" type="image/x-icon" />
    <!-- Css Files -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- JavaScript Files -->
    <script src="../js/script.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/753fbd11bf.js" crossorigin="anonymous"></script>

    <title>Course Requests | UTS</title>
</head>

<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <a href="dashboard.php" class="brand"><i class="fab fa-accusoft"></i> University Tuition Service</a>
            </div>
            <div class="site-header__middle">
                <nav class="nav">
                    <div class="nav__toggle" aria-expanded="false" onclick="myFunction(this)">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <ul class="nav__wrapper">
                        <li class="nav__item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="nav__item"><a href="tuitions.php">Tuitions</a></li>
                        <li class="nav__item"><a href="profile.php">Profile</a></li>
                        <li class="nav__item"><a href="../contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="site-header__end">
                <a href="../controllers/TeacherSignout.php">Sign out</a>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <h2 class="text-center pt-3">Available Course Request</h2><br>
    <p class="text-center">Select your preferred tuition</p>
    <div class="container-department">
        <br>
        <?php if (isset($_SESSION['error'])) {
            echo '
                                                <h6 class="alert-message-danger" id="error">' . $_SESSION['error'] . '</h6>';
            unset($_SESSION['error']);
        }
        ?>
        <?php if (isset($_SESSION['status'])) {
            echo '
                                                <h6 class="alert-message-success" id="status">' . $_SESSION['status'] . '</h6>';
            unset($_SESSION['status']);
        }
        ?>
        <?php

        $sql = "SELECT * FROM course_requests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row

            while ($row = $result->fetch_assoc()) {
                echo '<div class="tuition-box">';
                echo '<h3 class="text-center pt-3"><i class="fas fa-chalkboard-teacher"></i></h3><br>';
                echo '<h3 class="text-center text-blue">' . $row['course_name'] . '</h3>';
                echo '<hr>';
                echo '<h4 class="text-center text-red">' . $row['student_name'] . '</h4>';
                echo '<hr>';
                echo '<div class="row">';
                echo ' <div class="column">';
                echo '<hr>';
                echo '<h5>NSU ID : ' . $row['student_id'] . '</h5>';
                echo '<hr>';
                echo '<h5>Phone: ' . $row['student_phone'] . '</h5>';
                echo '<hr>';
                echo '</div>';
                echo '<div class="column">';
                echo ' <hr>';
                echo '<h5>Email : ' . $row['student_email'] . '</h5>';
                echo '<hr>';
                echo '<h5>Requested Date: ' . $row['time'] . '</h5>';
                echo '<hr>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center">';

                echo                   '<form action="../controllers/AddCourse.php" method="POST">';

                echo                     '<input type="hidden" name="course_name" value= "' . $row['course_name'] . '">';
                echo                     '<input type="hidden" name="student_name" value="' . $row['student_name'] . '">';
                echo                     '<input type="hidden" name="teacher_name" value="' .  $_SESSION['teacher']['name'] . '">';
                echo                     '<input type="hidden" name="teacher_id" value= "' . $_SESSION['teacher']['nsu_id'] . '">';
                echo                     '<input type="hidden" name="student_id" value= "' . $row['student_id'] . '">';
                echo                     '<input type="hidden" name="teacher_email" value= "' . $_SESSION['teacher']['email'] . '">';
                echo                     '<input type="hidden" name="teacher_phone" value= "' . $_SESSION['teacher']['phone'] . '">';
                echo                     '<input type="hidden" name="teacher_department" value= "' . $_SESSION['teacher']['department'] . '">';



                echo '<div class="row justify-content-center mt-4">
                            <button type="submit" name="ADDCourse_btn" class="EnrollButton">Enroll</button>
                        </div>
                                          </form>';
                echo '</div>';


                echo '</div>';
            }
        } else {

            echo '<h6 class="alert-message-danger text-center">No Request Available</h6>';
        }
        ?>

    </div>

    <!-- Welcome Page Start -->

    <!-- Welcome Page End -->
    <div class="footer">
        <div class="row">
            <div class="column">
                <h4><i class="fab fa-accusoft"></i> University Tuition Service</h4>
                <p class="small">All right reserved ©</p>

            </div>
            <div class="column">
                <h4>Links</h4>
                <div class="small">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/header.js"></script>
</body>

</html>