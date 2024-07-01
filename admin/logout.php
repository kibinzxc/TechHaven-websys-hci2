<?php
// Function to check if the user is logged in
session_start();
session_destroy();
header('Location: login.php');
exit();
?>