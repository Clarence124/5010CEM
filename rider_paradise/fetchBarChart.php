<?php
include 'db_riders.php'; // Include your database connection file

// Retrieve filter values
$filterCategory = isset($_POST['filterCategory']) ? $_POST['filterCategory'] : '';
$filterMonth = isset($_POST['filterMonth']) ? $_POST['filterMonth'] : '';
$filterYear = isset($_POST['filterYear']) ? $_POST['filterYear'] : '';

// Build the SQL query based on filters
$sql = "SELECT `product_category`, SUM(`sales_amount`) as total_sales
        FROM `stock`
        WHERE 1";

if (!empty($filterCategory)) {
    $sql .= " AND `product_category` = '$filterCategory'";
}

if (!empty($filterMonth)) {
    $sql .= " AND `months` = '$filterMonth'";
}

if (!empty($filterYear)) {
    $sql .= " AND `year` = '$filterYear'";
}

$sql .= " GROUP BY `product_category`";

$result = mysqli_query($conn, $sql);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'product_category' => $row['product_category'],
        'total_sales' => $row['total_sales']
    );
}

echo json_encode($data);

mysqli_close($conn);
?>
