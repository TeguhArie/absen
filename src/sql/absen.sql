-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2023 pada 02.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_absen`
--

CREATE TABLE `data_absen` (
  `id` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(200) NOT NULL,
  `status` enum('hadir','sakit','izin') NOT NULL,
  `alasan` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `absen_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_absen`
--

INSERT INTO `data_absen` (`id`, `nama`, `kelas`, `status`, `alasan`, `timestamp`, `absen_datetime`) VALUES
(31, 'fahri', 'XI-RPL', 'hadir', '', '2023-11-20 04:32:55', '2023-11-20 11:32:00'),
(32, 'aul', 'x', 'hadir', '', '2023-11-20 04:39:43', '2023-11-20 11:39:00'),
(33, 'sadam', 'XI', 'hadir', '', '2023-11-21 01:31:15', '2023-11-21 08:31:00'),
(34, 'sadam', 'XI', 'hadir', '', '2023-11-21 03:00:34', '2023-11-21 10:00:00'),
(35, 'sadam', 'XI', 'izin', 'mau memerdekakan padang', '2023-11-21 03:00:59', '2023-11-21 10:00:00'),
(36, 'sadam', 'XI', 'hadir', '', '2023-11-21 03:02:15', '2023-11-21 10:02:00'),
(37, 'nurman', 'XI-RPL', 'izin', 'ingin memerdekakan padang', '2023-11-21 03:14:16', '2023-11-21 10:14:00'),
(38, 'nurman', 'XI-RPL', 'hadir', '', '2023-11-21 13:33:48', '2023-11-21 20:33:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(200) NOT NULL,
  `password` char(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `kelas`, `password`, `role`, `nama_admin`) VALUES
(1, 'admin', '', 'admin', 'admin', 'mk'),
(4, '', '', 'user', '', ''),
(5, '', '', 'sandi115', '', ''),
(115, 'rezakecap', 'x-rpl-1', 'inihpassword', 'user', ''),
(121, 'Teguh', 'XI', '', '', ''),
(122, 'Teguh', 'XI', 'rafi kontol', '', ''),
(123, 'Teguh', 'XI', '', '', ''),
(125, 'rafi', 'XI', 'coba', '', ''),
(126, 'fahri', 'XI-RPL', 'aul', '', ''),
(127, 'aul', 'x', 'aan', '', ''),
(128, 'sadam', 'XI', 'sadam', '', ''),
(130, 'nurman', 'XI-RPL', 'padang', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
