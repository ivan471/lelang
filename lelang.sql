-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2019 pada 04.30
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `lama_lelang` int(11) NOT NULL,
  `berakhir` date NOT NULL,
  `kelipatan_harga` int(11) NOT NULL,
  `link_gambar` varchar(20) NOT NULL,
  `id_pemilik` int(15) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `harga_awal`, `lama_lelang`, `berakhir`, `kelipatan_harga`, `link_gambar`, `id_pemilik`, `deskripsi`, `status`) VALUES
(1, 'Test1', 550000, 10, '2020-01-08', 50000, '123.png', 1, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `harga_diminta` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `kode_barang`, `harga_diminta`, `waktu`) VALUES
(1, 1, 1, 550000, '2020-01-03 14:27:39'),
(2, 2, 1, 700000, '2020-01-04 12:19:57'),
(3, 3, 1, 750000, '2020-01-05 15:58:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemenang`
--

CREATE TABLE `pemenang` (
  `kode_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `gambar_ktp` varchar(11) NOT NULL,
  `gambar_kk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `no_ktp`, `nama_user`, `username`, `password`, `email`, `alamat`, `kota`, `no_hp`, `gambar_ktp`, `gambar_kk`) VALUES
(1, '7371024629564', 'ivan', 'ivan123', 'e10adc3949ba59abbe56e057f20f883e', 'ivan@gmail.com', 'Jln.Andalas no.90', 'Makassar', '082193050609', '0', '0'),
(2, '2147483647126', 'Andreas', 'And123', 'e10adc3949ba59abbe56e057f20f883e', 'andreas@gmail.com', 'Jln.text', 'Makassar', '2147483647', 'hasil1.jpg', 'hasil1.jpg'),
(3, '7371064929425', 'Safudin Ahmad', 'safudin', 'e10adc3949ba59abbe56e057f20f883e', 'safudinahdmad@gmail.com', 'jalan.singa no.31', 'Makassar', '082134657955', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `pemenang`
--
ALTER TABLE `pemenang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
