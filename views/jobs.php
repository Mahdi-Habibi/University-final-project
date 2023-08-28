<?php
require_once './config.php';

$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$title = 'Jobs';
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
                    <li class="breadcrumb-item active" aria-current="page">Jobs</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="jobs-list" id="jobs-list"></div>
        </div>
        <?php include './footer.php' ?>
        <script>
            function updateJobsList() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', './get-new-jobs.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var jobs = JSON.parse(xhr.responseText);
                            console.log(jobs)
                            var jobsList = document.getElementById('jobs-list');
                            jobsList.innerHTML = ''; // Clear the existing job boxes

                            for (var i = 0; i < jobs.length; i++) {
                                var job = jobs[i];
                                var jobBox = document.createElement('div');
                                jobBox.className = 'job-box';
                                jobBox.setAttribute(
                                    'onclick',
                                    `location.href='./single-job.php?job_id=${job.job_id}'`
                                );
                                jobBox.innerHTML = `
                        <h2 class="job-box-header" onclick="location.href='./single-job.php?job_id=${job.job_id}">${job.job_title}</h2>
                        <ul>
                            <li class="job-box-category">${job.category_name}</li>
                            <li class="job-contact-info">${job.job_contact_info}</li>
                            <li class="job-contact-info">${job.username}</li>
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

            // Update jobs list initially and every 10 seconds (adjust the interval as
            // needed)
            updateJobsList();
            setInterval(updateJobsList, 10000);
        </script>
    </body>
</html>