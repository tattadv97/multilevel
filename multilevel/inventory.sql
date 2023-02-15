-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 08:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_cif` int(11) NOT NULL,
  `id_ld` varchar(100) NOT NULL,
  `nama_nasabah` varchar(100) NOT NULL,
  `tanggal_keluar` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `status_agunan` varchar(15) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `marketing` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id_keluar`, `id_cif`, `id_ld`, `nama_nasabah`, `tanggal_keluar`, `tanggal_pinjam`, `penerima`, `status_agunan`, `keperluan`, `marketing`) VALUES
(7, 222, 'LD222', 'Ptra', '2023-01-09', '2023-01-09', 'Istri an. Fiya Ramadhani', 'LUNAS', 'KPR', 'Mukhtar Ardhika'),
(8, 111, 'LD111', 'Rian Rudianto', '2023-01-09', '2023-01-09', 'Ahmad', 'LUNAS', 'admin@bankbsi.co.id', 'Mukhtar Ardhika');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`, `role`) VALUES
(2, 'admin@bankbsi.co.id', '12345', 'admin'),
(3, 'putra@bankbsi.co.id', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id_mar` int(11) NOT NULL,
  `npk` varchar(15) NOT NULL,
  `nama_marketing` varchar(25) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `email_mar` varchar(40) NOT NULL,
  `telp_mar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id_mar`, `npk`, `nama_marketing`, `divisi`, `email_mar`, `telp_mar`) VALUES
(4, 'BSI29074568', 'Andi Bahrudin', 'Consumer', 'andibah@bankbsi.co.id', '0100000299938'),
(6, 'BSI2022161120', 'Roni Zuli Putra', 'Consumer', 'ronizp@bankbsi.co.id', '089867890987'),
(7, 'BSI8888909090', 'Arief Syarifudin', 'Mikro', 'ariefsyar@bankbsi.co.id', '087467890101'),
(8, 'BSI202356488', 'Ahmad Bonik', 'Mikro', 'bonik@bankbsi.co.id', '081267890987'),
(15, 'BSI202129229', 'Mukhtar Ardhika', 'Mikro', 'mukdhika@bankbsi.co.id', '089866557821'),
(16, 'BSI87890987', 'Dwiyanto', 'Mikro', 'dwiyanto@bankbsi.co.id', '00000999009'),
(17, 'BSI090188290', 'Ambarita', 'Mikro', 'ambarita@bankbsi.co.id', '081335333670');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_cif` int(11) NOT NULL,
  `id_ld` varchar(25) NOT NULL,
  `nama_nasabah` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `lemari_document` varchar(20) NOT NULL,
  `jangka_agunan` date NOT NULL,
  `jangka_selesai` date NOT NULL,
  `tanggal_masuk` varchar(10) DEFAULT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status_agunan` varchar(15) NOT NULL,
  `upload_document` varchar(1000) NOT NULL,
  `marketing` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id_masuk`, `id_cif`, `id_ld`, `nama_nasabah`, `jenis_kelamin`, `lemari_document`, `jangka_agunan`, `jangka_selesai`, `tanggal_masuk`, `deskripsi`, `pekerjaan`, `telp`, `email`, `alamat`, `status_agunan`, `upload_document`, `marketing`) VALUES
(24, 222, 'LD222', 'Ptra', 'Laki-laki', 'A-Slot/1 1-50', '2019-06-18', '2028-10-12', '2023-01-09', 'KPR', 'Karyawan Swasta', '09288300029', 'lolo@hhhh.com', 'bbjn', 'LUNAS', 'attachmentFile_Ptra_09-01-2023 _ 08.03.11.pdf', 'Mukhtar Ardhika'),
(25, 111, 'LD111', 'Rian Rudianto', 'Perempuan', 'D-Slot/2 51-100', '2021-06-16', '2026-10-23', '2023-01-09', 'admin@bankbsi.co.id', 'Mahasiswa', '09288300029', 'dsfinsin@gmail.com', 'kkmmjhhhskks', 'BELUM LUNAS', 'attachmentFile_Rian_Rudianto_09-01-2023 _ 08.04.12.pdf', 'Roni Zuli Putra');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `id_cif` int(11) NOT NULL,
  `id_ld` varchar(100) NOT NULL,
  `nama_nasabah` varchar(40) NOT NULL,
  `tanggal_kembali` varchar(10) NOT NULL,
  `pengembalian` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_cif`, `id_ld`, `nama_nasabah`, `tanggal_kembali`, `pengembalian`, `status`) VALUES
(9, 222, 'LD222', 'Ptra', '2023-01-09', 'Mukhtar Ardhika', 'KEMBALI');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_cif` int(11) NOT NULL,
  `id_ld` varchar(100) NOT NULL,
  `nama_nasabah` varchar(40) NOT NULL,
  `tanggal_pinjam` varchar(10) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `peminjam` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_cif`, `id_ld`, `nama_nasabah`, `tanggal_pinjam`, `keperluan`, `peminjam`, `status`) VALUES
(11, 222, 'LD222', 'Ptra', '2023-01-09', 'Pengecekan Keabsahan jaminan', 'Mukhtar Ardhika', 'DIPINJAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id_mar`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id_mar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
