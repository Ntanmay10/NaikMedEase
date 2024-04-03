-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2024 at 11:03 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `drid` int NOT NULL AUTO_INCREMENT,
  `docnm` varchar(25) NOT NULL,
  `doccnt` varchar(10) NOT NULL,
  `docqulif` varchar(5) NOT NULL DEFAULT 'MBBS',
  `docimg` varchar(25) NOT NULL,
  PRIMARY KEY (`drid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `order_date` varchar(15) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `addrs` varchar(200) NOT NULL,
  `ord_status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_detail_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payid` int NOT NULL AUTO_INCREMENT,
  `transcode` varchar(15) NOT NULL,
  `amount` varchar(5) NOT NULL,
  `regid` int NOT NULL,
  `order_id` int NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `presid` int NOT NULL AUTO_INCREMENT,
  `regid` int NOT NULL,
  `order_id` int NOT NULL,
  `preimg` varchar(50) NOT NULL,
  PRIMARY KEY (`presid`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fullnm`, `usernm`, `email`, `passwd`, `usertyp`, `secucode`) VALUES
(1, 'Tanmay Naik', 'admin', 'findtanmay10@gmail.com', 'Admin@2510', 'Admin', '2510'),
(2, 'mahek naik', 'mahek21', 'maheknaik021@gmail.com', 'Mahek@2110', 'User', '2110'),
(3, 'Chirag Patel', 'chixy17', 'chiragpatel17200@gmail.com', 'Chixy@1708', 'User', '1708');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
