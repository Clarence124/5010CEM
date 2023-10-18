<?php
include 'db_studentUsers.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $imageName = $_FILES["image"]["name"];
    $productName = $_POST["name"];
    $productPrice = $_POST["price"];
    $productRating = $_POST["rating"];

    // Perform any validation and processing needed
    // For example, you can move the uploaded image to a specific folder
    $uploadDirectory = "pictures/"; // Change this to your desired directory
    $targetFilePath = $uploadDirectory . $imageName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $insertSQL = "INSERT INTO accessories_content (filepath, title, price, rating) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($insertSQL);

        // Bind the parameters
        $stmt->bind_param("ssdi", $targetFilePath, $productName, $productPrice, $productRating);

        // Execute the SQL statement
        if ($stmt->execute()) {
            // Redirect back to the accessories page or any other desired page
            header("Location: adminAccessories.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Fetch products from the database
$sql = "SELECT id, filepath, title, price, rating FROM accessories_content";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Security lock Accessories Page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


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
            width:1070px;
        }

        .topnav h2 {
            margin: 0;
            font-size: 20px;
            text-align:center;
            line-height:40px;
            height:40px;
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


        .content.images {

            background-color: #fff;
            padding: 25px 30px;
            border-radius: 35px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            width: 700px;
        }

        .images .content-container {
            /* Style for the container that holds "Add detail" and product */
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            /* Allows items to wrap to the next line on smaller screens */
        }



        .images a {
            display: inline-flex;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            width: 170px;
            height: 150px;
            border: solid;
            border-radius: 25px;
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

        .product {
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            max-width: 170px;
            height: 370px;
            margin-right: 20px;
        }

        .product1 {
            display: flex;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            max-width: 170px;
            height: 380px;
            margin-right: 20px;
        }

        .container-box {
            display: flex 1;
            justify-content: space-between;

        }

        .products-container {
            display: flex;
            margin-bottom: 20px;
        }

        .products-container1 {
            display: flex;
            margin-top: 10px;
        }

        .product-image img {
            width: 170px;
            height: auto;

        }

        .product-details {
            flex-grow: 1;
            padding: 0 20px;
        }

        .product-title {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .product-price {
            font-size: 16px;
            margin: 5px 0;
            color: #f57224;
        }

        .product-rating {
            display: flex;
            align-items: center;
            color: #f57224;
            
        }

        .product-rating i.bx {
            font-size: 20px;
            margin-right: 3px;
            color: #f57224;
        }


        .rating {
            font-size: 16px;
            font-weight: bold;
        }

        .filter-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            flex: 1;
            width: 200px;
            height: 490px;
            position:absolute;
            top:90px;
            right: -70px;
            left: 1050px;
            bottom: 500px;
        }

        .filter-item {
            margin-bottom: 20px;
        }

        .filter-item h3 {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            /* Add margin for spacing */
            align-items: center;
            flex-direction: column;
        }


        .price-input {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
            /* Add space between the price inputs */
        }

        .price-input input[type="number"] {
            padding: 6px;
            /* Adjust as needed */
            font-size: 14px;
            /* Adjust as needed */
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 5px;
            /* Add space between "RM" and the input */
        }

        .price-input:last-child input[type="number"] {
            margin-right: 0;
            /* Remove margin-right for the last input */
        }


        .input-group input[type="text"],
        .input-group input[type="number"] {
            padding: 6px;
            /* Adjust the padding to make the input elements smaller */
            font-size: 12px;
            /* Adjust the font size */
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
        }

        .input-group button {
            padding: 4px 12px;
            /* Adjust the padding to make the button smaller */
            background-color: #f57224;
            /* Shopee's orange color */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            /* Adjust the font size */
        }

        .input-group button:hover {
            background-color: #e45600;
        }



        .bx-search {
            font-size: 24px;
            margin-right: 0;
        }

        /* Brand filter styling */
        .brandFilter {
            margin-right: 5px;
        }

        /* Rating filter styling */
        .rating-filter {
            display: flex;
            flex-direction: column;
        }

        .ratingFilter {
            margin-bottom: 5px;
        }

        /* Additional styling for selected filters */
        .filter-selected {
            background-color: #f57224;
            /* Shopee's orange color */
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
            margin-right: 5px;
        }

        .price-filter-container {
            width: 180px;
            /* Adjust the width as needed */
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
        </div>

        <div class="container">
            <div class="content-container">
                <div class="add-detail">
                    <form action="add_helmet_content.php" method="post">
                        <button>Add detail</button>
                    </form>
                </div>

                <div class="container-box">
                    <div class="products-container">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $productId = $row['id'];
                            $productImage = $row['filepath'];
                            $productName = $row['title'];
                            $productPrice = $row['price'];
                            $productRating = $row['rating'];
                        }
                        ?>
                        <div class="product">
                            <a href="Solex_disk_lock_detail.php?id=1">
                                <div class="product-image">
                                    <img src="pictures/Solex Disk lock.jpeg" alt="Solex Disk lock">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">Solex 9030 Premium Motorcycle Disk Lock Heavy Duty</h3>
                                    <p class="product-price">Price: RM70</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="product">
                            <a href="Veltics_jelmet_detail.php?id=2">
                                <div class="product-image">
                                    <img src="pictures/Yamaha disk lock (1).png" alt="Yamaha Disk Lock">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">Outdoor BOMBER Jacket Motorcycle Jacket Thick WATERPROOF
                                    </h3>
                                    <p class="product-price">Price: RM120</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="product">
                            <a href="GOJO_jacket_detail.php?id=3">
                                <div class="product-image">
                                    <img src="pictures/Tonyun fork lock.jpeg" alt="Tonyun fork lock">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">TONYON Fork Lock Heavy Duty Security Chain Lock Motorcycle</h3>
                                    <p class="product-price">Price: RM30.00</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="product">
                            <a href="GT_helmet_detail.php?id=4">
                                <div class="product-image">
                                    <img src="pictures/Sunso chain lock.jpeg" alt="Sunso security chain">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">SUNSO 8MM THICKNESS HEAVY DUTY SECURITY STEEL CHAIN LOCK</h3>
                                    <p class="product-price">Price: RM40.00</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                </div>


                <div class="container-box">
                    <div class="products-container1">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            $productId = $row['id'];
                            $productImage = $row['filepath'];
                            $productName = $row['title'];
                            $productPrice = $row['price'];
                            $productRating = $row['rating'];
                        }
                        ?>
                        <div class="product1">
                            <a href="air_jordan_jacket.php?id=5">
                                <div class="product-image">
                                    <img src="pictures/Kovix alarm lock.jpeg" alt="Air jordan jacket">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">KOVIX Motorcycle Alarm Disc Lock KD6 Anti Theft Motorsikal</h3>
                                    <p class="product-price">Price: RM80.00</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="product1">
                            <a href="PU_leather_jacket_detail.php?id=6">
                                <div class="product-image">
                                    <img src="pictures/Kovix chain lock.jpeg" alt="Leather jacket">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">KOVIX Alarm Chain Lock 120cm Cable Motorcycle Heavy Duty</h3>
                                    <p class="product-price">Price: RM100.00</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="product1">
                            <a href="Honda_jacket_detail.php?id=7">
                                <div class="product-image">
                                    <img src="pictures/Alarm lock.jpeg" alt="GTmotor Helmet">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">HMotorcycle Alarm Motorbike 12V Anti-theft Security System Start Alarms</h3>
                                    <p class="product-price">Price: RM90.00</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="product1">
                            <a href="North_face_jacket_detail.php?id=8">
                                <div class="product-image">
                                    <img src="pictures/Alarm disk lock.jpeg" alt="North face jacket">
                                </div>
                                <div class="product-details">
                                    <h3 class="product-title">Motorcycle Alarm Disc Lock siren 110dB Sound Aluminum Alloy Brake</h3>
                                    <p class="product-price">Price: RM40.00</p>
                                    <div class="product-rating">
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <i class="bx bx-star"></i>
                                        <?= $productRating ?>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="filter-container">
                            <div class="filter-item">
                                <h3>Search Filter</h3>
                                <div class="input-group">
                                    <input type="text" id="searchFilter" placeholder="Search...">
                                    <button id="applySearchFilter"><i class="bx bx-search"></i></button>
                                </div>
                            </div>

                            <!-- Brand filter -->
                            <div class="filter-item">
                                <h3>Brand</h3>
                                <label>
                                    <input type="checkbox" class="brandFilter" value="NIKE"> NIKE
                                </label>
                                <label>
                                    <input type="checkbox" class="brandFilter" value="Others"> Others
                                </label>
                                <label>
                                    <input type="checkbox" class="brandFilter" value="Air jordan"> Air jordan
                                </label>
                            </div>

                            <!-- Price range filter -->
                            <div class="filter-item">
                                <h3>Price Range</h3>
                                <div class="price-filter-container">
                                    <div class="input-group">
                                        <div class="price-input">
                                            RM <input type="number" id="minPrice" placeholder="Min">
                                        </div>-
                                        <div class="price-input">
                                            RM <input type="number" id="maxPrice" placeholder="Max">
                                        </div>
                                    </div>

                                </div>
                                <button id="applyPriceFilter">Apply</button>
                            </div>

                            <!-- Rating filter -->
                            <div class="filter-item">
                                <h3>Rating</h3>
                                <div class="rating-filter">
                                    <!-- Add rating star icons here -->
                                    <label>
                                        <input type="checkbox" class="ratingFilter" value="5"> 5 Stars
                                    </label>
                                    <label>
                                        <input type="checkbox" class="ratingFilter" value="4"> 4 Stars
                                    </label>
                                    <!-- Add more rating options as needed -->
                                </div>
                            </div>
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

                <script>
                    // Filter products based on search text
                    $("#applySearchFilter").click(function () {
                        var searchText = $("#searchFilter").val().toLowerCase();
                        $(".product").each(function () {
                            var productName = $(this).find(".product-title").text().toLowerCase();
                            if (productName.includes(searchText)) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });
                    });

                    // Filter products based on brand
                    $(".brandFilter").click(function () {
                        var selectedBrands = [];
                        $(".brandFilter:checked").each(function () {
                            selectedBrands.push($(this).val());
                        });
                        if (selectedBrands.length === 0) {
                            $(".product").show();
                        } else {
                            $(".product").each(function () {
                                var productBrand = $(this).find(".brand").text().toLowerCase();
                                if (selectedBrands.includes(productBrand)) {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            });
                        }
                    });

                    // Filter products based on price range
                    $("#applyPriceFilter").click(function () {
                        var minPrice = parseFloat($("#minPrice").val());
                        var maxPrice = parseFloat($("#maxPrice").val());
                        $(".product").each(function () {
                            var productPrice = parseFloat(
                                $(this)
                                    .find(".product-price")
                                    .text()
                                    .replace(/[^0-9.]/g, "")
                            );
                            if (!isNaN(productPrice) && productPrice >= minPrice && productPrice <= maxPrice) {
                                $(this).show();
                            } else {
                                $(this).hide();
                            }
                        });
                    });

                    // Filter products based on rating
                    $(".ratingFilter").click(function () {
                        var selectedRatings = [];
                        $(".ratingFilter:checked").each(function () {
                            selectedRatings.push(parseInt($(this).val()));
                        });
                        if (selectedRatings.length === 0) {
                            $(".product").show();
                        } else {
                            $(".product").each(function () {
                                var productRating = parseInt(
                                    $(this)
                                        .find(".product-rating")
                                        .text()
                                        .replace(/[^0-9]/g, "")
                                );
                                if (selectedRatings.includes(productRating)) {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            });
                        }
                    });

                </script>



</body>

</html>