-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 09:53 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amironlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` text NOT NULL,
  `brand_details` text NOT NULL,
  `brand_pic` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_details`, `brand_pic`) VALUES
(56, 'hp', 'hp', NULL),
(57, 'dell', 'dell', NULL),
(58, 'apple', 'apple', NULL),
(60, 'zara', 'zara collection', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_pro_name` text NOT NULL,
  `pro_id` int(11) NOT NULL,
  `cart_pro_qty` int(11) NOT NULL,
  `cart_pro_price` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_details` text NOT NULL,
  `cat_pic` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_details`, `cat_pic`) VALUES
(7, 'electronics', 'electronic ', NULL),
(8, 'electoron', 'ee', NULL),
(9, 'home', 'home', NULL),
(10, 'home', 'home', NULL),
(11, 'garden', 'garden', NULL),
(12, 'mens wear', 'all type of mens wera', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_name` text NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_pic` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `cust_pic`, `gender`) VALUES
(1, 'cust1', 'cus1@store.com', ';lkj', NULL, 'male'),
(2, 'adeel', 'adeel@gmail.com', '12345678', NULL, 'male'),
(3, 'adeel', 'adeel1122@gmail.com', '12345678', NULL, 'male'),
(4, 'abdul', 'mac@mac.com', '12345', NULL, 'male'),
(5, 'muneeb', 'muneeb@mac.com', '12345', NULL, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_p_price` int(11) NOT NULL,
  `pro_s_price` int(11) NOT NULL,
  `pro_pic` varchar(250) NOT NULL,
  `pro_code` varchar(100) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_details` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_p_price`, `pro_s_price`, `pro_pic`, `pro_code`, `pro_qty`, `pro_details`, `cat_id`, `brand_id`, `store_id`) VALUES
(32, 'suit', 2500, 3000, 'files/pic220623094359pmdownload.jpg', '12335562', 1000, 'a to z fine', 12, 60, 24),
(33, 'ad', 1200, 1500, 'files/pic220623053908pm46432939-15E3-4158-902E-ACAF5A94B454.jpeg', '1234', 9, 'qwqw', 7, 56, 26);

-- --------------------------------------------------------

--
-- Table structure for table `store_account`
--

CREATE TABLE `store_account` (
  `store_id` int(11) NOT NULL,
  `store_name` text NOT NULL,
  `store_username` text NOT NULL,
  `store_email` varchar(100) NOT NULL,
  `store_password` varchar(100) NOT NULL,
  `store_user_type` text NOT NULL,
  `store_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_account`
--

INSERT INTO `store_account` (`store_id`, `store_name`, `store_username`, `store_email`, `store_password`, `store_user_type`, `store_logo`) VALUES
(23, 'store1', 'store1', 'store1@store.com', 'store1', 'regular', NULL),
(24, 'adeel', 'adeel', 'adeelstore@adeel.a', '123456789', 'wholesale', NULL),
(25, 'store', 'storeuser', 'storeuser@store.com', ';lkj', 'regular', NULL),
(26, 'mac', 'mac', 'mac@mac.store', '12345', 'whole', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_idFK` (`cat_id`),
  ADD KEY `brand_idFK` (`brand_id`),
  ADD KEY `store_idFK` (`store_id`);

--
-- Indexes for table `store_account`
--
ALTER TABLE `store_account`
  ADD PRIMARY KEY (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `store_account`
--
ALTER TABLE `store_account`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brand_idFK` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_idFK` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `store_idFK` FOREIGN KEY (`store_id`) REFERENCES `store_account` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
