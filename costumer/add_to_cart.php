<?php
session_start();
include 'dbcon.php';

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);
$customerID = $data['customerID'];
$prodID = $data['prodID'];
$prodName = $data['prodName'];
$prodPrice = $data['prodPrice'];
$quantity = $data['quantity'];
$added_at = date('Y-m-d H:i:s'); // Assuming you want to record the current time

// Insert into cart table
$sql = "INSERT INTO cart (customerID, prodID, prod_name, prod_price, quantity, added_at)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iisdis", $customerID, $prodID, $prodName, $prodPrice, $quantity, $added_at);

$response = array();

if (mysqli_stmt_execute($stmt)) {
    $response['success'] = true;
} else {
    $response['success'] = false;
    $response['error'] = mysqli_error($conn); // Optional: Include error message for debugging
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
