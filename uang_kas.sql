-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2023 pada 03.00
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uang_kas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'kiki', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nim`, `nama`, `kelas`, `jenis_kelamin`) VALUES
('201011401819', 'rizki', '06 TPLP 016', 'laki-laki'),
('201011401821', 'juva', '06 TPLP 016', 'perempuan'),
('201011401822', 'RIZKI FEBRIANSYAH', '06 TPLP 016', 'laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `minggu_1` int(20) NOT NULL,
  `minggu_2` int(20) NOT NULL,
  `minggu_3` int(20) NOT NULL,
  `minggu_4` int(20) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kas`
--

CREATE TABLE `laporan_kas` (
  `id_laporan` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `minggu_1` int(20) NOT NULL,
  `minggu_2` int(20) NOT NULL,
  `minggu_3` int(20) NOT NULL,
  `minggu_4` int(20) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_kas`
--

INSERT INTO `laporan_kas` (`id_laporan`, `nim`, `minggu_1`, `minggu_2`, `minggu_3`, `minggu_4`, `id_admin`, `tanggal_bayar`) VALUES
(40, '201011401821', 5000, 5000, 5000, 0, 1, '2023-05-23'),
(41, '201011401819', 5000, 0, 0, 0, 1, '2023-05-23'),
(42, '201011401822', 5000, 5000, 0, 0, 1, '2023-05-23'),
(43, '201011401821', 5000, 5000, 5000, 0, 1, '2023-06-02'),
(44, '201011401819', 5000, 5000, 5000, 0, 1, '2023-06-01'),
(45, '201011401822', 5000, 0, 0, 0, 1, '2023-06-03'),
(46, '201011401821', 5000, 0, 0, 0, 1, '2023-07-01'),
(47, '201011401819', 5000, 5000, 0, 0, 1, '2023-07-01'),
(48, '201011401822', 5000, 5000, 0, 0, 1, '2023-07-11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `laporan_kas`
--
ALTER TABLE `laporan_kas`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `laporan_kas`
--
ALTER TABLE `laporan_kas`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD CONSTRAINT `kas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `kas_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `anggota` (`nim`);

--
-- Ketidakleluasaan untuk tabel `laporan_kas`
--
ALTER TABLE `laporan_kas`
  ADD CONSTRAINT `laporan_kas_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `anggota` (`nim`),
  ADD CONSTRAINT `laporan_kas_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
