-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 22 Feb 2017 pada 03.42
-- Versi Server: 5.5.25a
-- Versi PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `diko_wahyu_pratama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(2, 'Diko', 'nogosari', 'najajal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_ketegori` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `halaman` varchar(5) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `stok` varchar(10) NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_ketegori`, `judul`, `gambar`, `penerbit`, `pengarang`, `halaman`, `harga`, `stok`) VALUES
(21, 14, ' PKN', '20170217164334.jpg', '  PT. Sapi Bentong', 'Bang Bokep', ' 100', ' 1000000', '72'),
(22, 14, 'B. Inggris', '20170217164457.jpg', 'CV. Kurang Ngondol', 'Atok', '200', '2000000', '55'),
(23, 14, 'Kimia', '20170217164635.png', 'Firma Kurang Belaian', 'Nopal', '10', '500000', '0'),
(24, 15, 'PHP', '20170217164739.jpg', 'CV. nguntul', 'abdul', '100', '5000000', '23'),
(25, 16, 'Bisnis Online', '20170217164900.jpg', 'PT. Sok Ganteng', 'yahya', '10', '100000', '50'),
(26, 14, ' Base COC', '20170217202459.jpg', ' PT. Kurang Turu', ' prof. Ir. Dr. Diko s.kom', ' 20', ' 99000000', '52'),
(27, 15, 'Sistem Operasi', '20170221040107.jpg', 'smk al kh', 'guru', '100', '200000', '40'),
(28, 15, 'Desain Grafis', '20170221040253.jpg', 'Pt. morak marek', 'sayonggg', '50', '100000', '15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chekout`
--

CREATE TABLE IF NOT EXISTS `chekout` (
  `id_chekout` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_tlp` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status_terima` enum('belum di terima','sudah diterima') NOT NULL,
  PRIMARY KEY (`id_chekout`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_pembeli` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pembeli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_pembeli`, `nama`, `username`, `password`) VALUES
(7, 'Calon_Istri', 'bang', 'bang'),
(8, 'ab', 'ab', 'ab'),
(10, 'Nopal', 'nop', 'nop'),
(11, 'Abdul', 'abdul', 'abdul'),
(12, 'Abit', 'abit', 'abit'),
(15, 'aku', 'aku', 'aku'),
(17, 'Diko', 'dik', 'dik'),
(18, 'Dik', 'di', 'di'),
(19, 'ela', 'ela', 'ela'),
(20, 'yahya', 'yah', 'yah'),
(21, 'sulis', 'sul', 'sul'),
(22, 'Evan', 'ev', 'ev'),
(23, 'jajal', 'jal', 'jal'),
(24, 'coco', 'coc', 'coc'),
(25, 'DIko', 'tau', 'tau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_ketegori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(70) NOT NULL,
  PRIMARY KEY (`id_ketegori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_ketegori`, `kategori`) VALUES
(14, 'Pendidikan'),
(15, 'Tehnologi Informatika'),
(16, 'Kewirausahaan'),
(17, 'COC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembeli` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `total_harga` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_pembeli`, `id_buku`, `qty`, `harga`, `total_harga`, `total_bayar`) VALUES
(16, 13, 26, '1', ' 99000000', '99000000', ''),
(17, 11, 25, '1', '100000', '100000', ''),
(30, 15, 22, '1', '2000000', '2000000', ''),
(38, 20, 23, '44', '500000', '22000000', ''),
(42, 23, 24, '5', '5000000', '25000000', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
