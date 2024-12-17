-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2024 pada 07.17
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
(13, '23', 'Team_4_Project_Risk_Management23.pdf', '2024-12-16 13:16:35');

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
(11, '23', 'Logo_Resmi_UII_Putih1.png', '2024-12-15 05:01:04'),
(12, '23', 'Logo_Resmi_UII_Putih1.png', '2024-12-16 13:16:35');

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
(15, 'M. Trendo Rafly Dipu', '23', 'Proposal', 'Minat 1', 'Team_4_Project_Risk_Management21.pdf', '2024-12-15', '2024-12-14', 'diterima', 'keren', '100', '101');

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
(11, 'M. Trendo Rafly Dipu', '23', '2024-12-15', 'Proposal', '05:01:04', 'done', '102', '2024-12-11', '94');

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
(1, '23', 'user', 'M. Trendo Rafly Dipu', 'lakilaki', 'mahasiswa', '80BwbBMu1eybJhs.png'),
(2, '100', 'dosen', 'Pak Dosen', 'lakilaki', 'dosen', 'user.png'),
(3, 'rmk', 'admin', 'Koordinator Tugas Akhir', 'lakilaki', 'rmk', 'user.png'),
(4, 'kaprodi', 'admin', 'Kaprodi', 'lakilaki', 'kaprodi', 'rTYIO6JRlgK9kot.png'),
(5, '101', 'dosen', 'Pak Dosen 2', 'lakilaki', 'dosen', 'user.png'),
(7, '102', 'dosen', 'pak dosen 3', 'lakilaki', 'dosen', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `bidangminat`
--
ALTER TABLE `bidangminat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `bukti_bimbingan`
--
ALTER TABLE `bukti_bimbingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_judul`
--
ALTER TABLE `pengajuan_judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_sidang`
--
ALTER TABLE `pengajuan_sidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
