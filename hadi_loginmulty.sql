c-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 09:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hadi_loginmulty`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_absen_siswa`
--

CREATE TABLE `data_absen_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `absen_datetime` datetime NOT NULL,
  `status` enum('Hadir','Sakit','Izin') NOT NULL,
  `alasan` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_absen_siswa`
--

INSERT INTO `data_absen_siswa` (`id`, `nama`, `kelas`, `absen_datetime`, `status`, `alasan`, `timestamp`) VALUES
(39, 'fahri', 'XI RPL 1', '2023-08-22 23:54:00', 'Hadir', '', '2023-08-22 16:54:47'),
(40, 'user', '', '2023-08-23 00:07:00', 'Hadir', '', '2023-08-22 17:07:49'),
(41, 'user', '', '2023-08-23 00:10:00', 'Sakit', '', '2023-08-22 17:10:17'),
(42, 'admin', '', '2023-08-23 01:18:00', 'Hadir', '', '2023-08-22 18:18:54'),
(43, 'admin', '', '2023-08-23 01:19:00', 'Sakit', '', '2023-08-22 18:19:01'),
(44, 'admin', '', '2023-08-23 01:20:00', 'Sakit', '', '2023-08-22 18:20:35'),
(45, 'admin', '', '2023-08-23 01:21:00', 'Sakit', '', '2023-08-22 18:21:12'),
(46, 'admin', '', '2023-08-23 01:21:00', 'Sakit', '', '2023-08-22 18:21:20'),
(47, 'admin', '', '2023-08-23 01:21:00', 'Sakit', '', '2023-08-22 18:21:38'),
(48, 'admin', '', '2023-08-23 01:21:00', 'Sakit', '', '2023-08-22 18:21:57'),
(49, 'admin', '', '2023-08-23 01:22:00', 'Sakit', '', '2023-08-22 18:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `kelas`, `password`, `role`, `nama_admin`) VALUES
(1, 'user', '', 'user', 'user', NULL),
(2, 'admin', '', 'admin', 'admin', 'fahri'),
(3, 'fahri', 'XI RPL 1', 'fahri', 'user', 'fahri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_absen_siswa`
--
ALTER TABLE `data_absen_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_absen_siswa`
--
ALTER TABLE `data_absen_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
