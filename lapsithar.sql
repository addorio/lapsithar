-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 05:12 AM
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
(120, 1, '2020-02-17 02:21:27', '1', 'Ideologi', '<p>1</p>', '<p>1</p>', 'Belum Selesai', '1582183299279.png', 'Dadan Mahardhika'),
(121, 1, '2020-02-18 02:22:55', '2', 'Ideologi', '<p>2</p>', '<p>2</p>', 'Selesai', '1582183387445.pdf', 'Dadan Mahardhika'),
(122, 1, '2020-02-20 07:26:25', 'aaa', 'Kegiatan Pemerintahan', '<p>asfasf</p>', '<p>asfaf</p>', 'Selesai', '1582201607056.pdf', 'Dadan Mahardhika'),
(123, 10, '2020-02-20 12:04:35', 'asds', 'Ekonomi', '<p>asdasdasdasasdasdasdsdasd</p>', '<p>asdasasdasvdaadadadad</p>', 'Selesai', '1582218297991.pdf', 'Admin Diskominfo Bintan');

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
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipe` int(1) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`log_id`, `username`, `time`, `tipe`, `deskripsi`) VALUES
(1, 'adminkesbangpol', '2020-02-20 07:02:42', 1, 'Logged Out'),
(2, 'kominfo', '2020-02-20 07:03:29', 1, 'Logged Out'),
(3, 'adminkesbangpol', '2020-02-20 07:03:44', 1, 'Logged Out'),
(4, 'adminkesbangpol', '2020-02-20 07:04:31', 3, 'mengubah Isu-isu Aktual/Terkini (medsos/massa)'),
(5, 'adminkesbangpol', '2020-02-20 07:05:47', 2, 'menambahkan Baru'),
(6, 'adminkesbangpol', '2020-02-20 07:06:29', 4, 'menghapus  dari database'),
(7, 'adminkesbangpol', '2020-02-20 07:09:21', 2, 'menambahkan asd pada tabel bidang'),
(8, 'adminkesbangpol', '2020-02-20 07:09:33', 3, 'mengubah a pada tabel bidang'),
(9, 'adminkesbangpol', '2020-02-20 07:09:42', 4, 'menghapus data sebuah bidang dari tabel bidang'),
(10, 'adminkesbangpol', '2020-02-20 07:49:43', 3, 'mengubah Isu-isu Aktual/Terkini (medsos/massa) pada tabel bidang'),
(11, 'adminkesbangpol', '2020-02-20 07:49:45', 3, 'mengubah Isu-isu Aktual/Terkini (medsos/massa) pada tabel bidang'),
(12, 'adminkesbangpol', '2020-02-20 07:49:47', 3, 'mengubah Isu-isu Aktual/Terkini (medsos/massa) pada tabel bidang'),
(13, 'adminkesbangpol', '2020-02-20 07:49:49', 3, 'mengubah Isu-isu Aktual/Terkini (medsos/massa) pada tabel bidang'),
(14, 'adminkesbangpol', '2020-02-20 07:49:50', 3, 'mengubah Isu-isu Aktual/Terkini (medsos/massa) pada tabel bidang'),
(15, 'adminkesbangpol', '2020-02-20 12:27:09', 1, 'Logged Out'),
(16, 'adminkesbangpol', '2020-02-20 15:19:42', 1, 'Logged Out'),
(17, 'adminkesbangpol', '2020-02-20 15:19:54', 0, 'Logged in'),
(18, 'adminkesbangpol', '2020-02-20 15:26:01', 2, 'Menambah user baru'),
(19, 'adminkesbangpol', '2020-02-20 16:48:08', 1, 'Logged Out'),
(20, 'kominfo', '2020-02-20 16:48:14', 0, 'Logged in'),
(21, 'kominfo', '2020-02-20 17:04:57', 2, 'Menambahkan laporan dengan judul asds'),
(22, 'kominfo', '2020-02-20 17:13:13', 1, 'Logged Out'),
(23, 'adminkesbangpol', '2020-02-20 17:13:21', 0, 'Logged in'),
(24, 'adminkesbangpol', '2020-02-20 17:13:59', 1, 'Logged Out'),
(25, 'kominfo', '2020-02-20 17:14:06', 0, 'Logged in'),
(26, 'adminkesbangpol', '2020-02-21 02:01:34', 0, 'Logged in'),
(27, 'adminkesbangpol', '2020-02-21 05:00:37', 1, 'Logged Out'),
(28, 'kominfo', '2020-02-21 05:00:42', 0, 'Logged in'),
(29, 'kominfo', '2020-02-21 05:08:51', 1, 'Logged Out'),
(30, 'kominfo', '2020-02-21 05:16:02', 0, 'Logged in'),
(31, 'kominfo', '2020-02-21 05:16:08', 1, 'Logged Out'),
(32, 'adminkesbangpol', '2020-02-21 05:16:18', 0, 'Logged in'),
(33, 'adminkesbangpol', '2020-02-21 07:00:21', 1, 'Logged Out'),
(34, 'adminkesbangpol', '2020-02-21 07:00:38', 0, 'Logged in'),
(35, 'adminkesbangpol', '2020-02-21 07:14:13', 1, 'Logged Out'),
(36, 'kominfo', '2020-02-21 07:14:23', 0, 'Logged in'),
(37, 'kominfo', '2020-02-21 07:31:14', 1, 'Logged Out'),
(38, 'kominfo', '2020-02-21 07:31:19', 0, 'Logged in'),
(39, 'kominfo', '2020-02-21 07:32:31', 1, 'Logged Out'),
(40, 'adminkesbangpol', '2020-02-21 07:32:39', 0, 'Logged in'),
(41, 'adminkesbangpol', '2020-02-21 07:32:44', 4, 'Menghapus laporan'),
(42, 'adminkesbangpol', '2020-02-21 07:33:43', 1, 'Logged Out'),
(43, 'kominfo', '2020-02-21 07:33:48', 0, 'Logged in'),
(44, 'kominfo', '2020-02-21 07:39:47', 1, 'Logged Out'),
(45, 'kominfo', '2020-02-21 07:39:52', 0, 'Logged in'),
(46, 'kominfo', '2020-02-21 07:40:30', 1, 'Logged Out'),
(47, 'adminkesbangpol', '2020-02-21 07:40:45', 0, 'Logged in'),
(48, 'adminkesbangpol', '2020-02-21 07:40:55', 1, 'Logged Out'),
(49, 'kominfo', '2020-02-21 07:41:02', 0, 'Logged in'),
(50, 'kominfo', '2020-02-21 07:46:07', 1, 'Logged Out'),
(51, 'adminkesbangpol', '2020-02-21 07:46:14', 0, 'Logged in'),
(52, 'adminkesbangpol', '2020-02-21 07:48:13', 1, 'Logged Out'),
(53, 'kominfo', '2020-02-21 07:48:18', 0, 'Logged in'),
(54, 'kominfo', '2020-02-21 07:50:47', 1, 'Logged Out'),
(55, 'adminkesbangpol', '2020-02-21 07:50:53', 0, 'Logged in'),
(56, 'adminkesbangpol', '2020-02-21 07:52:57', 1, 'Logged Out'),
(57, 'kominfo', '2020-02-21 07:53:02', 0, 'Logged in'),
(58, 'kominfo', '2020-02-21 07:58:16', 1, 'Logged Out'),
(59, 'kominfo', '2020-02-21 08:00:06', 0, 'Logged in'),
(60, 'kominfo', '2020-02-23 11:40:38', 0, 'Logged in'),
(61, 'adminkesbangpol', '2020-02-24 01:44:30', 0, 'Logged in'),
(62, 'adminkesbangpol', '2020-02-24 01:51:10', 0, 'Logged in'),
(63, 'adminkesbangpol', '2020-02-24 01:53:15', 1, 'Logged Out'),
(64, 'kominfo', '2020-02-24 01:53:24', 0, 'Logged in'),
(65, 'kominfo', '2020-02-24 01:53:42', 1, 'Logged Out'),
(66, 'kominfo', '2020-02-24 01:59:01', 0, 'Logged in'),
(67, 'kominfo', '2020-02-24 02:21:38', 1, 'Logged Out'),
(68, 'adminkesbangpol', '2020-02-24 02:21:51', 0, 'Logged in'),
(69, 'adminkesbangpol', '2020-02-24 02:22:46', 2, 'menambahkan Bidang Baru pada tabel bidang'),
(70, 'adminkesbangpol', '2020-02-24 02:22:51', 3, 'mengubah Bidang pada tabel bidang'),
(71, 'adminkesbangpol', '2020-02-24 02:22:54', 4, 'menghapus data sebuah bidang dari tabel bidang'),
(72, 'adminkesbangpol', '2020-02-24 02:32:09', 1, 'Logged Out'),
(73, 'adminkesbangpol', '2020-02-24 02:34:18', 0, 'Logged in'),
(74, 'adminkesbangpol', '2020-02-24 02:36:39', 1, 'Logged Out'),
(75, 'adminkesbangpol', '2020-02-24 02:38:41', 0, 'Logged in'),
(76, 'adminkesbangpol', '2020-02-24 02:52:37', 1, 'Logged Out'),
(77, 'adminkesbangpol', '2020-02-24 03:04:21', 0, 'Logged in'),
(78, 'adminkesbangpol', '2020-02-24 03:27:42', 1, 'Logged Out'),
(79, 'kominfo', '2020-02-24 03:27:47', 0, 'Logged in');

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
(30, 10, 'Admin Diskominfo Bintan', 'kominfo', '$2y$10$vGsmWEGrXwztR6KpYa/kyOxiyrvjdhbAOkwQ3lfJuWypPLNt2DFxG', 2),
(37, 4, 'Operator Dinas Kesehatan', 'dinaskesehatan', '$2y$10$AaoRCAPOB8M0qaCwWpi07uBd4ywSXT7bsdQLmTlQmWh3j37o7uBHq', 2);

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
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

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
  MODIFY `id_bidang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tb_opd`
--
ALTER TABLE `tb_opd`
  MODIFY `id_opd` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
