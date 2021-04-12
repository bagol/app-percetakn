-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 07:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `percetakan_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kode_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `surel` varchar(30) NOT NULL,
  `password` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kode_admin`, `nama_admin`, `surel`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$uGWqL5lnD6a.pIRt/mR6f.fV9uaT288jNCuflUkx66KnuGgNA2UVe');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `kode_bukti` int(11) NOT NULL,
  `kode_pesanan` int(11) NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti_pembayaran`
--

INSERT INTO `bukti_pembayaran` (`kode_bukti`, `kode_pesanan`, `bukti`, `atas_nama`, `kode_pelanggan`) VALUES
(2, 3, '685a79c9867e0e1332fdaddf4a86cec5.PNG', 'Mulyadih', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pelanggan`
--

CREATE TABLE `detail_pelanggan` (
  `kode_detail` int(11) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL,
  `no_tlpn` varchar(13) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `kecamatan` varchar(35) NOT NULL,
  `kelurahan` varchar(35) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pelanggan`
--

INSERT INTO `detail_pelanggan` (`kode_detail`, `kode_pelanggan`, `no_tlpn`, `gambar`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `kode_pos`, `alamat`) VALUES
(0, 1, '081222129622', '560078c188fd4d63a484703f94b05b9e.jpeg', 9, 115, 'Cipayung', 'Cipayung Jaya', '16437', 'Jl.Rawa Sari I Rt.01/05'),
(4, 2, '083872735382', '', 3, 457, 'Pamulnag', 'Reni Jaya', '16517', 'Jl.mana aja dah lupa gw');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Stiker'),
(2, 'Cetak Digital Dokumen');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `katasandi` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `email`, `katasandi`) VALUES
(1, 'Mulyadih', 'e2016141010@gmail.com', '$2y$10$LVUNqo9336Oc2yjM90qL2e4kynS0hRHsRu5UXt7O.vPGXea98s3CS'),
(2, 'Bagol', 'bagolakang@gmail.com', '$2y$10$NlqruQy0N3.Xkpwq/QA1beMFAe7goh8OLHsmYqulJNeMEkGa7Gw0O');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kode_pengiriman` int(11) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `berat` int(11) NOT NULL,
  `kurir` varchar(20) NOT NULL,
  `no_telpon` varchar(13) NOT NULL,
  `kode_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`kode_pengiriman`, `kota`, `alamat`, `berat`, `kurir`, `no_telpon`, `kode_pesanan`) VALUES
(1, '115', 'Kec Cipayung Kel Cipayung Jaya Jl.Rawa Sari I Rt.01/05 16437', 1020, 'JNE REG  (1-2 Hari) ', '081222129622', 3),
(2, '115', 'Kec Cipayung Kel Cipayung Jaya Jl.Rawa Sari I Rt.01/05 16437', 221, 'JNE REG  (1-2 Hari) ', '081222129622', 4),
(3, '115', 'Kec Cipayung Kel Cipayung Jaya Jl.Rawa Sari I Rt.01/05 16437', 221, 'JNE REG  (1-2 Hari) ', '081222129622', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kode_pesanan` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `kode_bahan` int(11) NOT NULL,
  `kode_pelanggan` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`kode_pesanan`, `kode_produk`, `kode_bahan`, `kode_pelanggan`, `file`, `status`, `tanggal`, `ukuran`, `kuantitas`, `berat`, `harga_total`) VALUES
(3, 2, 3, 1, '1d75c700782fcec87d68f401d305e0a1.PNG', 'di proses', '2021-04-04', '3 meter', 1, 1020, 129000),
(4, 11, 14, 1, 'e75a2c4c2a6caaf926a4156f54183d0d.pdf', 'di checkout', '2021-04-09', ' 1 / lembar', 50, 221, 59000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kode_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `kode_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `satuan`, `deskripsi`, `gambar`, `kode_kategori`) VALUES
(1, 'Print Outdor ', 'meter', '', 'f586f141c8ee62ef81862fb783e4a529.PNG', 1),
(2, 'Print Indoor', 'meter', 'Produk Cetak Stiker untuk didalam ruangan ', 'default.png', 1),
(11, 'Print Warna', 'lembar', '', 'default.png', 2),
(12, 'test produk 1', 'lembar', '', '95ba78c17efd305e59f3875ea4cd04e1.PNG', 1),
(13, 'test produk 1', 'lembar', '', '0fcb60ed285350d6bd23d51ffc3255ff.PNG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk_bahan`
--

CREATE TABLE `produk_bahan` (
  `kode_bahan` int(11) NOT NULL,
  `kode_produk` int(11) NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `berat` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_bahan`
--

INSERT INTO `produk_bahan` (`kode_bahan`, `kode_produk`, `bahan`, `berat`, `lebar`, `panjang`, `harga`) VALUES
(1, 1, 'Flexi China 280 Heighress', 280, 100, 100, 17000),
(2, 1, 'Flexi China 280 Standar', 280, 100, 100, 15000),
(3, 2, 'Flexi China 340 Heighress', 340, 100, 100, 40000),
(14, 11, 'HVS A4', 70, 21, 30, 1000),
(15, 11, 'HVS A3', 70, 30, 42, 5000),
(17, 12, 'Kertas', 70, 40, 40, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`kode_bukti`),
  ADD KEY `kode_pesanan` (`kode_pesanan`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `detail_pelanggan`
--
ALTER TABLE `detail_pelanggan`
  ADD PRIMARY KEY (`kode_detail`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`kode_pengiriman`),
  ADD KEY `kode_pesanan` (`kode_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kode_pesanan`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD UNIQUE KEY `kode_bahan` (`kode_bahan`),
  ADD KEY `kode_pelanggan` (`kode_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `produk_bahan`
--
ALTER TABLE `produk_bahan`
  ADD PRIMARY KEY (`kode_bahan`),
  ADD KEY `kode_produk` (`kode_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `kode_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  MODIFY `kode_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_pelanggan`
--
ALTER TABLE `detail_pelanggan`
  MODIFY `kode_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kode_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `kode_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `kode_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk_bahan`
--
ALTER TABLE `produk_bahan`
  MODIFY `kode_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD CONSTRAINT `bukti_pembayaran_ibfk_1` FOREIGN KEY (`kode_pesanan`) REFERENCES `pesanan` (`kode_pesanan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bukti_pembayaran_ibfk_2` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggan` (`kode_pelanggan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detail_pelanggan`
--
ALTER TABLE `detail_pelanggan`
  ADD CONSTRAINT `detail_pelanggan_ibfk_1` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggan` (`kode_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`kode_pesanan`) REFERENCES `pesanan` (`kode_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`kode_pelanggan`) REFERENCES `pelanggan` (`kode_pelanggan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_bahan`
--
ALTER TABLE `produk_bahan`
  ADD CONSTRAINT `produk_bahan_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `produk` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
