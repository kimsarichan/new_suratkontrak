-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mar 2016 pada 10.45
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kontrak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`) VALUES
('admin', 'sari', 'sari.rahmawati11@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `user_agent`, `timestamp`, `data`) VALUES
('1e4aeb3a3e25545f729eec2efe6dc913630f9a6e', '::1', '', 1457504501, '__ci_last_regenerate|i:1457504277;'),
('2bc1612c9b8bbe4511a18c24d0e97c7812f8ca64', '::1', '', 1457505892, '__ci_last_regenerate|i:1457505874;'),
('41317a64e7c93138c4a07ab12ad926061ebdb967', '::1', '', 1457504717, '__ci_last_regenerate|i:1457504580;'),
('bec08e028e6acb1a8a7dbf3c2964b6e82458888b', '::1', '', 1457505040, '__ci_last_regenerate|i:1457505015;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawankontrak`
--

CREATE TABLE `karyawankontrak` (
  `idKaryawan` int(11) NOT NULL,
  `idPerusahaan` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tingkatPekerjaan` varchar(32) NOT NULL,
  `unitKerja` varchar(32) NOT NULL,
  `tempatLahir` varchar(32) NOT NULL,
  `tglLahir` date NOT NULL,
  `pendidikan` varchar(32) NOT NULL,
  `Nomorbpjs` varchar(30) NOT NULL,
  `Norek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawankontrak`
--

INSERT INTO `karyawankontrak` (`idKaryawan`, `idPerusahaan`, `status`, `nama`, `alamat`, `tingkatPekerjaan`, `unitKerja`, `tempatLahir`, `tglLahir`, `pendidikan`, `Nomorbpjs`, `Norek`) VALUES
(2, 1, 0, 'sa', 'sa', 'sa', 'sas', 'sa', '2016-03-03', 'sa', '', ''),
(3, 1, 0, 'sa', 'sa', 'sa', 'sas', 'sa', '2016-03-03', 'sa', '', ''),
(4, 1, 0, 'sa', 'sa', 'sa', 'sas', 'sa', '2016-03-03', 'sa', '', ''),
(5, 1, 0, 'sa', 'sa', 'sa', 'sas', 'sa', '2016-03-03', 'sa', '', ''),
(6, 1, 0, 'sa', 'sa', 'sa', 'sas', 'sa', '2016-03-03', 'sa', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idPerusahaan` int(11) NOT NULL,
  `namaPerusahaan` varchar(32) NOT NULL,
  `alamatPerusahaan` varchar(255) NOT NULL,
  `nomorTelepon` varchar(16) NOT NULL,
  `namaDirektur` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`idPerusahaan`, `namaPerusahaan`, `alamatPerusahaan`, `nomorTelepon`, `namaDirektur`) VALUES
(1, 'pt silen', 'riung', '0920192019', 'sari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkontrak`
--

CREATE TABLE `suratkontrak` (
  `idSurat` int(11) NOT NULL,
  `idKaryawan` int(11) DEFAULT NULL,
  `nomor` varchar(32) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglBerakhir` date NOT NULL,
  `tugas` varchar(32) NOT NULL,
  `penempatanKaryawan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_activity_idx` (`timestamp`);

--
-- Indexes for table `karyawankontrak`
--
ALTER TABLE `karyawankontrak`
  ADD PRIMARY KEY (`idKaryawan`),
  ADD KEY `idPerusahaan` (`idPerusahaan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idPerusahaan`);

--
-- Indexes for table `suratkontrak`
--
ALTER TABLE `suratkontrak`
  ADD PRIMARY KEY (`idSurat`),
  ADD KEY `idKaryawan` (`idKaryawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawankontrak`
--
ALTER TABLE `karyawankontrak`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idPerusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suratkontrak`
--
ALTER TABLE `suratkontrak`
  MODIFY `idSurat` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawankontrak`
--
ALTER TABLE `karyawankontrak`
  ADD CONSTRAINT `karyawankontrak_ibfk_1` FOREIGN KEY (`idPerusahaan`) REFERENCES `perusahaan` (`idPerusahaan`);

--
-- Ketidakleluasaan untuk tabel `suratkontrak`
--
ALTER TABLE `suratkontrak`
  ADD CONSTRAINT `suratkontrak_ibfk_1` FOREIGN KEY (`idKaryawan`) REFERENCES `karyawankontrak` (`idKaryawan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
