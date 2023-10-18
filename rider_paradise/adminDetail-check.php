<?php
include 'db_studentUsers.php';

// Check if user has uploaded a new image
if (isset($_FILES['image'], $_POST['title'], )) {
    // The folder where the images will be stored
    $target_dir = 'pictures/';
    // The path of the newly uploaded image
    $title = $_POST['title'];
    $image_path = $target_dir . basename($_FILES['image']['name']);

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
    } else {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Image uploaded successfully

            // Retrieve other product details
            $productName = $_POST['name'];
            $productPrice = $_POST['price'];
            $productRating = $_POST['rating'];

            // You can now use $targetFile, $productName, $productPrice, and $productRating
            // to update the product details as needed in your database or perform other actions.
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>