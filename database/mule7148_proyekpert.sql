-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2019 at 12:49 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mule7148_proyekpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `updated` varchar(20) DEFAULT NULL,
  `updater` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `status`, `updated`, `updater`) VALUES
(1, 'Jabbar', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_basis_aturan`
--

CREATE TABLE `tbl_basis_aturan` (
  `id_basis` int(10) NOT NULL,
  `kode_kegiatan` varchar(20) DEFAULT NULL,
  `kegiatan_sebelumnya` varchar(150) DEFAULT NULL,
  `kegiatan_setelahnya` varchar(150) NOT NULL,
  `updated` varchar(20) NOT NULL,
  `updater` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_basis_aturan`
--

INSERT INTO `tbl_basis_aturan` (`id_basis`, `kode_kegiatan`, `kegiatan_sebelumnya`, `kegiatan_setelahnya`, `updated`, `updater`) VALUES
(11, 'KEG000000001', '', 'KEG000000002', '2018-06-11 00:33:41', 'admin'),
(14, 'KEG000000002', 'KEG000000001', 'KEG000000003', '2018-06-11 00:37:42', 'admin'),
(15, 'KEG000000003', 'KEG000000002', 'KEG000000004', '2018-06-11 00:38:16', 'admin'),
(16, 'KEG000000004', 'KEG000000002', 'KEG000000005', '2018-06-11 00:38:23', 'admin'),
(17, 'KEG000000005', 'KEG000000004', '', '2018-06-10 23:19:49', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jalurkritis`
--

CREATE TABLE `tbl_jalurkritis` (
  `id_jalurkritis` int(10) NOT NULL,
  `kode_project` varchar(20) NOT NULL,
  `nama_jalur` varchar(20) NOT NULL,
  `earliest_start` double NOT NULL DEFAULT '0',
  `latest_finish` double NOT NULL DEFAULT '0',
  `updated` varchar(20) DEFAULT NULL,
  `updater` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jalurkritis`
--

INSERT INTO `tbl_jalurkritis` (`id_jalurkritis`, `kode_project`, `nama_jalur`, `earliest_start`, `latest_finish`, `updated`, `updater`) VALUES
(1, 'PRO0000001', 'Jalur2', 9, 27, '2018-06-11 13:17:24', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jaringankerja`
--

CREATE TABLE `tbl_jaringankerja` (
  `id_jaringankerja` int(10) NOT NULL,
  `kode_project` varchar(20) NOT NULL,
  `nama_jalur` varchar(20) NOT NULL,
  `urutan_kegiatan` text NOT NULL,
  `jaringan_1` double NOT NULL DEFAULT '0',
  `jaringan_2` double NOT NULL DEFAULT '0',
  `jaringan_3` double NOT NULL DEFAULT '0',
  `jaringan_4` double NOT NULL DEFAULT '0',
  `jaringan_5` double NOT NULL DEFAULT '0',
  `jaringan_6` double NOT NULL DEFAULT '0',
  `jaringan_7` double NOT NULL DEFAULT '0',
  `jaringan_8` double NOT NULL DEFAULT '0',
  `jaringan_9` double NOT NULL DEFAULT '0',
  `jaringan_10` double NOT NULL DEFAULT '0',
  `updated` varchar(20) NOT NULL,
  `updater` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jaringankerja`
--

INSERT INTO `tbl_jaringankerja` (`id_jaringankerja`, `kode_project`, `nama_jalur`, `urutan_kegiatan`, `jaringan_1`, `jaringan_2`, `jaringan_3`, `jaringan_4`, `jaringan_5`, `jaringan_6`, `jaringan_7`, `jaringan_8`, `jaringan_9`, `jaringan_10`, `updated`, `updater`) VALUES
(1, 'PRO0000001', 'Jalur1', 'KEG000000001,KEG000000002,KEG000000003,KEG000000005', 4, 6, 2, 4, 0, 0, 0, 0, 0, 0, '2018-06-11 11:51:08', 'admin'),
(2, 'PRO0000001', 'Jalur2', 'KEG000000001,KEG000000002,KEG000000004,KEG000000005', 4, 6, 4, 4, 0, 0, 0, 0, 0, 0, '2018-06-11 11:51:33', 'admin'),
(3, 'PRO0000001', 'Jalur3', 'KEG000000001,,,KEG000000005', 4, 0, 0, 4, 0, 0, 0, 0, 0, 0, '2018-06-11 12:32:14', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(10) NOT NULL,
  `kode_project` varchar(20) NOT NULL DEFAULT '0',
  `kode_kegiatan` varchar(20) NOT NULL DEFAULT '0',
  `nama_kegiatan` varchar(200) NOT NULL DEFAULT '0',
  `waktuselesai_optimis` double NOT NULL DEFAULT '0',
  `waktuselesai_realistis` double NOT NULL DEFAULT '0',
  `waktuselesai_pesimis` double NOT NULL DEFAULT '0',
  `waktuselesai_perkiraan` double NOT NULL DEFAULT '0',
  `updated` varchar(20) NOT NULL DEFAULT '0',
  `updater` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `kode_project`, `kode_kegiatan`, `nama_kegiatan`, `waktuselesai_optimis`, `waktuselesai_realistis`, `waktuselesai_pesimis`, `waktuselesai_perkiraan`, `updated`, `updater`) VALUES
(6, 'PRO0000001', 'KEG000000001', 'Pengukuran Jalan', 2, 3, 5, 3.17, '2018-06-10 02:21:57', 'admin'),
(7, 'PRO0000001', 'KEG000000002', 'Pengkikisan Jalan dengan Alat Berat', 3, 6, 8, 5.83, '2018-06-10 15:41:13', 'admin'),
(8, 'PRO0000001', 'KEG000000003', 'Meratakan jalan dengan alat berat', 1, 2, 3, 2, '2018-06-10 15:36:10', 'admin'),
(9, 'PRO0000001', 'KEG000000004', 'Penyiraman Aspal', 2, 3, 7, 3.5, '2018-06-10 15:36:18', 'admin'),
(11, 'PRO0000001', 'KEG000000005', 'Pengaspalan dan Pemberian Marka', 2, 3, 7, 3.5, '2018-06-10 15:42:46', 'admin'),
(12, 'PRO0000002', 'KEG000000006', 'Pembuatan Pondasi', 2, 6, 12, 6.33, '2018-06-10 16:59:13', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id_project` int(20) NOT NULL,
  `kode_project` varchar(20) NOT NULL DEFAULT '0',
  `nama_project` varchar(250) NOT NULL DEFAULT '0',
  `updated` varchar(20) NOT NULL DEFAULT '0',
  `updater` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id_project`, `kode_project`, `nama_project`, `updated`, `updater`) VALUES
(1, 'PRO0000001', 'Pembangunan Jalan Raya', '2018-06-10 13:10:19', 'admin'),
(4, 'PRO0000002', 'Pembuatan Gapura Batas Kabupaten', '2018-06-10 13:32:27', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_basis_aturan`
--
ALTER TABLE `tbl_basis_aturan`
  ADD PRIMARY KEY (`id_basis`);

--
-- Indexes for table `tbl_jalurkritis`
--
ALTER TABLE `tbl_jalurkritis`
  ADD PRIMARY KEY (`id_jalurkritis`);

--
-- Indexes for table `tbl_jaringankerja`
--
ALTER TABLE `tbl_jaringankerja`
  ADD PRIMARY KEY (`id_jaringankerja`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD UNIQUE KEY `kode_kegiatan` (`kode_kegiatan`),
  ADD KEY `kode_project` (`kode_project`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id_project`),
  ADD UNIQUE KEY `kode_project` (`kode_project`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_basis_aturan`
--
ALTER TABLE `tbl_basis_aturan`
  MODIFY `id_basis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_jalurkritis`
--
ALTER TABLE `tbl_jalurkritis`
  MODIFY `id_jalurkritis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jaringankerja`
--
ALTER TABLE `tbl_jaringankerja`
  MODIFY `id_jaringankerja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id_project` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
