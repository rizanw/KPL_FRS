-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 06:18 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpl_frs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(18) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`) VALUES
('198410162008121002', 'Dr. Radityo Anggoro, S.Kom., M.E'),
('198510172015042001', 'Dini Adni Navastara S.Kom., M.Sc');

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
('62f67f67', '05111740000183', 0, 1, 2019),
('963f154c-9626-4d1c-99a3-581c79624f44', '05111740000183', 0, 0, 2019);

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
  `is_upmb` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `mata_kuliah`, `kode_matkul`, `sks`, `grup`, `kapasitas`, `dosen`, `ruang`, `Waktu_mulai`, `waktu_selesai`, `periode`, `tahun`, `is_upmb`) VALUES
('KIF19001', 'Pra-TA', 'IF184702', 3, 'A', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0, 2019, 0),
('KIF19002', 'Konstruksi Perangkat Lunak', 'IF184974', 3, 'A', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0, 2019, 0),
('KIF19003', 'Sistem Basis Data', 'IF184702', 3, 'A', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0, 2019, 0),
('UP190001', 'Fisika', 'FIS18497', 3, '12', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0, 2019, 1),
('UP190002', 'Teknopreneur', 'Tek18470', 3, '23', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0, 2019, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelasterpilih`
--

CREATE TABLE `kelasterpilih` (
  `id_terpilih` varchar(8) NOT NULL,
  `id_frs` varchar(8) DEFAULT NULL,
  `id_kelas` varchar(8) DEFAULT NULL,
  `nrp` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`id_terpilih`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
