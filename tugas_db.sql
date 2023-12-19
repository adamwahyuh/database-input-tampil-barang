-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 05:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `No_Item` int(5) NOT NULL,
  `Tanggal` date NOT NULL,
  `Nama_barang` varchar(50) NOT NULL,
  `Harga_satuan` int(20) NOT NULL,
  `Jenis_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`No_Item`, `Tanggal`, `Nama_barang`, `Harga_satuan`, `Jenis_barang`) VALUES
(12891, '2023-12-09', 'Gelas', 9000, 'Furniture'),
(12911, '2023-12-09', 'Kursi Gaming', 120000, 'Furniture'),
(12912, '0000-00-00', 'Keyboard', 1000000, 'Pc Aksesoris'),
(12971, '2023-12-09', 'Controller', 111010, 'Pc Aksesoris'),
(12981, '2023-12-09', 'Mouse', 10000000, 'Pc Aksesoris'),
(18201, '2023-12-09', 'Speaker', 1000000, 'Elektronik'),
(18217, '2023-12-09', 'Router', 80000, 'Elektronik'),
(18291, '2023-12-09', 'Gelas', 10000000, 'Perabotan'),
(18721, '2023-12-09', 'Microsoft 369', 1200000, 'Alat Tulis'),
(19102, '2023-12-09', 'Terminal', 10000, 'Elektronik'),
(19281, '2023-12-09', 'HDMI', 100000, 'Pc Aksesoris'),
(21021, '2023-12-09', 'Meteorite Knife', 1000000000, 'Perabotan'),
(21711, '2023-12-09', 'Kardus', 10000, 'Pc Aksesoris'),
(21712, '2023-12-09', 'Headphone', 1000000, 'Pc Aksesoris'),
(21871, '0000-00-00', 'Pena', 11000, 'Alat Tulis'),
(21890, '2023-12-09', 'Smart Lock', 1200000, 'Home Security'),
(21911, '2023-12-09', 'Pencil', 12000, 'Alat Tulis'),
(21971, '2023-12-09', 'Google Speaker', 1000000, 'Elektronik'),
(22121, '2023-12-10', 'Meja Gaming', 1200000, 'Furniture'),
(81232, '2023-12-09', 'Monitor', 1200000, 'Pc Aksesoris'),
(91027, '2023-12-09', 'Casing', 20000, 'Hp Aksesoris'),
(91281, '2023-12-09', 'Parfum', 50000, 'Kosmetik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`No_Item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
