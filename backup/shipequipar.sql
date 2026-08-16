-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2026 at 07:52 AM
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
-- Database: `shipequipar`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_r_markers`
--

CREATE TABLE `a_r_markers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `marker_image` varchar(255) NOT NULL,
  `model_file` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `a_r_markers`
--

INSERT INTO `a_r_markers` (`id`, `name`, `marker_image`, `model_file`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Container Vessel', '1786510851_1785774888_ShipMarker.jpg', '1786510851_ContainerShip.reality', 'Interactive 3D ship model for marine learning', '2026-08-11 21:00:51', '2026-08-11 21:00:51');

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
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_number` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `image`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Introduction To PPE', 'Covers the basics of workplace safety, legal duties, and why gear is your final line of defense against harm.', NULL, NULL, '2026-08-03 08:45:52', '2026-08-03 08:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `function` text NOT NULL,
  `model_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `module_id`, `name`, `image`, `description`, `function`, `model_file`, `created_at`, `updated_at`) VALUES
(1, 1, 'Protective Helmet', '1785770871_helmet.jpg', 'Safety helmet (hard hat) serves as the critical first line of defense against severe head trauma, brain injuries, and electrical shock.', 'Functions as an integrated protective system. It works continuously to counter the unique physical, electrical, and environmental hazards found on a vessel.', '1785770871_SafetyHelmetPPE1.reality', '2026-08-03 07:27:51', '2026-08-10 04:57:23'),
(2, 1, 'Safety Glasses', '1785771364_Glasses.jpg', 'Safety glasses for a marine engineer are specialized protective eyewear featuring tough polycarbonate lenses, side shields and anti-fog coatings to withstand humid engine rooms and high-impact mechanical tasks.', 'Safety glasses for marine engineers shield eyes from mechanical impacts, chemical splashes, and optical radiation, preventing injuries from flying debris, sparks, fluid and welding arcs.', '1785771364_SafetyGlassesPPE2.reality', '2026-08-03 07:36:04', '2026-08-03 08:27:09'),
(3, 1, 'Safety Gloves', '1785771539_Glove.jpg', 'Safety gloves for marine engineers are specialized heavy-duty hand protection, synthetic/nitrile-coated mechanical gloves, and chemical-resistant rubber gauntlets.', 'Safety gloves for marine engineers protect against mechanical, chemical, and thermal hazards, using specialized variants to optimize protection and grip in wet or oily environments.', '1785771539_SafetyGlovesPPE3.reality', '2026-08-03 07:38:59', '2026-08-03 08:25:55'),
(4, 1, 'Coverall Safety Suit', '1785771801_Coverall.jpg', 'A marine engineering coverall is a one-piece, flame-retardant garment with high-visibility strips and utility pockets that protects against heat, oil, and mechanical hazards.', 'Marine engineering coveralls provide full-body, durable protection against hot oil, machinery burns and minor chemical splashes while enhancing crew visibility.', '1785771801_CoverallPPE4.reality', '2026-08-03 07:43:21', '2026-08-03 08:29:20'),
(5, 1, 'Safety Boots', '1785771999_SafetyBoot.jpg', 'Safety boots for a marine engineer are specialized heavy-duty footwear designed with slip-resistant outsoles, waterproof construction, and protective toe caps.', 'Safety boots for marine engineers function by providing critical protection against heavy falling tools, slippery wet steel decks, oil spills, and electrical hazards in engine rooms.', '1785771999_SafetyBootsPPE5.reality', '2026-08-03 07:46:39', '2026-08-03 07:46:39');

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
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `title`, `content`, `video`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'Introduction To PPE', 'This lesson introduces the importance of Personal Protective Equipment (PPE) in the maritime industry. Learners will understand different types of safety equipment, their functions and how PPE helps protect marine engineers from workplace hazards.', 'https://youtu.be/HTFRdrOIldY?si=sG_0JDZRAHwz_SYk', '50 second', '2026-08-03 09:12:04', '2026-08-03 09:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_questions`
--

