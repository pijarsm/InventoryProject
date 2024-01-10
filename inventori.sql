-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2023 at 01:41 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`, `posisi`) VALUES
(1, 'admin', 'admin', 'Administrator', 'Administrator'),
(2, 'manager', 'manager', 'Manager', 'Atasan');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `iddata` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `terjual` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`iddata`, `kode`, `nama`, `terjual`, `tanggal`) VALUES
(2, '1321', '123', 123, '2023-06-10'),
(3, '123', 'qweqweqw', 1212, '2023-06-23'),
(4, '1312', 'ewqeqw', 12, '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

CREATE TABLE `dataset` (
  `iddata` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok_sistem` int(11) NOT NULL,
  `stok_lap` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`iddata`, `kode`, `nama`, `stok_sistem`, `stok_lap`, `tanggal`) VALUES
(2, 971021, '1.0 PET X12 SPRITE CLR', 56, 66, '2023-07-01'),
(3, 970436, '1.0 PET X12 FANTA STRAWBERRY', 69, 75, '2023-07-02'),
(4, 971119, '1.0 PET X12 FANTA ORANGE VITC GT', 69, 70, '2023-07-03'),
(5, 970285, '1.0 PET X12 MMP ORANGE', 37, 40, '2023-07-06'),
(6, 970552, '1.0 PET X6 COCA-COLA V', 63, 78, '2023-08-12'),
(7, 970551, '1.0 PET X6 FANTA STBRY V', 74, 82, '2023-08-01'),
(8, 971034, '1.0 PET X6 SPRITE CLR V', 50, 53, '2023-08-14'),
(9, 970055, '250 CAN X24 COCA-COLA', 90, 98, '0000-00-00'),
(10, 970056, '250 CAN X24 SPRITE', 50, 62, '0000-00-00'),
(11, 970057, '250 CAN X24 FANTA STRAWBERRY', 44, 52, '0000-00-00'),
(12, 971095, '250 CAN X24 A&W SARSAPARILA', 63, 67, '0000-00-00'),
(13, 970161, '250 CAN X24 COCA-COLA ZERO', 65, 90, '0000-00-00'),
(14, 971094, '250 CAN X24 SCHWEPPES BOTANICAL DRINK', 43, 51, '0000-00-00'),
(15, 970402, '250 CAN X12 FANTA STBRY V', 46, 53, '0000-00-00'),
(16, 970664, '250 PET X12 FANTA SODA WTR', 70, 84, '0000-00-00'),
(17, 970601, '250 PET X12 COCA-COLA P3500', 41, 76, '0000-00-00'),
(18, 971027, '250 PET X12 SPRITE CLR P3500', 30, 74, '0000-00-00'),
(19, 970603, '250 PET X12 FANTA STBR P3500', 26, 55, '0000-00-00'),
(20, 970499, '300 PET X12 MMNBOOST ORG', 56, 62, '0000-00-00'),
(21, 970500, '300 PET X12 MMNBOOST STBRY', 36, 91, '0000-00-00'),
(22, 970929, '300 PET X12 MMP ORG RELAUNCH', 71, 80, '0000-00-00'),
(23, 970806, '330 CAN X24 FANTA STRAWBERRY D', 71, 87, '0000-00-00'),
(24, 970594, '350 PET X12 FRESTEA JASMINE', 46, 60, '0000-00-00'),
(25, 970597, '350 PET X12 FTEA GRN HNY', 44, 68, '0000-00-00'),
(26, 970651, '350 PET X12 FRESTEA APEL', 65, 69, '0000-00-00'),
(27, 971040, '390 PET X12 FANTA ORANGE VITC', 38, 41, '0000-00-00'),
(28, 971004, '390 PET X12 COCA-COLA P5500', 69, 84, '0000-00-00'),
(29, 971005, '390 PET X12 FANTA STBRY P5500', 56, 65, '0000-00-00'),
(30, 971033, '390 PET X12 SPRITE CLR P5500', 79, 96, '0000-00-00'),
(31, 970912, '425 PET X12 SPRITE WATERLYMON', 19, 22, '0000-00-00'),
(32, 971047, '390 PET X12 SPRITE CLR P5500 D', 49, 57, '0000-00-00'),
(33, 970309, '500 PET X12 FRESTEA JASMINE', 41, 48, '0000-00-00'),
(34, 970310, '500 PET X12 FRESTEA APPLE', 42, 54, '0000-00-00'),
(35, 970313, '500 PET X12 FRESTEA GREENHONEY', 56, 61, '0000-00-00'),
(36, 970293, '600 PET X24 ADES', 10, 14, '0000-00-00'),
(37, 700143, 'CRT & MTBTL SMALL', 25, 28, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `idhasil` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok_sistem` float NOT NULL,
  `stok_lap` float NOT NULL,
  `kedekatan` float NOT NULL,
  `cluster` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`idhasil`, `kode`, `nama`, `stok_sistem`, `stok_lap`, `kedekatan`, `cluster`) VALUES
(1, '971021', '1.0 PET X12 SPRITE CLR', 0.2242, 0.2979, 0.2242, 'Cluster 1'),
(2, '970436', '1.0 PET X12 FANTA STRAWBERRY', 0.4155, 0.487, 0.4155, 'Cluster 1'),
(3, '971119', '1.0 PET X12 FANTA ORANGE VITC GT', 0.3789, 0.4477, 0.3789, 'Cluster 1'),
(4, '970285', '1.0 PET X12 MMP ORANGE', 0.1676, 0.0926, 0.0926, 'Cluster 2'),
(5, '970552', '1.0 PET X6 COCA-COLA V', 0.3901, 0.4645, 0.3901, 'Cluster 1'),
(6, '970551', '1.0 PET X6 FANTA STBRY V', 0.5178, 0.5901, 0.5178, 'Cluster 1'),
(7, '971034', '1.0 PET X6 SPRITE CLR V', 0.0759, 0.1362, 0.0759, 'Cluster 1'),
(8, '970055', '250 CAN X24 COCA-COLA', 0.794, 0.8662, 0.794, 'Cluster 1'),
(9, '970056', '250 CAN X24 SPRITE', 0.1407, 0.2156, 0.1407, 'Cluster 1'),
(10, '970057', '250 CAN X24 FANTA STRAWBERRY', 0, 0.075, 0, 'Cluster 1'),
(11, '971095', '250 CAN X24 A&W SARSAPARILA', 0.2972, 0.3673, 0.2972, 'Cluster 1'),
(12, '970161', '250 CAN X24 COCA-COLA ZERO', 0.523, 0.598, 0.523, 'Cluster 1'),
(13, '971094', '250 CAN X24 SCHWEPPES BOTANICAL DRINK', 0.0173, 0.0586, 0.0173, 'Cluster 1'),
(14, '970402', '250 CAN X12 FANTA STBRY V', 0.0277, 0.099, 0.0277, 'Cluster 1'),
(15, '970664', '250 PET X12 FANTA SODA WTR', 0.5007, 0.5746, 0.5007, 'Cluster 1'),
(16, '970601', '250 PET X12 COCA-COLA P3500', 0.2882, 0.3506, 0.2882, 'Cluster 1'),
(17, '971027', '250 PET X12 SPRITE CLR P3500', 0.315, 0.3545, 0.315, 'Cluster 1'),
(18, '970603', '250 PET X12 FANTA STBR P3500', 0.2278, 0.2128, 0.2128, 'Cluster 2'),
(19, '970499', '300 PET X12 MMNBOOST ORG', 0.1915, 0.2626, 0.1915, 'Cluster 1'),
(20, '970500', '300 PET X12 MMNBOOST STBRY', 0.4749, 0.5329, 0.4749, 'Cluster 1'),
(21, '970929', '300 PET X12 MMP ORG RELAUNCH', 0.4743, 0.547, 0.4743, 'Cluster 1'),
(22, '970806', '330 CAN X24 FANTA STRAWBERRY D', 0.5362, 0.6103, 0.5362, 'Cluster 1'),
(23, '970594', '350 PET X12 FRESTEA JASMINE', 0.0984, 0.1719, 0.0984, 'Cluster 1'),
(24, '970597', '350 PET X12 FTEA GRN HNY', 0.1905, 0.2581, 0.1905, 'Cluster 1'),
(25, '970651', '350 PET X12 FRESTEA APEL', 0.3315, 0.4018, 0.3315, 'Cluster 1'),
(26, '971040', '390 PET X12 FANTA ORANGE VITC', 0.151, 0.076, 0.076, 'Cluster 2'),
(27, '971004', '390 PET X12 COCA-COLA P5500', 0.4927, 0.5668, 0.4927, 'Cluster 1'),
(28, '971005', '390 PET X12 FANTA STBRY P5500', 0.2155, 0.2888, 0.2155, 'Cluster 1'),
(29, '971033', '390 PET X12 SPRITE CLR P5500', 0.6825, 0.7564, 0.6825, 'Cluster 1'),
(30, '970912', '425 PET X12 SPRITE WATERLYMON', 0.4746, 0.4013, 0.4013, 'Cluster 2'),
(31, '971047', '390 PET X12 SPRITE CLR P5500 D', 0.0863, 0.1596, 0.0863, 'Cluster 1'),
(32, '970309', '500 PET X12 FRESTEA JASMINE', 0.0606, 0.0173, 0.0173, 'Cluster 2'),
(33, '970310', '500 PET X12 FRESTEA APPLE', 0.0345, 0.0896, 0.0345, 'Cluster 1'),
(34, '970313', '500 PET X12 FRESTEA GREENHONEY', 0.1843, 0.2544, 0.1843, 'Cluster 1'),
(35, '970293', '600 PET X24 ADES', 0.6207, 0.548, 0.548, 'Cluster 2'),
(36, '700143', 'CRT & MTBTL SMALL', 0.3715, 0.2979, 0.2979, 'Cluster 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`iddata`);

--
-- Indexes for table `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`iddata`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`idhasil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `iddata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dataset`
--
ALTER TABLE `dataset`
  MODIFY `iddata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
