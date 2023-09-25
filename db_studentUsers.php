<?php 

$sname= "localhost";
$uname= "root";
$userpass= "";

$db_name = "inti_studentweb";

$conn = mysqli_connect($sname, $uname, $userpass, $db_name);

if(!$conn){
	echo "Connection failed!";
}



?>