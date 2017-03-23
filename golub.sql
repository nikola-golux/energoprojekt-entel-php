-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 07:31 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golub`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firm_id` int(11) NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zanimanje` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firm_id`, `f_name`, `l_name`, `zanimanje`, `created_at`, `updated_at`) VALUES
(4, 2, 'Marko', 'Markovic', 'Pekar', '2017-03-22 15:25:31', '2017-03-22 15:25:31'),
(5, 3, 'Jovana', 'Milivojevic', 'Programer', '2017-03-22 15:38:06', '2017-03-22 15:38:06'),
(6, 4, 'Vojkan', 'Vojvodic', 'Inzenjer', '2017-03-22 15:38:41', '2017-03-22 15:38:41'),
(7, 22, 'Neko', 'Novi', 'Blejac', '2017-03-23 20:29:08', '2017-03-23 20:29:08'),
(8, 23, 'Test1', 'Test2', 'Test3', '2017-03-23 20:30:45', '2017-03-23 20:30:45');

-- --------------------------------------------------------

--
-- Table structure for table `employees_x_firms`
--

DROP TABLE IF EXISTS `employees_x_firms`;
CREATE TABLE IF NOT EXISTS `employees_x_firms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `firm_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees_x_firms`
--

INSERT INTO `employees_x_firms` (`id`, `employee_id`, `firm_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 4),
(4, 3, 5),
(5, 4, 6),
(6, 4, 7),
(7, 4, 8),
(8, 4, 9),
(9, 4, 10),
(10, 5, 11),
(11, 6, 12),
(12, 6, 13),
(13, 8, 23);

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

DROP TABLE IF EXISTS `firms`;
CREATE TABLE IF NOT EXISTS `firms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime_firme` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`id`, `ime_firme`, `created_at`, `updated_at`) VALUES
(2, 'nova', '2017-03-22 14:55:48', '2017-03-22 14:55:48'),
(3, 'neka druga nova', '2017-03-22 14:58:30', '2017-03-22 14:58:30'),
(4, 'Apoteka Stamenkovic', '2017-03-22 14:58:48', '2017-03-22 14:58:48'),
(5, 'Apoteka Velimirovic', '2017-03-22 15:11:27', '2017-03-22 15:11:27'),
(6, 'Pekara ''''Bojana"', '2017-03-22 15:25:31', '2017-03-22 15:25:31'),
(7, 'Neka peta firma', '2017-03-22 15:26:01', '2017-03-22 15:26:01'),
(8, 'Firma 8', '2017-03-22 15:26:09', '2017-03-22 15:26:09'),
(9, 'Prodavnica', '2017-03-22 15:37:11', '2017-03-22 15:37:11'),
(10, 'Stadion DOO', '2017-03-22 15:37:30', '2017-03-22 15:37:30'),
(11, 'Microsoft', '2017-03-22 15:38:06', '2017-03-22 15:38:06'),
(12, 'Energoprojekt', '2017-03-22 15:38:41', '2017-03-22 15:38:41'),
(13, 'Energoprojekt Entel', '2017-03-22 15:39:03', '2017-03-22 15:39:03'),
(14, 'aaaaaa', '2017-03-23 20:11:31', '2017-03-23 20:11:31'),
(15, 'aaaaaa', '2017-03-23 20:12:15', '2017-03-23 20:12:15'),
(16, '''kjgh''k''h'')`12`', '2017-03-23 20:12:23', '2017-03-23 20:12:23'),
(17, 'fasdfsdfs', '2017-03-23 20:24:40', '2017-03-23 20:24:40'),
(18, 'Blejacka Kompanija', '2017-03-23 20:28:02', '2017-03-23 20:28:02'),
(19, 'Blejacka Kompanija', '2017-03-23 20:28:26', '2017-03-23 20:28:26'),
(20, 'Blejacka Kompanija', '2017-03-23 20:28:39', '2017-03-23 20:28:39'),
(21, 'Blejacka Kompanija', '2017-03-23 20:28:48', '2017-03-23 20:28:48'),
(22, 'Blejacka Kompanija', '2017-03-23 20:29:08', '2017-03-23 20:29:08'),
(23, 'Test4', '2017-03-23 20:30:45', '2017-03-23 20:30:45');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
