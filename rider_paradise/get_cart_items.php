<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "inti_studentweb";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM add_to_cart";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $cartItems = [];

    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }

    $response = ['success' => true, 'items' => $cartItems];
} else {
    $response = ['success' => true, 'error' => 'No items found in the cart.'];
}
header('Content-Type: application/json');
echo json_encode($response);

?>