
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
   display: none;
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
  overflow: hidden;
  text-align: center;
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

   .tab {
      display: none;
    }

      /* Additional styles for your tab buttons */
  .tab-button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    margin-right: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .tab-button:hover {
    background-color: #1b6ca8;
  }

/* CSS for Payment Details Form */
.payment-details-container {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  text-align: center;
}

.payment-details-container h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #3498db;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #1b6ca8;
}

.order-history-container {
  background: linear-gradient(120deg, #f6d365, #fda085);
  border-radius: 15px;
  padding: 20px;
  margin: 20px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
}

.order-history-table {
  width: 100%;
  border-collapse: collapse;
}

.order-history-table th {
  background: #3498db;
  color: #fff;
}

.order-history-table th, .order-history-table td {
  padding: 10px;
  text-align: center;
  border: 1px solid #ddd;
}

.order-history-table tbody tr:nth-child(odd) {
  background-color: #f2f2f2;
}

.order-history-table tbody tr:nth-child(even) {
  background-color: #e2e2e2;
}


/* Add this CSS to style the two-column layout */
.form-columns {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px; /* Adjust the spacing between columns */
}

.form-column {
  flex: 1;
  margin-right: 10px; /* Adjust the spacing between columns */
}

/* Rest of your existing CSS styles... */


  
</style>



</head>

<body>

  <div class="sidebar open">
        <ul>
            <center>
          <li><h3>Menu</h3><i class='bx bx-menu menu-icon' id="btn"></i></li>
          <li><a href="homepage.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Homepage</span><div class="item">Homepage</div></a></li>
          <li><a href="userSettingsPage.php"><i class="bx bx-cog"></i><span class="tooltip">Settings</span><div class="item">Settings</div></a></li>
          <li><a href="#"><i class="bx bx-cog"></i><span class="tooltip">Spare Parts</span><div class="item">Spare Parts</div></a></li>
          <li><a href="#"><i class="bx bx-gift"></i><span class="tooltip">Accessories</span><div class="item">Accessories</div></a></li>
          <li><a href="logout.php"><i class="bx bx-log-out"></i><span class="tooltip">Logout</span><div class="item">Logout</div></a></li> 
            </center>
        </ul>
      </div>

  <div class="content">

      <div class="profdetails">
        
    <div class="topnav">
      <div class="accessories-image">
        <img src="R paradise logo.jpg" ,alt="Rider paradise logo">
      </div>
      

      <button class="tab-button" onclick="openTab('ProfileTab')"><i class="fa-regular fa-address-card fa-beat"></i> Profile</button>
      <button class="tab-button" onclick="openTab('OrderHistoryTab')"><i class="fa-solid fa-cart-shopping fa-beat"></i> Order History</button>
      <button class="tab-button" onclick="openTab('PaymentDetailsTab')"> <i class="fas fa-money-check fa-beat"></i> Payment Details</button>
    
    </div>
      <br>
        
      <div id="ProfileTab" class="tab">
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
            
            <input type="submit" name="submit" class="submit" style="width:20em; margin:0;">
          </div>   

          </br></br>

        </form>
      </div>

      <div id="OrderHistoryTab" class="tab">
  <!-- Order History content -->
  <div class="order-history-container">
    <h2>Order History</h2>
    <table class="order-history-table">
      <thead>
        <tr>
          <th>Timestamp</th>
          <th>Product Name</th>
          <th>Product Quantity</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>2023-01-15 10:30:45</td>
          <td>Product A</td>
          <td>2</td>
        </tr>
        <tr>
          <td>2023-02-20 14:15:30</td>
          <td>Product B</td>
          <td>3</td>
        </tr>
        <tr>
          <td>2023-03-05 16:45:22</td>
          <td>Product C</td>
          <td>1</td>
        </tr>
        <!-- Add more rows with actual order history data -->
      </tbody>
    </table>
  </div>
</div>




<!-- ... (Previous HTML content) ... -->
<div id="PaymentDetailsTab" class="tab">
  <div class="payment-details-container">
    <h2>Payment Details</h2>
    <form id="payment-form" action="userPaymentCheck.php" method="post">
      <?php
        include 'db_riders.php';
        $id = $_SESSION['id'];
        
        $query = mysqli_query($conn, "SELECT * FROM userpaymentdetails where id='$id'");
        $paymentRow = mysqli_fetch_array($query);

        // Check if payment details were found
        if ($paymentRow) {
      ?>
      <div class="form-columns">
        <div class="form-column">
          <div class="Paymentdetails">
            <div class="form-group">
              <label for="card-number">Card Number (16 digits):</label>
              <input type="text" id="cardnum" class="cardnum" name="cardnum" placeholder="Enter your card number" pattern="\d{16}" title="Card number must be 16 digits" value="<?php echo $paymentRow['cardnum']; ?>">
            </div>
            <div class="form-group">
              <label for="card-holder">Cardholder Name:</label>
              <input type="text" id="cardname" class="cardname" name="cardname" placeholder="Enter cardholder name" value="<?php echo $paymentRow['cardname']; ?>">
            </div>
            <div class="form-group">
              <label for="expiration">Expiration Date (MM/YY):</label>
              <select id="expmonth" class="expmonth" name="expmonth">
                <option value="<?php echo $paymentRow['expmonth']; ?>" selected><?php echo $paymentRow['expmonth']; ?></option>
                <!-- Other options here -->
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option> 
                  <option value="12">12</option>
              </select>
              <select id="expyear" class="expyear" name="expyear">
                <option value="<?php echo $paymentRow['expyear']; ?>" selected><?php echo $paymentRow['expyear']; ?></option>
                <!-- Other options here -->
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                  <option value="32">32</option>
                  <option value="33">33</option>
              </select>
            </div>
            <div class="form-group">
              <label for="cvv">CVV (3 digits):</label>
              <input type="text" id="cvvcode" class="cvvcode" name="cvvcode" placeholder="Enter CVV" pattern="\d{3}" title="CVV must be 3 digits" value="<?php echo $paymentRow['cvvcode']; ?>">
            </div>
          </div>
        </div>
        <div class="form-column">
          <div class="BillingAddress">
            <div class="form-group">
              <label for="fullname">Full Name:</label>
              <input type="text" id="fullname" class="fullname" name="fullname" placeholder="Enter your full name" value="<?php echo $paymentRow['fullname']; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" id="email" class="email" name="email" placeholder="Enter your email" value="<?php echo $paymentRow['email']; ?>">
            </div>
            <div class= "form-group">
              <label for="address">Address:</label>
              <input type="text" id="address" class="address" name="address" placeholder="Enter your address" value="<?php echo $paymentRow['address']; ?>">
            </div>
            <div class="form-group">
              <label for="city">City:</label>
              <input type="text" id="city" class="city" name="city" placeholder="Enter your city" value="<?php echo $paymentRow['city']; ?>">
            </div>
            <div class="form-group">
              <label for="state">State:</label>
              <input type="text" id="state" class="state" name="state" placeholder="Enter your state" value="<?php echo $paymentRow['state']; ?>">
            </div>
            <div class="form-group">
              <label for="zip">Zip Code:</label>
              <input type="text" id="zip" class="zip" name="zip" placeholder="Enter your zip code" value="<?php echo $paymentRow['zip']; ?>">
            </div>
          </div>
        </div>
      </div>
      <button type="submit" name="updatePaymentDetails" class="updatePaymentDetails">Update Payment Details</button>
      </form>
      <?php
        } else {
          // No payment details found
          echo "No payment details found. Please insert payment details.";
      ?>
      <button type="button" onclick="window.location.href = 'newPaymentDetails.php';">Insert Payment Details</button>
      <?php
        }
      ?>
    </div>
</div>

<!-- ... (Remaining HTML content) ... -->



      </div>



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
            window.location = "userSettingsPage.php";
        </script>
        <?php
             }
                           
  ?> 

<script>
    $(document).ready(function() {
      // Toggle sidebar open and closed
      $('#btn').click(function() {
        $('.sidebar').toggleClass('open closed');
      });
    });
  </script>

  <script>
      // Function to open the specified tab and hide others
      function openTab(tabName) {
        var tabs = document.getElementsByClassName("tab");
        for (var i = 0; i < tabs.length; i++) {
          tabs[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
      }

      // Set the default tab to open when the page loads
      openTab("ProfileTab");
    </script>



</body>

</html>
