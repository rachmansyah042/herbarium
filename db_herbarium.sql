-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 Agu 2019 pada 17.10
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_herbarium`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `familia`
--

CREATE TABLE `familia` (
  `id_familia` int(11) UNSIGNED NOT NULL,
  `familia` varchar(255) NOT NULL,
  `total_herbarium` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `id_user` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `familia`
--

INSERT INTO `familia` (`id_familia`, `familia`, `total_herbarium`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'Olacaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(2, 'Primulaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(3, 'Rhizophoraceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(4, 'Rubiaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(5, 'Urticaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(6, 'Ebenaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(7, 'Euphorbiaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(8, 'Fabaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(9, 'Malvaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(10, 'Myrtaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(11, 'Dipterocarpaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(12, 'Acanthaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(13, 'Achariaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(14, 'Anacardiaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(15, 'Annonaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00'),
(16, 'Combretaceae', 0, 2, '2019-08-20 00:00:00', '2019-08-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `herbarium`
--

CREATE TABLE `herbarium` (
  `id_herbarium` int(11) NOT NULL,
  `id_familia` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `genus` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `local_name` varchar(255) NOT NULL,
  `herbarium_pic` varchar(255) NOT NULL,
  `real_pic` mediumblob NOT NULL,
  `leaf_morphology` mediumblob NOT NULL,
  `collection_num` varchar(255) NOT NULL,
  `collection_date` date NOT NULL,
  `location` text NOT NULL,
  `habitat_type` varchar(255) NOT NULL,
  `collector` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`, `created_at`, `updated_at`) VALUES
(1, 'super admin', '2019-08-01 00:00:00', '2019-08-08 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_role` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `username`, `password`, `name`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'aku', '2019-08-01 00:00:00', '2019-08-29 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id_familia`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `herbarium`
--
ALTER TABLE `herbarium`
  ADD PRIMARY KEY (`id_herbarium`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_familia` (`id_familia`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `familia`
--
ALTER TABLE `familia`
  MODIFY `id_familia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `herbarium`
--
ALTER TABLE `herbarium`
  MODIFY `id_herbarium` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `familia`
--
ALTER TABLE `familia`
  ADD CONSTRAINT `fk_familia_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `herbarium`
--
ALTER TABLE `herbarium`
  ADD CONSTRAINT `fk_herbarium_familia` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id_familia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_herbarium_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
