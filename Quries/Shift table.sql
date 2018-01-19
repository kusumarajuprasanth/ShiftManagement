-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2016 at 11:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loyaltymethods`
--

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE IF NOT EXISTS `shifts` (
  `shiftname` varchar(20) NOT NULL,
  `mos` varchar(20) NOT NULL,
  `moe` varchar(20) NOT NULL,
  `tus` varchar(20) NOT NULL,
  `tue` varchar(20) NOT NULL,
  `wes` varchar(20) NOT NULL,
  `wee` varchar(20) NOT NULL,
  `ths` varchar(20) NOT NULL,
  `the` varchar(20) NOT NULL,
  `frs` varchar(20) NOT NULL,
  `fre` varchar(20) NOT NULL,
  `sas` varchar(20) NOT NULL,
  `sae` varchar(20) NOT NULL,
  `sus` varchar(20) NOT NULL,
  `sue` varchar(20) NOT NULL,
  UNIQUE KEY `shiftname` (`shiftname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
