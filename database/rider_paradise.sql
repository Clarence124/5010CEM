-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 06:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rider_paradise`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `uname`, `pass`) VALUES
(1, 'yi bing', '123'),
(2, 'clarence', '121');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `product_id` int(100) NOT NULL,
  `product_name` char(100) NOT NULL,
  `stock_available` varchar(20) NOT NULL,
  `product_category` char(30) NOT NULL,
  `sales_amount` int(100) NOT NULL,
  `last_updated_stock_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `months` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`product_id`, `product_name`, `stock_available`, `product_category`, `sales_amount`, `last_updated_stock_date`, `months`, `year`) VALUES
(11, 'Gorilla', '100', 'GoPro', 14, '2023-11-01 10:14:15', 'January', '2022'),
(12, 'Gorilla Gloves', '48', 'Gloves', 13, '2023-11-01 10:14:19', 'March', '2023'),
(13, 'Solex Premium Bike Handle Lock', '44', 'Handle Lock', 24, '2023-10-31 06:02:59', 'October', '2022'),
(15, 'Gorilla Helmet', '77', 'Helmet', 56, '2023-10-31 06:07:37', 'November', '2023'),
(18, 'Body Glove Heavy Duty - Hard Leather Jacket', '170', 'Jacket', 78, '2023-11-01 06:06:34', 'September', '2022'),
(19, 'Alpinestars Copper Motorcycle Gloves', '109', 'Gloves', 48, '2023-11-13 16:24:40', 'December', '2022'),
(20, 'Alpinestars T-SP-1 Waterproof Motorcycle Textile Jacket', '88', 'Jacket', 16, '2023-11-16 23:35:24', 'September', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `cardname` varchar(255) NOT NULL,
  `cardnum` varchar(255) NOT NULL,
  `expmonth` varchar(255) NOT NULL,
  `expyear` varchar(255) NOT NULL,
  `cvvcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `fullname`, `uname`, `email`, `pnumber`, `pass`, `cpass`, `address`, `city`, `state`, `zip`, `cardname`, `cardnum`, `expmonth`, `expyear`, `cvvcode`) VALUES
(1, 'asdad', 'viki', 'asdad@asdas', '0', '123', '123', 'asd', '', '', '', '', '', '', '', ''),
(2, 'vikii', 'vikii', 'vikii1232gmail.com', '67867', '1122', '1122', 'Kuala Lumpur', '', '', '', '', '', '', '', ''),
(3, 'Clarence', 'clarence', 'clarence@gmail.com', '12', '112', '112', 'Penang', '', '', '', '', '', '', '', ''),
(4, 'yi bing', 'ybing', 'ybing@gmail.com', '12', '321', '321', 'Penang', '', '', '', 'yi bing', '', '', '', ''),
(5, 'testviki', 'testviki', 'viki@ghfgh', '12', '123', '123', 'kl', '', '', '', '', '', '', '', ''),
(6, 'nila', 'nilaa', 'nilaa@gmail.com', '12', '1212', '1212', 'Ipoh', '', '', '', '', '', '', '', '');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpaymentdetails`
--
ALTER TABLE `userpaymentdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userpaymentdetails`
--
ALTER TABLE `userpaymentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
