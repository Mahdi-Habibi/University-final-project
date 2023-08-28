<?php
require_once './config.php';
$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$title='EMPOWER';
?>

<!doctype html>
<html class="no-js" lang="">
    <?php include './head.php' ?>
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
            <div class="swiper-wrapper" id="jobs-list">
            </div>
            <div class="jobs-more">
                <a href="./jobs.php" class="jobs-more-link">see more
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
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
        <script>
            function updateJobsList() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', './get-new-jobs.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var jobs = JSON.parse(xhr.responseText);
                            var jobsList = document.getElementById('jobs-list');
                            jobsList.innerHTML = ''; // Clear the existing job boxes

                            for (var i = 0; i < jobs.length; i++) {
                                var job = jobs[i];
                                var jobBox = document.createElement('div');
                                jobBox.className = 'job-box swiper-slide';
                                jobBox.setAttribute('onclick', `location.href='./single-job.php'`);
                                jobBox.innerHTML = `
                                <h2 class="job-box-header" onclick="location.href='./single-job.php'">${job.job_title}</h2>
                                            <ul>
                                                <li class="job-box-category">${job.job_category}</li>
                                                <li class="job-contact-info">${job.job_contact_info}</li>
                                            </ul>
                                            <p>${job.job_description}</p>
                                            <p class="job-address">${job.job_address}</p>
                                            <a href="./single-job.php" class="job-box-link">click</a>
                    `;
                                jobsList.appendChild(jobBox);
                            }
                        }
                    }
                };
                xhr.send();
            }

            // Update jobs list initially and every 10 seconds (adjust the interval as
            // needed)
            updateJobsList();
            setInterval(updateJobsList, 10000);
        </script>
        <script src="../js/swiper-bundle.min.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/vendor/modernizr-3.12.0.min.js"></script>
    </body>
</html>