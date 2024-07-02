<?php
session_start();
include 'dbcon.php'; // Ensure this includes your database connection

// Check if the session variable is set (ensure the user is logged in)
if (!isset($_SESSION['customerID'])) {
    die("User is not logged in."); // You may want to redirect to a login page instead
}

$customerID = $_SESSION['customerID'];

// Handle adding to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $prodID = $_POST['prodID'];
    $prodName = $_POST['prodName'];
    $prodPrice = $_POST['prodPrice'];
    $prodImg = $_POST['prodImg'];
    $quantity = 1; // You can change this based on your UI logic
    $added_at = date('Y-m-d H:i:s'); // Current timestamp

    // Insert into cart table
    $insertQuery = "INSERT INTO cart (customerID, prodID, prod_name, prod_price, img, quantity, added_at) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);

    // Check for prepare error
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("iisdsds", $customerID, $prodID, $prodName, $prodPrice, $prodImg, $quantity, $added_at);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product added to cart successfully.";
        header("Location: products.php");
    } else {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid request."; // This message will be displayed if the form wasn't submitted properly
}

// Close connection (optional if dbcon.php handles this already)
$conn->close();
?>
