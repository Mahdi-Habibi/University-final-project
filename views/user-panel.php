<?php
require_once './config.php';

// Initialize variables to hold user information
$username = "";
$email = "";
$password = "";
$successMessage = "";

// Check if the user is logged in and retrieve their information
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newUsername = $_POST['new_username'];
        $newEmail = $_POST['new_email'];
        $newPassword = $_POST['new_password'];

        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE username = ?");
        $stmt->bind_param("ssss", $newUsername, $newEmail, $newPassword, $loggedInUsername);

        if ($stmt->execute()) {
            header("Location: user-update.php");
        }

        $stmt->close();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $loggedInUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userRow = $result->fetch_assoc();
        $username = $userRow['username'];
        $email = $userRow['email'];
        $password = $userRow['password'];
    }

    $stmt->close();
}
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
        <div
            class="container  d-flex flex-column justify-content-center align-items-center">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a
                        class="tabButton"
                        id="user-tab"
                        data-bs-toggle="tab"
                        href="#user-panel">User Information</a>
                </li>
                <li class="nav-item">
                    <a class="tabButton" id="job-tab" data-bs-toggle="tab" href="#job-panel">Submit New Job</a>
                </li>
            </ul>
            <div class="tab-content mt-3 user-panel-content">
                <div class="tab-pane fade show active" id="user-panel">
                    <div class="user-panel">
                        <h1 class="user-panel-header">Welcome to the panel!</h1>
                        <?php if ($successMessage): ?>
                        <p class="success-message"><?php echo $successMessage; ?></p>
                        <?php endif; ?>

                        <?php if ($username && $email && $password): ?>
                        <h2 class="user-panel-info-header">Registered User Information:</h2>
                        <ul class="user-panel-info-list">
                            <li>
                                <span>Username:</span>
                                <?php echo $username; ?></li>
                            <li>
                                <span>Email:</span>
                                <?php echo $email; ?></li>
                            <li>
                                <span>Password:</span>
                                <?php echo $password; ?></li>
                        </ul>

                        <button
                            type="button"
                            class="signup-login-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Update Information
                        </button>

                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="exampleModal"
                            tabindex="-1"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Information</h1>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="update-form" method="post" class="signUpForm">
                                            <label for="new_username">New Username:</label>
                                            <input type="text" id="new_username" name="new_username" required="required"><br>
                                            <label for="new_email">New Email:</label>
                                            <input type="email" id="new_email" name="new_email" required="required"><br>
                                            <label for="new_password">New Password:</label>
                                            <input
                                                type="password"
                                                id="new_password"
                                                name="new_password"
                                                required="required"><br>
                                            <button type="button" id="save-button" class="signup-login-btn">Save changes</button>
                                        </form>
                                        <div id="message" class="text-danger mt-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="job-panel">
                    <div class="user-panel">
                        <h2 class="user-panel-info-header">Submit a New Job:</h2>
                        <form id="job-submit-form" method="post" class="signUpForm">
                            <label for="job_title">Job Title:</label>
                            <input type="text" id="job_title" name="job_title" required="required"><br>
                            <label for="job_description">Job Description:</label>
                            <textarea id="job_description" name="job_description" required="required"></textarea><br>
                            <label for="job_address">Job Address:</label>
                            <input type="text" id="job_address" name="job_address" required="required"><br>
                            <label for="job_contact_info">Contact Information:</label>
                            <input
                                type="text"
                                id="job_contact_info"
                                name="job_contact_info"
                                required="required"><br>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const modal = new bootstrap.Modal(document.getElementById("exampleModal"));
                const messageDiv = document.getElementById("message");

                document
                    .getElementById("save-button")
                    .addEventListener("click", function () {
                        const usernameInput = document.getElementById("new_username");
                        const emailInput = document.getElementById("new_email");
                        const passwordInput = document.getElementById("new_password");

                        if (usernameInput.value && emailInput.value && passwordInput.value) {
                            document
                                .getElementById("update-form")
                                .submit();
                        } else {
                            messageDiv.textContent = "Please fill in all the inputs!";
                            modal.show();
                        }
                    });
            });

            document
                .getElementById("job-submit-button")
                .addEventListener("click", function () {
                    const jobTitleInput = document.getElementById("job_title");
                    const jobDescriptionInput = document.getElementById("job_description");
                    const jobAddressInput = document.getElementById("job_address");
                    const jobContactInfoInput = document.getElementById("job_contact_info");

                    if (jobTitleInput.value && jobDescriptionInput.value && jobAddressInput.value && jobContactInfoInput.value) {
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

                                    // Display success message or handle it as needed
                                    const jobMessage = document.getElementById("job-message");
                                    jobMessage.textContent = "Job submitted successfully!";
                                }
                            }
                        };
                        xhr.send(
                            `job_title=${encodeURIComponent(jobTitleInput.value)}&job_description=${encodeURIComponent(jobDescriptionInput.value)}&job_address=${encodeURIComponent(jobAddressInput.value)}&job_contact_info=${encodeURIComponent(jobContactInfoInput.value)}`
                        );
                    } else {
                        const jobMessage = document.getElementById("job-message");
                        jobMessage.textContent = "Please fill in all the job information!";
                    }
                });
        </script>
        <script src="../js/swiper-bundle.min.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/vendor/modernizr-3.12.0.min.js"></script>
    </body>
</html>