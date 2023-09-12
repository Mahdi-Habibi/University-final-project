<?php
$title = 'About us';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include './head.php' ?>
    <body>
        <?php include './header.php' ?>
        <!-- breadcrump -->
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
        <div class="container about-us col-lg-12">
            <h1 class="about-us-header col-lg-12">Empower</h1>
            <figure class="about-us-img col-lg-12"><img src="../img/about-us1.jpg" alt="about us"></figure>
            <p class="col-lg-12">The "Empower" job portal project is a dynamic web platform
                designed to enhance the job recruitment process for both job seekers and
                employers. Leveraging technologies such as HTML, CSS, JavaScript, PHP, and
                MySQL, this project aims to provide a user-friendly and efficient solution for
                matching job seekers with suitable job opportunities and helping employers find
                qualified candidates.</p>
            <div class="row">
                <figure class="about-us-img col-lg-6"><img src="../img/about-us2.jpg" alt="about us"></figure>
                <figure class="about-us-img col-lg-6"><img src="../img/about-us2.jpg" alt="about us"></figure>
            </div>
            <p class="col-lg-12">This project comes as a response to the evolving job
                market, which demands more efficient and technology-driven solutions. "Empower"
                is poised to bridge the gap between job seekers and employers, providing them
                with the tools they need to navigate today's job landscape effectively. As the
                project leverages the power of the web and databases, it represents a successful
                fusion of technology and real-world employment needs. It has the potential to
                improve the lives of individuals seeking employment while aiding organizations
                in finding the right talent efficiently.
            </p>
        </div>
        <?php include './footer.php' ?>
    </body>
</html>