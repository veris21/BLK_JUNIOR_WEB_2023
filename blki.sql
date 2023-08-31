-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 30, 2023 at 08:42 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+07:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `blki`
--
-- --------------------------------------------------------
--
-- Table structure for table `daftar_siswa`
--
CREATE TABLE `daftar_siswa` (
  `Id` int(11) NOT NULL,
  `NamaSiswa` varchar(50) NOT NULL,
  `NIS` varchar(10) NOT NULL DEFAULT '000000000',
  `IdKelas` int(11) NOT NULL,
  `JenisKelamin` enum('LAKI-LAKI', 'PEREMPUAN') NOT NULL,
  `Alamat` text,
  `JenisPelatihan` varchar(30) NOT NULL,
  `NomorHp` varchar(16) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Status` enum('AKTIF', 'NONAKTIF') NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Dumping data for table `daftar_siswa`
--
INSERT INTO
  `daftar_siswa` (
    `Id`,
    `NamaSiswa`,
    `NIS`,
    `IdKelas`,
    `JenisKelamin`,
    `Alamat`,
    `JenisPelatihan`,
    `NomorHp`,
    `Email`,
    `Status`
  )
VALUES
  (
    1,
    'Anyong',
    '000000001',
    1,
    'LAKI-LAKI',
    'Jalan Seliman',
    'PELATIHAN WEB JUNIOR',
    '08000000000',
    'anyong@mail.com',
    'AKTIF'
  ),
  (
    2,
    'Jospi',
    '000000002',
    2,
    'LAKI-LAKI',
    'Sebelah Rumah Janda Pirang',
    'PELATIHAN WEB JUNIOR',
    '080000000',
    'jospi@mail.com',
    'AKTIF'
  ),
  (
    3,
    'Faisal Rahman',
    '000000003',
    1,
    'LAKI-LAKI',
    'Jalan Kutilang',
    'PELATIHAN WEB JUNIOR',
    '08000000000',
    'failsal@mail.com',
    'AKTIF'
  ),
  (
    4,
    'Zendar',
    '000000004',
    2,
    'LAKI-LAKI',
    'Sebelah Rumah Janda Muda',
    'PELATIHAN WEB JUNIOR',
    '080000000',
    'zendar@mail.com',
    'AKTIF'
  ),
  (
    5,
    'Juanda',
    '000000005',
    2,
    'LAKI-LAKI',
    'Sebelah Rumah Juanda Pirang',
    'PELATIHAN WEB JUNIOR',
    '080000000',
    'juanda@mail.com',
    'AKTIF'
  );

-- --------------------------------------------------------
--
-- Table structure for table `kelas`
--
CREATE TABLE `kelas` (
  `IdKelas` int(11) NOT NULL,
  `NamaKelas` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Dumping data for table `kelas`
--
INSERT INTO
  `kelas` (`IdKelas`, `NamaKelas`)
VALUES
  (1, 'KELAS JUNIOR LEVEL I'),
  (2, 'KELAS JUNIOR LEVEL II');

-- --------------------------------------------------------
--
-- Table structure for table `Peserta`
--
CREATE TABLE `Peserta` (
  `PesertaId` int(11) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text,
  `Umur` int(2) NOT NULL,
  `JenisKelamin` enum('LAKI-LAKI', 'PEREMPUAN') NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '1' COMMENT '1 = Aktif\n0 = Nonaktif'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Dumping data for table `Peserta`
--
INSERT INTO
  `Peserta` (
    `PesertaId`,
    `NamaLengkap`,
    `Alamat`,
    `Umur`,
    `JenisKelamin`,
    `Status`
  )
VALUES
  (
    1,
    'Veris Juniardi',
    'Jalan Girimaya',
    31,
    'LAKI-LAKI',
    1
  ),
  (2, 'Juanda', NULL, 25, 'LAKI-LAKI', 1);

--
-- Indexes for dumped tables
--
--
-- Indexes for table `daftar_siswa`
--
ALTER TABLE
  `daftar_siswa`
ADD
  PRIMARY KEY (`Id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE
  `kelas`
ADD
  PRIMARY KEY (`IdKelas`);

--
-- Indexes for table `Peserta`
--
ALTER TABLE
  `Peserta`
ADD
  PRIMARY KEY (`PesertaId`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `daftar_siswa`
--
ALTER TABLE
  `daftar_siswa`
MODIFY
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE
  `kelas`
MODIFY
  `IdKelas` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `Peserta`
--
ALTER TABLE
  `Peserta`
MODIFY
  `PesertaId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;