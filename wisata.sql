-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 10:39 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fafa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(20) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'fafa', '05d251ea28c5be9426611a121db0c92a');

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE `icon` (
  `id_icon` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `icon` text NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id_icon`, `nama`, `icon`, `tanggal`) VALUES
(14, 'Wisata Alam', 'wisata_alam.png', '2017-08-12 06:17:52'),
(18, 'Wisata Buatan', 'wisata_buatan_baru1.png', '2017-08-14 05:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(20) NOT NULL,
  `id_icon` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_icon`, `kategori`, `tanggal`) VALUES
(5, '14', 'Wisata Alam', '2017-08-12 06:20:05'),
(9, '18', 'Wisata Buatan', '2017-08-14 05:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(20) NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `nama_wisata` text NOT NULL,
  `alamat` text NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `buka` varchar(50) NOT NULL,
  `tutup` varchar(50) NOT NULL,
  `longitude` text NOT NULL,
  `latitude` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `id_kategori`, `nama_wisata`, `alamat`, `telephone`, `buka`, `tutup`, `longitude`, `latitude`, `status`) VALUES
(14, '5', 'Taman Selecta', 'Jl. Oro-Oro Ombo No.223, Oro-Oro Ombo, Kec. Batu, Kota Batu, Jawa Timur 65316, Indonesia', '08511', '07:00', '15:30', '112.53359063494872', '-7.893557508678794', '1'),
(16, '5', 'Taman Hutan Kota Temas', 'Gg. VI No.22, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315, Indonesia', '0856666', '00', '000', '112.53755493987273', '-7.885193833894701', '1'),
(20, '9', 'Museum Angkut', 'Museum Angkut, Jl. Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65314, Indonesia', '0812345', '09:00', '22:00', '112.51912816394042', '-7.878530403983606', '1'),
(21, '9', 'Kusuma Water Park', 'Jl. Abdul Gani Atas V, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65311, Indonesia', '089999', '09:00', '16:00', '112.51477225650024', '-7.881564562804566', '1'),
(22, '9', 'Jawa Timur Park 1', 'Jl. Dewi Sartika Atas No.136, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314, Indonesia', '086666', '09:00', '17:00', '112.52478226054382', '-7.88392917203322', '1'),
(23, '5', 'Eco Green Park', 'Jl. Ecogreen Park, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65315, Indonesia', '0677', '08:00', '16:00', '112.528236945755', '-7.8873883850082', '1'),
(24, '9', 'Batu Secret Zoo', 'Jl. Jatim Park II, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315, Indonesia', '098876', '08:00', '16:00', '112.52983017790984', '-7.88824388483024', '1'),
(25, '5', 'Jungle Adventure', 'Jl. Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu, Jawa Timur 65316, Indonesia', '087777', '08:00', '16:00', '112.52744837630462', '-7.888780563939459', '1'),
(26, '9', 'Pasar Parkiran', 'Jl. Sultan Agung No.99, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314, Indonesia', '0876543', '08:00', '23:00', '112.52443357337188', '-7.880039515528966', '1'),
(27, '9', 'Batu Night Spectaculer', 'Jl. Oro-Oro Ombo No.1, Oro-Oro Ombo, Kec. Batu, Kota Batu, Jawa Timur 65316, Indonesia', '098765', '16:00', '22:00', '112.53453477252197', '-7.896554362398767', '1'),
(28, '9', 'Rumah Terbalik', 'Jl. Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu, Jawa Timur 65316, Indonesia', '0987654', '08:00', '16:00', '112.52599998343658', '-7.888514881299179', '1'),
(29, '9', 'Alun - Alun Kota Wisata Batu', 'Jl. Munif No.21, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314, Indonesia', '2345678', '00:00', '00:00', '112.5269226633377', '-7.871160121758656', '1'),
(30, '5', 'Kebun Strawberry Rahardjo\'s', 'Jl. Samadi No.3, Pandanrejo, Bumiaji, Kota Batu, Jawa Timur 65332, Indonesia', '123456789', '78', '789', '112.53729208338927', '-7.868853892604924', '1'),
(31, '5', 'Kaliwatu Rafting', 'Jl. Raya Pandanrejo No.2, Bumiaji, Kota Batu, Jawa Timur 65332, Indonesia', '0987', '07:00', '16:00', '112.53466351855468', '-7.863492125936771', '1'),
(32, '5', 'Batu Rafting', 'Jl. Raya Pandanrejo No.19, Pandanrejo, Bumiaji, Kota Batu, Jawa Timur 65332, Indonesia', '09876', '07:00', '16:00', '112.53456695903014', '-7.864294535468124', '1'),
(33, '5', 'Wisata Petik Jeruk & Apel Balitjestro', 'Jl. Raya Tlekung No.16, Tlekung, Junrejo, Kota Batu, Jawa Timur 65327, Indonesia', '098765', '07:00', '16:00', '112.53546281684112', '-7.905316315292286', '1'),
(34, '5', 'Bukit Teletubbies', 'Gg. Lap. No.13, Bumiaji, Kota Batu, Jawa Timur 65331, Indonesia', '09876', '08:00', '16:00', '112.5402317844696', '-7.853873718743265', '1'),
(35, '9', 'Omah Munir', 'Jl. Bukit Berbunga No.2, Sidomulyo, Kec. Batu, Kota Batu, Jawa Timur 65317, Indonesia', '098765', '08:00', '16:00', '112.52837642062377', '-7.84582809545206', '1'),
(36, '9', 'Pusat Oleh - Oleh Brawijaya', 'Jl. Diponegoro No.86, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314, Indonesia', '09876', '00:00', '00:00', '112.53216906417083', '-7.875878817911142', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id_icon`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id_icon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
