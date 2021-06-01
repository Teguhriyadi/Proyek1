-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2021 pada 17.18
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
('BR-002', 2, 'Bon Cabe', 1500, 'pcs', 'Data Barang Bon cabe', '60afbefe59dd1.jpg'),
('BR-003', 2, 'Mie goreng', 3000, 'pcs', 'Data Barang Mie ', '60afbf148f7bf.png'),
('BR-004', 3, 'Pocari Sweat', 7000, 'pcs', 'Data Barang Minuman pocari', '60afbf2e3fafb.jpg'),
('BR-006', 2, 'Mizone', 5000, 'kg', 'Data keterangan mizone', '60afbf4b1aa31.jpg'),
('BR-007', 0, 'Tepung Terigu', 16500, 'kg', '', '60afc3faae634.jpg'),
('BR-008', 0, 'Teh Gelas', 1000, 'pcs', '', '60afc42429db9.jpg'),
('BR-009', 0, 'Goodtime', 2000, 'pcs', '', '60afc441d767d.jpg'),
('BR-010', 0, 'Gula Pasir', 3500, 'tiga_per_empat', '', '60afc4632898f.jpg'),
('BR-011', 0, 'Minyak Goreng', 27700, 'ml', '', '60afc4b6e7beb.jpg'),
('BR-012', 0, 'Beras', 10500, 'kg', '', '60afc50fe1d81.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `nama_informasi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Sembako', 0),
(3, 'Minuman', 0),
(6, 'Makanan', 0),
(7, 'beras', 0);

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
(1, 'ilham@gmail.com', '', '', '', 'Villa intan'),
(2, 'hame@gmail.com', 'hame', '', '', 'Bandung Raya'),
(3, 'uz@gmail.com', '$2y$10$3BQNwHCo874qltw9C38rSe/OfqrjeoefcRI4JQhkCHD.j/G3C1Rza', 'Ahmad Fauzi', '123', 'Jakarta Barat'),
(4, '123', '$2y$10$s5SYGwuYYd/JgeCu/uvMV.hJBd0M64yR.KGLyiptf1pRy5LIctxIG', '123', '123', '123'),
(5, '555@gmail.com', '$2y$10$BmC7t8wmEMFTbEi5Z.lF0OxTuDi63LknDDYutAWlTE0VIHbTS9Ry.', '555', '555', '555'),
(6, 'beben@gmail.com', '$2y$10$xKiBaSa.wo9X1wOUyZTcJ.t6Ye5lgrOZjWLUnHS03SPwR7VFLkBOy', '555', '555', '555'),
(7, 'teguh@gmail.com', '$2y$10$KmyCwn/./drnVGGtxrJ80OFwrtY3are0ur18oN8rrIwSt2umc9/fq', 'teguh@gmail.com', 'teguh@gmail.com', 'teguh@gmail.com'),
(8, 'siti@gmail.com', '$2y$10$0VKGQMyX83/mBi8w0ODAo.C8GGjfvcXQXPOdWGxxGw2f55tepZQ7m', 'siti', '1312', 'Bandung Raya'),
(9, 'ben123', '$2y$10$2WXxl3CLGgvU0Db0GnyPQuY8HBZXuch8f030SCdqWE18LPbnI.bKa', 'ben123', 'ben123', 'Bandung raya'),
(10, 'user', '$2y$10$JlovdjS/lzhAvFNMNuMyLOtKHarStrVehV.eBml1P6VqeEqegEwV2', 'user', '12324', 'cirebon'),
(11, '29092002@gmail.com', '$2y$10$/Mhq2b5RuxpCmwtaE45VQO.tqR9ECuaXtlFSX3uxhdCkNzMs6qmci', 'Ahmad', '123', 'Bandung');

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
(1, 1, 'Mohammad Ilham Teguhriyadi', 'PT. Jaya Abadi', 6000, '2021-05-27 00:00:00', '20210527164656gambar-2.jpeg'),
(2, 2, 'Mohammad Ilham Teguhriyadi', 'PT. Jaya Abadi', 10000, '2021-05-27 00:00:00', '20210527170908gambar-7.jpg');

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
(1, 8, 3, '2021-05-27 21:46:35', 6000, 'Semarang', 5000, 'Bandung Raya', 'sudah kirim pembayaran', NULL),
(2, 11, 3, '2021-05-27 22:07:12', 10000, 'Semarang', 5000, 'Jalan Tirtamaya', 'sudah kirim pembayaran', NULL),
(3, 8, 2, '2021-05-27 22:11:36', 83000, 'Jakarta', 80000, 'Bandung', 'pending', NULL),
(4, 8, 2, '2021-05-29 22:52:07', 153700, 'Jakarta', 80000, 'Bandung Raya', 'pending', NULL);

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
(1, 1, 'BR-002', 1, 'Bon Cabe', 1000),
(2, 2, 'BR-002', 2, 'Bon Cabe', 1000),
(3, 2, 'BR-001', 1, 'Mie Sakura', 3000),
(4, 3, 'BR-001', 1, 'Mie Sakura', 3000),
(5, 4, 'BR-004', 2, 'Pocari Sweat', 7000),
(6, 4, 'BR-010', 1, 'Gula Pasir', 3500),
(7, 4, 'BR-012', 1, 'Beras', 10500),
(8, 4, 'BR-002', 1, 'Bon Cabe', 1500),
(9, 4, 'BR-007', 1, 'Tepung Terigu', 16500),
(10, 4, 'BR-011', 1, 'Minyak Goreng', 27700);

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
(2, 'Jakarta', 80000),
(3, 'Semarang', 5000),
(4, 'Bandung', 10000),
(5, 'Solo', 20000),
(6, 'Banyuwangi', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
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
('S0001', 'Ahmad Fauzi', '12355', 'Data Supplier Pocari Sweat', 1);

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
(1, 'BR-001', 3, '2021-05-21 08:42:46', 1, 'S0001'),
(2, 'BR-002', 5, '2021-05-21 09:10:34', 1, 'S0001'),
(3, 'BR-003', 5, '2021-05-21 09:13:29', 1, 'NULL'),
(4, 'BR-003', 4, '2021-05-21 09:13:52', 0, 'NULL'),
(5, 'BR-004', 4, '2021-05-21 09:17:32', 1, 'NULL'),
(6, 'BR-004', 3, '2021-05-21 09:18:01', 0, 'NULL'),
(7, 'BR-006', 3, '2021-05-27 22:23:56', 1, 'NULL'),
(8, 'BR-003', 6, '2021-05-27 22:37:17', 1, 'NULL'),
(9, 'BR-004', 11, '2021-05-27 22:37:24', 1, 'NULL'),
(10, 'BR-006', 6, '2021-05-27 22:37:37', 1, 'NULL'),
(11, 'BR-007', 4, '2021-05-27 23:14:25', 1, 'NULL'),
(12, 'BR-008', 36, '2021-05-27 23:14:41', 1, 'NULL'),
(13, 'BR-009', 24, '2021-05-27 23:15:03', 1, 'NULL'),
(14, 'BR-010', 11, '2021-05-27 23:15:34', 1, 'NULL'),
(15, 'BR-011', 22, '2021-05-27 23:15:49', 1, 'NULL'),
(16, 'BR-012', 30, '2021-05-27 23:16:00', 1, 'NULL');

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
(12, 'admin', 'admin@gmail.com', '$2y$10$SMEq17t5nbT4gQ.t4idi..j9XJNOmeVTCbN7RaCiCo3sZasTVbQxC', '2021-05-21 01:17:24', '2021-05-21 01:17:24', '2021-06-01 16:01:42', 'admin');

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
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

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
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pembelian_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_ongkir` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
