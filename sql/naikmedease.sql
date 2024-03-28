-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2024 at 05:38 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compid`, `compname`) VALUES
(6, 'Abbott India Ltd'),
(4, 'Cadila Pharmaceuticals'),
(15, 'cetaphil'),
(1, 'cipla'),
(13, 'Emcure Pharmaceuticals'),
(17, 'Ghar Soap'),
(3, 'Glenmark Pharmaceuticals'),
(9, 'Himalaya Wellness Company'),
(16, 'INTAS'),
(8, 'IPCA Laboratories Ltd'),
(18, 'Leeford Healthcare'),
(5, 'Mankind Pharma Limited'),
(12, 'Serum Institute of India'),
(2, 'sunpharma'),
(11, 'Torrent Pharmaceuticals'),
(10, 'Vicco Group'),
(14, 'wildstone'),
(7, 'Zydus Lifesciences');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cntid`, `cntname`, `cntemail`, `cntdesc`, `cntcode`, `cntstatus`) VALUES
(1, 'mann ahir', 'mann@gmail.com', 'i want gel', 3966, 'pending');

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
(1, 'Hardik Desai', 'hardik@gmail.com', 'Well Done, Great work'),
(2, 'Ashish Patel', 'ashish@gmail.com', 'Nice UI'),
(3, 'Sunil Naik', 'Sunil@gmail.com', 'Proud of you');

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
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `total_amount`, `addrs`) VALUES
(1, 2, '28.03.2024', '120.00', 'eru');

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
  `orddate` varchar(15) NOT NULL,
  PRIMARY KEY (`order_detail_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price`, `orddate`) VALUES
(1, 1, 1, 1, '120.00', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `transcode`, `amount`, `regid`) VALUES
(1, 2147483647, '120', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdid`, `prdnm`, `prdpri`, `compid`, `prdimg`, `stock`) VALUES
(1, 'vicco turmeric', '120', 10, 'vicco.jpg', 87),
(2, 'Wildstone facewash', '150', 14, 'facewash.jpeg', 100),
(3, 'Nicotex', '200', 1, 'nicotex.jpeg', 100),
(4, 'cetaphil cleanser', '680', 15, 'cetaphil.jpg', 100),
(5, 'cough syrup', '200', 16, 'syrup.jpeg', 100),
(6, 'Acnestar', '225', 5, 'acnestar.png', 100),
(7, 'Rovor 2.5', '450', 11, 'rovor.jpg', 99),
(8, 'Magic Soap with sandelwood', '200', 17, 'soap.jpg', 100),
(9, 'Diprolite', '120', 18, 'diprolite.jpeg', 100);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fullnm`, `usernm`, `email`, `passwd`, `usertyp`, `secucode`) VALUES
(1, 'Tanmay Naik', 'Admin', 'findtanmay10@gmail.com', 'Admin@2510', 'Admin', '2510'),
(2, 'Mahek Naik', 'Mahek21', 'maheknaik021@gmail.com', 'Mahek@2110', 'User', '2110'),
(3, 'Chirag Patel', 'chixy17', 'chixy@gmail.com', 'Chixy@1708', 'User', '1708'),
(4, 'Hardik Desai', 'hardik45', 'hardik@gmail.com', 'Hardik45', 'Admin', '4521');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
