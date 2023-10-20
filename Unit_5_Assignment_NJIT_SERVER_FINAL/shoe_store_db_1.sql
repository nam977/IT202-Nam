-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 08:07 PM
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
-- Database: `shoe_store_db_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `shoecategories`
--

CREATE TABLE `shoecategories` (
  `shoeCategoryID` int(11) NOT NULL,
  `shoeCategoryName` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `shoes` (
  `shoeID` int(11) NOT NULL,
  `shoeCategoryID` int(11) NOT NULL,
  `shoeCode` varchar(10) NOT NULL,
  `shoeName` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoeID`, `shoeCategoryID`, `shoeCode`, `shoeName`, `description`, `price`, `dateAdded`) VALUES
(2747, 3, '7528', 'Dark Brown Loafers', 'Stunning & Charming Dark Brown Horse Leather Loafers', 2000.99, '2023-10-17 20:13:58'),
(2817, 4, '6754', 'Yellow Yeezys', 'Sleek & Stylish Yellow Yeezys', 140.99, '2023-10-17 19:38:10'),
(2938, 5, '1053', 'Brown Leather Cowboy Boots', 'Artisnally Crafted Brown Leather Cowboy Boots', 135.99, '2023-10-17 19:51:59'),
(2945, 4, '3768', 'Red Air Jordans', 'Aerodynamically Efficient Red Air Jordans', 100.99, '2023-10-17 19:38:10'),
(4241, 4, '1123', 'Black Sports Nike\'s', 'Lightning fast Black Nike\'s', 50.99, '2023-10-17 19:38:10'),
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
-- Indexes for table `shoecategories`
--
ALTER TABLE `shoecategories`
  ADD PRIMARY KEY (`shoeCategoryID`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoeID`),
  ADD UNIQUE KEY `shoeCode` (`shoeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoecategories`
--
ALTER TABLE `shoecategories`
  MODIFY `shoeCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9877;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
