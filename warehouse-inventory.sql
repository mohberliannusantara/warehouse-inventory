-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2019 at 10:19 AM
-- Server version: 5.7.21-1
-- PHP Version: 7.0.29-1+b1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warehouse-inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_rayon` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `id_level`, `id_rayon`, `gambar`) VALUES
(1, 'admin', 'admin', 1, 1, ''),
(2, 'bimo', 'bimo', 2, 4, 'Image_1889c1e1.jpg'),
(3, 'berlian', 'berlian', 2, 2, 'Image_1889c1e2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis_barang` int(11) NOT NULL,
  `id_kondisi` int(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_rayon` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `id_jenis_barang`, `id_kondisi`, `keterangan`, `gambar`, `id_rayon`, `tanggal`) VALUES
(1, 'meja', 156000, 2, 1, 'diletakkan di ruang teleconference', '', 2, '2018-08-16 21:33:51'),
(3, 'Lemari', 350000, 2, 1, 'diletakkan diruang A', '', 4, '2018-08-22 12:20:55'),
(4, 'komputer', 1200000, 1, 1, 'diletakkan diruang A', '', 2, '2018-08-22 12:21:30'),
(5, 'kipas angin', 200000, 1, 1, 'diletakkan diruang A', '', 1, '2018-08-22 12:22:51'),
(6, 'Lemari berkas', 433000, 2, 1, 'diletakkan diruang A', '', 4, '2018-08-22 12:23:32'),
(7, 'LCD Proyektor', 765000, 1, 1, 'Diletakkan diruang C', '', 2, '2018-08-22 12:23:51'),
(8, 'LCD Proyektor', 752000, 1, 1, 'Dilatakkan diLemari ruang C', '', 2, '2018-08-22 12:24:30'),
(10, 'TV 21 inci', 2500000, 1, 1, 'Diletakkan di Lobby', '', 2, '2018-08-22 12:32:40'),
(12, 'TV 21 inci', 2500000, 1, 1, 'Diletakkan di Lobby', '', 3, '2018-08-22 12:32:48'),
(17, 'LCD Proyektor', 765000, 1, 1, 'Diletakkan diruang G', 'Sony-VPL-DX1402.jpg', 2, '2018-08-24 00:28:28'),
(18, 'Meja', 500000, 2, 1, 'meja tamu diletakkan di ruang tunggu', '', 0, '2018-12-12 21:47:20'),
(19, 'kursi', 640000, 2, 1, 'diletakkan diruang B', '61edea9d-894b-4f2c-ba78-422e393b7962w.jpg', 0, '2018-12-14 21:28:18'),
(20, 'rak buku', 150000, 2, 1, 'diletakkan diruang B', '1294504_e90647e3-d9e7-471d-918d-f59fba093227.jpg', 0, '2018-12-14 21:42:20'),
(21, 'meja komputer', 350000, 2, 1, 'meja untuk komputer', '', 0, '2019-01-12 21:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` int(11) NOT NULL,
  `nama_jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`) VALUES
(1, 'Elektronik'),
(2, 'Non Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jenis_kendaraan` int(11) NOT NULL,
  `nama_jenis_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jenis_kendaraan`, `nama_jenis_kendaraan`) VALUES
(1, 'Roda 2'),
(2, 'Roda 4');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL,
  `plat` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_jenis_kendaraan` int(11) NOT NULL,
  `id_rayon` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`, `plat`, `harga`, `id_kondisi`, `id_jenis_kendaraan`, `id_rayon`, `keterangan`, `tanggal`, `gambar`) VALUES
(1, 'Mobil Pickup', 'N 1945 MRD', 76000000, 1, 2, 2, 'diparkiran A', '2018-09-01 22:11:37', ''),
(2, 'Mitsubishi', 'N 4351 BG', 90000000, 1, 2, 2, 'diparkir di B', '2018-09-01 23:06:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`) VALUES
(1, 'Baru'),
(2, 'Bekas'),
(3, 'Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'super admin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `harga` bigint(11) NOT NULL,
  `keterangan` text NOT NULL,
  `no_sertifikat` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `luas`, `harga`, `keterangan`, `no_sertifikat`, `lokasi`, `gambar`, `tanggal`) VALUES
(1, 150, 120000000000000, 'lahan kosong', '555678', 'jl. mega mendung rt/rw 10/13, kelurahan mulyorejo, kecamatan grati, pasuruan ', '', '2018-09-01 22:13:11'),
(2, 200, 1300000000, 'lahan kosong', '187567165', 'Jl. Sukarno Hatta No. 123', '', '2019-02-22 08:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id_rayon` int(11) NOT NULL,
  `nama_rayon` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`id_rayon`, `nama_rayon`, `telp`, `keterangan`, `latitude`, `longitude`) VALUES
(1, 'Pusat', '21312', 'dfsd', 1234, 123),
(2, 'Grati', '5324', 'zdvxsdf', 123, 124),
(3, 'Gadingrejo', '234234', 'dfaafs', 45, 42),
(4, 'Purworejo', '3564', 'safd', 35, 234),
(5, 'Gempol', '141', 'zdfsdg', 7568, 567),
(6, 'Gondang Wetan', '546', 'sdf', 546, 45),
(7, 'Kejayan', '4566', 'sdgsdg', 768, 7),
(8, 'Kraton', '4566', 'hfg', 3, 4),
(9, 'Pandaan', '324', 'sdf', 34, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`id_properti`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id_rayon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `id_properti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id_rayon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
