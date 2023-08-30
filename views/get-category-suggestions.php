<?php
require_once './config.php';

if (isset($_GET['input'])) {
    $input = mysqli_real_escape_string($conn, $_GET['input']);

    $query = "SELECT category_name FROM categories WHERE category_name LIKE '%$input%' LIMIT 10";
    $result = mysqli_query($conn, $query);

    $suggestions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['category_name'];
    }

    echo json_encode($suggestions);
}
?>
