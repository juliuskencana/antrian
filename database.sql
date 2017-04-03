-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Inang: localhost:3306
-- Waktu pembuatan: 18 Des 2015 pada 12.14
-- Versi Server: 10.0.22-MariaDB
-- Versi PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `aynkgcom_antrian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE IF NOT EXISTS `hak_akses` (
  `hak_akses_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `layanan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`hak_akses_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`hak_akses_id`, `user_id`, `layanan_id`) VALUES
(2, 4, 1),
(11, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `layanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`layanan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`layanan_id`, `nama_layanan`) VALUES
(1, 'Kemahasiswaan'),
(6, 'Finance'),
(7, 'LIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `queue_id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan_id` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `pelanggan_id` varchar(255) DEFAULT NULL,
  `nomor_antrian` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_finish` int(11) DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`queue_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data untuk tabel `queue`
--

INSERT INTO `queue` (`queue_id`, `layanan_id`, `nama_pelanggan`, `pelanggan_id`, `nomor_antrian`, `is_active`, `is_finish`, `datetime`) VALUES
(42, 1, 'julius', 'Q2', 1, 0, 1, '2014-12-09 20:19:06'),
(44, 1, 'auk ah', 'Q4', 2, 0, 1, '2014-12-09 20:19:23'),
(45, 1, 'asd', 'Q5', 3, 0, 1, '2014-12-09 20:19:29'),
(51, 1, 'jhgjhg', 'Q5', 1, 0, 1, '2014-12-10 10:37:23'),
(52, 1, 'asd', 'Q1', 1, 0, 1, '2014-12-10 16:30:27'),
(54, 1, 'asd', 'Q3', 1, 0, 1, '2014-12-10 17:27:16'),
(57, 1, 'Dirga', 'Q6', 2, 0, 1, '2014-12-11 11:16:31'),
(58, 1, 'armand', 'Q7', 3, 0, 1, '2014-12-11 11:16:55'),
(59, 1, 'Olivia', 'Q8', 4, 0, 1, '2014-12-11 13:01:40'),
(60, 1, 'Rama', 'Q1', 1, 0, 1, '2014-12-11 13:23:11'),
(62, 1, 'Olivia', 'Q3', 2, 0, 1, '2014-12-11 13:28:06'),
(63, 1, 'randy', 'Q4', 3, 0, 1, '2014-12-11 13:32:14'),
(64, 1, 'olivia', 'Q1', 1, 0, 1, '2014-12-11 13:33:57'),
(68, 1, 'Adi', 'Q1', 1, 0, 1, '2014-12-13 10:17:46'),
(69, 1, 'Retno', 'Q2', 2, 0, 1, '2014-12-13 10:17:59'),
(70, 1, 'Eko', 'Q3', 3, 0, 1, '2014-12-13 10:18:08'),
(71, 1, 'randy', 'K4', 4, 0, 1, '2014-12-14 16:06:54'),
(72, 1, 'rndy', 'K1', 1, 0, 1, '2014-12-14 16:09:19'),
(73, 1, 'buum', 'K2', 2, 0, 1, '2014-12-14 16:09:28'),
(80, 1, 'zacky', 'K3', 3, 0, 1, '2015-01-04 03:39:46'),
(81, 1, 'Adi', 'K4', 4, 0, 1, '2015-01-04 03:40:04'),
(82, 1, 'Tono', 'K5', 5, 0, 1, '2015-01-04 03:40:17'),
(83, 1, 'sharah', 'K1', 1, 0, 1, '2015-01-04 11:58:32'),
(88, 1, 'ganteng', 'K2', 2, 0, 1, '2015-01-04 11:59:17'),
(89, 1, 'randy', 'K1', 1, 0, 1, '2015-01-04 12:06:21'),
(90, 1, 'gahar', 'K2', 2, 0, 1, '2015-01-04 12:06:30'),
(91, 1, 'maneg', 'K3', 3, 0, 1, '2015-01-04 12:06:36'),
(100, 1, 'sharah', 'K1', 1, 1, 1, '2015-01-05 07:54:37'),
(103, 6, 'zacky', 'F1', 1, 1, 0, '2015-01-08 06:00:23'),
(104, 1, 'Julius', 'K1', 1, 1, 1, '2015-01-08 11:32:07'),
(105, 1, 'Ttjggjn', 'K2', 2, 1, 1, '2015-01-08 11:32:24'),
(106, 1, 'Eko', 'K1', 1, 1, 1, '2015-01-14 03:46:39'),
(107, 1, 'Zacky', 'K2', 2, 1, 1, '2015-01-14 03:46:44'),
(108, 1, 'Dirga', 'K3', 3, 1, 0, '2015-01-14 03:46:52'),
(109, 1, 'Wati', 'K4', 4, 1, 0, '2015-01-15 15:50:10'),
(110, 6, 'Bapak Hendi ', 'F2', 2, 1, 0, '2015-01-23 08:47:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2a$08$Db1RpmOugmPcGNWGv3HXJeuQp2OK3MF4lQlCT/Ynn/FKgav5fvY0O', 'admin'),
(4, 'operator_kemahasiswaan', '$2a$08$fkzH56B90mkUzFAFwP1xTuHvzzTZib33tLcXEfxnBPsmcUqc076IG', 'operator'),
(5, 'customer', '$2a$08$hxSnfmeF9Ae2CzbxmHVJse1sN4Fo4ZoESYMOVYIl7tQozqZi9WqFe', 'customer'),
(9, 'operator_LIM', '$2a$08$mju1mnZm85T1qG15WMuA7u7Z8xb6jdNF89YFOB.vlkj6cWcHZRY/q', 'operator'),
(10, 'operator2', '$2a$08$mf5t9NuZkAXwg.cFtWI2eeLqU4rOB1vF5Z9XMJompZNGDI3GeYCny', 'operator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
