-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2018 at 01:06 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biomarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(50) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `prod_dsc` varchar(255) NOT NULL,
  `prod_img` text NOT NULL,
  `cat_id` enum('BAKERY','DRINKS','VEGETABLES','DAIRY') NOT NULL,
  `sto_qty` int(8) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `sup_id` (`sup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `price`, `sup_id`, `prod_dsc`, `prod_img`, `cat_id`, `sto_qty`) VALUES
(1, 'Pomegrade Juice', '1.25', 2, 'Really nice product description for Pomegrade Juice', 'img/uploads/5bfc8efd684495.54781090.jpg', 'DRINKS', 56),
(2, 'Kale Juice', '2.03', 2, 'Really nice product description for Kale Juice', 'img/uploads/5bfc8ee02d5a58.55705998.jpg', 'DRINKS', 21),
(3, 'Carrot Juice', '0.86', 2, 'Really nice product description for Carrot Juice', 'img/uploads/5bfc8ebcb60fa4.65547830.jpg', 'DRINKS', 98),
(4, 'Broccoli and Ricotta Pie', '1.50', 1, 'Really nice product description for Broccoli and Ricotta Pie', 'img/uploads/5bfc8dc80e44b7.38413046.jpg', 'BAKERY', 12),
(5, 'Bread with Raisins', '2.62', 1, 'Really nice product description for Bread with Raisins', 'img/uploads/5bfc8b69202624.26787220.jpg', 'BAKERY', 32),
(6, 'Coconut Bars', '3.58', 1, 'Really nice product description for Coconut Bars', 'img/uploads/5bfc8dea460e81.62966147.jpg', 'BAKERY', 0),
(7, 'French Baguette', '2.14', 1, 'Really nice product description for French Baguette', 'img/uploads/5bfc8e819496a5.59336623.jpg', 'BAKERY', 12),
(8, 'Yogurt', '0.50', 4, 'Really nice product description for Yogurt', 'img/uploads/5bfc93e69e7ae7.06241521.jpg', 'DAIRY', 43),
(9, 'Cottage Cheese', '4.15', 4, 'Really nice product description for Cottage Cheese', 'img/uploads/5bfc944b347bb6.96054639.jpg', 'DAIRY', 34),
(10, 'Coconut Milk', '3.45', 4, 'Really nice product description for Coconut Milk', 'img/uploads/5bfc94c763b756.98268375.jpg', 'DAIRY', 0),
(11, 'Avocado', '2.78', 3, 'Really nice product description for Avocado', 'img/uploads/5bfc9547e90978.70031156.jpg', 'VEGETABLES', 59),
(12, 'Peas', '1.42', 3, 'Really nice product description for Peas', 'img/uploads/5bfc95aa96d079.50991718.jpg', 'VEGETABLES', 86),
(13, 'Beetroots', '4.02', 3, 'Really nice product description for Beetroots', 'img/uploads/5bfc961f9de346.08918563.jpg', 'VEGETABLES', 25),
(14, 'Tomatoes', '1.52', 3, 'Really nice product description for Tomatoes', 'img/uploads/5bfc96d55d6458.60612011.jpg', 'VEGETABLES', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
