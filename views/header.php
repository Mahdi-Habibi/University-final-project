<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Header</title>
        <head>
            <meta charset="utf-8">
            <title>EMPOWER</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <meta property="og:title" content="">
            <meta property="og:type" content="">
            <meta property="og:url" content="">
            <meta property="og:image" content="">

            <link rel="icon" href="../img/profile.png" type="image/svg+xml">
            <link rel="stylesheet" href="../css/all.min.css">
            <link rel="stylesheet" href="../css/normalize.css">
            <link rel="stylesheet" href="../css/style.min.css">
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/swiper-bundle.min.css">
            <link rel="manifest" href="site.webmanifest">
            <meta name="theme-color" content="#fafafa">
        </head>
    </head>
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
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University%20final%20project/public/views/index.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University%20final%20project/public/views/index.php">Home</a>
                        </li>
                        <li
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University%20final%20project/public/views/jobs.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University%20final%20project/public/views/jobs.php">Jobs</a>
                        </li>
                        <li
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University%20final%20project/public/views/contact.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University%20final%20project/public/views/contact.php">Contact</a>
                        </li>
                        <li
                            class="navbar-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/University%20final%20project/public/views/about-us.php') !== false) ? 'active' : ''; ?>">
                            <a href="/University%20final%20project/public/views/about-us.php">About</a>
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