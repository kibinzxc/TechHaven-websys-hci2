<?php
session_start();

// Function to check if the user is logged in
function checkAuth() {
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit();
    }
}
?>