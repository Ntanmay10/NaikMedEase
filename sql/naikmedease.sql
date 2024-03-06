-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 03:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naikmedease`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(5) NOT NULL,
  `prdid` int(5) NOT NULL,
  `regid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `prdid`, `regid`) VALUES
(1, 19, 32),
(2, 20, 41),
(15, 20, 41),
(17, 22, 41),
(18, 20, 32),
(21, 19, 32),
(22, 19, 32),
(23, 19, 32),
(24, 22, 32),
(25, 32, 32),
(26, 32, 41),
(33, 20, 32),
(34, 19, 32);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `compid` int(5) NOT NULL,
  `compname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compid`, `compname`) VALUES
(13, 'Abbota'),
(14, 'apollopharma'),
(12, 'Cipla ltd.'),
(4, 'dabur'),
(11, 'indianpharma'),
(3, 'intas'),
(8, 'mankind'),
(2, 'naikdrugs'),
(9, 'nationalmeds'),
(7, 'patanjali'),
(1, 'patelpharma'),
(10, 'sunpharma');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prdid` int(5) NOT NULL,
  `prdnm` varchar(50) NOT NULL,
  `prdpri` varchar(10) NOT NULL,
  `compid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdid`, `prdnm`, `prdpri`, `compid`) VALUES
(19, 'Tooth paste', '40', 4),
(20, 'Tooth Brush', '15', 4),
(21, 'Eye Drop', '85', 4),
(22, 'Face wash', '150', 2),
(23, 'cerasoft', '215', 2),
(24, 'cetafill', '420', 4),
(25, 'Hair wax', '280', 7),
(26, 'honey', '120', 8),
(27, 'honeydrop', '2', 9),
(28, 'moiz', '265', 10),
(29, 'Rovor', '290', 11),
(30, 'clotrimazole cream ip', '125', 12),
(31, 'Hand Sanatizer', '165', 13),
(32, 'Sun screen 50spf', '350', 14);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `regid` int(5) NOT NULL,
  `fullnm` varchar(50) NOT NULL,
  `usernm` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `usertyp` varchar(5) DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fullnm`, `usernm`, `email`, `passwd`, `usertyp`) VALUES
(26, 'Tanmay Amar Naik', 'Admin', 'findtanmay10@gmail.com', 'Tanmay@2510', 'Admin'),
(32, 'Mahek Niraj Naik', 'mahek1', 'mahek@gmail.com', 'Mahek@2110', 'User'),
(41, 'Chirag Patel', 'chixyy', 'chixy@gmail.com', 'Chixy@1708', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`compid`),
  ADD UNIQUE KEY `compname` (`compname`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prdid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`regid`),
  ADD UNIQUE KEY `usernm` (`usernm`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `compid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prdid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
