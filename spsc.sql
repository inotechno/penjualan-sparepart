-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2020 pada 04.13
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spsc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `foto` text NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `id_kategori`, `nama_barang`, `deskripsi`, `stok`, `harga`, `foto`, `create_by`, `create_at`, `status`) VALUES
(1, 909927981, 1, 'Knalpot Sintetis Anti Panas', '', 14, 20000, '909927981.jpg', 1, '2020-07-11 11:56:55', 1),
(2, 909927982, 2, 'Gear Sintetis Anti Panas', '', 14, 20000, '909927981.jpg', 1, '2020-07-11 11:56:55', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `icon`, `color`) VALUES
(1, 'Knalpot', '', '#F80000'),
(2, 'Gear', '', '#0000F8'),
(3, 'Oke', '', ''),
(4, 'Test', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `link` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `warna` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `link`, `icon`, `sub_menu`, `level`, `warna`) VALUES
(1, 'Dashboard', 'Dashboard', 'fa fa-dashboard', 0, 1, 'text-success'),
(3, 'Kategori Barang', 'kategori_barang', 'fa fa-ravelry\r\n', 0, 1, 'text-secondary'),
(4, 'Barang Dijual', 'barang_dijual', 'fa fa-product-hunt\r\n', 0, 1, 'text-secondary'),
(6, 'Transaksi Pending', 'transaksi_pending', 'fa fa-stumbleupon-circle\r\n', 0, 1, 'text-secondary'),
(7, 'Transaksi Sukses', 'transaksi_sukses', 'fa fa-flag-checkered\r\n', 0, 1, 'text-secondary'),
(8, 'Dashboard', 'Dashboard', 'fa fa-dashboard', 0, 3, 'text-success'),
(9, 'Daftar Produk', 'produk', 'fa fa-product-hunt\r\n', 0, 3, 'text-secondary'),
(10, 'Transaksi Pending', 'transaksi_pending', 'fa fa-stumbleupon-circle\r\n', 0, 3, 'text-secondary'),
(11, 'Transaksi Sukses', 'transaksi_sukses', 'fa fa-flag-checkered\r\n', 0, 3, 'text-secondary'),
(12, 'Dashboard', 'Dashboard', 'fa fa-dashboard', 0, 2, 'text-success'),
(13, 'Barang Dijual', 'barang_dijual', 'fa fa-product-hunt\r\n', 0, 2, 'text-secondary'),
(14, 'Transaksi Pending', 'transaksi_pending', 'fa fa-stumbleupon-circle\r\n', 0, 2, 'text-secondary'),
(15, 'Transaksi Sukses', 'transaksi_sukses', 'fa fa-flag-checkered\r\n', 0, 2, 'text-secondary');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `id_barang`, `jumlah`, `id_konsumen`, `date`, `status_transaksi`) VALUES
(7, 1407200001, 1, 2, 3, '2020-01-15 14:55:25', 1),
(8, 1407200002, 2, 10, 3, '2020-07-15 14:55:25', 1),
(9, 1407200002, 2, 5, 3, '2020-08-15 14:55:25', 1),
(10, 1407200002, 1, 10, 3, '2020-12-15 14:55:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `password`, `status`, `id_level`, `foto`) VALUES
(2, 'Bambang', 'Ismoyo', 'bambang20@gmail.com', '3ed380796c452fce7901ef7777e56efbac2a73f8eff50f74cd1424f3a0767b9791d29f5c2a902c9111c61bd36506e2d92f3b373d13ba929d240b7df72714c501', '1', 3, ''),
(3, 'Admin', '', 'admin@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '1', 1, ''),
(4, 'Manajer', 'Yamaha', 'manajer@gmail.com', '0ae02c00d2b1196589a5be37f718fbeec0c6f07968f90f41dbc2b167fdd919f57e9616c08130157ed4a22f7f7cae387276d456d01a98310f1b1d5f00999d5cb0', '1', 2, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `nama_akses` varchar(30) NOT NULL,
  `link` varchar(35) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`id`, `nama_akses`, `link`, `level`) VALUES
(1, 'Administrator', 'admin', 1),
(2, 'Manajer', 'manajer', 2),
(3, 'Konsumen', 'konsumen', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
