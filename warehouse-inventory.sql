-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2019 at 03:45 PM
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
  `id_rayon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `id_jenis_barang`, `id_kondisi`, `keterangan`, `gambar`, `id_rayon`) VALUES
(1, 'meja', 156000, 2, 1, 'diletakkan di ruang teleconference', '', 2),
(3, 'Lemari', 350000, 2, 1, 'diletakkan diruang A', '', 4),
(4, 'komputer', 1200000, 1, 1, 'diletakkan diruang A', '', 2),
(5, 'kipas angin', 200000, 1, 1, 'diletakkan diruang A', '', 1),
(6, 'Lemari berkas', 433000, 2, 1, 'diletakkan diruang A', '', 4),
(7, 'LCD Proyektor', 765000, 1, 1, 'Diletakkan diruang C', '', 2),
(8, 'LCD Proyektor', 752000, 1, 1, 'Dilatakkan diLemari ruang C', '', 2),
(10, 'TV 21 inci', 2500000, 1, 1, 'Diletakkan di Lobby', '', 2),
(12, 'TV 21 inci', 2500000, 1, 1, 'Diletakkan di Lobby', '', 3),
(17, 'LCD Proyektor', 765000, 1, 1, 'Diletakkan diruang G', 'Sony-VPL-DX1402.jpg', 2),
(18, 'Meja', 500000, 2, 1, 'meja tamu diletakkan di ruang tunggu', '', 0),
(19, 'kursi', 640000, 2, 1, 'diletakkan diruang B', '61edea9d-894b-4f2c-ba78-422e393b7962w.jpg', 0),
(20, 'rak buku', 150000, 2, 1, 'diletakkan diruang B', '1294504_e90647e3-d9e7-471d-918d-f59fba093227.jpg', 0),
(21, 'meja komputer', 350000, 2, 1, 'meja untuk komputer', '', 0);

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
  `id_kendaraan` int(10) UNSIGNED NOT NULL,
  `nama_kendaraan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_polisi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rayon` int(10) UNSIGNED NOT NULL,
  `id_jenis_kendaraan` int(10) UNSIGNED NOT NULL,
  `stan_awal` int(11) NOT NULL,
  `stan_akhir` int(11) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemilik_kendaraan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pemilik_kendaraan`
--

CREATE TABLE `pemilik_kendaraan` (
  `id_pemilik_kendaraan` int(10) UNSIGNED NOT NULL,
  `nama_pemilik_kendaraan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemilik_kendaraan`
--

INSERT INTO `pemilik_kendaraan` (`id_pemilik_kendaraan`, `nama_pemilik_kendaraan`, `telepon`, `keterangan`) VALUES
(1, 'PLN', '0', 'BU9SSiwCg6'),
(2, 'PT KASTIL', '0', 'tQGc3ll8Qy'),
(3, 'AGUNG RENTCAR', '0', 'Qnk6khJfNA'),
(4, 'TAKARI', '0', 'y3IOstVR9B'),
(5, 'PELITA BANYUWANGI', '0', 'jxzQSHy2P8');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` int(11) NOT NULL,
  `nama_properti` varchar(255) NOT NULL,
  `id_rayon` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `harga` bigint(11) NOT NULL,
  `keterangan` text NOT NULL,
  `no_sertifikat` varchar(100) NOT NULL,
  `no_pajak` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lokasi` text NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `foto_properti` text NOT NULL,
  `foto_pajak` text NOT NULL,
  `foto_sertifikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `nama_properti`, `id_rayon`, `luas`, `harga`, `keterangan`, `no_sertifikat`, `no_pajak`, `alamat`, `lokasi`, `kodepos`, `foto_properti`, `foto_pajak`, `foto_sertifikat`) VALUES
(1, 'wowowowowo', 1, 150, 120000000000000, 'lahan kosong', '555678', 0, 'jl. mega mendung rt/rw 10/13, kelurahan mulyorejo, kecamatan grati, pasuruan ', 'jl. mega mendung rt/rw 10/13, kelurahan mulyorejo, kecamatan grati, pasuruan ', '', '', '', ''),
(2, 'awerwer', 2, 200, 1300000000, 'lahan kosong', '187567165', 0, '', 'Jl. Sukarno Hatta No. 123', '', '', '', '');

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
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `kendaraan_id_rayon_foreign` (`id_rayon`),
  ADD KEY `kendaraan_id_jenis_kendaraan_foreign` (`id_jenis_kendaraan`),
  ADD KEY `kendaraan_id_pemilik_kendaraan_foreign` (`id_pemilik_kendaraan`);

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
-- Indexes for table `pemilik_kendaraan`
--
ALTER TABLE `pemilik_kendaraan`
  ADD PRIMARY KEY (`id_pemilik_kendaraan`);

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
  MODIFY `id_kendaraan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `pemilik_kendaraan`
--
ALTER TABLE `pemilik_kendaraan`
  MODIFY `id_pemilik_kendaraan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
