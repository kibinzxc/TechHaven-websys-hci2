<?php
session_start();
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerID = $_SESSION['id'];
    $prodID = $_POST['prodID'];
    $prod_name = $_POST['prod_name'];
    $prod_price = $_POST['prod_price'];
    $quantity = $_POST['quantity'];
    $added_at = date('Y-m-d H:i:s');

    // Insert the product into the cart table
    $query = "INSERT INTO cart (customerID, prodID, prod_name, prod_price, quantity, added_at) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iisdis', $customerID, $prodID, $prod_name, $prod_price, $quantity, $added_at);

    if ($stmt->execute()) {
        // Redirect to the cart page or display a success message
        header('Location: cart.php');
        exit();
    } else {
        // Handle errors if the insertion fails
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
