-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 15, 2023 at 09:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, NULL, NULL, 'christiankyle.autor', 'kyle123'),
(2, NULL, NULL, 'christiankyle.autor', 'kyle123'),
(3, 'Josh Aj', 'Chin', 'josh.chin', 'josh123'),
(4, 'Admin', 'Administrator', 'admin', 'admin123'),
(5, 'Aiko', 'Canedo', 'christiankyle.autor', 'aiko123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id` int(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `firstname`, `lastname`, `gender`, `contact`, `email`) VALUES
(4, 'Jee Ann', 'Guinsod', 'Female', '092783660669', 'jian@gmail.com'),
(5, 'Jared ', 'Busanosdsda', 'Male', '091234567890', 'jared@gmail.com'),
(7, 'Ahrrol', 'Cervantes', 'Male', '0987654321', 'ahrrol@gmail.com'),
(8, 'Rexon', 'Timbal', 'Male', '09231456876', 'rexon@gmail.com'),
(10, 'Jason Arvin', 'Cardona', 'Male', '09812371231', 'jason@gmail.com'),
(11, 'Josh', 'Chin', 'Male', '09123121312', 'josh@gmail.com'),
(14, 'Rexon ', 'Salas', 'Male', '091238124812', 'rexon2@gmail.com'),
(15, 'Jimin', 'Park', 'Male', '0918316241274', 'jimin@gmail.com'),
(16, 'Lisa', 'Manoban', 'Female', '098316414721', 'lisa@gmail.com'),
(18, 'Kris', 'Boligor', 'Male', '091741217231', 'kris@gmail.com'),
(19, 'Joseph', 'Vistal', 'Male', '098121642124', 'joseph@gmail.com'),
(21, 'Henry', 'Sy', 'Male', '09141213128', 'henry@gmail.com'),
(22, 'Jelly', 'Cabodbod', 'Female', '09123147124', 'jelly@gmail.com'),
(26, 'Mae Ann', 'Salas', 'Female', '0914274123412', 'batapakokol123@gmail.com'),
(28, 'Jungwon', 'Losdoce', 'Female', '09141234123', 'jungwon@gmail.com'),
(30, 'Marvin', 'Sendrejas', 'Male', '09158585694', 'jugnwon@gmail.com'),
(31, 'Christian Kyle', 'Autor', 'Male', '09158585694', 'cautor3@gmail.com'),
(32, 'maeann', 'abasolo', 'Female', '09312312312', 'maeann@gmail.com'),
(33, 'Rexon Timbal', 'Chin', 'Male', '09831241234', 'chin@gmail.com'),
(34, 'Ronald', 'Monzon', 'Male', '09831231231', 'monzon2k11@gmail.com'),
(36, 'Aika ', 'Baguihin', 'Female', '09123456789', 'aika@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
