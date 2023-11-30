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
  include 'db_studentUsers.php';
  session_start();



  ?>

  <style type="text/css">
    /* Default styles */
    body {
      margin: 0;
      padding: 0;
      background: url("adminbg.jpg");
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
      width: 100px;
      /* Adjust the width as needed */
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

    .sidebar.closed a .item {
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
      padding: 20px;

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

      .content {
        margin-left: 0;
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

      .content {
        margin-left: 0;
      }

      .images a {
        width: 100%;
      }

      .content .images {
        padding: 15px;
      }
    }

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
      font-size: 20px;
    }

    .accessories-image img {
      max-height: 40px;
      margin-left: 10px;
    }

    .topnav form {
      float: right;
      margin-top: 8px;
      display: flex;
      align-items: center;
    }

    .topnav input[type=text] {
      padding: 6px;
      font-size: 17px;
      border: none;
    }

    .topnav button {
      padding: 6px 10px;
      background: #ddd;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }

    .topnav button:hover {
      background: #ccc;
    }

    @media screen and (max-width: 600px) {
      .topnav form {
        float: none;
        text-align: center;
        margin-top: 0;
      }
    }


    .content .images {

      background-color: #fff;
      padding: 25px 30px;
      border-radius: 35px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
      width: 1000px;
    }

    .images a {
      display: flex;
      text-decoration: none;
      position: relative;
      overflow: hidden;
      width: 200px;
      height: 190px;
      border: solid;
      border-radius: 25px;
      margin: 0 20px 20px 0;
    }

    .image-container {
      position: relative;
      justify-content: center;
      display: inline-block;
    }

    .image-title {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.8);
      color: #fff;
      border-radius: 5px;
      opacity: 0;
      transition: opacity 0.3s ease-in-out;
      text-align: center;
      width: auto;
    }

    .image-container:hover .image-title {
      opacity: 1;
    }


    .images a:hover span {
      opacity: 1;
      transition: opacity 1s;
    }

    .images span {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      position: absolute;
      opacity: 0;

      color: #fff;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      transition: opacity 1s;
    }



    .image-popup {
      display: none;
      flex-flow: column;
      justify-content: center;
      align-items: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      z-index: 99999;
    }

    .image-popup .con {
      display: flex;
      flex-flow: column;
      background-color: #ffffff;
      padding: 25px;
      border-radius: 5px;
    }

    .image-popup .con h3 {
      margin: 0;
      font-size: 18px;
    }

    .image-popup .con .edit,
    .image-popup .con .trash {
      display: inline-flex;
      justify-content: center;
      align-self: flex-end;
      width: 40px;
      text-decoration: none;
      color: #FFFFFF;
      padding: 10px 12px;
      border-radius: 5px;
      margin-top: 10px;
    }

    .image-popup .con .trash {
      background-color: #b73737;
    }

    .image-popup .con .trash:hover {
      background-color: #a33131;
    }

    .image-popup .con .edit {
      background-color: #37afb7;
    }

    .image-popup .con .edit:hover {
      background-color: #319ca3;
    }

    .content .images .upload {
      display: block;
      margin-bottom: 50px;
    }
  </style>
</head>

<body>


  <div class="sidebar open">
    <ul>
      <center>
        <li>
          <h3>Menu</h3><i class='bx bx-menu menu-icon' id="btn"></i>
        </li>
        <li><a href="adminHomepage.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Homepage</span>
            <div class="item">Homepage</div>
          </a></li>
        <li><a href="adminSalesPage.php"><i class="bx bx-cog"></i><span class="tooltip">Sales of the Stocks</span>
            <div class="item">Sales</div>
          </a></li>
        <li><a href="#"><i class="bx bx-cog"></i><span class="tooltip">Spare Parts</span>
            <div class="item">Spare Parts</div>
          </a></li>
        <li><a href="adminAccessories.php"><i class="bx bx-gift"></i><span class="tooltip">Accessories</span>
            <div class="item">Accessories</div>
          </a></li>
        <li><a href="logout.php"><i class="bx bx-log-out"></i><span class="tooltip">Logout</span>
            <div class="item">Logout</div>
          </a></li>
      </center>
    </ul>
  </div>


  <div class="content">
    <div class="topnav">
      <div class="accessories-image">
        <img src="pictures/R paradise logo.jpg" ,alt="Rider paradise logo">
      </div>
      <h2>Accessories</h2>
    </div>
    <p>Welcome to Rider Paradise's Accessories Page! You can view the list of motor accessories below.</p>

    <div class="images">
      <center>
        <?php
        $sql = "SELECT title, filepath, id FROM events";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $accessoryTitle = htmlspecialchars($row["title"]); // Sanitize the title
        
            // Determine the type of accessory based on the title
            if (strpos($accessoryTitle, 'Helmet') !== false) {
              $detailPageURL = "helmet_detail.php?title=" . urlencode($accessoryTitle);
            } elseif (strpos($accessoryTitle, 'Jacket') !== false) {
              $detailPageURL = "jacket_detail.php?title=" . urlencode($accessoryTitle);
            } elseif (strpos($accessoryTitle, 'Gloves') !== false) {
              $detailPageURL = "gloves_detail.php?title=" . urlencode($accessoryTitle);
            } elseif (strpos($accessoryTitle, 'Security lock') !== false) {
              $detailPageURL = "security_lock_detail.php?title=" . urlencode($accessoryTitle);
            } elseif (strpos($accessoryTitle, 'Motorcycle camera') !== false) {
              $detailPageURL = "camera_detail.php?title=" . urlencode($accessoryTitle);
            } else {

              $detailPageURL = "#";
            }

            echo '<div class="image-container">';
            echo '<a href="' . $detailPageURL . '">';
            echo '<img src="' . htmlspecialchars($row["filepath"]) . '" data-alt="" data-id="' . $row["id"] . '" data-title="' . $accessoryTitle . '" width="300" height="200"/>';
            echo '<span class="image-title">' . $accessoryTitle . '</span>';
            echo '</a>';
            echo '</div>';
          }
        } else {
          echo "No accessories found.";
        }
        ?>




      </center>

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