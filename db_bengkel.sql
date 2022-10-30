-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 09:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_mekanik`
--

CREATE TABLE `tb_mekanik` (
  `idmekanik` varchar(10) NOT NULL,
  `nama_mekanik` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `statusdipesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mekanik`
--

INSERT INTO `tb_mekanik` (`idmekanik`, `nama_mekanik`, `jk`, `telp`, `alamat`, `status`, `statusdipesan`) VALUES
('M001', 'Gugun Ginanjar', 'L', '08125643123', 'bekasi', 'aktif', 1),
('M002', 'Sugeng', 'L', '0812345678', 'Jakarta', 'aktif', 1),
('M003', 'Agung', 'L', '081271162875', 'Bekasi', 'aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(11) NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `idpelanggan`, `namalengkap`, `jk`, `telp`, `alamat`) VALUES
(4, 8, 'Budi', 'L', '081245655456', 'Cikarang'),
(5, 6, 'Wati', 'L', '78788898899', 'Cibitung'),
(6, 9, 'Ade', 'P', '4445454545', 'Jakarta'),
(7, 13, 'Dian Anggraeni', 'L', '08111155555', 'Bekasi'),
(10, 16, '777', 'P', '0813', 'Jkt'),
(11, 17, 'Haniah ', 'P', '081282132313', 'BCM I 5 no 17'),
(12, 21, 'Riana', 'P', '089534219123', 'Perum BCA 1, Blok C22 NO 1'),
(13, 25, 'rina', 'P', '', 'ciantra');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` varchar(10) NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `jservice` varchar(10) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_service` date NOT NULL,
  `jam_service` varchar(20) NOT NULL,
  `status_pesan` varchar(100) NOT NULL,
  `mekanik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `idpelanggan`, `jservice`, `tgl_pesan`, `tgl_service`, `jam_service`, `status_pesan`, `mekanik`) VALUES
('P-00000001', 13, 'S001', '2022-07-11', '2022-07-12', '09.00', 'Selesai Service', 'M001'),
('P-00000002', 6, 'S001', '2022-07-11', '2022-07-12', '13.00', 'Selesai Service', 'M002'),
('P-00000003', 8, 'S001', '2022-07-11', '2022-07-12', '10.00', 'Selesai Service', 'M002'),
('P-00000004', 8, 'S001', '2022-07-11', '2022-07-13', '09.00', 'Selesai Service', 'M002'),
('P-00000005', 8, 'S002', '2022-07-11', '2022-07-16', '09.00', 'Selesai Service', 'M001'),
('P-00000006', 9, 'S002', '2022-07-12', '2022-07-13', '14.00', 'Selesai Service', 'M002'),
('P-00000007', 17, 'S001', '2022-09-26', '2022-09-30', '17:00', 'Selesai Service', 'M002'),
('P-00000008', 6, 'S002', '2022-09-30', '2022-10-01', '09.00', 'Selesai Service', 'M001'),
('P-00000009', 24, 'S002', '2022-10-01', '2022-10-15', '17:00', 'Menunggu Waktu Service', ''),
('P-00000010', 6, 'S002', '2022-10-01', '2022-10-02', '09.00', 'Menunggu Waktu Service', ''),
('P-00000011', 6, 'S003', '2022-10-01', '2022-10-01', '17.00', 'Proses Service', 'M001'),
('P-00000012', 6, 'S001', '2022-10-01', '2022-10-01', '18.00', 'Menunggu Waktu Service', ''),
('P-00000013', 25, 'S001', '2022-10-01', '2022-10-03', '08.00', 'Menunggu Waktu Service (Mekanik sudah siap)', 'M002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `nama`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'Admin saja', 'admin', 'admin', 'adm1.jpg'),
(6, 'wati', 'Wati', 'wati', 'pelanggan', 'Person.ico'),
(8, 'budi', 'Budi', 'budi', 'pelanggan', 'Person.ico'),
(9, 'ade', 'Ade', 'ade', 'pelanggan', 'Person.ico'),
(14, 'M001', 'Gugun Ginanjar', 'M001', 'mekanik', 'alex-rins-motogp-aragon_ori.jpg'),
(15, 'M002', 'Sugeng', 'M002', 'mekanik', '3.jpg'),
(18, 'M003', 'Agung', 'M003', 'mekanik', 'M003.jfif'),
(21, 'Riana', 'Riana', 'Riana', 'pelanggan', 'img 1.jpg'),
(22, 'M004', 'rian', 'M004', 'mekanik', 'img 1.jpg'),
(23, 'M005', 'Dodi', 'M005', 'mekanik', 'img 1.jpg'),
(24, 'tika', 'tika', 'tika', 'pelanggan', 'Logo STMIK MIC.jpg'),
(25, 'rina', 'rina', 'rina', 'pelanggan', 'img 1.jpg'),
(26, 'admin2', 'admin2', 'admin2', 'admin', 'adm2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_service`
--

CREATE TABLE `tb_service` (
  `idservice` varchar(10) NOT NULL,
  `nama_service` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_service`
--

INSERT INTO `tb_service` (`idservice`, `nama_service`, `harga`, `keterangan`) VALUES
('S001', 'Service Ringan', 105000, 'Service CVT, Ganti oli Gardan, Ganti Oli Mesin'),
('S002', 'Service Sedang', 235000, 'Service Injeksi, Ganti Filter udara, Gantu kanvas rem depan dan belakang'),
('S003', 'Service Berat', 490000, 'Turun Mesin, Ganti piston, ring piston  ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mekanik`
--
ALTER TABLE `tb_mekanik`
  ADD PRIMARY KEY (`idmekanik`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`idservice`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
