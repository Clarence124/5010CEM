<!DOCTYPE html>
<html>

<head>
  <title>Admin Accessories Page</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?php
  
  session_start();



  ?>

  <style type="text/css">
    /* Default styles */
    body {
      margin: 0;
      padding: 0;
      background: url("bikelogin4.png");
      background-size: cover;
      font-family: "Quicksand";
      font-weight: 600;

    }

    .sidebar {
      background-color: #333;
      color: #fff;
      height: 100vh;
      width: 60px;
      /* Adjust the width as needed */
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
      width: 200px;
      /* Adjust the width as needed */
    }

    .sidebar.closed {
      width: 120px;
      /* Adjust the width as needed */
    }

    .sidebar ul {
      list-style-type: none;
      margin: 1;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    .sidebar li {
      margin-bottom: 10px;
      width: 80%;
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
      margin-right: 10px;
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

    .sidebar.closed a .item {
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
      margin-right: 10px;
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
      margin-right: 10px;
    }


    

    @media only screen and (min-width: 320px) and (max-width: 568px) {
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

      
    }

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

      
     
  </style>
</head>

<body>


  <div class="sidebar open">

    <ul>
      <h3>
        Menu
        <i class='bx bx-menu menu-icon' id="btn"></i>
      </h3>
      <li><a href="adminDashboard.php"><i class="bx bx-grid-alt"> </i><span class="tooltip">Homepage</span>
          <div class="item">Homepage</div>
        </a></li>
      <li><a href="adminStudentList.php"><i class="bx bx-user"></i><span class="tooltip">Profile</span>
          <div class="item">Profile</div>
        </a></li>
      <li><a href="adminEvents.php"><i class="bx bx-cog"></i><span class="tooltip">Spare parts</span>
          <div class="item">Spare parts</div>
        </a></li>
      <li><a href="adminAccessories.php"><i class="bx bx-gift"></i><span class="tooltip">Accessories</span>
          <div class="item"> Accessories</div>
        </a></li>
      <li><a href="adminEvents.php"><i class="bx bx-gift"></i><span class="tooltip">Payment</span>
          <div class="item"> Payment</div>
        </a></li>
      <li><a href="logoutweb.php"><i class="bx bx-log-out"></i><span class="tooltip">Logout</span>
          <div class="item">Logout</div>
        </a></li>
    </ul>
  </div>


  <div class="content">
    <div class="topnav">
      <div class="accessories-image">
        <img src="pictures/R paradise logo.jpg" ,alt="Rider paradise logo">
      </div>
      <h2>Accessories</h2>
      <form action="/action_page.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="bx bx-search"></i></button>
      </form>
    </div>
    

    

    </div>



  </div>
  <div class="image-popup"></div>


  </section>



  <script>
    // Hide the image popup container, but only if the user clicks outside the image
    image_popup.onclick = e => {
      if (e.target.className == 'image-popup') {
        image_popup.style.display = "none";
      }
    };


  </script>

  <script>
    $(document).ready(function () {
      // Toggle sidebar open and closed
      $('#btn').click(function () {
        $('.sidebar').toggleClass('open closed');
      });
    });
  </script>



</body>

</html>