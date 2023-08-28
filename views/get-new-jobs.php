<?php
require_once './config.php';

$query = "SELECT jobs.job_id, jobs.job_title, jobs.job_description,jobs.job_address,jobs.job_contact_info,users.username,categories.category_id,categories.category_name FROM jobs left outer join job_categories on jobs.job_id=job_categories.job_id left outer join categories on job_categories.category_id = categories.category_id left outer join users on jobs.poster_id=users.user_id;";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$jobs = array();
while ($row = mysqli_fetch_assoc($result)) {
    $jobs[] = $row;
}

header('Content-Type: application/json');
echo json_encode($jobs);
?>