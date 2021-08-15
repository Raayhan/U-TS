<?php
require('../database/connect.php');
include('../controllers/AddStudent.php');

if (!isset($_SESSION['student'])) {
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

    <title>Edit Profile | UTS</title>
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
                        <li class="nav__item"><a href="tuitions.html">Tuitions</a></li>
                        <li class="nav__item"><a href="profile.php">Profile</a></li>
                        <li class="nav__item"><a href="../contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="site-header__end">
                <a href="../controllers/StudentSignout.php">Sign out</a>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <div class="registration-container">
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

            <form action="../controllers/UpdateStudent.php" method="post">
                <?php
                $id = $_SESSION['student']['id'];
                $query = ("SELECT * FROM students where id =  $id");

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
                <input type="password" name="password" placeholder=" Enter Password" required>';
                    echo '<input type="hidden" name="id" value="' . $id . '">';
                }
                ?>

                <input type="submit" value="Update" name="update_btn" class="RegisterButton">
            </form>
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