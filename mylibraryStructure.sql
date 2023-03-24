-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mySQLlamp:3306
-- Generation Time: Mar 24, 2023 at 08:59 PM
-- Server version: 5.7.41
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mylibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `librarything_neurodrew`
--

CREATE TABLE `librarything_neurodrew` (
  `Book ID` int(9) DEFAULT NULL,
  `Title` varchar(209) DEFAULT NULL,
  `Image` text,
  `Sort Character` int(1) DEFAULT NULL,
  `Primary Author` varchar(36) DEFAULT NULL,
  `Date` varchar(7) DEFAULT NULL,
  `Review` varchar(8037) DEFAULT NULL,
  `Rating` varchar(2) DEFAULT NULL,
  `Comment` varchar(190) DEFAULT NULL,
  `Date Read` varchar(10) DEFAULT NULL,
  `Tags` varchar(108) DEFAULT NULL,
  `Cost` decimal(8,2) DEFAULT NULL,
  `BookLocation` varchar(20) DEFAULT NULL,
  `Entry Date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
