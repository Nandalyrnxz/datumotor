-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2025 at 03:12 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama`, `aktif`) VALUES
(4, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 'ya'),
(6, 'asd@gmail.com', '7815696ecbf1c96e6894b779456d330e', 'asd', 'ya'),
(9, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int NOT NULL,
  `id_booking` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status` int NOT NULL,
  `id_keterangan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_booking`, `id_status`, `id_keterangan`) VALUES
(46, 'BK27202501231620', 4, 17),
(47, 'BK28202501231627', 4, 17),
(51, 'BK27202501231654', 1, 11),
(52, 'BK28202501231656', 0, 0),
(53, 'BK28202501231656', 0, 0),
(54, 'BK28202501231659', 5, 13),
(55, 'BK29202501310909', 4, 17),
(56, 'BK27202502020546', 0, 0),
(57, 'BK001', 4, 17);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jadwal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_mobil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_booking` date NOT NULL,
  `id_mekanik` int NOT NULL,
  `keluhan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_plat` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seri_mobil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_keluaran` int NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_pelanggan`, `id_jadwal`, `merk_mobil`, `tgl_booking`, `id_mekanik`, `keluhan`, `status`, `no_plat`, `seri_mobil`, `tahun_keluaran`, `date_created`) VALUES
('BK001', '30', '7', 'asdasd', '2025-02-05', 2, 'asd', 'DISETUJUI', '12313', 'matic', 12222, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int NOT NULL,
  `hari` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`) VALUES
(1, 'SENIN', '08:00'),
(2, 'SENIN', '09:00'),
(3, 'SENIN', '10:00'),
(4, 'SELASA', '08:00'),
(5, 'SELASA', '09:00'),
(6, 'SELASA', '10:00'),
(7, 'RABU', '08:00'),
(8, 'RABU', '09:00'),
(9, 'RABU', '10:00'),
(10, 'KAMIS', '08:00'),
(11, 'KAMIS', '09:00'),
(12, 'KAMIS', '10:00'),
(13, 'JUMAT', '08:00'),
(14, 'JUMAT', '09:00'),
(15, 'JUMAT', '10:00'),
(16, 'SABTU', '09:00'),
(19, 'SENIN', '11:00'),
(20, 'SENIN', '13:30'),
(21, 'SENIN', '14:00'),
(22, 'SENIN', '15:00'),
(23, 'SENIN', '16:00'),
(24, 'SENIN', '17:00'),
(25, 'SELASA', '11:00'),
(26, 'SELASA', '13:30'),
(27, 'SELASA', '14:00'),
(28, 'SELASA', '15:00'),
(29, 'SELASA', '16:00'),
(30, 'SELASA', '17:00'),
(31, 'RABU', '11:00'),
(32, 'RABU', '13:30'),
(34, 'RABU', '15:00'),
(35, 'RABU', '14:00'),
(36, 'RABU', '16:00'),
(37, 'RABU', '17:00'),
(38, 'KAMIS', '11:00'),
(39, 'KAMIS', '13:30'),
(40, 'KAMIS', '14:00'),
(42, 'KAMIS', '15:00'),
(43, 'KAMIS', '16:00'),
(44, 'KAMIS', '17:00'),
(45, 'JUMAT', '11:00'),
(46, 'JUMAT', '13:30'),
(47, 'JUMAT', '14:00'),
(48, 'JUMAT', '15:00'),
(50, 'JUMAT', '16:00'),
(51, 'JUMAT', '17:00'),
(52, 'SABTU', '10:00'),
(53, 'SABTU', '11:00'),
(54, 'SABTU', '13:30'),
(55, 'SABTU', '14:00'),
(56, 'SABTU', '15:00'),
(57, 'SABTU', '16:00'),
(58, 'SABTU', '17:00');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_antrian`
--

CREATE TABLE `keterangan_antrian` (
  `id_keterangan` int NOT NULL,
  `id_status` int NOT NULL,
  `keterangan` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keterangan_antrian`
--

INSERT INTO `keterangan_antrian` (`id_keterangan`, `id_status`, `keterangan`) VALUES
(11, 1, 'Mobil pelanggan sebelumnya belum selesai diperbaiki'),
(12, 1, 'Sedang Waktu Istirahat'),
(13, 5, 'Anda Dapat Bersiap Untuk Datang ke Bengkel'),
(14, 3, 'Mobil Sedang di Service'),
(15, 4, 'Service Selesai'),
(16, 4, 'Mobil Sudah Bisa Dijemput'),
(17, 4, 'Mobil Telah Dijemput'),
(18, 4, 'Mobil Diinapkan');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `merk_mobil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int NOT NULL,
  `tgl_konsultasi` date NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerusakan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `id_pelanggan`, `merk_mobil`, `tahun`, `tgl_konsultasi`, `keluhan`, `kerusakan`, `foto`, `status`) VALUES
(14, 30, 'asd', 123123, '2025-02-04', 'asd', 'ringan', 'BAB IV rancangan.pdf', 'DIRESPON');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi_publik`
--

