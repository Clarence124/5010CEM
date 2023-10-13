
<?php

session_start(); // Start the session



// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any desired page

//need to add alert function popup message

header("Location: loginpage.php");

exit();


?>



