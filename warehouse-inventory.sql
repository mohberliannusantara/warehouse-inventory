-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2019 at 11:18 AM
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
(3, 'berlian', 'berlian', 2, 2, 'Image_1889c1e2.jpg'),
(4, 'lian', 'lian', 2, 1, '');

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
(3, 'Lemari', 350000, 2, 1, 'safd', 'POLITEKNIK_NEGERI_MALANG4.png', 4),
(5, 'kipas anginnnnnn', 200000, 1, 1, 'dfsd', 'background-2.jpg', 1),
(6, 'Lemari berkas', 433000, 2, 1, 'safd', 'background-4.jpg', 4),
(7, 'LCD Proyektor', 765000, 1, 1, 'zdvxsdf', '3b44ab9ab0c6ce416f23159086cbc8e41.jpeg', 8),
(12, 'TV 21 inci', 2500000, 1, 1, 'Diletakkan di Lobby', '', 3),
(18, 'Meja', 500000, 2, 1, 'meja tamu diletakkan di ruang tunggu', '', 7),
(19, 'kursi', 640000, 2, 1, 'diletakkan diruang B', '61edea9d-894b-4f2c-ba78-422e393b7962w.jpg', 6),
(20, 'rak buku', 150000, 2, 1, 'diletakkan diruang B', '1294504_e90647e3-d9e7-471d-918d-f59fba093227.jpg', 3),
(21, 'meja komputer', 350000, 2, 1, 'meja untuk komputer', '', 2),
(22, 'laptop', 1300000000, 1, 1, 'keterangan', 'background-5.jpg', 1),
(24, 'wowow', 1300000000, 1, 1, 'asd', 'POLITEKNIK_NEGERI_MALANG.png', 1),
(25, 'wowow', 1300000000, 1, 1, 'asd', 'POLITEKNIK_NEGERI_MALANG1.png', 1),
(29, 'kursi', 1300000000, 2, 2, 'asd', '53783977_789646474754384_2793212236988940288_n1.jpg', 5),
(30, 'kursi', 1300000000, 2, 2, 'asd', '53783977_789646474754384_2793212236988940288_n2.jpg', 5),
(31, 'kursi', 1300000000, 2, 2, 'asd', '53783977_789646474754384_2793212236988940288_n3.jpg', 5),
(33, 'laptoppppppppp', 1300000000, 1, 1, 'asdasdasdasd', 'IMG_2836.jpg', 3),
(34, 'laptopppppp', 23424234, 1, 1, 'zdvxsdf', '', 4),
(35, 'komputer asus', 3500000, 1, 1, 'zdvxsdf', 'background-52.jpg', 2),
(36, 'asdasd', 2500000, 2, 2, '', 'POLITEKNIK_NEGERI_MALANG3.png', 2);

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
  `harga` bigint(11) NOT NULL,
  `pengguna` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rayon` int(10) UNSIGNED NOT NULL,
  `id_jenis_kendaraan` int(10) UNSIGNED NOT NULL,
  `stan_awal` int(11) NOT NULL,
  `stan_akhir` int(11) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemilik_kendaraan` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`, `nomor_polisi`, `harga`, `pengguna`, `id_rayon`, `id_jenis_kendaraan`, `stan_awal`, `stan_akhir`, `gambar`, `keterangan`, `id_pemilik_kendaraan`, `status`, `tanggal_berlaku`) VALUES
(1, 'honda', 'N 1234 KL', 0, 'ASDASD', 1, 2, 1231, 12312, 'IMG_2837.jpeg', 'tQGc3ll8Qy', 2, 'Sewa', '2019-03-28'),
(2, 'sads', 'L 8787 KI', 0, 'ASDASD', 2, 1, 213, 2413, '', 'asd', 2, 'Sewa', '2019-03-28'),
(3, 'berlian', 'iasdhj', 1, 'asdas', 2, 2, 423, 234234, 'adorable-animal-cat-1440387.jpg', 'tQGc3ll8Qy', 2, 'Sewa', '2019-05-30'),
(4, 'asd', 'sda', 1, 'lkj', 4, 2, 2311, 232342, '', 'asd', 1, 'Sewa', '2019-03-30'),
(5, 'asdasdads', 'jbhh', 1, 'mnbjb', 3, 1, 7767, 222222, '', '', 3, 'Sewa', '2019-03-30'),
(6, 'asdasakjnjsajdbahsdhasgdhasd', '9878jhb', 1, 'uhgh', 2, 2, 123, 123123, 'background-4.jpg', 'tQGc3ll8Qy', 2, 'Sewa', '2019-04-24'),
(7, 'wowo', 'p 9878 l', 5459888879879, 'aksdjj', 3, 1, 0, 0, '', '', 3, 'Sewa', '2019-03-30'),
(8, 'supra', 'L 2431 KH', 545, 'asdsa', 3, 2, 123, 23423, 'background-6.jpg', 'tQGc3ll8Qy', 2, 'Milik PLN', '2019-04-17');

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
(2, 'PT KASTIL', '0981923', 'tQGc3ll8Qy'),
(3, 'AGUNG RENTCAR', '0', 'Qnk6khJfNA'),
(4, 'TAKARI', '0', 'y3IOstVR9B'),
(5, 'PELITA BANYUWANGI', '0', 'jxzQSHy2P8'),
(6, 'asdasd', '234', ''),
(7, 'wowo', '234', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `id_properti` int(11) NOT NULL,
  `nama_properti` varchar(255) NOT NULL,
  `jenis_properti` varchar(100) NOT NULL,
  `id_rayon` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `harga` bigint(11) NOT NULL,
  `tahun_perolehan` varchar(12) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `tanggal_berlaku_sertifikat` varchar(12) DEFAULT NULL,
  `tanggal_kadaluarsa_sertifikat` varchar(12) DEFAULT NULL,
  `no_pajak` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `lokasi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto_properti` text NOT NULL,
  `foto_pajak` text NOT NULL,
  `file_sertifikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `nama_properti`, `jenis_properti`, `id_rayon`, `luas_tanah`, `luas_bangunan`, `harga`, `tahun_perolehan`, `keterangan`, `no_sertifikat`, `tanggal_berlaku_sertifikat`, `tanggal_kadaluarsa_sertifikat`, `no_pajak`, `alamat`, `lokasi`, `status`, `foto_properti`, `foto_pajak`, `file_sertifikat`) VALUES
