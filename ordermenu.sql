-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2019 pada 01.03
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordermenu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `event_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `user_id`, `content`, `event_date`) VALUES
(1, 1, 'melakukan login', '2019-02-16 07:53:55'),
(3, 1, 'melakukan update data menu Es Durian', '2019-02-16 08:03:16'),
(5, 1, 'melakukan delete data menu Es%20Durian', '2019-02-16 08:23:33'),
(6, 1, 'melakukan delete data menu Ayam Geprek Krispi', '2019-02-16 08:37:25'),
(7, 1, 'melakukan login', '2019-02-16 11:30:09'),
(8, 1, 'melakukan update data menu Ayam Geprek Keju', '2019-02-16 12:29:25'),
(9, 1, 'melakukan login', '2019-02-16 17:18:17'),
(10, 1, 'melakukan penambahan pesanan no pesananERP16022019-002', '2019-02-16 18:21:53'),
(11, 1, 'melakukan penambahan pesanan no pesananERP16022019-003', '2019-02-16 18:23:24'),
(12, 1, 'melakukan penambahan pesanan no pesanan ERP16022019-004', '2019-02-16 18:24:58'),
(13, 1, 'melakukan penambahan menu Es Durian', '2019-02-16 18:27:19'),
(14, 1, 'melakukan penambahan pesanan no pesanan ERP16022019-005', '2019-02-16 18:50:59'),
(15, 1, 'melakukan delete pesanan dengan no pesanan ERP16022019-005', '2019-02-16 18:56:25'),
(16, 1, 'melakukan delete pesanan dengan no pesanan ERP16022019-005', '2019-02-16 18:57:42'),
(17, 1, 'melakukan update data menu Ayam Geprek Keju', '2019-02-16 18:59:20'),
(18, 1, 'melakukan login', '2019-02-17 01:00:51'),
(19, 1, 'melakukan login', '2019-02-17 05:09:01'),
(20, 1, 'melakukan update data pesanan 0', '2019-02-17 05:14:08'),
(21, 1, 'melakukan update data pesanan 0', '2019-02-17 05:16:08'),
(22, 1, 'melakukan update data pesanan 0', '2019-02-17 05:19:24'),
(23, 1, 'melakukan update data pesanan ERP16022019-004', '2019-02-17 05:20:44'),
(24, 2, 'melakukan login', '2019-02-17 05:43:09'),
(25, 1, 'melakukan login', '2019-02-17 06:52:27'),
(26, 1, 'melakukan login', '2019-02-18 00:57:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `change_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `name`, `price`, `change_by`, `created_at`, `updated_at`, `flag`) VALUES
(1, 'Ayam Geprek Keju', 13000, 1, '2019-02-14 00:00:00', '2019-02-16 18:59:20', 1),
(7, 'Ayam Geprek Krispi', 13000, 1, '2019-02-16 11:47:18', '0000-00-00 00:00:00', 1),
(8, 'Es Durian', 10000, 1, '2019-02-16 11:47:33', '0000-00-00 00:00:00', 0),
(9, 'Es Durian', 10000, 1, '2019-02-16 18:27:19', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` varchar(15) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `no_table` int(11) NOT NULL,
  `owner_by` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `arr_menu` text,
  `total` float DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `name`, `no_table`, `owner_by`, `flag`, `arr_menu`, `total`, `created_at`, `updated_at`) VALUES
('ERP16022019-004', 'ass', 0, 1, 0, '1,7', 26000, '2019-02-16 18:24:58', '2019-02-17 05:20:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'alim', '2019-02-14 00:00:00', '2019-02-14 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Admin', '2019-02-14 00:00:00', '2019-02-14 00:00:00'),
(2, 'kasir', '2019-02-17 00:00:00', '2019-02-17 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `profile_id`, `status_id`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, NULL, NULL, '2019-02-18 00:57:45'),
(2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 1, 2, NULL, NULL, '2019-02-17 05:43:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_fk0` (`user_id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_fk0` (`change_by`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `order_fk0` (`owner_by`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_fk0` (`profile_id`),
  ADD KEY `user_fk1` (`status_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_fk0` FOREIGN KEY (`change_by`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_fk0` FOREIGN KEY (`owner_by`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_fk0` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`),
  ADD CONSTRAINT `user_fk1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
