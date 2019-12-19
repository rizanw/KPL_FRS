-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 04:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(18) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`) VALUES
('', ''),
('194806191973011001', 'Prof. Ir. Supeno Djanali M.Sc., Ph.D.'),
('194908231976032001', 'Prof. Ir. Handayani Tjandrasa M.Sc., Ph.D.'),
('195701011983031004', 'Ir. F. X. Arunanto M.Sc.'),
('195908031986011001', 'Prof. Drs. Ec. Ir. Riyanarto Sarno M.Sc., Ph.D.'),
('196002211984031001', 'Ir. Muchammad Husni M.Kom.'),
('196505181992031003', 'Dr.techn. Ir. Raden Venentius Hari Ginardi M.Sc.'),
('196707271992031002', 'Prof. Dr. Ir. Joko Lianto Buliali'),
('196810021994032001', 'Dr. Ir. Siti Rochimah MT., Ph.D.'),
('196912281994121001', 'Victor Hariadi S.Si., M.Kom.'),
('197002131994021001', 'Rully Soelaiman S.Kom., M.Kom.'),
('197007141997031002', 'Yudhi Purwananto S.Kom., M.Kom.'),
('19710428199422000', 'Dr.Eng. Nanik Suciati S.Kom., M.Kom.'),
('197107182006041001', 'Ahmad Saikhu S.Si., MT.'),
('197110302002121001', 'Wahyu Suadi S.Kom., M.Kom.'),
('197205281997021001', 'Dwi Sunaryono S.Kom., M.Kom.'),
('197208091995121001', 'Dr. Agus Zainal Arifin S.Kom., M.Kom.'),
('197402092002121001', 'Misbakhul Munir Irfan Subakti S.Kom., M.Sc.'),
('197404031999031002', 'Fajar Baskoro S.Kom., MT.'),
('197410222000031001', 'Waskito Wibisono S.Kom., M.Eng., Ph.D.'),
('197411232006041001', 'Daniel Oranova Siahaan S.Kom., M.Sc., Ph.D.'),
('197505252003121002', 'Tohari Ahmad S.Kom., MIT, Ph.D.\r'),
('197512202001122002', 'Dr.Eng. Chastine Fatichah S.Kom., M.Kom.'),
('197608092001122001', 'Sarwosri S.Kom., MT.'),
('197612152003121001', 'Imam Kuswardayan S.Kom., MT.'),
('197708242006041001', 'Royyana Muslim Ijtihadie S.Kom., M.Kom., Ph.D.'),
('197712172003121000', 'Dr.Eng. Darlis Herumurti S.Kom., M.Kom.'),
('197906262005012002', 'Umi Laili Yuhana S.Kom., M.Sc.'),
('198106202005011003', 'Ary Mazharuddin Shiddiqi S.Kom., M.Comp.Sc.'),
('198409042010121002', 'Arya Yudhi Wijaya S.Kom., M.Kom'),
('198410162008121002', 'Dr.Eng. Radityo Anggoro, S.Kom., M.Sc.'),
('198508262015042002', 'Adhatus Solichah Ahmadiyah S.Kom., M.Sc.'),
('198510172015042001', 'Dini Adni Navastara S.Kom., M.Sc.'),
('198602272019031006', 'Hadziq Fabroyir S.Kom., Ph.D.'),
('198607222015042003', 'Nurul Fajrin Ariyani S.Kom., M.Sc.'),
('198608232015041004', 'Abdul Munif S.Kom., M.Sc.Eng.'),
('198611252018031001', 'Bagus Jati Santoso S.Kom., Ph.D.'),
('198701032014041001', 'Rizky Januar Akbar S.Kom., M.Eng.'),
('198702132014041001', 'Ridho Rahman Hariadi S.Kom., M.Sc.');

-- --------------------------------------------------------

--
-- Table structure for table `frs`
--

CREATE TABLE `frs` (
  `id_frs` varchar(255) NOT NULL,
  `nrp` char(14) NOT NULL,
  `is_setuju` tinyint(1) DEFAULT NULL,
  `periode` tinyint(1) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frs`
