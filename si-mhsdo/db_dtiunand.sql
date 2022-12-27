-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 04:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dtiunand`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `ipk` varchar(4) NOT NULL,
  `total_sks` varchar(3) NOT NULL,
  `masa_studi` varchar(255) NOT NULL,
  `hp_ortu` varchar(14) NOT NULL,
  `hp_mahasiswa` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `evaluasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `angkatan`, `prodi`, `fakultas`, `semester`, `ipk`, `total_sks`, `masa_studi`, `hp_ortu`, `hp_mahasiswa`, `email`, `status`, `evaluasi`) VALUES
(2, 'muhammad idris', '1911522012', '2019', 'sistem informasi ', 'teknologi informasi', '7', '2', '70', '123', '085765678026', '082287296509', 'nasution080808@gmail.com', 'aktif', '-'),
(3, 'zulfian saputra', '1111111111', '2019', 'teknik sipil', 'teknik', '13', '2.33', '43', 'sfss', '085765678026', '085356017993', 'muhammadzulfiansaputra@gmail.com', 'aktif', '-'),
(4, 'elfijario', '1911521021', '2019', 'sistem informasi', 'teknologi informasi', '7', '2.33', '43', 'asda', '085765678026', '085265276642', 'elfijariodqolbi@gmail.com', 'aktif', '-'),
(5, 'rahmat', '1111111111', '2019', 'kimia', 'fmipa', '7', '2.22', '33', 'sad', '085765678026', '082285218833', 'ayaris211-@gmail.com', 'aktif', '-'),
(6, 'm afdal syafli', '1911523023', '2019', 'sistem informasi', 'teknologi informasi', '7', '2.22', '50', 'Strata 1', '082287296509', '08388367428', 'mafdhals190120@gmail.com', 'aktif', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
