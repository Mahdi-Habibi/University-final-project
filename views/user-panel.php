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
            <div class="mt-3 user-panel-content">
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
                    <?php endif; ?>
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
        </script>
        <script src="../js/swiper-bundle.min.js"></script>
        <script src="../js/app.js"></script>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/vendor/modernizr-3.12.0.min.js"></script>
    </body>
</html>