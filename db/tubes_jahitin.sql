-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2022 pada 15.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_jahitin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(128) NOT NULL,
  `deskripsi_layanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `deskripsi_layanan`) VALUES
(1, 'Rombak', 'Merubah Pakaian Sesuai Keinginan Pelanggan'),
(2, 'Potong', 'Bisa berbagai produk'),
(3, 'Jahit', 'Menjahit Berbagai Jenis Pakaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pengambilan` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `jumlah_pesanan` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `id_pengambilan`, `id_pengiriman`, `tgl_pesan`, `tgl_selesai`, `jumlah_pesanan`, `total_bayar`, `id_status`) VALUES
(4, 0, 1, 1, '2021-12-02 00:00:00', '0000-00-00 00:00:00', 0, 65000, 0),
(5, 0, 1, 1, '2021-12-06 00:00:00', '0000-00-00 00:00:00', 0, 65000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `nama_pemilik_rek` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `tgl_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` varchar(255) NOT NULL,
  `status_pembayaran` varchar(128) NOT NULL,
  `status_pesanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_invoice`, `nama_pemilik_rek`, `bukti_pembayaran`, `tgl_bayar`, `keterangan`, `status_pembayaran`, `status_pesanan`) VALUES
(14, 0, 'Anthea Safana', 'Anthea Safana.jpg', '2021-12-30 04:58:37', '-', 'Pending', 'Pending'),
(22, 0, 'Zahra Nurdyani', NULL, '2021-12-30 05:09:01', '-', 'Pembayaran Diterima', 'Pesanan Diproses'),
(23, 0, 'B', NULL, '2022-06-08 11:25:17', 'H', 'Menunggu Verifikasi', 'Menunggu Pembayaran'),
(24, 0, 'B', NULL, '2022-06-21 14:28:48', '-', 'Menunggu Verifikasi', 'Menunggu Pembayaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjahit`
--

CREATE TABLE `penjahit` (
  `id_penjahit` int(11) NOT NULL,
  `nama_penjahit` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pass2` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nomortelp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjahit`
--

INSERT INTO `penjahit` (`id_penjahit`, `nama_penjahit`, `username`, `password`, `pass2`, `jenis_kelamin`, `nomortelp`, `email`, `alamat`) VALUES
(2, 'Lisa', 'lalalisa', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', '0812345678', 'lalalalisa@gmail.com', 'Bandung'),
(25, 'Zahra Nurdyani', 'zahranrdy', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', '08999223344', 'ijah@gmail.com', 'Bandung'),
(27, 'Rose', 'Rosie', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', '081214872594', 'rose@gmail.com', 'GBA, Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_order` int(5) NOT NULL,
  `id_customer` int(5) NOT NULL,
  `nama_layanan` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jml_produk` int(5) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(5) NOT NULL,
  `pengiriman` int(5) NOT NULL,
  `status` int(5) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_produk` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(128) NOT NULL,
  `status_produk` varchar(100) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_produk`, `id_layanan`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `foto_produk`, `status_produk`, `data_created`) VALUES
(8, 1, 'Celana Denim Panjang ', 85000, 'Hanya untuk mengubah ukuran saja', 'celana_denim_panjang.png', 'Tersedia', '2021-10-27 17:01:35'),
(21, 2, 'Blouse / Atasan', 100000, 'Memiliki lapisan tambahan', 'blouse.png', 'Tersedia', '2021-10-27 17:09:59'),
(24, 3, 'Jaket', 100000, '-', 'jaket.png', 'Tidak Tersedia', '2021-11-13 07:47:19'),
(26, 3, 'Gamis ', 100000, '-', 'gamis.png', 'Tersedia', '2021-12-30 03:53:12'),
(27, 2, 'Kemeja', 50000, '-', 'kemeja.png', 'Tersedia', '2021-12-30 03:54:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `foto_review` varchar(255) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id_review`, `id_invoice`, `id_transaksi`, `komentar`, `rating`, `foto_review`, `data_created`) VALUES
(2, 1, 1, 'Bagus Banget', '5', '-', '2021-12-24 05:40:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `nama_pengorder` varchar(128) NOT NULL,
  `nomorhp_pengorder` varchar(128) NOT NULL,
  `email_pengorder` varchar(128) NOT NULL,
  `alamat_pengorder` varchar(128) NOT NULL,
  `id_layanan` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `nama_pengorder`, `nomorhp_pengorder`, `email_pengorder`, `alamat_pengorder`, `id_layanan`, `id_produk`) VALUES
(1, 'Zahra Nurdyani', '087884272060', 'nurdyanizahra@gmail.com', 'Bandung', 3, 4),
(2, 'Lisa', '08888888', 'lisa@gmail.com', 'Jakarta', 0, 0),
(5, 'Zahra Nurdyani', '0898989111', 'nurdyanizahra@gmail.com', 'Bandung', 0, 0),
(6, 'Zahra Nurdyani', '0898989111', 'nurdyanizahra@gmail.com', 'Bandung', 15, 14),
(7, 'Zahra Nurdyani', '08888888', 'nurdyanizahra@gmail.com', 'Jakarta', 3, 19),
(13, 'Dhiya Fauziyyah', '0812121213', 'dhiya@gmail.com', 'Bandung', 1, 22),
(16, 'Zahra Nurdyani', '087884272060', 'zahra@gmail.com', 'Buah Batu, Bandung', 3, 8),
(17, 'Anthea', '0812121213', 'anthea@gmail.com', 'Bandung', 2, 8),
(19, 'Zahra Nurdyani', '0898989111', 'nurdyanizahra@gmail.com', 'Bandung', 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `nomor_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `nomor_telp`) VALUES
(1, 'Surya Tailor', NULL, 'Jl. Waas Rt 01 Rw 01 Kab. Bandung', '081214108223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama_pengorder` varchar(128) NOT NULL,
  `nomorhp_pengorder` varchar(128) NOT NULL,
  `email_pengorder` varchar(128) NOT NULL,
  `alamat_pengorder` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `pengambilan` varchar(128) NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  `pengiriman` varchar(128) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `nama_pengorder`, `nomorhp_pengorder`, `email_pengorder`, `alamat_pengorder`, `keterangan`, `pengambilan`, `tgl_pengambilan`, `pengiriman`, `tgl_pengiriman`, `metode_pembayaran`) VALUES
(42, 'Anthea Safana', '0898989111', 'antheasafana@gmail.com', 'Bandung', '-', 'Ambil Sendiri', '2021-12-29', 'Antar', '2021-12-29', 'Transfer Bank'),
(43, 'Dhiya Fauziyyah', '0898989111', 'dhiyaf@gmail.com', 'Bandung', '-', 'Ambil Sendiri', '2021-12-30', 'Antar', '2021-12-30', 'Transfer Bank'),
(44, 'Lisa', '08888888', 'lisa@gmail.com', 'Jakarta', '-', 'Ambil Sendiri', '2021-12-30', 'Ambil Sendiri', '2021-12-30', 'Transfer Bank'),
(45, 'Coba', '08888888', 'rose@gmail.com', 'Jakarta', '-', 'Ambil Sendiri', '2021-12-30', 'Ambil Sendiri', '2021-12-30', 'Transfer Bank'),
(46, 'Zahra Nurdyani', '08888888', 'nurdyanizahra@gmail.com', 'Bandung', 'Ukuran M', 'Ambil Sendiri', '2021-12-30', 'Ambil Sendiri', '2021-12-31', 'Transfer Bank'),
(47, 'ja', '0813-3319-9050', 's@gmail.com', 'JL. RAYA SUMBERSARI 303 MALANG', 'f', 'Ambil Sendiri', '2022-05-23', 'Ambil Sendiri', '2022-05-23', 'Transfer Bank'),
(48, 'ja', '0813-3319-9050', 's@gmail.com', 'JL. RAYA SUMBERSARI 303 MALANG', 'B', 'Ambil Sendiri', '2022-06-08', 'Antar', '2022-06-08', 'Transfer Bank'),
(49, 'Zahra', '08111111', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', 'Ukuran M', 'Ambil Sendiri', '2022-06-12', 'Antar', '2022-06-23', 'Transfer Bank'),
(50, 'Zahra', '0813-3319-9050', 'z@gmail.com', 'JL. RAYA SUMBERSARI 303 MALANG', 'Ukuran M', 'Antar', '2022-06-22', 'Antar', '2022-06-28', 'Transfer Bank'),
(51, 'Zahra', '0813-3319-9050', 'z@gmail.com', 'JL. RAYA SUMBERSARI 303 MALANG', 'Ukuran M', 'Antar', '2022-06-22', 'Antar', '2022-06-28', 'Transfer Bank'),
(52, 'Amel', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Ambil Sendiri', '2022-06-22', 'Ambil Sendiri', '2022-06-23', 'Transfer Bank'),
(53, 'Amel', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Ambil Sendiri', '2022-06-22', 'Ambil Sendiri', '2022-06-23', 'Transfer Bank'),
(54, 'Amel', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Ambil Sendiri', '2022-06-22', 'Antar', '2022-06-24', 'Transfer Bank'),
(55, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-22', 'Antar', '2022-06-22', 'Transfer Bank'),
(56, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-22', 'Antar', '2022-06-22', 'Transfer Bank'),
(57, 'Zahra', '0813-3319-9050', 's@gmail.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-22', 'Antar', '2022-06-22', 'Transfer Bank'),
(58, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Ambil Sendiri', '2022-06-22', 'Antar', '2022-06-23', 'Transfer Bank'),
(59, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-22', 'Antar', '2022-06-22', 'Transfer Bank'),
(60, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-22', 'Antar', '2022-06-21', 'Transfer Bank'),
(61, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(62, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(63, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(64, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(65, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(66, 'Amel', '0813-3319-9050', 's@gmail.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(67, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(68, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(69, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(70, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(71, 'Amel', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank'),
(72, 'Zahra', '0813-3319-9050', 'z@gamil.com', 'JL. RAYA SUMBERSARI 303 MALANG', '-', 'Antar', '2022-06-21', 'Antar', '2022-06-21', 'Transfer Bank');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_invoice`, `id_produk`, `nama_produk`, `jumlah`, `harga`, `data_created`) VALUES
(33, 42, 8, 'Celana Denim Panjang ', 1, 85000, '2021-12-29 07:23:37'),
(34, 42, 24, 'Jaket', 1, 100000, '2021-12-29 07:23:37'),
(35, 43, 24, 'Jaket', 1, 100000, '2021-12-30 01:50:41'),
(36, 44, 26, 'Gamis ', 1, 100000, '2021-12-30 03:55:26'),
(37, 44, 27, 'Kemeja', 1, 50000, '2021-12-30 03:55:26'),
(38, 45, 8, 'Celana Denim Panjang ', 1, 85000, '2021-12-30 04:06:58'),
(39, 46, 26, 'Gamis ', 1, 100000, '2021-12-30 05:04:12'),
(40, 46, 8, 'Celana Denim Panjang ', 1, 85000, '2021-12-30 05:04:12'),
(41, 47, 26, 'Gamis ', 1, 100000, '2022-05-23 10:50:34'),
(42, 48, 27, 'Kemeja', 1, 50000, '2022-06-08 11:24:30'),
(43, 49, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-11 03:31:08'),
(44, 50, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 04:47:52'),
(45, 51, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 04:49:11'),
(46, 52, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 05:33:23'),
(47, 53, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 05:34:12'),
(48, 54, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 09:35:45'),
(49, 55, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 09:51:19'),
(50, 56, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:11:29'),
(51, 57, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:15:55'),
(52, 58, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:39:29'),
(53, 59, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:44:59'),
(54, 60, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:49:38'),
(55, 61, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:51:00'),
(56, 62, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:55:32'),
(57, 63, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 10:56:50'),
(58, 64, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 12:56:12'),
(59, 65, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 13:45:20'),
(60, 66, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 13:46:31'),
(61, 67, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 13:50:17'),
(62, 68, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 13:52:36'),
(63, 69, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 13:53:54'),
(64, 70, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 13:57:30'),
(65, 71, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 13:59:12'),
(66, 72, 8, 'Celana Denim Panjang ', 1, 85000, '2022-06-21 14:00:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `id_role`, `password`) VALUES
(2, 'zahranrdy', 'Zahra Nurdyani', 'nurdyanizahra@gmail.com', 3, '1234'),
(8, 'coba', 'coba coba', 'coba@gmail.com', 1, '1234'),
(9, 'user', 'user', 'user@gmail.com', 2, '1234'),
(14, 'AntheaSaf', 'Anthea Safana', 'anthea@gmail.com', 2, '1234'),
(15, 'Dhiyaf', 'Dhiya Fauziyyah', 'dhiyaf@gmail.com', 3, '1234'),
(16, 'Zahra', 'Zahra Nurdyani', 'nurdyanizahra@gmail.com', 2, '1234'),
(17, 'Penjahit', 'penjahit', 'penjahit@gmail.com', 3, '1234'),
(18, 'mell', 'Amelia Millati Azka', 'ameliamillati@student.telkomuniversity.ac.id', 2, '1234'),
(19, 'admin', 'admin', 'admin@gmail.com', 3, '1234');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `nama_layanan` (`nama_layanan`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `penjahit`
--
ALTER TABLE `penjahit`
  ADD PRIMARY KEY (`id_penjahit`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `nama_produk` (`nama_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `penjahit`
--
ALTER TABLE `penjahit`
  MODIFY `id_penjahit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `product` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
