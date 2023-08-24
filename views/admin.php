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
    <!-- Rest of your HTML content -->

    <div class="container">
        <!-- Display user information if signed in -->
        <?php 
        
        if ($username && $email && $password): ?>
            <h2>Registered User Information:</h2>
            <p>Username: <?php echo $username; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Password: <?php echo $password; ?></p>
        <?php endif; ?>
    </div>

    <!-- Rest of your HTML content -->

</body>
</html>
