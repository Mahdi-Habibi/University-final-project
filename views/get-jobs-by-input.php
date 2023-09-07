<?php
// Assuming you have a database connection established in config.php
require_once './config.php';

// Get the user input from the query string
$input = $_GET['input'];
// echo $input;

// You might need to sanitize and validate the input here before using it in a query

// Construct your SQL query to fetch jobs based on the input
$query ="SELECT 
jobs.job_id, 
jobs.job_title, 
jobs.job_description,
jobs.job_address,
jobs.job_contact_info,
users.username,
categories.category_id,
categories.category_name
FROM 
jobs 
LEFT OUTER JOIN 
job_categories 
ON jobs.job_id = job_categories.job_id 
LEFT OUTER JOIN 
categories 
ON job_categories.category_id = categories.category_id 
LEFT OUTER JOIN 
users 
ON jobs.poster_id = users.user_id
WHERE 
categories.category_name LIKE '%$input%'
";
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