CREATE TABLE `konsultasi_publik` (
  `id_kp` int NOT NULL,
  `tanggal_kp` date NOT NULL,
  `nama_kp` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mobil` int NOT NULL,
  `tahun_produksi_mobil` int NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `solusi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int NOT NULL,
  `nama_mekanik` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nama_mekanik`, `foto`, `aktif`) VALUES
(2, 'Refaldi', '3.jpg', 'ya'),
(3, 'Filhazri', 'sasuke.jpg', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int NOT NULL,
  `merk_mobil` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `merk_mobil`) VALUES
(18, 'Toyota Avanza\r\n'),
(19, 'Daihatsu Xenia\r\n'),
(20, 'Mitsubishi Xpander\r\n'),
(21, 'Honda Mobilio'),
(22, 'Suzuki Ertiga'),
(23, 'Honda Brio'),
(24, 'Toyota Yaris'),
(25, 'Suzuki Baleno'),
(26, 'Daihatsu Ayla'),
(27, 'Toyota Agya'),
(28, 'Hyundai i10');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  `jk` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_wa` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_otp` int NOT NULL,
  `aktif` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `password`, `jk`, `alamat`, `no_wa`, `kode_otp`, `aktif`) VALUES
(27, 'ayah', 'ayah@gmail.com', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'siteba', '82173019990', 2286, 'ya'),
(28, 'nanda', 'nanda@gmail.com', '202cb962ac59075b964b07152d234b70', 'Laki-laki', 'nanda', '89561876418', 4216, 'ya'),
(29, 'anggadhiatma', 'anggadhiatma@gmail.com', '4784f5ba553e54f64f6a1dd94f13d529', 'Laki-laki', 'Jln.raya pagang no 20', '811662814', 3752, 'ya'),
(30, 'asd', 'asd@mail.com', '7815696ecbf1c96e6894b779456d330e', 'Laki-laki', 'asd', '85835739269', 3481, 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int NOT NULL,
  `id_booking` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pelayanan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `id_booking`, `jenis_pelayanan`, `biaya`) VALUES
(21, 'BK27202501231620', 'servis', 500000),
(22, 'BK28202501231627', 'servis', 600000),
(23, 'BK29202501310909', 'servis', 350000),
(24, 'BK001', 'asdad', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_booking` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_booking`, `tgl_pembayaran`, `filename`, `status`, `jenis_pembayaran`) VALUES
(14, 27, 'BK27202501231620', '2025-01-23', 'pembayaran.png', 'DISETUJUI', 'TRANSFER'),
(15, 28, 'BK28202501231627', '2025-01-23', 'pembayaran.png', 'DISETUJUI', 'LANGSUNG'),
(16, 29, 'BK29202501310909', '2025-01-31', 'pembayaran.png', 'DISETUJUI', 'TRANSFER'),
(17, 30, 'BK001', '2025-02-04', 'BAB IV rancangan.pdf', 'DISETUJUI', 'LANGSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `respon_konsultasi`
--

CREATE TABLE `respon_konsultasi` (
  `id_respon` int NOT NULL,
  `id_konsultasi` int NOT NULL,
  `responden` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `respon_konsultasi`
--

INSERT INTO `respon_konsultasi` (`id_respon`, `id_konsultasi`, `responden`, `respon`, `waktu`) VALUES
(14, 11, 'ADMIN', 'silahkan dibawa kebengkel untuk perbaikan', '2025-01-23 16:24:34'),
(15, 11, 'PELANGGAN', 'oke', '2025-01-23 16:24:52'),
(16, 12, 'ADMIN', 'servis', '2025-01-23 16:29:25'),
(17, 14, 'ADMIN', 'asdasdasd', '2025-02-04 14:54:18'),
(18, 14, 'PELANGGAN', 'qweqwe', '2025-02-04 14:54:48'),
(19, 14, 'ADMIN', 'asdasd', '2025-02-04 14:58:52'),
(20, 14, 'PELANGGAN', 'zxcczc', '2025-02-04 14:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `status_antrian`
--

CREATE TABLE `status_antrian` (
  `id_status` int NOT NULL,
  `status_antrian` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_antrian`
--

INSERT INTO `status_antrian` (`id_status`, `status_antrian`) VALUES
(1, 'MENUNGGU'),
(3, 'SEDANG DILAYANI'),
(4, 'SELESAI'),
(5, 'BERSIAP-SIAP');

-- --------------------------------------------------------

--
-- Table structure for table `sukucadang`
--

CREATE TABLE `sukucadang` (
  `idsukucadang` int NOT NULL,
  `namasukucadang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `keterangan_antrian`
--
ALTER TABLE `keterangan_antrian`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `konsultasi_publik`
--
ALTER TABLE `konsultasi_publik`
  ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `respon_konsultasi`
--
ALTER TABLE `respon_konsultasi`
  ADD PRIMARY KEY (`id_respon`);

--
-- Indexes for table `status_antrian`
--
ALTER TABLE `status_antrian`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `sukucadang`
--
ALTER TABLE `sukucadang`
  ADD PRIMARY KEY (`idsukucadang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `keterangan_antrian`
--
ALTER TABLE `keterangan_antrian`
  MODIFY `id_keterangan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `konsultasi_publik`
--
ALTER TABLE `konsultasi_publik`
  MODIFY `id_kp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `respon_konsultasi`
--
ALTER TABLE `respon_konsultasi`
  MODIFY `id_respon` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `status_antrian`
--
ALTER TABLE `status_antrian`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sukucadang`
--
ALTER TABLE `sukucadang`
  MODIFY `idsukucadang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
