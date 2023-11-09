
<html>
<head>

  <title>Riders Paradise</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

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

#salesPieChart {
    margin-top: 20px; /* Adjust the margin as needed to position the chart below other content */
    background-color: #fff; /* Set a background color to make the chart stand out */
    padding: 20px; /* Add padding to the chart for spacing */
}


.faq-item {
    margin-bottom: 20px;
    cursor: pointer;
}

.faq-question {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    font-size: 20px;
    padding: 10px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.faq-question:hover {
    background-color: #e0e0e0;
    transition: background-color 0.3s;
}

.faq-question .icon {
    font-size: 20px;
    font-weight: bold;
}

.faq-answer {
    display: none;
    margin-top: 10px;
    font-weight: 450;
    font-size: 18px;
}


/* Style for the filter form */
.filter-form {
    background: rgb(225,171,34);
    color: #000;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
   
}



.filter-form h2 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
}

.filter-row {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.filter-input {
    width: calc(30% - 20px);
    margin-right: 20px;
    margin-bottom: 10px;
}

.filter-input:last-child {
    margin-right: 0;
}

label {
    font-weight: bold;
}

select {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background: rgba(255, 255, 255, 0.2);
    color: #000;
}

.filter-buttons {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}


    </style>

    <body>

      <div class="marquee">
        
        <marquee scrollamount="16"><h1>Stay Safe on the Road - Check Your Brakes Regularly!</h1></marquee>
                   
        </div>
        
        <div class="content">
          
        <div class="slideshow">
          <img src="banner1.png" class="active">
          <img src="banner2.png" >
        
        </div>
        
        <div class="aboutus">
          
         <h1> Welcome to Riders Paradise - Your Ultimate Destination for Quality Motorcycle Spare Parts and Accessories!</h1>
          
          <div class="aboutusdetails">


      <p>Our passion for riding drives us to provide top-notch products, meticulously selected and tested to meet your standards.</p> 
      
      <p>We're more than just an online store; we're a vibrant community dedicated to enhancing your riding experience and keeping your motorcycle in peak condition.</p> 
      
      <p>Join us for an unforgettable journey on the open road, knowing that Riders Paradise has your back!</p>
  
          </div>
        </div>

        <form id="sales-filter-form" method="post" class="filter-form">
            <h2>Filter Sales Report</h2>
            <div class="filter-row">
                <div class="filter-input">
                  <label for="filter-category">Product Category:</label>
                    <select name="filter-category" id="filter-category">
                      <option value="" selected>All</option>
                      <option value="Gloves">Gloves</option>
                      <option value="Helmet">Helmet</option>
                      <option value="GoPro">GoPro</option>
                      <option value="Handle Lock">Handle Lock</option>
                      <option value="Jacket">Jacket</option>
                  </select>
                </div>
            <div class="filter-input">
                  <label for="filter-month">Month:</label>
                  <select name="filter-month" id="filter-month">
                      <option value="">All</option>
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                  </select>
              </div>
              <div class="filter-input">
                  <label for="filter-year">Year:</label>
                  <select name="filter-year" id="filter-year">
                      <option value="">All</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                  </select>
              </div>
                  
              </div>
              </form>

        <div id="salesPieChart"></div></br>

        <div class="container">
    <div class="title"><center><h1>Frequently Asked Questions (FAQ)</h1></center></div>
    <div class="faq">
        <div class="faq-item">
             <div class="faq-question" onclick="toggleAnswer('answer1')">
              <div class="question-text">1. What types of motor spare parts do you offer?</div><i class="fas fa-plus"></i></div>
              <div class="faq-answer" id="answer1">We offer a wide range of motor spare parts, including but not limited to engine components, brakes, suspension parts, electrical components, and more. Browse our catalog for a complete list.</div>
        </div>

        <div class="faq-item">
             <div class="faq-question" onclick="toggleAnswer('answer2')">
              <div class="question-text">2. Are your spare parts compatible with my vehicle?</div><i class="fas fa-plus"></i></div>
              <div class="faq-answer" id="answer2">Our spare parts are compatible with a variety of makes and models. To ensure compatibility, please use our vehicle lookup tool on the product pages or contact our customer support team for assistance.</div>
        </div>

        <div class="faq-item">
             <div class="faq-question" onclick="toggleAnswer('answer3')">
              <div class="question-text">3. How can I find the specific part I need?</div><i class="fas fa-plus"></i></div>
              <div class="faq-answer" id="answer3">You can use our search bar to enter keywords, part numbers, or browse through our categories. Additionally, you can filter products by make, model, and year for a more targeted search.</div>
        </div>

        <div class="faq-item">
             <div class="faq-question" onclick="toggleAnswer('answer4')">
              <div class="question-text">4. How can I contact your customer support team?</div><i class="fas fa-plus"></i></div>
              <div class="faq-answer" id="answer4">You can reach our customer support team by contacting us. We're available via email, phone, and live chat during our business hours.</div>
        </div>

        <div class="faq-item">
             <div class="faq-question" onclick="toggleAnswer('answer5')">
              <div class="question-text">5. How do I know if a part is in stock?</div><i class="fas fa-plus"></i></div>
              <div class="faq-answer" id="answer5">On each product page, you'll find real-time stock availability information. If a product is out of stock, you can sign up for notifications to be alerted when it becomes available again.</div>
        </div>
        
        
    </div>

    <script>
     function toggleAnswer(id) {
    var answer = document.getElementById(id);
    var icon = document.querySelector(".faq-question[onclick=\"toggleAnswer('" + id + "')\"] i");

    if (answer.style.display === "block") {
        answer.style.display = "none";
        icon.classList.remove('fa-minus');
        icon.classList.add('fa-plus');
    } else {
        answer.style.display = "block";
        icon.classList.remove('fa-plus');
        icon.classList.add('fa-minus');
    }
}

    </script>
    
    </div>
    


  </div>

        
      
      <div class="sidebar open">
        <ul>
            <center>
          <li><h3>Menu</h3><i class='bx bx-menu menu-icon' id="btn"></i></li>
          <li><a href="homepage.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Homepage</span><div class="item">Homepage</div></a></li>
          <li><a href="userSettingsPage.php"><i class="bx bx-cog"></i><span class="tooltip">Settings</span><div class="item">Settings</div></a></li>
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
  


<script>
  $(document).ready(function() {
    function createPieChart(data) {
        var layout = {
            title: 'Overall Motorcycle Accessory Sales'
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
