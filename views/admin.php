<?php
require_once './config.php';

// Initialize variables to hold user information
$username = "";
$email = "";
$password = "";

// Check if the user is logged in and retrieve their information
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];

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

$title = 'Admin';
?>

<!DOCTYPE html>
<html lang="en">
    <?php include './head.php' ?>
    <body>
        <!-- Rest of your HTML content -->

        <div class="container">
            <!-- Display user information if signed in -->
            <?php 
        
        if ($username && $email && $password): ?>
            <h2>Registered User Information:</h2>
            <p>Username:
                <?php echo $username; ?></p>
            <p>Email:
                <?php echo $email; ?></p>
            <p>Password:
                <?php echo $password; ?></p>
            <?php endif; ?>
        </div>

        <?php include './footer.php' ?>

    </body>
</html>