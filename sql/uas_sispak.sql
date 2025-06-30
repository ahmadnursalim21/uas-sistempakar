-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2025 pada 06.50
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
-- Database: `uas_sispak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hobi`
--

CREATE TABLE `hobi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hobi`
--

INSERT INTO `hobi` (`id`, `nama`) VALUES
(1, 'Menggambar'),
(2, 'Coding'),
(3, 'Membaca'),
(4, 'Menari'),
(5, 'Bermusik'),
(6, 'Olahraga'),
(7, 'Menulis'),
(8, 'Bermain Game'),
(9, 'Traveling'),
(10, 'Memasak'),
(11, 'Fotografi'),
(12, 'Berbicara di depan umum'),
(13, 'Membuat kerajinan'),
(14, 'Mengutakatik electronik'),
(15, 'Mengajar'),
(16, 'Berdiskusi'),
(17, 'Menganalisis'),
(18, 'Mendesain Interior'),
(19, 'Bertanam'),
(20, 'Menonton film');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hobi_users`
--

CREATE TABLE `hobi_users` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_hobi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hobi_users`
--

INSERT INTO `hobi_users` (`id`, `id_pengguna`, `id_hobi`) VALUES
(109, 3, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(1, 'Desain Komunikasi Visual'),
(2, 'Teknik Informatika'),
(3, 'Sastra Indonesia'),
(4, 'Pendidikan Jasmani'),
(5, 'Seni Tari'),
(6, 'Musik'),
(7, 'Ilmu Komunikasi'),
(8, 'Pariwisata'),
(9, 'Tata Boga'),
(10, 'Fotografi'),
(11, 'Pendidikan Guru Sekolah Dasar'),
(12, 'Teknik Elektro'),
(13, 'Psikologi'),
(14, 'Agribisnis'),
(15, 'Desain Interior');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi_hobi_jurusan`
--

CREATE TABLE `relasi_hobi_jurusan` (
  `id_relasi` int(11) NOT NULL,
  `id_hobi` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `tingkat_kecocokan` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `relasi_hobi_jurusan`
--

INSERT INTO `relasi_hobi_jurusan` (`id_relasi`, `id_hobi`, `id_jurusan`, `tingkat_kecocokan`) VALUES
(1, 1, 1, 90),
(2, 2, 2, 80),
(3, 3, 3, 85),
(4, 4, 5, 90),
(5, 5, 6, 100),
(6, 6, 4, 100),
(7, 7, 7, 100),
(8, 8, 2, 100),
(9, 10, 9, 100),
(10, 11, 10, 100),
(11, 12, 7, 100),
(12, 13, 9, 100),
(13, 14, 12, 100),
(14, 15, 11, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`) VALUES
(3, 'Limzy', 'salim@gmail.com', 'admin', '$2y$10$ZPrCrFP2r5vPjMSMoaeGT.ihtRnBhbPziXqomveDm777tL3yrtfPG'),
(5, 'farid', 'farid@gmail.com', 'user', '$2y$10$EAwz5ny/uyUGnSi0p2yz4OvNgVJjh2QjYYLTvC.8Zab4ECvft7BWi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hobi`
--
ALTER TABLE `hobi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hobi_users`
--
ALTER TABLE `hobi_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_hobi` (`id_hobi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `relasi_hobi_jurusan`
--
ALTER TABLE `relasi_hobi_jurusan`
  ADD PRIMARY KEY (`id_relasi`),
  ADD KEY `id_hobi` (`id_hobi`,`id_jurusan`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hobi`
--
ALTER TABLE `hobi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `hobi_users`
--
ALTER TABLE `hobi_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `relasi_hobi_jurusan`
--
ALTER TABLE `relasi_hobi_jurusan`
  MODIFY `id_relasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hobi_users`
--
ALTER TABLE `hobi_users`
  ADD CONSTRAINT `hobi_users_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hobi_users_ibfk_2` FOREIGN KEY (`id_hobi`) REFERENCES `hobi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `relasi_hobi_jurusan`
--
ALTER TABLE `relasi_hobi_jurusan`
  ADD CONSTRAINT `relasi_hobi_jurusan_ibfk_1` FOREIGN KEY (`id_hobi`) REFERENCES `hobi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_hobi_jurusan_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
