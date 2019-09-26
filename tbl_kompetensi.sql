-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 12:32 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
-- Table structure for table `tbl_kompetensi`
--

CREATE TABLE `tbl_kompetensi` (
  `id_kompetensi` int(5) NOT NULL,
  `id_tenaga_pendidik` int(5) DEFAULT NULL,
  `nama_kompetensi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kompetensi`
--

INSERT INTO `tbl_kompetensi` (`id_kompetensi`, `id_tenaga_pendidik`, `nama_kompetensi`) VALUES
(1, 5, 'Mengenal karakteristik peserta didik'),
(2, 5, 'Menguasai teori belajar dan prinsip-prinsip pembelajaran  yang mendidik'),
(3, 5, 'Pengembangan kurikulum'),
(4, 5, 'Kegiatan Pembelajaran yang Mendidik '),
(5, 5, 'Memahami dan mengembangkan potensi'),
(6, 5, 'Komunikasi dengan peserta didik'),
(7, 5, 'Penilaian dan evaluasi'),
(8, 5, 'Bertindak sesuai dengan norma agama, hukum, sosial dan kebudayaan nasional Indonesia'),
(9, 5, 'Menunjukkan pribadi yang dewasa dan teladan'),
(10, 5, 'Etos  kerja,  tanggung  jawab  yang  tinggi,  dan  rasa  bangga menjadi guru'),
(11, 5, 'Bersikap inklusif, bertindak objektif, serta tidak  Diskriminatif'),
(12, 5, 'Komunikasi  dengan  sesama  guru,  tenaga  pendidikan,  orang tua peserta didik, dan masyarakat'),
(13, 5, 'Penguasaan materi struktur konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang dimampu'),
(14, 5, 'Mengembangkan keprofesian melalui tindakan reflektif'),
(15, 2, 'Kepribadian dan Sosial (PKKS 1)'),
(16, 2, 'Kepemimpinan (PKKS 2)'),
(17, 2, 'Pengembangan Sekolah/ Madrasah (PKKS 3)'),
(18, 2, 'Pengelolaan Sumber Daya (PKKS 4)'),
(19, 2, 'Kewirausahaan (PKKS 5)'),
(20, 2, 'Supervisi (PKKS 6)'),
(21, 4, 'Kepribadian dan Sosial (PKWKS 1)'),
(22, 4, 'Kepemimpinan (PKWKS 2)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kompetensi`
--
ALTER TABLE `tbl_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`),
  ADD KEY `id_tenaga_pendidik` (`id_tenaga_pendidik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kompetensi`
--
ALTER TABLE `tbl_kompetensi`
  MODIFY `id_kompetensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
