-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2025 at 03:35 PM
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
(3, '2025-07-04 07:19:21', '2025-07-04 08:51:21', '2026-05-20', '2027-08-15', '2026-2027', 0),
(4, '2025-07-04 08:51:21', '2025-07-04 08:51:21', '2027-06-04', '2028-08-23', '2027-2028', 1);

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
(5, '1st', 0, '2025-07-04 07:19:21', '2025-07-04 08:51:21', 0, 3),
(6, '2nd', 0, '2025-07-04 08:47:55', '2025-07-04 08:51:21', 0, 3),
(7, '1st', 0, '2025-07-04 08:51:21', '2025-07-05 00:31:23', 0, 4),
(8, '2nd', 1, '2025-07-05 00:31:23', '2025-07-05 00:31:23', 0, 4);

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
('10W7yViBtPWaGFQZNg5FHW3mmAbG3qH6YP3fDLdY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic2JwbEluYUlkNzVsQUFLeWI4Uk1wc2M1Mk1kejRJZnNNelVxcEdQRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720792),
('2SFxRUZropkiFZn4Lipt62sQLFCsCdz45f2TMDqK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibVVrTmRaaDBNeEFXMFhydzlzempIV0Y1dWNqbWtFbFRma0xWcFhXaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715054),
('3plTFEhSeOceCsfM3J16i5ZJgQUFmaLL9cvcPro2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQm92OTkyTFNOOWVSM05LN21GMGtvMEhhQmVZSDl2QmozNW9ORGNYUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720778),
('4jJqv10sIpFU0vSC5iXr06iuGfvdv2bkdRGdcm8C', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmtSRGVkRHJTdVlycGtkVjZJM1lvSHMxSFJNalJlV05tdFF3TGx3SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720746),
('4UgL5nYuQOLRxYR594NaNyFFKmRsRRlXr7TJ2MyZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzJodElpNzBkZDBMZlFSeEJTdjdOZUdwOUpIams3ZXlhb3lhWlhUbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720775),
('4Ww9Zpl60Je3qXwLlQqLgJSkp9cZrqrpEfVOEUbq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSW9aV3hQakpoTzZ0akg0cXVwS09FdThOS3JtZjVqVWNUN2FqcUI3OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715436),
('8tklArvTahX4FVWFcJVMy2Th7bxOBiHasfr64hoW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXVJQlVvNnhmZDZDblBxbjEzSEd0cU13VFUwcVZNWkZLeExndWI4MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751721332),
('94QRQPNIYsm3joUkdrTRebzojwvjBXf1LtYockjP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzM2R05wZlZPS3YzTEZBencyaU15RElRbEJReEVuYko4cWNLSVU2TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720104),
('9lpciuHAQoFNIzD6UyFT3YTvLiJuJuUt1kRjFSCt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUE9HRTVwN29HRXZ2RzJVMEh6UVRLaTVjYjRzYzZYak1IWXFjUE1TaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751721349),
('9SdXS8gva0CdLAw7euMwoUaxHb8FdqTtyNhupQcB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHJrQ3hrbVdsUlNqU3M1d0ZOcmt0VkYwQTJNM0pNcjlVUjNJYmpPVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715034),
('A2JYq7Zaeltbzd67QaZmPxda9LRcRaJYmjDoinC6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVkxuNGhWTmdVRFNsNkppak1pSVBGWEc1SHJ4cmpMR25BVjlTbDdSUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720750),
('a6MH7YhsEjShB0pbNOnlNfOVKuobAYpbQlIUmfmS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGF2VVBTV3dRT0JGTmtsNTZJb1NhTEZxd3lKRkJGak5jVDI4ZDBMUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751719094),
('BjXLwL3EevDjsW1KA6diABUh1b1h3GaSUIFQtlDI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmVlSHFZOU03allneFNUbnZrbWppV3k5WDBqaHNob1BXaFZpMnJCdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720750),
('DiyA5yDIYxHAUy0behWJO4nUgT1S44taqQWFNFrd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0Y2OFo0bWN4NGQxOU5HM3JWZE9udzhxNGpMNFVwZmpDd0kyTERjZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720776),
('DoDATsAlEYrx3rkwGffUweoeSnw5sNgw1m46fS8L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlJWRFliZU9pMFRNRG5VYzZVME9vMmlrbW5nZU1IeGRlZkV2UktjYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720793),
('dpbsyU1MFJZpVyzeVhehnODcJL4P6WaquKgxhdDp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2g5Z3p1blhLZkhUQXc1SUZpTzFiWU53cmlOQlY0TnVvcnBraWJSdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720903),
('ekqQhAf1INa8dM1yxLqwe64xVfQscOYJvhIFCnT4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHV6SkRWWURGSHBYWlN2TzdvUWM0RllIM2tGY0FucWhjSnZ3ZGx5OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715038),
('eTHrJZ32vKAuGpne3846evLc9sSEkyOdrdFTAAZQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2NTWHhpdld5NVBTd09EUVoycTV4TlFXVFlSbW9Lbk5oMzVhd216ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715695),
('f4LX5FzqzRJY2vWF202kdZOHTY14SGQR2VjoV4Ru', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY21NMWpoek5KSERkQmlKSzNESm1wY3Q3NE5mZWpKdXpqSlBZMzdCRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716097),
('fffXDSPj3JZiWY28Nn9zEWJChL6Q8yVwPduf6mWD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1V4aENSQklRZjhIa2tobGRBdzJxQWNLbzAwSkdhc3Q0WEtMcGgxTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716087),
('fstphlfPGPsZCxmiXt2QuasPSFqj6VKDiHntTjUJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2o5Vmw2VVlaZzgwenlud1RvaE41Tlc5QW9WbUsxbGlUZjBKRldKOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715430),
('fUguGqq6Ce3xSr2phuBtdONZmpMlpyyVly0qm84Z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzJGSHJnSzJ1c0ZwR2hoQVlra3lYalFOUlExc3NyS2tQNHpGcjBDQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715425),
('h4zUmBG0Icf9SVYM7ukDT8yoAERw5YPP5AMn4ohx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidWxoejJJckd1UXJTelVXbFh4dU8zRHNBaWtTTnZVcFFpaUg5MDFKbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720483),
('h8fy6Yx1EN3wKhqUYCv8K7L9iiSniGSkXSkHh82r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXNiVW9HSjBjTGhrajNHMDg5dG0xRnBUa1hpMzRrMWtUaXlNVzI5WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720782),
('hKxChYOKT9dpnNgPbgTgviXhj6bnufPKdMSRO2Rs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczVveERld0tkY3Z2NW9zek1zdHZTUFpvVUg4SVFKVXpHOTNrNTg0SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716428),
('HQvAnhxYBLpCdpE2fds3sGBCAvsW7yPYy0oeqG9w', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXhsbEx6ekJoN3I3b2lJRkJWdkdGclFuY0JGSUY1N21EallKMzBaSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720745),
('Hxi5seSuv1qfRk5k7W2yCi8BiyQY0LBJhdLTXBBU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHNJR1BSaGpSbTVDTExyTU5RTGVidVIzdnRxNnZQS0VJblQwQW5JSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720794),
('IgOKuB0hrrZ5fXaUDqpioNtxOoW5ZNntxn9Lc7hK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidUpBUWdQbFVqTWp1WFpHUmdFWFU5YU1vVGlxTWFzOTNiMVdETFA1SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715440),
('j4sIhvSr9mCqK5QLfGO4yFplXp1HLZ4k1J1EFKOD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWtOQjB0MDBSTkl6RmIxclBXRFVKazJ6Ulhna29rVzNWV0JmenZDUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715038),
('K4RwOxMOHV1AE7va3uqF4qGx4sXChk9MAMz3NZD2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2RRT2ZobTZxVTJYNWVQN3hNR2lWUUZoVDEwbTBBRlVsWE5UQ0RzUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720773),
('l7AoTw3ZtdHaBGT2X1EDWQPdnAW9QPm33GlawJvM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmZ1YUdqWmhjVUhQbnNMbFJxUVV5R3pMck5LUjROdnVMRzZBWlhxUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720112),
('ledIwBfJr8Mo1rXIx3XUam1EGXphMnrn4PLi3FsI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicDY1SGF4NUtUcHdqdW0yQ2pwcG5xeGJycVVBMDlPZ0d2YjBLeUhiMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751718578),
('mFFBt2KqWXSlxFK8x8HCqyDv067xEjYojtIxz8vO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVBtYUpWMDZUNkhYek5odkNBenllSHdGVWJFRWJqRzJQRUc5V1UzTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716430),
('MFJjueIdQ5BiEi90dxFzeDJjY5mTueG169wKEtWd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjhZR2VOREdtZzJhWWd1NkVKcUpzaUZPWE1id2dyd29NeXVhb3U2TCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716447),
('mV0XCutTq3rglrT6EJviXdwIbwykYhyPMACnok2j', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXhkb1JFVWNPZnEyT25NcEhuYWlOaVBlMXFKbTNYa0lNSW9qNTRBMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716089),
('N91cVdDVQu8G86yXDdGhWf166Zpt9gENiyq12Vym', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmljQk1yVGMwOFlrcUZkd25OZHpNUHpab2JGQ3U1WlM5OU56Y1gwbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720797),
('OjbP4M3sgHMH3LfeX4mUsdPk5VAYFPp4r7hSAao3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRThvaXlGdUJzdGlCZjFHS3dLY1czN3hrWHVETHhRaDZiVXI3aml5NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720691),
('oVSgUK8Cz9u530nj04LxVQb3tOc16zOk1ZP9pS1u', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMUhJQnZObHlxeFVDb2tLWG9oUTN5S0NJN29EM1FWR3diZ2xsS25laCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720743),
('p5Bmdp1t5jMLWQQx0LYvExOocEJwnktR9e8lxnkq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVW5IYUVoamR1VHpJMWN1VXhlNHdPVlhKWU5zZE1aSENBSkZMcGcwaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751719098),
('pGGxjkoePQu0E2nfiEnFoAN1fwTekJFa2i98HZ3S', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHo5cEVZeno4bFF2UmlPUmx3WHFzdVFhaUdnMlVVVEg4bmdxVnYxZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715279),
('ptKGXjNumNMXmK9ultS8LfYwhgHjdXuzt5FI7b9d', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUJvZUtNUGt0dUd0c3p5T0VTV2ZKTlhCZkVBTmFpVGdMMFFyOXFLUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720661),
('pWMphvFfS5qwPhmpE4uCcCO3nyFT1dARFxZRjwYd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGtKYk5GSjRqVHE5NG1NUEZIRFBXaFRBOVdWUWJCSks3ZnozUlpmRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720751),
('qAVCSzFW6zouWYITiLbByMnEGAuh6uzy1wlZcOvN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjlGaTlZNXhwak1BeGx1b0NKdXZoRUNIc3loOXpnVzROUEgwbWYydSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720673),
('qDzHsek9sjhNot4mxtFDfvo2Z7zdJzO15N4s7kui', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3RxNTZYanppODZabFFyMTZSYlp1Z2hxQ1ZQcFcySUZGWGxsb05HcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716067),
('qSmUOUm6UJFbhM79BLX0pI19ldga1CnWACU8lPg4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHVSMTFUZEdVN1ZZRTltSU1kQlZCRVVvR0lQM0d1WnFQR1N5NndkVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716066),
('qTnknpPzDL8DwM91gJUtHlIatxNJrLP8ElxhM9M9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDFFWE43MHgxRWI1bFR5YlVCV1ZralE5b3BLMG1aYWhzWjcxc0tURCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720777),
('qvUzvZ6Xd4t859PwXQccS93eubap8tAak3fkv36N', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajNYb0dBWVNibnFkcVVRUVBTbjNoTUtKSU9razdxbVR3bzhGNVhxcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720156),
('QXVJsTn3NWYY9bkhrj2yjcgBAqQPpyKhc0mSwZUK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVdDUEltQ3RteTRJM2N1dEg5Q3M3VzVwTk0yZFN2Y28xMG00bkdzayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720781),
('R0AblduZnG6z8SrU6eeRBCwYlKh9NVf8usUx41gm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUpsSmljMU1kWHhqN0F6enh1YkpoOW9MNEZkTEk3MEtONEs5dHViTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720745),
('rqzPzNI7eC2AGBKN1vyjhsss0RUqkfS1GY23E67U', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFRyQkpRMHdxZ2JkRHBYVnU5d09DRG11UUZzOXg4WlMyVXZacVRVNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720742),
('s9h43mY17dlZ16qbruZjoBEdDFaJH7angspXFpz1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFVXTHhFbkJpc2pIVUppc2xDZ2VsbUFEVmpFSFB6ODdOVWZYUnYzNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720801),
('SJvO5ztHoZes9GZABsOiWhxMh2Vp9QHbqSVDh6vL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXVMQzUwVjNQS0dCMEo5MENFb0cxMkZMbVZXTmNhSG1ET0tDYjFNbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751718576),
('SLbTxAv3RUfP3O1OK4yhnxz3xhNX3vfL4I27QpzZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWhid290dDJLYmFWS3h1cVJ5V2hzWnZoU25JeWZHZlFUNDZYNjA1RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716430),
('t0uX44lPUGLkseXnJZEzhpUcglT14Chqxugno9nW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTBHNXl6MTA5VXdla1lHSnpUVjlrTkMzaUxJN1o4U29PWVFzY3FDdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716997),
('TEdSALWS19W9azadnwkNXtMdCuhHqPeNufDSChHy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWVyanpDeWFoZVhvZHlTUzNwbXdRRFhGMXVBTVNqOFhYVk1rUzVmRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716164),
('tqzhSHAvbSARBfjOR6cFW7GcswkMRPhkugyYvNMY', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUWtIQnNmSEF5R2JaSmxVNW9Ba1d6bjZuQ05rODVSVDZMMGVrU3VhYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTg6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0L3NlbWVzdGVyLzgvdmFsaWRhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1751722397),
('ttsJ951rqF2EVTgBB0tt0UYuNxXu6npWrPJzGSMT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib25GTUFncU9JbVVKTjJIQlQzSXBFWmtsMjcwMGNwcVhBUElLS3k0cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715271),
('tvEhJtx260vnYb9eeOxkMWPZMNtgG8yvYgTQbQlL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDF4ZEd4WG11cHdaTm1LaHFteDJhUFpSTTduZnFpbWdaa3YwV1h4biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720796),
('UAtOanF0RlT3U409j8OiO3jgwiYebZ0Exl9kYjlL', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFFzd2t4S2VYWnNocHhHVE1qajFRa09YTkNVaXNWSTJVMjZKTTdxWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720772),
('UdcuzeKx5mFdfHS3AeQC1oDTPYdl4Q2sLg1JDozU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGpka0hPbVBWTFFOTXBON09wVUllNGVZZWZKdXNBNmtmelFrbmszcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720800),
('UGq40kYNnqWbNpr7gu6TAgt30XIULTL3QcsHFXQ4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWxMVm9VUmZLZzhySFY1ZXJOOHJueTZ5VmJ0S09WTGw3Ym5iTHFTdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715034),
('UgZ9QxtL7z7x21gFIuMhTLcORLPgF6rGJrsgRw4i', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib2tYT29ubVNYckh3dUhwMnpLVTBuQ2JVVHptWjZ6bUkxSXJxdzJ2ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751717206),
('VNbED7tLWjr47YQh31ZBsS5DhZcnaAZYte24yAfi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiam5FUlF3djNGU0NqNUNUQ0g3ZkJIOFR4eU44clVZZ2diVVJvV3h4MCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716067),
('voxG2jOUYEeB28tXRQudtssd0jAvm41ucQ6SYey3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUUxNYmU3eGZDQ0JPREtQUXZMd3Z4amhLNXZiaHJlMzZQaXViUmlqayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751716998),
('vVP2ETmPboFc6V3Ds4wjc8KKaC5zP6uDXwt9jHrJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3JoWDl6NWI5c0lKajdpOTlSMW1LRmg2eWMyemtyNlFXUEJZS0dCZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720799),
('wnp1AIb1OWYWFiZDsLCwFhk2XVyEKZlUFbpeerxT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlFjbmxCSlFWR3Qxa2hiTENhVFZyaW5xZ3ZLbDRacFNDMjBKazdWciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720844),
('WVEccHjxJbFT5rHd4BvmEA6ZML6e0kMqfD8ozTMf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGZ1Vk5aajEzakJ5N0taMVdabjZ6SG1DdEh1QmJGRG1TVkpka2t6diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715425),
('y6iAZVuHW6lKiufvuLE0YvrNEhFmPj8GRntaXyn2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVHZTanJQT3BUenFJMUZYTnpVT2k1bnp2eExQRDJFOUVjUG5JQ0RDSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715042),
('yc2qXwIATyZQsPxXG9Sr5orT4h04dyO3BQJYLAup', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSERKeGwxY0xDYXhoa05nVll0SXEyVXUwdWw0c0M5T0dFd3paMU03ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715042),
('YtA40Z5IiEbs9bBBoyZ2ybTQon7unV4mjNHA4mYC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUtEeTREYzdNVGtNdEFnSndGcEdydXRkbWlna3dockdxdTZHQWx0NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751715433),
('zTnioEU9K01HTqK0GPG5BgxgpeA8QUAy22cF23rY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV1pKdnlkcWpQaUtOaG5zTERDVmJCNjZ1NWtyZGplVVlOVVQ0RzVZViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751720083);

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
(12, '2090939834398', 'utet', 'utet', 'utet', '2025-07-02', NULL, 'Male', NULL, 'dsdnfknd', NULL, NULL, 'cdsdko', '09883847897', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-04 08:07:21', '2025-07-04 08:07:21', NULL, NULL, NULL, NULL, '098977'),
(13, '2739277347947', 'cmxzxm', 'idnidue', 'cnkjndsf', '2025-07-02', NULL, 'Male', NULL, 'cmdkcdm', NULL, NULL, 'dmkdsmf', '0978775464', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 01:15:02', '2025-07-05 01:15:02', NULL, NULL, NULL, NULL, '0987887876'),
(14, '1902018192', 'ddnnkd', 'cdckcm', 'njdkfnjk', '2025-07-01', NULL, 'Male', NULL, 'dcdkldmlk', NULL, NULL, 'dcmdkm', '08098879', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 02:43:06', '2025-07-05 02:43:06', NULL, NULL, NULL, NULL, '08098908'),
(15, '0098280', 'Ahjsdjh', 'ndsdnkj', 'lasdkj', '2025-07-02', NULL, 'Female', NULL, '09898', NULL, NULL, 'sdjkjnd', '09908908', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 02:53:01', '2025-07-05 02:53:01', NULL, NULL, NULL, NULL, '098980'),
(16, '09334i8', 'nvkdnfjkdn', 'gnkfng', 'jbjfgn', '2025-07-01', NULL, 'Female', NULL, '0843598', NULL, NULL, 'jdlas', 'iuhdnjdks', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 03:11:10', '2025-07-05 03:11:10', NULL, NULL, NULL, NULL, 'fjddnndkjn'),
(17, '349878987437', 'AJtheojekdfn', 'dfldmsdk', 'dfmddlkm', '2025-07-03', NULL, 'Male', NULL, 'dcmddfom', NULL, NULL, 'cncnkdj', '0898787676', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 03:23:44', '2025-07-05 03:23:44', NULL, NULL, NULL, NULL, '0936316543'),
(18, '3840934', 'djnjndfkjdn', 'dfmdfm', 'vdvjhnvnvk', '2025-07-04', NULL, 'Male', NULL, 'dmdsdm', NULL, NULL, 'Perseus Casino', '089786564', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 03:29:59', '2025-07-05 03:29:59', NULL, NULL, NULL, NULL, '09889837489'),
(19, '2739277347947d', 'mkdm', 'dmvldkm', 'kdmddkm', '2025-07-09', 'Jr.', 'Male', NULL, 'kcdcl', NULL, NULL, 'cmsclmkd', '098898765', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 03:31:46', '2025-07-05 03:31:46', NULL, NULL, NULL, NULL, '098986'),
(20, '039830842', 'Jeshua', 'louise', 'corpuz', '2025-07-03', NULL, 'Male', NULL, 'sjaidi', NULL, NULL, 'dffmk', '0979677', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 03:36:22', '2025-07-05 03:36:22', NULL, NULL, NULL, NULL, '0989879867'),
(21, '928732748', 'Jose louis', 'sdn', 'Lamostre', '2025-07-02', NULL, 'Male', NULL, 'dkmcdkm', NULL, NULL, 'Alfaith Mae Luzon', '0987634873', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 03:50:42', '2025-07-05 03:50:42', NULL, NULL, NULL, NULL, '0987654'),
(22, '20253948484', 'ultyse', 'dnfds', 'cnsjn', '2025-07-08', NULL, 'Male', NULL, 'kvmdlskm', NULL, NULL, 'dfmdkmd', 'dfksnj', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 04:51:27', '2025-07-05 04:51:27', NULL, NULL, NULL, NULL, '0998876756453');

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
(31, 12, 5, 'Associate in Computer Technology', 'A', '2025-07-04 08:07:21', '2025-07-04 08:07:21', 'dsdnfknd', NULL, NULL, 'cdsdko', '09883847897', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(32, 7, 7, 'BS Information Technology', 'B', '2025-07-04 22:48:07', '2025-07-04 22:48:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(33, 1, 7, 'BS Information Technology', 'B', '2025-07-04 22:49:15', '2025-07-04 22:49:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(34, 12, 7, 'Associate in Computer Technology', 'A', '2025-07-05 00:17:50', '2025-07-05 00:17:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(35, 10, 7, 'BS Computer Science', 'A', '2025-07-05 00:22:23', '2025-07-05 00:22:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(36, 13, 8, 'BS Information Technology', 'B', '2025-07-05 01:15:02', '2025-07-05 01:15:02', 'cmdkcdm', NULL, NULL, 'dmkdsmf', '0978775464', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(37, 14, 8, 'BS Information Technology', 'B', '2025-07-05 02:43:06', '2025-07-05 02:43:06', 'dcdkldmlk', NULL, NULL, 'dcmdkm', '08098879', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(38, 15, 8, 'Associate in Computer Technology', 'A', '2025-07-05 02:53:01', '2025-07-05 02:53:01', '09898', NULL, NULL, 'sdjkjnd', '09908908', NULL, NULL, NULL, NULL, NULL, '2', NULL),
(39, 16, 8, 'BS Information Technology', 'B', '2025-07-05 03:11:10', '2025-07-05 03:11:10', '0843598', NULL, NULL, 'jdlas', 'iuhdnjdks', NULL, NULL, NULL, NULL, NULL, '2', NULL),
(40, 17, 8, 'Associate in Computer Technology', 'A', '2025-07-05 03:23:44', '2025-07-05 03:23:44', 'dcmddfom', NULL, NULL, 'cncnkdj', '0898787676', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(41, 18, 8, 'BS Information Technology', 'A', '2025-07-05 03:29:59', '2025-07-05 03:29:59', 'dmdsdm', NULL, NULL, 'Perseus Casino', '089786564', NULL, NULL, NULL, NULL, NULL, '2', NULL),
(42, 19, 8, 'BS Information Technology', 'A', '2025-07-05 03:31:46', '2025-07-05 03:31:46', 'kcdcl', NULL, NULL, 'cmsclmkd', '098898765', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(43, 20, 8, 'Associate in Computer Technology', 'B', '2025-07-05 03:36:22', '2025-07-05 03:36:22', 'sjaidi', NULL, NULL, 'dffmk', '0979677', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(44, 21, 8, 'Associate in Computer Technology', 'A', '2025-07-05 03:50:42', '2025-07-05 03:50:42', 'dkmcdkm', NULL, NULL, 'Alfaith Mae Luzon', '0987634873', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(45, 10, 8, 'Associate in Computer Technology', 'A', '2025-07-05 03:51:55', '2025-07-05 05:33:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(46, 22, 8, 'BS Information Technology', 'A', '2025-07-05 04:51:27', '2025-07-05 04:51:27', 'kvmdlskm', NULL, NULL, 'dfmdkmd', 'dfksnj', NULL, NULL, NULL, NULL, NULL, '2', NULL),
(47, 11, 8, 'Associate in Computer Technology', 'B', '2025-07-05 05:08:57', '2025-07-05 05:10:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2025-07-05 05:10:15'),
(48, 4, 8, 'BS Information Technology', 'C', '2025-07-05 05:27:28', '2025-07-05 05:27:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL);

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
(11, 12, 5, 1, '2025-07-04 08:07:21', '2025-07-04 08:07:21'),
(12, 13, 8, 1, '2025-07-05 01:15:02', '2025-07-05 01:15:02'),
(13, 14, 8, 1, '2025-07-05 02:43:06', '2025-07-05 02:43:06'),
(14, 15, 8, 1, '2025-07-05 02:53:01', '2025-07-05 02:53:01'),
(15, 16, 8, 1, '2025-07-05 03:11:10', '2025-07-05 03:11:10'),
(16, 17, 8, 1, '2025-07-05 03:23:44', '2025-07-05 03:23:44'),
(17, 18, 8, 1, '2025-07-05 03:29:59', '2025-07-05 03:29:59'),
(18, 19, 8, 1, '2025-07-05 03:31:46', '2025-07-05 03:31:46'),
(19, 20, 8, 1, '2025-07-05 03:36:22', '2025-07-05 03:36:22'),
(20, 21, 8, 1, '2025-07-05 03:50:42', '2025-07-05 03:50:42'),
(21, 22, 8, 1, '2025-07-05 04:51:27', '2025-07-05 04:51:27');

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
(10, 'utet', 'utet', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-08', 'dhudf', '2025-07-04 08:07:21', '2025-07-04 08:07:21', 5, 12),
(11, 'CASIÑO', 'PERSEUS', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-04', 'Auto-generated shift out', '2025-07-04 22:48:07', '2025-07-04 22:48:07', 2, 7),
(12, 'CASIÑO', 'PERSEUS', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-04', 'fkdf;d', '2025-07-04 22:48:07', '2025-07-04 22:48:07', 7, 7),
(13, 'Haliluddin', 'Naila', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-04', 'Auto-generated shift out', '2025-07-04 22:49:15', '2025-07-04 22:49:15', 5, 1),
(14, 'Haliluddin', 'Naila', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-04', 'mckclc', '2025-07-04 22:49:15', '2025-07-04 22:49:15', 7, 1),
(15, 'Salihuddin', 'Alyacher', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-04', NULL, '2025-07-04 22:50:59', '2025-07-04 22:50:59', 7, 8),
(16, 'Concepcion', 'Vincent', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-03', 'dfgdd', '2025-07-04 23:13:56', '2025-07-04 23:13:56', 7, 9),
(17, 'utet', 'utet', NULL, 'Returning Student', NULL, NULL, NULL, NULL, NULL, '2025-07-03', 'cvffvffv', '2025-07-05 00:17:50', '2025-07-05 00:17:50', 7, 12),
(18, 'talaga', 'last', NULL, 'Returning Student', NULL, NULL, NULL, NULL, NULL, '2025-07-02', NULL, '2025-07-05 00:22:23', '2025-07-05 00:22:23', 7, 10),
(19, 'cnkjndsf', 'cmxzxm', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-01', 'dfjdksjf', '2025-07-05 01:15:02', '2025-07-05 01:15:02', 8, 13),
(20, 'Casino', 'Athena', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-02', 'dkmklmd', '2025-07-05 01:23:36', '2025-07-05 01:23:36', 8, NULL),
(21, 'njdkfnjk', 'ddnnkd', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-01', 'djfjiusjd', '2025-07-05 02:43:06', '2025-07-05 02:43:06', 8, 14),
(22, 'lasdkj', 'Ahjsdjh', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'dndkldsml', '2025-07-05 02:53:01', '2025-07-05 02:53:01', 8, 15),
(23, 'jbjfgn', 'nvkdnfjkdn', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'cmkdcl', '2025-07-05 03:11:11', '2025-07-05 03:11:11', 8, 16),
(24, 'dfmddlkm', 'AJtheojekdfn', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', NULL, '2025-07-05 03:23:44', '2025-07-05 03:23:44', 8, 17),
(25, 'vdvjhnvnvk', 'djnjndfkjdn', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'dcdm', '2025-07-05 03:29:59', '2025-07-05 03:29:59', 8, 18),
(26, 'kdmddkm', 'mkdm', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'cdkdsskmkk', '2025-07-05 03:31:46', '2025-07-05 03:31:46', 8, 19),
(27, 'corpuz', 'Jeshua', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'kdodk', '2025-07-05 03:36:22', '2025-07-05 03:36:22', 8, 20),
(42, 'cnsjn', 'ultyse', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'mkdm', '2025-07-05 04:51:27', '2025-07-05 04:51:27', 8, 22),
(53, 'tlga', 'final', NULL, 'Transferring Out', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'sckskl', '2025-07-05 05:23:22', '2025-07-05 05:23:22', 8, 11),
(57, 'Alvarez', 'April Rose', NULL, 'Returning Student', NULL, NULL, NULL, NULL, NULL, '2025-07-05', NULL, '2025-07-05 05:27:28', '2025-07-05 05:27:28', 8, 4),
(62, 'talaga', 'last', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'Auto-generated shift out', '2025-07-05 05:33:00', '2025-07-05 05:33:00', 7, 10),
(63, 'talaga', 'last', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'zxzx', '2025-07-05 05:33:00', '2025-07-05 05:33:00', 8, 10);

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
(1, 20, 'transition_images/IQxcaRNCvRzVXWaBPB4dV69dS5QhCBIzDJC4kKn2.png', '2025-07-05 01:23:36', '2025-07-05 01:23:36'),
(2, 20, 'transition_images/m5SyW1bDLJLf4dk8MlW8eSEQM3FekWE0ipsFdTJW.png', '2025-07-05 01:23:36', '2025-07-05 01:23:36'),
(3, 20, 'transition_images/gfw7BjAmgHO5AIWe87jySJJrOzYZOUJ98J9qF0b0.jpg', '2025-07-05 01:23:36', '2025-07-05 01:23:36'),
(4, 21, 'transition_images/Sg7yI2r9PkjgbUtefptxwbOWKZfwZYtdIlQVwSki.png', '2025-07-05 02:43:06', '2025-07-05 02:43:06'),
(5, 21, 'transition_images/pbXruNbPPCMMVoj34Esf652EnVymcyXUwg2Kqxj2.png', '2025-07-05 02:43:06', '2025-07-05 02:43:06'),
(6, 21, 'transition_images/SexlmID6Raa9kpcdgr4g0QFafOyjKOU5N3mBeDZK.jpg', '2025-07-05 02:43:06', '2025-07-05 02:43:06'),
(7, 22, 'transition_images/kY9BAm4SYi7o5flPt6uLc59RsvNrcJSSLPCJSVIu.jpg', '2025-07-05 02:53:01', '2025-07-05 02:53:01'),
(8, 26, 'transition_images/HkEhwYvuH1hi5HQIaTSsror8M8xS7702NbI5oiMe.png', '2025-07-05 03:31:46', '2025-07-05 03:31:46'),
(9, 26, 'transition_images/nZhGGWlPUKwNrCK7x8gufPOSm4jTowvbDKmdEZxx.jpg', '2025-07-05 03:31:46', '2025-07-05 03:31:46'),
(10, 26, 'transition_images/uQakBo0Xz3yt4UEVXG6pOm2dly4ETuRzIDTrEgrX.jpg', '2025-07-05 03:31:46', '2025-07-05 03:31:46'),
(11, 27, 'transition_images/1HKBPYCSU0LOtvu83PEIDRJh9DaAyvJmkancUbdi.jpg', '2025-07-05 03:36:22', '2025-07-05 03:36:22'),
(12, 27, 'transition_images/qYRcvV0Pa37NI1NW8EhncD5etFWjiWLfzThXLLjx.png', '2025-07-05 03:36:22', '2025-07-05 03:36:22'),
(13, 27, 'transition_images/O3ELVEZD0D9S2Ex8ZjC83ynegq4N583yoSYCINSK.png', '2025-07-05 03:36:22', '2025-07-05 03:36:22'),
(14, 29, 'transition_images/1dGPF6dypZEB2ITAAP6YvaMT4Hs73kgpWd8KyOEs.png', '2025-07-05 04:07:12', '2025-07-05 04:07:12'),
(15, 29, 'transition_images/uyumTXfQNMiymqe5Lnk6n9SRuyMBfYVnb61QQ8hS.png', '2025-07-05 04:07:12', '2025-07-05 04:07:12'),
(16, 29, 'transition_images/alnKW8pyiitb2NdZFNIB3ZSbiSfdvqW58EiRyDcY.jpg', '2025-07-05 04:07:12', '2025-07-05 04:07:12'),
(17, 29, 'transition_images/1dGPF6dypZEB2ITAAP6YvaMT4Hs73kgpWd8KyOEs.png', '2025-07-05 04:07:12', '2025-07-05 04:07:12'),
(18, 29, 'transition_images/uyumTXfQNMiymqe5Lnk6n9SRuyMBfYVnb61QQ8hS.png', '2025-07-05 04:07:12', '2025-07-05 04:07:12'),
(19, 29, 'transition_images/alnKW8pyiitb2NdZFNIB3ZSbiSfdvqW58EiRyDcY.jpg', '2025-07-05 04:07:12', '2025-07-05 04:07:12'),
(20, 32, 'transition_images/H8AhivvF9IC122fPHeDd4vwaRAEebGnjVzRJIHd2.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(21, 32, 'transition_images/cX8wy8nCjlNiiE5MJG2KEWGBwyAeWMKr1Vh7dlck.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(22, 32, 'transition_images/4LxGyQt4gw5eBiAXQPHQIffvD9UJnBxtwYfK6511.jpg', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(23, 33, 'transition_images/H8AhivvF9IC122fPHeDd4vwaRAEebGnjVzRJIHd2.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(24, 33, 'transition_images/cX8wy8nCjlNiiE5MJG2KEWGBwyAeWMKr1Vh7dlck.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(25, 33, 'transition_images/4LxGyQt4gw5eBiAXQPHQIffvD9UJnBxtwYfK6511.jpg', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(26, 32, 'transition_images/H8AhivvF9IC122fPHeDd4vwaRAEebGnjVzRJIHd2.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(27, 32, 'transition_images/cX8wy8nCjlNiiE5MJG2KEWGBwyAeWMKr1Vh7dlck.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(28, 32, 'transition_images/4LxGyQt4gw5eBiAXQPHQIffvD9UJnBxtwYfK6511.jpg', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(29, 33, 'transition_images/H8AhivvF9IC122fPHeDd4vwaRAEebGnjVzRJIHd2.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(30, 33, 'transition_images/cX8wy8nCjlNiiE5MJG2KEWGBwyAeWMKr1Vh7dlck.png', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(31, 33, 'transition_images/4LxGyQt4gw5eBiAXQPHQIffvD9UJnBxtwYfK6511.jpg', '2025-07-05 04:18:26', '2025-07-05 04:18:26'),
(32, 35, 'transition_images/dQbAbTmg0Yj0j6H77EQxXAuTH1ayc9lHUpEq8sxV.png', '2025-07-05 04:31:02', '2025-07-05 04:31:02'),
(33, 35, 'transition_images/FSfWbV5pdnWqGkwlSzvZ1WulWvWTTrgjsvtGAOVS.jpg', '2025-07-05 04:31:02', '2025-07-05 04:31:02'),
(34, 36, 'transition_images/dQbAbTmg0Yj0j6H77EQxXAuTH1ayc9lHUpEq8sxV.png', '2025-07-05 04:31:02', '2025-07-05 04:31:02'),
(35, 36, 'transition_images/FSfWbV5pdnWqGkwlSzvZ1WulWvWTTrgjsvtGAOVS.jpg', '2025-07-05 04:31:02', '2025-07-05 04:31:02'),
(36, 37, 'transition_images/3s5EtPY73rRejK1Hm1mJxUsW6IwYAA6lTajfKG9t.png', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(37, 37, 'transition_images/wvY4XEDL2itelPsIt0ttov7Ye9MWqjYVN56az4Qk.png', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(38, 37, 'transition_images/DBYIk898bkZgyqu1ePgjFOAl2Tsl1mwiP03DZY9Y.jpg', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(39, 37, 'transition_images/HzIYqcli9HY6mLnkrZMK3ULeVVKzVtUSUrmPlEi3.jpg', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(40, 37, 'transition_images/3s5EtPY73rRejK1Hm1mJxUsW6IwYAA6lTajfKG9t.png', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(41, 37, 'transition_images/wvY4XEDL2itelPsIt0ttov7Ye9MWqjYVN56az4Qk.png', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(42, 37, 'transition_images/DBYIk898bkZgyqu1ePgjFOAl2Tsl1mwiP03DZY9Y.jpg', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(43, 37, 'transition_images/HzIYqcli9HY6mLnkrZMK3ULeVVKzVtUSUrmPlEi3.jpg', '2025-07-05 04:36:44', '2025-07-05 04:36:44'),
(44, 38, 'transition_images/XL8ZYzXdvX6VlrHNVhCEMKpK7e19dgcsueHUX5SD.png', '2025-07-05 04:38:45', '2025-07-05 04:38:45'),
(45, 38, 'transition_images/j4V12dUlkJxLSceqgjKFLUCQ9bCwjyTGm6Ai5yjo.png', '2025-07-05 04:38:45', '2025-07-05 04:38:45'),
(46, 38, 'transition_images/XL8ZYzXdvX6VlrHNVhCEMKpK7e19dgcsueHUX5SD.png', '2025-07-05 04:38:45', '2025-07-05 04:38:45'),
(47, 38, 'transition_images/j4V12dUlkJxLSceqgjKFLUCQ9bCwjyTGm6Ai5yjo.png', '2025-07-05 04:38:45', '2025-07-05 04:38:45'),
(48, 39, 'transition_images/WKB1bPOVFomF51Su7QCVQMg6reT3mUf9YoBYpyYA.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(49, 39, 'transition_images/WYwbXhrDjGJBRFXG9XGJ6s3X0MCcvTw9GWnO2p0d.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(50, 40, 'transition_images/WKB1bPOVFomF51Su7QCVQMg6reT3mUf9YoBYpyYA.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(51, 40, 'transition_images/WYwbXhrDjGJBRFXG9XGJ6s3X0MCcvTw9GWnO2p0d.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(52, 39, 'transition_images/WKB1bPOVFomF51Su7QCVQMg6reT3mUf9YoBYpyYA.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(53, 39, 'transition_images/WYwbXhrDjGJBRFXG9XGJ6s3X0MCcvTw9GWnO2p0d.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(54, 40, 'transition_images/WKB1bPOVFomF51Su7QCVQMg6reT3mUf9YoBYpyYA.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(55, 40, 'transition_images/WYwbXhrDjGJBRFXG9XGJ6s3X0MCcvTw9GWnO2p0d.png', '2025-07-05 04:46:16', '2025-07-05 04:46:16'),
(56, 41, 'transition_images/vzKd5bA7reWnbsmCLnsYPO2u8dNNroKrmnUC8E8R.jpg', '2025-07-05 04:49:20', '2025-07-05 04:49:20'),
(57, 41, 'transition_images/vzKd5bA7reWnbsmCLnsYPO2u8dNNroKrmnUC8E8R.jpg', '2025-07-05 04:49:20', '2025-07-05 04:49:20'),
(58, 42, 'transition_images/Pegauf82qWzQ23p4Fv6ig86utn24SRseOX8q4Hba.png', '2025-07-05 04:51:27', '2025-07-05 04:51:27'),
(59, 51, 'transition_images/OvW5VJC8tr1zjh5cnK802hbuRppuEuVTKy3QdXbD.png', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(60, 51, 'transition_images/gMLU2A9aU2JTArSjybg7D1niOTKFZbaCcEuHhQKU.png', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(61, 51, 'transition_images/ObH4U6QWNILJTzXzeNlfCJ1bQipan9am0q0NzkuJ.jpg', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(62, 51, 'transition_images/DlAzqywzqk7ODBROVOei1fhfR185hTuCmRNLEDgh.jpg', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(63, 51, 'transition_images/2Ke9eEOUIbVvIP6GSKJ3wCHcV2snii4hY1YSq0XY.jpg', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(64, 51, 'transition_images/OvW5VJC8tr1zjh5cnK802hbuRppuEuVTKy3QdXbD.png', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(65, 51, 'transition_images/gMLU2A9aU2JTArSjybg7D1niOTKFZbaCcEuHhQKU.png', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(66, 51, 'transition_images/ObH4U6QWNILJTzXzeNlfCJ1bQipan9am0q0NzkuJ.jpg', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(67, 51, 'transition_images/DlAzqywzqk7ODBROVOei1fhfR185hTuCmRNLEDgh.jpg', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(68, 51, 'transition_images/2Ke9eEOUIbVvIP6GSKJ3wCHcV2snii4hY1YSq0XY.jpg', '2025-07-05 05:16:07', '2025-07-05 05:16:07'),
(69, 52, 'transition_images/c3L8Kwn681GYemXnRU2JEOi0jN8BeV7c0DGEEUHg.png', '2025-07-05 05:17:08', '2025-07-05 05:17:08'),
(70, 52, 'transition_images/c3L8Kwn681GYemXnRU2JEOi0jN8BeV7c0DGEEUHg.png', '2025-07-05 05:17:08', '2025-07-05 05:17:08'),
(71, 53, 'transition_images/0xIFtcYlZSgoBf8pIswenULOaXfrvodVg8K8j5e8.png', '2025-07-05 05:23:22', '2025-07-05 05:23:22'),
(72, 54, 'transition_images/qWLwCvd6NBhuW9HdFVzlMeL5rCuDKjVELZTefzTS.png', '2025-07-05 05:24:26', '2025-07-05 05:24:26'),
(73, 55, 'transition_images/qWLwCvd6NBhuW9HdFVzlMeL5rCuDKjVELZTefzTS.png', '2025-07-05 05:24:26', '2025-07-05 05:24:26'),
(74, 54, 'transition_images/qWLwCvd6NBhuW9HdFVzlMeL5rCuDKjVELZTefzTS.png', '2025-07-05 05:24:26', '2025-07-05 05:24:26'),
(75, 55, 'transition_images/qWLwCvd6NBhuW9HdFVzlMeL5rCuDKjVELZTefzTS.png', '2025-07-05 05:24:26', '2025-07-05 05:24:26'),
(76, 56, 'transition_images/cn4fQQLosoOSz4uz0f3dPQePFDMM9T9pl116F8Vk.png', '2025-07-05 05:25:46', '2025-07-05 05:25:46'),
(77, 57, 'transition_images/GvukS4LV52yVGOU4dvUkaQjx43COOJWxjunDJBE7.png', '2025-07-05 05:27:28', '2025-07-05 05:27:28'),
(78, 57, 'transition_images/GwT6m4HbohKJmolmPvshTjbMy4sCdAu6JYg3LJBR.png', '2025-07-05 05:27:28', '2025-07-05 05:27:28'),
(79, 57, 'transition_images/pgIciIjHkE0JfhIodG6Xne8Hlswf7q7DMOP7U6m9.jpg', '2025-07-05 05:27:28', '2025-07-05 05:27:28'),
(80, 59, 'transition_images/ur1OYYoLfpNAt1IpP7ButidK48qHKAWzeLH2BL8e.jpg', '2025-07-05 05:29:52', '2025-07-05 05:29:52'),
(81, 59, 'transition_images/ur1OYYoLfpNAt1IpP7ButidK48qHKAWzeLH2BL8e.jpg', '2025-07-05 05:29:52', '2025-07-05 05:29:52'),
(82, 61, 'transition_images/ffVmH4NlRoaytMfbuA0dt4dIlnDJeluN0hqsRDbB.png', '2025-07-05 05:31:57', '2025-07-05 05:31:57'),
(83, 61, 'transition_images/ZSSF0WYddaCLAFLjU8onIhkjPbhPTCafUJa40H5b.png', '2025-07-05 05:31:57', '2025-07-05 05:31:57'),
(84, 63, 'transition_images/vUAEBt9vTA7TLPvGgl7HgbE2743NXAhiq58EcW9k.png', '2025-07-05 05:33:00', '2025-07-05 05:33:00');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_transition`
--
ALTER TABLE `student_transition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student_transition_images`
--
ALTER TABLE `student_transition_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
