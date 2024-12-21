-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2024 pada 06.28
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

--
-- Dumping data untuk tabel `berkas_bimbingan`
--

INSERT INTO `berkas_bimbingan` (`id`, `nim`, `filename`, `date`) VALUES
(18, '23', 'Team_4_Project_Risk_Management4.pdf', '2024-12-20 12:15:07'),
(19, '24', 'Team_4_Project_Risk_Management5.pdf', '2024-12-20 12:41:19');

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

--
-- Dumping data untuk tabel `bukti_bimbingan`
--

INSERT INTO `bukti_bimbingan` (`id`, `nim`, `filename`, `date`) VALUES
(17, '23', 'user.png', '2024-12-20 12:15:07'),
(18, '24', 'user1.png', '2024-12-20 12:41:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(50) NOT NULL,
  `receiver_id` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data untuk tabel `pengajuan_judul`
--

INSERT INTO `pengajuan_judul` (`id`, `nama`, `nim`, `judul`, `bidangminat`, `berkas`, `tanggal`, `tanggalverif`, `status`, `info`, `dosbing1`, `dosbing2`) VALUES
(20, 'M. Trendo Rafly Dipu', '23', 'proposal', 'Minat 1', 'Team_4_Project_Risk_Management5.pdf', '2024-12-20', '2024-12-20', 'diterima', 'bagus', '100', '101'),
(21, 'Qanzul Arrays', '24', 'proposal', 'Minat 1', 'Team_4_Laporan_Tengah_Proyek_docx3.pdf', '2024-12-20', '2024-12-20', 'diterima', 'bagus', '101', '102'),
(22, 'Naya', '25', 'proposal', 'Minat 3', 'Team_4_Project_Risk_Management6.pdf', '2024-12-20', '0000-00-00', 'pending', '', '102', '');

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

--
-- Dumping data untuk tabel `pengajuan_sidang`
--

INSERT INTO `pengajuan_sidang` (`id`, `nama`, `nim`, `tanggal`, `judul`, `jam`, `status`, `penguji`, `tglsidang`, `nilai`) VALUES
(16, 'M. Trendo Rafly Dipu', '23', '2024-12-20', 'proposal', '12:15:07', 'done', '102', '2024-12-20', '94');

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
(1, '23', '$2y$10$4OdGSDVT9yhmh1wfKSqEBuInZyaMjSzfaiyPJzwTcffj7nbDAmISm', 'M. Trendo Rafly Dipu', 'lakilaki', 'mahasiswa', '2mDRRH3xqC9XC4q.png'),
(2, '100', '$2y$10$jlUbXLASqHGcIKcRp63ty.kW.P2CDVc4Feb6.mXi.goG2f/14Q7jK', 'Pak Dosen', 'lakilaki', 'dosen', 'user.png'),
(3, 'koordinator', '$2y$10$WqDykq1r2LA7Qy33gS3ulOwi/ayh.GT.G97w.HVdlzbmV9c/SCBJ6', 'Koordinator Tugas Akhir', 'lakilaki', 'rmk', 'user.png'),
(4, 'kaprodi', '$2y$10$i7vi6Hc3GSy13fUHPqmKZ.kyCNjobmZPresa5Bzwn/E4QGFgmJRby', 'Kaprodi', 'lakilaki', 'kaprodi', 'rTYIO6JRlgK9kot.png'),
(5, '101', '$2y$10$8lG5WtFQmQIUK3JJizmiP.Sv5JjB8InP8P01RDjStXUO6Kz.8ERL.', 'Pak Dosen 2', 'lakilaki', 'dosen', 'user.png'),
(7, '102', '$2y$10$sRz2R/HA8wbeMcahDHv/eefqb0pfLeIjkszEbW.WCrPNeMhhXrsZS', 'pak dosen 3', 'lakilaki', 'dosen', ''),
(8, 'admin', '$2y$10$LdA7GXFgzL7BKtp9d3ltIeWmldU3nIUDLBdyMrd2ZpfLc7itmHRQW', 'Administrator', 'lakilaki', 'admin', 'user.png'),
(10, '24', '$2y$10$pAfr2gm5EDksf0jUnj4AdO7.jShuhajne0Hke4/VF6mBaJaVv70F.', 'Qanzul Arrays', 'lakilaki', 'mahasiswa', 'user.png'),
(11, '25', '$2y$10$.lLtCZ8DLwn6uj.Sxg6Bl.Qg4S8CkMvzu3h.8oAk7P9BW3TlTcRRe', 'Naya', 'perempuan', 'mahasiswa', 'user.png');

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
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_sender` (`sender_id`),
  ADD KEY `idx_receiver` (`receiver_id`),
  ADD KEY `idx_timestamp` (`timestamp`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `bidangminat`
--
ALTER TABLE `bidangminat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bukti_bimbingan`
--
ALTER TABLE `bukti_bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_sidang`
--
ALTER TABLE `pengajuan_sidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
