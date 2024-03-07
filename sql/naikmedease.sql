-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 05:06 PM
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
(49, 54, 47),
(53, 55, 46);

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
(21, 'beardo'),
(12, 'Cipla ltd.'),
(4, 'dabur'),
(16, 'Dove'),
(17, 'Ghar soap'),
(11, 'indianpharma'),
(3, 'intas'),
(20, 'leeford'),
(8, 'mankind'),
(2, 'naikdrugs'),
(9, 'nationalmeds'),
(7, 'patanjali'),
(1, 'patelpharma'),
(15, 'perfora'),
(10, 'sunpharma'),
(18, 'Torrent pharma'),
(19, 'wildstone');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cntid` int(5) NOT NULL,
  `cntname` varchar(25) NOT NULL,
  `cntemail` varchar(50) NOT NULL,
  `cntdesc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cntid`, `cntname`, `cntemail`, `cntdesc`) VALUES
(10, 'Deep Ahir', 'Deep@gmail.com', 'I want toothbrush'),
(14, 'Mann Ahir', 'Mann@gmail.com', 'I want hair gel');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prdid` int(5) NOT NULL,
  `prdnm` varchar(50) NOT NULL,
  `prdpri` varchar(10) NOT NULL,
  `compid` int(5) NOT NULL,
  `prdimg` varchar(100) NOT NULL,
  `unit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdid`, `prdnm`, `prdpri`, `compid`, `prdimg`, `unit`) VALUES
(48, 'Dove Shampoo', '150', 16, 'shampoo.jpg', 10),
(49, 'Diprolite skin cream', '65', 20, 'diprolite.jpeg', 10),
(50, 'Magic soap', '150', 17, 'soap.jpg', 15),
(51, 'syrup', '200', 3, 'syrup.jpeg', 10),
(52, 'wildstone face wash', '180', 19, 'facewash.jpeg', 10),
(53, 'Beardo face wash', '215', 21, 'facewash2.jpeg', 15),
(54, 'Nicotex', '140', 12, 'nicotex.jpeg', 12),
(55, 'clocip', '50', 12, 'powder.png', 10),
(56, 'Rovor 2.5', '500', 18, 'rovor.jpeg', 10);

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
(46, 'Mahek Naik', 'mahek21', 'mahek@gmail.com', 'Mahek@2110', 'User'),
(47, 'Chirag Patel', 'Chixy17', 'chixy@gmail.com', 'Chixy@1708', 'User');

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cntid`);

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
  MODIFY `cartid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `compid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cntid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prdid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
