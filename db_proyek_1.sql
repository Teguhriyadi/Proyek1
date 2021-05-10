-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2021 pada 12.05
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
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `id_kategori`, `nama_barang`, `harga`, `satuan`, `keterangan`) VALUES
('BR-003', 4, 'Terigu 1/2', 1500, 'setengah', 'e'),
('BR-004', 1, 'Beras', 10000, 'kg', 'Ini adalah data beras'),
('BR-005', 1, 'Beras', 10000, 'kg', '1'),
('BR-006', 4, 'Bon Cabe', 1000, 'pcs', 'Ini Adalah data bon cabe'),
('BR-007', 1, 'Kecap Bango', 5000, 'pcs', 'Data Kecap Bango');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `nama_informasi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `nama_informasi`, `keterangan`, `created_at`, `status`, `id_user`) VALUES
(1, 'Promo', 'Milku Promo 2 Gratis 1 wrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrwrw', '2021-05-09 00:59:08', 0, 1),
(2, 'Promo', 'Minyak Bimoli Promo', '2021-05-09 00:28:04', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sembako'),
(3, 'Minuman'),
(4, 'Makanan 123'),
(5, 'Mohammad Ilham'),
(6, 'Bayar PDH'),
(10, 'Buah - Buahan 123'),
(11, 'Mohammad Ilham');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(191) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `no_telepon`, `keterangan`, `status`) VALUES
('KS-003', 'M Ilham  ', '76543113131', 'Supplier Minuman Mizone', 1),
('SU-006', 'Sahrul Fazri Udin', '8582932893', 'Data Supplier Barang', 1),
('SU-007', 'Ahmad Hidayat Hendrayawan 123', '1234567', 'Ini adalah Data Ahmad Hidayat', 1),
('SU-008', 'Ahmad Budiman', '12345', 'Data Supplier Ahmad Budiman', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `id_transaksi` int(100) NOT NULL,
  `kode_barang` varchar(100) DEFAULT NULL,
  `stok` int(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`id_transaksi`, `kode_barang`, `stok`, `tanggal`, `status`) VALUES
(6, 'BR-003', 3, '2021-05-09 06:09:39', 1),
(7, 'BR-004', 1, '2021-05-06 23:28:40', 1),
(8, 'BR-003', 1, '2021-05-06 23:37:30', 0),
(9, 'BR-003', 1, '2021-05-06 23:40:50', 1),
(10, 'BR-005', 2, '2021-05-06 23:47:58', 1),
(12, 'BR-004', 4, '2021-05-09 05:25:35', 1),
(13, 'BR-005', 1, '2021-05-09 05:37:26', 0),
(14, 'BR-005', 1, '2021-05-09 05:37:33', 0),
(15, 'BR-005', 1, '2021-05-09 06:32:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` datetime DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `last_login`, `level`) VALUES
(1, 'ilham', 'ilham@gmail.com', 'ilham', '2021-05-10 09:56:44', '2021-04-29 09:44:03', '2021-05-10 16:56:44', 'admin'),
(2, 'admin', 'ilham.teguh55@gmail.com', '', '2021-05-06 15:39:13', '2021-05-06 10:39:13', '2021-05-06 17:39:13', 'admin'),
(3, 'farhan', 'farhan@gmail.com', 'farhan', '2021-05-09 01:07:11', '2021-05-06 19:22:58', '2021-05-09 08:07:11', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

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
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
