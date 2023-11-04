<?php
// Include your database connection file
include 'db_riders.php';

if (isset($_POST['delete'])) {
    // Check if the 'id' parameter has been submitted
    if (isset($_POST['product_id'])) {
        $id = $_POST['product_id'];

        // Use a prepared statement to prevent SQL injection
        $sql = "DELETE FROM `stock` WHERE `product_id` = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $id); // Assuming 'id' is an integer
            if (mysqli_stmt_execute($stmt)) {
                // Record deleted successfully
                header("Location: adminSalesPage.php"); // Redirect back to your page
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Close your database connection
mysqli_close($conn);
?>
