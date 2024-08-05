-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2024 at 09:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `state` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `doctor_id`, `patient_id`, `date`, `time`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '1989-06-03', '17:02:51', 1, NULL, NULL),
(2, 2, 3, '2008-05-19', '22:56:55', 1, NULL, NULL),
(3, 3, 5, '2009-01-30', '14:53:45', 0, NULL, NULL),
(4, 2, 3, '2019-11-09', '17:37:54', 0, NULL, NULL),
(5, 3, 9, '2006-06-21', '09:38:10', 0, NULL, NULL),
(6, 3, 4, '1984-07-27', '15:47:23', 1, NULL, NULL),
(7, 6, 8, '2009-05-27', '06:38:35', 0, NULL, NULL),
(8, 5, 5, '2024-08-02', '12:22:52', 0, NULL, NULL),
(9, 8, 1, '2024-08-02', '01:17:29', 0, NULL, NULL),
(10, 8, 7, '2024-08-02', '10:35:21', 0, NULL, NULL),
(11, 1, 11, '2024-08-02', '04:59:04', 1, NULL, NULL),
(12, 11, 14, '2024-08-02', '09:07:51', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `phone_number`, `specialization_id`, `created_at`, `updated_at`) VALUES
(1, 'Declan Upton DDS', '+1.323.645.7485', 2, NULL, NULL),
(2, 'Luella Zulauf', '(623) 463-8799', 2, NULL, NULL),
(3, 'Neva Spinka', '+1 (302) 472-9376', 4, NULL, NULL),
(4, 'Prof. Meggie Effertz I', '1-650-959-5629', 2, NULL, NULL),
(5, 'Kade Weber', '206.399.0098', 7, NULL, NULL),
(6, 'Raul Kirlin', '+1-209-645-3379', 2, NULL, NULL),
(7, 'Dayton Collier', '(713) 414-0626', 6, NULL, NULL),
(8, 'Kristoffer Stoltenberg IV', '1-747-776-0602', 10, NULL, NULL),
(9, 'Prof. Winifred Erdman MD', '629.800.5468', 6, NULL, NULL),
(10, 'Wilfred Sanford', '(253) 210-6636', 11, NULL, NULL),
(11, 'Kyler Wiegand', '320.836.3680', 4, NULL, NULL),
(12, 'Miss Alycia Goldner', '+1.330.923.2213', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_07_31_122811_create_specializations_table', 1),
(7, '2024_07_31_122933_create_doctors_table', 1),
(8, '2024_07_31_122938_create_patients_table', 1),
(9, '2024_07_31_122947_create_appointments_table', 1),
(10, '2024_07_31_122956_create_reviews_table', 1),
(11, '2024_07_31_123019_create_reports_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phone_number`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Cristian Howe', '1-352-435-3367', '1991-07-18', NULL, NULL),
(2, 'Cicero Boyle', '+1-323-518-6126', '2007-07-18', NULL, NULL),
(3, 'Leonard Williamson', '+1-914-712-1355', '2020-11-04', NULL, NULL),
(4, 'Mr. Westley Reichert II', '+1-480-958-4205', '1973-07-06', NULL, NULL),
(5, 'Schuyler Howe', '+18134134956', '1971-01-09', NULL, NULL),
(6, 'Aleen Nikolaus', '+1 (479) 364-9838', '2017-11-08', NULL, NULL),
(7, 'Prof. Destin Bernier III', '1-812-323-1906', '2011-07-02', NULL, NULL),
(8, 'Deonte Torp', '872.919.3665', '2003-06-19', NULL, NULL),
(9, 'Gracie Schulist', '+1.469.302.5048', '2004-09-11', NULL, NULL),
(10, 'Meghan Hahn', '(341) 688-2478', '1981-03-19', NULL, NULL),
(11, 'Ms. Rhea Runolfsdottir III', '+17408537233', '1985-10-16', NULL, NULL),
(12, 'Leola Bradtke', '+1-707-716-2617', '1998-12-18', NULL, NULL),
(13, 'Jaden Durgan', '281.817.6904', '2008-06-10', NULL, NULL),
(14, 'Prof. Sonya Bahringer', '1-252-474-7947', '1998-04-04', NULL, NULL),
(15, 'Kyra Dicki', '267-372-8354', '1978-08-05', NULL, NULL),
(16, 'Iva Gibson', '346.636.5242', '1977-04-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `appointment_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `appointment_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dr.', NULL, NULL),
(2, 1, 'Dr.', NULL, NULL),
(3, 3, 'Miss', NULL, NULL),
(4, 2, 'Prof.', NULL, NULL),
(5, 3, 'Mr.', NULL, NULL),
(6, 3, 'Mr.', NULL, NULL),
(7, 2, 'Dr.', NULL, NULL),
(8, 5, 'Ms.', NULL, NULL),
(9, 8, 'Miss', NULL, NULL),
(10, 5, 'Dr.', NULL, NULL),
(11, 11, 'Prof.', NULL, NULL),
(12, 9, 'Ms.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `rate` int NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `doctor_id`, `patient_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 7, 'Mr.', NULL, NULL),
(2, 1, 1, 5, 'Mrs.', NULL, NULL),
(3, 2, 4, 10, 'Dr.', NULL, NULL),
(4, 1, 3, 2, 'Mr.', NULL, NULL),
(5, 3, 8, 3, 'Mrs.', NULL, NULL),
(6, 5, 10, 0, 'Dr.', NULL, NULL),
(7, 7, 1, 9, 'Ms.', NULL, NULL),
(8, 7, 5, 9, 'Ms.', NULL, NULL),
(9, 2, 4, 4, 'Mr.', NULL, NULL),
(10, 5, 3, 10, 'Mr.', NULL, NULL),
(11, 7, 6, 2, 'Mr.', NULL, NULL),
(12, 5, 12, 6, 'Mr.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chiropractor', NULL, NULL),
(2, 'University', NULL, NULL),
(3, 'Postal Service Clerk', NULL, NULL),
(4, 'Electrical Power-Line Installer', NULL, NULL),
(5, 'Therapist', NULL, NULL),
(6, 'Marking Clerk', NULL, NULL),
(7, 'Rigger', NULL, NULL),
(8, 'Technical Specialist', NULL, NULL),
(9, 'Civil Drafter', NULL, NULL),
(10, 'Waste Treatment Plant Operator', NULL, NULL),
(11, 'Gas Plant Operator', NULL, NULL),
(12, 'Nursing Aide', NULL, NULL),
(13, 'Marketing VP', NULL, NULL),
(14, 'Account Manager', NULL, NULL);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-08-02 13:11:09', '$2y$12$6itTLppx6KqjE.3ptFglte9EPwgbJ22ckikdwfVzgHpGGk43XlUBK', 'uFNElwidJdbYXcdsQ9EPnEtcKhOTF1ecihMvPAVTIGAr4iGECMZXStfV9yxL', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_specialization_id_foreign` (`specialization_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_doctor_id_foreign` (`doctor_id`),
  ADD KEY `reviews_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_specialization_id_foreign` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
