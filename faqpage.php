
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

.content .container {
  text-align: center; /* Center the text within the container */
  background-color: #fff;
}

.content .container .title h1{
  margin-bottom: 0px;
}

.content .container .title {
  position: relative;
  display: inline-block; /* Make the title inline so the underline is centered below it */
  margin-bottom: 50px;
}

.content .container .title::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 5px;
  width: 100%;
  border-radius: 5px;
  background: linear-gradient(90deg, rgba(224,55,9,1) 27%, rgba(200,80,235,1) 64%);
}

.faq-question {
   cursor: pointer;
   font-weight: bold;
        }

.faq-answer {
    display: none;
    margin-top: 10px;
    font-weight: 300;
  }


    </style>

    <body>

      <div class="content">
        
        <div class="container">
          
          <div class="title"><center><h1>Frequently Asked Questions (FAQ)</h1></center></div>

          <div class="faq">
        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer('answer1')">1. What types of motor spare parts do you offer?</div>
            <div class="faq-answer" id="answer1">We offer a wide range of motor spare parts, including but not limited to engine components, brakes, suspension parts, electrical components, and more. Browse our catalog for a complete list.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer('answer2')">2. Are your spare parts compatible with my vehicle?</div>
            <div class="faq-answer" id="answer2">Our spare parts are compatible with a variety of makes and models. To ensure compatibility, please use our vehicle lookup tool on the product pages or contact our customer support team for assistance.</div>
        </div>

        <!-- Add more FAQ items following the same structure -->
    </div>

    <script>
        // JavaScript function to toggle the display of answers
        function toggleAnswer(id) {
            var answer = document.getElementById(id);
            if (answer.style.display === "block") {
                answer.style.display = "none";
            } else {
                answer.style.display = "block";
            }
        }
    </script>

  
    


    </div>
  </div>
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

    });


    const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
  </script>

    </html>
