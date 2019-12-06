-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2019 pada 03.58
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip` char(18) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`) VALUES
('198410162008121002', 'Dr. Radityo Anggoro, S.Kom., M.E'),
('198510172015042001', 'Dini Adni Navastara S.Kom., M.Sc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `frs`
--

CREATE TABLE `frs` (
  `id_frs` varchar(8) NOT NULL,
  `nrp` char(14) NOT NULL,
  `is_Setuju` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(8) NOT NULL,
  `mata_kuliah` varchar(32) NOT NULL,
  `kode_matkul` varchar(8) NOT NULL,
  `sks` int(11) NOT NULL,
  `grup` char(1) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `dosen` char(18) NOT NULL,
  `ruang` varchar(16) DEFAULT NULL,
  `Waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `periode` binary(1) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `mata_kuliah`, `kode_matkul`, `sks`, `grup`, `kapasitas`, `dosen`, `ruang`, `Waktu_mulai`, `waktu_selesai`, `periode`, `tahun`) VALUES
('KIF19001', 'Pra-TA', 'IF184702', 3, 'A', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0x30, 2019),
('KIF19002', 'Konstruksi Perangkat Lunak', 'IF184974', 3, 'A', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0x30, 2019),
('KIF19003', 'Sistem Basis Data', 'IF184702', 3, 'A', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0x30, 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelasterpilih`
--

CREATE TABLE `kelasterpilih` (
  `id_terpilih` varchar(8) NOT NULL,
  `id_frs` varchar(8) DEFAULT NULL,
  `id_kelas` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` char(14) NOT NULL,
  `nama` varchar(31) NOT NULL,
  `IPK` int(11) NOT NULL,
  `doswal` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `IPK`, `doswal`) VALUES
('05111640000001', 'Andre', 4, '198410162008121002'),
('05111640000002', 'Jimi', 4, '198410162008121002'),
('05111640000003', 'Hazimi', 4, '198410162008121002'),
('05111640000043', 'Arrafi', 3, '198410162008121002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upmb`
--

CREATE TABLE `upmb` (
  `id_upmb` varchar(8) NOT NULL,
  `mata_kuliah` varchar(32) NOT NULL,
  `kode_matkul` varchar(8) NOT NULL,
  `sks` int(11) NOT NULL,
  `grup` char(2) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `dosen` char(18) NOT NULL,
  `ruang` varchar(16) DEFAULT NULL,
  `Waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `periode` binary(1) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `upmb`
--

INSERT INTO `upmb` (`id_upmb`, `mata_kuliah`, `kode_matkul`, `sks`, `grup`, `kapasitas`, `dosen`, `ruang`, `Waktu_mulai`, `waktu_selesai`, `periode`, `tahun`) VALUES
('UP190001', 'Fisika', 'FIS18497', 3, '12', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0x30, 2019),
('UP190002', 'Teknopreneur', 'Tek18470', 3, '23', 30, '198410162008121002', 'IF-103', '07:30:00', '10:30:00', 0x30, 2019);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `frs`
--
ALTER TABLE `frs`
  ADD PRIMARY KEY (`id_frs`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kelasterpilih`
--
ALTER TABLE `kelasterpilih`
  ADD PRIMARY KEY (`id_terpilih`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indeks untuk tabel `upmb`
--
ALTER TABLE `upmb`
  ADD PRIMARY KEY (`id_upmb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
