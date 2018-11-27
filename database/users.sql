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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `f_name`, `l_name`, `e_mail`, `phn_num`, `dob`, `adr_ln_1`, `adr_ln_2`, `pstcod`, `lvl`, `pswrd`, `acc_crt_dte`) VALUES
(1, 'Admin', 'Biomarket', 'admin@biomarket.co.uk', '121214', '2018-11-12', 'UWL St Mary\'s Road, Ealing,', 'London', 'W5 5RF', 'ADMIN', '$2y$10$WkTX0vUDntU38HxTw8kwDO/qlSUov4ANQ32hZRfeqFAUXSO5lSzwO', '2018-11-26 00:02:54'),
(2, 'Edit', 'Egri', 'edit.egri@yahoo.co.uk', '132435', '2018-11-05', '56 Staines Road', 'London', 'TW14 9HP', 'MEMBER', '$2y$10$nAzaXTXVvZMy0CM.yXiJ7.prueM/GMoFNhdzxIx5cke.44KamxjW.', '2018-11-26 00:25:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
