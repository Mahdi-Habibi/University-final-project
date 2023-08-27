<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.min.css">
    <title>User Authentication</title>
</head>

<body>
    <!-- breadcrump -->
    <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sign up/Log in</li>
                </ol>
            </nav>
        </div>
    <div class="container signup-login-box-container">
        <div class="mainBox" id="formContainer">
        <div class="tabButtons">
            <button class="tabButton" onclick="showForm('signup')">Sign Up</button>
            <button class="tabButton" onclick="showForm('login')">Log In</button>
        </div>
        <h1 class="signUpHeader">Welcome!</h1>
            <!-- Sign Up Form -->
            <form method="post" class="signUpForm" id="signupForm">
                
                <label for="userName">Username:</label>
                <input type="text" name="username" id="username" required="required" autocomplete="off">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required="required" autocomplete="off">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required="required" autocomplete="off">
                <button type="submit" name="submitSignup">Sign Up</button>
            </form>

            <!-- Log In Form -->
            <form method="post" class="signUpForm" id="loginForm" style="display: none;">
                <label for="loginIdentifier">Username or Email:</label>
                <input type="text" name="login_identifier" id="loginIdentifier" required="required" autocomplete="off">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required="required" autocomplete="off">
                <button type="submit" name="submitLogin">Log In</button>
            </form>
        </div>
    </div>
    <?php include './footer.php' ?>

    <script src="../js/app.min.js"></script>

    <?php
require_once './config.php';

if (isset($_POST["submitSignup"])) {
    // Handle sign-up form submission

    if (
        isset($_POST["username"]) && !is_null($_POST["username"])
        && isset($_POST["email"]) && !is_null($_POST["email"])
        && isset($_POST["password"]) && !is_null($_POST["password"])
    ) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $username;
            // Redirect to the main page after successful signup
            header("Location: ./index.php");
            exit(); // Stop further execution
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

if (isset($_POST["submitLogin"])) {
    // Handle login form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $loginIdentifier = $_POST["login_identifier"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM users WHERE (username = ? OR email = ?) AND password = ?");
        $stmt->bind_param("sss", $loginIdentifier, $loginIdentifier, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $loginIdentifier;
            // Redirect to the main page after successful login
            header("Location: ./index.php");
            exit(); // Stop further execution
        } else {
            echo "Login failed";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

</body>

</html>
