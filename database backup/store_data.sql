-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2018 at 07:00 AM
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
-- Table structure for table `store_data`
--

CREATE TABLE `store_data` (
  `store_id` int(5) NOT NULL,
  `store_name` varchar(20) NOT NULL,
  `in_charge` varchar(20) NOT NULL,
  `mobile` int(10) NOT NULL,
  `total_cards` int(10) NOT NULL,
  `taluk` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `required_rice` int(10) NOT NULL,
  `available_rice` int(10) NOT NULL,
  `alloted_rice` int(10) NOT NULL,
  `remaining_rice` int(10) NOT NULL,
  `required_sugar` int(10) NOT NULL,
  `available_sugar` int(10) NOT NULL,
  `alloted_sugar` int(10) NOT NULL,
  `remaining_sugar` int(10) NOT NULL,
  `required_wheat` int(10) NOT NULL,
  `available_wheat` int(10) NOT NULL,
  `alloted_wheat` int(10) NOT NULL,
  `remaining_wheat` int(10) NOT NULL,
  `required_dhall` int(10) NOT NULL,
  `available_dhall` int(10) NOT NULL,
  `alloted_dhall` int(10) NOT NULL,
  `remaining_dhall` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_data`
--
ALTER TABLE `store_data`
  ADD PRIMARY KEY (`store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_data`
--
ALTER TABLE `store_data`
  MODIFY `store_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
