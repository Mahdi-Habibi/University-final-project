<?php
require_once './config.php'; // Including the configuration file to establish database connection

if (isset($_GET['category'])) {
    $category = mysqli_real_escape_string($conn, $_GET['category']);

    // SQL query to select jobs based on the selected category
    $query = "SELECT * FROM jobs WHERE category_name = '$category'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch and store job data in an array
    $jobs = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $jobs[] = $row;
    }

    // Return job data as JSON
    echo json_encode($jobs);
}
?>
