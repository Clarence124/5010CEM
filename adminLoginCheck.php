<?php
session_start();
include "db_riders.php";

if (isset($_POST['uname']) && isset($_POST['pass'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);

    if (empty($uname) || empty($pass)) {
        echo '<script>alert("Username and password are required.")</script>';
        echo "<script>location.href='adminLoginPage.php'</script>";
        exit();
    } else {
        $sql = "SELECT * FROM adminlogin WHERE uname = ? AND pass = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $uname, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['uname'] = $row['uname'];
            $_SESSION['id'] = $row['id'];
            
            echo '<script>alert("Login Success")</script>';
            echo "<script>location.href='adminHomepage.php'</script>";
            exit();
        } else {
            echo '<script>alert("Incorrect Username or Password")</script>';
            echo "<script>location.href='adminLoginPage.php'</script>";
            exit();
        }
    }
} else {
    echo '<script>alert("Unidentified Error. Please Check Details Again.")</script>';
    echo "<script>location.href='adminLoginPage.php'</script>";
    exit();
}
?>
