-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2026 at 05:32 PM
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-ragil@gmail.com|127.0.0.1', 'i:1;', 1779017529),
('laravel-cache-ragil@gmail.com|127.0.0.1:timer', 'i:1779017529;', 1779017529),
('laravel-cache-rasyid@gmail.com|127.0.0.1', 'i:1;', 1779017547),
('laravel-cache-rasyid@gmail.com|127.0.0.1:timer', 'i:1779017547;', 1779017547);

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
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_nb_pcs`
--

INSERT INTO `hardware_nb_pcs` (`id`, `item_name`, `brand`, `model_type`, `serial_number`, `mac_address`, `username`, `project`, `location`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'notebook', 'lenovo', 'laptop', '123', '6231', 'user1', 'CSPB', 'Head Office – Balikpapan', 4, '2026-05-17 00:40:48', '2026-05-17 08:24:31'),
(2, 'Notebook', 'Notebook', 'Notebook', '345', '354', 'Notebook', 'CWSR', 'Site Project – Handil', 2, '2026-05-17 01:39:10', '2026-05-17 01:39:10'),
(3, 'Computer', 'lg', 'intel', '44322', '2222', 'biru', 'CWSR', 'Samboja', 1, '2026-05-17 08:23:33', '2026-05-17 08:24:13'),
(4, 'Notebook', 'samsung', 'ryzen', '8584', '92929', 'admin', 'CWSR', 'Head Office – Balikpapan', 2, '2026-05-17 08:26:35', '2026-05-17 08:26:35');

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
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hardware_printer_copiers`
--

