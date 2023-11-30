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

}

        h1 {
            text-align: center;
        }

.container {
            max-width: 400px;
            
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        form label {
            display: block;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        form button[type="submit"] {
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
        }

form button[type="submit"]:hover {

    background: #0056b3;
}

  .sales-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 12px; /* Increased padding for better spacing */
        text-align: center;
    }

    th {
        background-color: #007BFF;
        color: #fff;
    }

    tr.odd-row {
        background-color: #f5f5f5; /* Light gray background */
    }

    tr.even-row {
        background-color: #e0e0e0;
    }

    th, td {
        border: 1px solid #ccc;
    }


/* Style for the filter form */
.filter-form {
    background: rgb(147,3,103);
    background: linear-gradient(90deg, rgba(147,3,103,1) 27%, rgba(163,29,202,1) 64%);
    color: #000;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

button {
    background: #fff;
    color: #007BFF;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 18px;
    margin-top: 10px;
}

button[type="reset"] {
    background: #ccc;
    color: #fff;
}

.content .container .chart{
    margin-left: 450px;
}

    </style>
</head>
<body>

    <div class="content">

        <h1>Sales Summary Page</h1>

    <div class="container">


    <form method="post" action="adminSalesPage-Check.php">
        <h2>Monthly Sales</h2>
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required>

        <label for="sales_amount">Sales Amount:</label>
        <input type="number" name="sales_amount" required>

        <label for="stock_available">Stock Available:</label>
        <input type="number" name="stock_available" required>

        <label for="product_category">Product Category:</label>
        <select name="product_category" required>
            <option value="Gloves">Gloves</option>
            <option value="Helmet">Helmet</option>
            <option value="GoPro">GoPro</option>
            <option value="Handle Lock">Handle Lock</option>
            <option value="Jacket">Jacket</option>
        </select>

        <label for="sales_month">Sales Month:</label>
        <select name="sales_month" required>
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

        <label for="sales_year">Sales Year:</label>
        <select name="sales_year" required>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
        </select>

        <button type="submit">Insert Data</button>
    </form>

</div>
<div class="chart" id="salesBarChart" style="margin-left: 500px; margin-top: -450px;"></div>

<br>
<br>

        <div class="sales-container">
    <h2>Monthly Sales Report</h2>

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
            <div class="filter-buttons">
                <button type="submit" name="filter-button">Filter</button>
                <button type="reset">Reset</button>
            </div>
        </div>
        </form>


    <table>
        <!-- Table Header -->
        <thead>
            <tr>
                <th>Product Name</th>
                <th>No of Sales Amount (Items)</th>
                <th>No of Stock Available (Items)</th>
                <th>Product Category</th>
                <th>Month</th>
                <th>Year</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch and display data from the database based on filters
            include 'db_riders.php'; // Include your database connection file

            // Retrieve filter values
            $filterCategory = isset($_POST['filter-category']) ? $_POST['filter-category'] : '';
            $filterMonth = isset($_POST['filter-month']) ? $_POST['filter-month'] : '';
            $filterYear = isset($_POST['filter-year']) ? $_POST['filter-year'] : '';

            // Build the SQL query based on filters
            $sql = "SELECT `product_id`, `product_name`, `sales_amount`, `stock_available`, `product_category`, `months`, `year` FROM `stock` WHERE 1";

            if (!empty($filterCategory)) {
                $sql .= " AND `product_category` = '$filterCategory'";
            }

            if (!empty($filterMonth)) {
                $sql .= " AND `months` = '$filterMonth'";
            }

            if (!empty($filterYear)) {
                $sql .= " AND `year` = '$filterYear'";
            }

            $result = mysqli_query($conn, $sql);

            $evenRow = false; // Variable to alternate row colors

            while ($row = mysqli_fetch_assoc($result)) {
                $rowClass = $evenRow ? 'even-row' : 'odd-row';
                echo '<tr class="' . $rowClass . '">';
                echo '<td>' . $row['product_name'] . '</td>';
                echo '<td>' . $row['sales_amount'] . '</td>';
                echo '<td>' . $row['stock_available'] . '</td>';
                echo '<td>' . $row['product_category'] . '</td>';
                echo '<td>' . $row['months'] . '</td>';
                echo '<td>' . $row['year'] . '</td>';

                echo '<td>';
                echo '<form method="post" action="adminSalesDelete.php">';
                echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';
                echo '<button type="submit" style="" name="delete" class="btn btn-danger">Delete</button>';
                echo '</form>';
                echo '</td>';

                echo '</tr>';
                $evenRow = !$evenRow; // Toggle row color
            }
            ?>
        </tbody>
    </table>
</div>


    </div>


    <div class="sidebar open">
        <ul>
            <center>
          <li><h3>Menu</h3><i class='bx bx-menu menu-icon' id="btn"></i></li>
          <li><a href="adminHomepage.php"><i class="bx bx-grid-alt"></i><span class="tooltip">Homepage</span><div class="item">Homepage</div></a></li>
          <li><a href="adminSalesPage.php"><i class="bx bx-cog"></i><span class="tooltip">Sales of the Stocks</span><div class="item">Sales</div></a></li>
          <li><a href="#"><i class="bx bx-cog"></i><span class="tooltip">Spare Parts</span><div class="item">Spare Parts</div></a></li>
          <li><a href="adminAccessories.php"><i class="bx bx-gift"></i><span class="tooltip">Accessories</span><div class="item">Accessories</div></a></li>
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

      function createBarChart(data) {
        var layout = {
            title: 'Monthly Motorcycle Accessory Sales by Category'
        };

        var categories = data.map(item => item.product_category);
        var sales = data.map(item => item.total_sales);

        var trace = {
            x: categories,
            y: sales,
            type: 'bar'
        };

        Plotly.newPlot('salesBarChart', [trace], layout);
    }

    // Function to fetch and update bar chart data based on filter criteria
    function updateBarChart() {
        // Get the selected filter criteria
        var filterCategory = $("#filter-category").val();
        var filterMonth = $("#filter-month").val();
        var filterYear = $("#filter-year").val();

        // Make an AJAX request to fetch bar chart data
        $.ajax({
            url: "fetchBarChart.php",
            type: "POST",
            data: {
                filterCategory: filterCategory,
                filterMonth: filterMonth,
                filterYear: filterYear
            },
            success: function(data) {
                createBarChart(JSON.parse(data));
            }
        });
    }

    // Create and display the bar chart when the page loads
    updateBarChart();

    // Attach a change event to the filter form elements
    $(".filter-form select").change(function() {
        updateBarChart(); // Update the bar chart when the filters change
    });
    });

  </script>

</body>
</html>


