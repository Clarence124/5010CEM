<?php
include('start_session.php'); // Ensure session is started

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Retrieve existing cart data
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    // Add the new product to the cart
    $cart[] = [
        'productId' => $productId,
        'productName' => $productName,
        'price' => $price,
        'quantity' => $quantity,
        // ... other product data
    ];

    // Store the updated cart data back in the session
    $_SESSION['cart'] = $cart;

    // Respond with a success message or updated cart data
    echo json_encode(['message' => 'Product added to cart', 'cart' => $cart]);
} else {
    echo json_encode(['message' => 'Invalid request']);
}
?>