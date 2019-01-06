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
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) NOT NULL,
  `card_number` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `district` varchar(20) NOT NULL,
  `store` varchar(25) NOT NULL,
  `members` int(2) NOT NULL,
  `card_type` varchar(25) NOT NULL,
  `rice` varchar(3) NOT NULL DEFAULT '0',
  `sugar` varchar(3) NOT NULL DEFAULT '0',
  `dhall` varchar(3) NOT NULL DEFAULT '0',
  `wheat` varchar(3) NOT NULL DEFAULT '0',
  `date_joined` date NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_status` tinyint(1) NOT NULL DEFAULT '0',
  `reservation_set` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `card_number`, `name`, `mobile`, `address`, `district`, `store`, `members`, `card_type`, `rice`, `sugar`, `dhall`, `wheat`, `date_joined`, `reservation_date`, `reservation_status`, `reservation_set`) VALUES
(1, '191218050617', 'Jawahar T', '8508904053', '122, Thoppupalayam, Perundurai', 'erode', 'perundurai', 4, 'commodity', '0', '0', '0', '0', '2018-12-19', '0000-00-00', 0, 0),
(2, '201218114148', 'Ramakrishnan Ki', '9629179161', '1256, TNHB Colony, Singanallur', 'coimbatore', 'erode', 4, 'commodity', '0', '0', '0', '0', '2018-12-20', '0000-00-00', 0, 0),
(3, '221218051150', 'CardHolder', '', '', '', '', 0, 'commodity', '0', '0', '0', '0', '2018-12-22', '0000-00-00', 0, 0),
(4, '221218051222', 'CardHolder', '', '', '', '', 0, 'commodity', '0', '0', '0', '0', '2018-12-22', '0000-00-00', 0, 0),
(5, '221218051443', 'CardHolder', '8344778408', '', 'Erode', 'Perundurai', 5, 'commodity', '0', '0', '0', '0', '2018-12-22', '0000-00-00', 0, 0),
(6, '221218051716', 'CardHolder', '45784251', '121, name, areas', 'Erode', 'Perundurai', 5, 'commodity', '0', '0', '0', '0', '2018-12-22', '0000-00-00', 0, 0),
(7, '221218051904', 'Jawahar T', '9942074581', '123, street, town', 'Erode', 'Perundurai', 3, 'commodity', '0', '0', '0', '0', '2018-12-22', '0000-00-00', 0, 0),
(8, '271218092109', ' ', '', ', , ', '', ' Pollachi', 5, 'sugar', '0', '0', '0', '0', '2018-12-27', '0000-00-00', 0, 0),
(9, '291218110718', 'First Last', '123', '122, Street, Town', 'Erode', ' Perundurai', 5, 'sugar', '0', '0', '0', '0', '2018-12-29', '0000-00-00', 0, 0),
(10, '291218110847', 'Firls Last', '123456', '122, asd, sdf', 'Coimbatore', ' Gobichettipalayam', 55, 'commodity', '0', '0', '0', '0', '2018-12-29', '0000-00-00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
