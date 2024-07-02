<?php
// Function to check if the user is logged in
session_start();
session_destroy();
header('Location: ../admin/login.php');
exit();
?>