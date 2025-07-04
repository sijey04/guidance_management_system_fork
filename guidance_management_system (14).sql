-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2025 at 06:09 PM
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_77de68daecd823babbb58edb1c8e14d7106e83bb', 'i:1;', 1751433279),
('laravel_cache_77de68daecd823babbb58edb1c8e14d7106e83bb:timer', 'i:1751433279;', 1751433279);

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
(1, 4, 1, '2025-07-03', NULL, 20, NULL, 'In Progress', '2025-07-02 07:26:42', '2025-07-04 04:09:38', 'Community Service', '2025-07-01', '2025-07-21', 'djfijfidj dnfkjnflfdk kjdsnlnskdn'),
(2, 1, 2, '2025-07-02', NULL, 90, NULL, 'In Progress', '2025-07-03 04:48:21', '2025-07-03 04:48:21', 'Community Service', '2025-07-02', '2025-09-30', 'HOtdog cheeesdog kaya mo ba to'),
(3, 8, 3, '2025-07-02', NULL, 20, NULL, 'In Progress', '2025-07-04 01:04:03', '2025-07-04 01:04:03', 'cheating', '2025-07-01', '2025-07-21', 'dkfndkdfn');

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
(1, 1, 'contract_images/Y9N2OCngB58TNytmuOGiBdf5FRymlZaSJBPMpaqD.png', '2025-07-02 07:26:42', '2025-07-02 07:26:42'),
(3, 2, 'contract_images/U6eS6Qx1B1MUzYpfNGx7rrPnPeW9CIT5bAzprRhd.png', '2025-07-03 04:48:21', '2025-07-03 04:48:21'),
(4, 2, 'contract_images/hK4C5IG0jDzpQySbDiz5y7iigOE2GhL6x3xtJA2p.jpg', '2025-07-03 04:48:21', '2025-07-03 04:48:21'),
(5, 3, 'contract_images/9CyS2GbUdVsokPqYKLxcnIgxApwU3Nm3SjdPBspo.png', '2025-07-04 01:04:04', '2025-07-04 01:04:04'),
(6, 3, 'contract_images/AX70thcDACqxhwbbZAvuoBShbAZTZrJp6RU2Kd4d.png', '2025-07-04 01:04:04', '2025-07-04 01:04:04'),
(7, 2, 'contract_images/Or6FuyV5JjweQIojzUlrqFpQ3zgpLlJBeVhk3XFK.png', '2025-07-04 04:03:01', '2025-07-04 04:03:01'),
(8, 2, 'contract_images/dEGxYmSTPMT65d0c1ymUFlwsw8bQfyfGqhPDrRWl.jpg', '2025-07-04 04:03:01', '2025-07-04 04:03:01'),
(9, 1, 'contract_images/Q6IcMMcqdouailO6OLkHrHWUEbgn3jicZ8nqELG2.png', '2025-07-04 04:09:19', '2025-07-04 04:09:19'),
(10, 1, 'contract_images/QBTWhFoZ1CYK13qQVNDW6WWhLuOxJFXIB3EvfBdq.png', '2025-07-04 04:09:29', '2025-07-04 04:09:29'),
(11, 1, 'contract_images/dDvkKYn4H9z5fMaxDOorlngZD5o4lrMxZheVK3aH.png', '2025-07-04 04:09:29', '2025-07-04 04:09:29');

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
(1, 5, 1, '2025-07-01', 'Completed', NULL, '2025-07-02 07:28:20', '2025-07-04 01:59:21', 'Ajnkdfn\r\n\r\nhotdoooggxfm');

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
(1, 1, 'counseling_images/J6S1za5dPSdb8aDkcTwl3IjmqHhHy9nhYaNLiLwM.jpg', '2025-07-02 07:28:20', '2025-07-02 07:28:20', 'form'),
(2, 1, 'counseling_images/AIt30qOEk7NnMlr5lHM202sun9suMV9n1jKxZe4M.jpg', '2025-07-02 07:28:20', '2025-07-02 07:28:20', 'form'),
(3, 1, 'counseling_images/sRdwvar5C6Qm4B3idmlX15ZWyoV60ijc1PORagrX.jpg', '2025-07-02 07:28:20', '2025-07-02 07:28:20', 'form'),
(4, 1, 'counseling_images/aZFOi7DXRgmQ298r2cd3ZiAONGOoNlN7Sv46zeGh.png', '2025-07-02 07:28:20', '2025-07-02 07:28:20', 'id_card'),
(5, 1, 'counseling_images/bz7LDcFDU7ioxjhT49vmj9tLAbUMp3nE2pLWUvZc.png', '2025-07-02 07:28:20', '2025-07-02 07:28:20', 'id_card'),
(7, 1, 'counseling_images/vjD5Kl4GtH9hgK45nYLYuWojCzxCeDB6QQOHVUK1.png', '2025-07-04 01:32:34', '2025-07-04 01:32:34', 'form'),
(8, 1, 'counseling_images/GWcQfEJxw6HMZ4XilbQGVz6GJzHDFbBk4JLaQ5bJ.jpg', '2025-07-04 01:32:35', '2025-07-04 01:32:35', 'form'),
(9, 1, 'counseling_images/SDm7VHAC1q5a54kT731QhAfbhugDGzGDbtyODdOD.jpg', '2025-07-04 01:33:34', '2025-07-04 01:33:34', 'id_card'),
(10, 1, 'counseling_images/5fzrv10kt2bQ2YB11Ca8YQXMNX5fy50FVtsPHVIg.jpg', '2025-07-04 01:33:34', '2025-07-04 01:33:34', 'id_card');

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
(3, 'BS Computer Science', '2025-06-21 09:26:45', '2025-06-21 09:26:45'),
(4, 'bshit', '2025-06-21 10:48:26', '2025-06-21 10:48:26');

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
(1, 2, 1, 'Failing Grades', 'cbjbx,clmlkdvkkklcxmxcm', NULL, '2025-07-01', '2025-07-02 07:27:39', '2025-07-04 05:32:06');

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
(1, 1, 'referral_images/FXyDG7YWvRzUAA2yQM9pm02DH3jtic5PIohW7Wow.jpg', '2025-07-02 07:27:39', '2025-07-02 07:27:39'),
(3, 1, 'counseling_images/rXzwtS5MwfW33fmjbRSW77lK0EFMTgpEZFJd9Ltv.png', '2025-07-04 05:38:26', '2025-07-04 05:38:26'),
(4, 1, 'counseling_images/4gOMb6FcI8bIravBXJxrY8nDffikuNRAsFznST3s.jpg', '2025-07-04 05:38:26', '2025-07-04 05:38:26');

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
(1, 'Absences', '2025-06-22 04:54:43', '2025-06-22 04:54:43'),
(2, 'Failing Grades', '2025-06-23 22:12:18', '2025-06-23 22:12:18'),
(3, 'Poor Study Habits', '2025-06-23 22:12:32', '2025-06-23 22:12:32'),
(4, 'Mental Health', '2025-06-24 20:11:49', '2025-06-24 20:11:49');

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
(1, '2025-07-02 07:17:05', '2025-07-03 09:52:22', '2024-08-15', '2025-05-20', '2024-2025', 0),
(2, '2025-07-03 09:52:22', '2025-07-04 07:19:21', '2025-08-20', '2026-01-05', '2025-2026', 0),
(3, '2025-07-04 07:19:21', '2025-07-04 07:19:21', '2026-05-20', '2027-08-15', '2026-2027', 1);

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
(1, '1st', 0, '2025-07-02 07:17:05', '2025-07-03 09:52:22', 0, 1),
(2, '2nd', 0, '2025-07-02 07:31:04', '2025-07-03 09:52:22', 0, 1),
(3, '1st', 0, '2025-07-03 09:52:22', '2025-07-04 07:19:21', 0, 2),
(4, '2nd', 0, '2025-07-04 04:12:52', '2025-07-04 07:19:21', 0, 2),
(5, '1st', 1, '2025-07-04 07:19:21', '2025-07-04 07:19:21', 0, 3);

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
('0801Eadz3naox614IeIYY843miA7e9nun8UyT6xq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkl3U2N0WnVhbGhTUGxwUzZHaUVlTVpNbG1qa0ZBYmxJWk9ka09BdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642207),
('0eNFejHJJiQQluryzB4j1nhGDeFp3RNixFSCtfcj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaW5QOHFyZXowT1lWVDlDU09ab0F0QVRVS1gxSGU3eVRnclM3ZHYzVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638856),
('0LSK789heU2W0NPcHHBOJNNO2MnfANJz2gv0xVxV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS09UZjF2bEEwT0JWWk84emZmdkg1a2FFVXk2eUhWMU5VYm93SFhPcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640448),
('0PlXY90OXqLiMKfEj89yYLmfHY20DflO6AxgHuhE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEZPWVNlSTFsNmtzYTR0dUc4bXQweHpTazNIdmlMTzE5OFF0YThFZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639871),
('13j0ET0Urh03vFkogNrd7wfPBf6qX7PjxkszLEiu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazlMTlh3SnBUeGpNUEVaYXVCTXQ0VkZkd09OWUJzNjVxcGdoODNtYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640468),
('15I8mITUZKpwAaMGxDEx2MGBAM0p0lsJtOvUkqmp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVVrZUppMk9kVDZ4dXF6RTFxV09NY2NCTmVzOE1jM1NPNk9FY2t4QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642048),
('1A8QdCjMXP1JtGVIKcCoqvpWhqRweXtK7bHZ9rKf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1RLeDFhdmF3ZERrQjN0SkFyRTZzSzZyR3A4d3BnR05RSXhCRktkciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643933),
('1rHHeuXMqJ0u57id3n3IBviWDTw8JSl41HdoAqrt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVEdqR0k3Y0ZLbDQ5WVBhZVlnMHhoSzlXRmNCNFA2bGdlTE9hRFJxcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640379),
('1WwIqIM0srLYsnh0Q0ijOmc2dZZmlXhgAPjQkIKx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGE3a2NFRHN4NHhuMzBVS2ZHNHRHUkRQSWdXeW9EVVQ4NTRoN2hidCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640329),
('29F543nHpt8kqL9qhlHO9AodnNALP93LIwk57ZFg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVVvR2xmTHdJODdBekVVWmlkdW0xTVVDUDNNU2E5ZGNxWUNLcDFqZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639881),
('31wQT0cQWxLM7vWDNazBCJr4EuqGFOKMRUCxGOH6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGdCaFNaaHdHbEZkY2xaWUkzMkljSlZVWDJjcUhhc1ZaaTlBTGJ4byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638852),
('3INLRoiemlKL2SLxLUlM7tzlBHPxNigIGjXY2xbd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEVRYU1RQ1R6ZGdWUVY1VEFrNXBMdWZoTTRYb202Q1pOSHZqZ05NciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643837),
('3RJ4xefyyhtUPGOV1mD7FytheaTLUHsF6BDAX4XT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnYyVFFwN0pRZW9wZjZCYUVuaDZqUDJlM2QwQjVnR2hESWhNSWZJSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640292),
('3XzLDbeF8O4NuXpPtk0hu560J0iM9RvQeDdePEQE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUgyUVlMd2YyWFlnaEg0U0RRYUhaNU9XNkFvbkhlQ0xCR1h4Y0RJbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641243),
('4Noup11HBFa80Z94uVrAWGUT7ahEKBdPE9s4kTVb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRXloZXY4QXptT09wMDV3YnY3QXNIMjhRWEdwaDNOY1h1OVpKdTd6ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639888),
('4qvnHF1lOA1IUIxlhoA9aEerBTUwvI8AZmfUWMhG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUFsdW5odGkyWnFRZ0tzQkU5ZjFGQklkTlBIOWNxRWM1SHJPQ0x4UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639884),
('5DM7ewCVgdRseVbhCjvHbifjUGsX7hsKUL6rTbor', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUM5Snd2QnFIckJoVHQ0dTRaSVVZaFV5ZEh4VXVNU25sMzlxV0tXZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643806),
('5qDAdrIOmdzSJFwTcyS1jjTjvTAI78ZWFtKQaprg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVk0yd0gzY0RROVNhcldEU05uMUtHRTRiM0V3SUhDajVLcDNyUE5SaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751645000),
('5rLjz4N2j9ldRn3UL3NPbJb8Z7wjIivZYpPENrqS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnpCSDhMMWZMTVl6dXpyS2RzUmZhZVEyOE9QSGw1RlA1U1RJc0dMNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643928),
('6dkXdE73aSC7B6uO8aAp86mq7fSekRSl3EBkWx7Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTlKeWF2YTA0OENuaWpxN1NKQmhsS1ZaRFRBMTVnSFN0aHZReTNNdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751645031),
('6jtxNyFpxVwpa3TNQ5IfGgI9GdiOnqovJTFxC25i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0JKV3l2Z0l2dU5peWxzWWNBNDFKU0NBR25UR0VKUmR5WTdMR21NTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643093),
('6t665YPwYeT7NcPcc3VDVIj8fC87Wdp0uHvWp4Sz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUxMeERVdjJId1dSZkhQTWJEWHh6c3JaeWlmT1NGdGZ0eGlPM3RodCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640340),
('6xKx4bUeCJiEC6fxWzbFVYakfdFqq7Lq3QEPoHnx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHRtdVRpcTczbG9mTGxxemZmRzZXbXRwV3oxd0N0RDRZU3M5Nm9SUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640642),
('8XkAVM3wQqWCU5jD9hWpwMW2VwJsrVL0DHRiOJSw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYW92ZXh1b1F2V0hWb1I5T0N1MmNMZVRQbG9sUWx5SDN6OXA5Y1kxcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640633),
('8YlOQoOhkorcPFDmzuPlAdWpQgQYQbpzmHrpBQZN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTZvVWZpNGdJSFF1cHljY3R0SlVtZlVrdWhIdlV6cjFMQzV6ZnJTUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639700),
('9WeSMrcZ9KPLTY0C1m5UNEu097qAEeYPwwl80CkA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQkZDQmI2Z2lDZTY4cTdtN2pNd08xNzVGRmxiWGw1NmlPQmlRdlZxbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639703),
('aBfDRMZhOg8F0wvChEzj4f3r7UObQK7a0WzUPPsJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFRnU296dnlsRklCUDgyMWo0eEN3WnZYRjVDQ281ZWE5M2ZRVFp1OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642119),
('Ay21st0GCgSm9ej3LnfmWlH7XDCGCtdiEyWxn00m', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDVncWhhY2Ywb2FNREFlQVc5YjRWRG9kOURxV01PeWxFOFlPQTVVSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641462),
('Bc9N9yvSVxTmFdPjpSfxi6jGIkS6VFf1zqz8Zhdg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib29SclRuUGoxY0YxbkJrTWc0d2dXWlg5c28zcTdVRXVxNjlCTnpBUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640474),
('Bd5aYamZWSR8MpMU58Jd24JfyfwpNe8TAU2fSXl2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ05ZcEtTanZnTkd5dDY5UUFpVmxra2ZGTm15TTI1MFlDbW43R3BSMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640640),
('BEBjY95oiapZxPiYjPErmPiPhtwfwnHOglWqaFUF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFdPU3dLYjMxOVpyNHZubG41dWlzYTMycm9qY0paTHZSakN6OWR0dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643064),
('Bov4IN6QKdXWsQKBGkLnRlw2tFy6bV6AwaIflCVa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVdqWWhvNlBENHhDSXVIYlJHQ1d2djBVTWJTbDhVUFVNTlNCWkRodyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642310),
('bRxso7wASxnCHgFlJi7hu1ehhU8gyXsUVTH4UJvt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnpTRlNBNVp0UGhOQ1JsTGdrWnFKSG5sRUtlTmtvUE05M29KNEVUZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640294),
('C1AcKdkEQdIwHVt9hYFpgIyFbhYeMkKdtEEKKubL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZlRnakpGZTc5aUE0QWloT0I0bmxGRGtzQUowZEVZM2s0YTc2U0pBcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643371),
('cCkfh9JEkIQJdG5gLTaxaHTbn1viwLOWdd1F50Pc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3hpSU5sYXAzbVloMldlcGVEZEp1UEl4ckMzdUFMVENpYTZ2RjZ6ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640644),
('cf8tTDXhYMH6OVLrUp32GEm37kLpuMJngAW6Tu30', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzFmdkNNbHI5eXEwcGpmNThkVW5XS3VKUnpQVWplTm9uZkFHZEhxbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642720),
('CvVIpwBRnn8qd5fcSR7MDZ4eoz5d7APJ2S2WCsdD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWxrQ3pIUXdRVXlycDZOV2J0RWVpdlhVajJKcFlDZ0V0RDIzckFGTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641459),
('D5GoZyNRAQuK7NHflnoLNqd9N9yETnXEvsBvURmS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHNNdWdiQ0JpNVFEWTBpdDYyNEZLd3V3ZzM2cUN3WFd3TXJlZzdqOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639895),
('dK5ZRie6PG0WhddHiZqyNrHi2aqzRRsva4V2krYA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOThBNE9kUm1Ia3dRSEJVRkJPb3J4YlU4UnV6MVlHeHNSakVxUE8wQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751644403),
('Dv2sK1EWryU8U3WkLstAfqYa7rzxd4QGkHiK29r4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicXc3NTZKcGs3MDlDeWk3eW1DR1lwQ2xldTRXSlJQTE1WMnBUQXJXNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642923),
('E8ej8J90ViSaulscPGbGs5A332GhWx5Nn7HSbdKf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVUVZbmhHeDFLTE4yRDc2OXlwcUM1VzYwSVJ5RExxemp2d2c4NTRTMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640322),
('eeOyDTiFXMe7pwFAv0pb6sabFAgVR9dZDlem24pT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGtMUzlHbG1VcTJvbFJUSkhSOVhQT2FTenc2N056ZE1Vamk3RnlGaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638836),
('Ef8a9RD5eczSAHbOuTqS9Fa0jIZzTe55bHvz2eaT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1ZaeE14aVdUU1lISjVLR283M3lLdVRBSjF2bVFYRWVneVN6bzRpTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641853),
('EKt6c5pdhv8r4EjK38JcdDtzJ9idJ89uLWxdMKMv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTk3VjM2Q1MyV3ppVDlZNW1TZ09EZFZONzFjb0IzUU5qRDh2SUNHYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643918),
('EprWcmsOYK3NNjG3cJBZKUTXG78gomm5HBXk3y7M', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajVpMjRQRVVvZVdLZ2tmd2VnSGZuVG5oaWJmZ2FXOVJjTnB6ZDU4OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641478),
('eTKYZLDOs0EftdzX78rY3Q1yfS1lafO2RaKraN3D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib05sTjJPVDNxQk9SWUZRNjRxaVNNTmtkcWdEQ1Q1aUQyZmVITUxSciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643620),
('FcdMgrundHzUN8LYIvyQKWgC7EmlPP32dO019V3h', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1ZNemdXUEdCbUhjVTJXc2QxNEFSTFBhMlZyb2dXQVNJZTdidXpRSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751644979),
('fMtUNDay7G501fXFTWmOCUgqmwnkIARImcHvGrlX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUtSVjhyVjhwVUVMSTc1VGxoTXpZNmtwdzhkTnlXWUcxek9CS2drbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642212),
('Gjb0BjrW9yEFp1RHG26eVurMU0PKFmIKSJ1i5IZm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMERVemNTWmNUZDlkYmdCS2Z2YmtUMDdYcWJBbWo0dUpyeUdkb05odCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638888),
('Go6c93BcZuMeD1ppv8H4DJCDSYaCslnvtyuSDXlN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjFQTTNyYkM5NkVoRklBUGVzSnhuREJ6U2t5WU5yTjZZd09BdmE1NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643106),
('GWyAqtLPP9wH9nKJbRRio7juQHBnXpjO5OvDuClZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVlPem03SFJpeklYcUtSZ29ocnFkcklZRGt2WVJ6ak1TWEhad0tDOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641929),
('hBuZoh2mqweLb5zeqLxNunUKGqFtJg8kMznsbkRV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGRGMGRxWHhGRHNya2hjSWhQcnRvejNRdVliZnhqOWJFWjV1M2w1USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643808),
('hi4iciyCeb79QSpo2CezVQZLCSx7GSkRlUTr88F2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMW5HcFhIbnc4eWNPdE1rNnlnT0VOdU01ZkNaSkZ1WDd2NHhrQW56NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643350),
('HKpFZia1XW9jwiT9a0iWUmP5yeiVp1tCUvXOeudp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWJjQnhyZGJ5NjVHU3EzZXhPR2NSNmdhMTJER1Jnc0pDQ05QenUydiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640285),
('hL5zjvGCM9bbnRKEChHXm6KR4u7MbsLBDCrRxkAq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnE4cGVmck5tMlJ3cGhOcTYybU1kd2NKamFoR21SZnE0V1BHaUhIeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643116),
('hMiUfWF0tXHq2eCVAv7cKkZexVfTVlXbOhjXRkdm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZmtQdmJCUGk4YlNuendlSTY1OUFrRnVRNDhQSVVqV1Y4NjV5ZkpxYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751644401),
('HXMJ6i9nm0tbbEa8QmK4sfPfQyFakNUpqvapnUNT', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQUhBcDk1YlhvTGl2ek9uejdFMmZwSEhHNUFrUUhabDBYWldoRVJiMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0L3N0dWRlbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1751645348),
('Ihbo78jiBLwSGZKJ91b5eHd4CvC2lD5qkdUz6Ahe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2dOdDdGOXBkZWtiZzdlcEZhN3VsNExQVjNuTm5sazNYQmFwQ2NtMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751645017),
('IYoRRsYYViSFLUI0dT5it055ZQf3P8cbVIWatJNL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVVyV1JjSTE4Rk9tbHg5YTI2UTg1ZFRybG1wWDQydTdWTHd2RHRTQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642152),
('IZnG0lusiKYxQsnc8b97FIIEub4QSq0FqTqvl5ow', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDFzOFVVQWVMbGdTVnI4RjJNQ1k3ckljakc1T1BYcHhLTjdpb2JleSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640343),
('J6PwMNt5u7ShX2vYHax35LyUamBXjHvsyJ9YRJNy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTm15VWRyekpoMWx0V2NBTW9zcVRURDA4Q0o1UXpNSkNHdlJxVDFUQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643121),
('j8iEMiNl39nVaUBoc63kXJ6wwDRdVDsQX2oRq3TY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3Bnazl2SFJlNFI3UjViVk50VXltR2RLN3RnRXAyVWlWeVdLOHd6MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643653),
('jbd3gxiW5770aoCy2SRCeipXtUxx2maqF6EmSySR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHFnWTYycUc4bnAzRkJXNHNlRllwN1dIV0NTb25NQ21LRXh0dzRTWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641843),
('jbgaU4vyiAnPu01EmwfrVoukq1NsVbGMXgg3bJ2Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnpSUWtlU3VrTGNIaGZzUWFkYk43YUpsbmUwUkJvYkx0dkVQMVlociI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640111),
('jc9nXmgKOiU35RM58qE65nGaqCoKsiuYrXPCyrSi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSWJnQmE2OXBrdGRuYUVCVWNhZmVUaGFseHZPMDZKRkMwOFY4NDBRWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638344),
('jRYkHf9cGhIEspyiITIUqaNfz6d9zHSaXFVXqrmt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM3cyV0NXOUxxRTlhd1lUbTJyNlE2allrZ0g0cERVQnpnR0Vkd0tVNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643652),
('K6ySBh7uOnN6WJgXe6dkgWVJ315cVe1qeoyFKaRL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUFViZFNneFVOU3hSdjZndVlLSERuUk5vRVdpdVZzNUIxcUhRNVl6eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643618),
('KEBVcJYwAKdbvmumwsv2KHGhUGhXZVp0Jv93T7iQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWs0aG14R29NNEdqeDNBVjFXTEp0VFdMR2NJTWxZckdFSzdnczM2TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643802),
('kgugrZSkUGPBn0yQvZISn3gp1etbXi9qh6GKdwlJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaktnOVpDb1NyNGNmaU5ZM0Vsd0FiMUJaS0JETDg0YXlCaVJSYlluWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639958),
('KOzAV29fTZpLfsTp7pkzrKj87O3BjuCXpOVmWaAP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2ZweWxuU0tqOWdzOFpNbkVwM25kUllZTjNXZ3JVZWpiVGFvTENodCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643656),
('KPyFFLd1D23a6w19oUW3YuCVNt2cyoNJV1z0TAMe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidU5ER1V5cUY0UkJSbWdUOFgwQnBjdWkyQnVabEhOM0ZVVEZ4RmhUYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640694),
('KXUVaVQlt4ZS7lXFjWxlC09WNJ7Gr5NNHUW38VL2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjJtc1R3N2pnUHlaaTZ4YUwwRU9vQ0RLZUZSZFQ5T1doODMzbTl2RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640636),
('L1WHag4uDXwQgZkXPbMR4ZAaTlWVqyiXFQe2vnyn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSW52V2xMaVBBTXVRM25HRFBtR29OOHZEbkdhTEZaTTBJNmRkMUFQMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643017),
('l2Op0Q0QtG6Hs4UukICcAT9UFcJTRkMNInF87ioU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNG5jREJ3UW1SRURvWTBFeGMwWU56ZTRiV0VsN2lqdHNKYjIzVVZFViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641220),
('LoQorPJ7sxlPEvxsYys652T23YU818ISFQKe0GXf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmVzRkxlRERKMUNWS2tKekRrWGxiemI2Z2NnV2s3a2NoeU5XczY0VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642916),
('m9nDXNEhTY4SijLekIvMA0kMkiO6msn1GYFfxtCI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFRDdDBCandTOE4zaTBxbXEyb2RSQm9rdXR3WExFTWtZcTUzS2N6byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642170),
('MHgbIIPY1M3poc7WPtExGcDqakOplIZKSPhnKmyr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiak52b25nRUJoZlRQSW5EYmE2V0JwTjhocjUwSmo5V21BbGpZMDFDYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642203),
('Mhw2j74dK3pd8ABkwQrBRYM1FpN7Ekr112VeD0v6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1RrcXlKWVVEa0ZXSE05eXFSQ2FCbE1iMXlTYWREUzJXdlZPRFNGUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641227),
('mSN467ORuFRTDyh1OFMYp1iGfbVpYmFY15RP1xyL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWppcWZXTThRM0xyUE1UTTlYQXpxZFJTdHVPVzh4dHFleExCbk9YVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643650),
('MunszQAWx1HONUJPrH7xVDg2O4TJaDTaecRZ47ZN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVVBeXA0VmFkSmZKcExrbDY5TXlTZ2NWeGxpTjdueE1UbW5mTjNCNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640452),
('MvAbTjPZEJ32CLA5qZDOA8tcFFwpG7CnH6BI7ASh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2cwS3dIR0FqVVRBcDdPSmlMS3FqNjRFNlNHM3d0eDNDVWdUZ3c1QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643954),
('Mx9Nt4daLTvUacHqzPDIN6vootmf28VsTnZmBm6i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickNPeUZMYk41UUJZYW5FYmlMdmM4UWtPM2NhaEJiWTNRSnZWdWJ2OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641858),
('nCEJe0H5YjjOM8RymwwVd2Edr3wmFnegLLnRmke4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjk2Q1FId05oeUg3cDNKR1p2OUNYdTVIUjI3dktLNFhEejBYNHdycCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643625),
('Nj1YjbtOiktuSV46dhmWas5YPoqivSvSwf2gf8DP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUVJTzVsSDhqU1N4aXZQVWhmc1ZRQkUzOUw0R1NPU3dzM0ROQUJHOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643003),
('NlzZdE6pyiDRvNBaBJARiltydJg6ZpYoEe5BJE3R', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVRxZVV3dFNCeDdONzhibWJ6a3VVUUFlRzNqUWZ3RWN3eDdlM2dyNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643952),
('nNmkMJizJZrLnL0fHaelFpP5kUXLSq1nxO2buHGs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2QwcloxeTdjVzRkMzQ0RVUyNVpKRWszNDd6WnNTWGs2MzNJQUNTciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640696),
('O3sTp1vdIZWQB9hSzeplettUxWnRECOahoKhgO4c', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVJvMm1vbkJpclFqeWhRYnZteWxVQ21qRTJLNldwNEpIRU1mSEhCcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641184),
('O6C57ygXmllilQqeXYwBNosewFVA9AfmxSNNZXIt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjFxOGl3SEg4eTZtMFgzTjNWYXI0ekNkS2VEUVFyN2dSZkMzZnBLTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639706),
('O8p4F3zi5bdWqgH62yrDpUQS1vSiPWCaZ5ALxiWU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnVyaDFlN0I3bXJXZjdOODB6cmpvRUVyenpKUlliN3ppc0NzdUpKeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640310),
('ojqkEILRYhaZykZ915iwRLrtRdjDtXsEtO3J4fT2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWc2NFpPdU1GUDJMUjVvV2J2VjF0d213TVNtSnRNTXZtbm5hNFdXVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640290),
('onVQm1019Rp6BsxJDvZFZK0q87qeA96pwDYEYeog', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjlncmNMcURUSmN1ZlRXcm44ZFVzc3hQdmJaeVQ0a0dvU0t3TXc5QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640374),
('Oqpn3BLGIvdkGZItQ7XSUCOsJMLjtOfusuxZZBOo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWpYQkJYRFBpSmxySFFZSk1SRnk4RzZ0VzZXUmprRWpxWHBLYlZjbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641817),
('OyMq39p8qZfboqCSnUfLA8DyaFySrENJC4sQi3pH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTNSRUtMakFpUnVnRzNuYlhvUnV6azJDSkN6Q29FeXV0SVB4UHA4YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642134),
('PCXO5C2LshhKxuvmfW62X7RqcoqXxZJykWBOZmwm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFJ3eE9ZSTlVS3Z1Wk5iSXpLMWpJVUdsalA2bDZjNmxjZlRBS0hIUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638349),
('PKIbYbiQVU9tOSWG7CedYsHWG1zxgmaSKv5NjxyH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWljVEtRMFV3amZXZURRR3Bwc1Q5MVFUTllSVTdnemgyaUl1ejdXcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640405),
('PlmEaiBgjpKksvbx3cOzNJexTbkdxXLFhE0RF1ia', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVNvRkZUWDR3T0M2RUU0NHZxaDh4ZTRMM1FsQWNINWdKeVhPdHZmNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642052),
('Q0E8Ypxd21UlIUMDNCBC64sz84qDmB3lTBUtceNl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTJwS251Vk9oV0dKYkpYdDE3YUh2UWxXVmJQZWl5ZE85andudTJqMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642305),
('QeqiN7TtiajtCG5khp0SH0aatHjLkxB5J8x2rv8D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHBZaUZ4RkYwMnB4M3JNa0lYTW5kb3hiSGk2eFpyd3hUb2kzMk5IbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642168);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QGIIIDtl55GzWmjzueqtXaR9QFdjfeMNqQqVDl6C', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlpoOVFTVXZBVzJJdVJrZW1URlNiNFVWcHhsUmdXbnRwSUxWeHNBcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641847),
('QQtIMGfP7ZJAxGyITmJCP7XO5AzkZZucISJ2Lmu2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM0RIOEkwdXM0QzByQm11aVFHU25sTGZzRGtKWE9HRXVWaU9HM3phUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638821),
('QRAWlysorXaDzpY4vSLUyCdrYoTR2LeAxgoyX2kk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHVBMTJ0eW5rcTlSNFY1cTB6a0FqeWU3U2NRQmZqWWlVM1ZST2NUeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638816),
('qTa1wCjUmLoCVvZoWMrcRgqUJzSyaVVac15rzGUd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTBHRGV1T2dXTk1rc1dSZzEwTHB6UUIzcUpNa2lEanpvWnhyVk1PUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640335),
('QYROzSjsMOpT1poirhdolLTgIuAayncyqJxOFc9b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXlnNkFQZzlhczdnd1lEUjJvOGRQclA1QmN2UWNNMzJUd0xWZkU3SCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643599),
('rIgsJ3DebnJ08hqEq0ipWJsTfVUdchwj7Ara0FQw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWG5ZWEZBOW1rY3ZkckhPUnBaNmJmRXVlUEtocTgyQzhlRmk1cGJ0WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643614),
('s3ikWBsJc3vuwjtg5IKDKrZeaKW6k1esySndl6Jn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYU1hdzhWcnJsVW84NnJMTGg0a1c1NEN5SXFvZ0dBeDRZMGFXMWRzWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643591),
('samwHaDAyIi3wihgyIQrSMAebHSA5N39xiQ7ByDU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXZwalEwYWVXUmJWWGptbWF2d3V3bksyUkxxQThhMFFaUnRiM3RmNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640690),
('SCHiGlQFhMwnEpDYcWfOIXrutuqDfhOFovZPz0fZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2k5MzY2bzdtdWpvOU5WNzJEbXFMQk04MFRjN0VTTFhTWWVHREo3YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638867),
('SEN1fnF5flxFlTF0RIsFMwFC3349IN92teH5wWVd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUZCWlAwNTFtaTlYdHV6NUU3ZkpSVEZVM3ZpTWk4aHhXM2NQaVo4ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642115),
('slYxGPfrmXIBLR5JvRZ82gEA4GePwfn3AT22xnnV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTktoaEhhTjk5QmVoamp1d2l0UldpamNzWHh5SGZJVVlQV2s0dW1hRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643007),
('SR2nn5qWjS77kyEcd0ELwQTXYDxZ6FsaLVtrnANq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjVKN2sxWnkwM2lMeTZ2MWZ3R2lSQ1FKNlFDY2RoRE5JR2l2a1pzYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640399),
('SvPqytzbagIaifSvYkIhVk4QV4vCUJSvwAlUCXw0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDd5OEZraUhPYkxtV3ZzTzFsRFUwamJrN3UxT2kxaGpCUkNjWTB0WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643096),
('t31cH445vLnqH0dH8oNfSi4YdoT68N9abOqpFgWr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzZrRG5Ca1lHV2xLVzhhN2RIM053NzlEZHEyVURrTDZVVGFxSG1OQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643111),
('T7CiXxYuT06zvLDx0RZrqCAf6RGyR4j9hJjzJ4t1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3BrZFlZbTlRRDlKOFlNOTI4Z1pBWTczaUpqVXZEOVBXVEpOUzZQQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643787),
('TbjG8PI1l6hzedLzgzRDpYJOSGQsHyRDfCdAwDBb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnNQM3hieTJIdXdTWVJzYnZhWGtJUnZXVzc2SE1PZTZWSVRCYmJtQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640086),
('THClA0iEMctMUzLG4AA2pd68k5OOGBZoSSsC1xLv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzlqYWtiR0R5RzZJd3lwUzk4MFozamxieGxDcEhYZGlKYmNOaWVYSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643795),
('Tl8OyfvDU3mhNIbBbTZ5n6thFbDD9N8fz8I4ntmd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVBWSWtydWQ1NXphd1RXS0hFa3hXSk1hZ2J4WkVhTHpnU2JWb1BMcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642177),
('tLIqCwLpkKOCxIqup4yQMPqmoM685nTjI9JQ2t1D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmNvQkwwUFlkOFRMdUd0RUYyV1ltVUViYWxmVTFsR2d0N202c0FXeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641280),
('Tr7vdmH2Chuv01ItVqFgQtmmVFveb4fTjLMGGwdR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDgxVDFOd1dTZmdZZUFwY1F0bHlwN3lJZEpCQzhmdUt6cDVGN0E1MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640088),
('TVJhZCCDjsVdpcVhnoL5YaNmK6PhkE4DT4TzNsN7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianNxazhjUUxraHRUZ2p6WnVRd3VYSkh5SEI3SEk4SVM5T3dzVGdLdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640302),
('TYrF0RJiVqkGaHATLl56qAXQpOSdVFzvl9ZJtOy8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialJGOVBoUHE1NFl5R1hpTEl6RU9WSVA4Z2JZWXE2bFYyTVVkM3ZaaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640304),
('U1pRTPPl17dkQ0O7w6Iv96Xh66fsHiLqQFP3JQ0F', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2xFSnVSUGJuSm5UdDNiaDdmVmx6Q0F4ZGUyaTNXZjBxamxqelp2VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642150),
('u4MoNrZv6h5lG0RR2Iiwo0aUaCALV198Ju4CFs0v', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOUZ3UkFja1hyUFdmU3dwdFNvb3Bhd1J6RGZHUGd2WmJydGZBYU9tNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640497),
('U932zTRZ9i1An53eISmyA92LE4oRbMe34xdK6AHC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHhlSmdUaVVzQXFwSlJrbFFVVUJQUm52bjYzOWRtTkY0dzlvWXlYbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642156),
('ugHtzT5ZOc2fAVxZyVV1g58j5nYkXS6ZYXpcQt8Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm5LVWhqZ1B3eERLMmp1dDFRellmNk5oWEYxZDRqeXVxZXJmdXdoQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641850),
('UgmZiBUkJkhW6ciHbtBSKh3OTWvawNb61WRIYJfg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieDRSbGE1MklSQkhyQUtuZ0kwZm14VFZ3S2ZHUkIzeExSV2RxYVVYbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642146),
('UhYl6yC6EYsqVWUnUm3gZwgNVueeUYDhKrUcuwo9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3NwYjhHZWxJTU4yN3lPc2t1TUlXVE5RQmE3Z29hb1owNG5HZnBqSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640440),
('UIwx9DGIdJ5W1tLEenkGCsShmQOAprFYV9ChIeRi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVBOV1NsR0VvV3daVXZZaHo3VlUxdkZJVXdpSHM0QlRWdU96a2RFYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638877),
('Ukqxbdo45w41xPs3cbvLMLdGwjeiO5kTM2QXlREs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTliVTgwS2t0RDcxQjhkbjJpTklOQnBQV1RMOTJGSGk0NWN2dXk4cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642092),
('UkzsVnb98T3sqkm3OEXdz4u97MZpxzvVzj9sVHIF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFJPWWtxRUh6Y1dFVWdwZWRqMEx5YzNRNERNZjZmQzc4dFlUb1phViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642107),
('uMNrW44uor5cQsSpsKt7kVT9xehTsO4Bf44zhO8l', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTNWNm9sS0tXWDZlT29Xc3Q4U1dxc0FiaGMzcVh3RnVhVnM0QjE5NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642921),
('UtXRF5zM0tr1jBP6FAMv1oWa83CZJY8PgVIbWb38', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2piT3ZOREQ5R0QzUTZsNTNRcnZhdEE5Q3lQR1hxdXNOMG5zb2hjNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639878),
('UXKFlQi2Yvja7cQd5bdlt02KlXEDKzlnSGLByyYL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTE2MTdTdnpKQUMyS0pBWEZRS3p1WThSNGRaWU1zbmcyZlFicGpsRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638871),
('V5xdXoOFGChcNiaVkgLPStXlYp8I2IJV8l6QZc9P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0dmMFF6SFZSNnN5UHdaMmNxV2JPT3JDQmNuUFVmMk52bXNZcGltVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642111),
('VDC5EqKl5mqNErujfS0r9WM8hUzEZ2yXl0Mket3r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidk4wN2kxMURGRGxTSVRxTndvRlpDUWk5SGtEenNoZkZyS01pUFBUeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638884),
('VfPoEP7VczVA8o0UIEzL8R1zvctWswQ06vDmH3m6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0swM3NYSHVQMU0yejlTbU1HVUplYmlKNzZqcGMxVFRpUktlZUVQZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641823),
('vTeBfWvgQeJWYCgqroXk943YxGKKveNRVo7eKDv3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYThza3kxak1aUHN0V1hjY2hiVEIyNVo3alVSemRpYlF2U2hWS0w3WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643148),
('wDk31AYsb5haU6dCxEUtEBdANJEMybpwgXQQvLD1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREhaNjB6ZVpTMFpsSWswOE9PR1FMWVkwdnl2Y0hwem81cHlkTDdLVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642098),
('whOoQMloN48uYRR4QktgnTIcyMlfE8aVEaiQqoP4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3dkZ1JJUVBONVdiZ0ljWGtXcXdIU3ZpaFhZeWthaWk5TGdyZzI5UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751645005),
('wJN658ddrwA8VTwAtZsB3YdhzRaeb1EENErwgrfb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHpmenZlSG1XRmhLRkFUVjg1NlJGWVM3NTJHZHJsM2ZiSmRlc0lndiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751644397),
('wlOZaisyhztuRm84T8BYhFVx0SbKDl68zK0hLiC3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTJBWnBldUNaYWQyd3NtRXVsSEFuaFZlV3gwNmYxOE9WMEI3ZW5ZbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751642770),
('wP84OlKthUU5aIL6vu5v2XrfuH0e64RoCM2oVC1W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFFZaU96YXBTUjQzVmk1N25mcFJaNW5aQXNGcjY2ZmUyRjBwQTExZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640472),
('Wpfxvuv1gARSSUrLlXvKQq5gnIKL4GhvBKkjzETx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRjh3QWJ4RzJIaVNobVVxemxMMm5sZzlRUXdadTlhdkJQZEdHV2RIUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641939),
('WwX4Uy30V63eLwg8orEkptfIjiK8Vhw7pnlCVCHe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieURQSFhsWXZBUXo3cjRld09pOHNoTFRFUVRGRXE5UTdqRVczNHp1OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751644984),
('X1hfjgWyas3NhwzjLrAJtEBY5pLrRDbfHstmp2qx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2VQZTZJaURndTQ0emlXOUFXa2ljUW92b1RtR2hzZmlDNHdkaUx1RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641179),
('xgox41yuI9PzPbwO5PafbqqUPYEUxWv22qFyV4S8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWU5kallWR01oQzc2OFpFaFBxcWJEa1p1OU54Ym0xR080cUQ2V2EyZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640300),
('xibi9AIrOctenTFKPYhKWTHWWuha841RSumqeHIC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzRkTmxYY3l5VVVibTFCN2lWQXJ4Vk9OaWhwanJ0Y3hWTk01N2tKQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643357),
('Xwp8CRuKfy2Nt3QcRWjR9czoRcj7Xmasw6jESI7r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkpEWHJNZ3NnUEJKV0dOYU94eVV1ZUFsSGpIUkU1MTMzQVFod3oyYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751639874),
('xxAVzLUXPX6WdIGf6vzocI3rrHMoxBJJhIOBDhGi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZm9zQW5ocGZITmQyTDVPSklHeGZRejJ4VE9hcTBZaERYdXJEV2hzOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641848),
('Y9jd5UGd8lxLaIwLKNpDdXRhVECuBjeQ9ByRb3eG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnhPckJKV1hpa3BlSGRzdnZVbUg4ZmxXeENHTVR1R3ZiSTZYWVpWSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638906),
('yBmeIakHlXL6PbQW2y2UPFyCBNS38cIF0sZow7Pq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXY2UkRGbGlVU3BkNFUzOW9VUVFJeG9jTEcxWHdHSXdoTmtLSUdVbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643839),
('YDQCwnEklAIUoPnoZeV6hne2Hlw44kI0mjIDnPbW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDRveFhzT0MxS1JUOVZLTDM5aWFuYkxIRjRFVGlrOWEwTjdhSTIwMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641456),
('YjFopeki9um4SJHdR9B66pES25IhUOGRBGP3JRbB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUhMb2lVdk5aT0dLQWpZWldaeVIyb1F3bTVuRTlHeDJlRXc4blZGeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751643938),
('YKKaQt1jdExAn89ERmQtgb075gBfx05fJr8hRtLc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTEltdkN6ZGkwRVhwRFB2aVhETFNYNk5vTmNtM0xyOUphb0JGNzNrQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751640096),
('YSyVMlwCSd4U6TWN7fY3LA9U8TA4MAIfJtmMhp1K', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVF6a3h5YkNPTkF4aWk4ekhVR3kwbHdlWTdxUEd2R25vYm03TVkwdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638892),
('zBtI0sRSfr7psN6G9j1tFgJvjFeq0WSGPc70l586', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiME00aUNjenRGQVlHMUNPWmM0UU5lV3hwbmtYeEplSVc3aUM5cmgwayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641286),
('ZJLYWBlE1OyNAH6Kn1NKXuDSGZsw9vs5bYFYerFA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDFtVjNXbGh3bnVnS21FWVpJUk5xdTJoR0c3THZ0N2tJN1B1QXJ5NyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751638908),
('ZwyccUMSWBnCnNiP9MJmoetb1vXYeQuJgadLCC9W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVRCd0gwVnNqNmhmYVNsbUhTM2tESE00Nk1pOXU5STd0TnBJYmpwayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751641487),
('zzexqkgUyfLOPJUEF03jUhJ3s5edKXEAY8DooRd1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3RrcXA5ajZ0Yld0Vkt5THY2clJIYVpPT3RTQmQ5OXNVT3A1YXJ4OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751644986);

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
(1, '202201050', 'Naila', 'Taji', 'Haliluddin', '2003-12-15', NULL, 'Female', NULL, 'shfhdlfj', NULL, NULL, 'Alfaith Mae Luzon', '089788745534', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-02 07:19:09', '2025-07-02 07:19:09', NULL, NULL, NULL, NULL, '374985'),
(2, '202201051', 'Alfaith', 'Mae', 'Luzon', '1989-05-05', NULL, 'Female', NULL, '13uhdbjh', NULL, NULL, 'djkfbjkbdskkb', '0989876556', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-02 07:20:52', '2025-07-02 07:20:52', NULL, NULL, NULL, NULL, '0998655654543'),
(3, '202201052', 'Ayana Jade', 'Fabian', 'Alejo', '2004-07-10', NULL, 'Female', NULL, '12124kjhdfh', NULL, NULL, 'Alfaith Mae Luzon', '0987867656546', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-02 07:22:17', '2025-07-02 07:22:17', NULL, NULL, NULL, NULL, '09988776565'),
(4, '202201054', 'April Rose', NULL, 'Alvarez', '2004-04-05', NULL, 'Female', NULL, '12334345jnkfnjdfj', NULL, NULL, 'Alfaith Mae Luzon', '00980878678', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-02 07:23:26', '2025-07-02 07:23:26', NULL, NULL, NULL, NULL, '09097986876'),
(5, '202201055', 'Josh', 'Abil', 'Mendoza', '1989-02-02', NULL, 'Female', NULL, 'hsdkdsfjn23', NULL, NULL, 'Vincent Concepcion', '0987673475', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-02 07:25:21', '2025-07-02 07:25:21', NULL, NULL, NULL, NULL, '090076876765'),
(6, '2023908447', 'PERSEUS', 'COVARRUBIAS', 'CASIÑO', '2025-07-03', NULL, 'Male', NULL, NULL, NULL, NULL, 'Unknown', 'Unknown', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-03 07:28:06', '2025-07-03 07:28:06', NULL, NULL, NULL, NULL, NULL),
(7, '202239399334', 'PERSEUS', 'COVARRUBIAS', 'CASIÑO', '2025-07-08', NULL, 'Male', NULL, 'CANELAR', NULL, NULL, 'djfnndkjn', '0987865', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-03 08:51:59', '2025-07-03 08:51:59', NULL, NULL, NULL, NULL, '09897790'),
(8, '202022233', 'Alyacher', 'Ambut', 'Salihuddin', '2025-07-06', NULL, 'Male', NULL, 'suhsifhius', NULL, NULL, 'Alfaith Mae Luzon', '0989787675564', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-04 00:57:50', '2025-07-04 00:57:50', NULL, NULL, NULL, NULL, '09786767564654'),
(9, '20202992383', 'Vincent', 'Delos Santos', 'Concepcion', '2025-07-05', NULL, 'Male', NULL, 'gdfgghgh', NULL, NULL, 'cncddkfn', '09897867746', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-04 01:01:01', '2025-07-04 01:01:01', NULL, NULL, NULL, NULL, '09087686576'),
(10, '20252328449', 'last', 'na', 'talaga', '2025-07-03', NULL, 'Female', NULL, 'fjdfojiofs', NULL, NULL, 'Alfaith Mae Luzon', '0908978867567', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-04 06:06:35', '2025-07-04 06:06:35', NULL, NULL, NULL, NULL, '008904878'),
(11, '2023544576576', 'final', 'na', 'tlga', '2025-07-14', NULL, 'Male', NULL, 'dsfksfdkso', NULL, NULL, 'dofkdsfdik', 'fkdfkdsfok', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-04 06:29:38', '2025-07-04 06:29:38', NULL, NULL, NULL, NULL, '045094858943'),
(12, '2090939834398', 'utet', 'utet', 'utet', '2025-07-02', NULL, 'Male', NULL, 'dsdnfknd', NULL, NULL, 'cdsdko', '09883847897', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-04 08:07:21', '2025-07-04 08:07:21', NULL, NULL, NULL, NULL, '098977');

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
(1, 1, 1, 'BS Information Technology', 'A', '2025-07-02 07:19:09', '2025-07-02 07:19:09', 'shfhdlfj', NULL, NULL, 'Alfaith Mae Luzon', '089788745534', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(2, 2, 1, 'BS Computer Science', 'B', '2025-07-02 07:20:52', '2025-07-02 07:20:52', '13uhdbjh', NULL, NULL, 'djkfbjkbdskkb', '0989876556', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(3, 3, 1, 'Associate in Computer Technology', 'C', '2025-07-02 07:22:17', '2025-07-02 07:22:17', '12124kjhdfh', NULL, NULL, 'Alfaith Mae Luzon', '0987867656546', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(4, 4, 1, 'BS Information Technology', 'A', '2025-07-02 07:23:26', '2025-07-02 07:23:26', '12334345jnkfnjdfj', NULL, NULL, 'Alfaith Mae Luzon', '00980878678', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(5, 5, 1, 'Associate in Computer Technology', 'B', '2025-07-02 07:25:21', '2025-07-02 07:25:21', 'hsdkdsfjn23', NULL, NULL, 'Vincent Concepcion', '0987673475', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(6, 1, 2, 'BS Information Technology', 'B', '2025-07-02 07:42:37', '2025-07-03 09:29:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-07-03 09:29:38'),
(7, 2, 2, 'BS Computer Science', 'A', '2025-07-02 07:42:37', '2025-07-03 04:45:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(10, 3, 2, 'Associate in Computer Technology', 'A', '2025-07-03 04:39:33', '2025-07-03 04:39:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(11, 4, 2, 'BS Information Technology', 'C', '2025-07-03 04:39:48', '2025-07-03 04:47:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(12, 7, 2, 'BS Information Technology', 'B', '2025-07-03 08:51:59', '2025-07-03 08:51:59', 'CANELAR', NULL, NULL, 'djfnndkjn', '0987865', NULL, NULL, NULL, NULL, NULL, '2', NULL),
(13, 2, 3, 'BS Computer Science', 'A', '2025-07-03 09:59:24', '2025-07-04 00:14:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '2025-07-04 00:14:33'),
(14, 3, 3, 'Associate in Computer Technology', 'A', '2025-07-03 09:59:24', '2025-07-03 09:59:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(15, 4, 3, 'BS Information Technology', 'C', '2025-07-03 09:59:24', '2025-07-04 00:14:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(16, 5, 3, 'Associate in Computer Technology', 'C', '2025-07-03 09:59:24', '2025-07-03 09:59:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(17, 1, 3, 'BS Computer Science', 'A', '2025-07-03 23:51:01', '2025-07-04 00:13:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(18, 8, 3, 'BS Information Technology', 'B', '2025-07-04 00:57:50', '2025-07-04 00:57:50', 'suhsifhius', NULL, NULL, 'Alfaith Mae Luzon', '0989787675564', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(19, 9, 3, 'BS Computer Science', 'B', '2025-07-04 01:01:01', '2025-07-04 01:01:01', 'gdfgghgh', NULL, NULL, 'cncddkfn', '09897867746', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(20, 8, 4, 'BS Information Technology', 'C', '2025-07-04 04:15:47', '2025-07-04 04:15:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(21, 3, 4, 'Associate in Computer Technology', 'A', '2025-07-04 04:26:12', '2025-07-04 04:26:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(22, 1, 4, 'BS Information Technology', 'B', '2025-07-04 06:00:24', '2025-07-04 06:03:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(23, 2, 4, 'BS Computer Science', 'B', '2025-07-04 06:04:06', '2025-07-04 06:04:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(24, 10, 4, 'BS Computer Science', 'A', '2025-07-04 06:06:35', '2025-07-04 06:06:35', 'fjdfojiofs', NULL, NULL, 'Alfaith Mae Luzon', '0908978867567', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(25, 4, 4, 'BS Information Technology', 'B', '2025-07-04 06:08:39', '2025-07-04 06:08:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(26, 11, 4, 'Associate in Computer Technology', 'B', '2025-07-04 06:29:38', '2025-07-04 06:29:38', 'dsfksfdkso', NULL, NULL, 'dofkdsfdik', 'fkdfkdsfok', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(27, 3, 5, 'BS Computer Science', 'A', '2025-07-04 07:46:51', '2025-07-04 07:46:51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(28, 4, 5, 'BS Information Technology', 'C', '2025-07-04 08:04:52', '2025-07-04 08:04:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(29, 1, 5, 'BS Information Technology', 'B', '2025-07-04 08:04:52', '2025-07-04 08:04:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(30, 8, 5, 'BS Information Technology', 'C', '2025-07-04 08:04:52', '2025-07-04 08:04:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(31, 12, 5, 'Associate in Computer Technology', 'A', '2025-07-04 08:07:21', '2025-07-04 08:07:21', 'dsdnfknd', NULL, NULL, 'cdsdko', '09883847897', NULL, NULL, NULL, NULL, NULL, '1', NULL);

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
(1, 1, 1, 1, '2025-07-02 07:19:09', '2025-07-02 07:19:09'),
(2, 2, 1, 1, '2025-07-02 07:20:52', '2025-07-02 07:20:52'),
(3, 3, 1, 1, '2025-07-02 07:22:17', '2025-07-02 07:22:17'),
(4, 4, 1, 1, '2025-07-02 07:23:26', '2025-07-02 07:23:26'),
(5, 5, 1, 1, '2025-07-02 07:25:21', '2025-07-02 07:25:21'),
(6, 7, 2, 1, '2025-07-03 08:51:59', '2025-07-03 08:51:59'),
(7, 8, 3, 1, '2025-07-04 00:57:50', '2025-07-04 00:57:50'),
(8, 9, 3, 1, '2025-07-04 01:01:01', '2025-07-04 01:01:01'),
(9, 10, 4, 1, '2025-07-04 06:06:35', '2025-07-04 06:06:35'),
(10, 11, 4, 1, '2025-07-04 06:29:38', '2025-07-04 06:29:38'),
(11, 12, 5, 1, '2025-07-04 08:07:21', '2025-07-04 08:07:21');

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
(1, 'Salihuddin', 'Alyacher', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-08', 'ndnsdnjdskn', '2025-07-04 00:57:50', '2025-07-04 00:57:50', 3, 8),
(2, 'Haliluddin', 'Naila', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-03', 'Auto-generated shift out', '2025-07-04 06:03:32', '2025-07-04 06:03:32', 3, 1),
(3, 'Haliluddin', 'Naila', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-03', 'fffb', '2025-07-04 06:03:32', '2025-07-04 06:03:32', 4, 1),
(4, 'talaga', 'last', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-02', 'fgmlkmfd', '2025-07-04 06:06:35', '2025-07-04 06:06:35', 4, 10),
(5, 'Mendoza', 'Josh', NULL, 'Transferring Out', NULL, NULL, NULL, NULL, NULL, '2025-07-01', 'ftfghjb', '2025-07-04 06:30:23', '2025-07-04 06:30:23', 4, 5),
(6, 'CASIÑO', 'PERSEUS', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-01', NULL, '2025-07-04 06:42:26', '2025-07-04 06:42:26', 4, 7),
(7, 'Luzon', 'Alfaith', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-02', 'xmclm', '2025-07-04 07:44:21', '2025-07-04 07:44:21', 5, 2),
(8, 'Alejo', 'Ayana Jade', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-03', 'Auto-generated shift out', '2025-07-04 07:46:51', '2025-07-04 07:46:51', 4, 3),
(9, 'Alejo', 'Ayana Jade', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-03', NULL, '2025-07-04 07:46:51', '2025-07-04 07:46:51', 5, 3),
(10, 'utet', 'utet', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-08', 'dhudf', '2025-07-04 08:07:21', '2025-07-04 08:07:21', 5, 12);

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
(4, '4', '2025-07-01 22:48:59', '2025-07-01 22:48:59');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contract_images`
--
ALTER TABLE `contract_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_transition`
--
ALTER TABLE `student_transition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
