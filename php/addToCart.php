<?php
// AddToCart.php
require_once 'Connection.php';

// Get the product ID from the request
$productId = $_POST['productId'];

// Check if the product exists in the database
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();

    // Add the product to the cart 
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $_SESSION['cart'][] = $product;

    echo "Product added to cart successfully.";
} else {
    echo "Product not found.";
}

$stmt->close();
$conn->close();
?>