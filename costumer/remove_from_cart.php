<?php
session_start();
include 'dbcon.php';
$customerID = $_SESSION['id'];
$prodID = $_POST['prodID'];

$query = "DELETE FROM cart WHERE customerID = ? AND prodID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $customerID, $prodID);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo 'success';
} else {
    echo 'error';
}
?>
