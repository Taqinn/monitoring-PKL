-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 16.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtakin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `photo_laporan` varchar(255) NOT NULL,
  `verifikasi` enum('','Hadir','Tidak Hadir') NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `name`, `nis`, `email`, `image`, `laporan`, `photo_laporan`, `verifikasi`, `created_at`, `updated_at`) VALUES
(1, 'Tiara Adisti', '13145645', 'tiara@gmail.com', 'absensi/capture_64c91b8db151b6.03776180.jpg', 'fasfs', 'laporan/1690901389.jpg', '', '2023-08-01 07:49:49', '2023-08-01 07:49:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'APHP', '2023-08-01 07:48:15', '2023-08-01 07:48:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_04_115757_create_absensis_table', 1),
(6, '2023_06_04_203506_create_rekomendasis_table', 1),
(7, '2023_06_04_203619_create_tempatpkls_table', 1),
(8, '2023_06_05_013204_create_nilais_table', 1),
(9, '2023_06_06_045037_create_pengajuans_table', 1),
(10, '2023_07_30_041655_create_jurusans_table', 1),
(11, '2023_07_30_060752_create_nilaiinstansis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaiinstansis`
--

CREATE TABLE `nilaiinstansis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `prestasi` varchar(255) NOT NULL,
  `disiplin` varchar(255) NOT NULL,
  `inisiatif` varchar(255) NOT NULL,
  `kerjasama` varchar(255) NOT NULL,
  `sikap` varchar(255) NOT NULL,
  `kehadiran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `prestasi` varchar(255) NOT NULL,
  `disiplin` varchar(255) NOT NULL,
  `inisiatif` varchar(255) NOT NULL,
  `kerjasama` varchar(255) NOT NULL,
  `sikap` varchar(255) NOT NULL,
  `kehadiran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuans`
--

CREATE TABLE `pengajuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `status` enum('Diterima','Ditolak','Diproses') NOT NULL DEFAULT 'Diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuans`
--

INSERT INTO `pengajuans` (`id`, `name`, `nis`, `kelas`, `jurusan`, `instansi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tiara Adisti', '13145645', 'XII', 'APHP', 'Cv. Akar Daya Mandiri', 'Diproses', '2023-08-01 07:49:01', '2023-08-01 07:49:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasis`
--

CREATE TABLE `rekomendasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kuota` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekomendasis`
--

INSERT INTO `rekomendasis` (`id`, `instansi`, `jurusan`, `alamat`, `kuota`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Cv. Akar Daya Mandiri', 'APHP', 'Jl. Cianjur', '9', '087695546543', '2023-08-01 07:37:17', '2023-08-01 07:49:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempatpkls`
--

CREATE TABLE `tempatpkls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `nilai` enum('Belum dinilai','Sudah dinilai') NOT NULL DEFAULT 'Belum dinilai',
  `nilaiinstansi` enum('Belum dinilai','Sudah dinilai') NOT NULL DEFAULT 'Belum dinilai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tempatpkls`
--

INSERT INTO `tempatpkls` (`id`, `nama`, `jurusan`, `kelas`, `gender`, `instansi`, `nilai`, `nilaiinstansi`, `created_at`, `updated_at`) VALUES
(1, 'siswa', 'TKJ', 'XI', 'L', 'Asus', 'Belum dinilai', 'Belum dinilai', '2023-08-01 07:28:04', '2023-08-01 07:28:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `alamat_instansi` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` enum('siswa','guru','panitia','instansi','admin') NOT NULL DEFAULT 'siswa',
  `pengajuan` enum('sudah diajukan','belum pengajuan') NOT NULL DEFAULT 'belum pengajuan',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nis`, `kelas`, `jurusan`, `alamat_instansi`, `gender`, `role`, `pengajuan`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'instansi', NULL, NULL, NULL, NULL, 'L', 'instansi', 'belum pengajuan', 'instansi@gmail.com', '$2y$10$zuzrR.lGprXyjz2iJEI1eOFUsdX8J1ue2vLkBugHYd8sk3pjEMjg.', '2023-08-01 07:28:07', '2023-08-01 07:28:07'),
(2, 'siswa', '21332565', 'XI', NULL, NULL, 'L', 'siswa', 'belum pengajuan', 'siswa@gmail.com', '$2y$10$1Rz62.PsVU9aMldjaYA2Pur.xNWp0OKxD4/5CVypYuIMY3lqEskuK', '2023-08-01 07:28:07', '2023-08-01 07:28:07'),
(3, 'guru', NULL, NULL, NULL, NULL, 'P', 'guru', 'belum pengajuan', 'guru@gmail.com', '$2y$10$9wFCe6gqdf0x3mjhQ/Cs0eWf3UYkHE/YnhxvaxibbJzIALiA2nfU6', '2023-08-01 07:28:07', '2023-08-01 07:28:07'),
(4, 'admin', NULL, NULL, NULL, NULL, 'L', 'admin', 'belum pengajuan', 'admin@gmail.com', '$2y$10$C1Iyg1oMn2WAZE7MVHmRoucubq9Ht1/lPdDRc3z8YeZQWLlRnAP.S', '2023-08-01 07:28:07', '2023-08-01 07:28:07'),
(5, 'panitia', NULL, NULL, NULL, NULL, 'L', 'panitia', 'belum pengajuan', 'panitia@gmail.com', '$2y$10$P1pevwaxtzjc.ZFAgLfawuSeQnQvCnfvOmiFmiw9zAo6Yt/EpOGEK', '2023-08-01 07:28:07', '2023-08-01 07:28:07'),
(6, 'Tiara Adisti', '13145645', 'XII', 'APHP', NULL, 'P', 'siswa', 'belum pengajuan', 'tiara@gmail.com', '$2y$10$o9tpQ2ySSQpc.u2gb3vzoeKioym4uNIuLz0gUIvS/sIICWG2nd4cy', '2023-08-01 07:48:36', '2023-08-01 07:48:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilaiinstansis`
--
ALTER TABLE `nilaiinstansis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rekomendasis`
--
ALTER TABLE `rekomendasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tempatpkls`
--
ALTER TABLE `tempatpkls`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `nilaiinstansis`
--
ALTER TABLE `nilaiinstansis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuans`
--
ALTER TABLE `pengajuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekomendasis`
--
ALTER TABLE `rekomendasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tempatpkls`
--
ALTER TABLE `tempatpkls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
