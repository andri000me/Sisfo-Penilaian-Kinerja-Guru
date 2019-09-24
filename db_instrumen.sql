-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 11:06 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_instrumen`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_config`
--

CREATE TABLE `app_config` (
  `app_name` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `developer` text NOT NULL,
  `site_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_config`
--

INSERT INTO `app_config` (`app_name`, `author`, `description`, `developer`, `site_title`) VALUES
('Sistem Informasi Penilaian Kinerja Guru', 'Rezky P. Budihartono', 'Sistem Informasi Penilaian Kinerja Guru Kabupaten Sleman', '010 Developer', 'Sistem Informasi Penilaian Kinerja Guru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(5) NOT NULL,
  `id_sekolah` int(5) DEFAULT NULL,
  `id_tenaga_pendidik` int(5) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_guru` varchar(85) DEFAULT NULL,
  `nomor_seri` varchar(50) DEFAULT NULL,
  `nuptk` varchar(50) DEFAULT NULL,
  `nrg` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(85) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jabatan_golongan` varchar(15) DEFAULT NULL,
  `tmt_guru` varchar(15) DEFAULT NULL,
  `tmp_guru` varchar(15) DEFAULT NULL,
  `masa_kerja` text,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `guru_mapel` varchar(25) DEFAULT NULL,
  `level_guru` enum('Kepala Sekolah','Guru Senior','Guru Biasa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_indikator`
--

CREATE TABLE `tbl_indikator` (
  `id_indikator` int(5) NOT NULL,
  `id_tenaga_pendidik` int(5) DEFAULT NULL,
  `id_kompetensi` int(5) DEFAULT NULL,
  `nama_indikator` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kompetensi`
--

CREATE TABLE `tbl_kompetensi` (
  `id_kompetensi` int(5) NOT NULL,
  `id_tenaga_pendidik` int(5) DEFAULT NULL,
  `nama_kompetensi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(5) NOT NULL,
  `nama_sekolah` varchar(85) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `provinsi` varchar(85) DEFAULT NULL,
  `kabupaten` varchar(85) DEFAULT NULL,
  `kecamatan` varchar(85) DEFAULT NULL,
  `kelurahan` varchar(85) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id_sekolah`, `nama_sekolah`, `no_telp`, `provinsi`, `kabupaten`, `kecamatan`, `kelurahan`) VALUES
(1, 'SMA Negeri 1', '085340778770', 'Gorontalo', 'Kota Gorontalo', 'Sipatana', 'Tapa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skor`
--

CREATE TABLE `tbl_skor` (
  `id_skor` int(5) NOT NULL,
  `id_tenaga_pendidik` int(5) DEFAULT NULL,
  `id_indikator` int(5) DEFAULT NULL,
  `nama_skor` text,
  `bobot` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tenaga_pendidik`
--

CREATE TABLE `tbl_tenaga_pendidik` (
  `id_tenaga_pendidik` int(5) NOT NULL,
  `jenis_tenaga_pendidik` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tenaga_pendidik`
--

INSERT INTO `tbl_tenaga_pendidik` (`id_tenaga_pendidik`, `jenis_tenaga_pendidik`) VALUES
(1, 'Kepala Lab Komputer'),
(2, 'Kepala Sekolah'),
(3, 'Perpustakaan'),
(4, 'Wakil Kepala Sekolah'),
(5, 'Guru Mata Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `id_guru` int(5) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `role` enum('Administrator','Tim Penilai','Pengawas') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_guru`, `nama_lengkap`, `username`, `password`, `foto`, `role`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Rezky Pradana Budihartono', 'admin', 'YUR6L1ZHMUZBaWNNYkxxNkowSUhBdz09', 'AVATAR-673584.jpg', 'Administrator', '2018-11-19 21:14:57', '2019-09-24 06:57:13'),
(2, 1, 'Zulharman Paputungan', 'zul', 'YUR6L1ZHMUZBaWNNYkxxNkowSUhBdz09', 'AVATAR-159342.jpg', 'Tim Penilai', '2019-07-16 05:00:47', '2019-09-24 06:34:55'),
(3, 2, 'Fandi Iman', 'fandi', 'YUR6L1ZHMUZBaWNNYkxxNkowSUhBdz09', 'AVATAR-898956.jpg', 'Tim Penilai', '2019-09-23 04:37:01', '2019-09-24 06:34:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_tenaga_pendidik` (`id_tenaga_pendidik`);

--
-- Indexes for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  ADD PRIMARY KEY (`id_indikator`),
  ADD KEY `id_kompetensi` (`id_kompetensi`),
  ADD KEY `id_tenaga_pendidik` (`id_tenaga_pendidik`);

--
-- Indexes for table `tbl_kompetensi`
--
ALTER TABLE `tbl_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`),
  ADD KEY `id_tenaga_pendidik` (`id_tenaga_pendidik`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_skor`
--
ALTER TABLE `tbl_skor`
  ADD PRIMARY KEY (`id_skor`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_tenaga_pendidik` (`id_tenaga_pendidik`);

--
-- Indexes for table `tbl_tenaga_pendidik`
--
ALTER TABLE `tbl_tenaga_pendidik`
  ADD PRIMARY KEY (`id_tenaga_pendidik`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_guru` (`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  MODIFY `id_indikator` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kompetensi`
--
ALTER TABLE `tbl_kompetensi`
  MODIFY `id_kompetensi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_skor`
--
ALTER TABLE `tbl_skor`
  MODIFY `id_skor` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tenaga_pendidik`
--
ALTER TABLE `tbl_tenaga_pendidik`
  MODIFY `id_tenaga_pendidik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
