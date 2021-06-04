-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jun 2021 pada 03.01
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(100) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_barang` varchar(191) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `id_kategori`, `nama_barang`, `harga`, `satuan`, `keterangan`, `foto`) VALUES
('BR-001', 2, 'good time', 5000, 'pcs', 'good time', '60b900c4506c1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `status`) VALUES
(2, 'Makanan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'nurhanifah', '$2y$10$aRgOitqZxsqfrk0qngOIBOv0bb7rSSP0pobJarKrC5BysDpTmoYBK', 'Siti Nurhanifah', '12345', 'Bandung Raya'),
(2, 'ilham123@gmail.com', '$2y$10$.ADclAUhpHhbmLarvEW20ePGiDVfMUrYRHj3Q8S66oqGUBWYV/9h6', 'Mohammad Ilham Teguhriyadi', '12912', 'Jakarta Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(100) NOT NULL,
  `id_pembelian` int(100) DEFAULT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama_pelanggan`, `bank`, `jumlah`, `tanggal`, `bukti_pembayaran`) VALUES
(1, 2, 'Siti Nurhanifah', 'PT. IO - Keeper / No. Rek : 12345678910', 10000, '2021-06-03 00:00:00', '20210603183221WhatsApp Image 2021-06-03 at 00.40.02.jpeg'),
(2, 2, 'Siti Nurhanifah', 'PT. IO - Keeper / No. Rek : 12345678910', 10000, '2021-06-03 00:00:00', '20210603183221WhatsApp Image 2021-06-03 at 00.40.02.jpeg'),
(3, 3, 'Mohammad Ilham Teguhriyadi', 'PT. IO - Keeper / No. Rek : 12345678910', 10000, '2021-06-04 00:00:00', '20210604021437fast.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `id_ongkir` int(100) NOT NULL,
  `tanggal_pembelian` datetime DEFAULT NULL,
  `total_pembelian` double DEFAULT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` double DEFAULT NULL,
  `alamat_pengiriman` text,
  `status_pembelian` varchar(50) DEFAULT 'pending',
  `resi_pengiriman` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 8, 2, '2021-06-03 23:25:00', 10000, 'Bandung', 5000, 'Bandung', 'pending', NULL),
(2, 1, 2, '2021-06-03 23:31:34', 10000, 'Bandung', 5000, 'Bandung', 'sudah kirim pembayaran', NULL),
(3, 2, 2, '2021-06-04 07:14:08', 10000, 'Bandung', 5000, 'Jakarta Raya', 'barang_dikirim', 12345);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id_pembelian_barang` int(100) NOT NULL,
  `id_pembelian` int(100) DEFAULT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `jumlah` int(50) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id_pembelian_barang`, `id_pembelian`, `kode_barang`, `jumlah`, `nama_barang`, `harga`) VALUES
(1, 1, 'BR-001', 1, 'good time', 5000),
(2, 2, 'BR-001', 1, 'good time', 5000),
(3, 3, 'BR-001', 1, 'good time', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_ongkir` int(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(2, 'Bandung', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(100) NOT NULL,
  `nama_supplier` varchar(191) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_barang`
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
-- Dumping data untuk tabel `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`id_transaksi`, `kode_barang`, `stok`, `tanggal`, `status`, `kode_supplier`) VALUES
(1, 'BR-001', 5, '2021-06-03 23:18:55', 1, 'NULL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `last_login`, `level`) VALUES
(1, 'asep', 'asep@gmail.com', '$2y$10$DpnuIU40//TNnyK/6mgitO.G9zuHlF1Px51xqhbmOG4BDbrMa2Ab2', '2021-05-10 13:51:04', '2021-05-12 01:58:20', '2021-05-21 09:14:26', 'admin'),
(11, 'kasir', 'kasir@gmail.com', '$2y$10$t.0lzV8R/i9KVjjyeYatS.pKCY5pjSe3mAW0Y.lNq3iKbCqR3BddS', '2021-05-12 02:47:00', '2021-05-12 02:47:00', '2021-05-12 09:47:52', 'kasir'),
(12, 'admin', 'admin@gmail.com', '$2y$10$SMEq17t5nbT4gQ.t4idi..j9XJNOmeVTCbN7RaCiCo3sZasTVbQxC', '2021-05-21 01:17:24', '2021-05-21 01:17:24', '2021-06-04 07:16:22', 'admin'),
(14, 'indah', 'indah@gmail.com', '$2y$10$ewNf1i.i/8Ypa5sI7zPUkumzYppTXUacftpRWUUk3zgqBivxo1A1i', '2021-06-03 16:37:11', '2021-06-03 16:37:11', '0000-00-00 00:00:00', 'informan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id_pembelian_barang`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pembelian_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_ongkir` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
