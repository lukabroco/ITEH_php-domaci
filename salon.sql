-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 06:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--
CREATE DATABASE IF NOT EXISTS `salon` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `salon`;

-- --------------------------------------------------------

--
-- Table structure for table `auta`
--

CREATE TABLE IF NOT EXISTS `auta` (
  `id_auta` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `id_karoserije` int(11) NOT NULL,
  `godiste` year(4) NOT NULL,
  PRIMARY KEY (`id_auta`),
  KEY `id_karoserije` (`id_karoserije`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auta`
--

INSERT INTO `auta` (`id_auta`, `naziv`, `cena`, `id_karoserije`, `godiste`) VALUES
(1, 'Audi A8', 10000, 1, 2010),
(2, 'AUDI A6', 7000, 1, 2014),
(3, 'BMW', 5000, 4, 2009);

-- --------------------------------------------------------

--
-- Table structure for table `karoserije`
--

CREATE TABLE IF NOT EXISTS `karoserije` (
  `id_karoserije` int(11) NOT NULL,
  `naziv_karoserije` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_karoserije`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karoserije`
--

INSERT INTO `karoserije` (`id_karoserije`, `naziv_karoserije`) VALUES
(1, 'Limuzina'),
(2, 'Hečbek'),
(3, 'Karavan'),
(4, 'Kabriolet');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auta`
--
ALTER TABLE `auta`
  ADD CONSTRAINT `auta_ibfk_1` FOREIGN KEY (`id_karoserije`) REFERENCES `karoserije` (`id_karoserije`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
