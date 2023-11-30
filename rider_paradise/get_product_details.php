<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inti_studentweb.db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productId = $_GET['productId'];

// Perform a database query to retrieve product details for the given $productId from the `add_to_cart` table
$sql = "SELECT * FROM add_to_cart WHERE product_id = '$productId'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // You might want to do additional processing if needed

    // Return the product details as JSON
    echo json_encode($row);
} else {
    echo json_encode(null); // Return null if the product was not found
}
?>