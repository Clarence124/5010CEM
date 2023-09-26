
<html>
<head>

    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Riders Paradise</title>
    <link rel="stylesheet" href="loginpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Quicksand&display=swap" rel="stylesheet">


  <link rel="shortcut icon" href="#" type="image/x-icon">

</head>
<body>
    

    <div class="login-container">
        <h1>Login</h1>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        

        </div>
        <button class="login-button" type="submit"> Login <i class="fa-solid fa-right-to-bracket fa-fade"></i></button>
        <button class="register-button" type="submit" onclick="window.location.href = 'registerUser.php';"> Register <i class="fa-solid fa-address-card fa-fade"></i></button>
        <a href="#">Sign in as Admin</a>
    </div>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginContainer = document.querySelector('.login-container');
            const loginButton = document.querySelector('.login-button');

            loginButton.addEventListener('click', function() {
                loginContainer.classList.add('clicked');

                // Simulate login process
                setTimeout(function() {
                    // Redirect to the dashboard or perform further actions here
                    alert('Login successful! Redirecting...');
                }, 1000); // Adjust the delay as needed

               
            });
        });
    </script>

</body>
</html>