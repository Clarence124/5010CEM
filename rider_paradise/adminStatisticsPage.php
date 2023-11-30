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

        h1 {
            text-align: center;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
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
    </style>
</head>
<body>
    <h1>Admin Statistics Page</h1>
    <div class="container">
        <form method="post" action="adminStatisticsPage-Check.php">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required>

            <label for="sales_amount">Sales Amount:</label>
            <input type="number" name="sales_amount" required>

            <label for="stock_available">Stock Available:</label>
            <input type="number" name="stock_available" required>

            <label for="product_category">Product Category:</label>
            <input type="text" name="product_category" required>

            <button type="submit">Insert Data</button>
        </form>
    </div>
</body>
</html>


