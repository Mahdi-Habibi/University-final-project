<?php
require_once './config.php';

// Initialize variables to hold user information
$username = "";
$email = "";
$password = "";
$successMessage = "";

$categoryQuery = "SELECT * FROM categories";
                    $categoryResult = mysqli_query($conn, $categoryQuery);
$conn->close();

$title = 'User Panel';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include './head.php' ?>
    <body>
        <!-- breadcrump -->
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User panel</li>
                </ol>
            </nav>
        </div>
        <div class="user-panel">
            <h2 class="user-panel-info-header">Submit a New Job:</h2>
            <form id="job-submit-form" method="post" class="signUpForm col-lg-6">
                <label for="job_title">Job Title:</label>
                <input type="text" id="job_title" name="job_title" required="required"><br>
                <label for="job_description">Job Description:</label>
                <textarea id="job_description" name="job_description" required="required"></textarea>
                <label for="job_address">Job Address:</label>
                <input type="text" id="job_address" name="job_address" required="required"><br>
                <label for="job_contact_info">Contact Information:</label>
                <input
                    type="text"
                    id="job_contact_info"
                    name="job_contact_info"
                    required="required">
                <label for="job_category">Job Category:</label>
                <select id="job_category" name="job_category" required="required">
                    <!-- Populate options dynamically from the categories table -->
                <?php
                    

                            if (!$categoryResult) {
                                echo '<option value="">Error fetching categories</option>';
                            } else {
                                while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                    echo '<option value="' . $categoryRow['category_id'] . '">' . $categoryRow['category_name'] . '</option>';
                                }
                            }
                            ?>
                </select><br>
                <button type="button" id="job-submit-button" class="signup-login-btn">Submit Job</button>
            </form>
            <div id="job-message" class="text-danger mt-2"></div>
        </div>
        <script>
            document
                .getElementById("job-submit-button")
                .addEventListener("click", function () {
                    const jobTitleInput = document.getElementById("job_title");
                    const jobDescriptionInput = document.getElementById("job_description");
                    const jobAddressInput = document.getElementById("job_address");
                    const jobCategoryInput = document.getElementById("job_category");
                    const jobContactInfoInput = document.getElementById("job_contact_info");
                    if (jobTitleInput.value && jobDescriptionInput.value && jobAddressInput.value && jobContactInfoInput.value && jobCategoryInput.value) {
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', './submit-job.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    // Clear input fields after successful submission
                                    jobTitleInput.value = "";
                                    jobDescriptionInput.value = "";
                                    jobAddressInput.value = "";
                                    jobContactInfoInput.value = "";
                                    jobCategoryInput.value = "";

                                    // Display success message or handle it as needed
                                    const jobMessage = document.getElementById("job-message");
                                    jobMessage.textContent = "Job submitted successfully!";
                                }
                            }
                        };
                        // Construct the POST data
                        const postData = `job_title=${encodeURIComponent(jobTitleInput.value)}&job_description=${encodeURIComponent(
                            jobDescriptionInput.value
                        )}&job_address=${encodeURIComponent(jobAddressInput.value)}&job_contact_info=${encodeURIComponent(
                            jobContactInfoInput.value
                        )}&job_category=${encodeURIComponent(jobCategoryInput.value)}`;
                        xhr.send(postData);
                    } else {
                        const jobMessage = document.getElementById("job-message");
                        jobMessage.textContent = "Please fill in all the job information!";
                    }
                });
        </script>
    </body>
</html>