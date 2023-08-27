<?php
require_once './config.php';
?>

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
        <?php include './header.php' ?>
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
            <div class="jobs-more">
            <a href="./jobs.php" class="jobs-more-link">see more <i class="fa-solid fa-arrow-right"></i></a>
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
                <a href="./about-us.php" class="about-us-btn">click</a>
            </div>
        </div>
        <!-- footer -->
        <?php include './footer.php'?>
        <script src="../js/swiper-bundle.min.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/vendor/modernizr-3.12.0.min.js"></script>
    </body>
</html>