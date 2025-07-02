-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2025 at 09:35 AM
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
(1, 5, 1, '2025-07-01', NULL, 25, NULL, 'In Progress', '2025-07-01 23:02:15', '2025-07-01 23:02:26', 'deloading', '2025-07-03', '2025-07-28', 'dkdkndln');

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
(1, 7, 'contract_images/ujMpT37SOInpEcMHtH2VSbTODsOWFrK3IWFUXs9L.png', '2025-06-24 05:33:54', '2025-06-24 05:33:54'),
(2, 7, 'contract_images/Jp5ceJmk6ud1pa5Nrfvxw0b6N7WZCDrrlL3iYEZ8.png', '2025-06-24 05:33:54', '2025-06-24 05:33:54'),
(3, 7, 'contract_images/ScPfZmLQJjDR7VVYucSoBkSrgTQdNgivgjDK0xEq.jpg', '2025-06-24 05:33:54', '2025-06-24 05:33:54'),
(4, 8, 'contract_images/bp6Xd6Je4Xhuj3dth3TzBhZWcxQ1HFCa9I0wWC9l.png', '2025-06-24 05:34:40', '2025-06-24 05:34:40'),
(5, 8, 'contract_images/RjMz9inSOleT1l9LHkFVuThNJ80MvM7bbF3sEAGa.png', '2025-06-24 05:34:40', '2025-06-24 05:34:40'),
(6, 8, 'contract_images/4aanwyOV06UX9I0LaSKFd2XRhCBNnaR0eHfbiqku.jpg', '2025-06-24 05:34:40', '2025-06-24 05:34:40'),
(7, 8, 'contract_images/LRl2j4HE3q0AeDYWgh8ff7GbPCpXebovc9KzI5qk.jpg', '2025-06-24 05:34:40', '2025-06-24 05:34:40'),
(8, 8, 'contract_images/9r5b5jmOkCkGkYqE7b3BoLP5GLPVwlCD3kBinJho.jpg', '2025-06-24 05:34:40', '2025-06-24 05:34:40'),
(9, 9, 'contract_images/27bLREKOgr8y7JzdKXKTmZdBl5NS3qWcxOC1tI63.png', '2025-06-24 05:42:29', '2025-06-24 05:42:29'),
(10, 9, 'contract_images/AeJtCDq0s48cVxifuvftOnz56BgSKfzYhUynphi1.png', '2025-06-24 05:42:29', '2025-06-24 05:42:29'),
(11, 9, 'contract_images/VkW6a0q7pp2h0sW6zND2BwttJS6dSpGS2UuxkBjz.jpg', '2025-06-24 05:42:29', '2025-06-24 05:42:29'),
(12, 9, 'contract_images/0QAu3Vdv17XTl7ceih2pofBzGx3cTEkudPvMw5wS.jpg', '2025-06-24 05:42:29', '2025-06-24 05:42:29'),
(13, 9, 'contract_images/wMLiJ9xA6zzUqKfel6gabxXbCBx41fKMJ5GAjJpj.jpg', '2025-06-24 05:42:29', '2025-06-24 05:42:29'),
(14, 1, 'contract_images/xVSTIFQtEjrojS0kFsyNktuVJH8NG3R916IiXTqY.png', '2025-06-24 08:32:58', '2025-06-24 08:32:58'),
(15, 1, 'contract_images/ljDrJAg7PFr0cIEQKfkvo8nom0dHFtr4lQYd63YI.png', '2025-06-24 08:32:58', '2025-06-24 08:32:58'),
(16, 1, 'contract_images/L3RVhiphUET4Axd2oLmD7vJqpQ7zqRyemYi49QJA.jpg', '2025-06-24 08:32:58', '2025-06-24 08:32:58'),
(17, 2, 'contract_images/xuqFJInW9XPZDjjcxongy1eWpDU8mvvRVlNSEG5O.jpg', '2025-06-24 20:02:05', '2025-06-24 20:02:05'),
(18, 4, 'contract_images/WX5kJeQl6lXlBk5jKAtydE6lOshFTV8D0boYMXXp.png', '2025-06-30 04:43:11', '2025-06-30 04:43:11'),
(19, 1, 'contract_images/C3kvj4RVbCUyI2m5wYQC9PZQtYpexxsyZJ9E4m71.png', '2025-07-01 23:02:15', '2025-07-01 23:02:15'),
(20, 1, 'contract_images/5gUdMhiikvCt9fUH4Nh5VwVEukgZpFIltpB9LE5q.png', '2025-07-01 23:02:15', '2025-07-01 23:02:15'),
(21, 1, 'contract_images/b0unz02xN4Q5VjfpDkGbZIHd69alHjTLyktSwZ66.jpg', '2025-07-01 23:02:15', '2025-07-01 23:02:15');

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
(1, 2, 1, '2025-07-04', 'Completed', NULL, '2025-07-01 23:06:49', '2025-07-01 23:07:01', 'smlslsm sdnlndasn');

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
(1, 7, 'counseling_images/np2eLb750vsIeoWAc9VARiXTGoelS1EmoHXPIkhd.png', '2025-06-24 07:43:24', '2025-06-24 07:43:24', NULL),
(2, 7, 'counseling_images/3KEdb5CPFFNPBfNvxRr59xNJaga5Qr00A77Gay0L.png', '2025-06-24 07:43:24', '2025-06-24 07:43:24', NULL),
(3, 7, 'counseling_images/fif4YHryYUouR44gq7P1BnHH3dBGQhRJTOwtsf76.jpg', '2025-06-24 07:43:24', '2025-06-24 07:43:24', NULL),
(4, 1, 'counseling_images/y9p5msoEqFOaZHsbGrA7bfaaJm5vMHM6N2bScq2k.png', '2025-06-24 08:34:22', '2025-06-24 08:34:22', NULL),
(5, 1, 'counseling_images/vh1qJzn1OqgztCzHZPUl0SBRw2m9gppZutzkO5qs.png', '2025-06-24 08:34:22', '2025-06-24 08:34:22', NULL),
(6, 1, 'counseling_images/FYLp68pQBAFVTNcXuIJNHmPKuEiwzzR324T3bZ01.jpg', '2025-06-24 08:34:22', '2025-06-24 08:34:22', NULL),
(7, 1, 'counseling_images/Hg0lChVvl8KBrjOY2pAc9Xd14BIs66OdzOYP40uf.jpg', '2025-06-24 08:34:22', '2025-06-24 08:34:22', NULL),
(8, 2, 'counseling_images/hboWRTyhnAGc8KfBnhpMnjrU617hQ40vKESJhhmv.jpg', '2025-06-24 18:55:37', '2025-06-24 18:55:37', NULL),
(9, 2, 'counseling_images/yjrK4QYDw7he6w34rkIanKhZfeKzn1NMoeGXCnWl.jpg', '2025-06-24 18:55:37', '2025-06-24 18:55:37', NULL),
(10, 2, 'counseling_images/UnhA483VYPcvQeTQFZgmvn7CAolFGXh0jfY22mU9.jpg', '2025-06-24 18:55:37', '2025-06-24 18:55:37', NULL),
(11, 2, 'counseling_images/LUjHgZqGaKoTfB6G9DxGTlopoVsVvDFP22H8HlSC.jpg', '2025-06-24 18:55:37', '2025-06-24 18:55:37', NULL),
(12, 3, 'counseling_images/sv1SxP1nKTYJYrl5kFuCQmhHzctZtORFUZ9cOxKM.jpg', '2025-07-01 07:12:22', '2025-07-01 07:12:22', NULL),
(13, 3, 'counseling_images/VkEEU7dNKGdNaaqE6r7YOBC7MB0oB4A7M0y4oMwv.jpg', '2025-07-01 07:12:22', '2025-07-01 07:12:22', NULL),
(14, 3, 'counseling_images/bjjLC7qb6FqUzXgml948mxBD0P9ddeTHvZaoqYb5.jpg', '2025-07-01 07:12:22', '2025-07-01 07:12:22', NULL),
(15, 3, 'counseling_images/tam8r6AgyFDoZGqtLjMzUvM3qwwPW3MLYe28uLBV.jpg', '2025-07-01 07:12:22', '2025-07-01 07:12:22', NULL),
(16, 4, 'counseling_images/MceHCi1DTc9xUY5lWKxefGDMkpd97o9UFZWQZAlB.png', '2025-07-01 07:21:48', '2025-07-01 07:21:48', NULL),
(17, 4, 'counseling_images/owT2lGk82tWZ0G9eExUImXyq9HSZVTZwoEcII4JF.png', '2025-07-01 07:21:48', '2025-07-01 07:21:48', NULL),
(18, 4, 'counseling_images/OarrNdTHC0vmFjY1VZaLDv6W9F9kElBcxr4TPajI.jpg', '2025-07-01 07:21:48', '2025-07-01 07:21:48', NULL),
(19, 4, 'counseling_images/NeBHo8qxR3I6ZYZk8jurYVObVrdA5QRmohZmU9uY.png', '2025-07-01 07:21:48', '2025-07-01 07:21:48', NULL),
(20, 4, 'counseling_images/GqOGKzO1lmpnN8yaieFvjfikBY4bGvoEuhaj4vhg.jpg', '2025-07-01 07:21:48', '2025-07-01 07:21:48', NULL),
(21, 4, 'counseling_images/b1DjqN9EVuygtvNAJeTQfdKg2b397yzFlHd2OOH5.jpg', '2025-07-01 07:21:48', '2025-07-01 07:21:48', NULL),
(22, 5, 'counseling_images/57VUbaEu0Ny0WiB0BvSAezVOsJ33hxgZSQmNTl7h.png', '2025-07-01 07:26:37', '2025-07-01 07:26:37', NULL),
(23, 5, 'counseling_images/2HFxxSELySk35kC1DzYYeFU9saWPRGYTrBIwffcS.png', '2025-07-01 07:26:37', '2025-07-01 07:26:37', NULL),
(24, 5, 'counseling_images/5sLP4Qf5tpFwGzcomaAYMIBK9NmuN0vdgTXgoOme.jpg', '2025-07-01 07:26:37', '2025-07-01 07:26:37', NULL),
(25, 5, 'counseling_images/NPsA7VapynF8UG69BPzze6pcd262CJ5DIWFUY1Ai.png', '2025-07-01 07:26:37', '2025-07-01 07:26:37', NULL),
(26, 5, 'counseling_images/C0C2zaHZyyUzMEvIRcpYm2vWHdEMti57Z0yaZhDT.png', '2025-07-01 07:26:37', '2025-07-01 07:26:37', NULL),
(27, 6, 'counseling_images/uqIzJIcl0s0s3Bj1lGd0pn0cTtZQybZlSL4fmoXP.png', '2025-07-01 07:35:16', '2025-07-01 07:35:16', NULL),
(28, 6, 'counseling_images/hDp6Oz7DNkTtxfmxiMCdtmMp1n3S264hIcKV9p5m.png', '2025-07-01 07:35:16', '2025-07-01 07:35:16', NULL),
(29, 6, 'counseling_images/Dg0bR5GnVY0qBIZt5TUIOJ6LStBDdAq6vypJ1mCH.jpg', '2025-07-01 07:35:16', '2025-07-01 07:35:16', NULL),
(30, 6, 'counseling_images/hEhXvtSR2HRBNo9wLXsKxCj3kf3XRln7RvJK5ika.jpg', '2025-07-01 07:35:16', '2025-07-01 07:35:16', NULL),
(31, 6, 'counseling_images/39IXaY6cOJzS1ytDNLtb49u6FSfKXR6kVlDhShgT.png', '2025-07-01 07:35:16', '2025-07-01 07:35:16', NULL),
(32, 6, 'counseling_images/RI1ZJwNX8r6K0znnpWpYqviwDaXG9gLEgNIB2o4P.png', '2025-07-01 07:35:16', '2025-07-01 07:35:16', NULL),
(33, 7, 'counseling_images/KaCbuCXOtojXUuze3GhxD1jY4QVoJYWk7jivhEHz.png', '2025-07-01 07:36:43', '2025-07-01 07:36:43', 'form'),
(34, 7, 'counseling_images/g7lAUvQmfGDAY6VmvUJHnemTzWjzEASx92JWw0q3.jpg', '2025-07-01 07:36:43', '2025-07-01 07:36:43', 'form'),
(35, 7, 'counseling_images/1Z1dNeH6OFjykpA2IGuZ0RbHosV5XoIKP0dBlndm.jpg', '2025-07-01 07:36:43', '2025-07-01 07:36:43', 'form'),
(36, 7, 'counseling_images/4sxXzhzyXqSz9R9Rchozt0FkAjTsEEhwtxRALmeE.jpg', '2025-07-01 07:36:43', '2025-07-01 07:36:43', 'form'),
(37, 7, 'counseling_images/1SDkJL3XxTZahR9HkKsn9PsFv5XC9YiarTtAFFa2.png', '2025-07-01 07:36:43', '2025-07-01 07:36:43', 'id_card'),
(38, 7, 'counseling_images/v25w8CBKssgrkKB2WQO2jUugr9liJWIf5FwEkAfw.png', '2025-07-01 07:36:43', '2025-07-01 07:36:43', 'id_card'),
(39, 8, 'counseling_images/OLGr94wvYoJqEQ576pBjzzEDmhuFVfizCUF1IJMM.png', '2025-07-01 09:27:03', '2025-07-01 09:27:03', 'form'),
(40, 8, 'counseling_images/FgpO19T29KkZOaFWMjSzYaUQxuCiTz8S5jc2LTiV.jpg', '2025-07-01 09:27:03', '2025-07-01 09:27:03', 'form'),
(41, 8, 'counseling_images/F8FiBsh6oaXQk9HNu3i7JChw4FRnjl4PzPpbT9qn.jpg', '2025-07-01 09:27:03', '2025-07-01 09:27:03', 'id_card'),
(42, 8, 'counseling_images/aBiMj0oOd4FSY6nVJ256btwLc0pskDixFpx44y41.jpg', '2025-07-01 09:27:03', '2025-07-01 09:27:03', 'id_card'),
(43, 8, 'counseling_images/pn5IabwZKMH8SwR345WeLeNNC1p7qkzrP2FoJAvg.jpg', '2025-07-01 09:27:03', '2025-07-01 09:27:03', 'id_card'),
(49, 1, 'counseling_images/nbhJ2nmKH9XQbK3zK1c4QeM793dI1n4jpibW1YyK.png', '2025-07-01 23:06:49', '2025-07-01 23:06:49', 'form'),
(50, 1, 'counseling_images/ygzjFLJzFrLCOliwKMSGsAOzkGsxWCj9yJk3xuuB.jpg', '2025-07-01 23:06:49', '2025-07-01 23:06:49', 'form'),
(51, 1, 'counseling_images/rNcUIJgqj26cRKIeFtSoiNhz5TAnVQiWMw48Upwh.jpg', '2025-07-01 23:06:49', '2025-07-01 23:06:49', 'form'),
(52, 1, 'counseling_images/NOkUoxPpLWyiT2E6uDviaDCE0Nud3mLyKXmDXu7o.jpg', '2025-07-01 23:06:49', '2025-07-01 23:06:49', 'form'),
(53, 1, 'counseling_images/H8HNUAzV6VFXyPMv2c7w6v7RtBYkvG1RhEgNuLMz.jpg', '2025-07-01 23:06:49', '2025-07-01 23:06:49', 'id_card'),
(54, 1, 'counseling_images/PqrfgfncA3wgsDWEfyBGxV4RZjYAxnNDr7tNuGEf.jpg', '2025-07-01 23:06:49', '2025-07-01 23:06:49', 'id_card');

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
(48, '2025_07_01_181407_add_remarks_to_counselings_table', 37);

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
(1, 1, 1, 'Absences', 'nksdnnsnnaskn', NULL, '2025-07-01', '2025-07-01 23:04:01', '2025-07-01 23:04:01');

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
(1, 14, 'referral_images/4aoy2CDS5UyhIRRfzD3oMimb5v733gNHXk274jwQ.png', '2025-06-24 07:36:17', '2025-06-24 07:36:17'),
(2, 14, 'referral_images/hxulO2ycET2Mphgv0ERtqaGvNQjNyhmBvJ7fpOCu.png', '2025-06-24 07:36:17', '2025-06-24 07:36:17'),
(3, 14, 'referral_images/3YVIpqrLVDzxcihpCnROwB6lXcWOg1Ea0S5u1pzW.jpg', '2025-06-24 07:36:17', '2025-06-24 07:36:17'),
(4, 14, 'referral_images/XWDYpG9d5ijUlacnWAKcLNo6ZTGGVczYntMYcu5S.jpg', '2025-06-24 07:36:17', '2025-06-24 07:36:17'),
(5, 1, 'referral_images/4aIlHvOdmQH0AffbuEEnvodX1RcCBtfFvCohJgPA.png', '2025-06-24 08:33:52', '2025-06-24 08:33:52'),
(6, 1, 'referral_images/YCRxOi2PVstS5Mwl5Yh82Sqe2WAxxWB5CYE0m4mc.png', '2025-06-24 08:33:52', '2025-06-24 08:33:52'),
(7, 1, 'referral_images/TVquY7zGoOIkymTPEeIQQ8UhuuZMCh0EYccF7jl2.jpg', '2025-06-24 08:33:52', '2025-06-24 08:33:52'),
(8, 1, 'referral_images/kDwJeL1vA28V6LCemdlYGpAFTSgw7J9maSAx0ADC.jpg', '2025-06-24 08:33:52', '2025-06-24 08:33:52'),
(9, 2, 'referral_images/fZ0GRQivWTnG6QZtdjNqs2CdCM5zzOrhQzT5XIT2.jpg', '2025-06-24 18:46:30', '2025-06-24 18:46:30'),
(10, 2, 'referral_images/u9ofcFmqRUn1yUmebAaxqbbcT0pWjoA5L2SjnN94.jpg', '2025-06-24 18:46:30', '2025-06-24 18:46:30'),
(11, 2, 'referral_images/qbwBSaa9VfxoCx6vYsCyokPio65xCVaI8vqkxW9I.jpg', '2025-06-24 18:46:30', '2025-06-24 18:46:30'),
(12, 2, 'referral_images/e42P6gtzP5QuRtkCa4h5Dpjei0k21thfvmvJJ8kK.jpg', '2025-06-24 18:46:30', '2025-06-24 18:46:30'),
(13, 1, 'referral_images/cJxZzeDm9JKoBpTM3gYRU9Zvp01pF4aDxFQqXjR2.jpg', '2025-07-01 23:04:01', '2025-07-01 23:04:01'),
(14, 1, 'referral_images/qNIQFRBuVLwxybiSh9R6zLOfjSdtUOROJfxM0SYp.jpg', '2025-07-01 23:04:01', '2025-07-01 23:04:01');

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
(1, '2025-07-01 22:45:40', '2025-07-01 23:28:37', '2024-08-04', '2025-05-20', '2024-2025', 0),
(2, '2025-07-01 23:28:37', '2025-07-01 23:28:37', '2025-08-04', '2026-05-20', '2025-2026', 1);

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
(1, '1st', 0, '2025-07-01 22:45:40', '2025-07-01 23:28:37', 0, 1),
(2, '2nd', 0, '2025-07-01 23:10:52', '2025-07-01 23:28:37', 0, 1),
(3, '1st', 1, '2025-07-01 23:28:37', '2025-07-01 23:28:37', 0, 2);

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
('D0LARaE1CWBRrieNMi9TacIQ5kaUr0JZiRSHu3fQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.20.2 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZTNveVZOd0FZR3ptS0xsdUZGWU91YnNnNnExeFBKSU1yS2o0TG1QUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0Lz9oZXJkPXByZXZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751432615),
('tFX8ZniGHTi2Y9WSYkAkbtlJizWvPrhqNlJP1BHy', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSGlZTUJpZ1M2U2RTY2VKZk9TTG5ldlhhY1RrdVV6OFNFOEh4MDdsRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0L3JlcG9ydCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1751441412);

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
(1, '202201053', 'Naila', 'Taji', 'Halilludin', '2003-12-05', NULL, 'Female', NULL, '1121 Rio Hondo Ambut St.', NULL, NULL, 'Naila Father', '098987876765', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-01 22:51:50', '2025-07-01 22:59:30', NULL, NULL, 'Naila Father', NULL, NULL),
(2, '202201054', 'April Rose', NULL, 'Alvares', '2004-04-05', NULL, 'Female', NULL, '112 canelar', NULL, NULL, 'Bernadeth Alvarez', '09092898374', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-01 22:54:22', '2025-07-01 22:54:22', NULL, NULL, NULL, NULL, '090899878767'),
(3, '202201055', 'Ayana Jade', 'Fabian', 'Alejo', '2004-07-10', NULL, 'Female', NULL, '1223 Cabatangan', NULL, NULL, 'Alfaith Mae Luzon', '0997987876587', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-01 22:56:31', '2025-07-01 22:56:31', NULL, NULL, NULL, NULL, '909808982397'),
(4, '202201056', 'Alfaith Mae', 'M', 'luzon', '1980-05-05', NULL, 'Female', NULL, 'cabatangan', NULL, NULL, 'Ayana Jade Alejo', '0935363165480', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-01 22:59:13', '2025-07-01 22:59:13', NULL, NULL, NULL, NULL, '09907876566756'),
(5, '202201057', 'Josh', 'Abil', 'Mendoza', '2004-02-01', NULL, 'Male', NULL, 'slknkjfdnk', NULL, NULL, 'Alyacher Salihuddin', '09363165480', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-01 23:01:15', '2025-07-01 23:01:15', NULL, NULL, NULL, NULL, '089899876786');

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
(1, 1, 1, 'BS Computer Science', 'A', '2025-07-01 22:51:50', '2025-07-01 22:51:50', '1121 Rio Hondo Ambut St.', NULL, NULL, 'Naila Father', '098987876765', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(2, 2, 1, 'BS Computer Science', 'B', '2025-07-01 22:54:22', '2025-07-01 22:54:22', '112 canelar', NULL, NULL, 'Bernadeth Alvarez', '09092898374', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(3, 3, 1, 'Associate in Computer Technology', 'C', '2025-07-01 22:56:31', '2025-07-01 22:56:31', '1223 Cabatangan', NULL, NULL, 'Alfaith Mae Luzon', '0997987876587', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(4, 4, 1, 'BS Information Technology', 'A', '2025-07-01 22:59:13', '2025-07-01 22:59:13', 'cabatangan', NULL, NULL, 'Ayana Jade Alejo', '0935363165480', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(5, 5, 1, 'BS Computer Science', 'C', '2025-07-01 23:01:15', '2025-07-01 23:01:15', 'slknkjfdnk', NULL, NULL, 'Alyacher Salihuddin', '09363165480', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(6, 1, 2, 'BS Computer Science', 'A', '2025-07-01 23:22:57', '2025-07-01 23:22:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(7, 2, 2, 'BS Computer Science', 'B', '2025-07-01 23:24:45', '2025-07-01 23:24:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(8, 3, 2, 'Associate in Computer Technology', 'C', '2025-07-01 23:24:45', '2025-07-01 23:24:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(9, 4, 2, 'BS Information Technology', 'C', '2025-07-01 23:24:45', '2025-07-01 23:24:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(10, 5, 2, 'BS Computer Science', 'A', '2025-07-01 23:24:45', '2025-07-01 23:24:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(11, 1, 3, 'BS Computer Science', 'B', '2025-07-01 23:29:08', '2025-07-01 23:29:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(12, 2, 3, 'BS Computer Science', 'B', '2025-07-01 23:29:45', '2025-07-01 23:29:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(13, 3, 3, 'Associate in Computer Technology', 'A', '2025-07-01 23:29:45', '2025-07-01 23:29:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(14, 4, 3, 'BS Information Technology', 'C', '2025-07-01 23:29:45', '2025-07-01 23:29:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL);

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
(1, 1, 1, 1, '2025-07-01 22:51:50', '2025-07-01 22:51:50'),
(2, 2, 1, 1, '2025-07-01 22:54:22', '2025-07-01 22:54:22'),
(3, 3, 1, 1, '2025-07-01 22:56:31', '2025-07-01 22:56:31'),
(4, 4, 1, 1, '2025-07-01 22:59:13', '2025-07-01 22:59:13'),
(5, 5, 1, 1, '2025-07-01 23:01:15', '2025-07-01 23:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_transition`
--

CREATE TABLE `student_transition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `transition_type` enum('Shiftee','Transferee','Returnee','Dropped','Stopped') NOT NULL,
  `from_program` varchar(255) DEFAULT NULL,
  `to_program` varchar(255) DEFAULT NULL,
  `reason_leaving` text DEFAULT NULL,
  `reason_returning` text DEFAULT NULL,
  `leave_reason` text DEFAULT NULL,
  `transition_date` date NOT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_transition`
--

INSERT INTO `student_transition` (`id`, `last_name`, `first_name`, `middle_name`, `transition_type`, `from_program`, `to_program`, `reason_leaving`, `reason_returning`, `leave_reason`, `transition_date`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'Calugtong', 'Gwaynette', NULL, 'Returnee', 'Western Mindanao State University, College of Computing Studies', 'Ateneo De Zamboanga University', NULL, NULL, NULL, '2025-07-01', 'no money', '2025-07-01 23:08:16', '2025-07-01 23:08:16');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `referral_images`
--
ALTER TABLE `referral_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_transition`
--
ALTER TABLE `student_transition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
