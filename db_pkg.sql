-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 09:54 AM
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
-- Database: `db_pkg`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_config`
--

CREATE TABLE `app_config` (
  `id` int(5) NOT NULL,
  `app_name` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `developer` text NOT NULL,
  `site_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_config`
--

INSERT INTO `app_config` (`id`, `app_name`, `author`, `description`, `developer`, `site_title`) VALUES
(1, 'Sistem Informasi Penilaian Kinerja Guru', 'Rezky P. Budihartono', 'Sistem Informasi Penilaian Kinerja Guru Kabupaten Sleman', '010 Developer', 'SIPKG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golongan`
--

CREATE TABLE `tbl_golongan` (
  `id_golongan` int(5) NOT NULL,
  `kenaikan_ke` varchar(50) DEFAULT NULL,
  `akk` int(5) DEFAULT NULL,
  `pd` int(5) DEFAULT NULL,
  `pi` int(5) DEFAULT NULL,
  `ki` int(5) DEFAULT NULL,
  `akp` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`id_golongan`, `kenaikan_ke`, `akk`, `pd`, `pi`, `ki`, `akp`) VALUES
(1, 'III a ke III b', 50, 3, 0, 0, 5),
(2, 'III b ke III c', 50, 3, 4, 0, 5),
(3, 'III c ke III d', 100, 3, 6, 0, 10),
(4, 'III d ke IV a', 100, 4, 8, 0, 10),
(5, 'IV a ke IV b', 150, 4, 12, 0, 15),
(6, 'IV b ke IV c', 150, 4, 12, 0, 15),
(7, 'IV c ke IV d', 150, 5, 14, 0, 15),
(8, 'IV d ke IV e', 200, 5, 20, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(5) NOT NULL,
  `id_sekolah` int(5) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `nama_guru` varchar(85) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(85) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nomor_seri` varchar(50) DEFAULT NULL,
  `nuptk` varchar(50) DEFAULT NULL,
  `nrg` varchar(50) DEFAULT NULL,
  `jabatan` varchar(15) DEFAULT NULL,
  `tmt_pangkat_golongan` varchar(15) DEFAULT NULL,
  `tmt_sebagai_guru` varchar(15) DEFAULT NULL,
  `masa_kerja_sebagai_guru` text,
  `tmt_tugas_tambahan` varchar(15) DEFAULT NULL,
  `masa_kerja_tugas_tambahan` text,
  `pendidikan` varchar(15) DEFAULT NULL,
  `guru_mapel` varchar(25) DEFAULT NULL,
  `level_guru` enum('Kepala Sekolah','Guru Senior','Guru Mata Pelajaran') DEFAULT NULL,
  `asesor` enum('N','Y') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `id_sekolah`, `nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `nomor_seri`, `nuptk`, `nrg`, `jabatan`, `tmt_pangkat_golongan`, `tmt_sebagai_guru`, `masa_kerja_sebagai_guru`, `tmt_tugas_tambahan`, `masa_kerja_tugas_tambahan`, `pendidikan`, `guru_mapel`, `level_guru`, `asesor`) VALUES
