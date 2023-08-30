<?php
// Assuming you have a database connection established in config.php
require_once './config.php';

// Get the user input from the query string
$input = $_GET['input'];
// echo $input;

// You might need to sanitize and validate the input here before using it in a query

// Construct your SQL query to fetch jobs based on the input
$query = "SELECT * FROM jobs WHERE job_title LIKE '%$input%'"; // Example query, modify as needed

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// // Fetch the data and convert it to an array
$jobs = [];
while ($row = mysqli_fetch_assoc($result)) {
    $jobs[] = $row;
}

// // Return the job data as JSON response
// header('Content-Type: application/json');
echo json_encode($jobs,TRUE);
