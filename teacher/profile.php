<?php
require('../database/connect.php');
include('../controllers/AddTeacher.php');

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

    <title>Teacher Profile | UTS</title>
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
    <h4 class="text-center pt-3">Teacher Profile</h4>
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
    <div class="profile-container">
        <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'Profile')">Profile</button>
            <button class="tablinks" onclick="openTab(event, 'Courses')">Courses</button>
            <button class="tablinks" onclick="openTab(event, 'Edit')">Edit</button>
        </div>
        <div id="Profile" class="row tabcontent">
            <div class="column">
                <img class="student_img" src="../img/teacher.png" alt="">
            </div>
            <div class="column profile">
                <?php
                $id = $_SESSION['teacher']['id'];
                $query = ("SELECT * FROM teachers where id =  $id");

                if ($result = $conn->query($query)) {

                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()) {
                        $name         = $row["name"];
                        $email        = $row["email"];
                        $phone        = $row["phone"];
                        $department   = $row["department"];
                        $gender       = $row["gender"];
                        $nsu_id       = $row["nsu_id"];
                        $member_since = $row["member_since"];
                    }

                    /* free result set */
                    $result->free();
                    echo '<br><h2>' . $name . '</h2><br><br>';
                    echo '<h5 class="mb-2">Teacher Information</h5>
                    <hr>';
                    echo '<span><b>NSU ID:</b>
                        ' . $nsu_id . '</span>
                    <hr>';
                    echo '<span><b>Department:</b>
                        ' . $department . '</span>
                    <hr>';
                    echo '<span><b>Email:</b>
                        ' . $email . '</span>
                    <hr>';
                    echo '<span><b>Phone:</b>
                        ' . $phone . '</span>
                    <hr>';
                    echo '<span><b>Member Since:</b>
                        ' . $member_since . '</span>';
                }
                ?>

                <hr>




            </div>
        </div>
        <div id="Courses" class="row tabcontent" style="display:none">
            <div class="column">
                <img class="student_img" src="../img/teacher.png" alt="">
            </div>
            <div class="column profile">
                <?php
                $sql = "SELECT * FROM student_courses WHERE teacher_id = {$_SESSION['teacher']['nsu_id']}";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row

                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="d-flex w-100 justify-content-between">';
                        echo '<h5 class="mb-2 h5">' . $row['course_name'] . "</h5>";
                     
                        echo "</div>";

                        echo '<div class="mb-2">';
                        echo '<div class="course_list">
                                                  <hr><strong>Student Name : </strong>' . $row['student_name'] . '<hr>';
                        echo '<strong>NSU ID : </strong>' . $row['student_id'] . '<hr>';
                        echo '<strong>Added On : </strong>' . $row['time'] . '<hr>';


                        echo '</div>';
                        echo '<BR><hr>';
                        echo '</div>';
                    }
                } else {

                    echo "No Courses Available";
                }
                ?>





            </div>
        </div>
        <div id="Edit" class="tabcontent" style="display:none">

            <div>
                <h1 class="text-center pt-5 mb-2"><i class="fas fa-user-edit"></i></h1>
                <h2 class="text-center">Edit Profile Informations</h2><br>

                <div class="form-section">
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

                    <form action="../controllers/UpdateTeacher.php" method="post">
                        <?php
                        $id = $_SESSION['teacher']['id'];
                        $query = ("SELECT * FROM teachers where id =  $id");

                        if ($result = $conn->query($query)) {

                            /* fetch associative array */
                            while ($row = $result->fetch_assoc()) {
                                $name       = $row["name"];
                                $email      = $row["email"];
                                $phone      = $row["phone"];
                                $department = $row["department"];
                                $gender     = $row["gender"];
                                $nsu_id     = $row["nsu_id"];
                            }

                            /* free result set */
                            $result->free();
                            echo  '<label for="name">Name</label>';
                            echo  '<input type="text" name="name" value="' . $name . '" required>';
                            echo '<label for="email">Email</label>';
                            echo '<input type="email" name="email" value="' . $email . '" required>';
                            echo '<label for="phone">Phone</label>';
                            echo '<input type="number" name="phone" value="' . $phone . '" required>';
                            echo '<div class="row">
                        <div class="column-form">
                            <label for="department">Department</label>
                            <select name="department" class="form-select">
                                <option value="' . $department . '" selected>' . $department . '</option>
                                <option value="ECE">ECE</option>
                                <option value="BBA">BBA</option>
                                <option value="Architecture">Architecture</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="English">English</option>
                                <option value="Enviromental Science">Environmental Science</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>';
                            echo '<div class="column-form">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="' . $gender . '" selected>' . $gender . '</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>';
                            echo '<label for="nsu_id">NSU ID</label>';
                            echo '<input type="number" name="nsu_id" value="' . $nsu_id . '" required>
                    <label class="text-red" for="password">Enter password to update</label>
                    <input type="password" name="password" placeholder=" Enter Password" required autofocus>';
                            echo '<input type="hidden" name="id" value="' . $id . '">';
                        }
                        ?>

                        <input type="submit" value="Update" name="update_btn" class="RegisterButton">
                    </form>
                    <a style="color:blue" href="password.php">Change Password</a>
                </div>




            </div>
        </div>






    </div>


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
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <script src="../js/header.js"></script>
</body>

</html>