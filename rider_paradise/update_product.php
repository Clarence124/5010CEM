<?php
include 'db_studentUsers.php';
session_start();

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the product ID and other updated data
    $productId = $_POST['productId'];
    $newProductName = $_POST['newProductName'];
    $newProductPrice = $_POST['newProductPrice'];
    $newProductSpecification = $_POST['$newProductSpecification']; 
    $newProductDescription = $_POST['newProductDescription'];



    // Update the product data in the database
    $sql = "UPDATE products SET product_name = ?, product_price = ?, product_speci = ?, product_desc = ? WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $newProductName, $newProductPrice, $newProductSpecification, $newProductDescription,$productId);

    if ($stmt->execute()) {
        // Update successful
        $response = [
            'success' => true,
            'newProductName' => $newProductName,
            'newProductPrice' => $newProductPrice,
            'newProductSpecification'=> $newProductSpecification,
            'newProductDescription' => $newProductDescription
        ];
    } else {
        // Update failed
        $response = [
            'success' => false,
            'error' => 'Update failed. Please try again.',
        ];
    }

    // Send JSON response back to the frontend
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Handle other request methods or invalid requests
    http_response_code(405); // Method Not Allowed
    echo 'Invalid request method.';
}
?>