(10, 1, '123242342342342333', 'Firda ', 'Perempuan', 'Gorontalo', '2019-10-08', '343242432', '434', '234234', 'Tes', '3', '3', '1 tahun 2 bulan', '3', '1 tahun 2 bulan', 'S1', 'MM', 'Kepala Sekolah', 'Y'),
(12, 1, '123123123123333223', 'Ramdan', 'Laki-Laki', 'Gtlo', '2019-10-15', '23423423', '23423', '44234', '2342', '23423', '423423', '1 tahun 3 Bulan', 'Tugas Tambahan', '2 Tahun 3 Bulan', 'S1', 'MM', 'Guru Senior', 'Y'),
(13, 1, '132456889989789792', 'Fandi', 'Laki-Laki', 'Gorontalo', '2019-10-17', '12345648789', '432889515', '28951238', '2', '2', 'Tes', '1 Tahun 2 Bulan', 'Tugas', '1 Tahun 3 Bulan', 'S1', 'TIK', 'Guru Mata Pelajaran', 'N'),
(14, 2, '131311231233234320', 'Uci Juliana', 'Perempuan', 'Gorontalo', '2019-10-21', '453534534', '23434234', '53453453', 'Tes', '3', '3', '2', '2', '2', 'S1', 'Bahasa', 'Kepala Sekolah', 'Y'),
(15, 2, '123456789123456789', 'Sidik Luma', 'Laki-Laki', 'Gorontalo', '2019-10-22', '23424234', '4243', '44243', '3424', '423423', '234234', '34423', '4234234', '42342', 'S2', 'TIK', 'Guru Senior', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru_dinilai`
--

CREATE TABLE `tbl_guru_dinilai` (
  `id_guru_dinilai` int(5) NOT NULL,
  `id_guru_asesor` int(5) DEFAULT NULL,
  `id_guru_nilai` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_guru_dinilai`
--

INSERT INTO `tbl_guru_dinilai` (`id_guru_dinilai`, `id_guru_asesor`, `id_guru_nilai`) VALUES
(17, 10, 12),
(18, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_indikator`
--

CREATE TABLE `tbl_indikator` (
  `id_indikator` int(5) NOT NULL,
  `id_tugas` int(5) DEFAULT NULL,
  `id_kompetensi` int(5) DEFAULT NULL,
  `nama_indikator` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_indikator`
--

INSERT INTO `tbl_indikator` (`id_indikator`, `id_tugas`, `id_kompetensi`, `nama_indikator`) VALUES
(1, 1, 1, '1. Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik di kelasnya.'),
(2, 1, 1, '2. Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran.'),
(3, 1, 1, '3. Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda.'),
(4, 1, 1, '4. Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar perilaku tersebut tidak merugikan  peserta didik lainnya.'),
(5, 1, 1, '5. Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.'),
(6, 1, 1, '6. Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarginalkan (tersisihkan, diolok olok, minder, dsb.).'),
(7, 1, 2, '1. Guru memberi kesempatan kepada peserta didik untuk menguasai materi pembelajaran sesuai usia dan kemampuan belajarnya melalui pengaturan proses pembelajaran dan aktivitas yang bervariasi.'),
(8, 1, 2, '2. Guru selalu memastikan tingkat pemahaman peserta didik terhadap materi pembelajaran tertentu dan menyesuaikan aktivitas pembelajaran berikutnya berdasarkan tingkat pemahaman tersebut.'),
(9, 1, 2, '3. Guru dapat menjelaskan alasan pelaksanaan kegiatan/aktivitas yang dilakukannya, baik yang  sesuai maupun yang berbeda dengan rencana, terkait keberhasilan pembelajaran'),
(10, 1, 2, '4. Guru menggunakan berbagai teknik untuk memotiviasi kemauan belajar peserta didik'),
(11, 1, 2, '5. Guru merencanakan kegiatan pembelajaran yang saling terkait satu sama lain, dengan memperhatikan tujuan pembelajaran maupun proses belajar peserta didik.'),
(12, 1, 2, '6. Guru memperhatikan respon peserta didik yang belum/kurang memahami materi pembelajaran yang  diajarkan dan menggunakannya untuk memperbaiki rancangan pembelajaran berikutnya.'),
(13, 1, 3, '1. Guru dapat menyusun silabus yang sesuai dengan kurikulum.'),
(14, 1, 3, '2. Guru merancang rencana pembelajaran yang sesuai dengan silabus untuk membahas materi ajar tertentu agar peserta didik dapat mencapai kompetensi dasar yang ditetapkan.'),
(15, 1, 3, '3. Guru mengikuti urutan materi pembelajaran dengan memperhatikan tujuan pembelajaran.'),
(16, 1, 3, '4. Guru memilih materi pembelajaran yang: a) sesuai dengan tujuan pembelajaran, b) tepat dan mutakhir, c) sesuai dengan usia dan tingkat \r\nkemampuan belajar peserta didik, dan d) dapat dilaksanakan di kelas e) sesuai dengan konteks kehidupan seharihari peserta didik.'),
(17, 1, 4, '1. Guru melaksanakan aktivitas pembelajaran sesuai dengan rancangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya.'),
(18, 1, 4, '2. Guru melaksanakan aktivitas pembelajaran yang bertujuan untuk membantu proses belajar peserta didik, bukan untuk menguji sehingga membuat peserta didik merasa tertekan.'),
(19, 1, 4, '3. Guru mengkomunikasikan informasi baru (misalnya materi tambahan) sesuai dengan usia dan tingkat kemampuan belajar peserta didik.'),
(20, 1, 4, '4. Guru menyikapi kesalahan yang dilakukan peserta didik sebagai tahapan proses pembelajaran, bukan sematamata kesalahan yang harus dikoreksi. Misalnya: dengan \r\nmengetahui terlebih dahulu peserta didik lain yang setuju atau tidak setuju dengan jawaban tersebut, sebelum memberikan penjelasan tentang jawaban yang benar.'),
(21, 1, 4, '5. Guru melaksanakan kegiatan pembelajaran sesuai isi kurikulum dan mengkaitkannya dengan konteks kehidupan seharihari peserta didik.'),
(22, 1, 4, '6. Guru melakukan aktivitas pembelajaran secara bervariasi dengan waktu yang cukup untuk kegiatan pembelajaran yang sesuai dengan usia dan tingkat kemampuan belajar dan \r\nmempertahankan perhatian peserta didik'),
(23, 1, 4, '7. Guru mengelola kelas dengan efektif tanpa mendominasi atau sibuk dengan kegiatannya sendiri agar semua waktu peserta dapat termanfaatkan secara produktif.'),
(24, 1, 4, '8. Guru mampu menyesuaikan aktivitas pembelajaran yang dirancang dengan kondisi kelas.'),
(25, 1, 4, '9. Guru memberikan banyak kesempatan kepada peserta didik untuk bertanya, mempraktekkan dan berinteraksi dengan peserta didik lain'),
(26, 1, 4, '10. Guru mengatur pelaksanaan aktivitas pembelajaran secara sistematis untuk membantu proses belajar peserta didik. Sebagai contoh: guru menambah informasi baru setelah mengevaluasi pemahaman peserta didik terhadap materi sebelumnya.'),
(27, 1, 4, '11. Guru menggunakan alat bantu mengajar, dan/atau audiovisual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran.'),
(28, 1, 5, '1. Guru menganalisis hasil belajar berdasarkan segala bentuk penilaian terhadap setiap peserta didik untuk mengetahui tingkat kemajuan masing-masing.'),
(29, 1, 5, '2. Guru merancang dan melaksanakan aktivitas pembelajaran yang mendorong peserta didik untuk belajar sesuai dengan kecakapan dan pola belajar masing-masing.'),
(30, 1, 5, '3. Guru merancang dan melaksanakan aktivitas pembelajaran untuk memunculkan daya kreativitas dan kemampuan berfikir kritis peserta didik.'),
(31, 1, 5, '4. Guru secara aktif membantu peserta didik dalam proses pembelajaran dengan memberikan perhatian kepada setiap individu.'),
(32, 1, 5, '5. Guru dapat mengidentifikasi dengan benar tentang bakat, minat, potensi, dan kesulitan belajar masingmasing peserta didik.'),
(33, 1, 5, '6. Guru memberikan kesempatan belajar kepada peserta didik sesuai dengan cara belajarnya masing-masing.'),
(34, 1, 5, '7. Guru memusatkan perhatian pada interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan.'),
(35, 1, 6, '1. Guru menggunakan pertanyaan untuk mengetahui pemahaman dan menjaga partisipasi peserta didik, termasuk memberikan pertanyaan terbuka yang menuntut peserta didik untuk menjawab dengan ide dan pengetahuan mereka.'),
(36, 1, 6, '2. Guru memberikan perhatian dan mendengarkan semua pertanyaan dan tanggapan peserta didik, tanpa menginterupsi, kecuali jika diperlukan untuk membantu atau mengklarifikasi \r\npertanyaan/tanggapan tersebut.'),
(37, 1, 6, '3. Guru menanggapinya pertanyaan peserta didik secara tepat, benar, dan mutakhir, sesuai tujuan pembelajaran dan isi kurikulum, tanpa mempermalukannya.'),
(38, 1, 6, '4. Guru menyajikan kegiatan pembelajaran yang dapat menumbuhkan kerja sama yang baik antar pesertadidik.'),
(39, 1, 6, '5. Guru mendengarkan dan memberikan perhatian terhadap semua jawaban peserta didik baik yang benar maupun yang dianggap salah untuk mengukur tingkat pemahaman peserta didik.'),
(40, 1, 6, '6. Guru memberikan perhatian terhadap pertanyaan peserta didik dan meresponnya secara lengkap dan relevan untuk menghilangkan kebingungan pada peserta didik.'),
(41, 1, 7, '1. Guru menyusun alat penilaian yang sesuai dengan tujuan pembelajaran untuk mencapai kompetensi tertentu seperti yang tertulis dalam RPP.'),
(42, 1, 7, '2. Guru melaksanakan penilaian dengan berbagai teknik dan jenis penilaian, selain penilaian formal yang dilaksanakan sekolah, dan mengumumkan hasil serta implikasinya kepada peserta didik, \r\ntentang tingkat pemahaman terhadap materi pembelajaran yang telah dan akan dipelajari.'),
(43, 1, 7, '3. Guru menganalisis hasil penilaian untuk mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuatan dan kelemahan masingmasing peserta didik untuk keperluan remedial dan pengayaan.'),
(44, 1, 7, '4. Guru memanfaatkan masukan dari peserta didik dan merefleksikannya untuk meningkatkan pembelajaran selanjutnya, dan dapat membuktikannya melalui catatan, jurnal pembelajaran, rancangan pembelajaran, materi tambahan, dan sebagainya.'),
(45, 1, 7, '5. Guru memanfatkan hasil penilaian sebagai bahan penyusunan rancangan pembelajaran yang akan dilakukan selanjutnya.'),
(46, 1, 8, '1. Guru menghargai dan mempromosikan prinsip prinsip Pancasila sebagai dasar ideologi dan etika bagi semua warga Indonesia.'),
(47, 1, 8, '2. Guru mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya: suku, \r\nagama, dan gender).'),
(48, 1, 8, '3. Guru saling menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing.'),
(49, 1, 8, '4. Guru memiliki rasa persatuan dan kesatuan sebagai bangsa Indonesi.'),
(50, 1, 8, '5. Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia (misalnya: budaya, suku, agama).'),
(51, 1, 9, '1. Guru bertingkah laku sopan dalam berbicara,berpenampilan, dan berbuat terhadap semua peserta didik, orang tua, dan teman sejawat.'),
(52, 1, 9, '2. Guru mau membagi pengalamannya dengan teman sejawat, termasuk mengundang mereka untuk mengobservasi cara mengajarnya dan memberikan masukan.'),
(53, 1, 9, '3. Guru mampu mengelola pembelajaran yang membuktikan bahwa guru dihormati oleh peserta didik, sehingga semua peserta didik selalu \r\nmemperhatikan guru dan berpartisipasi aktif dalam proses pembelajaran.'),
(54, 1, 9, '4. Guru bersikap dewasa dalam menerima masukan dari peserta didik dan memberikan kesempatan kepada peserta didik untuk berpartisipasi dalam proses pembelajaran.'),
(55, 1, 9, '5. Guru berperilaku baik untuk mencitrakan nama baik sekolah.'),
(56, 1, 10, '1. Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu.'),
(57, 1, 10, '2. Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan halhal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas.'),
(58, 1, 10, '3. Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain di luar jam mengajar berdasarkan ijin dan persetujuan \r\npengelola sekolah.'),
(59, 1, 10, '4. Guru meminta ijin dan memberitahu lebih awal, dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas.'),
(60, 1, 10, '5. Guru menyelesaikan semua tugas administratif dan non pembelajaran dengan tepat waktu sesuai standar yang ditetapkan.'),
(61, 1, 10, '6. Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya.'),
(62, 1, 10, '7. Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah.'),
(63, 1, 10, '8. Guru merasa bangga dengan profesinya sebagai guru.'),
(64, 1, 11, '1. Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing-masing, tanpa memperdulikan faktor personal.'),
(65, 1, 11, '2. Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya.'),
(66, 1, 11, '3. Guru sering berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru).'),
(67, 1, 12, '1. Guru menyampaikan informasi tentang kemajuan, kesulitan, dan potensi peserta didik kepada orang tuanya, baik dalam pertemuan formal maupun tidak formal antara guru dan orang tua, teman sejawat, dan dapat menunjukkan buktinya.'),
(68, 1, 12, '2. Guru ikut berperan aktif dalam kegiatan di luar pembelajaran yang diselenggarakan oleh sekolah dan masyarakat dan dapat memberikan bukti keikutsertaannya.'),
(69, 1, 12, '3. Guru memperhatikan sekolah sebagai bagian dari masyarakat, berkomunikasi dengan masyarakat sekitar, serta berperan dalam kegiatan sosial di masyarakat.'),
(70, 1, 13, '1. Guru melakukan pemetaan standar kompetensi dan kompetensi dasar untuk mata pelajaran yang dimampunya, untuk mengidentifikasi materi pembelajaran yang dianggap sulit, melakukan\r\nperencanaan dan pelaksanaan pembelajaran, dan memperkirakan alokasi waktu yang diperlukan.'),
(71, 1, 13, '2. Guru menyertakan informasi yang tepat dan mutakhir di dalam perencanaan dan pelaksanaan pembelajaran.'),
(72, 1, 13, '3. Guru menyusun materi, perencanaan dan pelaksanaan pembelajaran yang berisi informasi yang tepat, mutakhir, dan yang membantu peserta didik untuk memahami konsep materi  pembelajaran.'),
(73, 1, 14, '1. Guru melakukan evaluasi diri secara spesifik, lengkap, dan  didukung dengan contoh pengalaman diri sendiri.'),
(74, 1, 14, '2. Guru memiliki jurnal pembelajaran, catatan masukan dari kolega atau hasil penilaian proses pembelajaran sebagai bukti yang menggambarkan kinerjanya.'),
(75, 1, 14, '3. Guru memanfaatkan bukti gambaran kinerjanya untuk mengembangkan  perencanaan dan pelaksanaan pembelajaran selanjutnya dalam program Pengembangan Keprofesian Berkelanjutan (PKB).'),
(76, 1, 14, '4. Guru dapat mengaplikasikan pengalaman PKB dalam perencanaan, pelaksanaan, penilaian pembelajaran dan tindak lanjutnya.'),
(77, 1, 14, '5. Guru melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya seminar, konferensi), dan aktif dalam melaksanakan PKB.'),
(78, 1, 14, '6. Guru dapat memanfaatkan TIK dalam berkomunikasi dan pelaksanaan PKB.'),
(79, 2, 15, '1. Berakhlak mulia, mengembangkan budaya dan tradisi akhlak mulia, dan menjadi teladan akhlak mulia bagi komunitas di sekolah/madrasah.'),
(80, 2, 15, '2. Melaksanakan tugas pokok dan fungsi sebagai kepala sekolah dengan penuh kejujuran, ketulusan, komitmen, dan integritas.'),
(81, 2, 15, '3. Bersikap terbuka dalam melaksanakan tugas pokok dan fungsi sebagai kepala sekolah/madrasah.'),
(82, 2, 15, '4. Mengendalikan diri dalam menghadapi masalah dan tantangan sebagai kepala sekolah/madrasah.'),
(83, 2, 15, '5. Berpartisipasi dalam kegiatan sosial kemasyarakatan.'),
(84, 2, 15, '6. Tanggap dan peduli terhadap kepentingan orang atau kelompok lain.'),
(85, 2, 15, '7. Mengembangkan dan mengelola hubungan sekolah/madrasah dengan pihak lain di luar sekolah dalam rangka mendapatkan dukungan ide, sumber belajar, dan pembiayaan sekolah/madrasah.'),
(86, 2, 16, '1. Bertindak sesuai dengan visi dan misi sekolah/madrasah.'),
(87, 2, 16, '2. Merumuskan tujuan yang menantang diri  sendiri dan orang lain untuk mencapai standard yang tinggi.'),
(88, 2, 16, '3. Mengembangkan sekolah/madrasah menuju organisasi pembelajar (learning)'),
(89, 2, 16, '4. Menciptakan budaya dan iklim sekolah/madrasah yang kondusif dan inovatif bagi pembelajaran.'),
(90, 2, 16, '5. Memegang teguh tujuan sekolah dengan menjadi contoh dan bertindak sebagai pemimpin pembelajaran.'),
(91, 2, 16, '6. Melaksanakan kepemimpinan yang inspiratif.'),
(92, 2, 16, '7. Membangun rasa saling percaya dan memfasilitasi kerjasama dalam rangka untuk menciptakan kolaborasi yang kuat diantara warga sekolah/madrasah.'),
(93, 2, 16, '8. Bekerja keras untuk mencapai keberhasilan sekolah/madrasah sebagai organisasi pembelajar yang efektif.'),
(94, 2, 16, '9. Mengembangan kurikulum dan kegiatan pembelajaran sesuai dengan visi, misi, dan tujuan sekolah.'),
(95, 2, 16, '10. Mengelola peserta didik dalam rangka pengembangan kapasitasnya secara optimal.'),
(96, 2, 17, '1. Menyusun rencana pengembangan sekolah/madrasah jangka panjang, menengah, dan pendek dalam rangka mencapai visi, misi, dan tujuan sekolah/madrasah.'),
(97, 2, 17, '2. Mengembangkan struktur organisasi sekolah/ madrasah yang efektif dan efisien sesuai dengan kebutuhan.'),
(98, 2, 17, '3. Melaksanakan pengembangan sekolah/ madrasah sesuai dengan rencana jangka panjang, menengah, dan jangka pendek sekolah menuju tercapainya visi, misi, dan tujuan sekolah.'),
(99, 2, 17, '4. Mewujudkan peningkatan kinerja sekolah yang signifikan sesuai dengan visi, misi, tujuan.'),
(100, 2, 17, '5. Melakukan monitoring, evaluasi, dan pelaporan pelaksanaan program kegiatan sekolah/madrasah dengan prosedur yang tepat.'),
(101, 2, 17, '6. Merencanakan dan menindaklanjuti hasil monitoring, evaluasi, dan pelaporan.'),
(102, 2, 17, '7. Melaksanakan penelitian tindakan sekolah dalam rangka meningkatkan kinerja sekolah/madrasah.'),
(103, 2, 18, '1. Mengelola dan mendayagunakan pendidik dan tenaga kependidikan secara optimal.'),
(104, 2, 18, '2. Mengelola dan mendayagunakan sarana dan prasarana sekolah/madrasah secara optimal untuk kepentingan pembelajaran.'),
(105, 2, 18, '3. Mengelola keuangan sekolah/madrasah sesuai dengan prinsip-prinsip efisiensi, transparansi, dan akuntabilitas.'),
(106, 2, 18, '4. Mengelola lingkungan sekolah yang menjamin keamanan, keselamatan, dan kesehatan.'),
(107, 2, 18, '5. Mengelola ketatausahaan sekolah/madrasah dalam mendukung pencapaian tujuan sekolah/ madrasah.'),
(108, 2, 18, '6. Mengelola sistem informasi sekolah/madrasah dalam mendukung penyusunan program'),
(109, 2, 18, '7.  Mengelola layanan-layanan khusus sekolah/madrasah dalam mendukung kegiatan pembelajaran dan kegiatan peserta didik di sekolah/madrasah.'),
(110, 2, 18, '8. Memanfaatkan teknologi secara efektif dalam kegiatan pembelajaran dan manajemen sekolah/madrasah.'),
(111, 2, 19, '1. Menciptakan inovasi yang bermanfaat bagi pengembangan sekolah/ madrasah.'),
(112, 2, 19, '2. Memiliki motivasi yang kuat untuk sukses dalam melaksanakan tugas pokok dan fungsinya sebagai pemimpin pembelajaran.'),
(113, 2, 19, '3. Memotivasi warga sekolah untuk sukses dalam melaksanakan tugas pokok dan fungsinya masing-masing.'),
(114, 2, 19, '4. Pantang menyerah dan selalu mencari solusi terbaik dalam menghadapi kendala yang'),
(115, 2, 19, '5. Menerapkan nilai dan prinsip-prinsip kewirausahaan dalam mengembangkan sekolah/madrasah.'),
(116, 2, 20, '1. Menyusun program supervisi akademik dalam rangka peningkatan profesionalisme guru.'),
(117, 2, 20, '2. Melaksanakan supervisi akademik terhadap guru dengan menggunakan pendekatan dan teknik supervisi yang tepat.'),
(118, 2, 20, '3. Menilai dan menindaklanjuti kegiatan supervisi akademik dalam rangka peningkatan profesionalisme guru.'),
(119, 4, 26, 'Berprilaku arif dalam bertindak dan memecahkan masalah'),
(120, 4, 26, 'Berperilaku jujur atas semua informasi kedinasan'),
(121, 4, 26, 'Menunjukkan kemandirian dalam bekerja dibidangnya'),
(122, 4, 26, 'Menunjukkan rasa percaya diri atas keputusan yang diambil'),
(123, 4, 26, 'Berupaya meningkatkan kemampuan diri dibidangnya'),
(124, 4, 26, 'Bertindak secara konsisten sesuai dengan norma agama, hukum, sosial, dan budaya nasional Indonesia'),
(125, 4, 26, 'Berperilaku disiplin atas waktu dan aturan'),
(126, 4, 26, 'Bertanggung jawab terhadap tugas'),
(127, 4, 26, 'Tekun, teliti, dan hati-hati dalam melaksanakan tugas'),
(128, 4, 26, 'Kreatif dalam memecahkan masalah yang berkaitan dengan tugas profesinya'),
(129, 4, 26, 'Berorientasi pada kualitas dan kepuasan layanan pemakai laboratorium/ bengkel'),
(130, 4, 27, 'Menciptakan inovasi yang bermanfaat bagi pengembangan sekolah/ madrasah.'),
(131, 4, 27, 'Memiliki motivasi yang kuat untuk sukses dalam melaksanakan tugas pokok dan fungsinya sebagai pemimpin pembelajaran.'),
(132, 4, 27, 'Memotivasi warga sekolah untuk sukses dalam melaksanakan tugas pokok dan fungsinya masing-masing.'),
(133, 4, 27, 'Pantang menyerah dan selalu mencari solusi terbaik dalam menghadapi kendala yang'),
(134, 4, 27, 'Menerapkan nilai dan prinsip-prinsip kewirausahaan dalam mengembangkan sekolah/madrasah.'),
(135, 4, 28, 'Mengkoordinasikan kegiatan praktikum dengan guru'),
(136, 4, 28, 'Merumuskan rincian tugas teknisi dan laboran'),
(137, 4, 28, 'Menentukan jadwal kerja teknisi dan laboran'),
(138, 4, 28, 'Mensupervisi teknisi dan laboran'),
(139, 4, 28, 'Menilai hasil kerja teknisi dan laboran'),
(140, 4, 28, 'Menilai kinerja teknisi dan laboran laboratorium'),
(141, 4, 29, 'Menyusun program pengelolaan laboratorium'),
(142, 4, 29, 'Menyusun jadwal kegiatan laboratorium'),
(143, 4, 29, 'Menyusun rencana pengembangan laboratorium'),
(144, 4, 29, 'Menyusun prosedur operasi standar (POS) kerja laboratorium'),
(145, 4, 29, 'Mengembangkan sistem administrasi laboratorium'),
(146, 4, 29, 'Menyusun laporan kegiatan laboratorium'),
(147, 4, 30, 'Memantau kondisi dan keamanan bahan serta alat laboratorium'),
(148, 4, 30, 'Memantau kondisi dan keamanan bangunan laboratorium'),
(149, 4, 30, 'Memantau pelaksanaan kegiatan laboratorium'),
(150, 4, 30, 'Membuat laporan bulanan dan tahunan tentang kondisi dan pemanfaatan laboratorium'),
(151, 4, 30, 'Membuat laporan secara periodic'),
(152, 4, 30, 'Mengevaluasi program laboratorium untuk perbaikan selanjutnya'),
(153, 4, 30, 'Menilai kegiatan laboratorium'),
(154, 4, 31, 'Mengikuti perkembangan pemikiran tentang pemanfaatan kegiatan laboratorium sebagai wahana pendidikan'),
(155, 4, 31, 'Menerapkan hasil inovasi atau kajian laboratorium'),
(156, 4, 31, 'Merancang kegiatan laboratorium untuk pendidikan dan pelatihan'),
(157, 4, 31, 'Melaksanakan kegiatan laboratorium untuk kepentingan pendidikan dan pelatihan'),
(158, 4, 31, 'Mempublikasikan karya tulis imliah hasil kajian/ inovasi laboratorium'),
(159, 4, 32, 'Menyusun panduan/ penuntun (manual) praktikum'),
(160, 4, 32, 'Menetapkan ketentuan mengenai kesehatan dan keselamatan kerja (K3)'),
(161, 4, 32, 'Menerapkan ketentuan mengenai kesehatan dan keselamatan kerja (K3)'),
(162, 4, 32, 'Menerapkan prosedur penangan bahan berbahaya dan beracun'),
(163, 4, 32, 'Memantau bahan berbahaya dan beracun, serta peralatan keselamatan kerja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kompetensi`
--

CREATE TABLE `tbl_kompetensi` (
  `id_kompetensi` int(5) NOT NULL,
  `id_tugas` int(5) DEFAULT NULL,
  `nama_kompetensi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kompetensi`
--

INSERT INTO `tbl_kompetensi` (`id_kompetensi`, `id_tugas`, `nama_kompetensi`) VALUES
(1, 1, 'Mengenal karakteristik peserta didik'),
(2, 1, 'Menguasai teori belajar dan prinsip-prinsip pembelajaran  yang mendidik'),
(3, 1, 'Pengembangan kurikulum'),
(4, 1, 'Kegiatan Pembelajaran yang Mendidik '),
(5, 1, 'Memahami dan mengembangkan potensi'),
(6, 1, 'Komunikasi dengan peserta didik'),
(7, 1, 'Penilaian dan evaluasi'),
(8, 1, 'Bertindak sesuai dengan norma agama, hukum, sosial dan kebudayaan nasional Indonesia'),
(9, 1, 'Menunjukkan pribadi yang dewasa dan teladan'),
(10, 1, 'Etos kerja, tanggung jawab yang tinggi, dan rasa  bangga menjadi guru.'),
(11, 1, 'Bersikap inklusif, bertindak objektif, serta tidak  Diskriminatif'),
(12, 1, 'Komunikasi  dengan  sesama  guru,  tenaga  pendidikan,  orang tua peserta didik, dan masyarakat'),
(13, 1, 'Penguasaan materi struktur konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang dimampu'),
(14, 1, 'Mengembangkan keprofesian melalui tindakan reflektif'),
(15, 2, 'Kepribadian dan Sosial (PKKS 1)'),
(16, 2, 'Kepemimpinan (PKKS 2)'),
(17, 2, 'Pengembangan Sekolah/ Madrasah (PKKS 3)'),
(18, 2, 'Pengelolaan Sumber Daya (PKKS 4)'),
(19, 2, 'Kewirausahaan (PKKS 5)'),
(20, 2, 'Supervisi (PKKS 6)'),
(21, 3, 'Kepribadian dan Sosial (PKWKS 1)'),
(22, 3, 'Kepemimpinan (PKWKS 2)'),
(23, 3, 'Pengembangan Sekolah (PKWKS 3)'),
(24, 3, 'Kewirausahaan (PKWKS 4)'),
(25, 3, 'Bidang Tugas Wakasek (PKWKS 5)'),
(26, 4, 'Kepribadian'),
(27, 4, 'Sosial'),
(28, 4, 'Pengorganisasian Guru/ Laboran/ Teknisi'),
(29, 4, 'Pengelolaan dan Administrasi'),
(30, 4, 'Pengelolaan Pemantauan dan Evaluasi'),
(31, 4, 'Pengembangan dan Inovasi'),
(32, 4, 'Pengelolaan lingkungan dan P3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengawas`
--

CREATE TABLE `tbl_pengawas` (
  `id_pengawas` int(5) NOT NULL,
  `nip_pengawas` varchar(18) DEFAULT NULL,
  `nama_pengawas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pengawas`
--

INSERT INTO `tbl_pengawas` (`id_pengawas`, `nip_pengawas`, `nama_pengawas`) VALUES
(1, '123322323122342322', 'Jafar'),
(2, '123545687842364789', 'Ferry Laparaga');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengawas_kepsek`
--

CREATE TABLE `tbl_pengawas_kepsek` (
  `id_pengawas_kepsek` int(5) NOT NULL,
  `id_pengawas` int(5) DEFAULT NULL,
  `id_sekolah` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pengawas_kepsek`
--

INSERT INTO `tbl_pengawas_kepsek` (`id_pengawas_kepsek`, `id_pengawas`, `id_sekolah`) VALUES
(4, 2, 1),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian_guru`
--

CREATE TABLE `tbl_penilaian_guru` (
  `id_penilaian_guru` int(5) NOT NULL,
  `id_guru` int(5) DEFAULT NULL,
  `id_tugas` int(5) DEFAULT NULL,
  `id_kompetensi` int(5) DEFAULT NULL,
  `id_indikator` int(5) DEFAULT NULL,
  `skor_1` int(5) DEFAULT NULL,
  `skor_2` int(5) DEFAULT NULL,
  `skor_3` int(5) DEFAULT NULL,
  `skor_4` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian_kepsek`
--

CREATE TABLE `tbl_penilaian_kepsek` (
  `id_penilaian_kepsek` int(5) NOT NULL,
  `id_pengawas` int(5) DEFAULT NULL,
  `id_tugas` int(5) DEFAULT NULL,
  `id_kompetensi` int(5) DEFAULT NULL,
  `id_indikator` int(5) DEFAULT NULL,
  `skor_1` int(5) DEFAULT NULL,
  `skor_2` int(5) DEFAULT NULL,
  `skor_3` int(5) DEFAULT NULL,
  `skor_4` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(1, 'SMA Negeri 1', '085340778770', 'Gorontalo', 'Kota Gorontalo', 'Sipatana', 'Tapa'),
(2, 'SMA 2 Negeri Gorontalo', '085340778770', 'Gorontalo', 'Kota Gorontalo', 'Dungingi', 'Tapa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(5) NOT NULL,
  `tugas` varchar(25) DEFAULT NULL,
  `jenis_tugas` enum('Pokok','Tambahan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id_tugas`, `tugas`, `jenis_tugas`) VALUES
(1, 'Guru Mata Pelajaran', 'Pokok'),
(2, 'Kepala Sekolah', 'Tambahan'),
(3, 'Wakil Kepala Sekolah', 'Tambahan'),
(4, 'Kepala Lab Komputer', 'Tambahan'),
(5, 'Kepala Perpustakaan', 'Tambahan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas_guru`
--

CREATE TABLE `tbl_tugas_guru` (
  `id_tugas_guru` int(5) NOT NULL,
  `id_guru` int(5) DEFAULT NULL,
  `id_tugas` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tugas_guru`
--

INSERT INTO `tbl_tugas_guru` (`id_tugas_guru`, `id_guru`, `id_tugas`) VALUES
(8, 10, 1),
(9, 10, 2),
(11, 12, 1),
(12, 12, 4),
(13, 13, 1),
(14, 14, 1),
(15, 14, 2),
(16, 15, 1),
(17, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `id_guru` int(5) DEFAULT NULL,
  `id_pengawas` int(5) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `role` enum('Administrator','Guru','Pengawas') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_guru`, `id_pengawas`, `nama_lengkap`, `username`, `password`, `foto`, `role`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Rezky Pradana Budihartono', 'admin', 'YUR6L1ZHMUZBaWNNYkxxNkowSUhBdz09', 'AVATAR-673584.jpg', 'Administrator', '2018-11-19 21:14:57', '2019-09-24 06:57:13'),
(4, 10, NULL, 'Iztys', 'isti', 'YUR6L1ZHMUZBaWNNYkxxNkowSUhBdz09', 'AVATAR-809845.jpg', 'Guru', '2019-09-30 06:51:30', '2019-10-18 09:10:29'),
(5, NULL, 1, 'Jafar', 'jafar', 'YUR6L1ZHMUZBaWNNYkxxNkowSUhBdz09', 'AVATAR-464934.jpg', 'Pengawas', '2019-10-19 05:15:02', '2019-10-19 05:24:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_config`
--
ALTER TABLE `app_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `tbl_guru_dinilai`
--
ALTER TABLE `tbl_guru_dinilai`
  ADD PRIMARY KEY (`id_guru_dinilai`),
  ADD KEY `id_guru_asesor` (`id_guru_asesor`),
  ADD KEY `id_guru_nilai` (`id_guru_nilai`);

--
-- Indexes for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  ADD PRIMARY KEY (`id_indikator`),
  ADD KEY `id_kompetensi` (`id_kompetensi`),
  ADD KEY `id_tugas` (`id_tugas`) USING BTREE;

--
-- Indexes for table `tbl_kompetensi`
--
ALTER TABLE `tbl_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`),
  ADD KEY `id_tugas` (`id_tugas`) USING BTREE;

--
-- Indexes for table `tbl_pengawas`
--
ALTER TABLE `tbl_pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indexes for table `tbl_pengawas_kepsek`
--
ALTER TABLE `tbl_pengawas_kepsek`
  ADD PRIMARY KEY (`id_pengawas_kepsek`),
  ADD KEY `id_pengawas` (`id_pengawas`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indexes for table `tbl_penilaian_guru`
--
ALTER TABLE `tbl_penilaian_guru`
  ADD PRIMARY KEY (`id_penilaian_guru`),
  ADD KEY `id_kompetensi` (`id_kompetensi`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_tugas` (`id_tugas`);

--
-- Indexes for table `tbl_penilaian_kepsek`
--
ALTER TABLE `tbl_penilaian_kepsek`
  ADD PRIMARY KEY (`id_penilaian_kepsek`),
  ADD KEY `id_kompetensi` (`id_kompetensi`),
  ADD KEY `id_indikator` (`id_indikator`),
  ADD KEY `id_tugas` (`id_tugas`),
  ADD KEY `id_pengawas` (`id_pengawas`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tbl_tugas_guru`
--
ALTER TABLE `tbl_tugas_guru`
  ADD PRIMARY KEY (`id_tugas_guru`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_tenaga_pendidik` (`id_tugas`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_pengawas` (`id_pengawas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_config`
--
ALTER TABLE `app_config`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  MODIFY `id_golongan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_guru_dinilai`
--
ALTER TABLE `tbl_guru_dinilai`
  MODIFY `id_guru_dinilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  MODIFY `id_indikator` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tbl_kompetensi`
--
ALTER TABLE `tbl_kompetensi`
  MODIFY `id_kompetensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_pengawas`
--
ALTER TABLE `tbl_pengawas`
  MODIFY `id_pengawas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pengawas_kepsek`
--
ALTER TABLE `tbl_pengawas_kepsek`
  MODIFY `id_pengawas_kepsek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_penilaian_guru`
--
ALTER TABLE `tbl_penilaian_guru`
  MODIFY `id_penilaian_guru` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penilaian_kepsek`
--
ALTER TABLE `tbl_penilaian_kepsek`
  MODIFY `id_penilaian_kepsek` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id_sekolah` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tugas_guru`
--
ALTER TABLE `tbl_tugas_guru`
  MODIFY `id_tugas_guru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD CONSTRAINT `tbl_guru_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `tbl_sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_guru_dinilai`
--
ALTER TABLE `tbl_guru_dinilai`
  ADD CONSTRAINT `tbl_guru_dinilai_ibfk_1` FOREIGN KEY (`id_guru_asesor`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_guru_dinilai_ibfk_2` FOREIGN KEY (`id_guru_nilai`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_indikator`
--
ALTER TABLE `tbl_indikator`
  ADD CONSTRAINT `tbl_indikator_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tbl_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_indikator_ibfk_2` FOREIGN KEY (`id_kompetensi`) REFERENCES `tbl_kompetensi` (`id_kompetensi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kompetensi`
--
ALTER TABLE `tbl_kompetensi`
  ADD CONSTRAINT `tbl_kompetensi_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `tbl_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengawas_kepsek`
--
ALTER TABLE `tbl_pengawas_kepsek`
  ADD CONSTRAINT `tbl_pengawas_kepsek_ibfk_1` FOREIGN KEY (`id_pengawas`) REFERENCES `tbl_pengawas` (`id_pengawas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pengawas_kepsek_ibfk_2` FOREIGN KEY (`id_sekolah`) REFERENCES `tbl_pengawas` (`id_pengawas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_penilaian_guru`
--
ALTER TABLE `tbl_penilaian_guru`
  ADD CONSTRAINT `tbl_penilaian_guru_ibfk_3` FOREIGN KEY (`id_tugas`) REFERENCES `tbl_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penilaian_guru_ibfk_4` FOREIGN KEY (`id_kompetensi`) REFERENCES `tbl_kompetensi` (`id_kompetensi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_penilaian_guru_ibfk_5` FOREIGN KEY (`id_indikator`) REFERENCES `tbl_indikator` (`id_indikator`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tugas_guru`
--
ALTER TABLE `tbl_tugas_guru`
  ADD CONSTRAINT `tbl_tugas_guru_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_tugas_guru_ibfk_2` FOREIGN KEY (`id_tugas`) REFERENCES `tbl_tugas` (`id_tugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`id_pengawas`) REFERENCES `tbl_pengawas` (`id_pengawas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
