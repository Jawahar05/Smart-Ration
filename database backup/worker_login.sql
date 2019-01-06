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
-- Table structure for table `worker_login`
--

CREATE TABLE `worker_login` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `worker_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  `mobile` int(15) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `store_name` varchar(100) NOT NULL DEFAULT 'N/A',
  `taluk` varchar(100) NOT NULL DEFAULT 'N/A',
  `district` text NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker_login`
--

INSERT INTO `worker_login` (`id`, `worker_name`, `password`, `position`, `Status`, `mobile`, `mail`, `store_name`, `taluk`, `district`, `date_joined`) VALUES
(0003, 'Supplier', '123', 'supplier', 0, 456, 'supplier@gmail.com', 'Perundurai', 'Perundurai', 'Erode', '2018-12-29'),
(0004, 'Supervisor', '123', 'supervisor', 0, 789, 'supervisor@gmail.com', '', '', 'Erode', '2018-12-29'),
(0005, 'Jawahar T', '123', 'administrator', 0, 850, 'ram@ram.arw', '', '', '', '2018-12-29'),
(0009, 'JAwa har', '123', 'supervisor', 0, 408, 'Supplier@asd.asd', '', '', 'Kanyakumari', '2019-01-05'),
(0010, 'JAwa haar', '123', 'administrator', 0, 409, 'Supplier@asd.asd', '', '', '', '2019-01-05'),
(0011, 'Admin', '123', 'administrator', 0, 123, 'admin@gmail.com', '', '', '', '2019-01-05'),
(0015, 'dinesh a', '123', 'supplier', 0, 994, 'dinesh@gmail.com', 'Perundurai', 'Perundurai', 'Erode', '2019-01-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `worker_login`
--
ALTER TABLE `worker_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `worker_login`
--
ALTER TABLE `worker_login`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
