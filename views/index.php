<?php
require_once './config.php'; // Including the configuration file to establish database connection

$query = "SELECT * FROM jobs"; // SQL query to select all records from the 'jobs' table
$result = mysqli_query($conn, $query); // Executing the query using the database connection

// Checking if the query execution was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Display an error message and terminate script if query fails
}

$title = 'EMPOWER'; // Setting the value of the 'title' variable to 'EMPOWER'
?>

<!DOCTYPE html>
<html class="no-js" lang="">
    <?php include './head.php' ?> <!-- Including the HTML head section -->
    <body>
        <!-- Header Section -->
        <?php include './header.php' ?> <!-- Including the header section -->
        
        <!-- Breadcrumb Section -->
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
            </nav>
        </div>
        
        <!-- Top Banner Section -->
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
        
        <!-- Swiper Section -->
        <div class="swiper mySwiper swiper-custom">
            <div class="swiper-wrapper" id="jobs-list"></div>
            <div class="jobs-more">
                <a href="./jobs.php" class="jobs-more-link">see more
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
        
        <!-- About Us Section -->
        <div class="about-us">
            <div class="container">
                <h3 class="about-us-header">lorem ipsum</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat quasi ...</p>
                <a href="./about-us.php" class="about-us-btn">click</a>
            </div>
        </div>
        
        <!-- Footer Section -->
        <?php include './footer.php' ?> <!-- Including the footer section -->
        
        <!-- JavaScript Section for updating and displaying jobs using AJAX -->
        <script>
            // JavaScript function for updating job list with AJAX
            function updateJobsList() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', './get-new-jobs.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var jobs = JSON.parse(xhr.responseText);
                            var jobsList = document.getElementById('jobs-list');
                            jobsList.innerHTML = ''; // Clear the existing job boxes

                            // Loop through jobs and create job boxes dynamically
                            for (var i = 0; i < jobs.length; i++) {
                                // Creating elements for job boxes
                                var job = jobs[i];
                                var jobBox = document.createElement('div');
                                jobBox.className = 'indexp-job-box job-box swiper-slide';
                                jobBox.setAttribute('onclick', `location.href='./single-job.php?job_id=${job.job_id}'`);
                                jobBox.innerHTML = `
                                    <h2 class="job-box-header" onclick="location.href='./single-job.php?job_id=${job.job_id}'">${job.job_title}</h2>
                                    <ul class="job-box-list-index-section">
                                        <li class="job-box-category">${job.category_name}</li>
                                        <li class="job-contact-info">${job.job_contact_info}</li>
                                    </ul>
                                    <p>${job.job_description}</p>
                                    <p class="job-address">${job.job_address}</p>
                                    <a href="./single-job.php?job_id=${job.job_id}" class="job-box-link">click</a>
                                `;
                                jobsList.appendChild(jobBox);
                            }
                        }
                    }
                };
                xhr.send();
            }

            // Update jobs list initially and every 10 seconds (adjust the interval as needed)
            updateJobsList();
            setInterval(updateJobsList, 10000);
        </script>
        <!-- JavaScript dependencies -->
        <script src="../js/swiper-bundle.min.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/vendor/modernizr-3.12.0.min.js"></script>
    </body>
</html>
