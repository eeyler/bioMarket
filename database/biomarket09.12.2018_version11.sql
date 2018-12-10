-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2018 at 11:33 AM
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
  `crt_ln` int(11) NOT NULL AUTO_INCREMENT,
  `crt_id` int(30) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `ord_qty` int(8) NOT NULL,
  PRIMARY KEY (`crt_ln`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_tmp`
--

INSERT INTO `cart_tmp` (`crt_ln`, `crt_id`, `prod_id`, `ord_qty`) VALUES
(14, 7, 15, 11),
(20, 7, 1, 1),
(16, 7, 12, 3),
(19, 7, 6, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
  `ord_num` varchar(111) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `ord_dte` date NOT NULL,
  `sts` enum('ORDERED','SHIPPED','DELIVERED') NOT NULL,
  `price_sum` decimal(5,2) NOT NULL,
  `adr_ln_1` varchar(60) NOT NULL,
  `adr_ln_2` varchar(60) NOT NULL,
  `pstcod` varchar(10) NOT NULL,
  PRIMARY KEY (`ord_num`) USING BTREE,
  KEY `usr_id` (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`ord_num`, `usr_id`, `ord_dte`, `sts`, `price_sum`, `adr_ln_1`, `adr_ln_2`, `pstcod`) VALUES
('2_20181208233810', 2, '2018-12-08', 'DELIVERED', '22.80', '56 Staines Road', 'London', 'TW14 9HP'),
('2_20181208233524', 2, '2018-12-08', 'DELIVERED', '0.86', '56 Staines Road', 'London', 'TW14 9HP'),
('7_20181208232724', 7, '2018-12-08', 'DELIVERED', '85.52', '123', 'Feltham', 'cnvc'),
('2_20181208233352', 2, '2018-12-08', 'DELIVERED', '40.24', '56 Staines Road', 'London', 'TW14 9HP'),
('2_20181208233232', 2, '2018-12-08', 'DELIVERED', '45.30', '56 Staines Road', 'London', 'TW14 9HP'),
('7_20181208232700', 7, '2018-12-08', 'DELIVERED', '25.10', '123', 'Feltham', 'cnvc');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_line`
--

DROP TABLE IF EXISTS `customer_order_line`;
CREATE TABLE IF NOT EXISTS `customer_order_line` (
  `ord_ln` int(11) NOT NULL,
  `ord_num` varchar(111) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `ord_qty` int(8) NOT NULL,
  `sub_total` decimal(5,2) NOT NULL,
  PRIMARY KEY (`ord_ln`) USING BTREE,
  KEY `ord_num` (`ord_num`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order_line`
--

INSERT INTO `customer_order_line` (`ord_ln`, `ord_num`, `prod_id`, `ord_qty`, `sub_total`) VALUES
(12, '2_20181208233810', 12, 4, '22.80'),
(11, '2_20181208233524', 3, 1, '0.86'),
(9, '2_20181208233352', 3, 8, '6.88'),
(10, '2_20181208233352', 11, 12, '33.36'),
(6, '2_20181208233232', 7, 10, '21.40'),
(7, '2_20181208233232', 10, 4, '13.80'),
(8, '2_20181208233232', 16, 1, '10.10'),
(4, '7_20181208232724', 12, 12, '68.40'),
(5, '7_20181208232724', 7, 8, '17.12'),
(3, '7_20181208232700', 5, 1, '2.62'),
(2, '7_20181208232700', 14, 8, '12.16'),
(1, '7_20181208232700', 3, 12, '10.32');

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
  `prod_dsc` varchar(230) NOT NULL,
  `prod_img` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sto_qty` int(8) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `sup_id` (`sup_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `price`, `sup_id`, `prod_dsc`, `prod_img`, `cat_id`, `sto_qty`) VALUES
(1, 'Pomegrade Juice', '1.25', 2, 'Really nice product description for Pomegrade Juice', 'img/uploads/5bfc8efd684495.54781090.jpg', 2, 0),
(2, 'Kale Juice', '2.03', 2, 'Really nice product description for Kale Juice', 'img/uploads/5bfc8ee02d5a58.55705998.jpg', 2, 0),
(3, 'Carrot Juice', '0.86', 2, 'Really nice product description for Carrot Juice', 'img/uploads/5bfc8ebcb60fa4.65547830.jpg', 2, 114),
(4, 'Broccoli and Ricotta Pie', '1.25', 1, 'Really nice product description for Broccoli and Ricotta Pie', 'img/uploads/5bfc8dc80e44b7.38413046.jpg', 1, 3),
(5, 'Bread with Raisins', '2.62', 1, 'Really nice product description for Bread with Raisins', 'img/uploads/5bfc8b69202624.26787220.jpg', 1, 8),
(6, 'Coconut Bars', '3.58', 1, 'Really nice product description for Coconut Bars', 'img/uploads/5bfc8dea460e81.62966147.jpg', 1, 11),
(7, 'French Baguette', '2.14', 1, 'Really nice product description for French Baguette', 'img/uploads/5bfc8e819496a5.59336623.jpg', 1, 181),
(8, 'Yogurt', '0.50', 4, 'Really nice product description for Yogurt', 'img/uploads/5bfc93e69e7ae7.06241521.jpg', 4, 16),
(9, 'Cottage Cheese', '4.15', 4, 'Really nice product description for Cottage Cheese', 'img/uploads/5bfc944b347bb6.96054639.jpg', 4, 7),
(10, 'Goat Cheese', '3.45', 4, 'Really nice product description for Goat Cheese', 'img/uploads/5c0cf86ca07326.27274002.jpg', 4, 37),
(11, 'Avocado', '2.78', 3, 'Really nice product description for Avocado', 'img/uploads/5bfc9547e90978.70031156.jpg', 3, 7),
(12, 'Peas', '5.70', 3, 'Really nice product description for Peas', 'img/uploads/5bfc95aa96d079.50991718.jpg', 3, 0),
(13, 'Beetroots', '4.02', 3, 'Really nice product description for Beetroots', 'img/uploads/5bfc961f9de346.08918563.jpg', 3, 11),
(14, 'Tomatoes', '1.52', 3, 'Really nice product description for Tomatoes', 'img/uploads/5bfc96d55d6458.60612011.jpg', 3, 2),
(15, 'Lime and Apple Juice', '3.56', 2, 'Really nice product description for Lime and Apple Juice', 'img/uploads/5bfca66b203680.63516952.jpg', 2, 129),
(16, 'Quark Breakfast', '10.10', 4, 'Really nice product description for Quark Breakfast Selection', 'img/uploads/5bfca7094f5864.47772269.jpg', 4, 15),
(17, 'Onions', '1.25', 3, 'Really nice product description for Onions', 'img/uploads/5bfca533eb0f58.64750428.jpg', 3, 79);

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
  `sup_ord_id` varchar(100) NOT NULL,
  `sts` enum('SUBMITED','CLOSED') NOT NULL,
  `ord_dte` date NOT NULL,
  `price_sum` decimal(5,2) NOT NULL,
  PRIMARY KEY (`sup_ord_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_ord`
--

INSERT INTO `supplier_ord` (`sup_ord_id`, `sts`, `ord_dte`, `price_sum`) VALUES
('5_20181207205734', 'CLOSED', '2018-12-07', '8.41'),
('5_20181207205918', 'SUBMITED', '2018-12-07', '71.25'),
('5_20181207210039', 'CLOSED', '2018-12-07', '88.84'),
('5_20181207210614', 'SUBMITED', '2018-12-07', '27.33'),
('5_20181207210659', 'CLOSED', '2018-12-07', '96.80'),
('5_20181207213447', 'CLOSED', '2018-12-07', '1.25'),
('5_20181207213914', 'SUBMITED', '2018-12-07', '29.40'),
('5_20181208112709', 'CLOSED', '2018-12-08', '11.37'),
('5_20181208113018', 'CLOSED', '2018-12-08', '5.56');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ord_ln`
--

DROP TABLE IF EXISTS `supplier_ord_ln`;
CREATE TABLE IF NOT EXISTS `supplier_ord_ln` (
  `sup_ord_id` varchar(30) NOT NULL,
  `sup_ord_ln` int(11) NOT NULL,
  `ord_qty` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`sup_ord_ln`),
  KEY `sup_ord_id` (`sup_ord_id`),
  KEY `product_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_ord_ln`
--

INSERT INTO `supplier_ord_ln` (`sup_ord_id`, `sup_ord_ln`, `ord_qty`, `prod_id`, `price`) VALUES
('5_20181207205734', 21, 2, 6, '7.16'),
('5_20181207205734', 20, 1, 4, '1.25'),
('5_20181207205918', 23, 5, 16, '50.50'),
('5_20181207205918', 22, 5, 9, '20.75'),
('5_20181207210039', 27, 6, 14, '9.12'),
('5_20181207210039', 26, 6, 13, '24.12'),
('5_20181207210039', 25, 6, 12, '34.20'),
('5_20181207210039', 24, 5, 11, '13.90'),
('5_20181207210039', 28, 6, 17, '7.50'),
('5_20181207210614', 33, 3, 1, '3.75'),
('5_20181207210614', 32, 3, 21, '6.00'),
('5_20181207210614', 31, 3, 2, '6.09'),
('5_20181207210614', 30, 9, 3, '7.74'),
('5_20181207210614', 29, 3, 4, '3.75'),
('5_20181207210659', 36, 5, 16, '50.50'),
('5_20181207210659', 35, 5, 10, '17.25'),
('5_20181207210659', 34, 7, 9, '29.05'),
('5_20181207213447', 37, 1, 4, '1.25'),
('5_20181207213914', 41, 3, 14, '4.56'),
('5_20181207213914', 40, 3, 12, '17.10'),
('5_20181207213914', 39, 2, 5, '5.24'),
('5_20181207213914', 38, 2, 4, '2.50'),
('5_20181208112709', 44, 3, 14, '4.56'),
('5_20181208112709', 43, 2, 11, '5.56'),
('5_20181208112709', 42, 1, 4, '1.25'),
('5_20181208113018', 45, 2, 11, '5.56');

-- --------------------------------------------------------

--
-- Table structure for table `sup_ord_tmp`
--

DROP TABLE IF EXISTS `sup_ord_tmp`;
CREATE TABLE IF NOT EXISTS `sup_ord_tmp` (
  `sup_ord_id` int(30) NOT NULL,
  `ord_ln` int(11) NOT NULL AUTO_INCREMENT,
  `ord_qty` int(8) NOT NULL,
  `prod_id` int(11) NOT NULL,
  PRIMARY KEY (`ord_ln`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `f_name`, `l_name`, `e_mail`, `phn_num`, `dob`, `adr_ln_1`, `adr_ln_2`, `pstcod`, `lvl`, `pswrd`, `acc_crt_dte`) VALUES
(1, 'Admin', 'Biomarket', 'admin@biomarket.co.uk', '1234568', '2018-12-11', 'UWL', 'London', 'W5 5RF', 'ADMIN', '$2y$10$6cCkjGqqf2QyQmxP/w.aEuVHjBgMf3iIBM0Gvo7fkyl.rfdHAaXHS', '2018-12-01 07:31:25'),
(2, 'Edit', 'Egri', 'edit.egri@yahoo.co.uk', '132435', '2018-11-05', '56 Staines Road', 'London', 'TW14 9HP', 'MEMBER', '$2y$10$nAzaXTXVvZMy0CM.yXiJ7.prueM/GMoFNhdzxIx5cke.44KamxjW.', '2018-11-26 00:25:40'),
(3, 'John', 'Small', 'egri.editerika@gmail.com', '242', '2018-12-04', 'cvnc', 'cvnc', 'cnvc', 'MEMBER', '$2y$10$bWP9ae.ZgmWtWKXtkyhJuuzXHytEENL8we8WHOx9UccRtoOUiTtpy', '2018-12-01 15:44:20'),
(4, 'Dominykas', 'Genys', 'dominykasgenysmail@gmail.com', '07401528222', '2018-11-06', '777', 'london', 'tw3 3ne', 'MEMBER', '$2y$10$lXc.2Ep53EIRVOvwc4YKp.TE8039.UE8iGYgF/3uFB9ph.3TIBzSS', '2018-12-01 16:01:44'),
(5, 'AdminTester', 'Tester', '21353578@student.uwl.ac.uk', '07401528456', '2018-09-03', '12 kalo st.', 'london', 'W5 5RF', 'ADMIN', '$2y$10$LsFHtGnFwz8WnYfvkI8TTe0T7Bq99bt7MpadXcXU1H3aOhXU1qh3W', '2018-12-01 16:15:24'),
(6, 'James', 'Evans', 'egri.editerika@sm.com', '242', '2018-12-04', 'cvnc', 'cvnc', 'cnvc', 'MEMBER', '$2y$10$bWP9ae.ZgmWtWKXtkyhJuuzXHytEENL8we8WHOx9UccRtoOUiTtpy', '2018-12-01 15:44:20'),
(7, 'E', 'Lamm', 'lammmeer@gmail.com', '242', '2018-12-04', '123', 'Feltham', 'cnvc', 'MEMBER', '$2y$10$O2TAs54vH8qmlsw1axMcteoiF8.YWxA51j7FbmuwRI2fVkqv4CpvG', '2018-12-01 15:44:20'),
(8, 'Admin', 'Admin', 'admin', '1234', '2018-12-02', '123 road', 'London', 'W5 5RF', 'ADMIN', '$2y$10$wplUFF.dJLMHSmgFk74vEusuSNOQCJOKZ/oUxUd3rY120I4OAt3Wi', '2018-12-09 11:31:21'),
(9, 'member', 'member', 'member', '123', '2018-12-02', '100 Staines Road', 'London', 'W5 5RF', 'MEMBER', '$2y$10$Kuif4Jbg4PM5wFmWRyTQneTjVpsuNiEh4RB0M2TwxLbJ2h/k57VTK', '2018-12-09 11:32:53');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;