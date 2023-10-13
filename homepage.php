
<html>
<head>
  <title>Riders Paradise</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kalam&family=Quicksand&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style type="text/css">


    /* Default styles */
body {
  margin: 0;
  padding: 0;
  background: url("bghomepage.png");
  background-size: cover;
  font-family: 'Kalam', cursive;
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

.sidebar.closed h3 {
  overflow: hidden;
  text-align: center;
}



.sidebar .menu-icon {
  
  font-size: 20px;
}


.content {
  margin-left: 200px;
  margin-top: 120px;
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

 .slideshow {
    position: relative;
    height: 350px;
    width: 100%;
    overflow: hidden;
    
  }

  .slideshow img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 293px;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }

  .slideshow img.active {
    opacity: 1;
  }

    </style>

    <body>

      <div class="content">
    
        <div class="slideshow">
          <img src="banner1.png" class="active">
          <img src="banner2.png" >
        
        </div>
      </div>
      
      <div class="sidebar open">
    
    <ul>
      <center>
      <li><h3>Menu</h3><i class='bx bx-menu menu-icon' id="btn"></i></li>
      <li><a href="homepage.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Homepage</span><div class="item">Homepage</div></a></li>
      <li><a href="userProfile.php"><i class="bx bx-user"></i><span class="tooltip">Profile</span><div class="item">Profile</div></a></li>
      <li><a href="#"><i class="bx bx-cog"></i><span class="tooltip">Spare Parts</span><div class="item">Spare Parts</div></a></li>
      <li><a href="#"><i class="bx bx-gift"></i><span class="tooltip">Accessories</span><div class="item">Accessories</div></a></li>
      <li><a href="#"><i class="fas fa-money-check-alt"></i><span class="tooltip">Payment</span><div class="item">Payment</div></a></li>
      <li><a href="logout.php"><i class="bx bx-log-out"></i><span class="tooltip">Logout</span><div class="item">Logout</div></a></li> 
      </center>
    </ul>
  </div>

  



    </body>
    <script>
    $(document).ready(function() {
      // Toggle sidebar open and closed
      $('#btn').click(function() {
        $('.sidebar').toggleClass('open closed');
      });

      // Change image every 3 seconds
      setInterval(function() {
        var current = $('.slideshow img.active');
        var next = current.next();

        // If we reached the end of the slideshow, start over from the beginning
        if (next.length == 0) {
          next = $('.slideshow img').first();
        }

        current.removeClass('active');
        next.addClass('active');
      }, 2000);
    });
  </script>

    </html>
