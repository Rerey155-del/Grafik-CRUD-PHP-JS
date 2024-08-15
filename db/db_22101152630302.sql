-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2024 pada 13.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_22101152630302`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `maulana`
--

CREATE TABLE `maulana` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `maulana`
--

INSERT INTO `maulana` (`id_penjualan`, `id_barang`, `jumlah`, `tgl_penjualan`) VALUES
(1, 1, 10, '2024-01-01'),
(2, 2, 15, '2024-01-02'),
(3, 3, 20, '2024-01-03'),
(4, 4, 25, '2024-01-04'),
(5, 5, 30, '2024-01-05'),
(6, 6, 35, '2024-01-06'),
(7, 7, 40, '2024-01-07'),
(8, 8, 45, '2024-01-08'),
(9, 9, 50, '2024-01-09'),
(10, 10, 55, '2024-01-10'),
(11, 1, 60, '2024-02-01'),
(12, 2, 65, '2024-02-02'),
(13, 3, 70, '2024-02-03'),
(14, 4, 75, '2024-02-04'),
(15, 5, 80, '2024-02-05'),
(16, 6, 85, '2024-02-06'),
(17, 7, 90, '2024-02-07'),
(18, 8, 95, '2024-02-08'),
(19, 9, 100, '2024-02-09'),
(20, 10, 105, '2024-02-10'),
(21, 1, 110, '2024-03-01'),
(22, 2, 115, '2024-03-02'),
(23, 3, 120, '2024-03-03'),
(24, 4, 125, '2024-03-04'),
(25, 5, 130, '2024-03-05'),
(26, 6, 135, '2024-03-06'),
(27, 7, 140, '2024-03-07'),
(28, 8, 145, '2024-03-08'),
(29, 9, 150, '2024-03-09'),
(30, 10, 155, '2024-03-10'),
(31, 1, 160, '2024-04-01'),
(32, 2, 165, '2024-04-02'),
(33, 3, 170, '2024-04-03'),
(34, 4, 175, '2024-04-04'),
(35, 5, 180, '2024-04-05'),
(36, 6, 185, '2024-04-06'),
(37, 7, 190, '2024-04-07'),
(38, 8, 195, '2024-04-08'),
(39, 9, 200, '2024-04-09'),
(40, 10, 205, '2024-04-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reyhan`
--

CREATE TABLE `reyhan` (
  `id_barang` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reyhan`
--

INSERT INTO `reyhan` (`id_barang`, `barang`) VALUES
(1, 'tv'),
(2, 'laptop'),
(3, 'monitor'),
(4, 'printer'),
(5, 'mose'),
(6, 'speker'),
(7, 'keybord'),
(8, 'kulkas'),
(9, 'ac'),
(10, 'kipas angin');

--
-- Indexes for dumped tables
--
CREATE TABLE `reyhan_maulana` (
  `id_pel` int(11) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `alamat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reyhan_maulana`
--

INSERT INTO `reyhan_maulana` (`id_pel`, `nama_pelanggan`, `alamat`) VALUES
(1, 'Tyo', 'Medan'),
(2, 'Dzikri', 'Lubeg'),
(3, 'Rino', 'Jambi'),
(4, 'Hafiz', 'Lintau'),
(5, 'Ken', 'Solok'),
(6, 'Agil', 'Lintau'),
(7, 'Karel', 'Padang'),
(8, 'Lyan', 'Solok Selatan'),
(9, 'Yoga', 'Pesisir Selatan'),
(10, 'Adib', 'Tebing Tinggi');
--
-- Indeks untuk tabel `maulana`
--
ALTER TABLE `maulana`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `reyhan`
--
ALTER TABLE `reyhan`
  ADD PRIMARY KEY (`id_barang`);


-- Indexes for table `reyhan_maulana`
--
ALTER TABLE `reyhan_maulana`
  ADD PRIMARY KEY (`id_pel`);
--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `maulana`
--
ALTER TABLE `maulana`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT untuk tabel `reyhan`
--
ALTER TABLE `reyhan`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
