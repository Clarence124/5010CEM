<?php
// Include your database connection code here
include 'db_riders.php';

// Get the filter criteria from the request
$filterCategory = $_POST['filterCategory'];
$filterMonth = $_POST['filterMonth'];
$filterYear = $_POST['filterYear'];

// Create a SQL query based on the filter criteria
// Modify this query according to your database schema
$sql = "SELECT product_category, months, year, SUM(total_sales) as total_sales
        FROM stock
        WHERE (product_category = '$filterCategory' OR '$filterCategory' = 'All')
        AND (month = '$filterMonth' OR '$filterMonth' = 'All')
        AND (year = '$filterYear' OR '$filterYear' = 'All')
        GROUP BY product_category";

// Execute the query and fetch the data
// Modify this part according to your database connection method
$result = mysqli_query($conn, $sql);
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return the data as JSON
echo json_encode($data);

// Close the database connection
// Modify this part according to your database connection method
mysqli_close($conn);
?>
