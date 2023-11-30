<?php
// Include your database connection file
include 'db_testingriders.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the POST variables are set
    if (isset($_POST['product_name']) && isset($_POST['sales_amount']) && isset($_POST['stock_available']) && isset($_POST['product_category'])) {
        // Retrieve data from the form
        $product_name = $_POST['product_name'];
        $sales_amount = $_POST['sales_amount'];
        $stock_available = $_POST['stock_available'];
        $product_category = $_POST['product_category'];

        // Get the current date and time
        $last_updated_stock_date = date('Y-m-d H:i:s');

        // Insert data into the "stock" table
        $sql = "INSERT INTO stock (product_name, stock_available, sales_amount, product_category, last_updated_stock_date) VALUES ('$product_name', '$stock_available', '$sales_amount', '$product_category', '$last_updated_stock_date')";

        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully!";
            // Redirect to a new page or the same page to prevent resubmission
            header('Location: adminStatisticsPage.php');
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Some POST variables are not set.";
    }
}
?>
