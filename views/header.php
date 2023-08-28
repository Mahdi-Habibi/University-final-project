
<?php
$title = 'Header';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include './head.php' ?>
    <body>
        <!-- header -->
        <header>
            <div class="container">
                <div class="navbar-custom">
                    <a href="./index.php" class="header-logo">
                        <figure><img src="../img/default.png" alt="header logo"></figure>
                    </a>
                    <ul class="navbar-list">
                        <li
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University_final_project/public/views/index.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University_final_project/public/views/index.php">Home</a>
                        </li>
                        <li
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University_final_project/public/views/jobs.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University_final_project/public/views/jobs.php">Jobs</a>
                        </li>
                        <li
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University_final_project/public/views/contact.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University_final_project/public/views/contact.php">Contact</a>
                        </li>
                        <li
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University_final_project/public/views/about-us.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University_final_project/public/views/about-us.php">About</a>
                        </li>
                    </ul>

                    <div class="signin-register-sec">
                    <?php
            if (isset($_SESSION['username'])) {
                echo '<a href="./user-panel.php" class="username signin-register-link">' .
                    '<i class="fa-regular fa-user"></i>' . $_SESSION['username'] . '</a>';
                // Display the Log Out button
                echo '<a href="./logout.php" class="logout-button signin-register-link"><span> - </span>Log Out</a>';
            } else {
                echo '<a href="./signuplogin.php" class="signin-register-link">sign in/ register</a>';
            }
            ?>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>