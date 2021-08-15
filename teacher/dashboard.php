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

    <title>Teacher Dashboard | UTS</title>
</head>

<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <a href="/" class="brand"><i class="fab fa-accusoft"></i> University Tuition Service</a>
            </div>
            <div class="site-header__middle">
                <nav class="nav">
                    <div class="nav__toggle" aria-expanded="false" onclick="myFunction(this)">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <ul class="nav__wrapper">
                        <li class="nav__item"><a href="dashboard.html">Dashboard</a></li>
                        <li class="nav__item"><a href="tuitions.php">Tuitions</a></li>
                        <li class="nav__item"><a href="profile.php">Profile</a></li>
                        <li class="nav__item"><a href="../contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="site-header__end">
                <a href="/controllers/TeacherSignout.php">Sign out</a>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <h2 class="text-center pt-3">Teacher Dashboard</h2>
    <p class="text-center">Manage your tuitions</p>
    <br>
    <?php if (isset($_SESSION['status'])) {
        echo '
    <h6 class="alert-message-success">' . $_SESSION['status'] . '</h6>';
        unset($_SESSION['status']);
    }
    ?>
    <div class="dashboard-container">

        <div class="row">
            <div class="column">
                <a href="">
                    <div class="box">
                        <h1 class="text-center pt-3"><i class="fas fa-user-graduate"></i></h1>
                        <p class="text-center">Enrolled Students</p>
                        <h1 class="text-center text-blue"> <?php
                                                            $result = mysqli_query($conn, "SELECT student_id FROM student_courses WHERE teacher_id = {$_SESSION['teacher']['nsu_id']}");
                                                            $num_rows = mysqli_num_rows($result);

                                                            echo "$num_rows";

                                                            ?></h1>
                        <p class="text-center small text-blue">View Students</p>
                    </div>
                </a>


            </div>
            <div class="column">
                <a href="">
                    <div class="box">
                        <h1 class="text-center pt-3"><i class="fas fa-book-reader"></i></h1>
                        <p class="text-center">Enrolled Tuitions</p>
                        <h1 class="text-center text-blue"> <?php
                                                            $result = mysqli_query($conn, "SELECT id FROM student_courses WHERE teacher_id = {$_SESSION['teacher']['nsu_id']}");
                                                            $num_rows = mysqli_num_rows($result);

                                                            echo "$num_rows";

                                                            ?></h1>
                        <p class="text-center small text-blue">View Tuitions</p>
                    </div>
                </a>


            </div>
        </div>
        <div class="row">
            <div class="column">
                <a href="tuitions.php">
                    <div class="box">
                        <h1 class="text-center pt-3"><i class="fas fa-book"></i></h1>
                        <p class="text-center">Offered Courses</p>
                        <h1 class="text-center text-blue"> <?php
                                                            $result = mysqli_query($conn, "SELECT course_name FROM teacher_courses WHERE nsu_id = {$_SESSION['teacher']['nsu_id']}");
                                                            $num_rows = mysqli_num_rows($result);

                                                            echo "$num_rows";

                                                            ?></h1>
                        <p class="text-center small text-blue">Manage your courses</p>
                    </div>
                </a>



            </div>
            <div class="column">
                <a href="tuitions.php">
                    <a href="request.php">
                        <div class="box">
                            <h1 class="text-center pt-3"><i class="fas fa-reply-all"></i></h1>
                            <p class="text-center">Course Requests</p>
                            <h1 class="text-center text-blue"> <?php
                                                                $result = mysqli_query($conn, "SELECT id FROM course_requests");
                                                                $num_rows = mysqli_num_rows($result);

                                                                echo "$num_rows";

                                                                ?></h1>
                            <p class="text-center small text-blue">Requests for Tuition</p>
                        </div>
                    </a>
                </a>


            </div>
        </div>

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