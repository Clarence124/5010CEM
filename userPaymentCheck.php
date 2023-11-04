<?php
session_start();
include 'db_riders.php';

$id = $_SESSION['id'];

if (isset($_POST['submitPaymentDetails'])) {
    // Validate and sanitize user input
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $cardname = mysqli_real_escape_string($conn, $_POST['cardname']);
    $cardnum = mysqli_real_escape_string($conn, $_POST['cardnum']);
    $expmonth = mysqli_real_escape_string($conn, $_POST['expmonth']);
    $expyear = mysqli_real_escape_string($conn, $_POST['expyear']);
    $cvvcode = mysqli_real_escape_string($conn, $_POST['cvvcode']);

    // Check if the user already has payment details in the userpaymentdetails table
    $checkPaymentQuery = "SELECT * FROM userpaymentdetails WHERE id = ?";
    $stmt = mysqli_prepare($conn, $checkPaymentQuery);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
    // User already has payment details, no need to update
    ?>
    <script type="text/javascript">
        alert("You already have payment details on file.");
        window.location = "userSettingsPage.php";
    </script>
    <?php
} else {
        // If the user doesn't have payment details, insert a new record into userpaymentdetails using prepared statement
        $insertPaymentQuery = "INSERT INTO userpaymentdetails (id, fullname, address, email, city, state, zip, cardname, cardnum, expmonth, expyear, cvvcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertPaymentQuery);
        mysqli_stmt_bind_param($stmt, "ssssssssssss", $id, $fullname, $address, $email, $city, $state, $zip, $cardname, $cardnum, $expmonth, $expyear, $cvvcode);

        if (mysqli_stmt_execute($stmt)) {
            ?>
            <script type="text/javascript">
                alert("Payment Details Saved Successfully.");
                window.location = "userSettingsPage.php";
            </script>
            <?php
        } else {
            // Handle the case where the insert operation fails
            ?>
            <script type="text/javascript">
                alert("Payment Details Save Failed. Please try again.");
            </script>
            <?php
        }
    }
}


if (isset($_POST['updatePaymentDetails'])) {
    // Validate and sanitize user input
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $cardname = mysqli_real_escape_string($conn, $_POST['cardname']);
    $cardnum = mysqli_real_escape_string($conn, $_POST['cardnum']);
    $expmonth = mysqli_real_escape_string($conn, $_POST['expmonth']);
    $expyear = mysqli_real_escape_string($conn, $_POST['expyear']);
    $cvvcode = mysqli_real_escape_string($conn, $_POST['cvvcode']);

    // Check if the user already has payment details in the userpaymentdetails table
    $checkPaymentQuery = "SELECT * FROM userpaymentdetails WHERE id = ?";
    $stmt = mysqli_prepare($conn, $checkPaymentQuery);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // User already has payment details, update the existing record
        $updatePaymentQuery = "UPDATE userpaymentdetails SET fullname=?, address=?, email=?, city=?, state=?, zip=?, cardname=?, cardnum=?, expmonth=?, expyear=?, cvvcode=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $updatePaymentQuery);
        mysqli_stmt_bind_param($stmt, "ssssssssssss", $fullname, $address, $email, $city, $state, $zip, $cardname, $cardnum, $expmonth, $expyear, $cvvcode, $id);

        if (mysqli_stmt_execute($stmt)) {
            ?>
            <script type="text/javascript">
                alert("Payment Details Updated Successfully.");
                window.location = "userSettingsPage.php";
            </script>
            <?php
        } else {
            // Handle the case where the update operation fails
            ?>
            <script type="text/javascript">
                alert("Payment Details Update Failed. Please try again.");
            </script>
            <?php
        }
    } else {
        // Handle the case where no existing payment details are found
        ?>
        <script type="text/javascript">
            alert("No existing payment details found. Please insert payment details.");
            window.location = "userSettingsPage.php";
        </script>
        <?php
    }
}




?>

