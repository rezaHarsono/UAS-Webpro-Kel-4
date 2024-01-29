-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql6.freesqldatabase.com
-- Generation Time: Jan 28, 2024 at 05:19 PM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql6680060`
--
CREATE DATABASE IF NOT EXISTS `sql6680060` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sql6680060`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_jadwal`
-- (See below for the actual view)
--
CREATE TABLE `display_jadwal` (
`Ruangan` varchar(6)
,`Nama Dosen` varchar(72)
,`Mata Kuliah` varchar(20)
,`Kelas` varchar(20)
,`Smt` int(11)
,`Jam Mulai` varchar(13)
,`Jam Akhir` varchar(13)
,`Hari` varchar(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gelar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `gelar`) VALUES
('DSN001', 'Dinda Kadarwati', 'M.Pd.'),
('DSN002', 'Ayres Pradiptyas', 'S.ST., M.M.'),
('DSN003', 'Rizki Elisa Nalawati', 'S.T., M.T.'),
('DSN004', 'Ayu Rosyida Zain', 'M.T.'),
('DSN005', 'Ratna Widya Iswara', 'S.Pd, M.Pd.'),
('DSN006', 'Anggi Mardiyono', 'S.Kom., M.Kom.'),
('DSN007', 'Asep Kurniawan', 'S.Pd., M.Kom'),
('DSN008', 'Euis Oktavianti', 'S.Si, M.T.I.'),
('DSN009', 'Hata Maulana', 'S.Si, M.Ti.'),
('DSN010', 'Bambang Warsuta', 'S.Kom., M.T.I.'),
('DSN011', 'Anita Hidayati', 'S.Kom., M.Kom.'),
('DSN012', 'Agus Setiawan', 'M.Kom.'),
('DSN013', 'Risna Sari', 'S.Kom., M.T.I.'),
('DSN014', 'Ady Arman', 'S.Pd., M.Kom.I.'),
('DSN015', 'Dewi Yanti Liliana', 'S.Kom., M.Kom.'),
('DSN016', 'Mauldy Laya', 'S.Kom., M.Kom.'),
('DSN017', 'Dewi Kurniawati', 'S.S., M.Pd.'),
('DSN018', 'Maria Agustin', 'S.Kom., M.Kom.'),
('DSN019', 'Iwan Sonjaya', 'S.T., M.T.'),
('DSN020', 'Fachroni Arbi Murad', 'S.Kom., M.Kom.'),
('DSN021', 'Chandra Wirawan', 'M.Kom.'),
('DSN022', 'Melisa Gustiarna', 'S.Pd., M.T.'),
('DSN023', 'Mira Rosalina', 'S.Pd., M.T.'),
('DSN024', 'Indah Sari Mukarrahmah', 'M.T.'),
('DSN025', 'Fitria Nugrahani', 'S.Pd., M.Si.'),
('DSN026', 'Iik Muhamad Malik Matin', 'S.Kom., M.Kom.'),
('DSN027', 'Eriya', 'M.T.'),
('DSN028', 'Noorlela Marcheta', 'S.Kom., M.Kom.'),
('DSN029', 'Ariawan Andi Suhandana', 'S.Kom., M.Ti.'),
('DSN030', 'Susana Dwi Yulianti', 'M.Kom.'),
('DSN031', 'Mera Katika D', 'S.Si., M.T., Ph.D.'),
('DSN032', 'Yoyok Sabar Waluyo', 'S.S., M.Hum.'),
('DSN033', 'Malisa Huzaifa', 'S.Kom., M.T.'),
('DSN034', 'Sinantya Feranti Anindya', 'S.T., M.T.'),
('DSN035', 'Indra Hermawan', 'S.Kom., S.Kom.'),
('DSN036', 'Irawati', 'S.T., M.T.'),
('DSN037', 'Herlino Nanang', '-'),
('DSN038', 'Prihatin Oktivasari', 'S,Si., M.Si.'),
('DSN039', 'Defiana Arnaldy', 'S.Tp., M.Si.'),
('DSN040', 'Asep Taufik Muharram', 'S.Kom., M.Kom.'),
('DSN041', 'Iklima Ermis Ismail', 'S.Kom., S.Kom.'),
('DSN042', 'Ade Rahma Yuly', 'S.Kom., M.Ds.'),
('DSN043', 'Eng. Feri Fahrianto', 'S.T., M.Sc.');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_dosen` varchar(6) NOT NULL,
  `id_matkul` varchar(7) NOT NULL,
  `id_kelas` varchar(6) NOT NULL,
  `id_ruangan` varchar(6) NOT NULL,
  `jam_mulai` varchar(13) NOT NULL,
  `jam_akhir` varchar(13) NOT NULL,
  `hari` enum('1 - SENIN','2 - SELASA','3 - RABU','4 - KAMIS','5 - JUMAT','6 - SABTU') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_dosen`, `id_matkul`, `id_kelas`, `id_ruangan`, `jam_mulai`, `jam_akhir`, `hari`) VALUES
(1, 'DSN017', 'MTKL024', 'TMJ111', 'AA204', '07:30 - 08:20', '10:00 - 10:50', '1 - SENIN'),
(2, 'DSN011', 'MTKL023', 'TMJ103', 'AA204', '07:30 - 08:00', '14:10 - 15:00', '1 - SENIN'),
(3, 'DSN001', 'MTKL001', 'TMJ111', 'AA204', '07:30 - 08:20', '11:00 - 11:50', '2 - SELASA'),
(4, 'DSN017', 'MTKL024', 'TMJ111', 'AA204', '10.50 - 11.40', '12.30 - 13.20', '2 - SELASA'),
(5, 'DSN020', 'MTKL006', 'TMJ201', 'AA204', '13.20 - 14.10', '15.50 - 16.40', '2 - SELASA'),
(6, 'DSN026', 'MTKL003', 'TMJ201', 'AA204', '07.30 - 08.20', '10.00 - 10.50', '3 - RABU'),
(7, 'DSN012', 'MTKL012', 'TI101', 'AA204', '07.30 - 08.20', '10.00 - 10.50', '4 - KAMIS'),
(8, 'DSN038', 'MTKL032', 'TMJ203', 'AA204', '12.30 - 13.20', '16.40 - 17.30', '4 - KAMIS'),
(9, 'DSN002', 'MTKL016', 'TMD201', 'AA204', '07.30 - 08.20', '10.00 - 10.50', '5 - JUMAT'),
(10, 'DSN029', 'MTKL034', 'TMJ201', 'AA204', '10.50 -11.40', '14.10 - 15.00', '5 - JUMAT'),
(11, 'DSN007', 'MTKL007', 'TMJ101', 'AA205', '07:30 - 08:20', '10:00 - 10:50', '1 - SENIN'),
(12, 'DSN035', 'MTKL038', 'TMJ101', 'AA205', '10.50 - 11.40', '14.10 - 15.00', '1 - SENIN'),
(13, 'DSN008', 'MTKL012', 'TI211', 'AA205', '07.30 - 08.20', '10.00 - 10.50', '2 - SELASA'),
(14, 'DSN001', 'MTKL001', 'TMJ101', 'AA205', '10.50 - 11.40', '14.10 - 15.00', '2 - SELASA'),
(15, 'DSN032', 'MTKL017', 'TMJ101', 'AA205', '15.00 - 15.50', '17.30 - 18.20', '2 - SELASA'),
(16, 'DSN030', 'MTKL012', 'TMJ211', 'AA205', '07.30 - 08.20', '10.00 - 10.50', '3 - RABU'),
(17, 'DSN039', 'MTKL031', 'TMJ203', 'AA205', '12.30 - 13.20', '15.00 - 15.50', '3 - RABU'),
(18, 'DSN029', 'MTKL034', 'TMJ101', 'AA205', '07.30 - 08.20', '10.00 - 10.50', '4 - KAMIS'),
(19, 'DSN039', 'MTKL031', 'TMJ103', 'AA205', '10.50 - 11.40', '14.10 - 15.00', '4 - KAMIS'),
(20, 'DSN020', 'MTKL006', 'TMJ101', 'AA205', '07.30 - 08.20', '10.00 - 10.50', '5 - JUMAT'),
(21, 'DSN007', 'MTKL037', 'TMJ203', 'AA205', '13.20 - 14.20', '15.50 - 16.40', '5 - JUMAT'),
(101, 'DSN001', 'MTKL001', 'TI201', 'GSG202', '07.30 - 08.20', '10.00 - 10.50', '1 - SENIN'),
(102, 'DSN002', 'MTKL002', 'TI201', 'GSG202', '10.50 - 11.40', '14.10 - 15.00', '1 - SENIN'),
(103, 'DSN001', 'MTKL001', 'TI101', 'GSG202', '07.30 - 08.20', '10.00 - 10.50', '2 - SELASA'),
(104, 'DSN003', 'MTKL003', 'TI101', 'GSG202', '10.50 - 11.40', '14.10 - 15.00', '2 - SELASA'),
(110, 'DSN003', 'MTKL015', 'TI213', 'AA301', '07:30 - 08:20', '10:00 - 10:50', '1 - SENIN'),
(111, 'DSN034', 'MTKL047', 'TMD201', 'AA301', '12:30 - 13:20', '15:00 - 15:50', '1 - SENIN'),
(112, 'DSN023', 'MTKL036', 'TMD203', 'AA301', '07:30 - 08:20', '12:30 - 13:20', '2 - SELASA'),
(113, 'DSN015', 'MTKL034', 'TI201', 'AA301', '13:20 - 14:10', '15:50 - 16:40', '2 - SELASA'),
(114, 'DSN036', 'MTKL004', 'TI101', 'AA301', '07:30 - 08:20', '10:00 - 10:50', '3 - RABU'),
(115, 'DSN040', 'MTKL039', 'TI103', 'AA301', '12:30 - 13:20', '15:00 - 15:50', '3 - RABU'),
(116, 'DSN040', 'MTKL039', 'TI213', 'AA301', '07:30 - 08:20', '10:00 - 10:50', '4 - KAMIS'),
(117, 'DSN021', 'MTKL040', 'TI103', 'AA301', '12:30 - 13:20', '15:00 - 15:50', '4 - KAMIS'),
(118, 'DSN041', 'MTKL034', 'TI101', 'AA301', '07:30 - 08:20', '10:00 - 10:50', '5 - JUMAT'),
(119, 'DSN003', 'MTKL015', 'TI203', 'AA301', '12:30 - 13:20', '15:00 - 15:50', '5 - JUMAT'),
(120, 'DSN042', 'MTKL042', 'TMD203', 'AA302', '07:30 - 08:20', '10:00 - 10:50', '1 - SENIN'),
(121, 'DSN032', 'MTKL025', 'TMD203', 'AA302', '10:50 - 11:40', '14:10 - 15:00', '1 - SENIN'),
(122, 'DSN024', 'MTKL002', 'TMD203', 'AA302', '15:00 - 15:50', '17:30 - 18:20', '1 - SENIN'),
(123, 'DSN016', 'MTKL027', 'TI203', 'AA302', '07:30 - 08:20', '10:00 - 10:50', '2 - SELASA'),
(124, 'DSN024', 'MTKL016', 'TMD201', 'AA302', '12:30 - 13:20', '15:00 - 15:50', '2 - SELASA'),
(125, 'DSN028', 'MTKL047', 'TMD101', 'AA302', '07:30 - 08:20', '10:00 - 10:50', '3 - RABU'),
(126, 'DSN011', 'MTKL047', 'TMD101', 'AA302', '07:30 - 08:20', '10:00 - 10:50', '3 - RABU'),
(127, 'DSN026', 'MTKL035', 'TMD101', 'AA302', '10:50 - 11:40', '15:50 - 16:40', '3 - RABU'),
(128, 'DSN018', 'MTKL033', 'TMJ103', 'AA302', '07:30 - 08:20', '10:00 - 10:50', '4 - KAMIS'),
(129, 'DSN005', 'MTKL001', 'TMJ201', 'AA302', '10:50 - 11:40', '14:10 - 15:00', '4 - KAMIS'),
(130, 'DSN031', 'MTKL012', 'TI201', 'AA302', '07:30 - 08:20', '10:00 - 10:50', '5 - JUMAT'),
(131, 'DSN018', 'MTKL003', 'TMJ101', 'AA302', '12:30 - 13:20', '15:00 - 15:50', '5 - JUMAT'),
(132, 'DSN042', 'MTKL009', 'TMD107', 'AA302', '07:30 - 08:20', '12:30 - 13:20', '6 - SABTU'),
(133, 'DSN009', 'MTKL010', 'TMD107', 'AA302', '13:20 - 14:10', '17:30 - 18:20', '6 - SABTU'),
(134, 'DSN019', 'MTKL019', 'TI203', 'AA303', '07:30 - 08:20', '10:00 - 10:50', '1 - SENIN'),
(135, 'DSN006', 'MTKL039', 'TI203', 'AA303', '12:30 - 13:20', '15:00 - 15:50', '1 - SENIN'),
(136, 'DSN021', 'MTKL039', 'TI113', 'AA303', '07:30 - 08:20', '10:00 - 10:50', '2 - SELASA'),
(137, 'DSN010', 'MTKL019', 'TI213', 'AA303', '10:50 - 11:40', '12:30 - 13:20', '2 - SELASA'),
(138, 'DSN034', 'MTKL027', 'TMD203', 'AA303', '14:10 - 15:00', '16:40 - 17:30', '2 - SELASA');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` varchar(6) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `semester`) VALUES
('TI017', 'TI CCIT', 7),
('TI101', 'TI A', 1),
('TI103', 'TI A', 3),
('TI107', 'TI A', 7),
('TI111', 'TI CCIT A', 1),
('TI113', 'TI CCIT A', 3),
('TI201', 'TI B', 1),
('TI203', 'TI B', 3),
('TI207', 'TI B', 7),
('TI211', 'TI CCIT B', 1),
('TI213', 'TI CCIT B', 3),
('TMD101', 'TMD A', 1),
('TMD103', 'TMD A', 3),
('TMD105', 'TMD A', 5),
('TMD107', 'TMD A', 7),
('TMD201', 'TMD B', 1),
('TMD203', 'TMD B', 3),
('TMD205', 'TMD B', 5),
('TMD207', 'TMD B', 7),
('TMJ005', 'TMJ', 5),
('TMJ007', 'TMJ', 7),
('TMJ101', 'TMJ A', 1),
('TMJ103', 'TMJ A', 3),
('TMJ105', 'TMJ A', 5),
('TMJ111', 'TMJ CCIT SEC A', 1),
('TMJ201', 'TMJ B', 1),
('TMJ203', 'TMJ B', 3),
('TMJ205', 'TMJ B', 5),
('TMJ211', 'TMJ CCIT SEC B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` varchar(7) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama`) VALUES
('MTKL001', 'Bahasa Indonesia'),
('MTKL002', 'Pancasila'),
('MTKL003', 'Teknologi Multimedia'),
('MTKL004', 'Organisasi dan Arsit'),
('MTKL005', 'English for IT Profe'),
('MTKL006', 'Sistem Operasi'),
('MTKL007', 'Jaringan Komputer'),
('MTKL008', 'Metode Numerik'),
('MTKL009', 'Seminar'),
('MTKL010', 'Kapita Selekta 1'),
('MTKL011', 'Analisis dan Desain '),
('MTKL012', 'Matematika Diskrit'),
('MTKL013', 'Pendidikan Agama'),
('MTKL014', 'Pengantar Teknologi '),
('MTKL015', 'Kecerdasan Buatan'),
('MTKL016', 'Kewarganegaraan'),
('MTKL017', 'Bahasa Inggris TIK 1'),
('MTKL018', 'Komunikasi Profesion'),
('MTKL019', 'Desain UI/UX'),
('MTKL020', 'Perencanaan Jaringan'),
('MTKL021', 'Sistem Terdistribusi'),
('MTKL022', 'Pengantar Desain Kom'),
('MTKL023', 'Rekayasa Perangkat L'),
('MTKL024', 'Bahasa Inggris untuk'),
('MTKL025', 'Hukum dan Etika'),
('MTKL026', 'Pemrograman Berorien'),
('MTKL027', 'Grafika Komputer'),
('MTKL028', 'Pemodelan Jaringan'),
('MTKL029', 'Manajemen Proyek'),
('MTKL030', 'Perancangan dan Peng'),
('MTKL031', 'Keamanan Komputer'),
('MTKL032', 'Sistem Embedded'),
('MTKL033', 'Pemrograman Web (Fro'),
('MTKL034', 'Algoritma dan Pemrog'),
('MTKL035', 'Pengantar Jaringan K'),
('MTKL036', 'Pemodelan 3D'),
('MTKL037', 'Infrastruktur Jaring'),
('MTKL038', 'Piranti Komputer'),
('MTKL039', 'Pemrograman Web Lanj'),
('MTKL040', 'Pemrograman Visual'),
('MTKL042', 'Desain Web'),
('MTKL043', 'Pemrograman Basis Da'),
('MTKL044', 'Pengujian dan Evalua'),
('MTKL045', 'Etika Profesional'),
('MTKL046', 'Praktek Kerja Lapang'),
('MTKL047', 'Pengantar Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` varchar(6) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `kapasitas`, `jenis`) VALUES
('AA204', 30, 'Laboratorium'),
('AA205', 30, 'Laboratorium'),
('AA301', 30, 'Laboratorium'),
('AA302', 30, 'Laboratorium'),
('AA303', 30, 'Laboratorium'),
('AA304', 30, 'Laboratorium'),
('AA305', 30, 'Laboratorium'),
('GSG202', 30, 'Kelas Biasa'),
('GSG203', 30, 'Kelas Biasa'),
('GSG206', 30, 'Kelas Biasa'),
('GSG207', 30, 'Kelas Biasa'),
('GSG208', 30, 'Kelas Biasa'),
('GSG209', 30, 'Kelas Biasa'),
('GSG210', 30, 'Kelas Biasa'),
('GSG212', 30, 'Kelas Biasa');

-- --------------------------------------------------------

--
-- Structure for view `display_jadwal`
--
DROP TABLE IF EXISTS `display_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`sql6680060`@`%` SQL SECURITY DEFINER VIEW `display_jadwal`  AS  select `r`.`id` AS `Ruangan`,concat(`d`.`nama`,', ',`d`.`gelar`) AS `Nama Dosen`,`mk`.`nama` AS `Mata Kuliah`,`k`.`nama` AS `Kelas`,`k`.`semester` AS `Smt`,`j`.`jam_mulai` AS `Jam Mulai`,`j`.`jam_akhir` AS `Jam Akhir`,substr(`j`.`hari`,5,6) AS `Hari` from ((((`jadwal` `j` join `dosen` `d` on((`j`.`id_dosen` = `d`.`id`))) join `mata_kuliah` `mk` on((`j`.`id_matkul` = `mk`.`id`))) join `kelas` `k` on((`j`.`id_kelas` = `k`.`id`))) join `ruangan` `r` on((`j`.`id_ruangan` = `r`.`id`))) order by `r`.`id`,`j`.`hari`,`j`.`jam_mulai` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
