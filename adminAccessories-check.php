<?php
include 'db_studentUsers.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Define the target directory where images will be stored
    $target_dir = 'adminUploads/';

    // Get the title from the form
    $title = $_POST['title'];

    // Check if an image file is selected
    if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
        // Define the image path including the filename
        $image_path = $target_dir . basename($_FILES['image']['name']);

        // Check if the image file already exists
        if (file_exists($image_path)) {
            echo '<script>alert("Image already exists. Please choose another image or rename it.")</script>';
        } else if ($_FILES['image']['size'] > 5000000) { // Check image file size (5 MB limit)
            echo '<script>alert("Image file size is too large. Please choose an image less than 5MB.")</script>';
        } else {
            // Move the uploaded image to the target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                // Insert image info into the database (title, image path, and date added)
                $stmt = $conn->prepare('INSERT INTO events (title, filepath, uploaded_date) VALUES (?, ?, CURRENT_TIMESTAMP)');
                $stmt->bind_param("ss", $title, $image_path);
                if ($stmt->execute()) {
                    echo '<script>alert("Accessories Uploaded Successfully!")</script>';
                } else {
                    echo '<script>alert("Error inserting data into the database.")</script>';
                }
            } else {
                echo '<script>alert("Error moving the uploaded image.")</script>';
            }
        }
    } else {
        echo '<script>alert("Please upload a valid image!")</script>';
    }
}

// Redirect back to the accessories page
echo '<script>location.href="adminAccessories.php"</script>';
exit();
?>