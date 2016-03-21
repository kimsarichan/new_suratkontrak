-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2015 at 01:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_anggota`
--

CREATE TABLE IF NOT EXISTS `t_anggota` (
  `nim` varchar(12) NOT NULL,
  `nama` char(50) NOT NULL,
  `tempat_lahir` char(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jurusan` char(30) NOT NULL,
  `tahun_kuliah` varchar(4) NOT NULL,
  `tahun_masuk_ukm` varchar(4) NOT NULL,
  `no_telp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_anggota`
--

INSERT INTO `t_anggota` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jurusan`, `tahun_kuliah`, `tahun_masuk_ukm`, `no_telp`) VALUES
('1103130109', 'Fiqih Rhamdani', 'Jakarta', '2007-12-02', 'S1 Teknik Informatika', '2015', '2013', '085659118686');

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_kock`
--

CREATE TABLE IF NOT EXISTS `t_detail_kock` (
  `id_hutang` int(11) NOT NULL,
`id_detail_hutang` int(11) NOT NULL,
  `nim` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_inventaris`
--

CREATE TABLE IF NOT EXISTS `t_inventaris` (
`id_pinjam` int(11) NOT NULL,
  `nama_peminjam` char(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `durasi_pinjam` int(2) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_inventaris`
--

INSERT INTO `t_inventaris` (`id_pinjam`, `nama_peminjam`, `tanggal_pinjam`, `durasi_pinjam`, `tanggal_kembali`, `status`) VALUES
(1, 'budi', '2015-12-01', 2, '2015-12-04', 'sudah kembali');

-- --------------------------------------------------------

--
-- Table structure for table `t_kas`
--

CREATE TABLE IF NOT EXISTS `t_kas` (
`id_kas` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `untuk_bulan` int(2) NOT NULL,
  `untuk_tahun` int(4) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kas`
--

INSERT INTO `t_kas` (`id_kas`, `nim`, `tanggal_pembayaran`, `untuk_bulan`, `untuk_tahun`, `jumlah`) VALUES
(1, '1103130109', '2015-01-01', 10, 2015, 10000),
(4, '1103130109', '2013-01-01', 2, 2013, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `t_kock`
--

CREATE TABLE IF NOT EXISTS `t_kock` (
`id_hutang` int(11) NOT NULL,
  `tanggal_permainan` date NOT NULL,
  `jumlah_terpakai` int(3) NOT NULL,
  `total_bayar` int(10) NOT NULL,
  `status` char(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kock`
--

INSERT INTO `t_kock` (`id_hutang`, `tanggal_permainan`, `jumlah_terpakai`, `total_bayar`, `status`) VALUES
(2, '2013-09-09', 15, 12000, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `t_login`
--

CREATE TABLE IF NOT EXISTS `t_login` (
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_login`
--

INSERT INTO `t_login` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_anggota`
--
ALTER TABLE `t_anggota`
 ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `t_detail_kock`
--
ALTER TABLE `t_detail_kock`
 ADD PRIMARY KEY (`id_detail_hutang`), ADD KEY `t_detail_kock_fk` (`id_hutang`);

--
-- Indexes for table `t_inventaris`
--
ALTER TABLE `t_inventaris`
 ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `t_kas`
--
ALTER TABLE `t_kas`
 ADD PRIMARY KEY (`id_kas`), ADD KEY `t_kas_fk` (`nim`);

--
-- Indexes for table `t_kock`
--
ALTER TABLE `t_kock`
 ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `t_login`
--
ALTER TABLE `t_login`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_detail_kock`
--
ALTER TABLE `t_detail_kock`
MODIFY `id_detail_hutang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_inventaris`
--
ALTER TABLE `t_inventaris`
MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_kas`
--
ALTER TABLE `t_kas`
MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_kock`
--
ALTER TABLE `t_kock`
MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detail_kock`
--
ALTER TABLE `t_detail_kock`
ADD CONSTRAINT `t_detail_kock_fk` FOREIGN KEY (`id_hutang`) REFERENCES `t_kock` (`id_hutang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_kas`
--
ALTER TABLE `t_kas`
ADD CONSTRAINT `t_kas_fk` FOREIGN KEY (`nim`) REFERENCES `t_anggota` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
