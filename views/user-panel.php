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
        // Retrieve updated information from the form
        $newUsername = $_POST['new_username'];
        $newEmail = $_POST['new_email'];
        $newPassword = $_POST['new_password'];

        // Update user information in the database
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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
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
        <div class="container">
            <div class="user-panel">
                <h1 class="user-panel-header">Welcome to the panel!</h1>
                <?php if ($successMessage): ?>
                <p class="success-message"><?php echo $successMessage; ?></p>
                <?php endif; ?>

                <?php if ($username && $email && $password): ?>
                <h2>Registered User Information:</h2>
                <p>Username:
                    <?php echo $username; ?></p>
                <p>Email:
                    <?php echo $email; ?></p>
                <p>Password:
                    <?php echo $password; ?></p>

                <h2>Update Information:</h2>
                <button
                    type="button"
                    class="btn btn-primary"
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
                                <form id="update-form" method="post">
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
                                    <button type="button" id="save-button" class="btn btn-primary">Save changes</button>
                                </form>
                                <div id="message" class="text-danger mt-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
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