-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 06, 2024 at 02:22 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compid`, `compname`) VALUES
(9, 'Alkem Laboratories Ltd'),
(6, 'Aurobindo Pharma Limited'),
(5, 'Cadila Healthcare Limited'),
(2, 'Cipla Limited'),
(10, 'Divi Laboratories Ltd'),
(3, 'Dr. Reddy Laboratories Ltd'),
(8, 'Glenmark Pharmaceuticals Ltd'),
(4, 'Lupin Limited'),
(1, 'Sun Pharmaceutical Industries Ltd'),
(7, 'Torrent Pharmaceuticals Ltd');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cntid`, `cntname`, `cntemail`, `cntdesc`, `cntcode`, `cntstatus`) VALUES
(5, 'Priya Verma', 'priya@gmail.com', 'Do you have Amlodac 5 mg in stock?', 5678, 'yes'),
(9, 'Meera Mishra', 'meera@gmail.com', 'Availability of Zincovit tablets?', 9012, 'Out of stock'),
(12, 'Rohit Sharma', 'rohit@gmail.com', 'Is there stock of Paracetamol 500 mg tablets?', 2345, 'yes'),
(13, 'Deepika Patel', 'deepika@gmail.com', 'Availability of Vitamin D3 supplements?', 3456, 'available'),
(14, 'Tanmay Naik', 'findtanmay10@gmail.com', 'I want rovor2.5', 8621, 'you will get it'),
(15, 'Mann Ahir', 'mann@gmail.com', 'I want diprolite can i get it?', 3063, 'pending'),
(16, 'Chirag Patel', 'chixy@gmail.com', 'I want Tab. katerol DT', 8195, 'pending'),
(17, 'Yash Mehta', 'yash@gmail.com', 'I want painkiller', 1217, 'pending'),
(18, 'Rudra Naik', 'rudra@gmail.com', 'I want clearzit gel', 5640, 'pending'),
(19, 'Vihar Naik', 'vihu@gmail.com', 'I want sunscreen lotion SPF 50', 5886, 'pending');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`drid`, `docnm`, `doccnt`, `docqulif`, `docimg`) VALUES
(5, 'Shiv Patel', '9106655904', 'MBBS', 'shiv.jpg'),
(4, 'Murli Sharma', '7096754251', 'MBBS', 'munnabhai.jpeg'),
(8, 'Krisha Bhanushali', '9313044964', 'BPT', 'krisha.jpg'),
(9, 'Khushi Dodia', '8780685745', 'MBBS', 'khushi.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedid`, `feedname`, `feedemail`, `feeddesc`) VALUES
(1, 'Arjun Gupta', 'arjun@gmail.com', 'The service was excellent.'),
(2, 'Aisha Sharma', 'aisha@gmail.com', 'I am very happy with the product quality.'),
(3, 'Rahul Patel', 'rahul@gmail.com', 'The website is easy to navigate.'),
(4, 'Priya Singh', 'priya@gmail.com', 'The customer support was helpful.'),
(5, 'Aarav Reddy', 'aarav@gmail.com', 'Fast shipping and good packaging.'),
(6, 'Sneha Verma', 'sneha@gmail.com', 'Great shopping experience overall.'),
(7, 'Rohan Choudhary', 'rohan@gmail.com', 'The product met my expectations.'),
(8, 'Meera Shah', 'meera@gmail.com', 'I would definitely recommend this to others.'),
(9, 'Vishal Yadav', 'vishal@gmail.com', 'Value for money product.'),
(10, 'Neha Mishra', 'neha@gmail.com', 'Very satisfied with the purchase.'),
(11, 'Vivan Naik', 'vivan@gmail.com', 'Excellent');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`, `total_amount`, `addrs`, `ord_status`) VALUES
(12, 2, '05.04.2024', '1500.00', 'gandevi', 'pending'),
(2, 2, '03.02.2024', '145.00', 'Gandevi', 'done'),
(3, 5, '26.02.2024', '4750.00', 'amalsad', 'done'),
(4, 10, '27.02.2024', '950.00', 'Chapra', 'pending'),
(5, 12, '02.03.2024', '150.00', 'adda', 'done'),
(6, 8, '05.03.2024', '8200.00', 'satem', 'pending'),
(7, 8, '05.03.2024', '500.00', 'satem', 'done'),
(8, 7, '15.03.2024', '4100.00', 'vesma', 'pending'),
(9, 7, '25.03.2024', '3000.00', 'vesma', 'pending'),
(10, 9, '25.03.2024', '250.00', 'pattapor', 'pending'),
(11, 9, '05.04.2024', '1150.00', 'pattapor', 'done'),
(13, 2, '05.04.2024', '3500.00', 'eru', 'done');

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 6, '250.00'),
(2, 1, 2, 10, '300.00'),
(3, 1, 3, 9, '450.00'),
(4, 1, 10, 15, '3000.00'),
(5, 2, 5, 1, '145.00'),
(6, 3, 6, 10, '250.00'),
(7, 3, 8, 15, '150.00'),
(8, 4, 9, 1, '500.00'),
(9, 4, 3, 1, '450.00'),
(10, 5, 8, 1, '150.00'),
(11, 6, 5, 10, '145.00'),
(12, 6, 3, 15, '450.00'),
(13, 7, 9, 1, '500.00'),
(14, 8, 6, 1, '250.00'),
(15, 8, 3, 5, '450.00'),
(16, 8, 4, 1, '100.00'),
(17, 8, 8, 10, '150.00'),
(18, 9, 10, 1, '3000.00'),
(19, 10, 6, 1, '250.00'),
(20, 11, 8, 1, '150.00'),
(21, 11, 9, 1, '500.00'),
(22, 11, 7, 1, '500.00'),
(23, 12, 2, 5, '300.00'),
(24, 13, 1, 1, '250.00'),
(25, 13, 2, 10, '300.00'),
(26, 13, 6, 1, '250.00');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `transcode`, `amount`, `regid`, `order_id`) VALUES
(1, '456878959874128', '53710', 2, 1),
(2, '456878959874128', '145', 2, 2),
(3, '111152369899125', '4764', 5, 3),
(4, '456878959874128', '952', 10, 4),
(5, '111152369899125', '150', 12, 5),
(6, '456878959874128', '8224', 8, 6),
(7, '456878959874128', '501', 8, 7),
(8, '456852369874555', '4112', 7, 8),
(9, '147852369874125', '3009', 7, 9),
(10, '111152369899852', '250', 9, 10),
(11, '456852369874147', '1153', 9, 11),
(12, '111152369899888', '1504', 2, 12),
(13, '456852369875555', '3510', 2, 13);

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`presid`, `regid`, `order_id`, `preimg`) VALUES
(1, 2, 1, 'prescription_1.jpg'),
(2, 2, 2, 'prescription_2.jpg'),
(3, 5, 3, 'pres_3.png'),
(4, 10, 4, 'pres_4.png'),
(5, 12, 5, 'pres_5.png'),
(6, 8, 6, 'prescription_2.jpg'),
(7, 8, 7, 'pres_3.png'),
(8, 7, 8, 'pres_3.png'),
(9, 7, 9, 'pres_4.png'),
(10, 9, 10, 'pres_5.png'),
(11, 9, 11, 'prescription_1.jpg'),
(12, 2, 12, 'pres_5.png'),
(13, 2, 13, 'pres_3.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prdid`, `prdnm`, `prdpri`, `compid`, `prdimg`, `stock`) VALUES
(1, 'Amlodipine', '250', 9, 'Amlodipine.jpg', 43),
(2, 'Pantoprazole ', '300', 9, 'Pantoprazole.jpeg', 24),
(3, 'Cefuroxime ', '450', 9, 'Cefuroxime.jpg', 17),
(4, 'Amoxicillin Capsules', '100', 6, 'Amoxicillin Capsules.jpg', 49),
(5, 'Omeprazole ', '145', 6, 'Omeprazole.jpg', 39),
(6, 'Metformin ', '250', 6, 'Metformin.jpg', 37),
(7, 'Cefixime ', '500', 5, 'Cefixime.jpg', 49),
(8, 'paracetamol Suspension', '150', 5, 'paracetamol Suspension.jpg', 23),
(9, 'Metronidazole Tablets', '500', 5, 'Metronidazole Tablets.jpg', 47),
(10, 'Salbutamol Inhaler', '3000', 2, 'Salbutamol Inhaler.jpg', 34);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`regid`, `fullnm`, `usernm`, `email`, `passwd`, `usertyp`, `secucode`) VALUES
(1, 'Tanmay Naik', 'Admin', 'findtanmay10@gmail.com', 'Admin@2510', 'Admin', '2510'),
(2, 'Mahek Naik', 'Mahek21', 'maheknaik021@gmail.com', 'Mahek@2110', 'User', '2110'),
(3, 'Chirag Patel', 'chixy17', 'chiragpatel1708@gmail.com', 'chixy@1708', 'Admin', '1708'),
(4, 'Dhruv Ahir', 'dhruv02', 'dhruv02@gmail.com', 'password456', 'User', '2345'),
(5, 'Yash Tandel', 'yash03', 'yash03@gmail.com', 'pass123word', 'User', '3456'),
(6, 'Meet Patel', 'meet04', 'meet04@gmail.com', 'pass456word', 'User', '4567'),
(7, 'Kunj Ahir', 'kunj05', 'kunj05@gmail.com', 'david123', 'User', '5678'),
(8, 'Chintan Patel', 'chintan06', 'chintan06@gmail.com', 'sarah456', 'User', '6789'),
(9, 'Deep Ahir', 'deep07', 'deep07@gmail.com', 'matthew789', 'User', '7890'),
(10, 'Dhruv Tandel', 'dhruv08', 'dhruv08@gmail.com', 'emma123', 'User', '8901'),
(11, 'Yash Patel', 'yash09', 'yash09@gmail.com', 'chris456', 'User', '9012'),
(12, 'Meet Ahir', 'meet10', 'meet10@gmail.com', 'olivia789', 'User', '0123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
