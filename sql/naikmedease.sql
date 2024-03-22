-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2024 at 05:23 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` int NOT NULL AUTO_INCREMENT,
  `prdid` int NOT NULL,
  `regid` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`cartid`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `compid` int NOT NULL AUTO_INCREMENT,
  `compname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`compid`),
  UNIQUE KEY `compname` (`compname`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compid`, `compname`) VALUES
(4, 'Abotta'),
(2, 'Beardo'),
(3, 'Cipla'),
(1, 'Dove'),
(5, 'Sunpharma');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `cntid` int NOT NULL AUTO_INCREMENT,
  `cntname` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `cntemail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cntdesc` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `cntcode` int NOT NULL,
  `cntstatus` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`cntid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cntid`, `cntname`, `cntemail`, `cntdesc`, `cntcode`, `cntstatus`) VALUES
(1, 'Yash Mehta', 'yash@gmail.com', 'I want diprolite', 8539, 'pending'),
(2, 'meet patel', 'meet@gmail.com', 'I want azitromycyne', 2435, 'pending'),
(3, 'Dhruv patel', 'dhruv@gmail.com', 'I want soframycine', 8132, 'pending'),
(4, 'Poojan Naik', 'Poojan@gmail.com', 'I want salisia KT', 7055, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedid` int NOT NULL AUTO_INCREMENT,
  `feedname` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `feedemail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `feeddesc` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`feedid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `feedname`, `feedemail`, `feeddesc`) VALUES
(1, 'Hardik Desai', 'hardik@gmail.com', 'Well Done'),
(2, 'Ashish Patel', 'ashish@gmail.com', 'Keep it Up'),
(3, 'Sunil Naik', 'Sunil@gmail.com', 'Nicee');

-- --------------------------------------------------------

--
-- Table structure for table `ordertab`
--

DROP TABLE IF EXISTS `ordertab`;
CREATE TABLE IF NOT EXISTS `ordertab` (
  `orderid` int NOT NULL AUTO_INCREMENT,
  `regid` int NOT NULL,
  `orddate` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `prdid` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int NOT NULL AUTO_INCREMENT,
  `transcode` int NOT NULL,
  `amount` varchar(5) NOT NULL,
  `regid` int NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prdid` int NOT NULL AUTO_INCREMENT,
  `prdnm` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prdpri` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `compid` int NOT NULL,
  `prdimg` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`prdid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdid`, `prdnm`, `prdpri`, `compid`, `prdimg`, `stock`) VALUES
(1, 'Anti Dandruff shampoo', '295', 2, 'antidandruf.jpg', 10),
(2, 'Nicotex', '150', 3, 'nicotex.jpeg', 15),
(3, 'Diprolite', '100', 4, 'diprolite.jpeg', 20),
(4, 'Powder', '80', 4, 'powder.png', 10),
(5, 'Cetaphil', '480', 4, 'cetaphil.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `regid` int NOT NULL AUTO_INCREMENT,
  `fullnm` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usernm` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `passwd` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `usertyp` varchar(5) COLLATE utf8mb4_general_ci DEFAULT 'User',
  `secucode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`regid`),
  UNIQUE KEY `usernm` (`usernm`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fullnm`, `usernm`, `email`, `passwd`, `usertyp`, `secucode`) VALUES
(1, 'Tanmay Naik', 'Admin', 'findtanmay10@gmail.com', 'Admin@2510', 'Admin', '2510'),
(2, 'Mahek Naik', 'Mahek21', 'maheknaik021@gmail.com', 'Mahek@2110', 'User', '2110');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
