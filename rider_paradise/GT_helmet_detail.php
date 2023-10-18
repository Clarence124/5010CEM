<?php
include 'db_studentUsers.php';
session_start();

$productId = 4;

$sql = "SELECT product_id, filepath, product_name, product_price, product_color, product_quantity, product_desc, product_speci, product_rating FROM product WHERE product_id = $productId";
$result = $conn->query($sql);

if ($result === false) {
    die("Error: " . $conn->error);
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Helmet Detail</title>

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
        }

        .buy-now-button {
            display: block;
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
            /* Button background color on hover */
        }

        .quantity-button:active {
            transform: scale(0.95);
            /* Button scale on click */
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
            font-size: 14px;
            /* Adjust the font size as needed */
            color: #666;
            /* Choose your desired text color */
            margin-left: 10px;
            /* Add some spacing to the left of the text */
            font-weight: bold;
            /* Make the text bold if desired */
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
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="bx bx-search"></i></button>
            </form>
        </div>


        <div class="images">
            <?php
            while ($row = $result->fetch_assoc()) {
                $productId = $row["product_id"];
                $productName = $row["product_name"];
                $productPrice = $row["product_price"];
                $productQuantity = $row["product_quantity"];
                $productDescription = $row["product_desc"];
                $productSpecification = $row["product_speci"];
                $productRating = $row["product_rating"];
                $productColorOptions = explode(', ', $row["product_color"]);

                $productSpecs = explode(', ', $row["product_speci"]);


                $orderedSpecs = [];

                foreach ($productSpecs as $spec) {
                    list($key, $value) = explode(': ', $spec, 2); // Limit the explode to 2 parts
                    $orderedSpecs[$key] = $value;
                }

                ?>
                <!-- Display the product information -->
                <div class="product-container">
                    <div class="product-image">
                        <img id="mainImage" src="pictures/GDM Demon Helmet.jpg" alt="GDM Demon Helmet">
                        <div class="image-slider">
                            <button class="slider-button prev-button" onclick="prevImage()"><i
                                    class="bx bx-chevron-left"></i></button>
                            <img class="thumbnail" src="thumbnail/GDM image 1.jpg" alt="Thumbnail 1">
                            <img class="thumbnail" src="thumbnail/GDM image 2.jpg" alt="Thumbnail 2">
                            <img class="thumbnail" src="thumbnail/GDM image 3.jpg" alt="Thumbnail 3">
                            <img class="thumbnail" src="thumbnail/GDM image 4.jpg" alt="Thumbnail 4">
                            <img class="thumbnail" src="thumbnail/GDM image 5.jpg" alt="Thumbnail 5">
                            <button class="slider-button next-button" onclick="nextImage()"><i
                                    class="bx bx-chevron-right"></i></button>
                        </div>
                    </div>




                    <div class="product-details">
                        <button class="edit-button">Edit</button>
                        <h1 class="product-title">
                            <?= $productName ?>
                        </h1>
                        <p class="product-price">RM
                            <?= $productPrice ?>
                        </p>

                        <p>Quantity:
                            <button class="quantity-button minus">-</button>
                            <input type="text" class="quantity-input" value="<?= $productQuantity ?>" readonly>
                            <button class="quantity-button plus">+</button>

                        </p>

                        <h2>Color</h2>
                        <select name="productColor">
                            <?php
                            if (isset($productColorOptions)) {
                                foreach ($productColorOptions as $color) {
                                    echo '<option value="' . $color . '">' . $color . '</option>';
                                }
                            }
                            ?>
                        </select>

                        <button type="button" class="buy-now-button">Buy now</button>

                        <h2>Specifications</h2>
                        <p>
                            <?= $productSpecification ?>
                        </p>


                        <h2>Description</h2>
                        <p>
                            <?= $productDescription ?>
                        </p>

                        <h2>Rating</h2>
                        <div class="product-rating">
                            <i class="bx bx-star"></i>
                            <i class="bx bx-star"></i>
                            <i class="bx bx-star"></i>
                            <i class="bx bx-star"></i>
                            <i class="bx bx-star"></i>
                            <?= $productRating ?>
                        </div>
                        <button type="button" class="write-review">Write review</button>

                    </div>


                    <form class=" edit-form" style="display: none;">
                        <input type="text" name="newProductName" value="<?= $productName ?>">
                        <input type="text" name="newProductPrice" value="<?= $productPrice ?>">
                        <input type="text" name="newProductSpecification" value="<?= $productSpecification ?>">
                        <input type="text" name="newProductDescription" value="<?= $productDescription ?>">

                        <button type="button" class="save-button">Save</button>

                    </form>
                </div>
                <?php
            }
            ?>
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
        // JavaScript to toggle edit form visibility
        document.querySelectorAll('.edit-button').forEach((button) => {
            button.addEventListener('click', () => {
                const productContainer = button.closest('.product-container');
                productContainer.querySelector('.product-details').style.display = 'none';
                productContainer.querySelector('.edit-form').style.display = 'block';
            });
        });

        // Attach an event listener to each "Save" button
        document.querySelectorAll('.save-button').forEach((button) => {
            button.addEventListener('click', () => {
                const productContainer = button.closest('.product-container');
                const editForm = productContainer.querySelector('.edit-form');
                const productId = productContainer.dataset.productId; // Add a data attribute for the product ID

                // Collect updated data from the form
                const formData = new FormData(editForm);

                // Send updated data to the server using AJAX or Fetch
                fetch('/update_product.php', {
                    method: 'POST',
                    body: formData,
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            // Update the product detail display with the new data
                            const productTitle = productContainer.querySelector('.product-title');
                            const productPrice = productContainer.querySelector('.product-price');
                            const productSpecification = productContainer.querySelector('.Specifications');
                            const productDescription = productContainer.querySelector('.Description');

                            // Example: Update product title and price
                            productTitle.textContent = data.newProductName;
                            productPrice.textContent = 'RM ' + data.newProductPrice;
                            productSpecification.textContent = data.newProductSpecification;
                            productSpecification.textContent = data.newProductSpecification;

                            // Hide the edit form and show original data
                            editForm.style.display = 'none';
                            productContainer.querySelector('.product-details').style.display = 'block';
                        } else {
                            // Handle error if the update fails
                            console.error('Update failed:', data.error);
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
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
            mainImage.src = `thumbnail/GDM image ${index}.jpg`;
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



</html>