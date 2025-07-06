-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 04:53 PM
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
(2, 1, 2, '2025-07-02', NULL, 90, NULL, 'In Progress', '2025-07-03 04:48:21', '2025-07-03 04:48:21', 'Community Service', '2025-07-02', '2025-09-30', 'HOtdog cheeesdog kaya mo ba to'),
(3, 8, 3, '2025-07-02', NULL, 20, NULL, 'In Progress', '2025-07-04 01:04:03', '2025-07-04 01:04:03', 'cheating', '2025-07-01', '2025-07-21', 'dkfndkdfn'),
(4, 3, 10, '2025-07-03', NULL, 90, NULL, 'Completed', '2025-07-05 06:25:20', '2025-07-05 06:25:36', 'Misconduct', '2025-07-09', '2025-10-07', 'mdlkmkm\r\n\r\ndkfdskmflds'),
(5, 1, 10, '2025-07-02', NULL, 23, NULL, 'In Progress', '2025-07-05 07:12:38', '2025-07-05 07:12:38', 'cheating', '2025-07-03', '2025-07-26', 'dfs'),
(6, 1, 10, '2025-07-01', NULL, 20, NULL, 'In Progress', '2025-07-05 10:30:49', '2025-07-05 10:30:49', 'Misconduct', '2025-07-01', '2025-07-21', NULL),
(8, 7, 10, '2025-07-02', NULL, NULL, NULL, 'In Progress', '2025-07-05 10:54:23', '2025-07-05 10:54:23', 'Misconduct', NULL, NULL, NULL),
(9, 1, 10, '2025-07-01', NULL, NULL, NULL, 'In Progress', '2025-07-05 11:16:08', '2025-07-05 11:16:08', 'cheating', '2025-07-02', NULL, NULL),
(10, 4, 10, '2025-07-02', NULL, NULL, NULL, 'In Progress', '2025-07-05 11:18:47', '2025-07-05 11:18:47', 'Misconduct', '2025-07-03', NULL, NULL),
(11, 7, 10, '2025-07-01', NULL, 40, NULL, 'In Progress', '2025-07-05 11:20:18', '2025-07-05 11:20:18', 'cheating', '2025-07-02', '2025-08-11', NULL),
(12, 3, 10, '2025-07-02', NULL, 20, NULL, 'In Progress', '2025-07-05 21:58:44', '2025-07-05 21:58:44', 'cheating', '2025-07-10', '2025-07-30', 'cmv'),
(13, 4, 10, '2025-07-02', NULL, NULL, NULL, 'In Progress', '2025-07-05 22:03:14', '2025-07-05 22:03:14', 'Misconduct', NULL, NULL, 'fk'),
(14, 1, 10, '2025-07-03', NULL, 30, NULL, 'In Progress', '2025-07-05 22:52:22', '2025-07-05 22:52:22', 'Community Service', '2025-07-02', '2025-08-01', 'ck'),
(15, 23, 10, '2025-07-02', NULL, NULL, NULL, 'In Progress', '2025-07-05 23:29:40', '2025-07-05 23:30:25', 'Community Service', NULL, NULL, 'jdjn'),
(16, 1, 10, '2025-07-03', NULL, NULL, NULL, 'In Progress', '2025-07-05 23:39:54', '2025-07-05 23:39:54', 'cheating', NULL, NULL, NULL),
(17, 23, 10, '2025-07-02', NULL, NULL, NULL, 'In Progress', '2025-07-06 01:26:02', '2025-07-06 01:26:02', 'Community Service', '2025-07-04', NULL, NULL),
(18, 26, 10, '2025-07-06', NULL, 30, NULL, 'Completed', '2025-07-06 06:25:52', '2025-07-06 06:26:12', 'Community Service', '2025-07-06', '2025-08-05', 'mdfkm');

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
(3, 2, 'contract_images/U6eS6Qx1B1MUzYpfNGx7rrPnPeW9CIT5bAzprRhd.png', '2025-07-03 04:48:21', '2025-07-03 04:48:21'),
(4, 2, 'contract_images/hK4C5IG0jDzpQySbDiz5y7iigOE2GhL6x3xtJA2p.jpg', '2025-07-03 04:48:21', '2025-07-03 04:48:21'),
(5, 3, 'contract_images/9CyS2GbUdVsokPqYKLxcnIgxApwU3Nm3SjdPBspo.png', '2025-07-04 01:04:04', '2025-07-04 01:04:04'),
(6, 3, 'contract_images/AX70thcDACqxhwbbZAvuoBShbAZTZrJp6RU2Kd4d.png', '2025-07-04 01:04:04', '2025-07-04 01:04:04'),
(7, 2, 'contract_images/Or6FuyV5JjweQIojzUlrqFpQ3zgpLlJBeVhk3XFK.png', '2025-07-04 04:03:01', '2025-07-04 04:03:01'),
(8, 2, 'contract_images/dEGxYmSTPMT65d0c1ymUFlwsw8bQfyfGqhPDrRWl.jpg', '2025-07-04 04:03:01', '2025-07-04 04:03:01'),
(12, 4, 'contract_images/SSHJRpPfy2QDADZXbaS0OdHPSu03TB2jsul22fvp.png', '2025-07-05 06:25:20', '2025-07-05 06:25:20'),
(13, 4, 'contract_images/xWUsvzh3bPaO4v2qHSj6s6uV79RKcCFjdws2zb84.png', '2025-07-05 06:25:20', '2025-07-05 06:25:20'),
(14, 4, 'contract_images/s2mq38NOIGBCXgpCCz05wLuuoWpIdUnJkBrGv4nO.jpg', '2025-07-05 06:25:47', '2025-07-05 06:25:47'),
(15, 5, 'contract_images/wj4KrZGtKMmIe1zoDw6NjuT7wKaqcRPyrAlsnBKm.png', '2025-07-05 07:12:38', '2025-07-05 07:12:38'),
(16, 5, 'contract_images/1j5Ph1LTiYMVCjlUpovxDMCCnFQfTJlcP2jWJGRq.png', '2025-07-05 07:12:38', '2025-07-05 07:12:38'),
(17, 6, 'contract_images/kQs3Zxi7JI0RDIS56lsePEvuIXxT9PZAcj1p9ZU8.png', '2025-07-05 10:31:31', '2025-07-05 10:31:31'),
(18, 6, 'contract_images/aSRmUNlZADBzSRIbO5v1fYkkP7QkTqSoRTXCZ5N9.jpg', '2025-07-05 10:31:31', '2025-07-05 10:31:31'),
(19, 6, 'contract_images/9OtF8LfX01mitCZvByjy24I6uxbvZENTehoWIM9L.png', '2025-07-05 10:31:37', '2025-07-05 10:31:37'),
(22, 8, 'contract_images/lEvGIKSPklm5DawOyBCJ46aoxmMx73oK6NCj0QNQ.png', '2025-07-05 10:54:23', '2025-07-05 10:54:23'),
(23, 8, 'contract_images/5UN9NAAWoQOP1zzn2BevEgk0Iasz9lJ9Hj2PVvNR.png', '2025-07-05 10:54:23', '2025-07-05 10:54:23'),
(24, 8, 'contract_images/JePRmSymoeWFgh1OccA87sosOXG4ltxsigkmQSS4.jpg', '2025-07-05 10:54:23', '2025-07-05 10:54:23'),
(25, 8, 'contract_images/sDojDU1DxzcrQN7yeErQpOmYjCjTmE45qlp2dh1X.jpg', '2025-07-05 10:54:23', '2025-07-05 10:54:23'),
(26, 10, 'contract_images/jdOeC72IvjVcNxwoAKtYpEVzhB9LyqJUMBf6jfsT.png', '2025-07-05 11:18:47', '2025-07-05 11:18:47'),
(27, 10, 'contract_images/A0V25ieAx5Hdmzvw6JCumOpVWdPHgCpSyE0sknsc.jpg', '2025-07-05 11:18:47', '2025-07-05 11:18:47'),
(28, 11, 'contract_images/Zjso2oU770akKxycK1ljVDSUhgOvBgcFs5HLvJjA.jpg', '2025-07-05 11:20:18', '2025-07-05 11:20:18'),
(29, 11, 'contract_images/roHVPMyZNmaQEdlRXNMJAtAL6DavIgFqHoQwffQg.jpg', '2025-07-05 11:20:18', '2025-07-05 11:20:18'),
(30, 11, 'contract_images/ngLEjoNAwdFjDwKVgH7RpKHuvH7dDQwVs2TPylyf.jpg', '2025-07-05 11:20:18', '2025-07-05 11:20:18'),
(31, 12, 'contract_images/yjSRjTg8TNOxF0DbaxICDmeZfn9nZRmOhfqnHcyG.png', '2025-07-05 21:58:44', '2025-07-05 21:58:44'),
(32, 12, 'contract_images/55YthkK8uD9pkUPVPsYuPhTGNqVzOeDqjjyjvkgE.png', '2025-07-05 21:58:44', '2025-07-05 21:58:44'),
(33, 12, 'contract_images/1YhEwJ9uyiZ3fOFlz9UAyJEYxKT4GbJkiSL7vrp4.jpg', '2025-07-05 21:58:44', '2025-07-05 21:58:44'),
(34, 13, 'contract_images/DtLERyX9ugqDSzNDvB96yja8yvlFBFz5HtYDpmWV.jpg', '2025-07-05 22:03:14', '2025-07-05 22:03:14'),
(35, 13, 'contract_images/tIY0IIGixrouBnNQiuKGmQL0EPecN8DImo5g62We.jpg', '2025-07-05 22:03:14', '2025-07-05 22:03:14'),
(36, 13, 'contract_images/fIeq1vUDTqGRSq4MhIVEejC127cJvlzUiHl3oW0Q.jpg', '2025-07-05 22:03:14', '2025-07-05 22:03:14'),
(37, 14, 'contract_images/OxTexJDTPESFFPvnL88Dzlde12MIU5rDqwAa6Nxz.png', '2025-07-05 22:52:22', '2025-07-05 22:52:22'),
(38, 14, 'contract_images/nPLuRzYmpUa2v9YKNEHSbZ7qEoKcagAe5bLniCXW.jpg', '2025-07-05 22:52:22', '2025-07-05 22:52:22'),
(39, 15, 'contract_images/8GctEPt4GIFesjs7qaYtLp1Xga3edqXF2jDgUfic.jpg', '2025-07-05 23:29:40', '2025-07-05 23:29:40'),
(40, 15, 'contract_images/pwckIzYNL0qflAic26DqqTuRkg1xEI2HkQaD0ODA.jpg', '2025-07-05 23:29:40', '2025-07-05 23:29:40'),
(41, 16, 'contract_images/dmMhmdhUXhPe0Vd833FdOgGbIMhJrwBwbvnpYBto.jpg', '2025-07-05 23:39:54', '2025-07-05 23:39:54'),
(42, 16, 'contract_images/TH3qNUb7CqP7zJhW7TdwGXmvfwEqSjRmwITu6Q9h.jpg', '2025-07-05 23:39:54', '2025-07-05 23:39:54'),
(43, 16, 'contract_images/CI7BiEQX2QA85nvjHP2gPiCRFlIWxAM7CFQbrgIg.jpg', '2025-07-05 23:39:54', '2025-07-05 23:39:54'),
(44, 17, 'contract_images/Tip9kex3MfFtf03ISxjNEjUT0WpCshJZesl8B46o.jpg', '2025-07-06 01:26:03', '2025-07-06 01:26:03'),
(45, 17, 'contract_images/ed9RnMOpyNpQ6g2jaRB0G8anwWdSlrPKDbrnAzco.jpg', '2025-07-06 01:26:03', '2025-07-06 01:26:03'),
(46, 17, 'contract_images/4SoMfNFRfDHG0q0Wmozk6Xqu7Q9cA0rWnPO3Ez9e.jpg', '2025-07-06 01:26:03', '2025-07-06 01:26:03'),
(47, 18, 'contract_images/h4TBwRQwKn90VUZNq3XGMyHCRlWfc4ZpnbPVuxok.jpg', '2025-07-06 06:25:52', '2025-07-06 06:25:52'),
(48, 18, 'contract_images/DVyEZDfmEDkBlukHIbDItytkUpwbwxWwCxw7mAAv.jpg', '2025-07-06 06:25:52', '2025-07-06 06:25:52');

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
(1, 5, 1, '2025-07-01', 'Completed', NULL, '2025-07-02 07:28:20', '2025-07-04 01:59:21', 'Ajnkdfn\r\n\r\nhotdoooggxfm'),
(2, 1, 10, '2025-07-05', 'In Progress', NULL, '2025-07-05 07:20:43', '2025-07-05 23:26:05', 'xc,xcx,l'),
(3, 1, 10, '2025-07-02', 'In Progress', NULL, '2025-07-05 21:57:27', '2025-07-05 21:57:27', 'difmk'),
(4, 24, 10, '2025-07-01', 'Completed', NULL, '2025-07-05 22:21:35', '2025-07-05 22:27:20', 'dkfjdj \r\n\r\ndofokdsfo'),
(5, 3, 10, '2025-07-01', 'In Progress', NULL, '2025-07-05 22:30:55', '2025-07-05 22:30:55', 'djfij'),
(6, 23, 10, '2025-07-02', 'In Progress', NULL, '2025-07-05 23:14:05', '2025-07-05 23:14:05', 'sdskod'),
(7, 23, 10, '2025-07-02', 'In Progress', NULL, '2025-07-05 23:22:38', '2025-07-05 23:22:38', 'xmskcm'),
(8, 3, 10, '2025-07-01', 'In Progress', NULL, '2025-07-05 23:23:43', '2025-07-05 23:23:43', 'cxokcok'),
(9, 25, 10, '2025-07-01', 'In Progress', NULL, '2025-07-05 23:24:33', '2025-07-05 23:24:33', 'ckxlck'),
(10, 25, 10, '2025-07-01', 'In Progress', NULL, '2025-07-05 23:44:55', '2025-07-05 23:44:55', 'cxl,cx'),
(11, 7, 10, '2025-07-04', 'In Progress', NULL, '2025-07-06 01:27:54', '2025-07-06 01:27:54', 'xxl,'),
(12, 27, 10, '2025-07-02', 'In Progress', NULL, '2025-07-06 06:28:27', '2025-07-06 06:28:27', 'mxc');

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
(10, 1, 'counseling_images/5fzrv10kt2bQ2YB11Ca8YQXMNX5fy50FVtsPHVIg.jpg', '2025-07-04 01:33:34', '2025-07-04 01:33:34', 'id_card'),
(11, 2, 'counseling_images/afW9WGjLXp18aA1mu3sQUDXDP5ktIUeNrdgS3V1Q.png', '2025-07-05 07:20:43', '2025-07-05 07:20:43', 'form'),
(12, 2, 'counseling_images/ryOXkhn5oBkgQ3dYSjX4Y2qUXuyIJGGkcGuUeAns.png', '2025-07-05 07:20:43', '2025-07-05 07:20:43', 'form'),
(13, 3, 'counseling_images/cTt6PD38bgNn40chfyT7tzMRBvLVqpB6B4bDWJ72.png', '2025-07-05 21:57:27', '2025-07-05 21:57:27', 'form'),
(14, 3, 'counseling_images/09zciUOVJ5aaePRFcTH4ebOZJdinxvjTQN0TEFEx.jpg', '2025-07-05 21:57:27', '2025-07-05 21:57:27', 'form'),
(15, 3, 'counseling_images/hq1c4YBdMqxBcwSG47bNLjPQMC8kUyvh1sUKV2Uw.jpg', '2025-07-05 21:57:27', '2025-07-05 21:57:27', 'form'),
(16, 3, 'counseling_images/EFv6gOJbVJ1VFzP7Nq59CGAbcrJYcEbpO65PuhzP.jpg', '2025-07-05 21:57:27', '2025-07-05 21:57:27', 'id_card'),
(17, 3, 'counseling_images/eal3cLVTfd0RUQMkQQ1jAiQ0JoZQYlDgZNekATCa.jpg', '2025-07-05 21:57:27', '2025-07-05 21:57:27', 'id_card'),
(18, 3, 'counseling_images/0wOidZjdVl2pXowf0cC3HUOn4EzW28yLzinUudol.jpg', '2025-07-05 21:57:27', '2025-07-05 21:57:27', 'id_card'),
(19, 4, 'counseling_images/e6O0jMp4j98JNjeniGiyTuZD2YV2pMj2wozobffV.png', '2025-07-05 22:21:35', '2025-07-05 22:21:35', 'form'),
(20, 4, 'counseling_images/7GFw0MNCUzVUlyTV3S41pzChNnSoq8qYjaQlxqap.png', '2025-07-05 22:21:35', '2025-07-05 22:21:35', 'form'),
(21, 4, 'counseling_images/JMAWqUDHx5z8jRanoyecnUEv4QTBZPEhHrSp6FkS.jpg', '2025-07-05 22:21:35', '2025-07-05 22:21:35', 'form'),
(22, 4, 'counseling_images/sfWHUISHiuamvkj3kGNUHcaZwbhksgLNaFgzQ10s.jpg', '2025-07-05 22:21:35', '2025-07-05 22:21:35', 'form'),
(23, 4, 'counseling_images/diG6lK9sEUm4r06HSDp8jeHFotQotyGS4e6ip5gP.jpg', '2025-07-05 22:21:35', '2025-07-05 22:21:35', 'id_card'),
(24, 4, 'counseling_images/lwU84Za3TtUB8xL81ERQGSiF4rURdpl2RYES6z9t.jpg', '2025-07-05 22:21:35', '2025-07-05 22:21:35', 'id_card'),
(25, 4, 'counseling_images/jrY6OSPkrLNkAeMUQfxarAMAqvZAXd2y1t2wmP9y.jpg', '2025-07-05 22:22:40', '2025-07-05 22:22:40', 'form'),
(26, 5, 'counseling_images/VPcNu7Gb2ZmCo5O2SesygpOchu2PxiRkYaF9l26f.png', '2025-07-05 22:30:55', '2025-07-05 22:30:55', 'form'),
(27, 5, 'counseling_images/n2sDCB1uQa9rQadd65MjBNzHdCEeJ26DwZBcnfbW.png', '2025-07-05 22:30:55', '2025-07-05 22:30:55', 'form'),
(28, 5, 'counseling_images/qyWHRNdCkVQVQmJW2cfBPXSMQZS4gEMRXalbkVil.jpg', '2025-07-05 22:30:55', '2025-07-05 22:30:55', 'form'),
(29, 5, 'counseling_images/wCj2W7kMVvVG49JlFWQQ8cBanllKGJvkw9ItmYRf.jpg', '2025-07-05 22:30:55', '2025-07-05 22:30:55', 'id_card'),
(30, 5, 'counseling_images/Ir77ueMK8bUqjrZw592w1hb0V5aI7vUf8xrb0w9W.jpg', '2025-07-05 22:30:55', '2025-07-05 22:30:55', 'id_card'),
(31, 6, 'counseling_images/egVKI2f4jZThwmGld5JoXxIPI1yUCjppjuczVwia.png', '2025-07-05 23:14:05', '2025-07-05 23:14:05', 'form'),
(32, 6, 'counseling_images/Tv6hTJk8aoMpyvA3Xsfr2F2kMc6wQMFHB2FwPEbC.png', '2025-07-05 23:14:05', '2025-07-05 23:14:05', 'form'),
(33, 2, 'counseling_images/fsEN2FDyiLT34GIFrSZNicdvBDQsq20ZXuqtwXse.png', '2025-07-05 23:14:28', '2025-07-05 23:14:28', 'id_card'),
(34, 2, 'counseling_images/LMQtQrisG5Rn3prtWgwNZuNZsp23Fkozdm5hL9dq.jpg', '2025-07-05 23:14:28', '2025-07-05 23:14:28', 'id_card'),
(35, 7, 'counseling_images/7AoHPljKPU3tk0xkPcQKYgm7GoIsm18L1mr7VUDv.png', '2025-07-05 23:22:38', '2025-07-05 23:22:38', 'form'),
(36, 7, 'counseling_images/Y8xJpWAoZ44o2kvElQ3kvD8PdQblg2Legj74aIcm.png', '2025-07-05 23:22:38', '2025-07-05 23:22:38', 'form'),
(37, 7, 'counseling_images/gIDOMOWu08j1kNEaGJYtHoYpjhxasuIfmHoTTS7F.jpg', '2025-07-05 23:22:38', '2025-07-05 23:22:38', 'form'),
(38, 7, 'counseling_images/b7zeX5E8lkQJxXHndAVYjXChtk0wHS4BqjVlCrpi.jpg', '2025-07-05 23:22:38', '2025-07-05 23:22:38', 'form'),
(39, 7, 'counseling_images/yiE9bCizuuV0oquMzOrHP0SeHNeJeqgaYAHVvfeY.jpg', '2025-07-05 23:22:38', '2025-07-05 23:22:38', 'id_card'),
(40, 7, 'counseling_images/KbaThXBUZX9vkqPSVvebGrtRH6Hr1CAlejUJ8JEx.jpg', '2025-07-05 23:22:38', '2025-07-05 23:22:38', 'id_card'),
(41, 8, 'counseling_images/sUa1yIT88PxFWQrTBuQFwHpeEiy4YyZGP89r7eqI.png', '2025-07-05 23:23:43', '2025-07-05 23:23:43', 'form'),
(42, 8, 'counseling_images/WpkR49fsjrBZc68AL7OtScXlQuR5OR9Et7HQbI1r.png', '2025-07-05 23:23:43', '2025-07-05 23:23:43', 'form'),
(43, 8, 'counseling_images/y6wJoJtYblvlW9KOAabG6KFEaRbNmEBUQ8UkN3QG.jpg', '2025-07-05 23:23:43', '2025-07-05 23:23:43', 'form'),
(44, 8, 'counseling_images/8qQ6hBTpEfHCaVH5fjc1fbgUxbVv8QfUy0k3rdrf.jpg', '2025-07-05 23:23:43', '2025-07-05 23:23:43', 'form'),
(45, 8, 'counseling_images/T1O43Rs8a8tO468k2KfkuonjqnyAvMVttQXuPrcW.jpg', '2025-07-05 23:23:43', '2025-07-05 23:23:43', 'id_card'),
(46, 8, 'counseling_images/iCzp8RkHWo1AIvghD1r79cS1hUkXIKqVNKD92LYb.jpg', '2025-07-05 23:23:43', '2025-07-05 23:23:43', 'id_card'),
(47, 9, 'counseling_images/n0alvz09WPymk8mnxyGZQj7XeFoDxXuz8XDcxA8k.png', '2025-07-05 23:24:33', '2025-07-05 23:24:33', 'form'),
(48, 9, 'counseling_images/A3R2rZ6pR3z7K0MqOk6KWnII3Z2B1HBj0Xisf9tG.png', '2025-07-05 23:24:33', '2025-07-05 23:24:33', 'form'),
(49, 9, 'counseling_images/pH3QzsJHn6OAIgXQJKmkSzfSWnOVwnpFGWfALdBL.jpg', '2025-07-05 23:24:33', '2025-07-05 23:24:33', 'form'),
(50, 9, 'counseling_images/LZ7oiIizcjdUBrSEnDvsBRx1Gm2sRqI9naIDyTCA.jpg', '2025-07-05 23:24:33', '2025-07-05 23:24:33', 'id_card'),
(51, 9, 'counseling_images/gtURNMEuSl04rGJ8OB9TtAWtoDNgcWVFX5HjtR8X.jpg', '2025-07-05 23:24:33', '2025-07-05 23:24:33', 'id_card'),
(52, 10, 'counseling_images/l8qkZQaIE7C5Kv4IWgejt9QO4hZ4YjWWSqyfwnDt.jpg', '2025-07-05 23:44:55', '2025-07-05 23:44:55', 'form'),
(53, 10, 'counseling_images/qKjqWCrlTdK7512XO9TGKoC032fHWl8W45GTpRao.jpg', '2025-07-05 23:44:55', '2025-07-05 23:44:55', 'form'),
(54, 10, 'counseling_images/LjfQlDmK45rxFxbGNlHa14W2p57eCqr1hf8hk3Bt.jpg', '2025-07-05 23:44:55', '2025-07-05 23:44:55', 'form'),
(55, 10, 'counseling_images/y8Fl8NKiiuSSiPXqs8h2uiHohFiTn2wwEYC3A9SV.jpg', '2025-07-05 23:44:55', '2025-07-05 23:44:55', 'id_card'),
(56, 10, 'counseling_images/0WmB7yajFNdvdzmwKlvwk6x5RorXpKANjBJfAuRP.png', '2025-07-05 23:44:55', '2025-07-05 23:44:55', 'id_card'),
(57, 11, 'counseling_images/qJ2NjE3SNGAcngnTXAPtUbb61PRJQPN4IooyaSvX.jpg', '2025-07-06 01:27:54', '2025-07-06 01:27:54', 'form'),
(58, 11, 'counseling_images/zwFhGc61IODuFCyjNgprMhGLX6skSwnoimi3CTE2.jpg', '2025-07-06 01:27:54', '2025-07-06 01:27:54', 'form'),
(59, 11, 'counseling_images/L2deG0Arpg6135ThUZtnT2LwJSwkM9nc5uO0eivt.jpg', '2025-07-06 01:27:54', '2025-07-06 01:27:54', 'form'),
(60, 11, 'counseling_images/IRqg4gvjyr9gT8xXoj9LKb3uxkhC1oODoMmYGOvB.jpg', '2025-07-06 01:27:54', '2025-07-06 01:27:54', 'id_card'),
(61, 11, 'counseling_images/zBbhR1t8uSSfbT4qmdG064iuTLv1mB46egYbXwFd.jpg', '2025-07-06 01:27:54', '2025-07-06 01:27:54', 'id_card'),
(62, 12, 'counseling_images/lk9cR0X316X7M7NM9iF1c7SIrJoWksRezomdE9Zs.jpg', '2025-07-06 06:28:27', '2025-07-06 06:28:27', 'form'),
(63, 12, 'counseling_images/tglXhZocfOKnwePb8heMMGxQBLiocJ04n0pMYR1b.png', '2025-07-06 06:28:27', '2025-07-06 06:28:27', 'id_card'),
(64, 12, 'counseling_images/Rm1hfEuUfPO6179TaLfi2Hfj1ubWYmpo0HQ7kuLB.png', '2025-07-06 06:28:27', '2025-07-06 06:28:27', 'id_card');

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
(2, 1, 10, 'Absences', 'xcmxkcm', NULL, '2025-07-10', '2025-07-05 07:38:28', '2025-07-05 07:38:28'),
(3, 1, 10, 'Failing Grades', 'xlxl', NULL, '2025-07-01', '2025-07-05 11:59:23', '2025-07-05 11:59:23'),
(4, 3, 10, 'Failing Grades', NULL, NULL, '2025-07-10', '2025-07-05 12:02:54', '2025-07-05 12:02:54'),
(5, 23, 10, 'Absences', 'dfd', NULL, '2025-07-15', '2025-07-05 21:43:51', '2025-07-05 21:43:51'),
(6, 1, 10, 'Poor Study Habits', 'cvfokf', NULL, '2025-07-16', '2025-07-05 21:44:56', '2025-07-05 21:44:56'),
(7, 1, 10, 'Failing Grades', 'dcd,l', NULL, '2025-07-10', '2025-07-05 21:50:11', '2025-07-05 21:50:11'),
(8, 7, 10, 'Poor Study Habits', 'xkkd', NULL, '2025-07-02', '2025-07-05 21:59:27', '2025-07-05 21:59:27'),
(11, 24, 10, 'Mental Health', 'c,l', NULL, '2025-07-02', '2025-07-05 22:06:16', '2025-07-05 22:06:16'),
(12, 24, 10, 'Absences', NULL, NULL, '2025-07-03', '2025-07-05 22:13:44', '2025-07-05 22:13:44'),
(13, 4, 10, 'Poor Study Habits', 'ckdock \r\ndkos;kfoso', NULL, '2025-07-03', '2025-07-05 22:18:59', '2025-07-05 22:28:49'),
(14, 4, 10, 'Poor Study Habits', NULL, NULL, '2025-07-03', '2025-07-05 22:35:36', '2025-07-05 22:35:36'),
(15, 7, 10, 'Failing Grades', '2 images', NULL, '2025-07-02', '2025-07-05 22:53:09', '2025-07-05 22:53:09'),
(16, 4, 10, 'Poor Study Habits', 'lcxl', NULL, '2025-07-01', '2025-07-05 23:40:45', '2025-07-05 23:40:45'),
(17, 3, 10, 'Failing Grades', 'xlx', NULL, '2025-07-03', '2025-07-06 01:27:06', '2025-07-06 01:27:06'),
(18, 3, 10, 'Failing Grades', NULL, NULL, '2025-07-01', '2025-07-06 06:27:01', '2025-07-06 06:27:01'),
(19, 26, 10, 'Absences', NULL, NULL, '2025-07-01', '2025-07-06 06:27:35', '2025-07-06 06:27:35');

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
(5, 2, 'referral_images/vet00tE5wpB6HJ2FAzsUuuvGFN0UhQxniQdocVre.png', '2025-07-05 07:38:28', '2025-07-05 07:38:28'),
(6, 2, 'referral_images/SXW18BY9HLJo3mSTBxEzZ0wDtPjxIhi8S8zlUjSB.png', '2025-07-05 07:38:28', '2025-07-05 07:38:28'),
(7, 2, 'referral_images/VY9LIBOt45mq9vRjeSIXxD5Bhx3359EEQCqBYJGw.jpg', '2025-07-05 07:38:28', '2025-07-05 07:38:28'),
(8, 2, 'referral_images/PBH8xYQn4ZWZDQFYv1DoIF5n6PPD1Gt5b23Encyj.jpg', '2025-07-05 07:38:28', '2025-07-05 07:38:28'),
(9, 3, 'referral_images/lCEuH0uaYKTT886KSr520oFvzCM8K7gQDrwGCrNJ.png', '2025-07-05 11:59:23', '2025-07-05 11:59:23'),
(10, 3, 'referral_images/QuzTTsqAYB1fTsmFWG8qHLmACf3Ssu240yZDHQGB.jpg', '2025-07-05 11:59:23', '2025-07-05 11:59:23'),
(11, 3, 'referral_images/ul5lAV7PAFQZyEiLKvjIXdq6OvVI5MLxkMLgkQpb.jpg', '2025-07-05 11:59:23', '2025-07-05 11:59:23'),
(12, 5, 'counseling_images/ibMtDA93qtWoNX4jdYmlMuMlnnYPQnb82M06OBmA.jpg', '2025-07-05 21:50:47', '2025-07-05 21:50:47'),
(17, 11, 'referral_images/dQ498Bm1UTUF5ubZXUf1KA4eDfNPPq46QscR1bAK.png', '2025-07-05 22:12:19', '2025-07-05 22:12:19'),
(18, 11, 'referral_images/kS7bfUrOsnPRffuTNLH6M2h6zsRz8BHNVl300Rs1.png', '2025-07-05 22:12:19', '2025-07-05 22:12:19'),
(19, 11, 'referral_images/R9RWbBroRor4pf7SViHv9LKCPtgt8cJXPejg1wTm.jpg', '2025-07-05 22:12:19', '2025-07-05 22:12:19'),
(20, 13, 'referral_images/b7glDs0pggjqgsklSPqoCJmbxQNwU2nNO293i07k.jpg', '2025-07-05 22:18:59', '2025-07-05 22:18:59'),
(21, 13, 'referral_images/wB7Jbp3qt3BaeAZEmusxewHi9Su66cMLOtK8ySCa.png', '2025-07-05 22:28:42', '2025-07-05 22:28:42'),
(22, 13, 'referral_images/ni22eOXUccAZl06hZTLI2fvvNO10AnYlBRlFPKJf.png', '2025-07-05 22:28:42', '2025-07-05 22:28:42'),
(23, 2, 'referral_images/CrU8fIWTZmBsM4FKQffQKDTRPnQHaRIL7LOICYag.png', '2025-07-05 22:33:04', '2025-07-05 22:33:04'),
(25, 14, 'referral_images/K7qettyQbZ8qqAVZkVVMTVW49IpSz77FHWeCnKUw.png', '2025-07-05 22:35:36', '2025-07-05 22:35:36'),
(26, 14, 'referral_images/6j4N3LvmATVRnX9M1AlhgzcDZSr4XAlZeuCQDsbI.jpg', '2025-07-05 22:35:36', '2025-07-05 22:35:36'),
(27, 15, 'referral_images/gcVCyGlzzxfhLswvgEAVmZ9ihqxWBv6mrM0rAYQ2.png', '2025-07-05 22:53:09', '2025-07-05 22:53:09'),
(28, 15, 'referral_images/Qt7BI9wQ1oMaUtE6MR4kdLazU7ux3oi9ULqzAklh.jpg', '2025-07-05 22:53:09', '2025-07-05 22:53:09'),
(29, 16, 'referral_images/749nYMM7c1uffj9kxBCZN8pAFjtKWLF99xcjABJe.jpg', '2025-07-05 23:40:45', '2025-07-05 23:40:45'),
(30, 16, 'referral_images/81g198OtJKGwkPxH6ck6hA1LRspLW5swOTcxOlF9.jpg', '2025-07-05 23:40:45', '2025-07-05 23:40:45'),
(31, 17, 'referral_images/PprfudCqemLslCwwMBsNEZelwD9EnN6BtSgi8Rge.png', '2025-07-06 01:27:06', '2025-07-06 01:27:06'),
(32, 17, 'referral_images/ZyMAdM1akoQleeLufhdMAEcHHXpbehp4W4Yld8ST.jpg', '2025-07-06 01:27:06', '2025-07-06 01:27:06'),
(33, 18, 'referral_images/u0XoLLjMWYSPYFujvm1oxa9VETLhlx36EjBgrQni.png', '2025-07-06 06:27:01', '2025-07-06 06:27:01'),
(34, 18, 'referral_images/jhCsgr4reoQ0QMyRTSlmPsbdh6l1VWVM9OcQfyxO.png', '2025-07-06 06:27:01', '2025-07-06 06:27:01'),
(35, 18, 'referral_images/rlkiu9m8QkW6OPz6XEoZPZQGzJLRxpXhNdTahK16.jpg', '2025-07-06 06:27:01', '2025-07-06 06:27:01'),
(36, 19, 'referral_images/ggPiSQkrxoR6uTw1xQME6XvvKdqd1ok6zhrbaPcb.jpg', '2025-07-06 06:27:35', '2025-07-06 06:27:35'),
(37, 19, 'referral_images/7f9qijX4vNY9Oraxqhf4e70BOJAEEsdtLH45izlY.jpg', '2025-07-06 06:27:35', '2025-07-06 06:27:35');

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
(4, 'Mental Health', '2025-06-24 20:11:49', '2025-06-24 20:11:49'),
(5, 'Deviant Behavior', '2025-07-06 03:46:14', '2025-07-06 03:46:14');

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
(4, '2025-07-04 08:51:21', '2025-07-05 05:38:54', '2027-06-04', '2028-08-23', '2027-2028', 0),
(5, '2025-07-05 05:38:54', '2025-07-05 05:38:54', '2028-05-05', '2029-08-08', '2028-2029', 1);

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
(7, '1st', 0, '2025-07-04 08:51:21', '2025-07-05 05:38:54', 0, 4),
(8, '2nd', 0, '2025-07-05 00:31:23', '2025-07-05 05:38:54', 0, 4),
(9, '1st', 0, '2025-07-05 05:38:54', '2025-07-05 06:02:52', 0, 5),
(10, '2nd', 1, '2025-07-05 06:02:52', '2025-07-05 06:02:52', 0, 5);

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
('BI7mFfEzor4j6AaTB06erdZ9fGauuqGz10ix5kCS', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMkFQWms2T3ZyT2FZOGJLTklkM3R1V1lqZ0lhSFBlZUxleGxxZDM5byI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9ndWlkYW5jZS1tYW5hZ2VtZW50LXN5c3RlbS50ZXN0L2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1751813613);

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
(22, '20253948484', 'ultyse', 'dnfds', 'cnsjn', '2025-07-08', NULL, 'Male', NULL, 'kvmdlskm', NULL, NULL, 'dfmdkmd', 'dfksnj', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 04:51:27', '2025-07-05 04:51:27', NULL, NULL, NULL, NULL, '0998876756453'),
(23, '202539484246334', 'mcmcm', 'oeoeo', 'nxnxnx', '2025-07-01', NULL, 'Female', NULL, 'cmcxkmc', NULL, NULL, 'jk', '090887', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 11:12:32', '2025-07-05 11:12:32', NULL, NULL, NULL, NULL, '08989799'),
(24, '202023247983', 'Ulysess', 'Selorio', 'Casino', '2025-07-01', NULL, 'Male', NULL, 'kmkslmklasm', NULL, NULL, 'chjbchjbh', '09363165480', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 20:15:57', '2025-07-05 20:15:57', NULL, NULL, NULL, NULL, '0909767554'),
(25, '2023348487', 'PERSEUS', 'COVARRUBIAS', 'CASIÑO', '2025-07-08', NULL, 'Female', NULL, 'CANELAR', NULL, NULL, 'Perseus Casino', '09363165480', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-05 21:54:24', '2025-07-05 21:54:24', NULL, NULL, NULL, NULL, '09843247387'),
(26, '2023094875894', 'Regular Student', NULL, 'Sample 1', '2004-05-20', NULL, 'Female', NULL, 'sjkdns', NULL, NULL, 'ndskjndk', 'jdsjdljs', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 06:15:26', '2025-07-06 06:15:26', NULL, NULL, NULL, NULL, '099897664654'),
(27, '29223284738', 'Shifting in', 'Sample', 'Student 2', '2025-06-30', NULL, 'Female', NULL, 'cd', NULL, NULL, 'jsnkjdnsk', '090789878', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 06:18:57', '2025-07-06 06:18:57', NULL, NULL, NULL, NULL, '97887687675'),
(28, '2023039398', 'Transferring In', 'Sample', 'Student 3', '2025-07-01', 'Jr.', 'Female', NULL, 'dkdhsdjf', NULL, NULL, 'cvnkjn', '0909876', NULL, NULL, NULL, 'Enrolled', NULL, NULL, '2025-07-06 06:21:30', '2025-07-06 06:21:30', NULL, NULL, NULL, NULL, '099877');

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
(48, 4, 8, 'BS Information Technology', 'C', '2025-07-05 05:27:28', '2025-07-05 05:27:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(49, 1, 9, 'BS Information Technology', 'B', '2025-07-05 05:46:22', '2025-07-05 05:46:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(50, 3, 9, 'BS Computer Science', 'A', '2025-07-05 05:46:22', '2025-07-05 05:46:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(51, 4, 9, 'BS Information Technology', 'C', '2025-07-05 05:46:22', '2025-07-05 05:46:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(52, 1, 10, 'BS Information Technology', 'B', '2025-07-05 06:22:23', '2025-07-05 06:22:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', NULL),
(53, 3, 10, 'BS Computer Science', 'A', '2025-07-05 06:22:23', '2025-07-05 06:22:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(54, 4, 10, 'BS Information Technology', 'C', '2025-07-05 06:22:23', '2025-07-05 06:22:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL),
(55, 7, 10, 'BS Information Technology', 'B', '2025-07-05 06:22:23', '2025-07-05 06:22:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(56, 10, 10, 'Associate in Computer Technology', 'A', '2025-07-05 06:22:23', '2025-07-06 00:52:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL),
(57, 23, 10, 'Associate in Computer Technology', 'A', '2025-07-05 11:12:32', '2025-07-05 11:12:32', 'cmcxkmc', NULL, NULL, 'jk', '090887', NULL, NULL, NULL, NULL, NULL, '2', NULL),
(58, 24, 10, 'Associate in Computer Technology', 'B', '2025-07-05 20:15:57', '2025-07-05 20:15:57', 'kmkslmklasm', NULL, NULL, 'chjbchjbh', '09363165480', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(59, 25, 10, 'BS Information Technology', 'B', '2025-07-05 21:54:24', '2025-07-05 21:54:24', 'CANELAR', NULL, NULL, 'Perseus Casino', '09363165480', NULL, NULL, NULL, NULL, NULL, '2', NULL),
(60, 13, 10, 'BS Information Technology', 'B', '2025-07-06 00:53:14', '2025-07-06 00:53:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL),
(61, 26, 10, 'Associate in Computer Technology', 'A', '2025-07-06 06:15:26', '2025-07-06 06:15:26', 'sjkdns', NULL, NULL, 'ndskjndk', 'jdsjdljs', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(62, 27, 10, 'BS Information Technology', 'B', '2025-07-06 06:18:57', '2025-07-06 06:18:57', 'cd', NULL, NULL, 'jsnkjdnsk', '090789878', NULL, NULL, NULL, NULL, NULL, '1', NULL),
(63, 28, 10, 'BS Information Technology', 'A', '2025-07-06 06:21:30', '2025-07-06 06:21:30', 'dkdhsdjf', NULL, NULL, 'cvnkjn', '0909876', NULL, NULL, NULL, NULL, NULL, '2', NULL);

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
(21, 22, 8, 1, '2025-07-05 04:51:27', '2025-07-05 04:51:27'),
(22, 23, 10, 1, '2025-07-05 11:12:32', '2025-07-05 11:12:32'),
(23, 24, 10, 1, '2025-07-05 20:15:57', '2025-07-05 20:15:57'),
(24, 25, 10, 1, '2025-07-05 21:54:24', '2025-07-05 21:54:24'),
(25, 26, 10, 1, '2025-07-06 06:15:26', '2025-07-06 06:15:26'),
(26, 27, 10, 1, '2025-07-06 06:18:57', '2025-07-06 06:18:57'),
(27, 28, 10, 1, '2025-07-06 06:21:30', '2025-07-06 06:21:30');

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
(57, 'Alvarez', 'April Rose', NULL, 'Returning Student', NULL, NULL, NULL, NULL, NULL, '2025-07-05', NULL, '2025-07-05 05:27:28', '2025-07-05 05:27:28', 8, 4),
(62, 'talaga', 'last', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'Auto-generated shift out', '2025-07-05 05:33:00', '2025-07-05 05:33:00', 7, 10),
(63, 'talaga', 'last', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'zxzx', '2025-07-05 05:33:00', '2025-07-05 05:33:00', 8, 10),
(64, 'tlga', 'final', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'dcxv', '2025-07-05 05:37:51', '2025-07-05 05:37:51', 8, 11),
(65, 'Haliluddin', 'Naila', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-05', 'kjdfsdsknf', '2025-07-05 05:54:06', '2025-07-05 05:54:06', 9, 1),
(66, 'nxnxnx', 'mcmcm', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-05', NULL, '2025-07-05 11:12:32', '2025-07-05 11:12:32', 10, 23),
(67, 'CASIÑO', 'PERSEUS', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'dnkjn', '2025-07-05 21:54:24', '2025-07-05 21:54:24', 10, 25),
(68, 'cnsjn', 'ultyse', NULL, 'Transferring Out', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'cvclc,v', '2025-07-05 23:55:07', '2025-07-05 23:55:07', 10, 22),
(69, 'utet', 'utet', NULL, 'Shifting Out', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'cl,xc,vcl,', '2025-07-06 00:49:21', '2025-07-06 00:49:21', 10, 12),
(71, 'Haliluddin', 'Naila', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'mvkldvmfkdjfnkj\r\nedit 2', '2025-07-06 01:24:34', '2025-07-06 01:50:54', 10, 1),
(72, 'Student 2', 'Shifting in', NULL, 'Shifting In', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'ckcxcfkdnf', '2025-07-06 06:18:57', '2025-07-06 06:19:33', 10, 27),
(73, 'Student 3', 'Transferring In', NULL, 'Transferring In', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'djkfdnfknfdlsfn', '2025-07-06 06:21:30', '2025-07-06 06:22:26', 10, 28),
(74, 'CASIÑO', 'PERSEUS', NULL, 'Dropped', NULL, NULL, NULL, NULL, NULL, '2025-07-06', 'ndkf', '2025-07-06 06:22:51', '2025-07-06 06:22:51', 10, 7);

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
(84, 63, 'transition_images/vUAEBt9vTA7TLPvGgl7HgbE2743NXAhiq58EcW9k.png', '2025-07-05 05:33:00', '2025-07-05 05:33:00'),
(85, 64, 'transition_images/v8n5E9VQwUdjzf7MCRO9zGBQJXqetgtzRjGi7FiW.png', '2025-07-05 05:37:51', '2025-07-05 05:37:51'),
(86, 64, 'transition_images/OcRvenzbMvocim69x3wVdVw6jYosySEywiTro4IP.png', '2025-07-05 05:37:51', '2025-07-05 05:37:51'),
(87, 66, 'transition_images/e1EiPORmrLTtBVjF4Oc36ekXcQcDesrSmxzFBvDq.png', '2025-07-05 11:12:32', '2025-07-05 11:12:32'),
(88, 66, 'transition_images/biFP4DCWI1dzdDyoWvn5lxpfwKPehslP0DxMnRs6.jpg', '2025-07-05 11:12:32', '2025-07-05 11:12:32'),
(89, 67, 'transition_images/4medoRf8rvH0eaShpaAw2pI9DUhfMQcbbqo653u5.png', '2025-07-05 21:54:24', '2025-07-05 21:54:24'),
(90, 67, 'transition_images/TchC4cBp6f8U2rYJUTQl7eWDGjHEzsHuo1P2K2g6.png', '2025-07-05 21:54:24', '2025-07-05 21:54:24'),
(91, 67, 'transition_images/XJotJVWQRYMpaGUEicfZlCLUzrYbpf29ol4HPQVt.jpg', '2025-07-05 21:54:24', '2025-07-05 21:54:24'),
(92, 68, 'transition_images/qQpUxRu33qLHkVZBKYPvWG5N4Ge9kIZ3qNr8FpKd.jpg', '2025-07-05 23:55:07', '2025-07-05 23:55:07'),
(93, 68, 'transition_images/ffLzfcoyJvr1O1l5omgPalKC7py4RvEm8sSYL0rW.jpg', '2025-07-05 23:55:07', '2025-07-05 23:55:07'),
(94, 69, 'transition_images/vbT6gyNWPlQulToGIuJsa6sL7noIWDQHOCx6H4gn.png', '2025-07-06 00:49:21', '2025-07-06 00:49:21'),
(95, 69, 'transition_images/lmcMTc5u70jPhXb6EZ84Wv4XVPNK8PUxL17N2941.jpg', '2025-07-06 00:49:21', '2025-07-06 00:49:21'),
(96, 71, 'transition_images/cdhoi6h8Js1lZinV4HAaGgRsw0k7jHRYNk4Y3Ho5.png', '2025-07-06 01:24:34', '2025-07-06 01:24:34'),
(97, 71, 'transition_images/LDzO9WbjpGCIFqna1hsMgHdLiGtUTlEjoODbixGR.png', '2025-07-06 01:24:34', '2025-07-06 01:24:34'),
(98, 71, 'transition_images/pOSEpPYP457grlzTiHho17rvL01vgMWLpDfpD57V.jpg', '2025-07-06 01:24:34', '2025-07-06 01:24:34'),
(99, 71, 'transition_images/cAWU0oHO5G55Z0GjFu7ZXwVDBuqCzzZMVURI5CGr.png', '2025-07-06 01:51:56', '2025-07-06 01:51:56'),
(100, 71, 'transition_images/r6qH1GCaUVGh5bs4b5glTrIuEaqjcxJMxqSOCdUt.png', '2025-07-06 01:51:56', '2025-07-06 01:51:56'),
(101, 72, 'transition_images/Sqo202cRKxQxSTmuABKZ6TfgLLHCEQrDyRYz43Sa.png', '2025-07-06 06:18:57', '2025-07-06 06:18:57'),
(102, 72, 'transition_images/odm4gRTb5tuqUhdrqRXW8EPnM85zagV61tlhPCax.jpg', '2025-07-06 06:18:57', '2025-07-06 06:18:57'),
(103, 72, 'transition_images/ZMJ6v7BNz63ciyzJZI539vXEMtGfPwIQSxHry80R.png', '2025-07-06 06:19:45', '2025-07-06 06:19:45'),
(104, 73, 'transition_images/jLI6m9W5fQa2hkCcuUnadqS2DH3Bc3fXE11gLOA8.png', '2025-07-06 06:21:30', '2025-07-06 06:21:30'),
(105, 73, 'transition_images/X5YWgdASptOAvokCWW6CMi4HrOMDYNSj9LCozOtY.jpg', '2025-07-06 06:21:30', '2025-07-06 06:21:30'),
(106, 74, 'transition_images/6I1xvM40FXna503hzihvLImVXoiRcv8xA52JB77V.png', '2025-07-06 06:22:51', '2025-07-06 06:22:51');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contract_images`
--
ALTER TABLE `contract_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counselings`
--
ALTER TABLE `counselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `counseling_images`
--
ALTER TABLE `counseling_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `referral_images`
--
ALTER TABLE `referral_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_years`
--
ALTER TABLE `school_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `student_profiles`
--
ALTER TABLE `student_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student_semester_enrollments`
--
ALTER TABLE `student_semester_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_transition`
--
ALTER TABLE `student_transition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `student_transition_images`
--
ALTER TABLE `student_transition_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

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
