-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 08:53 AM
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
(131, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(133, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(134, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(135, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(137, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(138, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(139, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(140, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(141, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(142, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(143, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(144, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(145, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(146, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(147, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(148, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(149, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(150, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(151, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(152, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(153, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(154, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(155, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(156, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(157, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(158, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(159, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(160, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(161, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(162, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(163, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(164, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(165, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(166, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(167, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(168, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(169, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(170, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(171, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(172, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(173, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(174, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(175, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(176, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(177, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(178, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(179, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(180, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(181, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(182, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(183, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(184, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(185, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(186, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(187, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(188, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(189, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(190, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(191, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(192, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(193, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(194, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(195, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(196, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(197, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(198, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(199, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(200, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(201, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(202, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd');
INSERT INTO `tb_laporan` (`id_laporan`, `id_opd`, `tanggal`, `judul`, `nama_bidang`, `isi_laporan`, `tindakan`, `keterangan`, `file`, `nama`) VALUES
(203, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(204, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(205, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(206, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(207, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(208, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(209, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(210, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(211, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(212, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(213, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(214, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(215, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(216, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(217, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(218, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(219, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(220, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(221, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(222, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(223, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(224, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(225, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(226, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(227, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(228, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(229, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(230, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(231, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(232, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(233, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(234, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(235, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(236, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(237, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(238, 36, '2020-03-06 08:24:42', 'Judul', 'Isu-isu Aktual/Terkini (medsos/massa)', '<ol><li>sadfsdafasdfsdff</li><li>dsfasdfsadf</li><li>asdfsdf</li><li>sadfasdfasdf</li><li>asdfasdf</li><li>sadfadf</li></ol>', '<ol><li>asdfdfsFD</li><li>ASDFASDFASDF</li><li>sfasdfadgdf</li><li>agdfg</li><li>adfgdfg</li><li>adfgafg</li></ol>', 'Selesai', '1583457925005.pdf', 'Nama Admin'),
(239, 3, '2020-03-06 08:28:41', 'hjksd', 'Ideologi', '<p><span style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\"><br></span><br></p>', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum:<br><br>- dgd<br>- sdfsdf<br>- sdfsdff<br>- sdfdf</span></p>', 'Belum Selesai', '1583458130723.pdf', 'Nama Admin'),
(240, 27, '2020-03-06 09:47:40', 'sfdf', 'Kegiatan Pemerintahan', '<p>asfsdf</p>', '<p>sdfsdf</p>', 'Belum Selesai', '1583462874647.pdf', 'Nama Admin'),
(241, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd'),
(242, 27, '2020-03-06 09:55:38', 'asd', 'Ideologi', '<p>qasdadsdad sadads</p>', '<p>asdasd asdasd</p>', 'Belum Selesai', '1583463352205.png', 'asd');

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
(2, 'User', 'User dari masing-masing OPD'),
(3, 'Guest', 'Tamu'),
(4, 'Kepala', 'Kepala');

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
(199, 'adminkesbangpol', '2020-03-04 04:52:42', 0, 'Logged in'),
(200, 'adminkesbangpol', '2020-03-04 04:53:01', 1, 'Logged Out'),
(201, 'adminkesbangpol', '2020-03-06 01:24:26', 0, 'Logged in'),
(202, 'adminkesbangpol', '2020-03-06 01:25:25', 2, 'Menambahkan laporan dengan judul Judul'),
(203, 'adminkesbangpol', '2020-03-06 01:26:08', 2, 'Menambahkan laporan dengan judul asfsd'),
(204, 'adminkesbangpol', '2020-03-06 01:28:50', 2, 'Menambahkan laporan dengan judul hjksd'),
(205, 'adminkesbangpol', '2020-03-06 02:14:43', 0, 'Logged in'),
(206, 'adminkesbangpol', '2020-03-06 02:24:52', 3, 'Mengubah laporan dengan judul hjksd'),
(207, 'adminkesbangpol', '2020-03-06 02:26:22', 3, 'Mengubah laporan dengan judul hjksd'),
(208, 'adminkesbangpol', '2020-03-06 02:35:52', 1, 'Logged Out'),
(209, 'adminkesbangpol', '2020-03-06 02:41:09', 0, 'Logged in'),
(210, 'adminkesbangpol', '2020-03-06 02:41:38', 2, 'Menambah user baru'),
(211, 'adminkesbangpol', '2020-03-06 02:41:56', 1, 'Logged Out'),
(212, 'admindisdik', '2020-03-06 02:42:04', 0, 'Logged in'),
(213, 'admindisdik', '2020-03-06 02:47:24', 1, 'Logged Out'),
(214, 'adminkesbangpol', '2020-03-06 02:47:32', 0, 'Logged in'),
(215, 'adminkesbangpol', '2020-03-06 02:47:54', 2, 'Menambahkan laporan dengan judul sfdf'),
(216, 'adminkesbangpol', '2020-03-06 02:48:15', 2, 'Menambah user baru'),
(217, 'adminkesbangpol', '2020-03-06 02:48:24', 1, 'Logged Out'),
(218, 'binsir', '2020-03-06 02:48:30', 0, 'Logged in'),
(219, 'binsir', '2020-03-06 02:55:22', 1, 'Logged Out'),
(220, 'binsir', '2020-03-06 02:55:32', 0, 'Logged in'),
(221, 'binsir', '2020-03-06 02:55:52', 2, 'Menambahkan laporan dengan judul asd'),
(222, 'binsir', '2020-03-06 03:19:31', 1, 'Logged Out'),
(223, 'adminkesbangpol', '2020-03-06 03:19:41', 0, 'Logged in'),
(224, 'adminkesbangpol', '2020-03-06 03:20:26', 2, 'Menambah user baru'),
(225, 'adminkesbangpol', '2020-03-06 03:21:19', 1, 'Logged Out'),
(226, 'binsir1', '2020-03-06 03:21:27', 0, 'Logged in'),
(227, 'binsir1', '2020-03-06 03:21:32', 1, 'Logged Out'),
(228, 'binsir', '2020-03-06 03:21:38', 0, 'Logged in'),
(229, 'binsir', '2020-03-06 03:26:05', 1, 'Logged Out'),
(230, 'admindisdik', '2020-03-06 03:26:44', 0, 'Logged in'),
(231, 'admindisdik', '2020-03-06 03:27:11', 2, 'Menambahkan laporan dengan judul asdsdd'),
(232, 'admindisdik', '2020-03-06 03:48:27', 1, 'Logged Out'),
(233, 'adminkesbangpol', '2020-03-06 03:48:35', 0, 'Logged in'),
(234, 'adminkesbangpol', '2020-03-06 03:53:58', 1, 'Logged Out'),
(235, 'admindisdik', '2020-03-06 03:54:14', 0, 'Logged in'),
(236, 'adminkesbangpol', '2020-03-07 05:19:59', 0, 'Logged in'),
(237, 'adminkesbangpol', '2020-03-07 05:22:39', 2, 'Menambah user baru'),
(238, 'guest', '2020-03-07 05:26:45', 0, 'Logged in'),
(239, 'guest', '2020-03-07 05:36:05', 1, 'Logged Out'),
(240, 'guest', '2020-03-07 05:36:11', 0, 'Logged in'),
(241, 'guest', '2020-03-07 05:39:06', 1, 'Logged Out'),
(242, 'guest', '2020-03-07 05:39:11', 0, 'Logged in'),
(243, 'guest', '2020-03-07 05:47:34', 1, 'Logged Out'),
(244, 'guest', '2020-03-07 05:47:41', 0, 'Logged in'),
(245, 'guest', '2020-03-07 06:00:33', 1, 'Logged Out'),
(246, 'guest', '2020-03-07 06:00:39', 0, 'Logged in'),
(247, 'guest', '2020-03-07 06:01:40', 3, 'Mengubah profil'),
(248, 'guest', '2020-03-07 06:01:44', 1, 'Logged Out'),
(249, 'ge', '2020-03-07 06:01:48', 0, 'Logged in'),
(250, 'ge', '2020-03-07 06:02:28', 3, 'Mengubah profil'),
(251, 'ge', '2020-03-07 06:03:21', 1, 'Logged Out'),
(252, 'ga', '2020-03-07 06:03:24', 0, 'Logged in'),
(253, 'ga', '2020-03-07 06:03:40', 3, 'Mengubah profil'),
(254, 'ga', '2020-03-07 06:12:24', 1, 'Logged Out'),
(255, 'guest', '2020-03-07 06:12:31', 0, 'Logged in'),
(256, 'adminkesbangpol', '2020-03-07 06:12:39', 1, 'Logged Out'),
(257, 'guest', '2020-03-07 06:12:44', 0, 'Logged in'),
(258, 'guest', '2020-03-07 06:12:54', 1, 'Logged Out'),
(259, 'adminkesbangpol', '2020-03-07 06:13:03', 0, 'Logged in'),
(260, 'adminkesbangpol', '2020-03-07 06:29:38', 1, 'Logged Out'),
(261, 'guest', '2020-03-07 06:29:48', 0, 'Logged in'),
(262, 'guest', '2020-03-08 07:59:41', 0, 'Logged in'),
(263, 'guest', '2020-03-08 08:02:59', 1, 'Logged Out'),
(264, 'adminkesbangpol', '2020-03-08 08:03:05', 0, 'Logged in'),
(265, 'adminkesbangpol', '2020-03-08 08:03:19', 3, 'Mengubah detail user'),
(266, 'adminkesbangpol', '2020-03-08 08:03:28', 1, 'Logged Out'),
(267, 'guest', '2020-03-08 08:03:34', 0, 'Logged in'),
(268, 'adminkesbangpol', '2020-03-09 07:03:57', 0, 'Logged in'),
(269, 'adminkesbangpol', '2020-03-09 07:04:06', 4, 'Menghapus data OPD'),
(270, 'adminkesbangpol', '2020-03-09 07:04:30', 2, 'Menambah OPD dengan nama Kepala'),
(271, 'adminkesbangpol', '2020-03-09 07:05:46', 2, 'Menambah user baru'),
(272, 'adminkesbangpol', '2020-03-09 07:06:41', 1, 'Logged Out'),
(273, 'kepala', '2020-03-09 07:07:34', 0, 'Logged in'),
(274, 'kepala', '2020-03-09 07:17:11', 3, 'Mengubah profil'),
(275, 'kepala', '2020-03-09 07:17:56', 1, 'Logged Out');

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
(26, 'Kecamatan Bintan Timur'),
(27, 'Kecamatan Bintan Pesisir'),
(28, 'Kecamatan Bintan Utara'),
(29, 'Kecamatan Gunung Kijang'),
(30, 'Kecamatan Mantang'),
(31, 'Kecamatan Seri Kuala Lobam'),
(32, 'Kecamatan Tambelan'),
(33, 'Kecamatan Telok Sebong'),
(34, 'Kecamatan Teluk Bintan'),
(35, 'Kecamatan Toapaya'),
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
(1, 36, 'Nama Admin', 'adminkesbangpol', '$2y$10$XBTi9fkF2YWzMuB7JK0i2uV0sVbRo0BttgVJ52B/K4uoRfImxS5FO', 1),
(40, 4, 'admindisdik', 'admindisdik', '$2y$10$qm44Z0khtntJL3XFKa4Npu7mBb5saNrMBJBluEK0o43mOy.hR4YDu', 2),
(41, 27, 'asd', 'binsir', '$2y$10$ehgXCvVomyRckoM1Dn3XBONqfK3z/csLBJi5FQlCIeO13wS5C91oa', 2),
(42, 27, 'binsir1', 'binsir1', '$2y$10$6FHoZuScPVh7/IsbLwjqYu6IJ07.GQd5BfJBxOUHg6qG98j9klegG', 2),
(43, 27, 'guest', 'guest', '$2y$10$9RtypLiqycNdty/Y36KplOgYMw1OYbUaAWZBWWck3qfy8I4xb7ydK', 3),
(44, 1, 'kepala1', 'kepala', '$2y$10$vzw2bfIeO4LsWEou.iNvG./srtHUHODxBaj0Joub4jN1vUUNwvXqa', 4);

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
  MODIFY `id_bidang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `tb_opd`
--
ALTER TABLE `tb_opd`
  MODIFY `id_opd` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
