-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2021 pada 10.08
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_external`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi_keahlian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`, `created_at`, `updated_at`) VALUES
(1, 'X RPL', 'Rekayasa Perangkat Lunak', '2021-04-19 01:02:22', '2021-04-19 01:02:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_18_021214_create_siswa_table', 1),
(5, '2021_04_18_021323_create_pembayaran_table', 1),
(6, '2021_04_18_021349_create_petugas_table', 1),
(7, '2021_04_18_021406_create_spp_table', 1),
(8, '2021_04_18_021422_create_kelas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_dibayar` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1q2w3e4r', 'Admin', 'admin', NULL, NULL),
(2, 'petugas', '1qaz3edc', 'Petugas', 'petugas', '2021-04-19 01:01:47', '2021-04-19 01:01:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `created_at`, `updated_at`) VALUES
('SSWA001', '11800392', 'Fatwa', 1, 'Tajur', '08777873', 1, '2021-04-19 01:02:51', '2021-04-19 01:02:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`, `created_at`, `updated_at`) VALUES
(1, 2019, 200000, '2021-04-19 01:02:34', '2021-04-19 01:02:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$S/sqhvm7dJ5466yqzKtRh.H3deacVw8q83whqyO/Dwhe6uLKXs6IO', 'admin', NULL, '2021-04-19 00:59:07', '2021-04-19 00:59:07'),
(2, 'Petugas', 'petugas@gmail.com', NULL, '$2y$10$rE.qlK6KtbS4T6TnpemXCOvRLQXCWPfGUn1EammL5uYHh/enwDfYK', 'petugas', NULL, '2021-04-19 01:01:47', '2021-04-19 01:01:47'),
(3, 'Fatwa', '11800392@gmail.com', NULL, '$2y$10$7R718sd7ySQE9TQ/ApQCOeAffgc/PhHe6jmmbuiJIjbUU5DF/9S4q', 'siswa', NULL, '2021-04-19 01:02:51', '2021-04-19 01:02:51');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vbayar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vbayar` (
`id_pembayaran` int(11)
,`id_petugas` int(11)
,`nisn` varchar(10)
,`tgl_bayar` date
,`bulan_dibayar` varchar(10)
,`tahun_dibayar` varchar(4)
,`id_spp` int(11)
,`jumlah_bayar` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`nis` varchar(8)
,`nama` varchar(35)
,`id_kelas` int(11)
,`nama_kelas` varchar(10)
,`kompetensi_keahlian` varchar(50)
,`tahun` int(11)
,`nominal` int(11)
,`nama_petugas` varchar(35)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vsiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vsiswa` (
`nisn` varchar(10)
,`nis` varchar(8)
,`nama` varchar(35)
,`id_kelas` int(11)
,`alamat` varchar(255)
,`no_telp` varchar(13)
,`id_spp` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`nama_kelas` varchar(10)
,`kompetensi_keahlian` varchar(50)
,`tahun` int(11)
,`nominal` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vbayar`
--
DROP TABLE IF EXISTS `vbayar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbayar`  AS  select `pembayaran`.`id_pembayaran` AS `id_pembayaran`,`pembayaran`.`id_petugas` AS `id_petugas`,`pembayaran`.`nisn` AS `nisn`,`pembayaran`.`tgl_bayar` AS `tgl_bayar`,`pembayaran`.`bulan_dibayar` AS `bulan_dibayar`,`pembayaran`.`tahun_dibayar` AS `tahun_dibayar`,`pembayaran`.`id_spp` AS `id_spp`,`pembayaran`.`jumlah_bayar` AS `jumlah_bayar`,`pembayaran`.`created_at` AS `created_at`,`pembayaran`.`updated_at` AS `updated_at`,`vsiswa`.`nis` AS `nis`,`vsiswa`.`nama` AS `nama`,`vsiswa`.`id_kelas` AS `id_kelas`,`vsiswa`.`nama_kelas` AS `nama_kelas`,`vsiswa`.`kompetensi_keahlian` AS `kompetensi_keahlian`,`vsiswa`.`tahun` AS `tahun`,`vsiswa`.`nominal` AS `nominal`,`petugas`.`nama_petugas` AS `nama_petugas` from ((`pembayaran` join `vsiswa` on(`pembayaran`.`nisn` = `vsiswa`.`nisn`)) join `petugas` on(`pembayaran`.`id_petugas` = `petugas`.`id_petugas`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vsiswa`
--
DROP TABLE IF EXISTS `vsiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsiswa`  AS  select `siswa`.`nisn` AS `nisn`,`siswa`.`nis` AS `nis`,`siswa`.`nama` AS `nama`,`siswa`.`id_kelas` AS `id_kelas`,`siswa`.`alamat` AS `alamat`,`siswa`.`no_telp` AS `no_telp`,`siswa`.`id_spp` AS `id_spp`,`siswa`.`created_at` AS `created_at`,`siswa`.`updated_at` AS `updated_at`,`kelas`.`nama_kelas` AS `nama_kelas`,`kelas`.`kompetensi_keahlian` AS `kompetensi_keahlian`,`spp`.`tahun` AS `tahun`,`spp`.`nominal` AS `nominal` from ((`siswa` join `kelas` on(`siswa`.`id_kelas` = `kelas`.`id_kelas`)) join `spp` on(`siswa`.`id_spp` = `spp`.`id_spp`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_petugas` (`id_petugas`,`nisn`,`id_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_kelas` (`id_kelas`,`id_spp`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
