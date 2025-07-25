-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2025 at 03:51 PM
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
  `original_contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `carried_over_from_id` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `contracts` (`id`, `student_id`, `original_contract_id`, `carried_over_from_id`, `semester_id`, `contract_date`, `contract_image`, `total_days`, `completed_days`, `status`, `created_at`, `updated_at`, `contract_type`, `start_date`, `end_date`, `remarks`) VALUES
(1, 55, NULL, NULL, 1, '2025-07-25', NULL, NULL, NULL, 'Completed', '2025-07-24 02:00:40', '2025-07-24 02:02:46', 'deloading', NULL, NULL, NULL),
(2, 55, NULL, NULL, 1, '2025-07-24', NULL, 30, NULL, 'In Progress', '2025-07-24 02:02:14', '2025-07-24 02:02:14', 'Community Service', '2025-07-25', '2025-08-24', NULL),
(3, 55, 1, NULL, 2, '2025-07-25', NULL, NULL, NULL, 'Completed', '2025-07-24 02:06:24', '2025-07-24 02:06:24', 'deloading', NULL, NULL, NULL),
(4, 55, 2, NULL, 2, '2025-07-24', NULL, 30, NULL, 'Completed', '2025-07-24 02:06:24', '2025-07-24 02:06:43', 'Community Service', '2025-07-25', '2025-08-24', NULL),
(5, 55, NULL, NULL, 2, '2025-07-25', NULL, NULL, NULL, 'In Progress', '2025-07-24 02:06:59', '2025-07-24 02:06:59', 'deloading', NULL, NULL, NULL),
(6, 54, NULL, NULL, 2, '2025-07-25', NULL, NULL, NULL, 'In Progress', '2025-07-24 02:07:44', '2025-07-24 02:07:44', 'Misconduct', NULL, NULL, NULL),
(7, 55, 1, NULL, 3, '2025-07-25', NULL, NULL, NULL, 'Completed', '2025-07-24 02:09:03', '2025-07-24 02:09:03', 'deloading', NULL, NULL, NULL),
(8, 55, 2, NULL, 3, '2025-07-24', NULL, 30, NULL, 'Completed', '2025-07-24 02:09:03', '2025-07-24 02:09:03', 'Community Service', '2025-07-25', '2025-08-24', NULL),
(9, 55, 5, NULL, 3, '2025-07-25', NULL, NULL, NULL, 'Completed', '2025-07-24 02:09:03', '2025-07-24 02:11:07', 'deloading', NULL, NULL, NULL),
(10, 54, 6, NULL, 3, '2025-07-25', NULL, NULL, NULL, 'In Progress', '2025-07-24 02:12:08', '2025-07-24 02:12:08', 'Misconduct', NULL, NULL, NULL),
(11, 90, NULL, NULL, 3, '2025-07-25', NULL, 30, NULL, 'In Progress', '2025-07-24 04:29:43', '2025-07-24 04:29:43', 'Community Service', '2025-07-25', '2025-08-24', NULL),
(12, 90, 11, NULL, 4, '2025-07-25', NULL, 30, NULL, 'Completed', '2025-07-24 04:32:17', '2025-07-24 05:49:06', 'Community Service', '2025-07-25', '2025-08-24', NULL),
(13, 55, 1, NULL, 4, '2025-07-25', NULL, NULL, NULL, 'Completed', '2025-07-24 04:33:36', '2025-07-24 04:33:36', 'deloading', NULL, NULL, NULL),
(14, 55, 2, NULL, 4, '2025-07-24', NULL, 30, NULL, 'Completed', '2025-07-24 04:33:36', '2025-07-24 04:33:36', 'Community Service', '2025-07-25', '2025-08-24', NULL),
(15, 55, 5, NULL, 4, '2025-07-25', NULL, NULL, NULL, 'Completed', '2025-07-24 04:33:36', '2025-07-24 04:33:36', 'deloading', NULL, NULL, NULL),
(16, 54, 6, NULL, 5, '2025-07-25', NULL, NULL, NULL, 'In Progress', '2025-07-24 05:49:58', '2025-07-24 05:49:58', 'Misconduct', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `requires_total_days` tinyint(1) NOT NULL DEFAULT 0,
  `requires_start_date` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `type`, `created_at`, `updated_at`, `requires_total_days`, `requires_start_date`) VALUES
(6, 'deloading', '2025-06-24 20:03:27', '2025-06-24 20:03:27', 0, 0),
(7, 'Misconduct', '2025-07-07 20:10:11', '2025-07-07 20:10:11', 0, 0),
(8, 'Community Service', '2025-07-19 19:35:20', '2025-07-19 19:38:00', 1, 1),
(9, 'Cheating', '2025-07-19 19:38:53', '2025-07-19 19:42:28', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `counselings`
--

CREATE TABLE `counselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_counseling_id` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `counselings` (`id`, `original_counseling_id`, `student_id`, `semester_id`, `counseling_date`, `status`, `image_path`, `created_at`, `updated_at`, `remarks`) VALUES
(1, NULL, 55, 1, '2025-07-24', 'In Progress', NULL, '2025-07-24 02:04:02', '2025-07-24 02:04:02', NULL),
(2, NULL, 55, 1, '2025-07-24', 'Completed', NULL, '2025-07-24 02:04:31', '2025-07-24 02:05:37', NULL),
(3, 1, 55, 2, '2025-07-24', 'Completed', NULL, '2025-07-24 02:06:24', '2025-07-24 02:08:22', 'chuhcuhc'),
(4, 2, 55, 2, '2025-07-24', 'Completed', NULL, '2025-07-24 02:06:24', '2025-07-24 02:06:24', NULL),
(5, NULL, 54, 2, '2025-07-25', 'In Progress', NULL, '2025-07-24 02:08:00', '2025-07-24 02:08:00', NULL),
(6, 1, 55, 3, '2025-07-24', 'Completed', NULL, '2025-07-24 02:09:03', '2025-07-24 02:09:03', 'chuhcuhc'),
(7, 2, 55, 3, '2025-07-24', 'Completed', NULL, '2025-07-24 02:09:03', '2025-07-24 02:09:03', NULL),
(8, 5, 54, 3, '2025-07-25', 'Completed', NULL, '2025-07-24 02:12:08', '2025-07-24 04:30:04', NULL),
(9, NULL, 90, 3, '2025-07-25', 'In Progress', NULL, '2025-07-24 04:29:57', '2025-07-24 04:29:57', NULL),
(10, 9, 90, 4, '2025-07-25', 'In Progress', NULL, '2025-07-24 04:32:17', '2025-07-24 04:32:17', NULL),
(11, 1, 55, 4, '2025-07-24', 'Completed', NULL, '2025-07-24 04:33:36', '2025-07-24 04:33:36', 'chuhcuhc'),
(12, 2, 55, 4, '2025-07-24', 'Completed', NULL, '2025-07-24 04:33:36', '2025-07-24 04:33:36', NULL),
(13, 5, 54, 5, '2025-07-25', 'Completed', NULL, '2025-07-24 05:49:58', '2025-07-24 05:49:58', NULL);

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
(2, 'Associate in Computer Technology', '2025-06-21 09:26:35', '2025-06-21 09:26:35'),
(3, 'BS Computer Science', '2025-06-21 09:26:45', '2025-06-21 09:26:45'),
(6, 'BS Information Technology', '2025-07-07 20:04:31', '2025-07-07 20:04:31'),
(7, 'ACT-AD', '2025-07-15 00:50:29', '2025-07-15 00:50:29'),
(8, 'ACT-NT', '2025-07-18 19:18:42', '2025-07-18 19:18:42'),
(9, 'BSCS', '2025-07-18 19:18:47', '2025-07-18 19:18:47'),
(10, 'BSIT', '2025-07-18 19:18:52', '2025-07-18 19:18:52');

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
  `original_referral_id` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `referrals` (`id`, `original_referral_id`, `student_id`, `semester_id`, `reason`, `remarks`, `image_path`, `referral_date`, `created_at`, `updated_at`) VALUES
(1, NULL, 55, 1, 'Absences', NULL, NULL, '2025-07-23', '2025-07-24 02:03:20', '2025-07-24 02:03:20'),
(2, NULL, 55, 1, 'Failing Grades', NULL, NULL, '2025-07-25', '2025-07-24 02:03:35', '2025-07-24 02:03:35'),
(3, 1, 55, 2, 'Absences', NULL, NULL, '2025-07-23', '2025-07-24 02:06:24', '2025-07-24 02:06:24'),
(4, 2, 55, 2, 'Failing Grades', NULL, NULL, '2025-07-25', '2025-07-24 02:06:24', '2025-07-24 02:06:24'),
(5, 1, 55, 3, 'Absences', NULL, NULL, '2025-07-23', '2025-07-24 02:09:03', '2025-07-24 02:09:03'),
(6, 2, 55, 3, 'Failing Grades', NULL, NULL, '2025-07-25', '2025-07-24 02:09:03', '2025-07-24 02:09:03'),
(7, NULL, 90, 3, 'Failing Grades', NULL, NULL, '2025-07-23', '2025-07-24 04:30:27', '2025-07-24 04:30:27'),
(8, 7, 90, 4, 'Failing Grades', NULL, NULL, '2025-07-23', '2025-07-24 04:32:17', '2025-07-24 04:32:17'),
(9, 1, 55, 4, 'Absences', NULL, NULL, '2025-07-23', '2025-07-24 04:33:36', '2025-07-24 04:33:36'),
(10, 2, 55, 4, 'Failing Grades', NULL, NULL, '2025-07-25', '2025-07-24 04:33:36', '2025-07-24 04:33:36');

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
(1, 'Failing Grades', '2025-07-21 08:13:34', '2025-07-21 08:13:34'),
(2, 'Absences', '2025-07-21 08:13:39', '2025-07-21 08:13:39'),
(3, 'Poor Study Habits', '2025-07-21 08:13:49', '2025-07-21 08:13:49');

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
(1, '2025-07-24 01:58:19', '2025-07-24 02:08:57', '2024-02-02', '2025-02-09', '2024-2025', 0),
(2, '2025-07-24 02:08:57', '2025-07-24 05:49:31', '2025-02-02', '2026-02-02', '2025-2026', 0),
(3, '2025-07-24 05:49:31', '2025-07-24 05:49:31', '2026-02-02', '2027-02-02', '2026-2027', 1);

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
(3, 'C', '2025-06-21 09:31:43', '2025-06-21 09:31:43'),
(5, 'D', '2025-07-07 20:04:55', '2025-07-07 20:04:55');

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
(1, '1st', 0, '2025-07-24 01:58:19', '2025-07-24 02:08:57', 0, 1),
(2, '2nd', 0, '2025-07-24 02:06:00', '2025-07-24 02:08:57', 0, 1),
(3, '1st', 0, '2025-07-24 02:08:57', '2025-07-24 05:49:31', 0, 2),
(4, '2nd', 0, '2025-07-24 04:32:05', '2025-07-24 05:49:31', 0, 2),
(5, '1st', 1, '2025-07-24 05:49:31', '2025-07-24 05:49:31', 0, 3);

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
('PMk5YpKsxvWxYyXiShtUMnj0dbhlpHV9X9ihBwfK', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVURTZUI2alY0N2RKT1F0clhncEhBNHpXT2Vjd2hSUHE0VVVMekNibCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1753365064);

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
(1, '2024-03531', 'SHERHAYA', 'ALFARO', 'ABDURAJAK', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(2, '2024-03524', 'JUSTINE', 'ARCILLAS', 'AGOT', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(3, '2024-03480', 'RHAIZA', 'YONGOT', 'ALBERTO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(4, '2024-03194', 'MERRY ANGEL', 'FIDEL', 'ALFONSO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(5, '2024-03655', 'MARK JOHN', 'SALAS', 'ANDO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(6, '2024-04094', 'DANICA', 'CAMASURA', 'CUSTODIO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(7, '2024-02619', 'RAYVER', 'RAYVER', 'DOMINGUEZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(8, '2024-01504', 'DANNETH', 'BUHION', 'ENRIQUEZ', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(9, '2024-03574', 'ERIC JR', 'DELOS REYES', 'FERMO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(10, '2024-01796', 'PAOLO', 'SANTOS', 'GARCIA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(11, 'ESU-PAGA-2023-05190', 'MEL JOBETH', 'SUGANOB', 'ABELLANA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(12, '2023-04734', 'AHMAD GEVAR', 'ISAHAC', 'ADVAR', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(13, '2023-05817', 'QUIANA MAE', 'SANSON', 'ALVAREZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(14, '2023-04736', 'NHAINA', 'ALAM', 'ASANJI', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(15, '2023-05962', 'GERALDINE', 'BAGALANON', 'BACALSO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(16, '2023-04007', 'DHULKIFLIE', 'ASANIB', 'MUSLARON', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(17, '2023-05093', 'KARL MARX', 'DOSPUEBLOS', 'NARVAEZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(18, '2023-06127', 'ANTHONY', 'JACINTO', 'OMAMALIN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(19, '2023-04504', 'DANZEIN DARON', 'VILLAMER', 'ORADA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(20, '2023-04365', 'TIMOTH Y', 'RENACIA', 'SAJOT', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(21, '2018-03481', 'ALFHAIZ', 'PINGLI', 'MUSA', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(22, '2024-04871', 'ALDIMER', 'ALFARO', 'ABDURAJAK', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(23, '2024-04598', 'REA', 'ASMAD', 'ADJAWIE', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(24, '2024-04602', 'JOHN FREDERICK', 'JISON', 'ALAVAR', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(25, '2024-04605', 'YAZZINE', 'AALLIAN', 'ALBANI', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(26, '2024-03441', 'NEIL BRYAN', 'BAUTISTA', 'ALCUIZAR', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(27, '2024-03457', 'PAULINE', 'PAULINE', 'ALONZO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(28, '2024-01294', 'MARIAJELLY', 'DELGADO', 'ATILANO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(29, '2024-02235', 'FRANKINCENSE', 'BANUELOS', 'BABARAN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(30, '2024-03272', 'FAHAD', 'NONNONG', 'BADANG', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(31, '2024-01283', 'JHOROSS DELOS', 'REYES', 'BATOBALANI', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(32, '2023-04028', 'ALFAIZA', 'ABDULGAFUR', 'ALBESO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(33, '2023-02393', 'SALMAN', 'LINDET', 'ALIH', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(34, '2023-05089', 'NOVIE WEDSEV', 'JAILANI', 'ALVARADO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(35, '2023-05178', 'JOSIE', 'ORTEGA', 'BANALO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(36, '2023-06053', 'HERNANE', 'ABAJAR', 'BENEDICTO JR', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(37, '2023-04009', 'KURTAL DRICH', 'CERVANTES', 'CANILANG', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(38, '2023-04358', 'TRISHA MAE', 'VINCOY', 'CLIMACO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(39, '2023-03994', 'MARK DANWELL', 'APOLINARIO', 'CRUZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(40, '2023-05191', 'BRANDON LANSWA', 'ABALOS', 'DESOLA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(41, '2023-05233', 'LEO', 'MENDOZA', 'DEVILA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(42, '2021-01453', 'LANDER', 'SARIOL', 'ABBISANI', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(43, '2024-03685', 'IRIS JUHRA', 'BAYLON', 'ABDULLA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(44, '2021-02741', 'NUR', 'AMIL', 'ABDULMAJID', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(45, '2024-01378', 'THEODORE', 'VALESCO', 'ADANZA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(46, '2023-01203', 'ANGELO JAY', 'LARGO', 'ALERIA', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(47, '2024-01270', 'LUIS MIGUEL', 'ATILANO', 'ALFARO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(48, '2023-01075', 'FATIMA SHEENA SHARIFA', 'TAJI', 'ABUBAKAR', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(49, '2023-01812', 'LIMUEL REY', 'BANDICO', 'ACABAL', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(50, '2020-01165', 'HANNAH MAE', 'GONZALES', 'ALCONABA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(51, '2022-02129', 'ADZMIER', 'MAHMUD', 'ALLI', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(52, '2021-01863', 'IONYJAL AZIZ', 'FLORES', 'AMIN', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(53, '2023-02197', 'MATTJHEVIC', 'ENGALLADO', 'ANASTACIO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(54, '2022-01049', 'RUDERICK', 'ALICER', 'ABALOS', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(55, '2022-01048', 'MARIE ANDRE', 'KWANGYING', 'ABAO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(56, '2020-01156', 'ABDEL KHALIQ', 'BANGSA', 'ABDULLA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(57, '2022-01548', 'JOMARK', 'JALMAANI', 'ABELLO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(58, '2022-01087', 'LANCE MUTHALIB', 'TORIBIO', 'AHIL', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(59, '2022-02967', 'GARWAZ', 'AMBALI', 'AKILAN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(60, '2020-01014', 'RASHID AHMAD', 'OROZCO', 'ABDUL', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(61, '2021-01164', 'HILAL', 'JAMIRUDDIN', 'ABDULAJID', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(62, '2021-01330', 'KAMIL JAIDE', 'DUMAGUING', 'ABDURAJIE', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(63, '2018-02674', 'JHON LADEN', 'BAYLE', 'ADJALUDDIN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(64, '2021-01491', 'HANS', 'CHRISTIAN', 'ALFARAS', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(65, '2021-02267', 'RONALD', 'LACEDA', 'ALJAS', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(66, '2024-01387', 'MARK LESTER', 'NURULLA', 'CORDOVILLA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(67, '2024-01609', 'ARJAY', 'ARJAY', 'DARAMAN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(68, '2024-01691', 'MARC ROLAND', 'DAGAYLOAN', 'DE ZENA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(69, '2024-01765', 'KEVIN KRISTOFFER', 'NUQUI', 'DELA CRUZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(70, '2024-02051', 'JESSA', 'ABAYLE', 'FLORES', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(71, '2024-02448', 'BRYAN JAMES', 'ALFONSO', 'GARCIA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(72, '2023-01565', 'AVREY DOREEN', 'CONCEPCION', 'ABARRO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(73, '2023-01612', 'MOHAMMAD AZEEM', 'SAMDAIN', 'ABDU', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(74, '2023-00378', 'ALFAHAD', 'LAHAMAN', 'ADIAN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(75, '2023-00080', 'ADRIAN', 'BAGUIO', 'AGRAVIADOR', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(76, '2023-00932', 'KENT LOUIE', 'MATIAS', 'ALATAN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(77, '2023-00186', 'ADRIAN ARVIN', 'MOSQUEDA', 'ALVAREZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(78, '2022-00573', 'ZARHANNA', 'GALLETO', 'ABDULHARID', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(79, '2022-00782', 'DANILO', 'SAHIBUDDIN', 'ABILUL', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(80, '2022-01408', 'SHEIK AISHIR', 'SUAIB', 'ALIBASA', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(81, '2022-00851', 'MOHAMMAD AMEER', 'INDAL', 'ALPHA', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(82, '2022-01610', 'HEDRIAN DUNN', 'PASTORES', 'ALVAREZ', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(83, '2022-00607', 'FRANCK JUMAR', 'PELAYO', 'AMING', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(84, '2021-04818', 'NURFITR', 'PITO', 'ABDULLA', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(85, '2021-00768', 'JOHN PAULO', 'ORTEGA', 'ABRAJANO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(86, '2021-00905', 'ZILD JOHN', 'LLOYD MONTAÑO', 'ABULE', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(87, '2021-04610', 'PAUL JOHN', 'ZOSOBRADO', 'ACABO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(88, '2021-00488', 'ISAAC RADDI', 'BAYLE', 'ADJALUDDIN', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(89, '2021-04609', 'AR-AMEEFF', 'MOHAMMAD', 'ADJARAIL', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL),
(90, '2022-20120', 'Naila', 'Taji', 'Haliluddin', '2025-07-24', NULL, 'Female', NULL, 'cnjxkn', NULL, NULL, 'cmkdmfk', '09989987976', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-24 04:25:14', '2025-07-24 04:25:14', NULL, NULL, NULL, NULL, '090077786');

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
(1, 1, 1, 'ACT-AD ', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(2, 2, 1, 'ACT-AD', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(3, 3, 1, 'ACT-AD', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(4, 4, 1, 'ACT-AD', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(5, 5, 1, 'ACT-AD', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(6, 6, 1, 'ACT-AD', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(7, 7, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(8, 8, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(9, 9, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(10, 10, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(11, 11, 1, 'ACT-AD', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(12, 12, 1, 'ACT-AD', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(13, 13, 1, 'ACT-AD', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(14, 14, 1, 'ACT-AD', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(15, 15, 1, 'ACT-AD', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(16, 16, 1, 'ACT-AD', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(17, 17, 1, 'ACT-AD', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(18, 18, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(19, 19, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(20, 20, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(21, 21, 1, 'ACT-AD', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(22, 22, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(23, 23, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(24, 24, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(25, 25, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(26, 26, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(27, 27, 1, 'ACT-NT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(28, 28, 1, 'ACT-NT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(29, 29, 1, 'ACT-NT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(30, 30, 1, 'ACT-NT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(31, 31, 1, 'ACT-NT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(32, 32, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(33, 33, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(34, 34, 1, 'ACT-NT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(35, 35, 1, 'ACT-NT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(36, 36, 1, 'ACT-NT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(37, 37, 1, 'ACT-NT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(38, 38, 1, 'ACT-NT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(39, 39, 1, 'ACT-NT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(40, 40, 1, 'ACT-NT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(41, 41, 1, 'ACT-NT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(42, 42, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(43, 43, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(44, 44, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(45, 45, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(46, 46, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(47, 47, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(48, 48, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(49, 49, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(50, 50, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(51, 51, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(52, 52, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(53, 53, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(54, 54, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(55, 55, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(56, 56, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(57, 57, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(58, 58, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(59, 59, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(60, 60, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(61, 61, 1, 'BSCS', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(62, 62, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(63, 63, 1, 'BSCS', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(64, 64, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(65, 65, 1, 'BSCS', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(66, 66, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(67, 67, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(68, 68, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(69, 69, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(70, 70, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(71, 71, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(72, 72, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(73, 73, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(74, 74, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(75, 75, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(76, 76, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(77, 77, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(78, 78, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(79, 79, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(80, 80, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(81, 81, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(82, 82, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(83, 83, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(84, 84, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(85, 85, 1, 'BSIT', 'A', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(86, 86, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(87, 87, 1, 'BSIT', 'B', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(88, 88, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(89, 89, 1, 'BSIT', 'C', '2025-07-24 01:59:49', '2025-07-24 01:59:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(90, 55, 2, 'BSCS', 'A', '2025-07-24 02:06:24', '2025-07-24 02:06:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(91, 54, 2, 'BSCS', 'A', '2025-07-24 02:07:20', '2025-07-24 02:07:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(92, 55, 3, 'BSCS', 'A', '2025-07-24 02:09:03', '2025-07-24 02:09:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(93, 54, 3, 'BSCS', 'A', '2025-07-24 02:12:08', '2025-07-24 02:12:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(94, 42, 3, 'BSCS', 'B', '2025-07-24 02:34:32', '2025-07-24 02:34:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(95, 72, 3, 'BSIT', 'A', '2025-07-24 02:34:52', '2025-07-24 02:34:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(96, 90, 3, 'ACT-NT', 'B', '2025-07-24 04:25:14', '2025-07-24 04:25:14', 'cnjxkn', NULL, NULL, 'cmkdmfk', '09989987976', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(97, 90, 4, 'ACT-NT', 'B', '2025-07-24 04:32:17', '2025-07-24 04:32:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(98, 55, 4, 'BSCS', 'A', '2025-07-24 04:33:36', '2025-07-24 04:33:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(99, 72, 4, 'BSIT', 'A', '2025-07-24 04:42:15', '2025-07-24 04:42:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(100, 54, 5, 'BSCS', 'A', '2025-07-24 05:49:58', '2025-07-24 05:49:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL);

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
(1, 90, 3, 1, '2025-07-24 04:25:14', '2025-07-24 04:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_transition`
--

