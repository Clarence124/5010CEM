-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 07:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inti_studentweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories_content`
--

CREATE TABLE `accessories_content` (
  `filepath` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `price` varchar(200) NOT NULL,
  `rating` float NOT NULL,
  `type` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories_content`
--

INSERT INTO `accessories_content` (`filepath`, `id`, `title`, `price`, `rating`, `type`) VALUES
('pictures/helmet.jpeg', 0, 'Helmet', '0', 0, ''),
('adminUploads/GDM Demon Helmet.jpg', 1, 'GDM Demon Full Face Motorcycle Helmet Matte Black', 'RM90', 0, 'helmet'),
('pictures/AD Helmet.jpeg', 2, 'AD Uncovered Helmet Motorcycle Helmet Light Four Seasons', 'RM100.00-RM130.00', 0, 'helmet');

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `product_id` varchar(100) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productName` char(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `color` char(30) NOT NULL,
  `size` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`product_id`, `productImage`, `productName`, `price`, `quantity`, `color`, `size`) VALUES
('G001', 'pictures/Motowolf gloves.jpeg', 'MOTOWOLF Motorcycle Riding Gloves MDL0325 Breathable Gloves', 'RM 69.00', 1, 'Black', 'S'),
('H001', 'pictures/AD Helmet.jpeg', 'AD Uncovered Helmet Motorcycle Helmet Light Four Season', 'RM90.00', 2, 'Black', 'M'),
('H002', 'pictures/GDM Demon Helmet.jpg', 'GDM Demon Motorcycle Helmet Full Face', 'RM 90.00', 1, 'Matte Black', 'S'),
('J001', 'pictures/Nike Jacket.jpg ', 'NIKE Jacket Waterproof Jaket Kalis Air Windbreaker Jaket Motor Unisex', 'RM 85.00', 1, 'Grey', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `uname`, `pass`) VALUES
(1, 'viknes', '1234'),
(3, 'priya', '3322'),
(6, 'ali', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `billing_payment`
--

CREATE TABLE `billing_payment` (
  `user_id` varchar(100) NOT NULL,
  `full_name` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` char(20) NOT NULL,
  `state` int(50) NOT NULL,
  `zip` int(50) NOT NULL,
  `card_name` char(100) NOT NULL,
  `card_no` int(100) NOT NULL,
  `exp_month` date NOT NULL,
  `exp_year` year(4) NOT NULL,
  `cvv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(20) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `payment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `filepath`, `uploaded_date`) VALUES
