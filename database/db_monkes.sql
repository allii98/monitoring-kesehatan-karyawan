-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Inang: 192.168.1.231
-- Waktu pembuatan: 18 Feb 2021 pada 09.28
-- Versi Server: 10.1.48-MariaDB-1~bionic
-- Versi PHP: 5.6.38-2+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_monkes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `level` enum('10','2','3') NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`user_id`, `user_nama`, `username`, `user_pass`, `level`, `id_user`) VALUES
(2, 'admin', 'admin', '$2a$08$WVvmPpx8he75DF2k3V1xPOaJJnkEOqPzLtNAxI4PmbgNDNCqU/Oq2', '10', 0),
(12, 'ALI', 'ali', '$2a$08$PoIxfpfKyTWNEbAdB3omquvDJjemMhED4gM6BLz9o1kqlvivw5qdG', '3', 87),
(13, 'FIRMANSYAH', 'firman', '$2a$08$KQhqxhaPaXTtiKbrDoYs2uFC2CdfBqtjjyPpSSq8WqEeFV03TM6/K', '2', 30),
(14, 'IMAN SUTEJO', 'iman', '$2a$08$09gp/ayHv6IDjjSlor5Uv..4PSA4SKavUmUNyouh5Ib9JS12wrvGC', '3', 88),
(15, 'SUSANTO', 'santo', '$2a$08$OQsO3UEbteYKcQeG1.sT1.gQtEM9WOyAGI0fhMv1nvugZJr.34dOa', '3', 81),
(16, 'TEDY PARONTO', 'tedy', '$2a$08$CvkUCJDBKAau7Ak4s382n.EqW39tB0ZQLsvt9xrbsExlHdEyrB8MC', '2', 71);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ktp` text,
  `kk` text,
  `bpjs` text,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `tanggal`, `id_user`, `nama`, `ktp`, `kk`, `bpjs`) VALUES
(3, '2021-02-10 19:49:49', 87, 'ALI', 'helpdesk2.png', 'Screenshot_(3).png', 'Screenshot_(4)1.png'),
(4, '2021-02-10 17:00:00', 88, 'IMAN SUTEJO', 'date.png', 'Screenshot_(4).png', 'Screenshot_(8).png'),
(5, '2021-02-10 16:54:10', 81, 'SUSANTO', 'helpdesk.png', 'Screenshot_(1).png', 'Screenshot_(2).png'),
(7, '2021-02-10 17:01:08', 77, 'WINDY ARIEWIBOWO', 'Screenshot_(57).png', 'Screenshot_(58).png', 'tes.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_monitoring`
--