CREATE TABLE `student_transition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_transition_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `transition_type` enum('None','Shifting In','Shifting Out','Transferring In','Transferring Out','Dropped','Returning Student','Graduated') NOT NULL,
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

INSERT INTO `student_transition` (`id`, `original_transition_id`, `last_name`, `first_name`, `middle_name`, `transition_type`, `from_program`, `to_program`, `reason_leaving`, `reason_returning`, `leave_reason`, `transition_date`, `remark`, `created_at`, `updated_at`, `semester_id`, `student_id`) VALUES
(1, NULL, 'ABARRO', 'AVREY DOREEN', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-24', NULL, '2025-07-24 02:34:52', '2025-07-24 02:34:52', 3, 72),
(2, NULL, 'Haliluddin', 'Naila', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-24', 'from hist to act nd', '2025-07-24 04:25:14', '2025-07-24 04:25:14', 3, 90),
(3, NULL, 'ABAO', 'MARIE ANDRE', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-24', 'dropped se', '2025-07-24 04:30:50', '2025-07-24 04:30:50', 3, 55),
(4, 2, 'Haliluddin', 'Naila', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-24', 'from hist to act nd', '2025-07-24 04:32:17', '2025-07-24 04:32:17', 4, 90),
(5, 3, 'ABAO', 'MARIE ANDRE', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-24', 'dropped se', '2025-07-24 04:33:36', '2025-07-24 04:33:36', 4, 55),
(6, 1, 'ABARRO', 'AVREY DOREEN', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-24', NULL, '2025-07-24 04:42:15', '2025-07-24 04:42:15', 4, 72);

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
  `role` varchar(255) NOT NULL DEFAULT 'sub_admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'Main Admin', 'admin@gmail.com', '2025-06-07 01:36:36', '$2y$12$Y83WxVW5AVkWHww5wrNnLODa34Na.KLgccmE3mA2dehNzMNXro4kO', NULL, '2025-06-07 01:35:09', '2025-07-13 06:44:07', 'admin'),
(6, 'Rahema Usama', 'rahema@gmail.com', NULL, '$2y$12$6vMKX3tWmoYX6CFVb.QwW.S1OlU/bRrB49Eqn2JncRmm6L6Z5xZDG', NULL, '2025-07-13 06:28:09', '2025-07-13 06:28:09', 'sub_admin'),
(7, 'Marjorie Rojas', 'marjorie@gmail.com', NULL, '$2y$12$19.z368x2WA3aVHxiGWebea6a4Elhz4kkhoK.6cQuMXdrfWyW5OJu', NULL, '2025-07-13 06:32:49', '2025-07-13 06:32:49', 'admin'),
(8, 'Athena Maia', 'athena@gmail.com', NULL, '$2y$12$AagK5su71OVhfZAx6Oz6H.f6cI0NMSgMrgJUFgLCix6EsNMOoSplK', NULL, '2025-07-13 06:42:11', '2025-07-13 06:42:11', 'sub_admin');

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
(6, '4', '2025-07-07 20:04:48', '2025-07-07 20:04:48');

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
  ADD KEY `contracts_semester_id_foreign` (`semester_id`),
  ADD KEY `contracts_carried_over_from_id_foreign` (`carried_over_from_id`),
  ADD KEY `fk_original_contract` (`original_contract_id`);

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
  ADD KEY `counselings_semester_id_foreign` (`semester_id`),
  ADD KEY `counselings_original_fk` (`original_counseling_id`);

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
  ADD KEY `referrals_semester_id_foreign` (`semester_id`),
  ADD KEY `fk_original_referral` (`original_referral_id`);

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
  ADD KEY `student_transition_semester_id_foreign` (`semester_id`),
  ADD KEY `student_transition_original_transition_id_foreign` (`original_transition_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contract_images`
--
ALTER TABLE `contract_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `counselings`
--
ALTER TABLE `counselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `counseling_images`
--
ALTER TABLE `counseling_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `referral_images`
--
ALTER TABLE `referral_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_transition`
--
ALTER TABLE `student_transition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_transition_images`
--
ALTER TABLE `student_transition_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_carried_over_from_id_foreign` FOREIGN KEY (`carried_over_from_id`) REFERENCES `contracts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contracts_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contracts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_original_contract` FOREIGN KEY (`original_contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contract_images`
--
ALTER TABLE `contract_images`
  ADD CONSTRAINT `contract_images_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counselings`
--
ALTER TABLE `counselings`
  ADD CONSTRAINT `counselings_original_fk` FOREIGN KEY (`original_counseling_id`) REFERENCES `counselings` (`id`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `fk_original_referral` FOREIGN KEY (`original_referral_id`) REFERENCES `referrals` (`id`) ON DELETE SET NULL,
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
  ADD CONSTRAINT `student_transition_original_transition_id_foreign` FOREIGN KEY (`original_transition_id`) REFERENCES `student_transition` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `student_transition_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
