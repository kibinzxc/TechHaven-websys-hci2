<?php
session_start();

// Function to check if the user is logged in and is a super admin
function checkAuth() {
    // Check if user is not logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: index.php");
    exit();
}

    // Check if user role is admin or super admin

}