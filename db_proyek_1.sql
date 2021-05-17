-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 05:15 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyek_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(100) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_barang` varchar(191) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `id_kategori`, `nama_barang`, `harga`, `satuan`, `keterangan`) VALUES
('BR-003', 26, 'Terigu 1/30', 50000, 'tiga_per_empat', 'Data Barang Terigu 1/30'),
('BR-004', 1, 'Beras', 10000, 'kg', 'Ini adalah data beras'),
('BR-005', 1, 'Beras', 10000, 'kg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `nama_informasi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `nama_informasi`, `keterangan`, `created_at`, `status`, `id_user`) VALUES
(1, 'Promo', 'Milku Promo 2 Gratis 1 wrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrw', '2021-05-09 00:59:08', 1, 1),
(2, 'Promo', 'Minyak Bimoli Promo', '2021-05-09 00:28:04', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `status`) VALUES
(3, 'Minuman', 0),
(4, 'Makanan 123', 0),
(5, 'Mohammad Ilham', 0),
(6, 'Mohammad Ilham 123', 0),
(11, 'Mohammad Ilham', 0),
(14, 'Obat', 0),
(15, 'Mohammad ilham', 0),
(16, 'Ilham Teguh', 0),
(17, 'Makanan  Makanan', 0),
(18, 'Teguhriyadi', 0),
(21, 'Ramdan', 0),
(22, 'Romeo', 0),
(23, 'Rudolf', 0),
(24, 'Bawah', 0),
(25, 'Sahrul', 0),
(27, 'Fazri', 0),
(28, 'Ahmad In', 0),
(29, 'Rini', 0),
(30, 'RIyan', 0),
(31, 'Kardun', 0),
(32, 'Ahmad Out', 0),
(33, 'Rukun', 0),
(34, 'Riyadi', 0),
(42, 'Unpas', 0),
(43, 'Programming', 0),
(44, 'Fatimah', 0),
(45, 'Elang', 0),
(46, 'Udin', 0),
(47, 'Suripah', 0),
(48, 'Farhan', 0),
(49, 'Yanuar', 0),
(50, 'Fatur', 0),
(51, 'II', 0),
(52, 'Web Programming', 0),
(54, 'Pralienka', 0),
(55, 'Pro', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(191) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `nama`, `email`, `no_telepon`, `created_at`, `keterangan`) VALUES
(1, 'Mohammad Ilham', 'ilham@gmail.com', '12345', '2013-05-21 13:39:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(100) NOT NULL,
  `nama_supplier` varchar(191) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `no_telepon`, `keterangan`, `status`) VALUES
('12345', 'Ahmad Fauzi', '122345', 'Pocari Sweat', 1),
('S002346', 'Mohammad Ilham Teguhriyadi 500', '38493483', 'Pocari Sweat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `id_transaksi` int(100) NOT NULL,
  `kode_barang` varchar(100) DEFAULT NULL,
  `stok` int(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `kode_supplier` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`id_transaksi`, `kode_barang`, `stok`, `tanggal`, `status`, `kode_supplier`) VALUES
(2, 'BR-003', 5, '2021-05-12 14:18:45', 1, '12345'),
(3, 'BR-004', 2, '2021-05-12 14:18:54', 1, 'NULL'),
(4, 'BR-004', 1, '2021-05-12 14:26:02', 0, 'NULL'),
(5, 'BR-004', 1, '2021-05-12 14:29:46', 0, 'NULL'),
(6, 'BR-005', 5, '2021-05-12 14:31:45', 1, ''),
(7, 'BR-003', 1, '2021-05-12 16:50:56', 0, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `last_login`, `level`) VALUES
(1, 'asep', 'asep@gmail.com', '$2y$10$DpnuIU40//TNnyK/6mgitO.G9zuHlF1Px51xqhbmOG4BDbrMa2Ab2', '2021-05-10 13:51:04', '2021-05-12 01:58:20', '2021-05-13 20:58:23', 'admin'),
(11, 'kasir', 'kasir@gmail.com', '$2y$10$t.0lzV8R/i9KVjjyeYatS.pKCY5pjSe3mAW0Y.lNq3iKbCqR3BddS', '2021-05-12 02:47:00', '2021-05-12 02:47:00', '2021-05-12 09:47:52', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
