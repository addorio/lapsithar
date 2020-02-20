-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 06:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapsithar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(3) NOT NULL,
  `nama_bidang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Ideologi'),
(2, 'Politik'),
(3, 'Kegiatan Pemerintahan'),
(4, 'Kegiatan Kemasyarakatan'),
(5, 'Unjuk Rasa'),
(6, 'Ekonomi'),
(7, 'Sosial Budaya'),
(8, 'Pertahanan dan Keamanan'),
(10, 'Isu-isu Aktual/Terkini (medsos/massa)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_opd` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `judul` text NOT NULL,
  `nama_bidang` text NOT NULL,
  `isi_laporan` text NOT NULL,
  `tindakan` text NOT NULL,
  `keterangan` text NOT NULL,
  `file` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `id_opd`, `tanggal`, `judul`, `nama_bidang`, `isi_laporan`, `tindakan`, `keterangan`, `file`, `nama`) VALUES
(116, 1, '2020-02-19 09:18:40', 'asd', 'Kegiatan Kemasyarakatan', '<p>asd</p>', '<p>asd</p>', 'Selesai', '1582165128552.pdf', 'Dadan Mahardhika'),
(117, 10, '2020-02-20 09:35:43', 'asd', 'Kegiatan Kemasyarakatan', '<p>asd</p>', '<p>asd</p>', 'Selesai', '1582166154344.pdf', 'Admin Diskominfo Bintan'),
(118, 10, '2020-02-20 09:55:58', 'asdasd', 'Ideologi', '<p><b>asd</b></p>', '<p><b><i>asd</i></b></p>', 'Belum Selesai', '1582167366833.pdf', 'Admin Diskominfo Bintan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`, `keterangan`) VALUES
(1, 'Admin', 'Admin Aplikasi'),
(2, 'User', 'User dari masing-masing OPD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_opd`
--

CREATE TABLE `tb_opd` (
  `id_opd` int(3) NOT NULL,
  `nama_opd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_opd`
--

INSERT INTO `tb_opd` (`id_opd`, `nama_opd`) VALUES
(1, 'Sekretariat Daerah'),
(2, 'Inspektorat Daerah'),
(3, 'Dinas Pendidikan'),
(4, 'Dinas Kesehatan'),
(5, 'Satuan Polisi Pamong Praja'),
(6, 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana'),
(7, 'Dinas Ketahanan Pangan dan Pertanian'),
(8, 'Dinas Lingkungan Hidup'),
(9, 'Dinas Kependudukan dan Pencatatan Sipil'),
(10, 'Dinas Komunikasi dan Informatika'),
(11, 'Dinas Koperasi, Usaha Mikro, Perindustrian dan Perdagangan'),
(12, 'Dinas Penanaman Modal dan Pelayanan Terpadu satu Pintu'),
(13, 'Dinas Kebudayaan dan Pariwisata'),
(14, 'Dinas Perikanan'),
(15, 'Badan Perencanaan, Penelitian dan Pengembangan Daerah'),
(16, 'Dinas Pekerjaan Umum dan Penataan Ruang'),
(17, 'Dinas Sosial'),
(18, 'Dinas Pemberdayaan Masyarakat dan Desa'),
(19, 'Dinas Perhubungan'),
(20, 'Dinas Perpustakaan dan Arsip'),
(21, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia'),
(22, 'Badan Pendapatan Daerah'),
(23, 'Badan Keuangan dan Aset Daerah'),
(24, 'Sekretariat DPRD'),
(25, 'Dinas Perumahan dan Kawasan Permukiman'),
(26, 'Bintan Timur'),
(27, 'Bintan Pesisir'),
(28, 'Bintan Utara'),
(29, 'Gunung Kijang'),
(30, 'Mantang'),
(31, 'Seri Kuala Lobam'),
(32, 'Tambelan'),
(33, 'Telok Sebong'),
(34, 'Teluk Bintan'),
(35, 'Toapaya'),
(36, 'Badan Kesatuan Bangsa dan Politik Kabupaten Bintan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_opd` int(3) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `id_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_opd`, `nama`, `username`, `password`, `id_level`) VALUES
(14, 36, 'Dadan Mahardhika', 'adminkesbangpol', '$2y$10$XBTi9fkF2YWzMuB7JK0i2uV0sVbRo0BttgVJ52B/K4uoRfImxS5FO', 1),
(29, 1, 'Administrator Sekda', 'adminsekda', '$2y$10$3cx3JxlMXUbZf8CUAIhO8e5NruU6FCbQ.rz0IrINvk0oXOJk3C6tS', 2),
(30, 10, 'Admin Diskominfo Bintan', 'kominfo', '$2y$10$vGsmWEGrXwztR6KpYa/kyOxiyrvjdhbAOkwQ3lfJuWypPLNt2DFxG', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_opd`
--
ALTER TABLE `tb_opd`
  ADD PRIMARY KEY (`id_opd`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_opd` (`id_opd`),
  ADD KEY `level_akses` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_opd`
--
ALTER TABLE `tb_opd`
  MODIFY `id_opd` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_opd`) REFERENCES `tb_opd` (`id_opd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_user_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
