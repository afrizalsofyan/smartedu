-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Mar 2018 pada 07.47
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartedu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(24) NOT NULL,
  `judul_iklan` text NOT NULL,
  `judul_buku` text NOT NULL,
  `penerbit` varchar(24) NOT NULL,
  `penulis` varchar(24) NOT NULL,
  `pemilik_buku` varchar(30) NOT NULL,
  `id_detail_buku` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_buku`
--

CREATE TABLE `detail_buku` (
  `id_detail_buku` varchar(24) NOT NULL,
  `kategori` varchar(1024) NOT NULL,
  `sinopsis` text NOT NULL,
  `foto_buku` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_mentor`
--

CREATE TABLE `detail_mentor` (
  `username` varchar(24) DEFAULT NULL,
  `id_detail_mentor` varchar(16) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `matakuliah` enum('Kalkulus','Fisika','Kimia') NOT NULL,
  `transkrip_nilai` varchar(32) NOT NULL,
  `video_singkat` varchar(32) NOT NULL,
  `no_rekening` varchar(24) NOT NULL,
  `bank` enum('BCA','BRI','Mandiri','BNI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_user`
--

CREATE TABLE `detail_user` (
  `username` varchar(24) NOT NULL,
  `id_detail_user` varchar(16) NOT NULL,
  `asal_kampus` enum('ITERA','ITB','UNPAD','UI') NOT NULL,
  `alamat` text NOT NULL,
  `foto_profil` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(24) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` enum('SI','ME') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('nandans', '9334baa0289016e7bcd5c058918baeef', 'SI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `id_detail_buku` (`id_detail_buku`);

--
-- Indexes for table `detail_buku`
--
ALTER TABLE `detail_buku`
  ADD PRIMARY KEY (`id_detail_buku`);

--
-- Indexes for table `detail_mentor`
--
ALTER TABLE `detail_mentor`
  ADD PRIMARY KEY (`id_detail_mentor`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail_user`),
  ADD KEY `username2` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `id_detail_buku` FOREIGN KEY (`id_detail_buku`) REFERENCES `detail_buku` (`id_detail_buku`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_mentor`
--
ALTER TABLE `detail_mentor`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `username2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
