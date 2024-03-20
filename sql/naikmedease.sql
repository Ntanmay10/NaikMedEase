-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 05:23 AM
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
  `regid` int(5) NOT NULL,
  `quantity` int(5) NOT NULL DEFAULT 1
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
(26, 'Albatros'),
(14, 'apollopharma'),
(21, 'beardo'),
(23, 'Chiragpharma&co'),
(12, 'Cipla ltd.'),
(4, 'dabur'),
(25, 'Delta pharma '),
(16, 'Dove'),
(22, 'Dove india'),
(17, 'Ghar soap'),
(11, 'indianpharma'),
(3, 'intas'),
(20, 'leeford'),
(24, 'Malipharma&co'),
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
  `cntdesc` varchar(250) NOT NULL,
  `cntcode` int(7) NOT NULL,
  `cntstatus` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cntid`, `cntname`, `cntemail`, `cntdesc`, `cntcode`, `cntstatus`) VALUES
(1, 'Tanmay Naik', 'findtanmay10@gmail.com', 'I want Rovor 2.5', 1857, 'You will get it'),
(2, 'Mahek', 'mahek@gmail.com', 'i want meds', 3440, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedid` int(5) NOT NULL,
  `feedname` varchar(20) NOT NULL,
  `feedemail` varchar(50) NOT NULL,
  `feeddesc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `feedname`, `feedemail`, `feeddesc`) VALUES
(1, 'Meet Patel', 'meet@gmail.com', 'User friendly UI');

-- --------------------------------------------------------

--
-- Table structure for table `ordertab`
--

CREATE TABLE `ordertab` (
  `orderid` int(5) NOT NULL,
  `cartid` int(5) NOT NULL,
  `regid` int(5) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `stock` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdid`, `prdnm`, `prdpri`, `compid`, `prdimg`, `stock`) VALUES
(1, 'Dove Shampoo', '150', 16, 'shampoo.jpg', 10);

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
  `usertyp` varchar(5) DEFAULT 'User',
  `secucode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fullnm`, `usernm`, `email`, `passwd`, `usertyp`, `secucode`) VALUES
(1, 'Tanmay Naik', 'Admin', 'findtanmay10@gmail.com', 'Admin@2510', 'Admin', '2510'),
(2, 'Mahek Naik', 'Mahek21', 'Maheknaik021@gmail.com', 'Mahek@2110', 'User', '2110');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedid`);

--
-- Indexes for table `ordertab`
--
ALTER TABLE `ordertab`
  ADD PRIMARY KEY (`orderid`);

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
  MODIFY `cartid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `compid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cntid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertab`
--
ALTER TABLE `ordertab`
  MODIFY `orderid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prdid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `regid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
