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
  `store_name` varchar(100) NOT NULL,
  `store_code` varchar(100) NOT NULL,
  `taluk` varchar(100) NOT NULL,
  `district` text NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker_login`
--

INSERT INTO `worker_login` (`id`, `worker_name`, `password`, `position`, `Status`, `mobile`, `mail`, `store_name`, `store_code`, `taluk`, `district`, `date_joined`) VALUES
(0001, 'Admin', '123', 'Administrator', 0, 123465789, 'admin.01@gmail.com', '', '', '', '', '2018-11-01'),
(0002, 'Supplier', '123', 'Supplier', 0, 1234567890, 'supplier.01@gmail.com', 'Perundurai', 'ERPPRI01', 'Perundurai', 'Erode', '2018-11-14'),
(0003, 'Supervisor', '123', 'Supervisor', 0, 1324567890, 'supervisor.01@gmail.com', '', '', 'Perundurai', 'Erode', '2018-11-06');

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
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
