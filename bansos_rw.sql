-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 04:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansos_rw`
--

-- --------------------------------------------------------

--
-- Table structure for table `bansos`
--

CREATE TABLE `bansos` (
  `id_jenisbansos` int(11) NOT NULL,
  `asal_bansos` varchar(20) NOT NULL,
  `jenis_bansos` varchar(20) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemerima_bansos`
--

CREATE TABLE `pemerima_bansos` (
  `id_penerimabansos` int(11) NOT NULL,
  `id_jenisbansos` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status` enum('Pernah','TIdak pernah') NOT NULL,
  `agama` enum('Islam','Protestan','Katholik','Hindu','Budha','Konghucu') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `pengeluaran` enum('< 500.000','>=500.000 - <=1.000.000','>1.000.000 - <=2.500.000','>2.500.000') NOT NULL,
  `pendapatan` enum('< 500.000','>=500.000 - <=1.000.000','>1.000.000 - <=2.500.000','>2.500.000') NOT NULL,
  `jml_tanggungan` int(11) NOT NULL,
  `jenis_bansos` enum('BPNT','BLT','PKH','BSB') NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id_petugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

CREATE TABLE `rw` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Rw','Rt') NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bansos`
--
ALTER TABLE `bansos`
  ADD PRIMARY KEY (`id_jenisbansos`);

--
-- Indexes for table `pemerima_bansos`
--
ALTER TABLE `pemerima_bansos`
  ADD PRIMARY KEY (`id_penerimabansos`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_jenisbansos` (`id_jenisbansos`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bansos`
--
ALTER TABLE `bansos`
  MODIFY `id_jenisbansos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemerima_bansos`
--
ALTER TABLE `pemerima_bansos`
  MODIFY `id_penerimabansos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rw`
--
ALTER TABLE `rw`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemerima_bansos`
--
ALTER TABLE `pemerima_bansos`
  ADD CONSTRAINT `pemerima_bansos_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `rw` (`id_admin`),
  ADD CONSTRAINT `pemerima_bansos_ibfk_2` FOREIGN KEY (`id_jenisbansos`) REFERENCES `bansos` (`id_jenisbansos`),
  ADD CONSTRAINT `pemerima_bansos_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `rt` (`id_petugas`);

--
-- Constraints for table `rt`
--
ALTER TABLE `rt`
  ADD CONSTRAINT `rt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `rw`
--
ALTER TABLE `rw`
  ADD CONSTRAINT `rw_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
