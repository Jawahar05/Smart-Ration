-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 04:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartration`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(5) NOT NULL,
  `date_cal` int(5) NOT NULL,
  `day_cal` varchar(256) NOT NULL,
  `bool_hol` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `date_cal`, `day_cal`, `bool_hol`) VALUES
(1, 1, 'Holiday - New year', 1),
(2, 2, '', 0),
(3, 3, '', 0),
(4, 4, '', 0),
(5, 5, '', 0),
(6, 6, 'Holiday', 1),
(7, 7, '', 0),
(8, 8, '', 0),
(9, 9, '', 0),
(10, 10, '', 0),
(11, 11, '', 0),
(12, 12, 'Holiday - Second Saturday', 1),
(13, 13, 'Holiday', 1),
(14, 14, '', 0),
(15, 15, 'Holiday - Pongal', 1),
(16, 16, '', 0),
(17, 17, '', 0),
(18, 18, '', 0),
(19, 19, '', 0),
(20, 20, 'Holiday', 1),
(21, 21, '', 0),
(22, 22, '', 0),
(23, 23, '', 0),
(24, 24, '', 0),
(25, 25, '', 0),
(26, 26, 'Holiday - Last Saturday', 1),
(27, 27, 'Holiday', 1),
(28, 28, '', 0),
(29, 29, '', 0),
(30, 30, '', 0),
(31, 31, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