(5, 'Helmet', 'adminUploads/helmet.jpeg', '2023-09-20 14:51:30'),
(6, 'Jacket', 'adminUploads/jacket.jpg', '2023-09-21 11:55:01'),
(7, 'Gloves', 'adminUploads/gloves.jpeg', '2023-09-21 12:02:14'),
(8, 'Security lock ', 'pictures/Disk lock with alarm.jpeg', '2023-10-02 12:14:13'),
(9, 'Motorcycle camera', 'pictures/Action camera.jpeg', '2023-10-02 10:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dissc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `pname`, `email`, `dissc`) VALUES
(1, 'viknes', 'viki@gmail.com', 'ATTENTION..! Water will be disrupted from 1-5-2023 until 3-5-2023. Thank You..'),
(5, 'Darmen', 'darmen@gmail.com', 'The 28th INTIMA : Should you require any assistance, they are reachable via their email given above or social media @ics.intima on both Facebook and Instagram. Students are highly encouraged to follow the pages for updates on students\' activities.\n\nWith your cooperation and participation, we trust that our 28th INTIMA will do its best to bring many meaningful experiences to the year 2023 for our ICS community.\n\nThank you,\n\nStudent Services Department'),
(9, 'Carl', 'charlie@gmail.com', 'Student\'s Dress Code During Exam Period : Dear Students,\n\nKindly be reminded that the dress code, extracted below from your Student Handbook, will be strictly enforced during the examination period. Dear Students,\n\nKindly be reminded that the dress code, extracted below from your Student Handbook, will be strictly enforced during the examination period.\n\nStudents are expected to be decently dressed in proper attire when attending classes or attending any education-related matters. The following are considered improper and unacceptable by the College:\n\nRevealing clothes\n\nSinglets, hot pants, leggings and mini-skirts\n\nClothes with offensive or obscene wordings\n\nSlippers, sandals without heel straps\n\nDisplay of tattoo, body and facial piercings, or any type of body arts.'),
(10, 'Viknes', 'viknes@gmail.com', 'The Programming for Developers Final exam is held 24th July 2023.. Thank You!!'),
(11, 'Testing', 'testing@gmail.com', 'This is testing'),
(12, 'Example', 'Example@gmail.com', 'Example Video'),
(13, 'Hill', 'HILL@GMAIL.COM', 'this is a testing');

-- --------------------------------------------------------

--
-- Table structure for table `gloves`
--

CREATE TABLE `gloves` (
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `original_price` varchar(100) NOT NULL,
  `discount_product` varchar(100) NOT NULL,
  `discount_price` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `stock_amount` varchar(100) NOT NULL,
  `product_color` char(10) NOT NULL,
  `product_size` char(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_rating` int(10) NOT NULL,
  `category` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gloves`
--

INSERT INTO `gloves` (`product_id`, `product_name`, `original_price`, `discount_product`, `discount_price`, `product_quantity`, `stock_amount`, `product_color`, `product_size`, `product_desc`, `product_rating`, `category`) VALUES
('G001', 'MOTOWOLF Motorcycle Riding Gloves MDL0325 Breathable Gloves', 'RM69.00', 'RM50.00', '10% Off', 0, '200 pieces available', 'Black', 'S', 'Brand: MOTOWOLF\r\nModel: MDL0325\r\nSize: S/ M / L / XL \r\nColour: Black / Grey / Red \r\nMaterial: Microfible / EVA / Air layer\r\nApplicable Season: All Season', 3, 'jacket');

-- --------------------------------------------------------

--
-- Table structure for table `helmet`
--

CREATE TABLE `helmet` (
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `original_price` varchar(100) NOT NULL,
  `discount_product` varchar(100) NOT NULL,
  `discount_price` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `stock_amount` varchar(100) NOT NULL,
  `product_color` char(10) NOT NULL,
  `product_size` char(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_rating` int(10) NOT NULL,
  `category` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helmet`
--

INSERT INTO `helmet` (`product_id`, `product_name`, `original_price`, `discount_product`, `discount_price`, `product_quantity`, `stock_amount`, `product_color`, `product_size`, `product_desc`, `product_rating`, `category`) VALUES
('H001', 'AD Uncovered Helmet Motorcycle Helmet Light Four Seasons', 'RM110.00', 'RM90.00', '8% Off', 0, '200 pieces available', 'Black', 'M', 'AD Uncovered Helmet Motorcycle Helmet Light Four Seasons Universal Helmet Handsome Motorcycle Dual-use Helmet', 0, 'helmet'),
('H002', 'GDM Demon Motorcycle Helmet Full Face', 'RM101.00', 'RM90.00', '9% Off', 0, '100 pieces available', 'Matte Blac', 'S', 'DOT FMVSS-218 Certified - Includes 2 Shields (Visors), GDM DEMON Matte Black Full Face Motorcycle Helmet for Men & Women, Double D-ring chin strap with removable & washable liner and cheek pads - Aerodynamic shell design constructed using advanced lightweight composite poly-alloy, For Motorcycle, Cruiser, Street Bike, ATV, UTV, Scooter, Snowmobile, Personal Watercraft, & more', 0, 'helmet');

-- --------------------------------------------------------

--
-- Table structure for table `jacket`
--

CREATE TABLE `jacket` (
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `original_price` varchar(100) NOT NULL,
  `discount_product` varchar(100) NOT NULL,
  `discount_price` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `stock_amount` varchar(100) NOT NULL,
  `product_color` char(10) NOT NULL,
  `product_size` char(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_rating` int(10) NOT NULL,
  `category` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jacket`
--

INSERT INTO `jacket` (`product_id`, `product_name`, `original_price`, `discount_product`, `discount_price`, `product_quantity`, `stock_amount`, `product_color`, `product_size`, `product_desc`, `product_rating`, `category`) VALUES
('J001', 'NIKE Jacket Waterproof Jaket Kalis Air Windbreaker Jaket Motor Unisex', 'RM85.00', 'RM80.00', '5% Off ', 0, '100 pieces available', 'Black', 'S', 'Colour: Black / Red / Green \r\nSize: S / M / L / XL  \r\nSizing: Refer to the size chart\r\nOccasion: Casual / Travel / Hiking / Leisure Walk / Running Sport / Beach Play / Motorcyle Ride\r\n ❗️❗️ Small Cutting, Please check the size chart before place order ❗️❗️\r\n\r\n\r\n🔺Product Highlights🔻\r\n✅ Water proof windbreaker \r\n✅ Easily matched ➡ Perfect match for all types of shirts and pants\r\n✅ Multi occasions ➡ Can be wear for indoor such as hotel or cinema and outdoor such as camping or hiking\r\n✅ Comfortable fit ➡ Long Sleeve for sunny and rainy day\r\n✅ Suitable for both male and female\r\n✅ Side pockets ➡ Available for storing items\r\n✅ Raining-proof, Sun UV protection, wind proof, super quick dry\r\n✅ THICK MATERIAL - QUALITY GUARANTEED\r\n', 0, 'jacket');

-- --------------------------------------------------------

--
-- Table structure for table `motorcycle_camera`
--

CREATE TABLE `motorcycle_camera` (
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `original_price` varchar(100) NOT NULL,
  `discount_product` varchar(100) NOT NULL,
  `discount_price` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `stock_amount` varchar(100) NOT NULL,
  `product_color` char(10) NOT NULL,
  `product_size` char(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_rating` int(10) NOT NULL,
  `category` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `event_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`id`, `uname`, `event_id`) VALUES
(13, 'Carl', 1),
(16, 'viki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `product_name` char(100) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_discount` varchar(100) NOT NULL,
  `discount_percent` varchar(100) NOT NULL,
  `stock_amount` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `product_color` char(100) NOT NULL,
  `product_size` char(20) NOT NULL,
  `product_desc` text NOT NULL,
  `product_rating` int(10) NOT NULL,
  `product_type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `filepath`, `product_name`, `product_price`, `product_discount`, `discount_percent`, `stock_amount`, `product_quantity`, `product_color`, `product_size`, `product_desc`, `product_rating`, `product_type`) VALUES
(1, 'pictures/AD Helmet.jpeg', 'AD Uncovered Helmet Motorcycle Helmet Light Four Seasons', 'RM100.00-RM130.00', 'RM80-RM120', '8% Off', '200 pieces available', 0, 'Black', 'S', 'AD Uncovered Helmet Motorcycle Helmet Light Four Seasons Universal Helmet Handsome Motorcycle Dual-use Helmet', 0, 'accessorie'),
(2, 'pictures/GDM Demon Helmet.jpg', 'GDM Demon Motorcycle Helmet Full Face', 'RM100.99-RM200.00', '', '', '100 pieces available', 0, 'Matte Black \r\n', 'M', 'DOT FMVSS-218 Certified - Includes 2 Shields (Visors),\r\nGDM DEMON Matte Black Full Face Motorcycle Helmet for Men & Women,\r\nDouble D-ring chin strap with removable & washable liner and cheek pads - Aerodynamic shell design constructed using advanced lightweight composite poly-alloy,\r\nFor Motorcycle, Cruiser, Street Bike, ATV, UTV, Scooter, Snowmobile, Personal Watercraft, & more,', 0, 'accessorie'),
(3, 'pictures/BYE Helmet.jpeg', 'BYE Motorcycle Open Half Face Helmet chopper Scooter Helmet Double Lenses', 'RM135.00', '', '', '100 pieces available', 0, 'White, Red', 'S, M, L', 'Item Type: Helmets\r\nGender: Unisex\r\nSize:Free Size（55-60cm）Suit for most of people\r\nHelmet Style: Half Helmet\r\nQuality Certificate: Dot\r\nHelmet Material: Abs\r\nWeight: 1.5kg\r\nApplicable for models: Motorcycle, Motorbike, Cruiser, Touring, Chopper, Scooter, Street Moto\r\nItems Type: Motorycele Helmet, Protection Guard, Biker Protective Gear, Protectors\r\nProduct Type: Motorcycle Equipment, Racing Riding Helmet, Classic Retro Vintage\r\nSuitable For The Crowd: Unisex, Men, Women, Male, Female\r\nSeason: Spring, Summer, Autumn, Winter\r\nFit: Helmet Motorcycle, Moto Helmet, Motocross Helmet, Casco Moto\r\nModel Number: HF-256\r\nColors: Black, Red, Black, White, Green, Dumb black', 0, 'accessorie');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010),
(9, 'ronaldo', 1, 'Worst product !!', 1698737721);

-- --------------------------------------------------------

--
-- Table structure for table `security lock`
--

CREATE TABLE `security lock` (
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `original_price` varchar(100) NOT NULL,
  `discount_product` varchar(100) NOT NULL,
  `discount_price` varchar(100) NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `stock_amount` varchar(100) NOT NULL,
  `product_color` char(10) NOT NULL,
  `product_size` char(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_rating` int(10) NOT NULL,
  `category` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `security_lock`
--

CREATE TABLE `security_lock` (
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `product_color` char(10) NOT NULL,
  `product_size` char(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_rating` int(10) NOT NULL,
  `category` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `product_id` varchar(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `stock_available` varchar(20) NOT NULL,
  `product_category` char(30) NOT NULL,
  `sales_amount` int(100) NOT NULL,
  `last_updated_stock_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userpaymentdetails`
--

CREATE TABLE `userpaymentdetails` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnum` varchar(255) NOT NULL,
  `expyear` varchar(255) NOT NULL,
  `expmonth` varchar(255) NOT NULL,
  `cvvcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userpaymentdetails`
--

INSERT INTO `userpaymentdetails` (`id`, `fullname`, `address`, `email`, `city`, `state`, `zip`, `cardname`, `cardnum`, `expyear`, `expmonth`, `cvvcode`) VALUES
(2, 'vikii', 'Penang', 'viki@gmail.com', 'Penang', 'KL', '19453', 'viknes', '4321432143214321', '25', '01', '123'),
(3, '', '', '', '', '', '', '', '', '', '', ''),
(4, 'yi bing', 'asdad', 'ybing@gmail.com', 'kl', 'kl', '12432', 'yibing', '2342433424323478', '25', '09', '123'),
(5, 'viknes', 'asd', 'viki@gmasid', 'kl', 'kl', '12344', 'viki', '0987098908098092', '27', '03', '221');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` int(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pname`, `uname`, `email`, `pnumber`, `userpass`, `cpass`, `address1`, `gender`) VALUES
(1, 'Paris', 'viki', 'viki@gmail.com', 192381093, '1234', '1234', 'Penang', '-Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories_content`
--
ALTER TABLE `accessories_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gloves`
--
ALTER TABLE `gloves`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `helmet`
--
ALTER TABLE `helmet`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `jacket`
--
ALTER TABLE `jacket`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `userpaymentdetails`
--
ALTER TABLE `userpaymentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userpaymentdetails`
--
ALTER TABLE `userpaymentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
