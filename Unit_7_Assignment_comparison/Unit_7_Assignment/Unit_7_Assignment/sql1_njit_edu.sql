-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Oct 20, 2023 at 05:06 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nam`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Guitars'),
(2, 'Basses'),
(3, 'Drums');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productCode` varchar(10) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `listPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `listPrice`) VALUES
(1, 1, 'strat', 'Fender Stratocaster', 699.00),
(2, 1, 'les_paul', 'Gibson Les Paul', 1199.00),
(3, 1, 'sg', 'Gibson SG', 2517.00),
(4, 1, 'fg700s', 'Yamaha FG700S', 489.99),
(5, 1, 'washburn', 'Washburn D10S', 299.00),
(6, 1, 'rodriguez', 'Rodriguez Caballero 11', 415.00),
(7, 2, 'precision', 'Fender Precision', 799.99),
(8, 2, 'hofner', 'Hofner Icon', 499.99),
(9, 3, 'ludwig', 'Ludwig 5-piece Drum Set with Cymbals', 699.99),
(10, 3, 'tama', 'Tama 5-Piece Drum Set with Cymbals', 799.99);

-- --------------------------------------------------------

--
-- Table structure for table `shoecategories`
--

CREATE TABLE IF NOT EXISTS `shoecategories` (
`shoeCategoryID` int(11) NOT NULL,
  `shoeCategoryName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shoecategories`
--

INSERT INTO `shoecategories` (`shoeCategoryID`, `shoeCategoryName`, `dateAdded`) VALUES
(1, 'Slippers', '2023-10-17 18:54:14'),
(2, 'Uggs', '2023-10-17 18:54:14'),
(3, 'Loafers', '2023-10-17 18:54:14'),
(4, 'Sneakers\r\n', '2023-10-17 18:54:14'),
(5, 'Boots\r\n', '2023-10-17 18:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE IF NOT EXISTS `shoes` (
`shoeID` int(11) NOT NULL,
  `shoeCategoryID` int(11) NOT NULL,
  `shoeCode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `shoeName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=9877 ;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoeID`, `shoeCategoryID`, `shoeCode`, `shoeName`, `description`, `price`, `dateAdded`) VALUES
(2747, 3, '7528', 'Dark Brown Loafers', 'Stunning & Charming Dark Brown Horse Leather Loafers', 2000.99, '2023-10-17 20:13:58'),
(2817, 4, '6754', 'Yellow Yeezys', 'Sleek & Stylish Yellow Yeezys', 140.99, '2023-10-17 19:38:10'),
(2938, 5, '1053', 'Brown Leather Cowboy Boots', 'Artisnally Crafted Brown Leather Cowboy Boots', 135.99, '2023-10-17 19:51:59'),
(2945, 4, '3768', 'Red Air Jordans', 'Aerodynamically Efficient Red Air Jordans', 100.99, '2023-10-17 19:38:10'),
(4241, 4, '1123', 'Black Sports Nike''s', 'Lightning fast Black Nike''s', 50.99, '2023-10-17 19:38:10'),
(4333, 2, '9111', 'Brown Winter Uggs', 'Comfortable & Cozy Brown Winter Uggs', 50.99, '2023-10-17 19:44:38'),
(4351, 1, '8799', 'Wool Slippers', 'German Engineered Wool Slippers', 55.49, '2023-10-17 20:05:37'),
(5102, 2, '6554', 'Swedish Black Uggs', 'Seasonal & Festive Swedish Crafted black Uggs', 99.99, '2023-10-17 19:44:38'),
(7119, 3, '3399', 'Purple Loafers', 'Comfy & Elegant Purple New Hampshire Loafers', 200.99, '2023-10-17 20:13:58'),
(7609, 5, '3483', 'Tactical Combat Boots', 'Compact, Sturdy & Durable Tactical Combat Boots', 50.99, '2023-10-17 19:51:59'),
(7849, 2, '2001', 'Red Christmas Uggs', 'Delightful & Fuzzy Red Christmas Uggs', 89.99, '2023-10-17 19:44:38'),
(8894, 5, '3255', 'Brown Outdoor Timberlands', 'Earthern Brown Colored Outdoor Timberlands', 99.99, '2023-10-17 19:51:59'),
(9444, 1, '2220', 'Desert Sandles', 'Turkish-Arabic Crafted Desert Sandles', 150.99, '2023-10-17 20:05:37'),
(9864, 3, '9999', 'Black Loafers', 'Luxurious & Affluent Black Gucci Loafers', 1500.99, '2023-10-17 20:13:58'),
(9876, 1, '6789', 'Yellow Flip Flops', 'Tropical & refreshing Yellow Summer Flip Flops', 23.99, '2023-10-17 20:05:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`productID`), ADD UNIQUE KEY `productCode` (`productCode`);

--
-- Indexes for table `shoecategories`
--
ALTER TABLE `shoecategories`
 ADD PRIMARY KEY (`shoeCategoryID`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
 ADD PRIMARY KEY (`shoeID`), ADD UNIQUE KEY `shoeCode` (`shoeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shoecategories`
--
ALTER TABLE `shoecategories`
MODIFY `shoeCategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
MODIFY `shoeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9877;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