INSERT INTO `hardware_printer_copiers` (`id`, `item_name`, `brand`, `model_type`, `serial_number`, `mac_address`, `username`, `project`, `location`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Copier', 'zzzzz', 'Ryzen', '566', '896', 'aaaa', 'CSPB', 'Head Office – Balikpapan', 1, '2026-05-17 01:40:12', '2026-05-17 01:40:12'),
(2, 'Printer', 'lg', 'lg', '345', '4322', 'user1', 'CSPB', 'Head Office – Balikpapan', 4, '2026-05-17 08:18:57', '2026-05-17 08:18:57'),
(3, 'Printer', 'ryzen', 'ryzen', '5556', '49494', 'user5', 'CSPB', 'Samboja', 3, '2026-05-17 08:19:58', '2026-05-17 08:20:38');

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
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ip_address_lists`
--

INSERT INTO `ip_address_lists` (`id`, `ip_address`, `username`, `department`, `device`, `location`, `remark`, `created_at`, `updated_at`) VALUES
(1, '192.168.1.104', 'Test', 'HRD', 'Notebook', 'Head Office – Balikpapan', 'testing 1', '2026-05-17 00:39:30', '2026-05-17 00:40:02');

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
(4, 'Project', 'PRJ', 'Site Project', NULL, NULL),
(5, 'BOD', 'BOD', 'BOD', NULL, NULL),
(6, 'Asset', 'AST', 'Asset Management', NULL, NULL),
(7, 'Procurement', 'PRC', 'Procurement', NULL, NULL);

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
(6, 'Router', NULL, NULL);

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
(3, 'Samboja', '2026-05-17 08:01:22', '2026-05-17 08:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `master_projects`
--

CREATE TABLE `master_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_projects`
--

INSERT INTO `master_projects` (`id`, `project_code`, `project_name`, `created_at`, `updated_at`) VALUES
(1, 'CSPB', 'CSPB', '2026-05-17 00:16:04', '2026-05-17 00:16:04'),
(2, 'CWSR', 'CWSR', '2026-05-17 00:16:04', '2026-05-17 00:16:04'),
(3, 'HO', 'HO', '2026-05-17 00:16:04', '2026-05-17 00:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `master_statuses`
--

CREATE TABLE `master_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `status_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_statuses`
--

INSERT INTO `master_statuses` (`id`, `status_name`, `status_color`, `created_at`, `updated_at`) VALUES
(1, 'Normal (stock)', NULL, '2026-05-17 00:16:04', '2026-05-17 00:16:04'),
(2, 'Normal (in use)', NULL, '2026-05-17 00:16:04', '2026-05-17 00:16:04'),
(3, 'Maintenance', NULL, '2026-05-17 00:16:04', '2026-05-17 00:16:04'),
(4, 'Broken', NULL, '2026-05-17 00:16:04', '2026-05-17 00:16:04');

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
(5, '2026_05_15_184758_create_hardware_other_devices_table', 1),
(6, '2026_05_15_184758_create_hardware_printer_copiers_table', 1),
(7, '2026_05_15_194343_create_ip_address_lists_table', 1),
(8, '2026_05_15_194343_create_remote_accesses_table', 1),
(9, '2026_05_16_043647_create_master_departments_table', 1),
(10, '2026_05_16_045628_create_master_hardware_devices_table', 1),
(11, '2026_05_16_051703_create_master_locations_table', 1),
(12, '2026_05_17_032153_create_master_projects_table', 1),
(13, '2026_05_17_064702_create_master_statuses_table', 1),
(15, '2026_05_17_070000_update_remarks_to_status_id_in_related_tables', 2);

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
(1, 'Notebook', 'Renata', 'UltraViewer', '12345678', 'abcdefgh', 'CSPB', 'Site Project – Handil', '2026-05-17 00:27:48', '2026-05-17 00:27:48'),
(2, 'Notebook', 'Renata', 'UltraViewer 2', '12345678', 'abcdefgh', 'CSPB', 'Site Project – Handil', '2026-05-17 00:27:48', '2026-05-17 00:28:12');

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
('mDiJav3V0ihIfjfuBTWS2UHmiXJa8meTkSFy6V5f', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiekxSQzgwN0taUGx2RERXN2hqS1ZQRXlBWnRTZDIyRzNDamlJOXRRYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pcC1saXN0IjtzOjU6InJvdXRlIjtzOjc6ImlwLWxpc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiJhZDUwMDFlODAwNzI2OTExMzMwZTFjNTJjNzMwYzkyOGNiZGU4OWJlZmIwMmM1MzIyZmM3NDIzOTU5YWFmYWRhIjt9', 1779024668),
('O9M0Sd9YHigzD9qP9UWALHt0C9egvFloDaK7CDlD', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidXB3M0FtVmhNOWFUYlMxQ3lDNE1vak9ZZFo4ZnBRT0Ztb28zSklIRCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjQ6ImFkNTAwMWU4MDA3MjY5MTEzMzBlMWM1MmM3MzBjOTI4Y2JkZTg5YmVmYjAyYzUzMjJmYzc0MjM5NTlhYWZhZGEiO30=', 1779031716);

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
(1, 'Administrator SYMITRA', 'admin@symitra.com', '2026-05-17 00:16:05', '$2y$12$jd/3XMBIt0v1z0WOqrxdAejEjZ3wZQZfIwFxKtDPZVOeZ5C4aHfhe', 'y3c06WcRmf', '2026-05-17 00:16:05', '2026-05-17 00:16:05');

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
  ADD UNIQUE KEY `hardware_nb_pcs_serial_number_unique` (`serial_number`),
  ADD KEY `hardware_nb_pcs_status_id_foreign` (`status_id`);

--
-- Indexes for table `hardware_other_devices`
--
ALTER TABLE `hardware_other_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hardware_other_devices_serial_number_unique` (`serial_number`),
  ADD KEY `hardware_other_devices_status_id_foreign` (`status_id`);

--
-- Indexes for table `hardware_printer_copiers`
--
ALTER TABLE `hardware_printer_copiers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hardware_printer_copiers_serial_number_unique` (`serial_number`),
  ADD KEY `hardware_printer_copiers_status_id_foreign` (`status_id`);

--
-- Indexes for table `ip_address_lists`
--
ALTER TABLE `ip_address_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip_address_lists_ip_address_unique` (`ip_address`),
  ADD KEY `ip_address_lists_status_id_foreign` (`remark`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_projects_project_code_unique` (`project_code`);

--
-- Indexes for table `master_statuses`
--
ALTER TABLE `master_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_statuses_status_name_unique` (`status_name`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hardware_other_devices`
--
ALTER TABLE `hardware_other_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hardware_printer_copiers`
--
ALTER TABLE `hardware_printer_copiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ip_address_lists`
--
ALTER TABLE `ip_address_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_departments`
--
ALTER TABLE `master_departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_hardware_devices`
--
ALTER TABLE `master_hardware_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `master_statuses`
--
ALTER TABLE `master_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `remote_accesses`
--
ALTER TABLE `remote_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hardware_nb_pcs`
--
ALTER TABLE `hardware_nb_pcs`
  ADD CONSTRAINT `hardware_nb_pcs_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `master_statuses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `hardware_other_devices`
--
ALTER TABLE `hardware_other_devices`
  ADD CONSTRAINT `hardware_other_devices_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `master_statuses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `hardware_printer_copiers`
--
ALTER TABLE `hardware_printer_copiers`
  ADD CONSTRAINT `hardware_printer_copiers_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `master_statuses` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
