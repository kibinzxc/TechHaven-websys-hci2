<?php
session_start();
include 'dbcon.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email']; // Assuming email is read-only and not updated
    $contactNum = $_POST['contactNum'];
    $address = $_POST['address'];

    // Update customer information in the database
    $sql = "UPDATE customerinfo SET name=?, contactNum=?, address=? WHERE email=?";
    $stmt = $conn->prepare($sql);

    // Check if the prepare statement was successful
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ssss", $name, $contactNum, $address, $email);
    $stmt->execute();

    // Check if update was successful
    if ($stmt->affected_rows > 0) {
        $_SESSION['update_message'] = "Customer information updated successfully!";
    } else {
        $_SESSION['update_message'] = "Failed to update customer information: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back immediately after setting the session message
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
} else {
    // Redirect to a specific page or handle other cases if needed
    header("Location: error_page.php");
    exit();
}
?>
