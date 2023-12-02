-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Dec 02, 2023 at 12:10 AM
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
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
`adminID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'admin@myshoeshop.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Admin', 'User'),
(2, 'joel@myshoeshop.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Joel', 'Murach'),
(3, 'mike@myshoeshop.com', '$2y$10$xIqN2cVy8HVuKNKUwxFQR.xRP9oRj.FF8r52spVc.XCaEFy7iLHmu', 'Mike', 'Murach');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=15 ;

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
(10, 3, 'tama', 'Tama 5-Piece Drum Set with Cymbals', 799.99),
(11, 2, '114', 'Yamaha P-525 Piano-2', 200.00),
(12, 1, 'hello', 'hello', 120.00),
(13, 2, 'test2', 'test2', 199.99),
(14, 1, 'bye', 'bye', 120.00);

-- --------------------------------------------------------

--
-- Table structure for table `shoeManagers`
--

CREATE TABLE IF NOT EXISTS `shoeManagers` (
`shoeManagerID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `shoeManagers`
--

INSERT INTO `shoeManagers` (`shoeManagerID`, `emailAddress`, `password`, `firstName`, `lastName`) VALUES
(1, 'nat_g@myshoestore.com', '$2y$10$r1ViAx/wO9sHDcSN.X52yOc8CelAUxBzO3u41XxxJenOdkxRkgPBy', 'Natalie', 'Graham'),
(2, 'G_Anderson@myshoestore.com', '$2y$10$zvpdA8onny73G7N7aIqi9.OnYrT2hYJzOoyMnS3SFD4FAWGh113bS', 'Gerard', 'Anderson'),
(3, 'l_meyers@myshoestore.com', '$2y$10$mds4JjLoEc9pt9gQ5Lm2AukF6mAip9EIOX2rswxpCgD9FlsBEPjXW', 'Lisa', 'Meyers');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=2147064934 ;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoeID`, `shoeCategoryID`, `shoeCode`, `shoeName`, `description`, `price`, `dateAdded`) VALUES
(11, 1, '11', 'Rubber Ducky Bath Slippers', 'Yellow, Squeaky, & Adorable Rubber Ducky Bath Slippers', 34.99, '2023-11-05 18:36:57'),
(12, 1, '12', 'SuperSlippers', 'Supergirl Sally''s Super Slippers', 23.99, '2023-11-05 20:02:22'),
(13, 1, '13', 'Yellow Flip Flops', 'Tropical & refreshing Yellow Summer Flip Flops', 23.99, '2023-10-17 20:05:37'),
(14, 1, '14', 'Desert Sandles', 'Turkish-Arabic Crafted Desert Sandles', 150.99, '2023-10-17 20:05:37'),
(21, 2, '21', 'Red Christmas Uggs', 'Delightful & Fuzzy Red Christmas Uggs', 89.99, '2023-10-17 19:44:38'),
(22, 2, '22', 'Baby Uggs', 'Soft, Fluffy & Comfortable Baby Uggs', 23.44, '2023-11-05 18:34:21'),
(23, 2, '23', 'Swedish Black Uggs', 'Seasonal & Festive Swedish Crafted black Uggs', 99.99, '2023-10-17 19:44:38'),
(24, 2, '24', 'Brown Winter Uggs', 'Comfortable & Cozy Brown Winter Uggs', 50.99, '2023-10-17 19:44:38'),
(25, 2, '25', 'Water Mellon Dream Uggs', 'Red & Juicy Water Mellon Uggs', 34.99, '2023-11-29 19:20:31'),
(31, 3, '31', 'Black Loafers', 'Luxurious & Affluent Black Gucci Loafers', 1500.99, '2023-10-17 20:13:58'),
(32, 3, '32', 'Penny Pincher Loafers', 'Mr Krabs''s Penny Pinching Pretty Loafers', 23.99, '2023-11-05 20:04:08'),
(33, 3, '33', 'Daphne Loafers', 'Daphne Loafers', 23.44, '2023-11-05 22:39:23'),
(34, 3, '34', 'Purple Loafers', 'Comfy & Elegant Purple New Hampshire Loafers', 200.99, '2023-10-17 20:13:58'),
(35, 3, '35', 'Dark Brown Loafers', 'Stunning & Charming Dark Brown Horse Leather Loafers', 2000.99, '2023-10-17 20:13:58'),
(41, 4, '41', 'YoGabbaGabba Yeezys', 'Yellow Yummy YoGabbaGabba Yeezys', 23.99, '2023-11-05 20:06:04'),
(42, 4, '42', 'Yellow Yeezys', 'Sleek & Stylish Yellow Yeezys', 140.99, '2023-10-17 19:38:10'),
(43, 4, '43', 'Red Air Jordans', 'Aerodynamically Efficient Red Air Jordans', 100.99, '2023-10-17 19:38:10'),
(44, 4, '44', 'Black Sports Nike''s', 'Lightning fast Black Nike''s', 50.99, '2023-10-17 19:38:10'),
(51, 5, '51', 'Adidas GSG-9 Tv Tactical Boots', 'German Engineered GSG-9 Tactical Boots', 1000.99, '2023-11-05 18:38:59'),
(52, 5, '52', 'Brown Leather Cowboy Boots', 'Artisnally Crafted Brown Leather Cowboy Boots', 135.99, '2023-10-17 19:51:59'),
(53, 5, '53', 'Tactical Combat Boots', 'Compact, Sturdy & Durable Tactical Combat Boots', 50.99, '2023-10-17 19:51:59'),
(54, 5, '54', 'Brown Outdoor Timberlands', 'Earthern Brown Colored Outdoor Timberlands', 99.99, '2023-10-17 19:51:59'),
(55, 5, '55', 'Icy Ski Boots', 'Super Icy Cold Ski Boots\r\n', 23.44, '2023-11-05 20:08:02'),
(817764502, 2, 'NMXQC', 'Baby Mouse Uggs ', 'lovely & adorable baby mouse Uggs', 23.99, '2023-12-01 17:16:36'),
(1770258016, 4, '1634', 'Denver Broncos Nike Sneakers', 'Dangerously fast Denver Bronco Sneakers', 1234.55, '2023-12-01 17:59:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
 ADD PRIMARY KEY (`adminID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

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
-- Indexes for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
 ADD PRIMARY KEY (`shoeManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

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
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
MODIFY `shoeManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `shoecategories`
--
ALTER TABLE `shoecategories`
MODIFY `shoeCategoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
MODIFY `shoeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2147064934;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
