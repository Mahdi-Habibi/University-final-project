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
                    <li class="breadcrumb-item">
                        <a href="./index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
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