(30, 'halo', 'Tanah dan Bangunan', 3, 12312, 123123, 1, '10/11/2018', 'halo', '28498293', '10/11/2018', '10/16/2018', '123123', 'as', 'asdas', '', 'banana1.png', 'fast-food-33.jpg', 'faisal.pdf'),
(31, 'rumah', 'Tanah dan Bangunan', 1, 12312, 123123, 130, '04/14/1999', 'rumah', '234234', '02/14/2013', '03/14/2013', '9282342333', 'jaasd', 'asdasdasdasd', 'Sewa', 'p035s0001_detpak_4_large_food_tray_white1.png', 'fast-food-31.jpg', 'Sistem_Informasi_Akademik1.pdf');

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
(1, 'UP3 Pasuruan', '21312', 'dfsd', 1234, 123),
(2, 'ULP Grati', '5324', 'zdvxsdf', 123, 124),
(3, 'ULP Kota Pasuruan', '234234', 'dfaafs', 45, 42),
(4, 'ULP Probolinggo', '3564', 'safd', 35, 234),
(5, 'ULP Kraksaan', '141', 'zdfsdg', 7568, 567),
(6, 'ULP Gondang Wetan', '546', 'sdf', 546, 45),
(7, 'ULP Sukorejo', '4566', 'sdgsdg', 768, 7),
(8, 'ULP Prigen', '4566', 'hfg', 3, 4),
(9, 'ULP Pandaan', '324', 'sdf', 34, 3),
(10, 'ULP Bangil', '453465', '', 354345, 3464760);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
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
  MODIFY `id_kendaraan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id_pemilik_kendaraan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `properti`
--
ALTER TABLE `properti`
  MODIFY `id_properti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id_rayon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
