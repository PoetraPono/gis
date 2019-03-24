-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2017 at 09:26 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_data`
--

CREATE TABLE `tabel_data` (
  `id` int(11) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` enum('WISATA','HOTEL','KULINER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_data`
--

INSERT INTO `tabel_data` (`id`, `latitude`, `longitude`, `keterangan`, `kategori`) VALUES
(1, '-6.7263202', '108.5710113', 'Keraton Kasepuhan adalah kerajaan islam tempat para pendiri cirebon bertahta, disinilah pusat pemerintahan Kasultanan Cirebon berdiri.', 'WISATA'),
(2, '-6.7220476', '108.5395972', 'Hotel ASTON Cirebon', 'HOTEL'),
(3, '-6.7144398', '108.5548912', 'Kuliner Khas Cirebon\r\nNasi Jamblang Ibu Nur', 'KULINER'),
(4, '-6.7133370', '108.5507391', 'Nasi Jamblang Mami Pitri didekat depan GTC\r\nBuka Jam 19.00', 'KULINER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_data`
--
ALTER TABLE `tabel_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_data`
--
ALTER TABLE `tabel_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
