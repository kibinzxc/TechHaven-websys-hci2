<?php
session_start();
include 'dbcon.php'; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $house_number_street = $_POST['house_number_street'];
    $city_province = $_POST['city_province'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $password = $_POST['password'];

    // Hash the password using MD5 (for demonstration purposes; consider using stronger hashing methods like bcrypt)
    $hashed_password = md5($password);

    // Combine first name and last name into one name
    $name = $first_name . ' ' . $last_name;

    // Combine house number/street and city/province into one address
    $address = $house_number_street . ', ' . $city_province;

    // Insert into database
    $sql = "INSERT INTO customerinfo (name, address, email, contactNum, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bind_param("sssss", $name, $address, $email, $contact_number, $hashed_password);
    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
        // Redirect to login page or any other page
        header('Location: login.php');
        exit();
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
