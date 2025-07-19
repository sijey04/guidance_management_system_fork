-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 07:26 PM
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
(1, 2, NULL, NULL, 1, '2025-07-01', NULL, 20, NULL, 'In Progress', '2025-07-06 07:13:09', '2025-07-07 21:28:39', 'Misconduct', '2025-07-02', '2025-07-22', 'dmkcdm'),
(2, 4, NULL, NULL, 3, '2025-07-03', NULL, 40, NULL, 'Completed', '2025-07-07 20:08:58', '2025-07-07 20:09:23', 'Misconduct', '2025-07-03', '2025-08-12', 'mdkcdkm dcmkm'),
(3, 3, NULL, NULL, 3, '2025-07-04', NULL, 80, NULL, 'In Progress', '2025-07-07 21:39:43', '2025-07-19 05:55:55', 'Community Service', '2025-07-04', '2025-09-22', 'njnjn'),
(4, 8, NULL, NULL, 3, '2025-07-08', NULL, NULL, NULL, 'In Progress', '2025-07-07 21:41:12', '2025-07-07 21:41:12', 'cheating', '2025-07-08', NULL, NULL),
(5, 7, NULL, NULL, 3, '2025-07-03', NULL, NULL, NULL, 'In Progress', '2025-07-07 21:45:41', '2025-07-07 21:45:41', 'deloading', '2025-07-03', NULL, NULL),
(6, 10, NULL, NULL, 3, '2025-07-03', NULL, NULL, NULL, 'In Progress', '2025-07-07 21:53:40', '2025-07-07 21:53:40', 'Community Service', '2025-07-03', NULL, NULL),
(7, 5, NULL, NULL, 3, '2025-07-01', NULL, NULL, NULL, 'In Progress', '2025-07-07 21:55:01', '2025-07-07 21:55:01', 'Community Service', '2025-07-01', NULL, NULL),
(8, 10, NULL, NULL, 4, '2025-07-03', NULL, 20, NULL, 'In Progress', '2025-07-08 02:25:01', '2025-07-08 02:25:01', 'deloading', '2025-07-03', '2025-07-23', 'fnvjfd'),
(9, 3, NULL, NULL, 5, '2025-07-03', NULL, NULL, NULL, 'Completed', '2025-07-12 01:15:12', '2025-07-19 05:52:40', 'cheating', '2025-07-03', NULL, NULL),
(10, 7, 5, NULL, 5, '2025-07-03', NULL, NULL, NULL, 'Completed', '2025-07-19 05:56:25', '2025-07-19 05:56:25', 'deloading', '2025-07-03', NULL, NULL),
(11, 8, 4, NULL, 5, '2025-07-08', NULL, NULL, NULL, 'Completed', '2025-07-19 07:05:15', '2025-07-19 07:05:15', 'cheating', '2025-07-08', NULL, NULL);

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
(3, 1, 'contract_images/YBt6ME09KmAKGz1icn7Fh4W773CD8aI39S2VkfhJ.jpg', '2025-07-06 07:13:09', '2025-07-06 07:13:09'),
(4, 2, 'contract_images/V4a2MWr75FN3xEbbsI0nTHQeF2wIoSvanMn2gYSZ.jpg', '2025-07-07 20:08:58', '2025-07-07 20:08:58'),
(5, 3, 'contract_images/QYVVHhf751YcGStFC43opDN79Jh1gMeH8p8msVsb.png', '2025-07-07 21:39:43', '2025-07-07 21:39:43'),
(6, 3, 'contract_images/YUMSszTEd4I8XLOXv9DJiee1A04vwPzfspJ3N3Ko.png', '2025-07-07 21:39:43', '2025-07-07 21:39:43'),
(7, 3, 'contract_images/wTHMJPoxjNJRBkgNlrNRRbJbosmkpczCODcyZKE5.png', '2025-07-07 21:39:43', '2025-07-07 21:39:43'),
(8, 4, 'contract_images/vI07i974Hi47RVN2MFei6bbT4gY0ekXtFGJVHCsM.png', '2025-07-07 21:41:12', '2025-07-07 21:41:12'),
(10, 4, 'contract_images/7iou83kzUI6M5CVTKzeYNd3JRuMVqzwvQWq0DOdr.jpg', '2025-07-07 21:41:12', '2025-07-07 21:41:12'),
(11, 5, 'contract_images/g1BA29KOhifyFQEZpu8iZGKFeWLGmdVrWmI72UPf.png', '2025-07-07 21:45:41', '2025-07-07 21:45:41'),
(13, 6, 'contract_images/r0JoJnnxTLBzGCvz3zVPOH3fxbUJ4l3hB4DzEOrV.png', '2025-07-07 21:53:40', '2025-07-07 21:53:40'),
(14, 7, 'contract_images/zQV6dbvInG4FnAkKO0PJQHZFtddJx9hGSnFPXvqm.png', '2025-07-07 21:55:01', '2025-07-07 21:55:01'),
(15, 7, 'contract_images/j79sAwueyoXCUmnStaLN3pI1MlAnhltpNRWc7ZgJ.png', '2025-07-07 21:55:01', '2025-07-07 21:55:01'),
(16, 7, 'contract_images/Iu9vglk1FtPrBf4fonb5us65YngHiQYjhCyNHqDj.jpg', '2025-07-07 21:55:01', '2025-07-07 21:55:01'),
(18, 1, 'contract_images/2qAgXd24KslZB7TvBVVkEkihQ835W3Wd1X5SWQ8e.png', '2025-07-07 22:02:36', '2025-07-07 22:02:36'),
(19, 1, 'contract_images/8KrHKoqsKWMkQyxXrgl25q9fcL2mJKtdOk1ZU1ao.jpg', '2025-07-07 22:02:42', '2025-07-07 22:02:42'),
(20, 8, 'contract_images/2q2F1vHf6CGJvbzkdmZVleFzxpONNpVIsQ62FgOA.png', '2025-07-08 02:25:01', '2025-07-08 02:25:01'),
(21, 8, 'contract_images/X1cztTRQZUfrrhJfc4GcdeJQRUx8KfQEGcNpo401.png', '2025-07-08 02:25:01', '2025-07-08 02:25:01'),
(22, 10, 'contract_images/g1BA29KOhifyFQEZpu8iZGKFeWLGmdVrWmI72UPf.png', '2025-07-19 05:56:25', '2025-07-19 05:56:25'),
(23, 11, 'contract_images/vI07i974Hi47RVN2MFei6bbT4gY0ekXtFGJVHCsM.png', '2025-07-19 07:05:15', '2025-07-19 07:05:15'),
(24, 11, 'contract_images/7iou83kzUI6M5CVTKzeYNd3JRuMVqzwvQWq0DOdr.jpg', '2025-07-19 07:05:15', '2025-07-19 07:05:15');

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
(3, 'Community Service', '2025-06-21 21:39:11', '2025-06-21 21:39:11'),
(5, 'cheating', '2025-06-24 20:02:25', '2025-06-24 20:02:25'),
(6, 'deloading', '2025-06-24 20:03:27', '2025-06-24 20:03:27'),
(7, 'Misconduct', '2025-07-07 20:10:11', '2025-07-07 20:10:11');

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
(1, NULL, 2, 1, '2025-07-02', 'In Progress', NULL, '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'jnkcndn'),
(2, NULL, 10, 3, '2025-07-02', 'In Progress', NULL, '2025-07-07 20:18:38', '2025-07-19 07:53:15', 'dkocd;'),
(3, NULL, 1, 3, '2025-07-08', 'Completed', NULL, '2025-07-07 22:25:24', '2025-07-13 06:51:38', 'cxkm'),
(5, NULL, 7, 3, '2025-07-02', 'In Progress', NULL, '2025-07-07 22:29:46', '2025-07-07 22:29:46', NULL),
(8, 2, 10, 5, '2025-07-02', 'Completed', NULL, '2025-07-19 08:47:38', '2025-07-19 08:47:38', 'dkocd;');

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
(5, 1, 'counseling_images/s0R2QKDOJbQ69gN7irTwYCheVKIrRMPYGmqd8krY.png', '2025-07-06 07:16:00', '2025-07-06 07:16:00', 'id_card'),
(6, 2, 'counseling_images/LeYpwlFiuL10vl1SabtHNv1Ae6rCuCto3YFQHURj.png', '2025-07-07 20:18:38', '2025-07-07 20:18:38', 'form'),
(7, 2, 'counseling_images/VMxbSLGZUHlkNZjH6Pj9K8GHsbVDZIjYi5EMONzC.png', '2025-07-07 20:18:38', '2025-07-07 20:18:38', 'id_card'),
(8, 2, 'counseling_images/CfeV9DsG0FyO5DtJGPAOudW9cjb3gNMo3HUpTd5y.jpg', '2025-07-07 20:18:38', '2025-07-07 20:18:38', 'id_card'),
(9, 3, 'counseling_images/FovcDZejGL0Zrke1r5YVHKAMLymfSCkn8dE2O3jK.png', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'form'),
(10, 3, 'counseling_images/uUL8JsO9CueVjfW9C5fq1e6BBuiY0ROti5Po6s81.jpg', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'form'),
(11, 3, 'counseling_images/HUCgy5ZkGZj33gZ6wn0IUhjAzJGVrJlbMAFEuU9g.png', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'form'),
(12, 3, 'counseling_images/2NBzmHjkep398rfzPs7epIM1956uLaBRwGC4hCLa.png', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'form'),
(13, 3, 'counseling_images/6PK3WhXyJd9HSlBn3pmtOmHRIT31Tb1BWGtu3btd.jpg', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'form'),
(14, 3, 'counseling_images/GK4zEBp4qAmVpmpojvr43cl53pRalg1oiLeQ2O3k.png', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'form'),
(15, 3, 'counseling_images/HCd3Q75DnEwlRvn02HG4iz05ld9vncZY751uh3Rs.jpg', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'id_card'),
(16, 3, 'counseling_images/cwWSyjihSZejiz89QNPY3xaUDBttJCPNGKyieHvh.png', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'id_card'),
(17, 3, 'counseling_images/0Xc8wqZRfcmBrKdo5tAcIED8qHgY0uVqsrOcXuw3.jpg', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'id_card'),
(18, 3, 'counseling_images/orha9c5845yiw08xUwV4TlrJGOSoDlQ1NrRC52B4.png', '2025-07-07 22:25:24', '2025-07-07 22:25:24', 'id_card'),
(24, 5, 'counseling_images/ECHNmenz2oQhlYIIt0pAwCGXfzaLa4FufURwTZ6C.png', '2025-07-07 22:29:46', '2025-07-07 22:29:46', 'form'),
(25, 5, 'counseling_images/yQzv0rGnBE4u0zbc5P6K8qmS2tRBXLQOYQg3cOCX.jpg', '2025-07-07 22:29:46', '2025-07-07 22:29:46', 'id_card'),
(26, 5, 'counseling_images/Sclql7ef6SAi17LqXiNm4LD58yYqfmw4atkpSbJc.jpg', '2025-07-07 22:29:46', '2025-07-07 22:29:46', 'id_card'),
(28, 5, 'counseling_images/tKAYcf5Ka8cOgziBvXZ6Cyu9H6sjxQEfQktdNMRv.png', '2025-07-07 22:35:23', '2025-07-07 22:35:23', 'form'),
(29, 5, 'counseling_images/gXGHPPq1qUG3eEBcvGsNtxeKTbGGDXcIJNLgbm6c.jpg', '2025-07-07 22:35:31', '2025-07-07 22:35:31', 'form'),
(34, 8, 'counseling_images/LeYpwlFiuL10vl1SabtHNv1Ae6rCuCto3YFQHURj.png', '2025-07-19 08:47:38', '2025-07-19 08:47:38', 'form'),
(35, 8, 'counseling_images/VMxbSLGZUHlkNZjH6Pj9K8GHsbVDZIjYi5EMONzC.png', '2025-07-19 08:47:38', '2025-07-19 08:47:38', 'id_card'),
(36, 8, 'counseling_images/CfeV9DsG0FyO5DtJGPAOudW9cjb3gNMo3HUpTd5y.jpg', '2025-07-19 08:47:38', '2025-07-19 08:47:38', 'id_card');

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
(1, 1, 1, 'Failing Grades', 'dfjdskfjn', NULL, '2025-07-01', '2025-07-06 07:15:26', '2025-07-06 07:15:26'),
(2, 5, 3, 'Failing Grades', 'cdmkcd', NULL, '2025-07-03', '2025-07-07 20:15:11', '2025-07-07 20:15:11'),
(3, 1, 3, 'Absences', 'cmxkcm', NULL, '2025-07-07', '2025-07-07 22:11:49', '2025-07-07 22:11:49');

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
(2, 1, 'referral_images/F3PrutQg9GmJ6mxIRTUyFFYI5tOhff9g2TSISUTP.png', '2025-07-06 07:15:26', '2025-07-06 07:15:26'),
(3, 2, 'referral_images/z98623s9vTCxz6sVhLMUFYzKzjnyXR0hflX15ZVT.png', '2025-07-07 20:15:11', '2025-07-07 20:15:11'),
(4, 2, 'referral_images/cYf1mFGKWM0EsWoUhzYBMhYApFWQQlJMDBuwha2H.jpg', '2025-07-07 20:15:11', '2025-07-07 20:15:11'),
(5, 3, 'referral_images/hKpI0oxmWglypg3VSkvEqZooGOe6a900vKoDRaXg.jpg', '2025-07-07 22:11:49', '2025-07-07 22:11:49'),
(6, 3, 'referral_images/gPUaSRo9eCbIhNW7znZcxklhPtp8e0wcLAvMig4j.jpg', '2025-07-07 22:11:49', '2025-07-07 22:11:49'),
(7, 3, 'referral_images/HorDySQkQGmXQDUlZbnPxIKLFUXNnCznOvm0P8eN.jpg', '2025-07-07 22:11:49', '2025-07-07 22:11:49'),
(8, 1, 'referral_images/sY0ZTKL4xAZADexBWds1oNZ7OhdGfvYVAIjX0RYB.jpg', '2025-07-07 22:20:32', '2025-07-07 22:20:32'),
(9, 1, 'referral_images/r7hpJpL32zWSI7BI3peGr3BunrmhzW2P15Okx5pP.png', '2025-07-07 22:20:39', '2025-07-07 22:20:39');

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
(3, 'Poor Study Habits', '2025-07-06 07:14:50', '2025-07-06 07:14:50'),
(4, 'Mental Health', '2025-07-15 14:24:18', '2025-07-15 14:24:18');

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
(2, '2025-07-06 07:38:54', '2025-07-11 23:50:13', '2025-08-20', '2026-05-05', '2025-2026', 0),
(3, '2025-07-11 23:50:13', '2025-07-11 23:50:13', '2026-07-26', '2027-05-03', '2026-2027', 1);

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
(1, '1st', 0, '2025-07-06 07:06:01', '2025-07-06 07:38:54', 0, 1),
(2, '2nd', 0, '2025-07-06 07:28:18', '2025-07-06 07:38:54', 0, 1),
(3, '1st', 0, '2025-07-06 07:38:54', '2025-07-11 23:50:13', 0, 2),
(4, '2nd', 0, '2025-07-07 22:58:12', '2025-07-11 23:50:13', 0, 2),
(5, '1st', 1, '2025-07-11 23:50:13', '2025-07-11 23:50:13', 0, 3);

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
('fldM2FWL6cFB24aF3WLKqnR3kVmpuCygnQfmAcKU', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibTAwWkRnYjFwMVNrZVlDOTdhSzBUTldtQmVEaUxWOTZYbWNTcGRYZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1752945400);

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
(5, '202201054', 'Sample', 'COVARRUBIAS', 'Student', '2025-07-01', NULL, 'Male', NULL, 'CANELAR', NULL, NULL, 'ckmdkm', '90787876', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 07:38:34', '2025-07-06 07:38:34', NULL, NULL, NULL, NULL, '099766765'),
(6, '202201058', 'Sample', 'Student', '1', '2025-07-03', NULL, 'Female', NULL, 'dmffdmgdlkm', NULL, NULL, 'dsfmgldfkm', '098983789734', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 21:39:58', '2025-07-06 21:39:58', NULL, NULL, NULL, NULL, '0908789768657'),
(7, '2022019282', 'Rahema', NULL, 'Usama', '2025-07-02', NULL, 'Female', NULL, 'dnfdlfnn', NULL, NULL, 'dnkjfndkj', '0908439798', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 23:21:15', '2025-07-06 23:21:15', NULL, NULL, NULL, NULL, '0999686675'),
(8, '2021393993', 'sample', NULL, 'sample', '2025-07-02', NULL, 'Male', NULL, 'csmdkmc', NULL, NULL, 'kdcjcmlddl', '099878765', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-07 19:51:45', '2025-07-07 19:51:45', NULL, NULL, NULL, NULL, '09987675645'),
(9, '2024393993', 'sample', NULL, 'students shift in', '2025-07-02', NULL, 'Female', NULL, 'dcmdkm', NULL, NULL, 'sample parent', '099877675', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-07 20:06:21', '2025-07-07 20:06:21', NULL, NULL, NULL, NULL, '0998786765'),
(10, '2025019282', 'sample', NULL, 'student transferring in', '2025-07-01', NULL, 'Female', NULL, 'dvvmdfld', NULL, NULL, 'smaple parent', '098978655746', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-07 20:07:43', '2025-07-07 20:07:43', NULL, NULL, NULL, NULL, '0908765577'),
(11, '202739874', 'sample studdent', 'for', 'image attachent', '2025-07-02', NULL, 'Female', NULL, 'CANELAR', NULL, NULL, 'dcndkmc', '09987865453', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-07 22:08:07', '2025-07-07 22:08:07', NULL, NULL, NULL, NULL, '0999876546435'),
(12, '2022029023', 'Norma', NULL, 'Tulabing', '2025-07-01', NULL, 'Female', NULL, 'cmckdmc', NULL, NULL, 'Alfaith Mae Luzon', '0899738658473', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-08 02:22:40', '2025-07-08 02:22:40', NULL, NULL, NULL, NULL, '09934389478'),
(13, '2023001', 'Juan', 'Santos', 'Dela Cruz ', '1970-01-01', NULL, 'Male', NULL, '123 purok st.', NULL, NULL, NULL, '9124567890', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-08 17:20:48', '2025-07-08 17:20:48', NULL, NULL, NULL, NULL, '9364328734'),
(15, '2022020212', 'sampling', 'shifting', 'student', '1970-01-01', NULL, 'Male', NULL, 'magnolia', NULL, NULL, 'Madon', '9876756453', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-08 17:48:58', '2025-07-08 17:48:58', NULL, NULL, NULL, NULL, '909098787'),
(16, '202209855212', 'sampling', 'transferring', 'student', '1970-01-01', NULL, 'Male', NULL, 'magnolia', NULL, NULL, 'Madon', '9876756453', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-08 17:50:49', '2025-07-08 17:50:49', NULL, NULL, NULL, NULL, '909098787'),
(17, '2030855212', 'sampling', 'transferring', 'student', '2005-03-04', NULL, 'Male', NULL, 'magnolia', NULL, NULL, 'Madon', '9876756453', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-08 18:03:43', '2025-07-08 18:03:43', NULL, NULL, NULL, NULL, '909098787'),
(18, '2040855212', 'sampling', 'Excel', 'student', '1970-01-01', NULL, 'Male', NULL, 'magnolia', NULL, NULL, 'Madon', '9876756453', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-08 18:05:37', '2025-07-08 18:05:37', NULL, NULL, NULL, NULL, '909098787'),
(19, '202201010', 'New', 'shifting', 'student', '2025-07-09', NULL, 'Female', NULL, 'dvjmdm', NULL, NULL, 'chschhcds', '00904838947', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-12 03:17:46', '2025-07-12 03:17:46', NULL, NULL, NULL, NULL, '0987676657'),
(20, '2024-03531', 'SHERHAYA', 'ALFARO', 'ABDURAJAK', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(21, '2024-03524', 'JUSTINE', 'ARCILLAS', 'AGOT', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(22, '2024-03480', 'RHAIZA', 'YONGOT', 'ALBERTO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(23, '2024-03194', 'MERRY ANGEL', 'FIDEL', 'ALFONSO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(24, '2024-03655', 'MARK JOHN', 'SALAS', 'ANDO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(25, '2024-01709', 'NEIL ALDEN', 'JULIAN', 'ANGELES', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(26, '2024-03471', 'JASHIER VAN', 'DEL ROSARIO', 'AVILLA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(27, '2024-04182', 'FLORALYN', 'HIPOLANI', 'BERNARDO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL),
(28, '2024-03728', 'JOHAN', 'CABARDO', 'BUENAVENTURA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(29, '2024-04599', 'ARSUHUD', 'ARADJI', 'CADIR', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(30, '2024-03428', 'PATRICK GEORGE', 'GREGORIO', 'CAÑETE', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(31, '2024-04520', 'RALPH KEVIN', 'ALCANTARA', 'CASIRAYA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(32, '2020-01788', 'JAYVEN JOHN', 'MAMONTA', 'CLAPANO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(33, '2024-04094', 'DANICA', 'CAMASURA', 'CUSTODIO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(34, '2024-02619', 'RAYVER', 'RAYVER', 'DOMINGUEZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(35, '2024-01504', 'DANNETH', 'BUHION', 'ENRIQUEZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(36, '2024-03574', 'ERIC JR', 'DELOS REYES', 'FERMO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(37, '2024-01796', 'PAOLO', 'SANTOS', 'GARCIA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(38, '2024-03481', 'JOHN ROZILLER', 'TOLENTIN', 'GOMISONG', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(39, '2024-04645', 'DANICA', '', 'GONZALES', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(40, '2024-03478', 'NEITHAN DENIEL', 'BAUTISTA', 'GULA', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(41, '2024-02140', 'JOSEL', 'TUMENES', 'JALON', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(42, '2024-03019', 'VINNIE MAE', 'REAMBONANZA', 'KALIMUDDIN', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(43, '2024-03473', 'XYRILLE DIANA', 'ARANETA', 'NUÑEZ', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(44, '2023-04257', 'KURT RUZEL', 'PATENO', 'OLIVEROS', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(45, '2024-01704', 'AJ', 'ACABO', 'POLLES', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(46, '2024-04786', 'AHMED SHAKEER', 'LACBAO', 'RADJI', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(47, '2024-03715', 'ALJON', 'VELARIO', 'REYES', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(48, '2024-03601', 'AXL JAY', 'PONCE', 'SALAZAR', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(49, '2024-03474', 'SHEIKH ALFAEZ', 'JOE', 'SAMSON', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(50, '2024-03130', 'MUAMMAR', 'AMILASAN', 'TIBLANI', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(51, '2024-03606', 'JAYMIE MARGARET', 'CASTILLO', 'TUBLE', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(52, 'ESU-PAGA-2023-05190', 'MEL JOBETH', 'SUGANOB', 'ABELLANA', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(53, '2023-04734', 'AHMAD GEVAR', 'ISAHAC', 'ADVAR', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(54, '2023-05817', 'QUIANA MAE', 'SANSON', 'ALVAREZ', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(55, '2023-04736', 'NHAINA', 'ALAM', 'ASANJI', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(56, '2023-05962', 'GERALDINE', 'BAGALANON', 'BACALSO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(57, '2023-05380', 'KURTLEVY', 'DUENAS', 'BAYONETA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(58, '2023-04004', 'FREDERICK FRANCISC', 'O', 'BEJERANO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(59, '2023-04499', 'LEVI', 'MATTHEW', 'CASAS', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(60, '2023-04497', 'DANLEY', 'HICKS', 'CHIONG', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(61, '2023-04496', 'KEN HENSLEY', 'RULE', 'CHIONG', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(62, '2023-03997', 'EARL JANCEE', 'JACOMILLA', 'COLMINAS', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(63, '2023-03996', 'JACOB JUDIEL', 'RIVERA', 'CORDERO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(64, '2023-05963', 'D, JOVIEANN', 'JOVIEANN', 'ESTRADA D', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(65, '2021-03121', 'ANGELOU', 'HUMBED', 'FABIAN', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(66, '2023-05099', 'JOMAR', 'MANLUPIG', 'FONCARDAS', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(67, '2023-04176', 'RONEL', 'LIM', 'FRANCISCO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(68, '2023-03993', 'MARIA ERICHA', 'MAAGHOP', 'GUANZON', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(69, '2023-04030', 'CHRISTIAN', 'CHRISTIAN', 'JAHILON', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(70, '2023-04733', 'AL MUDZEER', 'MOHAMMAD', 'JULAIN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(71, '2023-04031', 'KRYSTAL JANE', 'SOLAMILLO', 'LEGASPINO', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(72, '2023-03059', 'PAOLO LORENZO', 'GANTAO', 'LONGCOB', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(73, '2023-04008', 'CLINT LLOYD', 'SACRISTAN', 'MANONGONG', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(74, '2023-04558', 'BRIXTER GIAN', 'CUSTODIO', 'MARIANO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(75, '2023-04022', 'ROWAN', 'VILLARTA', 'MONTEHERMOSO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(76, '2023-04007', 'DHULKIFLIE', 'ASANIB', 'MUSLARON', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(77, '2023-05093', 'KARL MARX', 'DOSPUEBLOS', 'NARVAEZ', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(78, '2023-06127', 'ANTHONY', 'JACINTO', 'OMAMALIN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(79, '2023-04504', 'DANZEIN DARON', 'VILLAMER', 'ORADA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(80, '2023-04365', 'TIMOTH Y', 'RENACIA', 'SAJOT', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(81, '2023-04366', 'MOHAMMAD AL', 'KHAIBAR QUE', 'SALIAN', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(82, '2020-03401', 'JHONRIE', 'LOBA', 'SERVAÑO', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(83, '2023-05232', 'GHAFFRIE', 'PASICARAN', 'SONNY', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(84, '2017-01278', 'YVONNE REDJ', 'FRANCISCO', 'TELAN', NULL, NULL, 'Female', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(85, '2023-04010', 'VINCE ANDREW', 'POTENCIANO', 'VIOLA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(86, '2018-03481', 'ALFHAIZ', 'PINGLI', 'MUSA', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, 'N/A', 'N/A', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL),
(87, '2022-019282', 'ddjn', NULL, 'dfndjn', '2025-07-08', NULL, 'Female', NULL, 'vnfkkn', NULL, NULL, 'na', 'na', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-15 14:57:16', '2025-07-15 14:57:16', NULL, NULL, NULL, NULL, '09897879');

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
(7, 5, 2, 'BS Information Technology', 'A', '2025-07-06 07:38:34', '2025-07-06 07:38:34', 'CANELAR', NULL, NULL, 'ckmdkm', '90787876', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(8, 1, 3, 'BS Information Technology', 'B', '2025-07-06 21:38:38', '2025-07-06 21:38:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(9, 6, 3, 'Associate in Computer Technology', 'B', '2025-07-06 21:39:58', '2025-07-06 21:39:58', 'dmffdmgdlkm', NULL, NULL, 'dsfmgldfkm', '098983789734', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(10, 3, 3, 'BS Information Technology', 'A', '2025-07-06 21:42:37', '2025-07-06 21:42:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(11, 7, 3, 'Associate in Computer Technology', 'B', '2025-07-06 23:21:15', '2025-07-06 23:21:15', 'dnfdlfnn', NULL, NULL, 'dnkjfndkj', '0908439798', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(12, 4, 3, 'BS Information Technology', 'C', '2025-07-06 23:22:36', '2025-07-06 23:22:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(13, 5, 3, 'BS Information Technology', 'C', '2025-07-06 23:23:11', '2025-07-06 23:23:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(14, 8, 3, 'BS Information Technology', 'B', '2025-07-07 19:51:45', '2025-07-07 19:51:45', 'csmdkmc', NULL, NULL, 'kdcjcmlddl', '099878765', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(15, 9, 3, 'Associate in Computer Technology', 'C', '2025-07-07 20:06:21', '2025-07-07 20:06:21', 'dcmdkm', NULL, NULL, 'sample parent', '099877675', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(16, 10, 3, 'BS Computer Science', 'B', '2025-07-07 20:07:43', '2025-07-07 20:07:43', 'dvvmdfld', NULL, NULL, 'smaple parent', '098978655746', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(17, 11, 3, 'Associate in Computer Technology', 'B', '2025-07-07 22:08:07', '2025-07-07 22:08:07', 'CANELAR', NULL, NULL, 'dcndkmc', '09987865453', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(18, 8, 4, 'BS Information Technology', 'B', '2025-07-07 23:04:22', '2025-07-07 23:04:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(19, 10, 4, 'BS Computer Science', 'B', '2025-07-07 23:06:07', '2025-07-07 23:06:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(20, 12, 4, 'BS Computer Science', 'B', '2025-07-08 02:22:40', '2025-07-08 02:22:40', 'cmckdmc', NULL, NULL, 'Alfaith Mae Luzon', '0899738658473', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(21, 3, 4, 'BS Information Technology', 'B', '2025-07-08 02:23:29', '2025-07-08 02:23:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(22, 13, 4, 'BS Computer Science', 'A', '2025-07-08 17:20:48', '2025-07-08 17:20:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(24, 15, 4, 'BS Information Technology', 'B', '2025-07-08 17:48:58', '2025-07-08 17:48:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(25, 16, 4, 'BS Information Technology', 'B', '2025-07-08 17:50:49', '2025-07-08 17:50:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(26, 17, 4, 'BS Information Technology', 'B', '2025-07-08 18:03:43', '2025-07-08 18:03:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(27, 18, 4, 'BS Computer Science', 'B', '2025-07-08 18:05:37', '2025-07-08 18:05:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(28, 6, 4, 'Associate in Computer Technology', 'B', '2025-07-10 20:25:48', '2025-07-10 20:25:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(29, 5, 4, 'BS Information Technology', 'C', '2025-07-10 20:26:03', '2025-07-10 20:26:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(30, 9, 4, 'Associate in Computer Technology', 'C', '2025-07-11 22:28:06', '2025-07-11 22:28:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(31, 4, 4, 'BS Information Technology', 'C', '2025-07-11 22:29:49', '2025-07-11 22:35:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(32, 7, 4, 'BS Computer Science', 'A', '2025-07-11 22:41:46', '2025-07-11 23:42:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(33, 3, 5, 'BS Information Technology', 'B', '2025-07-11 23:51:52', '2025-07-19 05:23:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(34, 5, 5, 'BS Information Technology', 'A', '2025-07-11 23:52:56', '2025-07-19 05:02:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(35, 9, 5, 'Associate in Computer Technology', 'C', '2025-07-11 23:54:18', '2025-07-11 23:54:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(36, 6, 5, 'Associate in Computer Technology', 'B', '2025-07-12 03:15:53', '2025-07-12 03:15:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(37, 7, 5, 'Associate in Computer Technology', 'A', '2025-07-12 03:16:40', '2025-07-12 03:16:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(38, 19, 5, 'BS Information Technology', 'B', '2025-07-12 03:17:46', '2025-07-12 03:17:46', 'dvjmdm', NULL, NULL, 'chschhcds', '00904838947', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(39, 8, 5, 'BS Information Technology', 'B', '2025-07-13 07:34:43', '2025-07-19 04:39:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(40, 15, 5, 'BS Information Technology', 'B', '2025-07-13 22:01:34', '2025-07-13 22:01:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(41, 13, 5, 'BS Computer Science', 'A', '2025-07-13 22:39:01', '2025-07-13 22:39:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(42, 1, 5, 'BS Information Technology', 'B', '2025-07-13 22:51:08', '2025-07-18 19:53:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '2025-07-18 19:53:32'),
(43, 10, 5, 'BS Computer Science', 'B', '2025-07-14 22:39:28', '2025-07-14 22:39:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(44, 16, 5, 'BS Information Technology', 'B', '2025-07-14 22:59:27', '2025-07-14 22:59:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(45, 17, 5, 'BS Information Technology', 'B', '2025-07-14 23:09:26', '2025-07-14 23:09:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(46, 20, 5, 'ACT-AD ', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(47, 21, 5, 'ACT-AD', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(48, 22, 5, 'ACT-AD', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(49, 23, 5, 'ACT-AD', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(50, 24, 5, 'ACT-AD', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(51, 25, 5, 'ACT-AD', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(52, 26, 5, 'ACT-AD', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(53, 27, 5, 'ACT-AD', 'A', '2025-07-15 00:59:43', '2025-07-15 00:59:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(54, 28, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(55, 29, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(56, 30, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(57, 31, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(58, 32, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(59, 33, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(60, 34, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(61, 35, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(62, 36, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(63, 37, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(64, 38, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(65, 39, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(66, 40, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(67, 41, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(68, 42, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(69, 43, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(70, 44, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(71, 45, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(72, 46, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(73, 47, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(74, 48, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(75, 49, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(76, 50, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(77, 51, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(78, 52, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(79, 53, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(80, 54, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(81, 55, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(82, 56, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(83, 57, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(84, 58, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(85, 59, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(86, 60, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(87, 61, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(88, 62, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(89, 63, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(90, 64, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(91, 65, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(92, 66, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(93, 67, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(94, 68, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(95, 69, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(96, 70, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(97, 71, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(98, 72, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(99, 73, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(100, 74, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(101, 75, 5, 'ACT-AD', 'A', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(102, 76, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(103, 77, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(104, 78, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(105, 79, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(106, 80, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(107, 81, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(108, 82, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(109, 83, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(110, 84, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(111, 85, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(112, 86, 5, 'ACT-AD', 'B', '2025-07-15 00:59:44', '2025-07-15 00:59:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(113, 87, 5, 'BS Information Technology', 'A', '2025-07-15 14:57:16', '2025-07-15 14:57:16', 'vnfkkn', NULL, NULL, 'na', 'na', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(114, 12, 5, 'BS Computer Science', 'B', '2025-07-18 19:39:29', '2025-07-18 19:39:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(115, 11, 5, 'Associate in Computer Technology', 'B', '2025-07-18 19:47:41', '2025-07-18 19:47:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(116, 18, 5, 'BS Computer Science', 'B', '2025-07-19 04:02:18', '2025-07-19 04:02:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL);

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
(5, 5, 2, 1, '2025-07-06 07:38:34', '2025-07-06 07:38:34'),
(6, 6, 3, 1, '2025-07-06 21:39:58', '2025-07-06 21:39:58'),
(7, 7, 3, 1, '2025-07-06 23:21:15', '2025-07-06 23:21:15'),
(8, 8, 3, 1, '2025-07-07 19:51:45', '2025-07-07 19:51:45'),
(9, 9, 3, 1, '2025-07-07 20:06:21', '2025-07-07 20:06:21'),
(10, 10, 3, 1, '2025-07-07 20:07:43', '2025-07-07 20:07:43'),
(11, 11, 3, 1, '2025-07-07 22:08:07', '2025-07-07 22:08:07'),
(12, 12, 4, 1, '2025-07-08 02:22:40', '2025-07-08 02:22:40'),
(13, 19, 5, 1, '2025-07-12 03:17:46', '2025-07-12 03:17:46'),
(14, 87, 5, 1, '2025-07-15 14:57:16', '2025-07-15 14:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_transition`
--

CREATE TABLE `student_transition` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `student_transition` (`id`, `last_name`, `first_name`, `middle_name`, `transition_type`, `from_program`, `to_program`, `reason_leaving`, `reason_returning`, `leave_reason`, `transition_date`, `remark`, `created_at`, `updated_at`, `semester_id`, `student_id`) VALUES
(1, 'Luzon', 'Alfaith', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'dfmkjm', '2025-07-06 07:12:30', '2025-07-06 07:12:30', 1, 2),
(5, 'Alvarez', 'April Rose', NULL, 'Transferring In', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'cvknv', '2025-07-06 07:33:43', '2025-07-06 07:33:43', 2, 3),
(6, 'Haliluddin', 'Naila', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'dropped', '2025-07-06 07:34:54', '2025-07-06 07:34:54', 2, 1),
(7, 'Luzon', 'Alfaith', NULL, 'Transferring Out', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'xcxmkm', '2025-07-06 07:39:23', '2025-07-06 07:39:23', 3, 2),
(8, '1', 'Sample', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-07', 'archi toACTxdckpdsk', '2025-07-06 21:39:58', '2025-07-06 21:40:14', 3, 6),
(9, 'Alvarez', 'April Rose', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-07', 'Auto-generated shift out', '2025-07-06 21:42:37', '2025-07-06 21:42:37', 2, 3),
(10, 'Alvarez', 'April Rose', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-07', NULL, '2025-07-06 21:42:37', '2025-07-06 21:42:37', 3, 3),
(11, 'Usama', 'Rahema', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-07', 'From Archi to ACT', '2025-07-06 23:21:15', '2025-07-06 23:21:15', 3, 7),
(12, 'Alejo', 'Ayana Jade', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-07', 'Auto-generated shift out', '2025-07-06 23:22:36', '2025-07-06 23:22:36', 2, 4),
(13, 'Alejo', 'Ayana Jade', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-07', 'xcc', '2025-07-06 23:22:36', '2025-07-06 23:22:36', 3, 4),
(14, 'Student', 'Sample', NULL, 'Returning Student', NULL, NULL, NULL, NULL, NULL, '2025-07-07', NULL, '2025-07-06 23:23:11', '2025-07-06 23:23:11', 3, 5),
(17, 'student transferring in', 'sample', NULL, 'Transferring In', NULL, NULL, NULL, NULL, NULL, '2025-07-08', 'kfdokf', '2025-07-07 20:07:43', '2025-07-07 20:07:43', 3, 10),
(18, 'image attachent', 'sample studdent', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-08', ',cc', '2025-07-07 22:08:07', '2025-07-07 22:08:07', 3, 11),
(19, 'Haliluddin', 'Naila', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-08', 'ccxmc,', '2025-07-07 22:55:39', '2025-07-07 22:55:39', 3, 1),
(20, 'sample', 'sample', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-08', 'Auto-generated shift out', '2025-07-07 23:04:22', '2025-07-07 23:04:22', 3, 8),
(21, 'sample', 'sample', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-08', 'mxckm', '2025-07-07 23:04:22', '2025-07-07 23:04:22', 4, 8),
(22, 'student transferring in', 'sample', NULL, 'Returning Student', NULL, NULL, NULL, NULL, NULL, '2025-07-08', NULL, '2025-07-07 23:06:07', '2025-07-07 23:06:07', 4, 10),
(23, 'student', 'sampling', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-09', 'from Archi to BSIT', '2025-07-08 17:48:58', '2025-07-08 17:48:58', 4, 15),
(24, 'student', 'sampling', NULL, 'Transferring In', NULL, NULL, NULL, NULL, NULL, '2025-07-09', 'from Archi to BSIT', '2025-07-08 17:50:49', '2025-07-08 17:50:49', 4, 16),
(29, 'Alejo', 'Ayana Jade', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'it to hstory', '2025-07-11 22:35:47', '2025-07-11 22:35:47', 4, 4),
(30, 'Tulabing', 'Norma', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'dropped se', '2025-07-11 22:38:33', '2025-07-11 22:38:33', 4, 12),
(41, 'Usama', 'Rahema', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'Auto-generated shift out', '2025-07-11 23:42:30', '2025-07-11 23:42:30', 3, 7),
(42, 'Usama', 'Rahema', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'act to cs', '2025-07-11 23:42:30', '2025-07-11 23:42:30', 4, 7),
(43, 'students shift in', 'sample', NULL, 'Transferring Out', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'to ateneo', '2025-07-11 23:54:18', '2025-07-11 23:54:18', 5, 9),
(44, 'Alvarez', 'April Rose', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'dsd', '2025-07-11 23:56:02', '2025-07-11 23:56:02', 5, 3),
(45, '1', 'Sample', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'shift to hist', '2025-07-12 03:15:53', '2025-07-12 03:15:53', 5, 6),
(46, 'Usama', 'Rahema', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'Auto-generated shift out', '2025-07-12 03:16:40', '2025-07-12 03:16:40', 4, 7),
(47, 'Usama', 'Rahema', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-12', NULL, '2025-07-12 03:16:40', '2025-07-12 03:16:40', 5, 7),
(48, 'student', 'New', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-12', 'from journ to bs it', '2025-07-12 03:17:46', '2025-07-12 03:17:46', 5, 19),
(49, 'student', 'sampling', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-14', 'dropped SE', '2025-07-13 22:01:34', '2025-07-13 22:01:34', 5, 15),
(50, 'Dela Cruz ', 'Juan', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-14', 'to uz', '2025-07-13 22:39:01', '2025-07-13 22:39:01', 5, 13),
(52, 'student', 'sampling', NULL, 'Graduated', NULL, NULL, NULL, NULL, NULL, '2025-07-15', NULL, '2025-07-14 23:09:26', '2025-07-14 23:09:26', 5, 17),
(53, 'dfndjn', 'ddjn', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-15', NULL, '2025-07-15 14:57:16', '2025-07-15 14:57:16', 5, 87);

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
(15, 7, 'transition_images/gVKFrU73DNezKV1QXDJ2zaJ0cl5LGLR9FY1wxvsY.png', '2025-07-06 07:39:23', '2025-07-06 07:39:23'),
(16, 8, 'transition_images/QPfRFb0qM6ibTh6ijxBJUIitokGgbg3mtMKmh9hJ.png', '2025-07-06 21:39:58', '2025-07-06 21:39:58'),
(17, 8, 'transition_images/ADEg4lyXUU9sXGtHJNF7zYtqBhRaAKU2sZdOyxjo.jpg', '2025-07-06 21:39:58', '2025-07-06 21:39:58'),
(18, 8, 'transition_images/1G7yYaqpd6mOO7wtqUsX9k1rU2bgmZjvSk0wMMfs.jpg', '2025-07-06 21:40:20', '2025-07-06 21:40:20'),
(19, 16, 'transition_images/UejApEqdagT14sq9YwEA8iQXA0qPpi2TXhQgrVwU.png', '2025-07-07 20:06:21', '2025-07-07 20:06:21'),
(20, 16, 'transition_images/XbdYvfGeY8UsnuA1Jx8llmqTEjEjHS9C4yur0hod.jpg', '2025-07-07 20:06:21', '2025-07-07 20:06:21'),
(21, 17, 'transition_images/Q52ofymHPLFD9dxfTMsNi8nLeuVpO6IFGg0me9PL.jpg', '2025-07-07 20:07:43', '2025-07-07 20:07:43'),
(22, 18, 'transition_images/709xnpsNkt62Di3qc5t5UwX1rvb3PjhNtwTeFAUd.jpg', '2025-07-07 22:08:07', '2025-07-07 22:08:07'),
(23, 18, 'transition_images/LyfefpuP16fGAtKdeF8Tev0DluEq4AejHZF6vpW1.jpg', '2025-07-07 22:08:07', '2025-07-07 22:08:07'),
(24, 18, 'transition_images/WzYKd6N8Lwv3E1qRuWq7DtUgZmCJM3dI5effoSXD.jpg', '2025-07-07 22:08:07', '2025-07-07 22:08:07'),
(26, 17, 'transition_images/iZMEaMQu4v2FPmKxd8DoJYLqeDtBK6KbNKu6pBnG.png', '2025-07-07 22:39:42', '2025-07-07 22:39:42'),
(28, 17, 'transition_images/3XSJyXHbkYPxc3oShv8g8iTUkh2OdtWFol16V9G5.png', '2025-07-07 22:40:03', '2025-07-07 22:40:03'),
(29, 19, 'transition_images/X9ALFJaxITrBg9PLjbTK6C3NHUjuPU9yCSXipFlR.jpg', '2025-07-07 22:55:39', '2025-07-07 22:55:39'),
(30, 21, 'transition_images/xAFPxuRUYsW7kV0ryvenRE73QDRVM8lMMuDnUNTh.jpg', '2025-07-07 23:04:22', '2025-07-07 23:04:22'),
(31, 22, 'transition_images/LTQGS10ZEoT7XmB6dzHH6Ge4YPNNHleXv56XGTdf.jpg', '2025-07-07 23:06:07', '2025-07-07 23:06:07'),
(32, 22, 'transition_images/oWQej2tWAPp3Su8d2ijrFXKIJPaT66G9LRKu3XTv.jpg', '2025-07-07 23:06:07', '2025-07-07 23:06:07');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contract_images`
--
ALTER TABLE `contract_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counselings`
--
ALTER TABLE `counselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `counseling_images`
--
ALTER TABLE `counseling_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `referral_images`
--
ALTER TABLE `referral_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_transition`
--
ALTER TABLE `student_transition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `student_transition_images`
--
ALTER TABLE `student_transition_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
