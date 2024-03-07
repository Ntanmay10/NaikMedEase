-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 06:23 AM
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
(16, 'Dove'),
(17, 'Ghar soap'),
(11, 'indianpharma'),
(3, 'intas'),
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
(1, 'Tanmay', 'tanmay@gmail.com', 'I need facewash'),
(3, 'mahek', 'mahek@gmail.com', 'I need Brush'),
(4, 'chirag', 'chixy@gmail.com', 'i want meds');

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
(40, 'Shampoo', '180', 16, 'shampoo.jpg', 100),
(41, 'magic soap', '55', 17, 'soap.jpg', 185),
(42, 'syrup', '80', 3, 'syrup.jpeg', 250),
(43, 'nicotex', '150', 12, 'nicotex.jpeg', 50),
(44, 'clocip', '95', 12, 'powder.png', 60),
(45, 'Rovor 2.5', '545', 18, 'rovor.jpeg', 55),
(46, 'facewash', '120', 19, 'facewash2.jpeg', 60);

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
  MODIFY `cartid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `compid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cntid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prdid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
