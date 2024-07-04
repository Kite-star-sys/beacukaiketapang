-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2024 at 06:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beacukaiketapang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Kepala Kantor','Staf Pelayanan','Staf II') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nip`, `nama`, `jk`, `tlp`, `alamat`, `role`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '1234567890112233', 'Kepala Kantor Beacukai', 'Laki-laki', '08987876514', 'Jl. M.Tohir No.26-27, Kabupaten Ketapang, Kalimantan Barat', 'Kepala Kantor', 'kepalakantor@gmail.com', '$2y$12$j0zirLno8OdcjIssHJJyD.c2BrIAiHO7EWhz2SRMHeUv3o3AsPlia', NULL, NULL),
(2, '1212121212121212', 'Jaka Wahyu Hidayat', 'Laki-laki', '123123123123', 'Jl. M.Tohir No.26-27, Kabupaten Ketapang, Kalimantan Barat', 'Staf Pelayanan', 'stafpelayanan@gmail.com', '$2y$12$jmFE8XLfGpDTX.tA2SgFKuR9s6C6vvuwYGNRG7e6uGvYv3rasSWMW', NULL, '2024-06-28 09:08:27'),
(3, '1234512345123456', 'Muhammad Aprizal', 'Laki-laki', '087845678765', 'Jln.R.Suprapto, Gg.Tengah, Kab.Ketapang', 'Staf II', 'stafII@gmail.com', '$2y$12$jmFE8XLfGpDTX.tA2SgFKuR9s6C6vvuwYGNRG7e6uGvYv3rasSWMW', '2024-06-27 16:32:29', '2024-06-27 16:32:29'),
(4, '12341234', 'Aku', 'Laki-laki', '985476475', 'Jln.Sesat', 'Staf Pelayanan', 'aku@gmail.com', '$2y$12$jmFE8XLfGpDTX.tA2SgFKuR9s6C6vvuwYGNRG7e6uGvYv3rasSWMW', '2024-06-28 09:07:45', '2024-06-28 09:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id` int UNSIGNED NOT NULL,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id`, `nama_instansi`, `alamat_lengkap`, `tlp`, `jabatan`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Kependudukan Dan Catatan Sipil', '5X4H+74X, Tengah, Delta Pawan, Ketapang Regency, West Kalimantan 78811', '085752049976', 'Kep.Kepegawaian', 'dukcapilketapang@gmail.com', '$2y$12$RHWuKeV5Hv/IGlFSRXPdR.N4XpB9IdqRwaSHV0Bhv6SACcpL/LRX6', '2024-06-27 07:26:36', '2024-06-27 07:26:36'),
(2, 'Pt.Rokok', 'Jln.Jalan Jalan', '12345', 'Kepala Cabang', 'ptrokok@gmail.com', '$2y$12$OYxmJpJRuJ4kWkamCvp5K.Z9oeZ0FVrf7.op/uCSgndt.pYBBj4GC', '2024-06-28 09:10:52', '2024-06-28 09:10:52'),
(3, 'Dinas Kesehatan Kabupaten Ketapang', 'JL. Mayjend Jl. DI Panjaitan No.40, Kantor, Kec. Delta Pawan, Kabupaten Ketapang, Kalimantan Barat 78821', '(0561) 32253', 'Kep.Dinas', 'dinaskesehatan@gmail.com', '$2y$12$mai8StncGXmRJ01r9OEoHupMkXxeXJJNPH76FJnTXbLZ/nN.SHbe.', '2024-06-28 14:54:52', '2024-06-28 14:54:52'),
(4, 'Pt.Kalbacohitam', 'Jl.Btn Gerbang Mutiara A.10', '081350878844', 'Kepala  PtKalbacohitam', 'kalbacohitam@gmail.com', '$2y$12$Dz.MPUkBCbbskZlGShuQDOrqMueQ0GPbOWp0Vdyfe/8mIetoJiW6S', '2024-07-02 07:00:45', '2024-07-02 07:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `id` int NOT NULL,
  `nama_layanan` longtext NOT NULL,
  `ket_layanan` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`id`, `nama_layanan`, `ket_layanan`, `created_at`, `updated_at`) VALUES
(1, 'pelayanan MPPBKC', 'Izin untuk menjalnkan kegiatan sebagai pengusaha pabrik', '2024-06-27 18:15:15', '2024-07-02 07:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendukung`
--

CREATE TABLE `tbl_pendukung` (
  `id` int UNSIGNED NOT NULL,
  `kode_surat` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_layanan` int NOT NULL,
  `file_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pendukung`
--

INSERT INTO `tbl_pendukung` (`id`, `kode_surat`, `id_layanan`, `file_pendukung`, `created_at`, `updated_at`) VALUES
(1, '', 1, 'app/Pendukung/7pLGacFLd9rfbVlcY9S3RobwAX3sxc5J6cO4B5tS.pdf', '2024-07-02 15:47:22', '2024-07-02 15:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persyaratan`
--

CREATE TABLE `tbl_persyaratan` (
  `id` int NOT NULL,
  `id_layanan` int NOT NULL,
  `ket_persyaratan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_persyaratan`
--

INSERT INTO `tbl_persyaratan` (`id`, `id_layanan`, `ket_persyaratan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Peryaratan NPPBKC', '2024-06-28 13:26:41', '2024-07-02 07:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id` int UNSIGNED NOT NULL,
  `kode_surat` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instansi` int NOT NULL,
  `id_layanan` int NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id`, `kode_surat`, `id_instansi`, `id_layanan`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, 'hgjASHDH76563465', 1, 1, 'app/Pengajuan/3PUGFld5f9ozJdohLNN8Y1frclFbFtUcX5MoxNHi.pdf', 'Kjdhajkshdjkahsjkdhakshdkajsdasd', '2024-07-02 15:47:22', '2024-07-02 15:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_surat`
--

CREATE TABLE `tracking_surat` (
  `id` int NOT NULL,
  `kode_surat` char(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pengirim` int NOT NULL,
  `id_penerima` int NOT NULL,
  `file_lampiran` longtext NOT NULL,
  `ket_tracking` longtext NOT NULL,
  `status_tracking` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tracking_surat`
--

INSERT INTO `tracking_surat` (`id`, `kode_surat`, `id_pengirim`, `id_penerima`, `file_lampiran`, `ket_tracking`, `status_tracking`, `created_at`, `updated_at`) VALUES
(4, 'hgjASHDH76563465', 1, 1, '', 'Surat ini diinput oleh Dinas Kependudukan Dan Catatan Sipil', 'Baru dikirim dari Dinas Kependudukan Dan Catatan Sipil', '2024-07-02 15:47:22', '2024-07-02 15:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pendukung`
--
ALTER TABLE `tbl_pendukung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_persyaratan`
--
ALTER TABLE `tbl_persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking_surat`
--
ALTER TABLE `tracking_surat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pendukung`
--
ALTER TABLE `tbl_pendukung`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_persyaratan`
--
ALTER TABLE `tbl_persyaratan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tracking_surat`
--
ALTER TABLE `tracking_surat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