--

INSERT INTO `frs` (`id_frs`, `nrp`, `is_setuju`, `periode`, `tahun`) VALUES
('321ac695-acca-4bf0-bde1-04dc4815f49c', '}0511174000018', 0, 0, 2019),
('45c9b5b0-5475-462e-b3f2-ee06af1bdab7', 'kelas', 0, 0, 2019),
('62f67f67', '05111740000183', 0, 1, 2019),
('963f154c-9626-4d1c-99a3-581c79624f44', '05111740000183', 0, 0, 2019),
('a3b83e15-641b-484c-adca-3e69a2e99a33', 'frs', 0, 0, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(8) NOT NULL,
  `mata_kuliah` varchar(32) NOT NULL,
  `kode_matkul` varchar(8) NOT NULL,
  `sks` int(11) NOT NULL,
  `grup` varchar(4) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `dosen` char(18) NOT NULL,
  `ruang` varchar(16) DEFAULT NULL,
  `Waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `periode` tinyint(1) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `is_upmb` tinyint(1) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `mata_kuliah`, `kode_matkul`, `sks`, `grup`, `kapasitas`, `dosen`, `ruang`, `Waktu_mulai`, `waktu_selesai`, `periode`, `tahun`, `is_upmb`, `hari`) VALUES
('UP190001', 'Fisika', 'FIS18497', 3, '12', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0, 2019, 1, NULL),
('UP190002', 'Teknopreneur', 'Tek18470', 3, '23', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0, 2019, 1, NULL),
('', '', '', 0, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('KIF19001', 'Pra-TA', 'IF184702', 3, '_', 30, '198410162008121002', '_', '07:30:00', '10:00:00', 0, 2019, 0, 'JUMAT'),
('', '', '', 0, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('KIF19002', 'Dasar Pemrograman', 'IF184101', 4, 'A', 30, '195701011983031004', 'IF-107a', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19003', 'Dasar Pemrograman', 'IF184101', 4, 'B', 30, '195701011983031004', 'IF-107b', '13:00:00', '15:30:00', 0, 2019, 0, 'SELASA'),
('KIF19004', 'Dasar Pemrograman', 'IF184101', 4, 'C', 30, '196505181992031003', 'IF-107a', '10:00:00', '12:30:00', 0, 2019, 0, 'RABU'),
('KIF19005', 'Dasar Pemrograman', 'IF184101', 4, 'D', 30, '198608232015041004', 'IF-107b', '10:00:00', '12:30:00', 0, 2019, 0, 'RABU'),
('KIF19006', 'Dasar Pemrograman', 'IF184101', 4, 'E', 30, '197402092002121001', 'IF-107b', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19007', 'Dasar Pemrograman', 'IF184101', 4, 'F', 30, '197402092002121001', 'IF-107b', '15:30:00', '18:00:00', 0, 2019, 0, 'RABU'),
('KIF19008', 'Dasar Pemrograman', 'IF184101', 4, 'G', 30, '197205281997021001', 'IF-107a', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19009', 'Dasar Pemrograman', 'IF184101', 4, 'I', 30, '197402092002121001', 'IF-108', '08:00:00', '10:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19010', 'Organisasi Komputer', 'IF184305', 4, 'A', 30, '194806191973011001', 'IF-104', '07:30:00', '10:00:00', 0, 2019, 0, 'SENIN'),
('KIF19011', 'Organisasi Komputer', 'IF184305', 4, 'B', 30, '198106202005011003', 'IF-105a', '10:00:00', '12:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19012', 'Organisasi Komputer', 'IF184305', 4, 'C', 30, '197110302002121001', 'IF-101', '15:30:00', '18:00:00', 0, 2019, 0, 'RABU'),
('KIF19013', 'Organisasi Komputer', 'IF184305', 4, 'D', 30, '195701011983031004', 'IF-102', '07:30:00', '10:00:00', 0, 2019, 0, 'SELASA'),
('KIF19014', 'Organisasi Komputer', 'IF184305', 4, 'E', 30, '194806191973011001', 'IF-104', '07:30:00', '10:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19015', 'Organisasi Komputer', 'IF184305', 4, 'F', 30, '196002211984031001', 'IF-104', '10:00:00', '12:30:00', 0, 2019, 0, 'RABU'),
('KIF19016', 'Matematika Diskrit', 'IF184304', 3, 'A', 30, '196912281994121001', 'IF-104', '10:00:00', '12:30:00', 0, 2019, 0, 'SENIN'),
('KIF19017', 'Matematika Diskrit', 'IF184304', 3, 'B', 30, '198409042010121002', 'IF-105b', '10:00:00', '12:30:00', 0, 2019, 0, 'RABU'),
('KIF19018', 'Matematika Diskrit', 'IF184304', 3, 'C', 30, '198410162008121002', 'IF-105a', '10:00:00', '12:30:00', 0, 2019, 0, 'RABU'),
('KIF19019', 'Matematika Diskrit', 'IF184304', 3, 'D', 30, '196912281994121001', 'IF-105b', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19020', 'Matematika Diskrit', 'IF184304', 3, 'E', 30, '198409042010121002', 'IF-105a', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19021', 'Komputasi Numerik', 'IF184303', 3, 'A', 30, '196912281994121001', 'IF-105b', '15:30:00', '18:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19022', 'Komputasi Numerik', 'IF184303', 3, 'B', 30, '196707271992031002', 'IF-105a', '15:30:00', '18:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19023', 'Komputasi Numerik', 'IF184303', 3, 'C', 30, '196912281994121001', 'IF-105b', '15:30:00', '18:00:00', 0, 2019, 0, 'SENIN'),
('KIF19024', 'Komputasi Numerik', 'IF184303', 3, 'D', 30, '197107182006041001', 'IF-105a', '15:30:00', '18:00:00', 0, 2019, 0, 'SENIN'),
('KIF19025', 'Komputasi Numerik', 'IF184303', 3, 'E', 30, '197107182006041001', 'IF-105b', '15:30:00', '18:00:00', 0, 2019, 0, 'SELASA'),
('KIF19026', 'Komputasi Numerik', 'IF184303', 3, 'F', 30, '196707271992031002', 'IF-105a', '15:30:00', '18:00:00', 0, 2019, 0, 'SELASA'),
('KIF19027', 'Aljabar Linear', 'IF184302', 3, 'A', 30, '197007141997031002', 'IF-105b', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19028', 'Aljabar Linear', 'IF184302', 3, 'B', 30, '198410162008121002', 'IF-108', '07:30:00', '10:00:00', 0, 2019, 0, 'SENIN'),
('KIF19029', 'Aljabar Linear', 'IF184302', 3, 'C', 30, '197007141997031002', 'IF-105b', '13:00:00', '15:30:00', 0, 2019, 0, 'SELASA'),
('KIF19030', 'Aljabar Linear', 'IF184302', 3, 'D', 30, '198409042010121002', 'IF-105a', '13:00:00', '15:30:00', 0, 2019, 0, 'SELASA'),
('KIF19031', 'Aljabar Linear', 'IF184302', 3, 'E', 30, '198409042010121002', 'IF-105a', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19032', 'Sistem Basis Data', 'IF184301', 4, 'B', 30, '197608092001122001', 'IF-105b', '09:00:00', '11:00:00', 0, 2019, 0, 'JUMAT'),
('KIF19033', 'Sistem Basis Data', 'IF184301', 4, 'C', 30, '198607222015042003', 'IF-106', '07:30:00', '10:00:00', 0, 2019, 0, 'SELASA'),
('KIF19034', 'Sistem Basis Data', 'IF184301', 4, 'D', 30, '197205281997021001', 'IF-107b', '07:30:00', '10:00:00', 0, 2019, 0, 'SENIN'),
('KIF19035', 'Sistem Basis Data', 'IF184301', 4, 'E', 30, '198508262015042002', 'IF-106', '10:00:00', '12:30:00', 0, 2019, 0, 'RABU'),
('KIF19036', 'Sistem Basis Data', 'IF184301', 4, 'F', 30, '197612152003121001', 'IF-104', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19037', 'Sistem Basis Data', 'IF184301', 4, 'G', 30, '198410162008121002', 'IF-101', '07:30:00', '10:00:00', 0, 2019, 0, 'RABU'),
('KIF19038', 'Pemrograman Berbasis Objek', 'IF184301', 3, 'A', 30, '197404031999031002', 'IF-105b', '10:00:00', '12:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19039', 'Pemrograman Berbasis Objek', 'IF184301', 3, 'B', 30, '198608232015041004', 'IF-107b', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19040', 'Pemrograman Berbasis Objek', 'IF184301', 3, 'C', 30, '198702132014041001', 'IF-107a', '13:00:00', '15:30:00', 0, 2019, 0, 'SENIN'),
('KIF19041', 'Pemrograman Berbasis Objek', 'IF184301', 3, 'D', 30, '197404031999031002', 'IF-105b', '07:30:00', '10:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19042', 'Pemrograman Berbasis Objek', 'IF184301', 3, 'E', 30, '198701032014041001', 'IF-107a', '07:30:00', '10:00:00', 0, 2019, 0, 'SELASA'),
('KIF19043', 'Pemrograman Berbasis Objek', 'IF184301', 3, 'F', 30, '198608232015041004', 'IF-107b', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19044', 'Probabilitas dan  Statistik', 'IF184405', 3, 'A', 30, '198410162008121002', 'IF-106', '13:00:00', '15:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19045', 'Struktur Data', 'IF184202', 3, 'A', 30, '197002131994021001', 'IF-101', '13:00:00', '15:30:00', 0, 2019, 0, 'SENIN'),
('KIF19046', 'Sistem Digital', 'IF184201', 3, 'A', 30, '197505252003121002', 'IF-102', '13:00:00', '15:30:00', 0, 2019, 0, 'SELASA'),
('KIF19047', 'Manajemen Basis Data', 'IF184404', 3, 'A', 30, '198508262015042002', 'IF-107b', '13:00:00', '15:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19048', 'PBKK', 'IF184605', 3, 'A', 30, '198701032014041001', 'IF-107b', '10:00:00', '12:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19049', 'Pemrograman Web', 'IF184504', 3, 'A', 30, '197402092002121001', 'IF-107b', '15:30:00', '18:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19050', 'Keamanan Informasi Jaringan', 'IF184701', 3, 'A', 30, '198611252018031001', 'IF-107a', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19051', 'Keamanan Informasi Jaringan', 'IF184701', 3, 'B', 30, '198611252018031001', 'IF-107a', '13:00:00', '15:30:00', 0, 2019, 0, 'SELASA'),
('KIF19052', 'Keamanan Informasi Jaringan', 'IF184701', 3, 'C', 30, '197110302002121001', 'IF-104', '15:30:00', '18:00:00', 0, 2019, 0, 'SENIN'),
('KIF19052', 'Keamanan Informasi Jaringan', 'IF184701', 3, 'D', 30, '196002211984031001', 'IF-102', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19053', 'Keamanan Informasi Jaringan', 'IF184701', 3, 'E', 30, '197110302002121001', 'IF-102', '15:30:00', '18:00:00', 0, 2019, 0, 'SELASA'),
('KIF19054', 'Keamanan Informasi Jaringan', 'IF184701', 3, 'F', 30, '197505252003121002', 'IF-101', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19055', 'Manajemen Proyek Perangkat Lunak', 'IF184506', 3, 'A', 30, '197608092001122001', 'IF-105a', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19056', 'Manajemen Proyek Perangkat Lunak', 'IF184506', 3, 'B', 30, '197608092001122001', 'IF-107b', '13:00:00', '15:30:00', 0, 2019, 0, 'SENIN'),
('KIF19057', 'Manajemen Proyek Perangkat Lunak', 'IF184506', 3, 'C', 30, '197404031999031002', 'IF-105a', '07:30:00', '10:00:00', 0, 2019, 0, 'SENIN'),
('KIF19058', 'Manajemen Proyek Perangkat Lunak', 'IF184506', 3, 'D', 30, '196810021994032001', 'IF-108', '13:00:00', '15:30:00', 0, 2019, 0, 'SELASA'),
('KIF19059', 'Manajemen Proyek Perangkat Lunak', 'IF184506', 3, 'E', 30, '197404031999031002', 'IF-105a', '07:30:00', '10:00:00', 0, 2019, 0, 'RABU'),
('KIF19060', 'Manajemen Proyek Perangkat Lunak', 'IF184506', 3, 'F', 30, '195908031986011001', 'IF-104', '10:00:00', '12:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19061', 'Manajemen Proyek Perangkat Lunak', 'IF184506', 3, 'G', 30, '195908031986011001', 'IF-104', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19062', 'Perancangan Perangkat Lunak', 'IF184501', 3, 'A', 30, '197411232006041001', 'IF-105b', '07:30:00', '10:00:00', 0, 2019, 0, 'SELASA'),
('KIF19063', 'Perancangan Perangkat Lunak', 'IF184501', 3, 'B', 30, '198508262015042002', 'IF-105a', '10:00:00', '12:30:00', 0, 2019, 0, 'SENIN'),
('KIF19064', 'Perancangan Perangkat Lunak', 'IF184501', 3, 'C', 30, '198607222015042003', 'IF-106', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19065', 'Perancangan Perangkat Lunak', 'IF184501', 3, 'D', 30, '198607222015042003', 'IF-106', '07:30:00', '10:00:00', 0, 2019, 0, 'RABU'),
('KIF19066', 'Perancangan Perangkat Lunak', 'IF184501', 3, 'E', 30, '198508262015042002', 'IF-108', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19067', 'Perancangan Perangkat Lunak', 'IF184501', 3, 'F', 30, '197906262005012002', 'IF-107a', '10:00:00', '12:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19068', 'Kecerdasan Komputasional', 'IF184503', 3, 'A', 30, '194908231976032001', 'IF-106', '07:30:00', '10:00:00', 0, 2019, 0, 'SENIN'),
('KIF19069', 'Kecerdasan Komputasional', 'IF184503', 3, 'B', 30, '198410162008121002', 'IF-106', '07:30:00', '10:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19070', 'Kecerdasan Komputasional', 'IF184503', 3, 'C', 30, '198510172015042001', 'IF-106', '10:00:00', '12:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19071', 'Kecerdasan Komputasional', 'IF184503', 3, 'D', 30, '19710428199422000', 'IF-106', '10:00:00', '12:30:00', 0, 2019, 0, 'SENIN'),
('KIF19072', 'Kecerdasan Komputasional', 'IF184503', 3, 'E', 30, '198510172015042001', 'IF-106', '13:00:00', '15:30:00', 0, 2019, 0, 'SELASA'),
('KIF19073', 'Kecerdasan Komputasional', 'IF184503', 3, 'F', 30, '198510172015042001', 'IF-106', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19074', 'Kecerdasan Komputasional', 'IF184503', 3, 'G', 30, '197712172003121000', 'IF-107b', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19075', 'Grafika Komputer', 'IF184502', 3, 'A', 30, '198410162008121002', 'IF-108', '13:00:00', '15:30:00', 0, 2019, 0, 'SENIN'),
('KIF19076', 'Grafika Komputer', 'IF184502', 3, 'B', 30, '198602272019031006', 'IF-107b', '07:30:00', '10:00:00', 0, 2019, 0, 'SELASA'),
('KIF19077', 'Grafika Komputer', 'IF184502', 3, 'C', 30, '198602272019031006', 'IF-107a', '07:30:00', '10:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19078', 'Grafika Komputer', 'IF184502', 3, 'D', 30, '198602272019031006', 'IF-107b', '08:00:00', '10:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19079', 'Grafika Komputer', 'IF184502', 3, 'E', 30, '197712172003121000', 'IF-108', '10:00:00', '12:30:00', 0, 2019, 0, 'SENIN'),
('KIF19080', 'Robotika', 'IF184954', 3, '_', 30, '198510172015042001', 'IF-101', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19081', 'Topik Khusus', 'IF184981', 3, 'A', 30, '197002131994021001', 'IF-102', '10:00:00', '12:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19082', 'Topik Khusus', 'IF184981', 3, 'B', 30, '198410162008121002', 'IF-105a', '08:00:00', '10:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19083', 'Topik Khusus', 'IF184981', 3, 'B', 30, '198410162008121002', 'IF-105a', '08:00:00', '10:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19084', 'STKI', 'IF184955', 3, '_', 30, '197208091995121001', 'IF-102', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19085', 'Jaringan Nirkabel', 'IF184911', 3, '_', 30, '197410222000031001', 'IF-104', '13:00:00', '15:30:00', 0, 2019, 0, 'SENIN'),
('KIF19086', 'Komputasi Awan', 'IF184942', 3, '_', 30, '197708242006041001', 'IF-104', '07:30:00', '10:00:00', 0, 2019, 0, 'SELASA'),
('KIF19087', 'Komputasi Bergerak', 'IF184943', 3, '_', 30, '197708242006041001', 'IF-104', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19088', 'Teknik Pengembangan Game', 'IF184943', 3, '_', 30, '197612152003121001', 'IF-104', '07:30:00', '10:00:00', 0, 2019, 0, 'RABU'),
('KIF19089', 'Basis Data Terdistribusi', 'IF184965', 3, '_', 30, '198608232015041004', 'IF-105a', '07:30:00', '10:00:00', 0, 2019, 0, 'SELASA'),
('KIF19090', 'Komputasi Biomedik', 'IF184953', 3, '_', 30, '197512202001122002', 'IF-106', '13:00:00', '15:30:00', 0, 2019, 0, 'SENIN'),
('KIF19091', 'Evolusi Perangkat Lunak', 'IF184973', 3, '_', 30, '196810021994032001', 'IF-106', '13:00:00', '15:30:00', 0, 2019, 0, 'RABU'),
('KIF19091', 'Rekayasa Pengetahuan', 'IF184962', 3, '_', 30, '198607222015042003', 'IF-107a', '07:30:00', '10:00:00', 0, 2019, 0, 'SENIN'),
('KIF19092', 'Teknologi Antar Jaringan', 'IF184912', 3, '_', 30, '198611252018031001', 'IF-107a', '15:30:00', '18:00:00', 0, 2019, 0, 'SENIN'),
('KIF19093', 'Konstruksi Perangkat Lunak', 'IF184974', 3, '_', 30, '198701032014041001', 'IF-107a', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19094', 'Realitas Virtual dan Augmentasi', 'IF184932', 3, '_', 30, '198702132014041001', 'IF-107a', '07:30:00', '10:00:00', 0, 2019, 0, 'JUMAT'),
('KIF19095', 'Pemrograman Perangkat Bergerak', 'IF184901', 3, '_', 30, '197205281997021001', 'IF-107b', '07:30:00', '10:00:00', 0, 2019, 0, 'KAMIS'),
('KIF19096', 'Sistem Terdistribusi', 'IF184944', 3, '_', 30, '197708242006041001', 'IF-108', '07:30:00', '10:00:00', 0, 2019, 0, 'RABU'),
('KIF19097', 'Jaringan Multimedia', 'IF184941', 3, '_', 30, '198106202005011003', 'IF-108', '13:00:00', '15:30:00', 0, 2019, 0, 'KAMIS'),
('KIF19098', 'Visi Komputer', 'IF184956', 3, '_', 30, '19710428199422000', 'LP-2', '10:00:00', '12:30:00', 0, 2019, 0, 'RABU'),
('KIF19099', 'Sistem Informasi Geografis', 'IF184967', 3, '_', 30, '196505181992031003', 'LP-2', '15:30:00', '18:00:00', 0, 2019, 0, 'RABU'),
('KIF19100', 'Sistem Enterprise', 'IF184961', 3, '_', 30, '198508262015042002', 'IF-105b', '10:00:00', '12:30:00', 0, 2019, 0, 'SELASA'),
('KIF19101', 'Riset Operasi', 'IF184923', 3, '_', 30, '197007141997031002', 'IF-104', '08:00:00', '10:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19102', 'Pengantar Logika dan Pemrograman', 'IF184982', 3, '_', 30, '197002131994021001', 'IF-102', '13:00:00', '15:30:00', 0, 2019, 0, 'JUMAT'),
('KIF19103', 'Pengantar Pengembangan Game', 'IF184985', 3, '_', 30, '197612152003121001', 'IF-107a', '13:00:00', '15:30:00', 0, 2019, 0, 'JUMAT'),
('U190003', 'Bahasa Indonesia', 'UG184912', 2, '17', 30, '198410162008121002', 'IF-101', '07:30:00', '10:00:00', 0, 2019, 1, 'RABU'),
('U190004', 'Kimia', 'SK184101', 3, '09', 30, '198410162008121002', 'IF-102', '07:30:00', '10:00:00', 0, 2019, 1, 'KAMIS'),
('U190005', 'Matematika', 'KM184101', 3, '03', 30, '198410162008121002', 'IF-104', '07:30:00', '10:00:00', 0, 2019, 1, 'SENIN'),
('U190006', 'Pancasila', 'KM184101', 3, '14', 30, '198410162008121002', 'IF-101', '07:30:00', '10:00:00', 0, 2019, 1, 'SELASA');

-- --------------------------------------------------------

--
-- Table structure for table `kelasterpilih`
--

CREATE TABLE `kelasterpilih` (
  `id` varchar(8) NOT NULL,
  `id_frs` varchar(255) DEFAULT NULL,
  `id_kelas` varchar(8) DEFAULT NULL,
  `nrp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelasterpilih`
--

INSERT INTO `kelasterpilih` (`id`, `id_frs`, `id_kelas`, `nrp`) VALUES
('5b883a7d', '963f154c-9626-4d1c-99a3-581c79624f44', 'UP190002', '05111740000183'),
('bcaed5b6', '963f154c-9626-4d1c-99a3-581c79624f44', 'KIF19002', '05111740000183');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` char(14) NOT NULL,
  `nama` varchar(31) NOT NULL,
  `IPK` float NOT NULL,
  `doswal` char(18) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `IPK`, `doswal`, `alamat`) VALUES
('05111640000002', 'Jimi', 4, '198410162008121002', NULL),
('05111640000003', 'Hazimi', 4, '198410162008121002', NULL),
('05111640000043', 'Arrafi', 3, '198410162008121002', NULL),
('05111740000183', 'Rizky Andre Wibisono', 3.5, '198410162008121002', 'JALAN HALMAHERA VII A/01 RT 02 / RW 03, KEC. JOMBANG,  	Kab. Jombang, Jawa Timur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `frs`
--
ALTER TABLE `frs`
  ADD PRIMARY KEY (`id_frs`);

--
-- Indexes for table `kelasterpilih`
--
ALTER TABLE `kelasterpilih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
