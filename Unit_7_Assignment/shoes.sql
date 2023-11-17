-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 06, 2023 at 05:19 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=9879 ;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoeID`, `shoeCategoryID`, `shoeCode`, `shoeName`, `description`, `price`, `dateAdded`) VALUES
(125, 2, 'NMXQC', 'Baby Uggs', 'Soft, Fluffy & Comfortable Baby Uggs', 23.44, '2023-11-05 18:34:21'),
(126, 1, 'LKCMS', 'Rubber Ducky Bath Slippers', 'Yellow, Squeaky, & Adorable Rubber Ducky Bath Slippers', 34.99, '2023-11-05 18:36:57'),
(200, 3, 'BCD123', 'Penny Pincher Loafers', 'Mr Krabs''s Penny Pinching Pretty Loafers', 23.99, '2023-11-05 20:04:08'),
(374, 5, 'ZZZ123', 'Adidas GSG-9 Tv Tactical Boots', 'German Engineered GSG-9 Tactical Boots', 1000.99, '2023-11-05 18:38:59'),
(401, 1, 'ABC123', 'SuperSneakers', 'Supergirl Sally''s Super Sneakers', 23.99, '2023-11-05 20:02:22'),
(505, 4, 'TTY2000', 'YoGabbaGabba Yeezys', 'Yellow Yummy YoGabbaGabba Yeezys', 23.99, '2023-11-05 20:06:04'),
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
(9876, 1, '6789', 'Yellow Flip Flops', 'Tropical & refreshing Yellow Summer Flip Flops', 23.99, '2023-10-17 20:05:37'),
(58432, 3, '389434', 'Daphne Loafers', 'Daphne Loafers', 23.44, '2023-11-05 22:39:23'),
(1000000, 5, 'NNN345', 'Adidas GSG-9 Tv Tactical Boots', 'Hello', 23.44, '2023-11-05 20:08:02'),
(2938848, 1, 'HDHJSD', 'THOMAS', ' Thomas', 23.44, '2023-11-05 20:38:20'),
(777325167, 1, 'HELLO12345', 'HELLO234', 'HELLO234', 23.99, '2023-11-06 12:14:32'),
(1548536840, 1, 'RRRR', 'Creepy', ' DSHSD', 23.99, '2023-11-06 12:18:31'),
(1572434735, 2, '954854', 'Hello Kitty', 'Hello Kitty', 344.99, '2023-11-06 12:19:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
 ADD PRIMARY KEY (`shoeID`), ADD UNIQUE KEY `shoeCode` (`shoeCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
MODIFY `shoeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1572434736;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
