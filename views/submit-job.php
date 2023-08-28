<?php
require_once './config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jobTitle = $_POST['job_title'];
    $jobDescription = $_POST['job_description'];
    $jobAddress = $_POST['job_address'];
    $jobContactInfo = $_POST['job_contact_info'];
    $jobCategory = $_POST['job_category']; // Get the selected category ID

    $loggedInUsername = $_SESSION['username'];

    // Debugging output
    echo "Selected category: $jobCategory";

    $stmt = $conn->prepare("INSERT INTO jobs (job_title, job_description, job_address, job_contact_info, poster_id) VALUES (?, ?, ?, ?, (SELECT user_id FROM users WHERE username = ?))");
    $stmt->bind_param("sssss", $jobTitle, $jobDescription, $jobAddress, $jobContactInfo, $loggedInUsername);

    if ($stmt->execute()) {
        $stmt->close();

        // Insert the selected category into job_categories table
        $newJobId = mysqli_insert_id($conn); // Get the ID of the newly inserted job
        $categoryStmt = $conn->prepare("INSERT INTO job_categories (job_id, category_id) VALUES (?, ?)");
        $categoryStmt->bind_param("ii", $newJobId, $jobCategory);
        $categoryStmt->execute();
        $categoryStmt->close();

        echo "success"; // Return a response to indicate success
    } else {
        echo "error"; // Return a response to indicate an error
    }
}

$conn->close();
?>
