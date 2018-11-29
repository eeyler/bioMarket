-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2018 at 05:59 PM
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
-- Table structure for table `cart_tmp`
--

DROP TABLE IF EXISTS `cart_tmp`;
CREATE TABLE IF NOT EXISTS `cart_tmp` (
  `crt_id` int(11) NOT NULL,
  `crt_ln` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `ord_qty` int(8) NOT NULL,
  PRIMARY KEY (`crt_ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` enum('BAKERY','DRINK','VEGETABLES','DAIRY') NOT NULL,
  `cat_img` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'BAKERY', 'img/bread.svg'),
(2, 'DRINK', 'img/coffee-cup.svg'),
(3, 'VEGETABLES', 'img/broccoli.svg'),
(4, 'DAIRY', 'img/piece-of-cheese.svg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
CREATE TABLE IF NOT EXISTS `customer_order` (
  `ord_num` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `ord_dte` date NOT NULL,
  `sts` enum('ORDERED','SHIPPED','DELIVERED') NOT NULL,
  PRIMARY KEY (`ord_num`),
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_line`
--

DROP TABLE IF EXISTS `customer_order_line`;
CREATE TABLE IF NOT EXISTS `customer_order_line` (
  `ord_num` int(11) NOT NULL,
  `ord_ln` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `ord_qty` int(8) NOT NULL,
  PRIMARY KEY (`ord_ln`),
  KEY `ord_num` (`ord_num`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `cat_id` int(11) NOT NULL,
  `sto_qty` int(8) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `sup_id` (`sup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `price`, `sup_id`, `prod_dsc`, `prod_img`, `cat_id`, `sto_qty`) VALUES
(1, 'Pomegrade Juice', '1.25', 2, 'Really nice product description for Pomegrade Juice', 'img/uploads/5bfc8efd684495.54781090.jpg', 2, 56),
(2, 'Kale Juice', '2.03', 2, 'Really nice product description for Kale Juice', 'img/uploads/5bfc8ee02d5a58.55705998.jpg', 2, 21),
(3, 'Carrot Juice', '0.86', 2, 'Really nice product description for Carrot Juice', 'img/uploads/5bfc8ebcb60fa4.65547830.jpg', 2, 98),
(4, 'Broccoli and Ricotta Pie', '1.50', 1, 'Really nice product description for Broccoli and Ricotta Pie', 'img/uploads/5bfc8dc80e44b7.38413046.jpg', 1, 12),
(5, 'Bread with Raisins', '2.62', 1, 'Really nice product description for Bread with Raisins', 'img/uploads/5bfc8b69202624.26787220.jpg', 1, 32),
(6, 'Coconut Bars', '3.58', 1, 'Really nice product description for Coconut Bars', 'img/uploads/5bfc8dea460e81.62966147.jpg', 1, 0),
(7, 'French Baguette', '2.14', 1, 'Really nice product description for French Baguette', 'img/uploads/5bfc8e819496a5.59336623.jpg', 1, 12),
(8, 'Yogurt', '0.50', 4, 'Really nice product description for Yogurt', 'img/uploads/5bfc93e69e7ae7.06241521.jpg', 4, 43),
(9, 'Cottage Cheese', '4.15', 4, 'Really nice product description for Cottage Cheese', 'img/uploads/5bfc944b347bb6.96054639.jpg', 4, 34),
(10, 'Coconut Milk', '3.45', 4, 'Really nice product description for Coconut Milk', 'img/uploads/5bfc94c763b756.98268375.jpg', 4, 0),
(11, 'Avocado', '2.78', 3, 'Really nice product description for Avocado', 'img/uploads/5bfc9547e90978.70031156.jpg', 3, 59),
(12, 'Peas', '1.42', 3, 'Really nice product description for Peas', 'img/uploads/5bfc95aa96d079.50991718.jpg', 3, 86),
(13, 'Beetroots', '4.02', 3, 'Really nice product description for Beetroots', 'img/uploads/5bfc961f9de346.08918563.jpg', 3, 25),
(14, 'Tomatoes', '1.52', 3, 'Really nice product description for Tomatoes', 'img/uploads/5bfc96d55d6458.60612011.jpg', 3, 0),
(15, 'Lime and Apple Juice', '3.56', 2, 'Really nice product description for Lime and Apple Juice', 'img/uploads/5bfca66b203680.63516952.jpg', 2, 120),
(16, 'Quark Breakfast Selection', '10.10', 4, 'Really nice product description for Quark Breakfast Selection', 'img/uploads/5bfca7094f5864.47772269.jpg', 4, 13),
(17, 'Onions', '1.25', 3, 'Really nice product description for Onions', 'img/uploads/5bfca533eb0f58.64750428.jpg', 3, 76);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_name` varchar(50) NOT NULL,
  `sup_email` varchar(80) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`sup_id`, `sup_name`, `sup_email`) VALUES
(1, 'Real Bakery', 'Rbakery@bake.com'),
(2, 'Organic Drink Corp', 'Odrink@drinkcorp.com'),
(3, 'Fresh Veggie', 'Fveggie@veggie.com'),
(4, 'Happy Cows Dairy', 'happycow@dairy.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ord`
--

DROP TABLE IF EXISTS `supplier_ord`;
CREATE TABLE IF NOT EXISTS `supplier_ord` (
  `sup_ord_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `sts` enum('SUBMITED','CLOSED') NOT NULL,
  `ord_dte` date NOT NULL,
  PRIMARY KEY (`sup_ord_id`),
  KEY `sup_id` (`sup_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ord_ln`
--

DROP TABLE IF EXISTS `supplier_ord_ln`;
CREATE TABLE IF NOT EXISTS `supplier_ord_ln` (
  `sup_ord_ln` int(11) NOT NULL,
  `sup_ord_id` int(11) NOT NULL,
  `ord_qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`sup_ord_ln`),
  KEY `sup_ord_id` (`sup_ord_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sup_ord_tmp`
--

DROP TABLE IF EXISTS `sup_ord_tmp`;
CREATE TABLE IF NOT EXISTS `sup_ord_tmp` (
  `sup_ord_id` int(11) NOT NULL,
  `ord_ln` int(11) NOT NULL AUTO_INCREMENT,
  `ord_qty` int(8) NOT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`ord_ln`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(45) NOT NULL,
  `l_name` varchar(45) NOT NULL,
  `e_mail` varchar(80) NOT NULL,
  `phn_num` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `adr_ln_1` varchar(60) NOT NULL,
  `adr_ln_2` varchar(60) DEFAULT NULL,
  `pstcod` varchar(10) NOT NULL,
  `lvl` enum('MEMBER','ADMIN') NOT NULL DEFAULT 'MEMBER',
  `pswrd` varchar(255) NOT NULL,
  `acc_crt_dte` datetime NOT NULL,
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `e_mail` (`e_mail`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `f_name`, `l_name`, `e_mail`, `phn_num`, `dob`, `adr_ln_1`, `adr_ln_2`, `pstcod`, `lvl`, `pswrd`, `acc_crt_dte`) VALUES
(1, 'Admin', 'Biomarket', 'admin@biomarket.co.uk', '121214', '2018-11-12', 'UWL St Mary\'s Road, Ealing,', 'London', 'W5 5RF', 'ADMIN', '$2y$10$WkTX0vUDntU38HxTw8kwDO/qlSUov4ANQ32hZRfeqFAUXSO5lSzwO', '2018-11-26 00:02:54'),
(2, 'Edit', 'Egri', 'edit.egri@yahoo.co.uk', '132435', '2018-11-05', '56 Staines Road', 'London', 'TW14 9HP', 'MEMBER', '$2y$10$nAzaXTXVvZMy0CM.yXiJ7.prueM/GMoFNhdzxIx5cke.44KamxjW.', '2018-11-26 00:25:40'),
(5, 'marcin', 'ewt', 'lammmeer@gmail.com', '52', '2018-11-06', '463', 'fdhd', 'fhd', 'MEMBER', '$2y$10$0vuSriFGsudpq1d6kjQlPekff/ARhSlHaWIYtD3EB3lybjFgYEVZK', '2018-11-28 22:44:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
