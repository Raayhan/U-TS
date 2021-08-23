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

    <title>Change Password | UTS</title>
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
    <div class="registration-container">
        <h1 class="text-center pt-5 mb-2"><i class="fas fa-user-edit"></i></h1>
        <h2 class="text-center">Change Password</h2><br>

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
            <form action="../controllers/ChangePassword.php" method="post">
                <label for="NewPassword">Enter new password</label>
                <input type="password" name="NewPassword" placeholder=" Enter New Password" required>
                <label class="text-red" for="password">Enter current password to update</label>
                <input type="password" name="password" placeholder=" Enter Current Password" required>
                <input type="hidden" name="id" value="<?php echo $_SESSION['teacher']['id'];?>">
                <input type="submit" name="change_pass" value="Update" class="RegisterButton">
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