<?php
session_start();
include 'dbcon.php';

if (isset($_POST['prodID']) && isset($_SESSION['id'])) {
    $prodID = $_POST['prodID'];
    $customerID = $_SESSION['id'];
    $quantity = 1; // Default quantity

    // Check if the product is already in the cart
    $check_query = "SELECT * FROM cart WHERE customerID = ? AND prodID = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $customerID, $prodID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If product is already in the cart, update the quantity
        $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE customerID = ? AND prodID = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ii", $customerID, $prodID);
    } else {
        // If product is not in the cart, insert it
        $insert_query = "INSERT INTO cart (customerID, prodID, quantity, added_at) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("iii", $customerID, $prodID, $quantity);
    }

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>
