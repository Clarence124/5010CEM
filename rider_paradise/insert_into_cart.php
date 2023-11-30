<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "inti_studentweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

if (
    isset($data['product_id']) && isset($data['productImage']) &&
    isset($data['productName']) && isset($data['price']) &&
    isset($data['color']) && isset($data['size']) && isset($data['quantity'])
) {
    $product_id = $data['product_id'];
    $productImage = $data['productImage'];
    $productName = $data['productName'];
    $price = $data['price'];
    $color = $data['color'];
    $size = $data['size'];
    $quantity = $data['quantity'];

    $insertQuery = "INSERT INTO add_to_cart (product_id, productImage, productName, price, color, size, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssdssdd", $product_id, $productImage, $productName, $price, $color, $size, $quantity);

    if ($stmt->execute()) {
        echo "Product added to the cart successfully.";
    } else {
        echo "Error adding the product to the cart: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: Some of the required data is missing or null.";
}

$conn->close();
?>