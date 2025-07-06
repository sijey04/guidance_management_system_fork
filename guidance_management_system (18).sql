-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 05:40 PM
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
-- Database: `guidance_management_system`
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
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `contract_date` date NOT NULL,
  `contract_image` varchar(255) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `completed_days` int(11) DEFAULT NULL,
  `status` enum('In Progress','Completed') NOT NULL DEFAULT 'In Progress',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contract_type` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `student_id`, `semester_id`, `contract_date`, `contract_image`, `total_days`, `completed_days`, `status`, `created_at`, `updated_at`, `contract_type`, `start_date`, `end_date`, `remarks`) VALUES
(1, 2, 1, '2025-07-01', NULL, 20, NULL, 'In Progress', '2025-07-06 07:13:09', '2025-07-06 07:13:29', 'Misconduct', '2025-07-02', '2025-07-22', 'dmkcdm');

-- --------------------------------------------------------

--
-- Table structure for table `contract_images`
--

CREATE TABLE `contract_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_images`
--

INSERT INTO `contract_images` (`id`, `contract_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'contract_images/3jze9u1tQlEFOfadOjxSXoezEJbOn3tnnmkX8jvE.png', '2025-07-06 07:13:09', '2025-07-06 07:13:09'),
(2, 1, 'contract_images/U55fSCwZoMUES19VCJ2zAtZ0HC4hD60TzociworE.png', '2025-07-06 07:13:09', '2025-07-06 07:13:09'),
(3, 1, 'contract_images/YBt6ME09KmAKGz1icn7Fh4W773CD8aI39S2VkfhJ.jpg', '2025-07-06 07:13:09', '2025-07-06 07:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Misconduct', '2025-06-21 20:47:28', '2025-06-21 20:47:28'),
(3, 'Community Service', '2025-06-21 21:39:11', '2025-06-21 21:39:11'),
(5, 'cheating', '2025-06-24 20:02:25', '2025-06-24 20:02:25'),
(6, 'deloading', '2025-06-24 20:03:27', '2025-06-24 20:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `counselings`
--

CREATE TABLE `counselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `counseling_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'In Progress',
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counselings`
--

INSERT INTO `counselings` (`id`, `student_id`, `semester_id`, `counseling_date`, `status`, `image_path`, `created_at`, `updated_at`, `remarks`) VALUES
(1, 2, 1, '2025-07-02', 'In Progress', NULL, '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'jnkcndn');

-- --------------------------------------------------------

--
-- Table structure for table `counseling_images`
--

CREATE TABLE `counseling_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counseling_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counseling_images`
--

INSERT INTO `counseling_images` (`id`, `counseling_id`, `image_path`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 'counseling_images/g2M0m5heHUqcDoIzn3gjqE2JSrES2fAPriwRUrcE.png', '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'form'),
(2, 1, 'counseling_images/YjgDM2GB2iYVQEYhmUtIuGRiMk2h3S3llT7qYkOy.jpg', '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'form'),
(3, 1, 'counseling_images/66EFY4yQXEmExN71rxyiy6oEKZKaJFtYouNqYH0x.jpg', '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'form'),
(4, 1, 'counseling_images/JZKC1VLAQ3eIiI8HmwqM0l70UYT2ZZ1oOU6rVy30.jpg', '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'id_card'),
(5, 1, 'counseling_images/s0R2QKDOJbQ69gN7irTwYCheVKIrRMPYGmqd8krY.png', '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'id_card');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `created_at`, `updated_at`) VALUES
(1, 'BS Information Technology', '2025-06-21 08:53:23', '2025-06-21 08:53:23'),
(2, 'Associate in Computer Technology', '2025-06-21 09:26:35', '2025-06-21 09:26:35'),
(3, 'BS Computer Science', '2025-06-21 09:26:45', '2025-06-21 09:26:45');

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
(4, '2025_06_07_092335_create_students_table', 1),
(5, '2025_06_07_131807_create_contracts_table', 2),
(6, '2025_06_07_134254_create_referrals_table', 3),
(7, '2025_06_11_062142_create_semesters_table', 4),
(8, '2025_06_11_100512_create_student_semester_enrollments_table', 5),
(9, '2025_06_11_102359_create_student_semester_enrollments_table', 6),
(10, '2025_06_11_105353_add_is_active_to_semesters_table', 7),
(11, '2025_06_12_083225_create_student_semester_enrollments_table', 8),
(12, '2025_06_12_113551_create_contracts_table', 9),
(13, '2025_06_13_103437_add_middle_name_and_suffix_to_students_table', 10),
(14, '2025_06_16_055043_create_counselings_table', 11),
(15, '2025_06_16_083507_add_to_students_table', 12),
(16, '2025_06_17_000000_update_age_to_birthday_in_students_table', 13),
(17, '2025_06_17_000001_add_parent_guardian_to_students_table', 13),
(18, '2025_06_17_000002_add_contract_image_to_contracts_table', 13),
(19, '2025_06_18_132914_create_student_profiles_table', 13),
(20, '2025_06_18_141022_make_parent_guardian_name_nullable', 14),
(21, '2025_06_18_155323_create_student_profiles_table', 15),
(22, '2025_06_19_085758_add_more_fields_to_student_profiles', 16),
(23, '2025_06_21_114220_add_to_students_table', 17),
(24, '2025_06_21_145531_create_course_year_sections_table', 18),
(25, '2025_06_21_153356_create_courses_table', 19),
(26, '2025_06_21_153358_create_years_table', 19),
(27, '2025_06_21_153401_create_sections_table', 19),
(28, '2025_06_22_042334_create_contract_types_table', 20),
(29, '2025_06_22_064150_add_to_contracts_table', 21),
(30, '2025_06_22_092044_create_referrals_table', 22),
(31, '2025_06_22_124745_create_referral_reasons_table', 23),
(32, '2025_06_22_151033_create_counselings_table', 24),
(33, '2025_06_23_014820_add_semester_id_to_referrals_table', 25),
(34, '2025_06_23_022603_add_semester_id_to_counselings_table', 26),
(35, '2025_06_23_064109_create_school_years_table', 27),
(36, '2025_06_24_131201_contract_image', 28),
(37, '2025_06_24_145018_add_to_student_profile', 29),
(38, '2025_06_24_151930_create_referral_images_table', 30),
(39, '2025_06_24_151956_create_referral_images_table', 30),
(40, '2025_06_24_153324_create_referral_images_table', 31),
(41, '2025_06_24_153410_referral_images', 31),
(42, '2025_06_24_153439_counseling_images', 31),
(43, '2025_07_01_121316_create_student_movements_table', 32),
(44, '2025_07_01_124847_create_student_transitions_table', 33),
(45, '2025_07_01_150526_add_type_to_counseling_images_table', 34),
(46, '2025_07_01_151841_rename_id_card_to_type_in_counseling_images_table', 35),
(47, '2025_07_01_154529_add_status_to_counselings_table', 36),
(48, '2025_07_01_181407_add_remarks_to_counselings_table', 37),
(49, '2025_07_03_042336_add_semester_id_to_student_transitions_table', 38),
(50, '2025_07_03_132158_add_student_id_to_student_transition', 39),
(51, '2025_07_03_143420_update_transition_type_enum_on_student_transition_table', 39),
(52, '2025_07_03_150842_update_transition_type_enum_on_student_transitions_table', 40),
(53, '2025_07_03_155143_add_to_student_transition_table', 41),
(54, '2025_07_03_161529_modify_student_id_in_student_transitions_table', 42),
(55, '2025_07_03_164526_make_student_id_nullable_in_student_transition_table', 43),
(56, '2025_07_04_071712_update_transition_type_enum_on_student_transitions', 44),
(57, '2025_07_04_072702_update_transition_type_enum_on_student_transitions', 45);

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
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `referral_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `student_id`, `semester_id`, `reason`, `remarks`, `image_path`, `referral_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Failing Grades', 'dfjdskfjn', NULL, '2025-07-01', '2025-07-06 07:15:26', '2025-07-06 07:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `referral_images`
--

CREATE TABLE `referral_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referral_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_images`
--

INSERT INTO `referral_images` (`id`, `referral_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'referral_images/3jkhQp6A73VG38DehD1QaN9Dp3VRIek7VqKBy9an.png', '2025-07-06 07:15:26', '2025-07-06 07:15:26'),
(2, 1, 'referral_images/F3PrutQg9GmJ6mxIRTUyFFYI5tOhff9g2TSISUTP.png', '2025-07-06 07:15:26', '2025-07-06 07:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `referral_reasons`
--

CREATE TABLE `referral_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_reasons`
--

INSERT INTO `referral_reasons` (`id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 'Absences', '2025-07-06 07:14:43', '2025-07-06 07:14:43'),
(2, 'Failing Grades', '2025-07-06 07:14:46', '2025-07-06 07:14:46'),
(3, 'Poor Study Habits', '2025-07-06 07:14:50', '2025-07-06 07:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `school_years`
--

CREATE TABLE `school_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `school_year` varchar(9) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_years`
--

INSERT INTO `school_years` (`id`, `created_at`, `updated_at`, `start_date`, `end_date`, `school_year`, `is_active`) VALUES
(1, '2025-07-06 07:06:01', '2025-07-06 07:38:54', '2024-08-20', '2025-05-20', '2024-2025', 0),
(2, '2025-07-06 07:38:54', '2025-07-06 07:38:54', '2025-08-20', '2026-05-05', '2025-2026', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`, `created_at`, `updated_at`) VALUES
(1, 'A', '2025-06-21 08:55:48', '2025-06-21 08:55:48'),
(2, 'B', '2025-06-21 09:31:39', '2025-06-21 09:31:39'),
(3, 'C', '2025-06-21 09:31:43', '2025-06-21 09:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` enum('1st','2nd','Summer') NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `school_year_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `is_current`, `created_at`, `updated_at`, `is_active`, `school_year_id`) VALUES
(1, '1st', 0, '2025-07-06 07:06:01', '2025-07-06 07:38:54', 0, 1),
(2, '2nd', 0, '2025-07-06 07:28:18', '2025-07-06 07:38:54', 0, 1),
(3, '1st', 1, '2025-07-06 07:38:54', '2025-07-06 07:38:54', 0, 2);

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
('I281Lam8wGdhgvWLUPYN8F1Z3JjNxS46I8g6Qhii', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN1pKV1FOdWZZZjlJWjVEWkJDOHJJcTN6RHpWVHJwWnBaSGpjOWF2NyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0L3NlbWVzdGVyLzMvdmFsaWRhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1751816378);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` date DEFAULT NULL,
  `suffix` enum('Jr.','Sr.','III','IV','None') DEFAULT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `parent_guardian_name` varchar(255) DEFAULT NULL,
  `parent_guardian_contact` varchar(255) NOT NULL,
  `number_of_sisters` int(10) UNSIGNED DEFAULT NULL,
  `number_of_brothers` int(10) UNSIGNED DEFAULT NULL,
  `ordinal_position` int(10) UNSIGNED DEFAULT NULL,
  `enrollment_status` enum('Enrolled','Not Enrolled') NOT NULL DEFAULT 'Enrolled',
  `enrollment_date` date DEFAULT NULL,
  `enrolled_semester` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `student_contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `first_name`, `middle_name`, `last_name`, `birthday`, `suffix`, `gender`, `course`, `home_address`, `father_occupation`, `mother_occupation`, `parent_guardian_name`, `parent_guardian_contact`, `number_of_sisters`, `number_of_brothers`, `ordinal_position`, `enrollment_status`, `enrollment_date`, `enrolled_semester`, `created_at`, `updated_at`, `deleted_at`, `section`, `fathers_name`, `mothers_name`, `student_contact`) VALUES
(1, '202201050', 'Naila', 'Taji', 'Haliluddin', '2023-12-04', NULL, 'Female', NULL, 'Rio Hondo', NULL, NULL, 'Alfaith Mae Luzon', '098989878767', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 07:10:51', '2025-07-06 07:10:51', NULL, NULL, NULL, NULL, '0978675754564'),
(2, '202201051', 'Alfaith', 'Mae', 'Luzon', '2025-07-01', 'Jr.', 'Male', NULL, 'CANELAR', NULL, NULL, 'dmslkmf', '098739745767', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 07:12:30', '2025-07-06 07:12:30', NULL, NULL, NULL, NULL, '09889778'),
(3, '202201052', 'April Rose', 'COVARRUBIAS', 'Alvarez', '2025-07-01', 'IV', 'Female', NULL, 'CANELAR', NULL, NULL, 'kdnfdj', 'dlnflfdgjfn', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 07:33:43', '2025-07-06 07:33:43', NULL, NULL, NULL, NULL, '09878473994'),
(4, '202201053', 'Ayana Jade', NULL, 'Alejo', '2025-07-09', NULL, 'Female', NULL, 'ncnkjds', NULL, NULL, 'dkfmldms', '0987876654', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 07:37:21', '2025-07-06 07:37:21', NULL, NULL, NULL, NULL, NULL),
(5, '202201054', 'Sample', 'COVARRUBIAS', 'Student', '2025-07-01', NULL, 'Male', NULL, 'CANELAR', NULL, NULL, 'ckmdkm', '90787876', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 07:38:34', '2025-07-06 07:38:34', NULL, NULL, NULL, NULL, '099766765');

-- --------------------------------------------------------

--
-- Table structure for table `student_profiles`
--

CREATE TABLE `student_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `parent_guardian_name` varchar(255) DEFAULT NULL,
  `parent_guardian_contact` varchar(255) DEFAULT NULL,
  `number_of_sisters` int(11) DEFAULT NULL,
  `number_of_brothers` int(11) DEFAULT NULL,
  `ordinal_position` int(11) DEFAULT NULL,
  `enrolled_semester` varchar(255) DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL,
  `year_level` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_profiles`
--

INSERT INTO `student_profiles` (`id`, `student_id`, `semester_id`, `course`, `section`, `created_at`, `updated_at`, `home_address`, `father_occupation`, `mother_occupation`, `parent_guardian_name`, `parent_guardian_contact`, `number_of_sisters`, `number_of_brothers`, `ordinal_position`, `enrolled_semester`, `enrollment_date`, `year_level`, `deleted_at`) VALUES
(1, 1, 1, 'BS Information Technology', 'A', '2025-07-06 07:10:51', '2025-07-06 07:10:51', 'Rio Hondo', NULL, NULL, 'Alfaith Mae Luzon', '098989878767', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(2, 2, 1, 'BS Information Technology', 'A', '2025-07-06 07:12:30', '2025-07-06 07:12:30', 'CANELAR', NULL, NULL, 'dmslkmf', '098739745767', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(3, 1, 2, 'BS Information Technology', 'B', '2025-07-06 07:28:56', '2025-07-06 07:32:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(4, 2, 2, 'BS Information Technology', 'C', '2025-07-06 07:32:25', '2025-07-06 07:32:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(5, 3, 2, 'BS Computer Science', 'A', '2025-07-06 07:33:43', '2025-07-06 07:33:43', 'CANELAR', NULL, NULL, 'kdnfdj', 'dlnflfdgjfn', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(6, 4, 2, 'Associate in Computer Technology', 'B', '2025-07-06 07:37:21', '2025-07-06 07:37:21', 'ncnkjds', NULL, NULL, 'dkfmldms', '0987876654', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(7, 5, 2, 'BS Information Technology', 'A', '2025-07-06 07:38:34', '2025-07-06 07:38:34', 'CANELAR', NULL, NULL, 'ckmdkm', '90787876', NULL, NULL, NULL, NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_semester_enrollments`
--

CREATE TABLE `student_semester_enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `is_enrolled` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_semester_enrollments`
--

INSERT INTO `student_semester_enrollments` (`id`, `student_id`, `semester_id`, `is_enrolled`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-07-06 07:10:51', '2025-07-06 07:10:51'),
(2, 2, 1, 1, '2025-07-06 07:12:30', '2025-07-06 07:12:30'),
(3, 3, 2, 1, '2025-07-06 07:33:43', '2025-07-06 07:33:43'),
(4, 4, 2, 1, '2025-07-06 07:37:21', '2025-07-06 07:37:21'),
(5, 5, 2, 1, '2025-07-06 07:38:34', '2025-07-06 07:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_transition`
--

CREATE TABLE `student_transition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `transition_type` enum('None','Shifting In','Shifting Out','Transferring In','Transferring Out','Dropped','Returning Student') NOT NULL,
  `from_program` varchar(255) DEFAULT NULL,
  `to_program` varchar(255) DEFAULT NULL,
  `reason_leaving` text DEFAULT NULL,
  `reason_returning` text DEFAULT NULL,
  `leave_reason` text DEFAULT NULL,
  `transition_date` date NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_transition`
--

INSERT INTO `student_transition` (`id`, `last_name`, `first_name`, `middle_name`, `transition_type`, `from_program`, `to_program`, `reason_leaving`, `reason_returning`, `leave_reason`, `transition_date`, `remark`, `created_at`, `updated_at`, `semester_id`, `student_id`) VALUES
(1, 'Luzon', 'Alfaith', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'dfmkjm', '2025-07-06 07:12:30', '2025-07-06 07:12:30', 1, 2),
(5, 'Alvarez', 'April Rose', NULL, 'Transferring In', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'cvknv', '2025-07-06 07:33:43', '2025-07-06 07:33:43', 2, 3),
(6, 'Haliluddin', 'Naila', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'dropped', '2025-07-06 07:34:54', '2025-07-06 07:34:54', 2, 1),
(7, 'Luzon', 'Alfaith', NULL, 'Transferring Out', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'xcxmkm', '2025-07-06 07:39:23', '2025-07-06 07:39:23', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_transition_images`
--

CREATE TABLE `student_transition_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_transition_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_transition_images`
--

INSERT INTO `student_transition_images` (`id`, `student_transition_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'transition_images/EakizXVaO0TwJNDFvrxiFbQ158sXYkxhiVDwg8v6.png', '2025-07-06 07:12:30', '2025-07-06 07:12:30'),
(2, 1, 'transition_images/evJxdjuEqXmtKEHdxxwmiX7vBkNgN3t9AkNF6Yye.png', '2025-07-06 07:12:30', '2025-07-06 07:12:30'),
(3, 1, 'transition_images/Zc80OdodaXTTg1axMkDuVKKeC7lwxyfYeNIAdXnU.jpg', '2025-07-06 07:12:30', '2025-07-06 07:12:30'),
(4, 2, 'transition_images/wC8bIMjOLrK8xeQHtMRh13hJoQTkLqujTmipEXJr.png', '2025-07-06 07:28:56', '2025-07-06 07:28:56'),
(5, 2, 'transition_images/I9UcLx8rXHtQJEmKaiBP0mzm8A0HFQja6GG5kbUR.jpg', '2025-07-06 07:28:56', '2025-07-06 07:28:56'),
(6, 4, 'transition_images/CD7eFTZExf7ggX2a8NVDYaHJbZqzzekJ0Tt9xPsZ.png', '2025-07-06 07:30:13', '2025-07-06 07:30:13'),
(7, 4, 'transition_images/s3WPzNqfGPXDqnTWOtXbX4FCfU9OocJq8UbGDHiy.png', '2025-07-06 07:30:13', '2025-07-06 07:30:13'),
(8, 4, 'transition_images/xmbou3W71UR1Hcmk47NrsPacyL0X0tlKvdHsN6kk.jpg', '2025-07-06 07:30:13', '2025-07-06 07:30:13'),
(9, 5, 'transition_images/dw5mSqBH3gyCXd0s7sPAizH5NaE1RTmZrQLYO4dX.png', '2025-07-06 07:33:43', '2025-07-06 07:33:43'),
(10, 5, 'transition_images/ALs9EyIkSv5qv2rXsP9Pf3sYH4atiKiWuDot24h9.png', '2025-07-06 07:33:43', '2025-07-06 07:33:43'),
(11, 5, 'transition_images/NV5laExLi19VoQsYBoiQ8Iev1Hee9XWgvpsmgm54.jpg', '2025-07-06 07:33:43', '2025-07-06 07:33:43'),
(12, 6, 'transition_images/a1RFHme2OEuxK7nONynazvFjFDQ1qFetLZVOjfh1.png', '2025-07-06 07:34:54', '2025-07-06 07:34:54'),
(13, 6, 'transition_images/dMvJlXexHa1y2aZW3LadH5Qy3c8nnUdqUyGh0M75.png', '2025-07-06 07:34:54', '2025-07-06 07:34:54'),
(14, 6, 'transition_images/GDZIeXE8YAnSHVsOwQgW3oTv9kmI6tGEBiDK1Bfg.jpg', '2025-07-06 07:34:54', '2025-07-06 07:34:54'),
(15, 7, 'transition_images/gVKFrU73DNezKV1QXDJ2zaJ0cl5LGLR9FY1wxvsY.png', '2025-07-06 07:39:23', '2025-07-06 07:39:23');

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
(1, 'Test User', 'test@example.com', '2025-06-07 01:32:55', '$2y$12$86dikTZuoQO1uTnrTagf/uAI6nulfzD/nL0rq2xIhDYFcB0dCeen6', 'aRy9i8z4Zp', '2025-06-07 01:32:55', '2025-06-07 01:32:55'),
(2, 'admin', 'admin@gmail.com', '2025-06-07 01:36:36', '$2y$12$Y83WxVW5AVkWHww5wrNnLODa34Na.KLgccmE3mA2dehNzMNXro4kO', NULL, '2025-06-07 01:35:09', '2025-06-07 01:36:36'),
(3, 'testing', 'testing@gmail.com', '2025-07-01 21:13:39', '$2y$12$SMfWULNbLhS.MPBwj8E7beKLZYEqY3Y04NFajdcyziZZqeBVAbApi', NULL, '2025-07-01 21:04:26', '2025-07-01 21:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year_level`, `created_at`, `updated_at`) VALUES
(1, '1', '2025-07-01 22:48:49', '2025-07-01 22:48:49'),
(2, '2', '2025-07-01 22:48:53', '2025-07-01 22:48:53'),
(3, '3', '2025-07-01 22:48:56', '2025-07-01 22:48:56'),
(4, '4', '2025-07-01 22:48:59', '2025-07-01 22:48:59'),
(5, '5', '2025-07-06 06:09:41', '2025-07-06 06:09:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_student_id_foreign` (`student_id`),
  ADD KEY `contracts_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `contract_images`
--
ALTER TABLE `contract_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_images_contract_id_foreign` (`contract_id`);

--
-- Indexes for table `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contract_types_type_unique` (`type`);

--
-- Indexes for table `counselings`
--
ALTER TABLE `counselings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counselings_student_id_foreign` (`student_id`),
  ADD KEY `counselings_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `counseling_images`
--
ALTER TABLE `counseling_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counseling_images_counseling_id_foreign` (`counseling_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_student_id_foreign` (`student_id`),
  ADD KEY `referrals_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `referral_images`
--
ALTER TABLE `referral_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral_images_referral_id_foreign` (`referral_id`);

--
-- Indexes for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_years`
--
ALTER TABLE `school_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_year` (`school_year`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`);

--
-- Indexes for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_profiles_student_id_semester_id_unique` (`student_id`,`semester_id`),
  ADD KEY `student_profiles_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_semester_enrollments_student_id_semester_id_unique` (`student_id`,`semester_id`),
  ADD KEY `student_semester_enrollments_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `student_transition`
--
ALTER TABLE `student_transition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_transition_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `student_transition_images`
--
ALTER TABLE `student_transition_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract_images`
--
ALTER TABLE `contract_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counselings`
--
ALTER TABLE `counselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counseling_images`
--
ALTER TABLE `counseling_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referral_images`
--
ALTER TABLE `referral_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_transition`
--
ALTER TABLE `student_transition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_transition_images`
--
ALTER TABLE `student_transition_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contracts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contract_images`
--
ALTER TABLE `contract_images`
  ADD CONSTRAINT `contract_images_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counselings`
--
ALTER TABLE `counselings`
  ADD CONSTRAINT `counselings_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `counselings_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counseling_images`
--
ALTER TABLE `counseling_images`
  ADD CONSTRAINT `counseling_images_counseling_id_foreign` FOREIGN KEY (`counseling_id`) REFERENCES `counselings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `referrals_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `referral_images`
--
ALTER TABLE `referral_images`
  ADD CONSTRAINT `referral_images_referral_id_foreign` FOREIGN KEY (`referral_id`) REFERENCES `referrals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_profiles`
--
ALTER TABLE `student_profiles`
  ADD CONSTRAINT `student_profiles_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_profiles_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  ADD CONSTRAINT `student_semester_enrollments_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_semester_enrollments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_transition`
--
ALTER TABLE `student_transition`
  ADD CONSTRAINT `student_transition_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
