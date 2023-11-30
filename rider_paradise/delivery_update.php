<?php
session_start();
include('db.php');
if(isset($_POST['Delivery']) && !empty($_POST['method_checked']) ){
    $email = $_SESSION['email']; 
    // Submitted form data
    $method_checked = mysqli_real_escape_string($con, $_POST['method_checked']);
    
    
    $sql = "UPDATE users SET delivery = '$method_checked' WHERE email = '$email'";
    $result = $con->query($sql);
                if(!$result){                      
                     $status = 'err';
                }
                   else{
                   $status = 'ok';     
                   }  
          // Output status
          echo $status;die;
          }
?>