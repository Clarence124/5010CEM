<?php
session_start();
$shoppingCart = [];

if (isset($_GET['product_id']) && isset($_GET['productImage']) && isset($_GET['productName']) && isset($_GET['price']) && isset($_GET['color']) && isset($_GET['size'])) {
    $productId = $_GET['product_id'];
    $productImage = $_GET['productImage'];
    $productName = $_GET['productName'];
    $price = $_GET['price'];
    $color = isset($_GET['color']) ? $_GET['color'] : 'N/A';
    $size = isset($_GET['size']) ? $_GET['size'] : 'N/A';

    $_SESSION['shoppingCart'][] = [
        'product_id' => $productId,
        'productImage' => $productImage,
        'productName' => $productName,
        'price' => $price,
        'color' => $color,
        'size' => $size,
        'quantity' => 1,
    ];
}

$shoppingCart = isset($_SESSION['shoppingCart']) ? $_SESSION['shoppingCart'] : []

    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Checkout page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



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
            display: center;
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
            display: flex;
            flex-wrap: wrap;
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

        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
            position: absolute;
            top: 80px;
            right: -0px;

        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
            width: 50%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
            width: 600px;
        }

        .container1 {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
            width: 400px;
            height: 400px;
        }

        input[type=text] {
            width: 80%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 15px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background: linear-gradient(to left, #99ccff 0%, #003399 100%);
            color: black;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 20px;
        }

        .btn:hover {
            background: linear-gradient(to left, #003399 0%, #99ccff 100%);
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th: text-align: left;

        .cart-table th,
        .cart-table td {
            padding: 8px;
            text-align: center;
        }

        .cart-table td {
            width: 25%;
            padding: 8px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

        }

        .cart-table td img {
            max-width: 100%;
        }

        .cart-table thead {
            background-color: #f2f2f2;
        }

        .cart-table th {
            font-weight: bold;
        }

        .cart-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .cart-image {
            max-width: 5%;
            height: 5%;
        }

        .cart-wrapper {
            max-width: 100%;
            overflow-x: auto;
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
            <li><a href="checkout_page.php"><i class="bx bx-gift"></i><span class="tooltip">Checkout</span>
                    <div class="item"> Checkout</div>
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
            <center>
                <h2>Shopping Cart</h2>
            </center>
        </div>

        <div class="images">
            <section class="container content-section" id="shopping-cart">

                <table class="table table-hover table-cart">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Discount Product</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="cart-items">
                        <?php foreach ($shoppingCart as $itemIndex => $item): ?>
                            <tr>
                                <td><img src="<?= $item['productImage']; ?>" alt="Product Image"></td>
                                <td>
                                    <?= $item['productName']; ?>
                                </td>
                                <td>RM
                                    <?= $item['price']; ?>
                                </td>
                                <td>
                                    <?= $item['color']; ?>
                                </td>
                                <td>
                                    <?= $item['size']; ?>
                                </td>
                                <td>
                                    <?= $item['quantity']; ?>
                                </td>
                                <td>
                                    <button class="remove-button black-remove-button"
                                        data-product-identifier="pictures/Nike_Jacket.jpg-Black-S-1">Remove</button>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="cart-total">
                    <strong class="cart-total-title">Total</strong>
                    <div class="cart-total-price" style="text-align: right;">$0</div>
                </div>
                <button id="clear-all-button">Clear All</button>



                <div class="btn-purchase" style="margin-top: 10%;">
                    <button type="button" class="btn btn-dark btn-purchase "><i class="fa-solid fa-cart-shopping "
                            style="margin-right: 6%;"></i>Checkout</button>
                </div>

            </section>




            <center>







            </center>

        </div>



    </div>


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
        let shoppingCart = [];

        // Remove button click event
        document.querySelectorAll('.black-remove-button').forEach(button => {
            button.addEventListener('click', (event) => {
                const productIdentifier = event.target.getAttribute('data-product-identifier');

                // Remove the row from the table
                const row = event.target.closest('tr');
                row.remove();

                // Update the cart display
                updateCartDisplay();
            });
        });



        document.addEventListener('DOMContentLoaded', function () {
            const clearAllButton = document.getElementById('clear-all-button');
            const cartTable = document.querySelector('.cart-items');

            const params = new URLSearchParams(window.location.search);
            const productDetails = getNewProductDetails(params); // Implement this function to extract new product details

            if (productDetails) {
                addToCart(productDetails);
            }

            clearAllButton.addEventListener('click', function () {
                console.log('Clear All button clicked');
                updateCartDisplay();
                clearShoppingCart();
                console.log('Shopping cart cleared');
            });

            // Function to clear the shopping cart
            function clearShoppingCart() {
                shoppingCart = []; // Clear the underlying shoppingCart data
                localStorage.removeItem('shoppingCart'); // Also clear data from local storage
                updateTotalPrice();
            }


            function addToCart(productDetails) {
                // Check if the product already exists in the cart
                const existingItem = shoppingCart.find(item =>
                    item.productImage === product.productImage &&
                    item.color === product.color &&
                    item.size === product.size
                );

                if (existingItem) {
                    existingItem.quantity += product.quantity;
                } else {
                    shoppingCart.push(product);
                }

                // Update the local storage
                localStorage.setItem('shoppingCart', JSON.stringify(shoppingCart));
            }
        });

        function updateCartDisplay() {
                const cartTable = document.querySelector('.cart-items');
                cartTable.innerHTML = '';

                shoppingCart.forEach(item => {
                    const row = cartTable.insertRow();
                    const imageCell = row.insertCell(0);
                    const nameCell = row.insertCell(1);
                    const discountCell = row.insertCell(2);
                    const colorCell = row.insertCell(3);
                    const sizeCell = row.insertCell(4);
                    const quantityCell = row.insertCell(5);

                    imageCell.innerHTML = `<img src="${item.productImage}" alt="${item.productName}">`;
                    nameCell.textContent = item.productName;
                    discountCell.textContent = item.price;
                    colorCell.textContent = item.color;
                    sizeCell.textContent = item.size;
                    quantityCell.textContent = item.quantity;

                });
                updateTotalPrice();
            }

            function updateTotalPrice() {
                const totalPriceElement = document.querySelector('.cart-total-price');
                const totalCartValue = shoppingCart.reduce((total, item) => {
                    return total + item.quantity * item.price;
                }, 0);
                totalPriceElement.textContent = `RM ${totalCartValue.toFixed(2)}`;

            }


    </script>

    <script>

    </script>


    <script>
        let shoppingCart = [];




        $uniqueProducts = array();
        $productQuantities = array();

        foreach($shoppingCart as $item) {
            $productIdentifier = $item['productImage']. '-'.$item['color']. '-'.$item['size'];

            if (!isset($productQuantities[$productIdentifier])) {
                $productQuantities[$productIdentifier] = 1;
                $uniqueProducts[] = $item;
            } else {
                $productQuantities[$productIdentifier]++;
            }
        }

        function loadCartItems() {
            fetch('get_cart_items.php') // Replace with the actual URL to fetch cart items
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        listCards = data.items; // Update the listCards with the fetched data
                        reloadCart();
                    } else {
                        console.error('Error loading cart items:', data.error);
                    }
                })
                .catch((error) => console.error('Error loading cart items:', error));
        }

        function reloadCart() {
            const cartTable = document.getElementById('cart-items').getElementsByTagName('tbody')[0];
            cartTable.innerHTML = ''; // Clear existing rows

            let totalPrice = 0;
            let totalQuantity = 0;

            listCards.forEach((item) => {
                let newRow = cartTable.insertRow(-1); // Append a new row
                let cell1 = newRow.insertCell(0); // Image
                let cell2 = newRow.insertCell(1); // Product Name
                let cell3 = newRow.insertCell(2); // Discount Product
                let cell4 = newRow.insertCell(3); // Quantity

                cell1.innerHTML = `<img src="${item.filepath}" />`;
                cell2.textContent = item.product_name;
                cell3.textContent = item.discount_product.toLocaleString();
                cell4.textContent = item.product_quantity;

                const discountValue = parseFloat(item.discount_product.replace('RM', ''));

                const itemTotal = discountValue * item.product_quantity;

                console.log(`Item Total: RM ${itemTotal.toFixed(2)}`)
                totalPrice += itemTotal;
                totalQuantity += item.product_quantity;
            });

            console.log(`Total Price: RM ${totalPrice.toFixed(2)}`);
            document.getElementById('cart-total').textContent = 'RM ' + totalPrice.toFixed(2);
            document.getElementById('cart-item-count').textContent = listCards.length;

        }



        // Call the function to load cart items when the page loads
        loadCartItems();
    </script>

</html>