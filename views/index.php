<!doctype html>
<html class="no-js" lang="">
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
    <body>
        <!-- header -->
        <header>
            <div class="container">
                <div class="navbar-custom">
                    <a href="./index.php" class="header-logo">
                        <figure><img src="../img/default.png" alt="header logo"></figure>
                    </a>
                    <ul class="navbar-list">
                        <li class="navbar-link active">
                            <a href="./index.php">Home</a>
                        </li>
                        <li class="navbar-link">
                            <a href="#">Contact</a>
                        </li>
                        <li class="navbar-link">
                            <a href="./about-us.html">About</a>
                        </li>
                    </ul>
                    <div class="signin-register-sec">
                    <?php
                    session_start();
                    if (isset($_SESSION['username'])) {
                        echo '<a href="./admin.php" class="username signin-register-link">' .
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
        <!-- breadcrump -->
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
            </nav>

        </div>
        <!-- top banner -->
        <div class="top-banner">
            <h1 class="top-heading">EMPOWER</h1>
            <p>Find the best job for yourself from around the world!</p>
            <div class="top-banner-searchbar">
                <input type="search" name="searchbar" id="searchbar" placeholder="Search...">
                <i class="fa-regular fa-magnifying-glass"></i>
            </div>
            <div class="scroll-down1">
                <i class="fa fa-angle-down"></i>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper swiper-custom">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title">lorem ipsum</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut
                                quibusdam assumenda incidunt quisquam architecto iure, illo quaerat cupiditate
                                aliquam repudiandae minima odit nostrum et adipisci deleniti hic odio veniam
                                temporibus.</p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link">click</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title">lorem ipsum</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut
                                quibusdam assumenda incidunt quisquam architecto iure, illo quaerat cupiditate
                                aliquam repudiandae minima odit nostrum et adipisci deleniti hic odio veniam
                                temporibus.</p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link">click</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title">lorem ipsum</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut
                                quibusdam assumenda incidunt quisquam architecto iure, illo quaerat cupiditate
                                aliquam repudiandae minima odit nostrum et adipisci deleniti hic odio veniam
                                temporibus.</p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link">click</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title">lorem ipsum</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut
                                quibusdam assumenda incidunt quisquam architecto iure, illo quaerat cupiditate
                                aliquam repudiandae minima odit nostrum et adipisci deleniti hic odio veniam
                                temporibus.</p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link">click</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title">lorem ipsum</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut
                                quibusdam assumenda incidunt quisquam architecto iure, illo quaerat cupiditate
                                aliquam repudiandae minima odit nostrum et adipisci deleniti hic odio veniam
                                temporibus.</p>
                        </div>
                        <div class="card-body">
                            <a href="#" class="card-link">click</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about us -->
        <div class="about-us">
            <div class="container">
                <h3 class="about-us-header">lorem ipsum</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quasi
                    ratione dolor magni repellat neque totam eveniet repellendus, itaque provident!
                    Aliquam repellat ex nihil earum architecto, natus consectetur magnam
                    perspiciatis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga
                    autem ipsam quidem, error maiores deleniti non aliquid ipsum nostrum aut
                    veritatis itaque a facere porro, nulla facilis quas omnis? Rem. Lorem ipsum
                    dolor sit amet consectetur adipisicing elit. Quae, consequatur illo
                    reprehenderit aliquam, dolorum, accusamus fugit blanditiis deserunt velit
                    pariatur tenetur at perspiciatis. Delectus quod expedita adipisci sint vitae
                    aliquam!</p>
                <a href="./about-us.html" class="about-us-btn">click</a>
            </div>
        </div>
        <!-- footer -->
        <footer>
            <div class="container">
                <p>&copy; 2023 EMPOWER. All rights reserved.</p>
            </div>
        </footer>
        <script src="../js/swiper-bundle.min.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/vendor/modernizr-3.12.0.min.js"></script>
    </body>
</html>