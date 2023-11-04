
<html>
<head>
<?php session_start();

?>
  <title>Riders Paradise</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
    <style type="text/css">


    /* Default styles */
body {
  
  background: url("bghomepage.png");
  background-size: cover;
  font-family: 'Lato', sans-serif;
  font-weight: 600;
  background-attachment: fixed;

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

.marquee{
margin-top: 15;
margin-left: 35%;

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


.content .container {
  text-align: center; /* Center the text within the container */
  background-color: #fff;
  padding: 20;
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
   font-size: 20px;
        }

.faq-answer {
    display: none;
    margin-top: 10px;
    font-weight: 450;
    font-size: 18px;
  }

.content .aboutus{
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 30;
  
}
.content .aboutus .aboutusdetails{
  padding: 0px 75px 0px 75px;
  font-size: 20px;
  
}

#accessoryChart {
    margin-top: 20px; /* Adjust the margin as needed to position the chart below other content */
    background-color: #fff; /* Set a background color to make the chart stand out */
    padding: 20px; /* Add padding to the chart for spacing */
}

    </style>

    <body>

      <div class="marquee">
        
        <marquee scrollamount="16">
          <h1>Welcome <?php // Check if user is logged in
                
                if(isset($_SESSION['uname'])) {
                $uname = $_SESSION['uname'];
                echo $uname;
      } else {
        // Redirect to login page
        header("Location: adminLoginPage.php");
        exit();
      }
    ?>

              to Riders Paradise! Stay Safe on the Road - Check Your Brakes Regularly!</h1></marquee>
                   
        </div>
        
        <div class="content">
          
        <div class="slideshow">
          <img src="banner1.png" class="active">
          <img src="banner2.png" >
        
        </div>


        
        <div class="container">
          

           <div class="chart" id="salesPieChart"></div>
          
    
    </div>
    
   




  </div>

        
      
      <div class="sidebar open">
        <ul>
            <center>
          <li><h3>Menu</h3><i class='bx bx-menu menu-icon' id="btn"></i></li>
          <li><a href="adminHomepage.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Homepage</span><div class="item">Homepage</div></a></li>
          <li><a href="adminSalesPage.php"><i class="bx bx-cog"></i><span class="tooltip">Sales of the Stocks</span><div class="item">Sales</div></a></li>
          <li><a href="#"><i class="bx bx-cog"></i><span class="tooltip">Spare Parts</span><div class="item">Spare Parts</div></a></li>
          <li><a href="#"><i class="bx bx-gift"></i><span class="tooltip">Accessories</span><div class="item">Accessories</div></a></li>
          <li><a href="logout.php"><i class="bx bx-log-out"></i><span class="tooltip">Logout</span><div class="item">Logout</div></a></li> 
            </center>
        </ul>
      </div>

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
  


<script>
$(document).ready(function() {
    function createPieChart(data) {
        var layout = {
            title: 'Monthly Motorcycle Accessory Sales by Category'
        };

        var labels = data.map(item => item.product_category);
        var values = data.map(item => item.total_sales);

        var trace = {
            labels: labels,
            values: values,
            type: 'pie'
        };

        Plotly.newPlot('salesPieChart', [trace], layout);
    }

    // Function to fetch and update pie chart data based on filter criteria
    function updatePieChart() {
        // Get the selected filter criteria
        var filterCategory = $("#filter-category").val();
        var filterMonth = $("#filter-month").val();
        var filterYear = $("#filter-year").val();

        // Make an AJAX request to fetch pie chart data
        $.ajax({
            url: "fetchBarChart.php", // Update the URL to the correct PHP file for fetching pie chart data
            type: "POST",
            data: {
                filterCategory: filterCategory,
                filterMonth: filterMonth,
                filterYear: filterYear
            },
            success: function(data) {
                createPieChart(JSON.parse(data));
            }
        });
    }

    // Create and display the pie chart when the page loads
    updatePieChart();

    // Attach a change event to the filter form elements
    $(".filter-form select").change(function() {
        updatePieChart(); // Update the pie chart when the filters change
    });
});
</script>


    </body>
    </html>