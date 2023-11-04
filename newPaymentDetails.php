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
</style>

<div id="PaymentDetailsTab" class="tab">
  <div class="payment-details-container">
    <h2>Payment Details</h2>
    <form id="payment-form" action="userPaymentCheck.php" method="post">
      <div class="form-columns">
        <div class="form-column">
          <div class="Paymentdetails">
            <div class="form-group">
              <label for="card-number">Card Number (16 digits):</label>
              <input type="text" id="cardnum" class="cardnum" name="cardnum" placeholder="Enter your card number" pattern="\d{16}" title="Card number must be 16 digits">
            </div>
            <div class="form-group">
              <label for="card-holder">Cardholder Name:</label>
              <input type="text" id="cardname" class="cardname" name="cardname" placeholder="Enter cardholder name">
            </div> 
            <div class="form-group">
              <label for="expiration">Expiration Date (MM/YY):</label>
              <select id="expmonth" class="expmonth" name="expmonth">
                <option value="" disabled selected>Select Month</option>
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
                <option value="" disabled selected>Select Year</option>
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
              <input type="text" id="cvvcode" class="cvvcode" name="cvvcode" placeholder="Enter CVV" pattern="\d{3}" title="CVV must be 3 digits">
            </div>
          </div>
        </div>
        <div class="form-column">
          <div class="BillingAddress">
            <div class="form-group">
              <label for="fullname">Full Name:</label>
              <input type="text" id="fullname" class="fullname" name="fullname" placeholder="Enter your full name">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" id="email" class="email" name="email" placeholder="Enter your email">
            </div>
            <div class= "form-group">
              <label for="address">Address:</label>
              <input type="text" id="address" class="address" name="address" placeholder="Enter your address">
            </div>
            <div class="form-group">
              <label for="city">City:</label>
              <input type="text" id="city" class="city" name="city" placeholder="Enter your city">
            </div>
            <div class="form-group">
              <label for="state">State:</label>
              <input type="text" id="state" class="state" name="state" placeholder="Enter your state">
            </div>
            <div class="form-group">
              <label for="zip">Zip Code:</label>
              <input type="text" id="zip" class="zip" name="zip" placeholder="Enter your zip code">
            </div>
          </div>
        </div>
      </div>
      <button type="submit" name="submitPaymentDetails" class="submitPaymentDetails">Save Payment Details</button>
      <button type="button" name="backtoUserSetting" class="backtoUserSetting" onclick="window.location.href = 'userSettingsPage.php';">Back</button>
    </form>
  </div>
</div>