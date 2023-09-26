<!DOCTYPE html>
<html>
<head>
  <title>Spareparts and Accessories</title>

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
  width: 120px; /* Adjust the width as needed */
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



.content .images{

  background-color: #fff;
  padding: 25px 30px;
  border-radius: 35px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}

.images a {
    display: inline-flex;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    width: 300px;
    height: 200px;
    margin: 0 20px 20px 0;
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
    top: 0;
    left: 0;
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
.image-popup .con .edit, .image-popup .con .trash {
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
.content .images .upload{
    display: block;
    margin-bottom: 50px;
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
      <li><a href="adminDashboard.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Dashboard</span><div class="item">Dashboard</div></a></li>
      <li><a href="adminStudentList.php"><i class="bx bx-user"></i><span class="tooltip">Student List</span><div class="item">Student List</div></a></li>
      <li><a href="adminEvents.php"><i class="bx bx-calendar"></i><span class="tooltip">Events</span><div class="item">Spareparts</div></a></li>

      <li><a href="logoutweb.php"><i class="bx bx-log-out"></i><span class="tooltip">Logout</span><div class="item">Logout</div></a></li> 
    </ul>
  </div>


   <div class="content">

           <h2>Spareparts and Accessories</h2>
          <p>Welcome to Rider Paradise You can browse through and select the spareparts and accessories from below:</p>
            </br>
                      
            <div class="images">

              <form action="adminPostEvents.php" class="upload" method="post">
              <button>upload</button>
              </form>
              
              <center>
              <?php



          $sql = "SELECT * FROM events";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            $num = 1;

            if($resultCheck > 0) {
              while($row = mysqli_fetch_assoc($result)){
?>
    
              <a href=" ">
                <img src= '<?php echo $row["filepath"]; ?>' data-alt= '<?php echo $row["description"]; ?>' data-id='<?=$row["id"]; ?>' data-title='<?php echo $row["title"]; ?>' width="300" height="200">
                <span><?php echo $row['title']; ?></span>
              </a>
                <?php   

                    }
                  }

                ?>
              </center>

            </div>
          


        </div>
    <div class="image-popup"></div>
    

  </section>
 


<script>
// Container we'll use to output the image
let image_popup = document.querySelector('.image-popup');
// Iterate the images and apply the onclick event to each individual image
document.querySelectorAll('.images a').forEach(img_link => {
  img_link.onclick = e => {
    e.preventDefault();
    let img_meta = img_link.querySelector('img');
    let img = new Image();
    img.onload = () => {
      // Create the pop out image
      image_popup.innerHTML = `
        <div class="con" style="overflow-y:scroll";>
          <h3>${img_meta.dataset.title}</h3>
          </br>
          <h3 style="width: 950px; line-height: 1.9";>${img_meta.dataset.alt}</h3>
          
          <center>
          <img src="${img.src}" width="650px" height="auto" style="margin-top: 50px";>
          </center>

        </div>
      `;
      image_popup.style.display = 'flex';
    };
    img.src = img_meta.src;
  };
});
// Hide the image popup container, but only if the user clicks outside the image
image_popup.onclick = e => {
  if (e.target.className == 'image-popup') {
    image_popup.style.display = "none";
  }
};


</script>
  
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
