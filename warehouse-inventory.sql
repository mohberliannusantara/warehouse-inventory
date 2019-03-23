-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2019 at 05:13 PM
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
(18, 'Meja', 500000, 2, 1, 'meja tamu diletakkan di ruang tunggu', '', 0),
(19, 'kursi', 640000, 2, 1, 'diletakkan diruang B', '61edea9d-894b-4f2c-ba78-422e393b7962w.jpg', 0),
(20, 'rak buku', 150000, 2, 1, 'diletakkan diruang B', '1294504_e90647e3-d9e7-471d-918d-f59fba093227.jpg', 0),
(21, 'meja komputer', 350000, 2, 1, 'meja untuk komputer', '', 0),
(22, 'laptop', 1300000000, 1, 1, 'keterangan', 'background-5.jpg', 1),
(23, 'laptop', 1300000000, 1, 1, 'keterangan', 'background-51.jpg', 1),
(24, 'wowow', 1300000000, 1, 1, 'asd', 'POLITEKNIK_NEGERI_MALANG.png', 1),
(25, 'wowow', 1300000000, 1, 1, 'asd', 'POLITEKNIK_NEGERI_MALANG1.png', 1),
(27, 'asdasd', 1300000000, 1, 1, 'asdas', 'background-6.jpg', 1),
(28, 'kursi', 1300000000, 2, 2, 'asd', '53783977_789646474754384_2793212236988940288_n.jpg', 5),
(29, 'kursi', 1300000000, 2, 2, 'asd', '53783977_789646474754384_2793212236988940288_n1.jpg', 5),
(30, 'kursi', 1300000000, 2, 2, 'asd', '53783977_789646474754384_2793212236988940288_n2.jpg', 5),
(31, 'kursi', 1300000000, 2, 2, 'asd', '53783977_789646474754384_2793212236988940288_n3.jpg', 5),
(32, 'React makes it painless to create interactive UIs. Design simple views for each state in your applic', 2147483647, 1, 1, 'React makes it painless to create interactive UIs. Design simple views for each state in your application, and React will efficiently update and render just the right ...', '', 1),
(33, 'laptoppppppppp', 1300000000, 1, 1, 'asdasdasdasd', 'IMG_2836.jpg', 3);

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
  `id_pemilik_kendaraan` int(10) UNSIGNED NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`, `nomor_polisi`, `pengguna`, `id_rayon`, `id_jenis_kendaraan`, `stan_awal`, `stan_akhir`, `gambar`, `keterangan`, `id_pemilik_kendaraan`, `status`, `tanggal_berlaku`) VALUES
(1, 'asdasd', 'P 123 PK', 'ASDASD', 1, 2, 1231, 12312, 'IMG_28361.jpg', 'DSFSDFSD', 2, 'Sewa', '2019-03-23'),
(2, 'asdasd', 'P 123 PK', 'ASDASD', 2, 2, 123123, 123123123, 'IMG_28362.jpg', 'asdasd', 1, 'Sewa', '2019-03-23');

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
  `jenis_properti` varchar(100) NOT NULL,
  `id_rayon` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `harga` bigint(11) NOT NULL,
  `tahun_perolehan` date DEFAULT NULL,
  `keterangan` text NOT NULL,
  `no_sertifikat` varchar(255) NOT NULL,
  `tanggal_berlaku_sertifikat` date DEFAULT NULL,
  `tanggal_kadaluarsa_sertifikat` date DEFAULT NULL,
  `no_pajak` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `lokasi` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `foto_properti` text NOT NULL,
  `foto_pajak` text NOT NULL,
  `foto_sertifikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properti`
--

INSERT INTO `properti` (`id_properti`, `nama_properti`, `jenis_properti`, `id_rayon`, `luas_tanah`, `luas_bangunan`, `harga`, `tahun_perolehan`, `keterangan`, `no_sertifikat`, `tanggal_berlaku_sertifikat`, `tanggal_kadaluarsa_sertifikat`, `no_pajak`, `alamat`, `lokasi`, `status`, `foto_properti`, `foto_pajak`, `foto_sertifikat`) VALUES
(3, 'Lokasi Tanah Tambakan Kec Bangil', 'Tanah', 10, 119, 0, 40000000, NULL, '', '', '1999-07-07', NULL, '', 'Desa Tambanan, Kec. Bangil', 'https://goo.gl/maps/JjoWEbWLckA2', 'PLN', 'PSR_ TANAH TAMBAKAN_3.jpeg', 'f82461bd-1aca-4b68-8725-24b3a6e4d364_169.jpg', '290x387xgbr-2-SHM.png.jpg'),
(4, 'LOKASI TANAH RAYA BROMO', 'Tanah', 6, 436, 60, 150000000, '1987-02-10', 'Petok No. 28', 'Surat Pernyataan Pelepasan Hak Atas Tanah No.02/II/1987', '1987-02-10', NULL, '35.74.040.002.012-0051.0', 'Desa Karangsentul, Gondang Wetan', 'https://goo.gl/maps/oRr6eyRt44J2', 'PLN', 'PSR_TANAH RAYA BROMO_2.JPG', '4lqc78.jpg', '0001.jpg'),
(5, 'LOKASI RUMAH DINAS MANAJER AREA', 'Tanah dan Bangunan', 4, 348, 113, 430000000, '1966-10-18', 'Hak Pakai\r\n10/20/1971', 'Sertifikat No.1', '1971-10-20', NULL, '', 'JL. DR WAHIDIN 86-88, Purworejo, pasuruan', 'https://goo.gl/maps/5bCWvCU3q5Q2', 'PLN', 'PSR_RUMAH DINAS MA PASURUAN_1.JPG', 'WhatsApp Image 2018-03-26 at 01.59.32.jpg', 'sertifikat-tanah-asli.jpg');

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
(9, 'Pandaan', '324', 'sdf', 34, 3),
(10, 'Bangil', '453465', '', 354345, 3464760);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
  MODIFY `id_kendaraan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id_properti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rayon`
--
ALTER TABLE `rayon`
  MODIFY `id_rayon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
