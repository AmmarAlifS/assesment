-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `antar`
--

CREATE TABLE `antar` (
  `id_antar` int(16) NOT NULL,
  `username` varchar(266) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `start_lat` decimal(9,6) NOT NULL,
  `end_lat` decimal(9,6) NOT NULL,
  `start_lng` decimal(9,6) NOT NULL,
  `end_lng` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antar`
--

INSERT INTO `antar` (`id_antar`, `username`, `alamat`, `nohp`, `dari`, `destination`, `start_lat`, `end_lat`, `start_lng`, `end_lng`) VALUES
(1, 'Ammar', 'Bandung Kota', '085722053080', 'Universitas Widyatama, Jl. Cikutra No.204A, Cikutra, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40125', 'Lapang Gasibu, Jl. Diponegoro No.1, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', -6.922858, -6.900366, 107.634522, 107.618568),
(14, 'Ammar', 'Margahayu', '085722053080', 'Jl. Soekarno Hatta No.628, Manjahlega, Kec. Rancasari, Kota Bandung, Jawa Barat 40111\r\n', 'Universitas Widyatama, Jl. Cikutra No.204A, Cikutra, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40125', -6.912972, -6.899698, 107.617711, 107.611916),
(15, 'Adi', 'Ciamis', '083677821375', 'Universitas Widyatama, Jl. Cikutra No.204A, Cikutra, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40125', 'Jl. Diponegoro No.22, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', -6.899698, -6.903671, 107.611916, 107.617936);

-- --------------------------------------------------------

--
-- Table structure for table `jemput`
--

CREATE TABLE `jemput` (
  `id_jemput` int(17) NOT NULL,
  `username` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `dari` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `start_lat` decimal(9,6) NOT NULL,
  `end_lat` decimal(9,6) NOT NULL,
  `start_lng` decimal(9,6) NOT NULL,
  `end_lng` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jemput`
--

INSERT INTO `jemput` (`id_jemput`, `username`, `alamat`, `nohp`, `dari`, `destination`, `start_lat`, `end_lat`, `start_lng`, `end_lng`) VALUES
(1, 'Ammar', 'Margahayu', '085722053080', 'Universitas Widyatama, Jl. Cikutra No.204A, Cikutra, Kec. Cibeunying Kaler, Kota Bandung, Jawa Barat 40125', 'Lapang Gasibu, Jl. Diponegoro No.1, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', -6.922858, -6.900366, 107.634522, 107.618568);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `username`, `latitude`, `longitude`, `timestamp`) VALUES
(1, 'Ammar', -6.917500, 107.619100, '2024-08-10 10:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` text NOT NULL,
  `akses` int(16) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `alamat`, `nohp`, `akses`, `status`) VALUES
(3, 'Ammar', 'b11b42ebdebef67a1ab1013c244812931a4405e2a34de2af22a0a1d0', 'Jl. Soekarno Hatta No.628, Manjahlega, Kec. Rancasari, Kota Bandung, Jawa Barat 40111\r\n', '085722053080', 1, 1),
(4, 'Driver', '7b496faf39c48cc7c4646421dc155b85b6dc3e69400114a20e85b92f', 'Bandung', '086700931483', 2, 1),
(8, 'Admin', '58acb7acccce58ffa8b953b12b5a7702bd42dae441c1ad85057fa70b', 'Bandung', '087633849059', 2, 1),
(9, 'Adi', '51c9ad2f8f6eccc42efdefbef27577534ab608112e6afc3a8a14d874', 'CiamisJl. Diponegoro No.22, Citarum, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40115', '083677821375', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antar`
--
ALTER TABLE `antar`
  ADD PRIMARY KEY (`id_antar`);

--
-- Indexes for table `jemput`
--
ALTER TABLE `jemput`
  ADD PRIMARY KEY (`id_jemput`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antar`
--
ALTER TABLE `antar`
  MODIFY `id_antar` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jemput`
--
ALTER TABLE `jemput`
  MODIFY `id_jemput` int(17) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
