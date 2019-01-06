-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 04:13 PM
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
-- Dumping data for table `store_data`
--

INSERT INTO `store_data` (`store_id`, `store_name`, `in_charge`, `mobile`, `total_cards`, `district`, `required_rice`, `available_rice`, `alloted_rice`, `remaining_rice`, `required_sugar`, `available_sugar`, `alloted_sugar`, `remaining_sugar`, `required_wheat`, `available_wheat`, `alloted_wheat`, `remaining_wheat`, `required_dhall`, `available_dhall`, `alloted_dhall`, `remaining_dhall`) VALUES
(1, 'Anthiyur', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Bhavani', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Erode', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Gobichettipalayam', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Kodumudi', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Modakurichi', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Nambiyur', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Perundurai', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Sathyamangalam', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Thalavadi', '', 0, 0, 'Erode', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Annur', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Coimbatore (Central)', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Coimbatore (East)', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Coimbatore (North)', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'Coimbatore (South)', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'Coimbatore (West)', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'Kinathukaduvu', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'Mettupalayam', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'Pollachi', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'Sulur', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'Valparai', '', 0, 0, 'Coimbatore', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  MODIFY `store_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
