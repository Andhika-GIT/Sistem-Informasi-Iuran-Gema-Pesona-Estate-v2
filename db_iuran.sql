-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2022 at 08:54 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17240519_db_iuran`
--

-- --------------------------------------------------------

--
-- Table structure for table `iuran_tunggakan`
--

CREATE TABLE `iuran_tunggakan` (
  `id` int(11) NOT NULL,
  `kode_tagihan` varchar(12) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran_tunggakan`
--

INSERT INTO `iuran_tunggakan` (`id`, `kode_tagihan`, `keterangan`, `jumlah`) VALUES
(1, 'H001', 'Kebersihan', '2200000'),
(3, 'H002', 'Perbaikan Lampu jalan', '850000'),
(4, 'H000004', 'Gaji Tukang Bersih', '800000');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `id_thread`, `id_user`, `isi`) VALUES
(1, 3, 10, 'tolong semua diperhatikan ya bahwa event ini penting dan wajib'),
(3, 3, 9, 'Oke nanti saya isi formnya, terima kasih infonya'),
(4, 3, 6, 'baik pak, sekalian saya akan masukkan data iuran bulan kemarin'),
(5, 3, 1, 'oke pak, tolong info akun yang saya kirim bisa di baca ya pak..'),
(6, 3, 9, 'Mas? Baron?');

-- --------------------------------------------------------

--
-- Table structure for table `tb_iuran_keluar`
--

CREATE TABLE `tb_iuran_keluar` (
  `id` int(11) NOT NULL,
  `kode_iuran_keluar` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `metode_bayar` varchar(50) NOT NULL,
  `jumlah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_iuran_keluar`
--

INSERT INTO `tb_iuran_keluar` (`id`, `kode_iuran_keluar`, `nama`, `tanggal`, `keterangan`, `metode_bayar`, `jumlah`) VALUES
(1, 'K001', 'Salmi', '2021-05-28', 'Pembayaran Sampah', 'KAS TUNAI', '1500000'),
(3, 'k000002', 'Jessica', '2021-07-22', 'Iuran Perbaikan Jalan', 'Permata', '900000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_iuran_masuk`
--

CREATE TABLE `tb_iuran_masuk` (
  `id` int(11) NOT NULL,
  `kode_iuran_masuk` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `metode_bayar` varchar(50) NOT NULL,
  `jumlah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_iuran_masuk`
--

INSERT INTO `tb_iuran_masuk` (`id`, `kode_iuran_masuk`, `nama`, `tanggal`, `keterangan`, `metode_bayar`, `jumlah`) VALUES
(1, 'M001', 'Andhika Prasetya Nugraha', '2021-04-30', 'Iuran Satpam', 'NIAGA', '2000000'),
(2, 'M003', 'Harif', '2021-05-26', 'Perbaikan jalan', 'BRI', '500000'),
(4, 'M000003', 'Taufik', '2021-07-24', 'iuran kebersihan', 'CIMB', '700000'),
(5, 'M000005', 'Dimas Armando', '2021-07-28', 'Pembayaran Sampah', 'BCA', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id_penduduk` int(10) NOT NULL,
  `nama_penduduk` varchar(50) NOT NULL,
  `agama` varchar(12) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat_penduduk` varchar(150) NOT NULL,
  `rt_penduduk` varchar(10) NOT NULL,
  `no_penduduk` varchar(13) NOT NULL,
  `nik_penduduk` varchar(16) NOT NULL,
  `kk_penduduk` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id_penduduk`, `nama_penduduk`, `agama`, `jenis_kelamin`, `alamat_penduduk`, `rt_penduduk`, `no_penduduk`, `nik_penduduk`, `kk_penduduk`) VALUES
(10, 'Andhika Prasetya Nugraha', 'Kristen', 'Laki-Laki', 'W.12', '06', '089124965', '1203812038', '131231'),
(23, 'Dimas Armando', 'Islam', 'Laki-Laki ', 'W.13', '08', '087512340987', '129379237', '1283128392');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `foto`, `nama`, `email`, `no`, `username`, `password`, `role`) VALUES
(1, 'default.png', 'Furfio', 'furfio@gmail.com', '085311466807', 'admin', 'admin', 'admin'),
(6, 'default.png', 'Elena', 'elena@gmail.com', '087355670873', 'elena', 'elena', 'bendahara'),
(9, 'default.png', 'Dimas Armando', 'dimas@gmail.com', '087512340987', 'dimas', 'dimas', 'warga'),
(10, 'default.png', 'Harif', 'harif@gmail.com', '082311467806', 'harif', 'harif', 'ketua-rt');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `judul`, `isi`, `file`, `kategori`, `nama`) VALUES
(3, 'event', 'NANTI SENIN DIAKAN LOMBA OLAHRAGA, HARAP SEMUA ISI PENDAFTARAN BERIKUT', 'pilih-metode.png', 'Olahraga', 'Elena'),
(4, 'bersih bersama', 'tolong semua jaga jarak dan tetap stay home ya anak bangsat', 'FORMAT TULIS.jpg', 'clean', 'Elena');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iuran_tunggakan`
--
ALTER TABLE `iuran_tunggakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thread` (`id_thread`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_iuran_keluar`
--
ALTER TABLE `tb_iuran_keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_iuran_keluar` (`kode_iuran_keluar`);

--
-- Indexes for table `tb_iuran_masuk`
--
ALTER TABLE `tb_iuran_masuk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_iuran_masuk` (`kode_iuran_masuk`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iuran_tunggakan`
--
ALTER TABLE `iuran_tunggakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_iuran_keluar`
--
ALTER TABLE `tb_iuran_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_iuran_masuk`
--
ALTER TABLE `tb_iuran_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id_penduduk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`id_thread`) REFERENCES `thread` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
