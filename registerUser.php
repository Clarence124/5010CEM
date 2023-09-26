
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Quicksand&display=swap" rel="stylesheet">
     <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

     <style type="text/css">

      body{
    background: url("bikelogin4.png");
    background-size: cover;
    font-family: 'Kalam', cursive;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container{
  margin-top: 50px;
  max-width: 1500px;
  width: 70%;
  background-color: #ffe6cc;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 900;
  position: relative;
}

.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 50%;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(50% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 900;
  margin-bottom: 5px;
}

.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 3px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;

}


 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, rgba(9,224,138,1) 25%, rgba(5,231,183,1) 50%, rgba(0,212,255,1) 100%);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, rgba(9,224,138,1) 25%, rgba(5,231,183,1) 50%, rgba(0,212,255,1) 100%);
  }


     </style>

   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      
      <form action="userRegisterCheck.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullname" class="fullname" placeholder="Enter your name" required>
          </div>
          
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="uname" class="uname" placeholder="Enter your username" required>
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" class="email" placeholder="Enter your email" required>
          </div>
          
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" name="pnumber" class="pnumber" placeholder="Enter eg: 01X XXXXXXXX" pattern="[0-9]{3}-[0-9]{8}" required>
          </div>
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="pass" class="pass" placeholder="Enter your password" required>
          </div>
          
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="cpass" class="cpass" placeholder="Confirm your password" required>
          </div>
          
          
          
          <div class="input-box">
          <span class="details">Address 1</span>
          <input type="text" name="address" class="address" placeholder="Enter Address" required>
          </div>

        

        </div>
        
      
        
        <div class="button">
          <input type="submit" name="submit" value="Register">

          

        </div>
     
      </form>

      <form action="loginpage.php">
          
          <button type="submit">Back</button>

      </form>    

    </div>
  </div>

</body>
</html>