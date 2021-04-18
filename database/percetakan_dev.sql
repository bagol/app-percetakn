-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 09:18 AM
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
(3, 5, '16bb4049ff5e9ff5b24d441335dd18ca.jpg', 'Aris Ciswanto', 1);

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
(0, 1, '081222129622', '37284b1c183a38bfbf6aa60b1bb6c5a7.png', 9, 115, 'Cipayung', 'Cipayung Jaya', '16437', 'Jl.Rawa Sari I Rt.01/05'),
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
(4, '115', 'Kec Cipayung Kel Cipayung Jaya Jl.Rawa Sari I Rt.01/05 16437', 29, 'JNE OKE  (2-3 Hari) ', '081222129622', 5);

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
(5, 18, 24, 1, 'e5bff6e73feccf31ab948d42a7d408fc.png', 'di proses', '2021-04-18', ' 1 / lembar', 1, 29, 88000);

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
(16, 'Print Warna', 'lembar', '', 'a73a6fb896662cce35ca0c0374ee0865.PNG', 2),
(17, 'Roll up Banner', 'lembar', '', 'fc813a2fc0cbb921747cf4b840695489.jpg', 2),
(18, 'Stiker Matte Premium', 'lembar', '', '82970b8e3e1a5f5482fbcfbc1f0c6b53.png', 1);

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
(19, 16, 'HVS 70 Gram', 70, 21, 29, 500),
(20, 17, 'Stainless ', 340, 60, 160, 100000),
(21, 17, 'frontlite', 340, 60, 160, 190000),
(24, 18, 'Matte Premium 60 x 40 cm', 120, 40, 60, 80000),
(25, 18, 'Matte Jerman (60 x 40) Cm', 120, 40, 60, 95000);

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
  MODIFY `kode_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `kode_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `kode_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kode_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk_bahan`
--
ALTER TABLE `produk_bahan`
  MODIFY `kode_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
