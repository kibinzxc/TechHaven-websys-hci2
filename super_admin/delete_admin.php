<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "th_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have a form that submits an ID to delete
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerID = $_POST['deleteId']; // Assuming the form sends the ID via POST

    // Escape the customerID to prevent SQL injection (although not fully secure)
    $customerID = mysqli_real_escape_string($conn, $customerID);

    // SQL to delete a record
    $sql = "DELETE FROM admin WHERE adminID = $customerID";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect back to the previous page
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Close connection
$conn->close();
?>
