<?php
$servername = "127.0.0.1";
$username = "root";
$dbname = "empowerdb";

$conn = new mysqli($servername, $username, "", $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}