CREATE TABLE `lesson_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2026_07_29_144536_add_role_to_users_table', 1),
(5, '2026_07_29_154525_create_modules_table', 1),
(6, '2026_07_30_055432_create_equipment_table', 1),
(7, '2026_07_30_064432_create_a_r_markers_table', 1),
(8, '2026_07_31_034327_create_quizzes_table', 1),
(9, '2026_07_31_034626_create_questions_table', 1),
(10, '2026_07_31_034634_create_user_quiz_progress_table', 1),
(11, '2026_08_03_144611_create_courses_table', 1),
(12, '2026_08_03_144834_create_lessons_table', 1),
(13, '2026_08_03_145008_create_progress_table', 2),
(14, '2026_08_03_145042_create_certificates_table', 2),
(15, '2026_08_03_145633_create_lesson_questions_table', 2),
(16, '2026_08_03_170940_change_duration_column_in_lessons_table', 3),
(17, '2026_08_03_180328_add_course_id_to_progress_table', 4),
(18, '2026_08_03_180522_add_status_to_progress_table', 5),
(19, '2026_08_04_125642_add_video_to_modules_table', 6),
(20, '2026_08_04_154319_add_role_to_users_table', 7),
(21, '2026_08_06_101017_create_notes_table', 8),
(22, '2026_08_10_101504_add_module_id_to_notes_table', 9),
(23, '2026_08_10_102415_add_pdf_to_notes_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `function` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `title`, `category`, `description`, `function`, `image`, `created_at`, `updated_at`, `video`) VALUES
(1, 'PPE Marine Engineers', 'Safety Equipments', 'Marine Personal Protective Equipment (PPE) is specialized safety gear worn by marine engineers and crew members to prevent injuries from harsh shipboard hazards like heavy machinery, loud noise and chemical exposure.', 'To act as a vital last line of defense, safeguarding crew members from severe workplace injuries and environmental hazards onboard ships', '1785770358.jpg', '2026-08-03 07:19:18', '2026-08-10 23:18:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'enrolled',
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `video_completed` tinyint(1) NOT NULL DEFAULT 0,
  `quiz_completed` tinyint(1) NOT NULL DEFAULT 0,
  `score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `user_id`, `course_id`, `status`, `lesson_id`, `video_completed`, `quiz_completed`, `score`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'enrolled', 1, 0, 0, 0, '2026-08-03 10:16:11', '2026-08-03 10:16:11'),
(2, 12, 1, 'enrolled', 1, 0, 0, 0, '2026-08-10 19:08:30', '2026-08-10 19:08:30'),
(3, 13, 1, 'enrolled', 1, 0, 0, 0, '2026-08-10 23:13:33', '2026-08-10 23:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('jmSHmfIsSoBuO9eH1epDy5s8qn2Tm7HUNSl8JK2z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid012Q1E5Y0hPTElKSGtjdUIxR0NQdkJ6aTltRXhOYkFPMzFnQkdqUCI7czo1OiJlcnJvciI7czoxNjoiU2Vzc2lvbiBleHBpcmVkLiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjE6e2k6MDtzOjU6ImVycm9yIjt9fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vY291cnNlIjtzOjU6InJvdXRlIjtzOjEyOiJjb3Vyc2UuaW5kZXgiO319', 1786588869),
('nOaNkiYw2k7gBOh8fKRnb44GuiV048iuFzg9k6jk', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTTFtQzM2c1hSanNXazh0MFMzVDNoVmFJVVJ3dEZzMDFwOE15OVN2NyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1786593277);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Aqashah', 'admin@shipequipar.com', NULL, '$2y$12$H/jJUtRv/yhMG/8tiy5pxerULudf7ra.G5IP5XFMMj8c9cghPDqFy', NULL, '2026-08-03 07:15:13', '2026-08-10 00:05:58', 'admin'),
(2, 'user', 'user@shipequipar.com', NULL, '$2y$12$MKTV5F0eF8mmLQJqw.yMqOj.yBle2u0Lwy8Cph1AR8blAf0e1SM4a', NULL, '2026-08-03 07:16:25', '2026-08-03 07:16:25', 'user'),
(11, 'Ilman', 'ilman@gmail.com', NULL, '$2y$12$4FJcre3WVdii3RMZEsvrJ.GqD43TqV3VEfjnUzb70QoUqSycqxkh6', NULL, '2026-08-10 06:03:33', '2026-08-10 06:03:33', 'user'),
(12, 'Uman', 'uman@gmail.com', NULL, '$2y$12$6TwHFnIcGSaZHq2u/35MgeAAfTTFHzp9ovNa0gRfCOP9trL2Crupi', NULL, '2026-08-10 19:04:03', '2026-08-10 19:27:38', 'user'),
(13, 'uman06', 'uman06@gmail.com', NULL, '$2y$12$.aw61LoBuWZfjgQE4DycCOIGtK87CV/7whnCCrn2kIEJVPLCCXwsG', NULL, '2026-08-10 23:09:13', '2026-08-10 23:09:13', 'user'),
(15, 'Qayyim', 'qayyimrifqi05@gmail.com', NULL, '$2y$12$rf.5Vh/IC2HStauW3WzsE.mbzsTYhdJSKApoi9T0Z3JoaiH83ABfG', NULL, '2026-08-11 22:59:57', '2026-08-11 22:59:57', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_progress`
--

CREATE TABLE `user_quiz_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_r_markers`
--
ALTER TABLE `a_r_markers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_user_id_foreign` (`user_id`),
  ADD KEY `certificates_course_id_foreign` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_module_id_foreign` (`module_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Indexes for table `lesson_questions`
--
ALTER TABLE `lesson_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_questions_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_module_id_foreign` (`module_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_user_id_foreign` (`user_id`),
  ADD KEY `progress_lesson_id_foreign` (`lesson_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_module_id_foreign` (`module_id`);

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
-- Indexes for table `user_quiz_progress`
--
ALTER TABLE `user_quiz_progress`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_r_markers`
--
ALTER TABLE `a_r_markers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lesson_questions`
--
ALTER TABLE `lesson_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_quiz_progress`
--
ALTER TABLE `user_quiz_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_questions`
--
ALTER TABLE `lesson_questions`
  ADD CONSTRAINT `lesson_questions_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`),
  ADD CONSTRAINT `progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
