<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inti_studentweb";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

$productId = $data['product_id'];
$productImage = $data['productImage'];
$productName = $data['productName'];
$price = $data['price'];
$color = $data['color'];
$size = $data['size'];
$quantity = $data['quantity'];


$insertQuery = "INSERT INTO add_to_cart (product_id, productImage, productName, price, color, size, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssdss", $productId, $productImage, $productName, $price, $color, $size, $quantity);

if ($stmt->execute()) {
    echo "Product added to the cart successfully.";
} else {
    echo "Error adding the product to the cart: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>