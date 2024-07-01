<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
?>