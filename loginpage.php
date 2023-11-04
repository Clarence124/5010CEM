
<html>
<head>

    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Riders Paradise</title>
    <link rel="stylesheet" href="loginpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">

  <link rel="shortcut icon" href="#" type="image/x-icon">

</head>
<body>
    
    <form action="userLoginCheck.php" method="POST">
    <div class="login-container">
        <h1>Login</h1>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="uname" id="uname" name="uname" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="pass" id="pass" name="pass" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="login-button" > Login <i class="fa-solid fa-right-to-bracket fa-fade"></i></button>
        <button class="register-button" type="submit" onclick="window.location.href = 'registerUser.php';"> Register <i class="fa-solid fa-address-card fa-fade"></i></button>
        

        <a href="adminLoginPage.php">Sign in as Admin</a>
    </div>
        </form>

    


</body>
</html>