-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2024 pada 17.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edufinale`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_bimbingan`
--

CREATE TABLE `berkas_bimbingan` (
  `id` int(11) NOT NULL,
  `nim` text NOT NULL,
  `filename` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidangminat`
--

CREATE TABLE `bidangminat` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `bidangminat`
--

INSERT INTO `bidangminat` (`id`, `nama`) VALUES
(1, 'Minat 1'),
(2, 'Minat 2'),
(3, 'Minat 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukti_bimbingan`
--

CREATE TABLE `bukti_bimbingan` (
  `id` int(11) NOT NULL,
  `nim` text NOT NULL,
  `filename` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_judul`
--

CREATE TABLE `pengajuan_judul` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nim` text NOT NULL,
  `judul` text NOT NULL,
  `bidangminat` text NOT NULL,
  `berkas` text NOT NULL,
  `tanggal` date NOT NULL,
  `tanggalverif` date NOT NULL,
  `status` text NOT NULL,
  `info` text NOT NULL,
  `dosbing1` text NOT NULL,
  `dosbing2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_sidang`
--

CREATE TABLE `pengajuan_sidang` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nim` text NOT NULL,
  `tanggal` date NOT NULL,
  `judul` text NOT NULL,
  `jam` time NOT NULL,
  `status` text NOT NULL,
  `penguji` text NOT NULL,
  `tglsidang` date NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `gender` text NOT NULL,
  `tipe` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nim`, `password`, `nama`, `gender`, `tipe`, `photo`) VALUES
(1, '23', '$2y$10$Eu79tISS2Gv6QOdxvyNPYuR0O5iPpUMpWC4Gmiy7cUxjDpC7CjozW', 'M. Trendo Rafly Dipu', 'lakilaki', 'mahasiswa', 'GndP4LkxktKIXok.png'),
(2, '100', '$2y$10$jlUbXLASqHGcIKcRp63ty.kW.P2CDVc4Feb6.mXi.goG2f/14Q7jK', 'Pak Dosen', 'lakilaki', 'dosen', 'user.png'),
(3, 'koordinator', '$2y$10$WqDykq1r2LA7Qy33gS3ulOwi/ayh.GT.G97w.HVdlzbmV9c/SCBJ6', 'Koordinator Tugas Akhir', 'lakilaki', 'rmk', 'user.png'),
(4, 'kaprodi', '$2y$10$i7vi6Hc3GSy13fUHPqmKZ.kyCNjobmZPresa5Bzwn/E4QGFgmJRby', 'Kaprodi', 'lakilaki', 'kaprodi', 'rTYIO6JRlgK9kot.png'),
(5, '101', '$2y$10$8lG5WtFQmQIUK3JJizmiP.Sv5JjB8InP8P01RDjStXUO6Kz.8ERL.', 'Pak Dosen 2', 'lakilaki', 'dosen', 'user.png'),
(7, '102', '$2y$10$sRz2R/HA8wbeMcahDHv/eefqb0pfLeIjkszEbW.WCrPNeMhhXrsZS', 'pak dosen 3', 'lakilaki', 'dosen', ''),
(8, 'admin', '$2y$10$LdA7GXFgzL7BKtp9d3ltIeWmldU3nIUDLBdyMrd2ZpfLc7itmHRQW', 'Administrator', 'lakilaki', 'admin', 'user.png'),
(9, '24', '$2y$10$iFW4GAhnZHvbd2hhUtab5.OLPrXwEOPw8g9gtazL.OuUEbaps8w9W', 'Qanzul Arrays', 'lakilaki', 'mahasiswa', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas_bimbingan`
--
ALTER TABLE `berkas_bimbingan`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `bidangminat`
--
ALTER TABLE `bidangminat`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `bukti_bimbingan`
--
ALTER TABLE `bukti_bimbingan`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `pengajuan_sidang`
--
ALTER TABLE `pengajuan_sidang`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas_bimbingan`
--
ALTER TABLE `berkas_bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `bidangminat`
--
ALTER TABLE `bidangminat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bukti_bimbingan`
--
ALTER TABLE `bukti_bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_sidang`
--
ALTER TABLE `pengajuan_sidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
