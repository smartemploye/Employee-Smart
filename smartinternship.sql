-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2023 pada 10.40
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
-- Database: `smartinternship`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(191) DEFAULT NULL,
  `siswa_id` varchar(191) DEFAULT NULL,
  `admin_id` varchar(191) DEFAULT NULL,
  `absen_masuk` varchar(191) DEFAULT NULL,
  `absen_pulang` varchar(191) DEFAULT NULL,
  `status_absen` enum('hadir','sakit','izin') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `approve` enum('Diterima','Ditolak') DEFAULT NULL,
  `izin_dari` date DEFAULT NULL,
  `izin_sampai` date DEFAULT NULL,
  `nama_siswa` varchar(191) DEFAULT NULL,
  `dokumentasi` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `nisn`, `siswa_id`, `admin_id`, `absen_masuk`, `absen_pulang`, `status_absen`, `keterangan`, `approve`, `izin_dari`, `izin_sampai`, `nama_siswa`, `dokumentasi`, `created_at`, `updated_at`) VALUES
(5, '2010102217', NULL, NULL, '2023-06-22 12:01:28', '2023-06-22 12:01:37', 'hadir', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-21 22:01:28', '2023-06-21 22:01:37'),
(6, '2010102211', NULL, NULL, '2023-06-22 12:18:09', '2023-06-22 12:18:16', 'hadir', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-21 22:18:09', '2023-06-21 22:18:16'),
(7, '2010102211', NULL, NULL, NULL, NULL, 'izin', 'Laper', NULL, '2023-06-22', '2023-06-22', 'Putri Anggun Arifiah', 'ERD3.jpg', '2023-06-21 22:18:39', '2023-06-21 22:18:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akuns`
--

CREATE TABLE `akuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nip_pembimbing` bigint(20) DEFAULT NULL,
  `role` enum('admin','siswa','pembimbing') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akuns`
--

INSERT INTO `akuns` (`id`, `username`, `password`, `nisn`, `email_verified_at`, `nip_pembimbing`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$4ECa05szbTaQ8uYJpNI8s.jRelrYmPBvz//bfv/SJMUjvb7FC4WhG', NULL, NULL, NULL, 'admin', NULL, NULL),
(2, '58746912', '$2y$10$BwktDKUTmEbKRGH/GCCNf.u1DAQ01.FMksxEybwcN1aeRArStEGo6', NULL, NULL, 58746912, 'pembimbing', '2023-06-20 22:48:13', '2023-06-20 22:48:13'),
(3, 'Arifiah@gmail.com', '$2y$10$4916cBZ.rxRNo59WsQ7i7uVyVmrJS7FTx5n1cEpFsnjUh37GS7DAa', '2010102211', NULL, NULL, 'siswa', '2023-06-20 22:48:13', '2023-06-20 22:48:13'),
(4, 'con@gmail.com', '$2y$10$fDnpzPi4t372pN1wuAUsl.CgcLrxijyo9NW1nOm4IhvB0Bv.vICEa', '2205200888', NULL, NULL, 'siswa', '2023-06-21 19:29:12', '2023-06-21 19:29:12'),
(5, 'Jhon@gmail.com', '$2y$10$OUnMnhm0j4Q55LpqsOVqvOfctfJHOOFIUkW45YMGaaLjn86B9ejbi', '2010102217', NULL, NULL, 'siswa', '2023-06-21 20:40:38', '2023-06-21 20:40:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bidang`
--

CREATE TABLE `data_bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bidang` varchar(191) DEFAULT NULL,
  `jenis_jurusan` enum('IT','Umum') DEFAULT NULL,
  `nisn` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_bidang`
--

INSERT INTO `data_bidang` (`id`, `nama_bidang`, `jenis_jurusan`, `nisn`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Komputer Jaringan', 'IT', NULL, '2023-06-20 22:47:02', '2023-06-20 22:47:02'),
(2, 'RPM', 'IT', NULL, '2023-06-20 22:48:13', '2023-06-20 22:48:13'),
(3, 'sistem informasi', 'IT', NULL, '2023-06-21 19:29:12', '2023-06-21 19:29:12'),
(4, '2', 'IT', NULL, '2023-06-21 20:40:37', '2023-06-21 20:40:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_magang`
--

CREATE TABLE `data_magang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surat_pengajuan` varchar(191) DEFAULT NULL,
  `paket_magang` enum('basic','exclusive') DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `judul_project` varchar(191) DEFAULT NULL,
  `status_magang` enum('Seleksi','Belum Bayar','Aktif','Lulus','Ditolak','Drop Out') DEFAULT NULL,
  `ukuran_baju` enum('S','M','L','XL','XXL') DEFAULT NULL,
  `bukti_pembayaran` varchar(191) DEFAULT NULL,
  `nisn` varchar(191) DEFAULT NULL,
  `bidang_id` varchar(191) DEFAULT NULL,
  `laporan_akhir` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_magang`
--

INSERT INTO `data_magang` (`id`, `surat_pengajuan`, `paket_magang`, `tanggal_pembayaran`, `judul_project`, `status_magang`, `ukuran_baju`, `bukti_pembayaran`, `nisn`, `bidang_id`, `laporan_akhir`, `created_at`, `updated_at`) VALUES
(1, 'sertifikat (34).pdf', 'exclusive', NULL, 'hahaha', 'Aktif', 'L', NULL, '2010102211', NULL, NULL, '2023-06-20 22:48:13', '2023-06-21 21:10:52'),
(2, 'Laporan  Praktikum Fina zulfa 857557876 5B.pdf', 'exclusive', NULL, 'test', 'Lulus', 'XL', '1687401059.jpg', '2205200888', NULL, NULL, '2023-06-21 19:29:12', '2023-06-21 19:36:09'),
(3, 'sertifikat (24).pdf', 'exclusive', NULL, NULL, 'Aktif', 'L', '1687409264.jpg', '2010102217', NULL, NULL, '2023-06-21 20:40:37', '2023-06-21 22:00:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_harian`
--

CREATE TABLE `kegiatan_harian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logbook` text DEFAULT NULL,
  `tanggal_logbook` date DEFAULT NULL,
  `dokumentasi` varchar(191) DEFAULT NULL,
  `admin_id` varchar(191) DEFAULT NULL,
  `siswa_id` varchar(191) DEFAULT NULL,
  `nisn` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan_harian`
--

INSERT INTO `kegiatan_harian` (`id`, `logbook`, `tanggal_logbook`, `dokumentasi`, `admin_id`, `siswa_id`, `nisn`, `created_at`, `updated_at`) VALUES
(1, 'qw', '2023-06-20', '1687407419.png', '1', '1', '2010102211', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen_penilaian`
--

CREATE TABLE `komponen_penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_komponen` varchar(191) DEFAULT NULL,
  `presentase` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komponen_penilaian`
--

INSERT INTO `komponen_penilaian` (`id`, `nama_komponen`, `presentase`, `created_at`, `updated_at`) VALUES
(1, 'Ahklak', 25, NULL, NULL),
(2, 'Keterampilan', 25, NULL, NULL),
(3, 'Skill', 25, NULL, NULL),
(4, 'Disiplin', 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
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
(78, '2023_03_25_041144_create_komponen_penilaian_table', 60),
(82, '2023_03_25_045549_create_kegiatan_harian_table', 64),
(83, '2023_03_25_050013_create_absen_table', 65),
(84, '2023_03_25_050427_create_penilaian_table', 66),
(99, '2023_03_24_070935_create_setting_magang_table', 80),
(100, '2023_05_10_015239_create_akuns_table', 81),
(101, '2023_03_25_050604_create_data_magang_table', 82),
(102, '2023_03_25_044936_create_siswa_table', 83),
(103, '2023_03_25_043720_create_pembimbing_table', 84),
(104, '2023_03_25_043443_create_data_bidang_table', 85),
(105, '2023_03_24_070625_create_sekolah_table', 86);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip_pembimbing` bigint(20) DEFAULT NULL,
  `nama_pembimbing` varchar(191) DEFAULT NULL,
  `no_wa_pembimbing` varchar(191) DEFAULT NULL,
  `format_laporan_akhir` varchar(191) DEFAULT NULL,
  `sekolah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `nip_pembimbing`, `nama_pembimbing`, `no_wa_pembimbing`, `format_laporan_akhir`, `sekolah_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 58746912, 'Rafa Aditya', '085713482807', NULL, 1, '$2y$10$DmDVvQ7vXcQBMQX6H66q/.vao7rAysJlWeMrMaFtglI9wlWTLI.BO', '2023-06-20 22:48:13', '2023-06-20 22:48:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Ahklak` bigint(20) NOT NULL,
  `Keterampilan` bigint(20) NOT NULL,
  `Skill` bigint(20) NOT NULL,
  `Disiplin` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_siswa`, `created_at`, `updated_at`, `Ahklak`, `Keterampilan`, `Skill`, `Disiplin`) VALUES
(1, 1, NULL, NULL, 50, 50, 50, 50),
(3, 2, NULL, NULL, 25, 25, 25, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(191) DEFAULT NULL,
  `alamat_sekolah` text DEFAULT NULL,
  `nis` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama_sekolah`, `alamat_sekolah`, `nis`, `created_at`, `updated_at`) VALUES
(1, 'SMK BUDI UTOMO', 'MEDAN', '1234567', '2023-06-20 22:46:47', '2023-06-20 22:46:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_magang`
--

CREATE TABLE `setting_magang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jam_Masuk_kerja` time DEFAULT NULL,
  `jam_Pulang_kerja` time DEFAULT NULL,
  `no_va` bigint(20) DEFAULT NULL,
  `Kuota_Magang` bigint(20) DEFAULT NULL,
  `Format_WA_Diterima` text DEFAULT NULL,
  `Format_WA_Ditolak` text DEFAULT NULL,
  `Format_Pembimbing` text DEFAULT NULL,
  `Format_Email` text DEFAULT NULL,
  `WA_Kantor` bigint(20) DEFAULT NULL,
  `Sertifikat` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting_magang`
--

INSERT INTO `setting_magang` (`id`, `jam_Masuk_kerja`, `jam_Pulang_kerja`, `no_va`, `Kuota_Magang`, `Format_WA_Diterima`, `Format_WA_Ditolak`, `Format_Pembimbing`, `Format_Email`, `WA_Kantor`, `Sertifikat`, `created_at`, `updated_at`) VALUES
(1, '07:00:00', '10:00:00', 7987488, 50, 'Selamat!!! kamu telah dinyatakan lulus seleksi dalam pendaftaran magang di PT Garuda Cyber Indonesia\r\n\r\nSilahkan melakukan pembayaran dengan nomor rekening berikut:', 'Mohon maaf, kamu dinyatakan belum lulus dalam seleksi pendaftaran magang di PT Garuda Cyber Indonesia\r\n\r\nSilahkan melakukan pendaftaran dan seleksi ulang untuk mendaftar magang kembali', 'Selamat!!! murid anda telah dinyatakan lulus seleksi dalam pendaftaran magang di PT Garuda Cyber Indonesia\r\n\r\nSilahkan masuk ke dalam sistem smart internship kami untuk melakukan pemantauan terhadap kegiatan murid anda selama kegiatan magang di PT Garuda Cyber Indonesia dengan akun berikut:', 'Selamat!!! email anda telah terdaftar untuk melakukan pendaftaran magang di PT Garuda Cyber Indonesia', 993474, '1687334605.jpg', '2023-06-20 22:33:15', '2023-06-20 22:33:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nama_siswa` varchar(191) NOT NULL,
  `no_wa` varchar(191) DEFAULT NULL,
  `sekolah_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(191) NOT NULL,
  `nip_pembimbing` bigint(20) UNSIGNED NOT NULL,
  `foto_siswa` varchar(191) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama_siswa`, `no_wa`, `sekolah_id`, `jurusan`, `nip_pembimbing`, `foto_siswa`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(1, '2010102211', 'Putri Anggun Arifiah', '085713482807', 1, '1', 58746912, 'ERD4.jpg', '2023-06-22', '2023-06-23', 'tesss', '2023-05-15', '2023-06-20 22:48:13', '2023-06-20 22:50:53'),
(2, '2205200888', 'Wilson Manurung', '082294749231', 1, 'sistem informasi', 58746912, 'tte.jfif', '2023-06-22', '2023-06-23', 'test', '2003-06-28', '2023-06-21 19:29:12', '2023-06-21 19:33:02'),
(3, '2010102217', 'Rizki Alfarizi', '088802421369', 1, '2', 58746912, 'ERD4.jpg', '2023-06-23', '2023-06-24', NULL, '2023-06-01', '2023-06-21 20:40:37', '2023-06-21 21:46:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `nisn` varchar(191) NOT NULL,
  `asal_sekolah` enum('SMA 1','SMA 2') NOT NULL,
  `jenis_jurusan` varchar(191) NOT NULL,
  `nama_jurusan` varchar(191) NOT NULL,
  `paket_magang` varchar(191) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nip_pembimbing` varchar(191) NOT NULL,
  `ukuran_baju` enum('S','M','L','XL','XXL') NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `surat_pengajuan` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akuns`
--
ALTER TABLE `akuns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akuns_username_unique` (`username`),
  ADD UNIQUE KEY `akuns_nisn_unique` (`nisn`);

--
-- Indeks untuk tabel `data_bidang`
--
ALTER TABLE `data_bidang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_bidang_nisn_unique` (`nisn`);

--
-- Indeks untuk tabel `data_magang`
--
ALTER TABLE `data_magang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_magang_nisn_unique` (`nisn`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komponen_penilaian`
--
ALTER TABLE `komponen_penilaian`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sekolah_nis_unique` (`nis`);

--
-- Indeks untuk tabel `setting_magang`
--
ALTER TABLE `setting_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `siswa_no_wa_unique` (`no_wa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `akuns`
--
ALTER TABLE `akuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_bidang`
--
ALTER TABLE `data_bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_magang`
--
ALTER TABLE `data_magang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_harian`
--
ALTER TABLE `kegiatan_harian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komponen_penilaian`
--
ALTER TABLE `komponen_penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_magang`
--
ALTER TABLE `setting_magang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
