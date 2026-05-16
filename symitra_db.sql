-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2026 at 07:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symitra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `hardware_nb_pcs`
--

CREATE TABLE `hardware_nb_pcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `mac_address` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_nb_pcs`
--

INSERT INTO `hardware_nb_pcs` (`id`, `item_name`, `brand`, `model_type`, `serial_number`, `mac_address`, `username`, `project`, `location`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'testing 3', 'lenovo', 'laptop', '123', '6231', 'ragil_nur_rasyid', 'testing', 'Yogyakarta', 'percobaaan pertama', '2026-05-15 12:20:02', '2026-05-15 20:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `hardware_other_devices`
--

CREATE TABLE `hardware_other_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_other_devices`
--

INSERT INTO `hardware_other_devices` (`id`, `item_name`, `brand`, `model_type`, `serial_number`, `mac_address`, `username`, `project`, `location`, `remark`, `created_at`, `updated_at`) VALUES
(2, 'testing 2', 'apapun', 'komputer', '58694', '38383', 'admin', 'buat coba', 'jakarta', 'jakartajakartajakartajakartajakartajakartajakartajakartajakartajakartajakarta', '2026-05-15 20:51:01', '2026-05-15 20:51:01'),
(3, 'testing 2', 'zzzzz', 'laptop', 'zzzz', 'zzz', NULL, NULL, 'Yogyakarta', NULL, '2026-05-15 20:51:25', '2026-05-15 20:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `hardware_printer_copiers`
--

CREATE TABLE `hardware_printer_copiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `mac_address` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_printer_copiers`
--

INSERT INTO `hardware_printer_copiers` (`id`, `item_name`, `brand`, `model_type`, `serial_number`, `mac_address`, `username`, `project`, `location`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'testing 2', 'samsung', 'hp', '321', '6231', 'rasyid', 'testing', 'Yogyakarta', 'aaaa', '2026-05-15 12:20:58', '2026-05-15 12:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `ip_address_lists`
--

CREATE TABLE `ip_address_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ip_address_lists`
--

INSERT INTO `ip_address_lists` (`id`, `ip_address`, `username`, `department`, `device`, `location`, `remark`, `created_at`, `updated_at`) VALUES
(3, '2222', 'aaaaaa', 'Finance', 'Copier', 'aaaa', 'aajaja', '2026-05-15 22:08:30', '2026-05-15 22:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_departments`
--

CREATE TABLE `master_departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_code` varchar(255) NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_departments`
--

INSERT INTO `master_departments` (`id`, `dept_name`, `dept_code`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'IT01', 'Information Technology', NULL, NULL),
(2, 'HRD', 'HR01', 'Human Resource', NULL, NULL),
(3, 'Finance', 'FIN', 'Finance & Accounting', NULL, NULL),
(4, 'Project', 'PRJ', 'Site Project', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_hardware_devices`
--

CREATE TABLE `master_hardware_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_hardware_devices`
--

INSERT INTO `master_hardware_devices` (`id`, `device_name`, `created_at`, `updated_at`) VALUES
(1, 'Notebook', NULL, NULL),
(2, 'CPU', NULL, NULL),
(3, 'Monitor', NULL, NULL),
(4, 'Printer', NULL, NULL),
(5, 'Copier', NULL, NULL),
(6, 'Router', NULL, NULL),
(7, 'Server', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_locations`
--

CREATE TABLE `master_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_locations`
--

INSERT INTO `master_locations` (`id`, `location_name`, `created_at`, `updated_at`) VALUES
(1, 'Head Office – Balikpapan', NULL, NULL),
(2, 'Site Project – Handil', NULL, NULL),
(3, 'Warehouse – Samboja', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_projects`
--

CREATE TABLE `master_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_projects`
--

INSERT INTO `master_projects` (`id`, `project_name`, `project_code`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CSPB', 'CSPB', NULL, NULL, NULL),
(2, 'CWSR', 'CWSR', NULL, NULL, NULL),
(3, 'HO', 'HO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_15_162844_create_hardware_nb_pcs_table', 1),
(5, '2026_05_15_163227_create_ip_address_lists_table', 1),
(6, '2026_05_15_163246_create_remote_accesses_table', 1),
(7, '2026_05_15_184758_create_hardware_other_devices_table', 1),
(8, '2026_05_15_184758_create_hardware_printer_copiers_table', 1),
(9, '2026_05_15_194343_create_ip_address_lists_table', 2),
(10, '2026_05_15_194343_create_remote_accesses_table', 2),
(11, '2026_05_16_043647_create_master_departments_table', 3),
(12, '2026_05_16_045628_create_master_hardware_devices_table', 4),
(13, '2026_05_16_051703_create_master_locations_table', 5),
(14, '2026_05_16_052000_create_master_projects_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remote_accesses`
--

CREATE TABLE `remote_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `project` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `remote_accesses`
--

INSERT INTO `remote_accesses` (`id`, `device_type`, `username`, `app_name`, `device_id`, `password`, `project`, `location`, `created_at`, `updated_at`) VALUES
(1, 'PC Desktop', 'hhh', 'TeamViewer', '0000', '8888', 'gg', 'ggg', '2026-05-15 12:59:31', '2026-05-15 12:59:31'),
(2, 'Notebook', 'testing', 'UltraViewer', '123', 'aku ', 'CSPB', 'Site Project – Handil', '2026-05-15 22:51:01', '2026-05-15 22:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('KnEN42u96ZthrP0YRygpaJ0KTQYFudbT9CN1lfE5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOTdCT2V4MHM2enA3akVwdEtkZUxQTmxTaGhadEJYS0ZIQnp1eVJUMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1778910745);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'biru', 'akirasy261@gmail.com', NULL, '$2y$12$r6xOrZLkOJYht4KTyf9LhudkqAnBHFkzVHF54WBRnENKIK9UBPiIy', 'sIkz99tb6CcpoUEucmz0Zhsjunn5n0xrrOTPzvo26R5ddNqKvnEVZj5HlAvI', '2026-05-15 12:19:38', '2026-05-15 12:19:38'),
(2, 'melinda ayu', 'melinda@gmail.com', NULL, '$2y$12$dE47MbenZ3IEwvh/j5teBORV/MrmFAuP73UXcVeq/Cj5gtRWNjDyq', 'rb2H2V9rz8L4Wsw0wgZct3m5lTGhnLvYaP0UaIBcGm6SQaAHxikx1kWdhKUy', '2026-05-15 20:04:43', '2026-05-15 20:05:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hardware_nb_pcs`
--
ALTER TABLE `hardware_nb_pcs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hardware_nb_pcs_serial_number_unique` (`serial_number`);

--
-- Indexes for table `hardware_other_devices`
--
ALTER TABLE `hardware_other_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hardware_other_devices_serial_number_unique` (`serial_number`);

--
-- Indexes for table `hardware_printer_copiers`
--
ALTER TABLE `hardware_printer_copiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hardware_printer_copiers_serial_number_unique` (`serial_number`);

--
-- Indexes for table `ip_address_lists`
--
ALTER TABLE `ip_address_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip_address_lists_ip_address_unique` (`ip_address`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_departments`
--
ALTER TABLE `master_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_hardware_devices`
--
ALTER TABLE `master_hardware_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_locations`
--
ALTER TABLE `master_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_projects`
--
ALTER TABLE `master_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `remote_accesses`
--
ALTER TABLE `remote_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hardware_nb_pcs`
--
ALTER TABLE `hardware_nb_pcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hardware_other_devices`
--
ALTER TABLE `hardware_other_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hardware_printer_copiers`
--
ALTER TABLE `hardware_printer_copiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ip_address_lists`
--
ALTER TABLE `ip_address_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_departments`
--
ALTER TABLE `master_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_hardware_devices`
--
ALTER TABLE `master_hardware_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_locations`
--
ALTER TABLE `master_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_projects`
--
ALTER TABLE `master_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `remote_accesses`
--
ALTER TABLE `remote_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
