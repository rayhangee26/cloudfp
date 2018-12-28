-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 28, 2017 at 08:55 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fpcloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(100) NOT NULL,
  `nama_kelas` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('667c1dd8-42fb-11e7-8769-8cef0960c7c5', 'A'),
('667dddbc-42fb-11e7-8769-8cef0960c7c5', 'B'),
('667f0250-42fb-11e7-8769-8cef0960c7c5', 'C'),
('66800b14-42fb-11e7-8769-8cef0960c7c5', 'D'),
('6681111c-42fb-11e7-8769-8cef0960c7c5', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_ambil`
--

CREATE TABLE `kelas_ambil` (
  `id_kelas_ambil` varchar(100) NOT NULL,
  `id_kelas` varchar(100) DEFAULT NULL,
  `nrp` varchar(100) DEFAULT NULL,
  `id_matkul` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas_ambil`
--

INSERT INTO `kelas_ambil` (`id_kelas_ambil`, `id_kelas`, `nrp`, `id_matkul`) VALUES
('b2dbdf00-42fe-11e7-90f5-ed181d8da4db', '667dddbc-42fb-11e7-8769-8cef0960c7c5', '5114100192', 'ad5c8fb2-42fb-11e7-8769-8cef0960c7c5');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(100) NOT NULL,
  `nama` varchar(256) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `password`, `remember_token`) VALUES
('5114100192', 'Fikry Khairytamim', '$2y$10$zC12lxnEWLKmqyQ8yn25FuKyCbXiehnfLmRFzhCe0lCEqqr6r7k0.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` varchar(100) NOT NULL,
  `nama_matkul` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`) VALUES
('ad59cf70-42fb-11e7-8769-8cef0960c7c5', 'Sistem Digital'),
('ad5c8fb2-42fb-11e7-8769-8cef0960c7c5', 'Organisasi Komputer'),
('ad5da050-42fb-11e7-8769-8cef0960c7c5', 'Sistem Operasi'),
('ad5ec5ca-42fb-11e7-8769-8cef0960c7c5', 'Jaringan Komputer'),
('ad5fc86c-42fb-11e7-8769-8cef0960c7c5', 'Pemrograman Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_ambil`
--
ALTER TABLE `kelas_ambil`
  ADD PRIMARY KEY (`id_kelas_ambil`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;