<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation</title>

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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href= " https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel='spreadsheet'>
    <link href= "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel='spreadsheet'>
    
   



    <style type="text/css">
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

        body {
            background-color: #ffe8d2;
            font-family: 'Montserrat', sans-serif
        }

        .card {
            border: none
        }

        .logo {
            background-color: #eeeeeea8
        }

        .totals tr td {
            font-size: 13px
        }

        .footer {
            background-color: #eeeeeea8
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #dedbdb
        }

        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            background-color: #ffe8d2;
            font-family: 'Montserrat', sans-serif
        }

        .card {
            border: none
        }

        .logo {
            background-color: #eeeeeea8
        }

        .totals tr td {
            font-size: 13px
        }

        .footer {
            background-color: #eeeeeea8
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #dedbdb
        }
    </style>
</head>
</style>
</head>
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
            <h2>Checkout</h2>
        </center>
    </div>

    <div class="images">
        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="text-left logo p-2 px-5"> <img src="https://i.imgur.com/2zDU056.png" width="50">
                        </div>
                        <div class="invoice p-5">
                            <h5>Your order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello,
                                Chris</span> <span>You order has been confirmed and will be shipped in next two
                                days!</span>
                            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Order Date</span>
                                                    <span>12 Jan,2018</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Order No</span>
                                                    <span>MT12332345</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Payment</span>
                                                    <span><img
                                                            src="https://img.icons8.com/color/48/000000/mastercard.png"
                                                            width="20" /></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Shiping
                                                        Address</span> <span>414 Advert Avenue, NY,USA</span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td width="20%"> <img src="https://i.imgur.com/u11K1qd.jpg" width="90">
                                            </td>
                                            <td width="60%"> <span class="font-weight-bold">Men's Sports cap</span>
                                                <div class="product-qty"> <span class="d-block">Quantity:1</span>
                                                    <span>Color:Dark</span>
                                                </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right"> <span class="font-weight-bold">$67.50</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%"> <img src="https://i.imgur.com/SmBOua9.jpg" width="70">
                                            </td>
                                            <td width="60%"> <span class="font-weight-bold">Men's Collar T-shirt</span>
                                                <div class="product-qty"> <span class="d-block">Quantity:1</span>
                                                    <span>Color:Orange</span>
                                                </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right"> <span class="font-weight-bold">$77.50</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-5">
                                    <table class="table table-borderless">
                                        <tbody class="totals">
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Subtotal</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>$168.50</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Shipping Fee</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>$22</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Tax Fee</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>$7.65</span> </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span class="text-muted">Discount</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span class="text-success">$168.50</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left"> <span
                                                            class="font-weight-bold">Subtotal</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span
                                                            class="font-weight-bold">$238.50</span> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                            <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>Nike Team</span>
                        </div>
                        <div class="d-flex justify-content-between footer p-3"> <span>Need Help? visit our <a href="#">
                                    help center</a></span> <span>12 June, 2020</span> </div>
                    </div>
                </div>
            </div>
        </div>



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

            cell1.innerHTML = `<img src="${item.productImage}" />`;
            cell2.textContent = item.productName;
            cell3.textContent = item.price.toLocaleString();
            cell4.textContent = item.quantity;

            const discountValue = parseFloat(item.price.replace('RM', ''));

            const itemTotal = discountValue * item.quantity;

            console.log(`Item Total: RM ${itemTotal.toFixed(2)}`)
            totalPrice += itemTotal;
            totalQuantity += item.quantity;
        });

        console.log(`Total Price: RM ${totalPrice.toFixed(2)}`);
        document.getElementById('cart-total').textContent = 'RM ' + totalPrice.toFixed(2);
        document.getElementById('cart-item-count').textContent = listCards.length;

    }



    // Call the function to load cart items when the page loads
    loadCartItems();
</script>

</html>