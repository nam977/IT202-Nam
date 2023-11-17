-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 17, 2023 at 09:16 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
 ADD PRIMARY KEY (`shoeManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shoeManagers`
--
ALTER TABLE `shoeManagers`
MODIFY `shoeManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