CREATE TABLE IF NOT EXISTS `tb_monitoring` (
  `id_monitor` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `suhu` double DEFAULT NULL,
  `oksigen` double DEFAULT NULL,
  `bab` int(11) DEFAULT NULL,
  `batuk` int(11) DEFAULT NULL,
  `sesak` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_monitor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `tb_monitoring`
--

INSERT INTO `tb_monitoring` (`id_monitor`, `id_user`, `tanggal`, `nama`, `suhu`, `oksigen`, `bab`, `batuk`, `sesak`) VALUES
(10, 87, '2021-02-08', 'ALI', 35, 98, 1, 1, 2),
(11, 88, '2021-02-08', 'IMAN SUTEJO', 35, 98, 1, 1, 2),
(12, 81, '2021-02-08', 'SUSANTO', 34, 99, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sakit`
--

CREATE TABLE IF NOT EXISTS `tb_sakit` (
  `id_monitor` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_penyakit` enum('demam','batuk kering','pegal-pegal','sakit tenggorokan','pilek','lemas','sakit kepala','sesak nafas','lainnya') NOT NULL,
  `isi_lainnya` varchar(20) DEFAULT NULL,
  `obat` text NOT NULL,
  `vitamin` text NOT NULL,
  `kondisi` text NOT NULL,
  `covid` int(11) DEFAULT NULL,
  `suhu` double DEFAULT NULL,
  `oksigen` double DEFAULT NULL,
  `bab` int(11) DEFAULT NULL,
  `batuk` int(11) DEFAULT NULL,
  `sesak` int(11) DEFAULT NULL,
  `riwayat` varchar(100) DEFAULT NULL,
  `jenis_isolasi` enum('rawat inap','isolasi mandiri','','') DEFAULT NULL,
  `isi_isolasi_m` enum('rumah sendiri','disewakan','','') DEFAULT NULL,
  `rm_sakit` varchar(50) DEFAULT NULL,
  `no_kamar` varchar(50) DEFAULT NULL,
  `alamat` text,
  `ktp` text,
  `bpjs` text,
  `kk` text,
  PRIMARY KEY (`id_monitor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `tb_sakit`
--

INSERT INTO `tb_sakit` (`id_monitor`, `kode`, `id_karyawan`, `tanggal`, `jenis_penyakit`, `isi_lainnya`, `obat`, `vitamin`, `kondisi`, `covid`, `suhu`, `oksigen`, `bab`, `batuk`, `sesak`, `riwayat`, `jenis_isolasi`, `isi_isolasi_m`, `rm_sakit`, `no_kamar`, `alamat`, `ktp`, `bpjs`, `kk`) VALUES
(17, 'ALI822021', 3, '2021-02-08 00:00:00', 'demam', '', '<ul>\r\n	<li>tolak angin</li>\r\n	<li>bodrek</li>\r\n	<li>bensin</li>\r\n</ul>\r\n', 'c1000', 'belum membaik', 2, NULL, NULL, NULL, NULL, NULL, NULL, 'rawat inap', NULL, 'Harapan Anda', 'Melati 34', 'Jalan raya randugunting no 032 Kota Tegal', NULL, NULL, NULL),
(19, 'SUSANTO822021', 5, '2021-02-08 00:00:00', 'demam', '', '<ul>\r\n	<li>bodrek</li>\r\n	<li>tolak angin</li>\r\n	<li>solar</li>\r\n</ul>\r\n', 'c1000', 'belum membaik', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'isolasi mandiri', 'rumah sendiri', NULL, NULL, 'ciputat', NULL, NULL, NULL),
(20, 'IMANSUTE822021', 4, '2021-02-08 00:00:00', 'demam', '', '<ul>\r\n	<li>bodrek</li>\r\n	<li>tolak angin</li>\r\n	<li>ultraflue</li>\r\n</ul>\r\n', 'vitacimin', 'belum membaik', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'isolasi mandiri', NULL, NULL, NULL, 'Tegal', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_suhu`
--

CREATE TABLE IF NOT EXISTS `tb_suhu` (
  `id_suhu` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `masuk` varchar(10) NOT NULL,
  `petugas1` varchar(50) NOT NULL,
  `keluar` varchar(10) NOT NULL,
  `petugas2` varchar(50) NOT NULL,
  PRIMARY KEY (`id_suhu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_suhu`
--

INSERT INTO `tb_suhu` (`id_suhu`, `tanggal`, `id_user`, `masuk`, `petugas1`, `keluar`, `petugas2`) VALUES
(1, '2021-02-02', 87, '37', 'Andi', '37', 'Robi'),
(2, '2021-02-03', 71, '96', 'hasbi', '', ''),
(3, '2021-02-04', 89, '34', 'amad', '35', 'odon'),
(4, '2021-02-04', 87, '35', 'Amad', '35', 'tono'),
(5, '2021-02-04', 90, '35', 'Intan', '35,5', 'yonglex'),
(6, '2021-02-05', 85, '90', 'budi', '20', 'cucu'),
(7, '2021-02-05', 88, '97', 'iwan', '', ''),
(8, '2021-02-08', 71, '36', 'budi', '', ''),
(9, '2021-02-12', 87, '35', 'Andi', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_traking`
--

CREATE TABLE IF NOT EXISTS `tb_traking` (
  `id_tracking` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jam` time NOT NULL,
  `nama_tracking` varchar(50) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `savety` enum('masker','faceshield','','') NOT NULL,
  `jarak` varchar(10) NOT NULL,
  `kondisi` enum('flue','demam','batuk','sesak') NOT NULL,
  `suhu` varchar(10) NOT NULL,
  `oksigen` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tracking`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tb_traking`
--

INSERT INTO `tb_traking` (`id_tracking`, `tanggal`, `id_karyawan`, `jam`, `nama_tracking`, `lokasi`, `savety`, `jarak`, `kondisi`, `suhu`, `oksigen`) VALUES
(7, '2021-02-09', 5, '00:08:00', 'Rodi', 'Ruang meet', 'masker', '1 meter', 'flue', '35', '98'),
(8, '2021-02-09', 4, '01:56:00', 'Intan', 'lobby', 'masker', '2 m', 'batuk', '35,4', '99');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
