<?php
session_start(); // Start the session

if (isset($_POST['productIdentifier'])) {
    $productIdentifier = $_POST['productIdentifier'];

    // Find the product in the shopping cart and remove it
    if (($key = array_search($productIdentifier, $_SESSION['shoppingCart'])) !== false) {
        unset($_SESSION['shoppingCart'][$key]);
    }

    // Update the cart display or return a success response
    echo 'Product removed successfully.';
} else {
    echo 'Invalid request.';
}
?>