
<html>
<head>
  <title>Profile</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
<?php
session_start();
include 'db_riders.php';

$id=$_SESSION['id'];
$query=mysqli_query($conn,"SELECT * FROM userlogin where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);


?>  

  <style type="text/css">

    /* Default styles */
body {
  margin: 0;
  padding: 0;
  background: url("bikelogin4.png");
  background-size: cover;
  font-family: 'Lato', sans-serif;
  font-weight: 600;

}
.sidebar {
  background-color: #333;
  color: #fff;
  height: 100vh;
  width: 60px; /* Adjust the width as needed */
  position: fixed;
  top: 0;
  left: 0;
  padding: 20px;
  box-sizing: border-box;
  transition: width 0.3s ease-in-out;
  display: flex;
  flex-direction: column;
  align-items: center;
  
}

.sidebar.open {
  width: 200px; /* Adjust the width as needed */
}

.sidebar.closed {
  width: 100px; /* Adjust the width as needed */
}

.sidebar ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
}

.sidebar li {
  margin-bottom: 10px;
  width: 100%;
}

.sidebar a {
  color: #fff;
  text-decoration: none;
  display: flex;
  align-items: center;
  height: 40px;
  transition: all 0.3s ease;
  width: 100%;
  padding: 10px;
  position: relative;
}

.sidebar a i {
  margin-right: 10px;
  font-size: 20px;
}

.sidebar a span.tooltip {
  position: absolute;
  top: 50%;
  left: calc(100% + 15px);
  transform: translateY(-50%);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 17px;
  font-weight: 100%;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0.3s;
  color: black;
}
.sidebar.closed a .item{
  justify-content: center;
   
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
}

.sidebar.closed a i {
  margin-right: 0;
}

.sidebar.closed a span.tooltip {
  opacity: 1;
  pointer-events: auto;
}

.sidebar.closed h3 {
  justify-content: center;
   
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
}

.sidebar.closed h3 i {
 margin-right: 0;
 display: flex;
}

.sidebar.closed a span.tooltip {
  opacity: 0;
  pointer-events: none;
}

.sidebar a:hover span.tooltip {
  opacity: 1;
  pointer-events: auto;
}

.sidebar a i {
  margin-right: 0;
  font-size: 24px;
}





.sidebar .menu-icon {
  
  font-size: 20px;
}


.content {
  margin-left: 200px;
  padding: 20px;
}

/* Media query for smaller screens */
@media only screen and (max-width: 600px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
    padding: 10px;
    margin-bottom: 20px;
  }

  .sidebar li {
    margin-bottom: 5px;
  }

  .content {
    margin-left: 0;
  }
}

/*box */

.topnav {
      overflow: hidden;
      background-color: #e9e9e9;
      margin-right: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .topnav h2 {
      margin: 0;
      margin-right: 460px;
      font-size: 20px;
    }

    .accessories-image img {
      max-height: 40px;
      margin-left: 10px;
    }

.profdetails{

  background-color: #ffe6cc;
  margin-top: 50px;
  box-shadow: 0 5px 10px rgba(1.15,0,0,1.15);
  width: 1000px;
}
.profdetails h3{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.profdetails .form-group input{
  display: flex;
  height: 45px;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.profdetails .form-group input:focus,
.profdetails .form-group input:valid{
  border-color: #9b59b6;
}
form .form-group{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
 form .form-group .submit{
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.7s ease;
   background: linear-gradient(135deg, red, pink);
 }
  form .form-group .submit:hover{
  transform: scale(1.15); 
  background: linear-gradient(-135deg, red, pink);
  }
</style>



</head>

<body>

  <div class="sidebar open">
    
    <ul>
      <h3>
      Menu    
      <i class='bx bx-menu menu-icon' id="btn"></i>
    </h3>
      <li><a href="homepage.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Homepage</span><div class="item">Homepage</div></a></li>
      <li><a href="userProfile.php"><i class="bx bx-user"></i><span class="tooltip">Profile</span><div class="item">Profile</div></a></li>
      <li><a href="#"><i class="bx bx-cog"></i><span class="tooltip">Spare Parts</span><div class="item">Spare Parts</div></a></li>
      <li><a href="#"><i class="bx bx-gift"></i><span class="tooltip">Accessories</span><div class="item">Accessories</div></a></li>
      <li><a href="#"><i class="fas fa-money-check-alt"></i><span class="tooltip">Payment</span><div class="item"> Payment</div></a></li>
      <li><a href="logout.php"><i class="bx bx-log-out"></i><span class="tooltip">Logout</span><div class="item">Logout</div></a></li> 
    </ul>
  </div>

  <div class="content">

      <div class="profdetails">
        
    <div class="topnav">
      <div class="accessories-image">
        <img src="R paradise logo.jpg" ,alt="Rider paradise logo">
      </div>
      
      <h2>Profile</h2>
      
    </div>
      <br>
        
        <form method="post" action="#">
            <table>
          <tr class="form-group">
            <th>Fullname</th>
            <th>Username</th>
            <th>Email</th>
            
          </tr>
          <tr class="form-group">

            <td> <input type="text" class="form-control" name="fullname" style="width:300px;" placeholder="Enter your Fullname" value="<?php echo $row['fullname']; ?>" required/></td>
            <td><input type="text" class="form-control" name="uname" style="width:300px;" placeholder="Enter your Username" value="<?php echo $row['uname']; ?>" required /></td>
            <td><input type="text" class="form-control" name="email" style="width:300px;" placeholder="Enter your Email" value="<?php echo $row['email']; ?>" required /></td>
            
          
          </tr>
          <tr class="form-group">

            <th>Contact Number</th>
            <th>Update Password</th>
            <th>Confirm Password</th>

          </tr>

          <tr class="form-group">

            <td><input type="text" class="form-control" name="pnumber" style="width:300px;" placeholder="Enter your Phone Number" value="<?php echo $row['pnumber']; ?>" required /></td>
            <td><input type="password" class="form-control" name="pass" style="width:300px;" placeholder="Enter New Password" value="<?php echo $row['pass']; ?>" required /></td>
            <td><input type="password" class="form-control" name="cpass" style="width:300px;" placeholder="Confirm Password" value="<?php echo $row['cpass']; ?>" required /></td>

          </tr>

          <tr class="form-group">

           <th>Address 1</th>

          </tr>
           
          <tr class="form-group">

              <td><input type="text" class="form-control" name="address" style="width:300px;" required placeholder="Enter your Address" value="<?php echo $row['address']; ?>"/></td>
          </tr>


        </table>
      <br>
          <div class="form-group">
            
            <input type="submit" name="submit" class="submit" style="width:20em; margin:0;"/></br></br>
          </div>
        </form>
      </div>
    
      <?php
      if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pnumber = $_POST['pnumber'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $address = $_POST['address'];
        
        
      $query = "UPDATE userlogin SET fullname = '$fullname', uname = '$uname', email = '$email', 
      pnumber = '$pnumber', pass = '$pass', cpass = '$cpass', address = '$address' WHERE id = '$id'";

      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    ?>
                     <script type="text/javascript">
            alert("Update Successful.");
            window.location = "userProfile.php";
        </script>
        <?php
             }
                           
  ?> 


    </div>

  </div>
<script>
    $(document).ready(function() {
      // Toggle sidebar open and closed
      $('#btn').click(function() {
        $('.sidebar').toggleClass('open closed');
      });
    });
  </script>

</body>

</html>
