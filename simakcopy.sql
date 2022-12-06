-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 07:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simakcopy`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_dosen` date NOT NULL,
  `alamat_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_dosen` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nip_dosen`, `nama_dosen`, `tmp_dosen`, `tgl_dosen`, `alamat_dosen`, `prodi_dosen`, `agama_dosen`, `telp_dosen`, `email_dosen`, `gender_dosen`, `foto_dosen`, `created_at`, `updated_at`) VALUES
(1, 110220204, 'Rafa Grahady Putra, S.Kom, M.Kom', 'Surabaya', '2022-11-26', 'Losari, Brebes', 'Teknik Informatika', 'Islam', '082167347682', 'rafady22@simak.ac.id', 'Laki-laki', '', '2022-11-26 05:23:24', '2022-11-26 05:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_matkul_jadwal` int(11) NOT NULL,
  `hari_jadwal` enum('Senin','Selasa','Rabu','Kamis','Jumat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_dosen_jadwal` int(11) NOT NULL,
  `fk_ruangan_jadwal` int(11) NOT NULL,
  `fk_ta_jadwal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_krs` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_mahasiswa_krs` int(11) NOT NULL,
  `fk_jadwal_krs` int(11) NOT NULL,
  `fk_ta_krs` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mahasiswa` date NOT NULL,
  `alamat_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_mahasiswa` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_mahasiswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim_mahasiswa`, `nama_mahasiswa`, `tmp_mahasiswa`, `tgl_mahasiswa`, `alamat_mahasiswa`, `prodi_mahasiswa`, `agama_mahasiswa`, `telp_mahasiswa`, `email_mahasiswa`, `gender_mahasiswa`, `foto_mahasiswa`, `created_at`, `updated_at`) VALUES
(1, 11020101, 'Fatih Pradygra', 'Malang', '2022-11-26', 'Bandung, Jawa Barat', 'Teknik Informatika', 'Islam', '085709467392', 'prady11@mhs.simak.ac.id', 'Laki-laki', '', '2022-11-26 05:23:24', '2022-11-26 05:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `matkuls`
--

CREATE TABLE `matkuls` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks_matkul` int(11) NOT NULL,
  `ket_matkul` enum('Wajib','Pilihan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matkuls`
--

INSERT INTO `matkuls` (`id`, `kode_matkul`, `nama_matkul`, `sks_matkul`, `ket_matkul`, `created_at`, `updated_at`) VALUES
(1, 'NF11005', 'Matematika Komputer', 3, 'Wajib', '2022-11-26 05:23:24', '2022-11-26 05:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_16_082504_create_dosens_table', 1),
(6, '2022_11_16_091801_create_ruangans_table', 1),
(7, '2022_11_16_102632_create_matkuls_table', 1),
(8, '2022_11_16_103105_create_nilais_table', 1),
(9, '2022_11_16_104155_create_krs_table', 1),
(10, '2022_11_16_104612_create_mahasiswas_table', 1),
(11, '2022_11_16_105351_create_jadwals_table', 1),
(12, '2022_11_20_082147_create_tahun_akademiks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_krs_nilai` int(11) NOT NULL,
  `fk_mahasiswa_nilai` int(11) NOT NULL,
  `fk_ta_nilai` int(11) NOT NULL,
  `fk_jadwal_nilai` int(11) NOT NULL,
  `skor_nilai` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `kode_ruangan`, `created_at`, `updated_at`) VALUES
(1, 'B200', '2022-11-26 05:23:24', '2022-11-26 05:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_akademiks`
--

CREATE TABLE `tahun_akademiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_tahunakademik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tahunakademik` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_akademiks`
--

INSERT INTO `tahun_akademiks` (`id`, `kode_tahunakademik`, `status_tahunakademik`, `created_at`, `updated_at`) VALUES
(1, '2022/2023 Ganjil', 1, '2022-11-26 05:23:24', '2022-11-26 05:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `remember_token`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Grandy Prafatia', 'grandy16@gmail.com', NULL, NULL, '$2y$10$vL/YE7sKIriiTW/Wgg.SiOML6xtHyMhg4WgX2D04XiRsngL6zEURS', 'Administrator', '2022-11-26 05:23:25', '2022-11-26 05:23:25'),
(2, 'Rafa Grahady Putra, S.Kom, M.Kom', 'rafady22@simak.ac.id', NULL, NULL, '$2y$10$gLlvGgfHzqKmSOCg.yEsxOOD5V8ZWlxb3fwb3dqJO5/vfUR4szHoy', 'Dosen', '2022-11-26 05:23:25', '2022-11-26 05:23:25'),
(3, 'Fatih Pradygra', 'prady11@mhs.simak.ac.id', NULL, NULL, '$2y$10$d1fcJLoHwTBnGPYuJcUPAeBJpP0ik8otxTSMFmO36nqbB/nIWtdcq', 'Mahasiswa', '2022-11-26 05:23:25', '2022-11-26 05:23:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matkuls`
--
ALTER TABLE `matkuls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matkuls`
--
ALTER TABLE `matkuls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tahun_akademiks`
--
ALTER TABLE `tahun_akademiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
