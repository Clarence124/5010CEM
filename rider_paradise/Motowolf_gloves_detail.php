<?php
include 'db_studentUsers.php';
session_start();

$productId = "G001";

$sql = "SELECT product_id,product_name, discount_price,  stock_amount, product_color,product_size,product_quantity, product_desc, product_rating FROM gloves where product_id = '$productId'";
$result = $conn->query($sql);

if ($result === false) {
    die("Error: " . $conn->error);
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Gloves Detail</title>

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
        }

        .images a {
            display: inline-flex;
            text-decoration: none;
            position: relative;
            overflow: hidden;
            width: 200px;
            height: 190px;
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

        .product-container {
            display: flex;
        }

        .product-container {
            display: flex;
            align-items: center;
        }

        .product-image {
            max-width: 50%;
            flex: 1;
        }

        .product-image img {
            max-width: 400%;
            max-height: 350px;
            display: block;
            margin: 0 auto;
        }

        #mainImage {
            max-width: 100%;
            height: auto;
        }

        .image-slider {
            display: flex;
            align-items: center;
            position: relative;
        }


        .thumbnail {
            width: 80px;
            /* Adjust the width as needed */
            height: 60px;
            /* Adjust the height as needed */
            margin: 0 5px;
            /* Adjust the margin as needed */
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }

        .thumbnail:hover {
            border-color: #007BFF;
        }

        /* Style for the arrow buttons */
        .slider-button {
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 24px;
            /* Adjust the font size as needed */
            color: #000000;
            /* Change the color of the arrows */
            padding: 0;
            margin: 0 10px;
            /* Adjust the margin as needed */
        }

        .prev-button {
            position: absolute;
            left: 0;
        }

        .next-button {
            position: absolute;
            right: 0;
        }


        .product-details {
            flex: 2;
            /* Allow the details to grow and occupy more space than the image */
            padding: 20px;
        }


        .product-title {
            font-size: 24px;
            font-weight: bold;
        }

        .product-price {
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        .button-container {
            text-align: center;
            margin-top: 10px;
        }

        .add-to-cart-button,
        .buy-now-button {
            display: inline-block;
            /* Make it a block-level element */
            margin-top: 10px;
            /* Adjust the margin to control spacing */
            background-color: #007bff;
            /* Example button color */
            color: #fff;
            /* Text color */
            border: none;
            /* Remove button border */
            padding: 10px 20px;
            /* Add padding for better appearance */
            cursor: pointer;
            /* Change cursor on hover */
        }

        .write-review button {
            display: block;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }


        .quantity-button {
            background-color: #007bff;
            /* Button background color */
            color: #fff;
            /* Button text color */
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            /* Adjust the font size as needed */
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border-radius: 5px;
        }

        .quantity-button:hover {
            background-color: #0056b3;
        }

        .quantity-button:active {
            transform: scale(0.95);
        }

        .quantity-input {
            width: 40px;
            /* Adjust the width as needed */
            padding: 5px;
            text-align: center;
            /* Center-align the text in the input field */
            font-size: 16px;
            /* Adjust the font size as needed */
            border: 1px solid #ccc;
            /* Add a border */
            border-radius: 5px;
            /* Add rounded corners */
            outline: none;
            /* Remove the default input focus outline */
            transition: border-color 0.3s ease;
        }

        .quantity-input:focus {
            border-color: #007bff;
            /* Border color on focus */
        }

        .stock-left {
            display: flex;
            align-items: center;
            margin-left: 10px;
            font-size: 14px;
            color: #666;
            font-weight: bold;
            position: absolute;
            top: 355px;
            right: 380px;

        }

        .quantity-button.plus {
            margin-right: 10px;
        }

        .original-price-strikethrough {
            text-decoration: line-through;
            color: #888;
            font-size: 15px;
            margin-right: 10px;
        }

        .discounted-price {
            margin-right: 10px;
            display: flex;
            font-weight: bold;
            color: #E74C3C;
            position: relative;
            top: -49px;
            right: -160px;

        }

        .discount-percent {
            margin-right: 10px;
            display: flex;
            font-weight: bold;
            color: #E74C3C;
            position: static;
            top: -90px;
            right: -400px;
            font-size: 10px;
            padding-left: 10px;
        }

        .shopping {
            position: relative;
            text-align: right;
        }

        .shopping img {
            width: 25px;
            position: relative;
            left: -20px;
        }

        .shopping span {
            background: red;
            border-radius: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: absolute;
            top: -6px;
            left: -20%;
            right: 40px;
            font-size: 10px;
            padding: 3px 10px;
        }

        .card {
            position: fixed;
            top: 0;
            left: 100%;
            width: 500px;
            background-color: #453E3B;
            height: 100vh;
            transition: 0.5s;
        }

        .active .card {
            left: calc(100% - 500px);
        }

        .active .container {
            transform: translateX(-200px);
        }

        .card h1 {
            color: #E8BC0E;
            font-weight: 100;
            margin: 0;
            padding: 0 20px;
            height: 80px;
            display: flex;
            align-items: center;
        }

        .card .checkOut {
            position: absolute;
            bottom: 0;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);

        }

        .card .checkOut div {
            background-color: #E8BC0E;
            width: 100%;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            cursor: pointer;
        }

        .card .checkOut div:nth-child(2) {
            background-color: #1C1F25;
            color: #fff;
        }

        .listCard li {
            display: grid;
            grid-template-columns: 100px repeat(3, 1fr);
            color: #fff;
            row-gap: 10px;
        }

        .listCard li div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .listCard li img {
            width: 90%;
        }

        .listCard li button {
            background-color: #fff5;
            border: none;
        }

        .listCard .count {
            margin: 0 10px;
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
            <div class="shopping">
                <img src="pictures/shopping.svg">
                <span class="quantity">0</span>
            </div>
        </div>

        <div class="images">
            <?php
            while ($row = $result->fetch_assoc()) {
                $productId = $row["product_id"];
                $productName = $row["product_name"];
                $productQuantity = $row["product_quantity"];
                $discountPercent = $row["discount_price"];
                $productStockAmount = $row["stock_amount"];
                $productDescription = $row["product_desc"];
                $productRating = $row["product_rating"];
                $productSize = $row["product_size"];
                $productColorOptions = explode(', ', $row["product_color"]);

                ?>
                <div class="product-container">
                    <div class="product-image">
                        <img id="mainImage" src="pictures/Motowolf gloves.jpeg" alt="Motowolf gloves">
                        <div class="image-slider">
                            <button class="slider-button prev-button" onclick="prevImage()"><i
                                    class="bx bx-chevron-left"></i></button>
                            <img class="thumbnail" src="thumbnail/Motowolf image 1.jpeg" alt="Thumbnail 1">
                            <img class="thumbnail" src="thumbnail/Motowolf image 2.jpeg" alt="Thumbnail 2">
                            <img class="thumbnail" src="thumbnail/Motowolf image 3.jpeg" alt="Thumbnail 3">
                            <img class="thumbnail" src="thumbnail/Motowolf image 4.jpeg" alt="Thumbnail 4">
                            <img class="thumbnail" src="thumbnail/Motowolf image 5.jpeg" alt="Thumbnail 5">
                            <button class="slider-button next-button" onclick="nextImage()"><i
                                    class="bx bx-chevron-right"></i></button>
                        </div>
                    </div>




                    <div class="product-details">
                        <h1 class="product-title">
                            <?= $productName ?>
                        </h1>

                        <p class="product-price">
                        <h2 class="original-price-strikethrough" id="originalPrice">RM69.00-RM85.00</h2>
                        <h2 class="discounted-price" id="discountPrice">RM50.00-RM75.00</h2>
                        <h2 class="discount-percent">
                            <?= $discountPercent ?>
                        </h2>
                        </p>

                        <p>Quantity:
                            <button class="quantity-button minus">-</button>
                            <input type="text" class="quantity-input" value="<?= $productQuantity ?>" readonly>
                            <button class="quantity-button plus">+</button>
                        <h2 class="stock-left">
                            <?= $productStockAmount ?>
                        </h2>
                        </p>


                        <h2>Color</h2>
                        <select id="colorSelector" onchange="updatePrice()">
                            <option value="Black">Black</option>
                            <option value="Grey">Grey</option>
                            <option value="Red">Red</option>
                            <!-- Add more color options here -->
                        </select>

                        <h2>Size</h2>
                        <select id="sizeSelector" onchange="updatePrice()">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <!-- Add more size options here -->
                        </select>

                        <div class="button-container">
                            <button type="button" class="add-to-cart-button"
                                onclick="addToCart('G001','Motowolf Gloves', 'pictures/Motowolf gloves.jpeg', 'RM69.00', 'Black', 'S', '1')">Add
                                to
                                Cart</button>
                            <button type="button" class="buy-now-button" onclick="redirectToCheckout()">Buy now</button>
                        </div>

                        <h2>Description</h2>
                        <p>
                            <?= $productDescription ?>
                        </p>

                        <h2>Rating</h2>
                        <div class="product-rating">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class='bx bxs-star-half' ></i>
                            <i class="bx bx-star"></i>
                            <i class="bx bx-star"></i>
                            <?= $productRating ?>
                        </div>
                        <button type="button" id="view_ratings" class="btn btn-primary">View Ratings</button>


                    </div>



                </div>

                <?php
            }
            ?>
        </div>

        <div class="card">
            <h1>Add to Cart</h1>
            <button class="clear-button" onclick="clearCart()">Clear All</button>
            <ul class="listCard">
            </ul>
            <div class="checkOut">
                <div class="total">0</div>
                <div class="closeShopping">Close</div>
            </div>
        </div>


        <center>







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
        // Function to handle color change
        function handleColorChange(selectElement) {
            // Get the selected color value
            const selectedColor = selectElement.value;
            alert('Selected color: ' + selectedColor);
        }
    </script>



    <script>
        document.querySelectorAll('.product-container').forEach((productContainer) => {
            const quantityInput = productContainer.querySelector('.quantity-input');
            const minusButton = productContainer.querySelector('.quantity-button.minus');
            const plusButton = productContainer.querySelector('.quantity-button.plus');

            // Event listener for minus button click
            minusButton.addEventListener('click', () => {
                let quantity = parseInt(quantityInput.value);
                if (quantity > 1) {
                    quantity -= 1;
                    quantityInput.value = quantity;
                }
            });

            // Event listener for plus button click
            plusButton.addEventListener('click', () => {
                let quantity = parseInt(quantityInput.value);
                quantity += 1;
                quantityInput.value = quantity;
            });
        });
    </script>

    <script>
        const mainImage = document.getElementById("mainImage");
        const thumbnails = document.querySelectorAll(".thumbnail");

        // Store the original mainImage source
        const originalImageSrc = mainImage.src;

        // Add a click event listener to each thumbnail
        thumbnails.forEach((thumbnail) => {
            thumbnail.addEventListener("click", function () {
                // Store the current mainImage source before changing it
                const previousImageSrc = mainImage.src;

                // Set the mainImage source to the clicked thumbnail's source
                mainImage.src = thumbnail.src;

                // Set a click event on the mainImage to allow going back to the original image
                mainImage.addEventListener("click", function () {
                    mainImage.src = originalImageSrc; // Restore the original image
                });

                // Optionally, you can update the alt text as well
                mainImage.alt = thumbnail.alt;
            });
        });
    </script>

    <script>
        // Get references to the quantity input and stock left span
        const quantityInput = document.querySelector('.quantity-input');
        const stockLeftSpan = document.querySelector('.stock-left');

        // Initial stock value
        let stockLeft = <?= $productQuantity ?>;

        // Function to update the stock left and input value
        function updateStockAndInput() {
            quantityInput.value = stockLeft;
            stockLeftSpan.textContent = `Stock Left: ${stockLeft}`;
        }

        // Event listener for the plus button
        document.querySelector('.quantity-button.plus').addEventListener('click', () => {
            if (stockLeft > 0) {
                stockLeft--;
                updateStockAndInput();
            }
        });

        // Event listener for the minus button
        document.querySelector('.quantity-button.minus').addEventListener('click', () => {
            if (stockLeft < <?= $productQuantity ?>) {
                stockLeft++;
                updateStockAndInput();
            }
        });
    </script>

    <script>
        let currentImage = 1;

        function showImage(index) {
            currentImage = index;
            const mainImage = document.getElementById('mainImage');
            mainImage.src = `thumbnail/Nike image ${index}.jpeg`;
        }

        function prevImage() {
            if (currentImage > 1) {
                currentImage--;
                showImage(currentImage);
            }
        }

        function nextImage() {
            if (currentImage < 5) { // Adjust the number based on the total number of thumbnail images
                currentImage++;
                showImage(currentImage);
            }
        }


    </script>

    <script>
        function updatePrice() {
            const colorSelector = document.getElementById('colorSelector');
            const sizeSelector = document.getElementById('sizeSelector');
            const originalPriceDisplay = document.getElementById('originalPrice');
            const discountPriceDisplay = document.getElementById('discountPrice');

            // Define price adjustments based on color and size
            const priceMap = {
                'Black': {
                    'S': { original: 69.00, discounted: 50.00 },
                    'M': { original: 75.00, discounted: 65.00 },
                    'L': { original: 85.00, discounted: 75.00 },
                },
                'Red': {
                    'S': { original: 69.00, discounted: 50.00 },
                    'M': { original: 75.00, discounted: 65.00 },
                    'L': { original: 85.00, discounted: 75.00 },
                },
                'Green': {
                    'S': { original: 69.00, discounted: 50.00 },
                    'M': { original: 75.00, discounted: 65.00 },
                    'L': { original: 85.00, discounted: 75.00 },
                },
            };

            const selectedColor = colorSelector.value;
            const selectedSize = sizeSelector.value;

            // Get the price adjustments from the priceMap
            const priceAdjustments = priceMap[selectedColor][selectedSize];

            const discountedPrice = priceAdjustments.discounted;

            // Display the updated prices
            originalPriceDisplay.textContent = 'RM ' + priceAdjustments.original.toFixed(2);
            discountPriceDisplay.textContent = 'RM ' + priceAdjustments.discounted.toFixed(2);

            return discountedPrice;
        }




    </script>


    <script>
        const quantityInput = document.querySelector('.quantity-input');
        const stockLeftSpan = document.getElementById('stockQuantity');
        let stockLeft = <?= $productQuantity ?>; // Initialize stock with the available quantity

        // Function to update the stock quantity displayed
        function updateStockAndInput() {
            quantityInput.value = stockLeft;
            stockLeftSpan.textContent = stockLeft;
        }

        // Event listener for the plus button
        document.querySelector('.quantity-button.plus').addEventListener('click', () => {
            if (stockLeft > 0) {
                stockLeft--; // Decrease stock when increasing quantity
                updateStockAndInput();
            }
        });

        // Event listener for the minus button
        document.querySelector('.quantity-button.minus').addEventListener('click', () => {
            if (stockLeft < <?= $productQuantity ?>) {
                stockLeft++; // Increase stock when decreasing quantity
                updateStockAndInput();
            }
        });
    </script>

    <script>
        let openShopping = document.querySelector('.shopping');
        let closeShopping = document.querySelector('.closeShopping');
        let list = document.querySelector('.list');
        let listCard = document.querySelector('.listCard');
        let body = document.querySelector('body');
        let total = document.querySelector('.total');
        let quantity = document.querySelector('.quantity');

        openShopping.addEventListener('click', () => {
            body.classList.add('active');
        })
        closeShopping.addEventListener('click', () => {
            body.classList.remove('active');
        })

        let listCards = [];

        function addToCart(productId, productName, image, price) {
            const color = document.getElementById('colorSelector').value;
            const size = document.getElementById('sizeSelector').value;
            const quantity = parseInt(document.querySelector('.quantity-input').value);

            console.log('Adding to cart:', productId, productName, image, price, color, size, quantity);

            if (isNaN(price)) {
                // Handle cases where discountPrice is not a valid number, e.g., "RM85.00"
                const priceParts = price.split('RM');
                if (priceParts.length === 2) {
                    price = parseFloat(priceParts[1]);
                } else {
                    // Handle other cases here as needed
                }
            }

            const productDetails = {
                product_id: productId,
                product_name: productName,
                filepath: image,
                discount_product: price,
                product_color: color,
                product_size: size,
                product_quantity: quantity
            };

            console.log('Sending product details:', productDetails);

            fetch('insert_into_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(productDetails),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        const productDetails = {
                            image: mainImage,
                            product_id: productId,
                            product_name: productName,
                            filepath: image,
                            discount_product: price,
                            product_color: color,
                            product_size: size,
                            product_quantity: quantity
                        };
                        listCards.push(productDetails);
                        reloadCard();
                    } else {
                        console.error('Error inserting into cart:', data.error);
                    }
                })
                .catch((error) => console.error('Error inserting into cart:', error));
        }



        // Define the "reloadCard" function to display cart contents and total
        function reloadCard() {
            console.log('Reloading cart');
            listCard.innerHTML = '';
            let totalPrice = 0;
            let totalQuantity = 0;

            listCards.forEach((item, index) => {
                if (item && typeof item.discount_product === 'number' && !isNaN(item.discount_product) && typeof item.product_quantity === 'number' && !isNaN(item.product_quantity)) {
                    const itemTotal = item.discount_product * item.product_quantity;

                    let newDiv = document.createElement('li');
                    newDiv.innerHTML = `
                <div><img src="${item.filepath}" /></div>
                <div>${item.product_name}</div>
                <div>RM ${item.discount_product.toLocaleString()}</div>
                <div class="quantity-actions">
                    <button onclick="changeQuantity(${index}, ${item.product_quantity - 1})">-</button>
                    <div class="count">${item.product_quantity}</div>
                    <button onclick="changeQuantity(${index}, ${item.product_quantity + 1})">+</button>
                </div>
                <button onclick="removeProduct(${index})">Remove</button>
            `;
                    listCard.appendChild(newDiv);
                    totalPrice += itemTotal;
                    totalQuantity += item.product_quantity;
                }
            });


            // Update the total and quantity display
            total.innerText = 'Total: RM ' + totalPrice.toFixed(2);
            quantity.innerText = totalQuantity;
        }

        function changeQuantity(index, quantity) {
            if (quantity == 0) {
                listCards = splice(index, 1);
            } else if (quantity > 0) {
                listCards[index].product_quantity = quantity;
            }
            reloadCard();
        }

        function loadCartItems() {
            const storedCartItems = localStorage.getItem('cartItems');

            if (storedCartItems) {
                // If there are stored cart items, parse and assign them to listCards
                listCards = JSON.parse(storedCartItems);
                reloadCard(); // Update the cart display
            } else {
                // If there are no stored cart items, fetch the data from the server
                fetch('get_cart_items.php')
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            listCards = data.items;
                            reloadCard();

                            // Store the retrieved cart items in local storage for future use
                            localStorage.setItem('cartItems', JSON.stringify(listCards));
                        } else {
                            console.error('Error loading cart items:', data.error);
                        }
                    })
                    .catch((error) => console.error('Error loading cart items:', error));
            }
            loadCartItems();
        }

        function removeProduct(index) {
            // Remove the product from listCards
            listCards.splice(index, 1);
            // Reload the listCard to reflect the changes
            reloadCard();
        }

        function clearCart() {
            listCards = []; // Reset the listCards array
            reloadCard();   // Clear the listCard
        }

    </script>

    <script>
        // Assuming you have a product ID available as $productId
        const productId = 'G001';

        document.getElementById('view_ratings').addEventListener('click', function () {
            // Redirect to the "rating.php" page with the product identifier as a query parameter
            window.location.href = `rating.php?product=${productId}`;
        });
    </script>

    <script>
        function addToCart() {
            // Get selected product details from the page
            const mainImage = document.getElementById('mainImage').src;
            const productName = document.querySelector('.product-title').textContent;
            const discountPrice = document.getElementById('discountPrice').textContent;
            const quantity = parseInt(document.querySelector('.quantity-input').value);
            const color = document.getElementById('colorSelector').value;
            const size = document.getElementById('sizeSelector').value;

            // Create a new item for the cart
            const newItem = {
                image: mainImage,
                name: productName,
                price: discountPrice,
                quantity: quantity,
                color: color,
                size: size,
            };

            // Add the item to the cart
            listCards.push(newItem);

            // Refresh the cart display
            reloadCard();
        }

    </script>

    <script>
        function redirectToCheckout() {
            const checkoutPageURL = 'checkout_page.php';

            const productDetails = JSON.stringify(listCards);
            const queryString = `products=${encodeURIComponent(productDetails)}`;

            window.location.href = `${checkoutPageURL}?${queryString}`;
        }

    </script>



</html>