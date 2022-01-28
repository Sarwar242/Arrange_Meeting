-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2022 at 07:22 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arrange_meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panels`
--

CREATE TABLE `admin_panels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_panels`
--

INSERT INTO `admin_panels` (`id`, `name`, `dept`, `password`, `email`, `contact`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Manjur Ahmed', 'CSE', '$2y$10$hsTVzky8GLlz5WH2ffT0UeqlidDQXcULE2CwAxFO2nAi70jDpmC.W', 'majur@gmail.com', '01975412512', NULL, NULL, NULL),
(2, 'Md. Samsuddhoa', 'CSE', '$2y$10$Pl.M6oQ.k2GN1c1v0Scl0./HCe.qXmsK45yW7R3ecb1KYF6R4qfxS', 'sams@gmail.com', '01975412513', NULL, NULL, NULL),
(3, 'Md. Erfan', 'CSE', '$2y$10$n1mi0bebGkMXwDJqetzSNOeOJVYrGmR8H3K7/dgvpFjSFQRwe.2lS', 'erfan@gmail.com', '01975412514', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wrong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quiz_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `name`, `roll`, `email`, `score`, `right`, `wrong`, `quiz_id`, `created_at`, `updated_at`) VALUES
(1, 'Employee2', '17CSE012', 'employee@absolutelychef.com', '2', '2', '0', 2, '2022-01-28 18:20:46', '2022-01-28 18:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` date DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `day`, `department_id`, `batch_id`, `course_id`, `created_at`, `updated_at`) VALUES
(2, '2022-01-04', 1, 1, 2, '2022-01-04 09:27:04', '2022-01-04 09:27:04'),
(3, '2022-01-05', 1, 1, 2, '2022-01-04 09:50:47', '2022-01-04 09:50:47'),
(4, '2022-01-14', 1, 1, 2, '2022-01-13 00:47:21', '2022-01-13 00:47:21'),
(5, '2022-01-27', 1, 1, 2, '2022-01-27 07:04:54', '2022-01-27 07:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `session`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '4th', '2016-17', 1, '2022-01-03 12:52:09', '2022-01-03 12:52:09'),
(2, '3rd', '2015-16', 1, '2022-01-03 13:32:02', '2022-01-03 13:32:02');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(2, 'Computer Networks', 'CSE-3205', '2022-01-03 12:19:49', '2022-01-03 12:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `faculty`, `created_at`, `updated_at`) VALUES
(1, 'CSE', 'Science and Engineering', '2022-01-03 11:38:48', '2022-01-03 12:00:45'),
(2, 'Math', 'Science and Engineering', '2022-01-03 12:01:41', '2022-01-03 12:01:41'),
(3, 'Law', 'Law', '2022-01-03 12:01:48', '2022-01-03 12:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grows`
--

CREATE TABLE `grows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `host_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `day` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `host_id`, `start`, `end`, `day`, `status`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, '12:51:00', '13:49:00', '2022-01-14', 'pending', 1, '2022-01-13 00:49:32', '2022-01-13 00:49:32'),
(2, 2, '01:50:00', '03:50:00', '2022-01-15', 'pending', 1, '2022-01-13 00:50:14', '2022-01-13 00:50:14'),
(3, 2, '12:50:00', '16:50:00', '2022-01-14', 'pending', 1, '2022-01-13 00:50:41', '2022-01-13 00:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_19_072349_create_user_panels_table', 1),
(5, '2021_06_20_145335_create_admin_panels_table', 1),
(6, '2021_07_07_183812_create_tests_table', 1),
(7, '2021_07_07_183930_create_test1s_table', 1),
(8, '2021_07_08_080735_create_grows_table', 1),
(9, '2021_12_23_080611_create_meetings_table', 1),
(10, '2021_12_23_084723_create_participants_table', 1),
(11, '2022_01_02_144519_create_departments_table', 2),
(12, '2022_01_03_124722_create_batches_table', 2),
(13, '2022_01_03_143801_create_students_table', 2),
(14, '2022_01_03_144021_create_courses_table', 2),
(15, '2022_01_03_144455_create_attendances_table', 2),
(17, '2022_01_03_145641_student_attendance', 3),
(18, '2022_01_23_215451_create_quizzes_table', 4),
(19, '2022_01_23_215807_create_questions_table', 4),
(20, '2022_01_23_220218_create_options_table', 4),
(22, '2022_01_28_234709_create_answers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `is_correct`, `created_at`, `updated_at`) VALUES
(14, 4, 'opt1', 0, '2022-01-28 06:00:16', '2022-01-28 06:00:16'),
(15, 4, 'opt2', 0, '2022-01-28 06:00:16', '2022-01-28 06:00:16'),
(16, 4, 'opt3', 0, '2022-01-28 06:00:16', '2022-01-28 06:00:16'),
(17, 4, 'opt4', 1, '2022-01-28 06:00:16', '2022-01-28 06:00:16'),
(18, 5, 'nice', 1, '2022-01-28 06:00:51', '2022-01-28 06:00:51'),
(19, 5, 'nice2', 0, '2022-01-28 06:00:51', '2022-01-28 06:00:51'),
(20, 5, 'nice3', 0, '2022-01-28 06:00:51', '2022-01-28 06:00:51'),
(21, 5, 'nice4', 0, '2022-01-28 06:00:51', '2022-01-28 06:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` bigint(20) UNSIGNED DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `meeting_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-13 00:49:32', '2022-01-13 00:49:32'),
(2, 1, 3, '2022-01-13 00:49:32', '2022-01-13 00:49:32'),
(3, 2, 1, '2022-01-13 00:50:14', '2022-01-13 00:50:14'),
(4, 3, 3, '2022-01-13 00:50:41', '2022-01-13 00:50:41');

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 2, 'Test Question?', 'test', 1, '2022-01-28 06:00:16', '2022-01-28 06:00:16'),
(5, 2, 'Next Question?', 'test', 1, '2022-01-28 06:00:51', '2022-01-28 06:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'test exam', 'test-exam', '2022-01-28 05:56:05', '2022-01-28 05:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`, `email`, `address`, `session`, `department_id`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 'MD Sarwar Hossain', '17cse016', 'sarwar.cse4.bu@gmail.com', 'chairmanpara, nachole-6310, nachole, chapainawabgonj', '2016-17', 1, 1, '2022-01-03 13:26:43', '2022-01-03 13:26:43'),
(2, 'Md Wasim', '16cse006', 'wasim@gmail.com', 'nachole-6310, nachole, chapainawabgonj', '2015-16', 1, 2, '2022-01-03 13:31:27', '2022-01-03 13:33:09'),
(4, 'Alek Luettgen', '17CSE020', 'hmckenzie@example.com', '34877 Abelardo Alley\nNorth Enrico, WV 00134-4060', '2016-17', 1, 1, '2022-01-03 14:07:03', '2022-01-03 14:07:03'),
(5, 'Marquis Stamm', '17CSE02', 'zschaden@example.net', '676 Abdiel Union Suite 731\nDaphnemouth, NV 88554-9456', '2016-17', 1, 1, '2022-01-03 14:07:03', '2022-01-03 14:07:03'),
(6, 'Adriana Kreiger II', '17CSE04', 'qhintz@example.net', '82972 Fritsch Landing Apt. 560\nNew Rosemary, OK 45484-2316', '2016-17', 1, 1, '2022-01-03 14:07:03', '2022-01-03 14:07:03'),
(7, 'Michelle Reichel', '17CSE014', 'uwyman@example.org', '32478 Pearline Freeway Suite 672\nGodfreyview, IA 15402-3931', '2016-17', 1, 1, '2022-01-03 14:07:03', '2022-01-03 14:07:03'),
(8, 'Dr. Bryce Mueller', '17CSE07', 'fredrick.price@example.com', '9836 Rippin Green Apt. 159\nBednarside, MN 72579', '2016-17', 1, 1, '2022-01-03 14:07:03', '2022-01-03 14:07:03'),
(9, 'Lexie Huels', '17CSE046', 'horace40@example.com', '7345 Ralph Junctions Apt. 951\nEwellchester, CA 43304-0200', '2016-17', 1, 1, '2022-01-03 14:07:03', '2022-01-03 14:07:03'),
(10, 'Ms. Alisha O\'Reilly I', '17CSE036', 'angela.schmidt@example.net', '8767 Mallie Canyon\nPurdyshire, AR 04174', '2016-17', 1, 1, '2022-01-03 14:07:03', '2022-01-03 14:07:03'),
(12, 'Faustino Wuckert', '17CSE024', 'elta75@example.net', '28416 Hodkiewicz Coves Suite 479\nLake Elinore, NJ 78508', '2016-17', 1, 1, '2022-01-03 14:07:16', '2022-01-03 14:07:16'),
(13, 'Prof. Sidney Koss', '17CSE039', 'funk.retha@example.net', '53109 Merritt Ports\nShannonbury, LA 39287-2434', '2016-17', 1, 1, '2022-01-03 14:07:16', '2022-01-03 14:07:16'),
(14, 'Jaeden Yundt', '17CSE040', 'orval.hauck@example.org', '996 Irma Bridge\nHeathcotechester, OK 96539', '2016-17', 1, 1, '2022-01-03 14:07:16', '2022-01-03 14:07:16'),
(15, 'Kamryn Pouros', '17CSE09', 'crist.tianna@example.com', '412 Metz Stravenue\nNew Clifton, FL 31668-5436', '2016-17', 1, 1, '2022-01-03 14:07:16', '2022-01-03 14:07:16'),
(16, 'Genevieve Murphy', '17CSE038', 'marquardt.ashley@example.net', '93005 Maegan Vista\nWest Brennafort, IL 05012', '2016-17', 1, 1, '2022-01-03 14:07:16', '2022-01-03 14:07:16'),
(18, 'Laron Boyer', '17CSE242', 'aracely.davis@example.net', '26603 Leif Rest\nLake Deannaberg, FL 55141', '2016-17', 1, 1, '2022-01-03 14:07:28', '2022-01-03 14:07:28'),
(19, 'Zoila Yost', '17CSE183', 'darrin.brakus@example.net', '45986 Crona Village Apt. 242\nSouth Louveniabury, NJ 40025', '2016-17', 1, 1, '2022-01-03 14:07:28', '2022-01-03 14:07:28'),
(20, 'Jaden Pouros', '17CSE454', 'heaney.kendra@example.com', '67034 Vanessa Alley Suite 968\nLittelview, WI 02168', '2016-17', 1, 1, '2022-01-03 14:07:28', '2022-01-03 14:07:28'),
(21, 'Dr. Kaylie Ortiz Sr.', '17CSE316', 'gilberto54@example.com', '38722 Koepp Lane\nFinnhaven, NY 30259-9596', '2016-17', 1, 1, '2022-01-03 14:07:28', '2022-01-03 14:07:28'),
(22, 'June Klocko', '17CSE324', 'helen.mertz@example.net', '739 Predovic Valleys\nNew Pearlie, FL 79950-6507', '2016-17', 1, 1, '2022-01-03 14:07:28', '2022-01-03 14:07:28'),
(24, 'Martine Goodwin', '17CSE121', 'helene67@example.org', '56672 Kiarra Drive Apt. 516\nNorth Giovanny, IA 69262', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(25, 'Garland Heidenreich', '17CSE396', 'trycia.feest@example.net', '43636 Hettinger Views\nNorth Sonyachester, HI 58826-8938', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(26, 'Abelardo Jakubowski', '17CSE421', 'jaylan.schumm@example.net', '2024 Malvina Viaduct Suite 512\nMadalineberg, FL 36229-8483', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(27, 'Maggie Blanda', '17CSE288', 'freichel@example.net', '521 Casper Unions\nEddport, VA 84931', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(28, 'Mose Bayer III', '17CSE157', 'qhammes@example.org', '90364 Sonia Mews Apt. 992\nNew Keyonfurt, MS 32557-4088', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(29, 'Miss Roslyn Cormier DDS', '17CSE223', 'ondricka.wellington@example.net', '552 Norbert Cape Suite 398\nRusselfort, NE 97247', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(30, 'Aron Shields', '17CSE318', 'ardith.hermann@example.com', '7990 Kattie Village\nEast Mollie, OH 21901-2207', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(31, 'Dr. Gerhard Anderson Jr.', '17CSE478', 'ohara.michel@example.com', '3766 Greenholt Canyon Apt. 408\nEast Mauricetown, DE 76497', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(32, 'Manuela Grady PhD', '17CSE115', 'davis.gayle@example.net', '3309 Sadie Crossroad Suite 404\nNew Taureanport, MA 52083', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(33, 'Dr. Damien Sanford', '17CSE394', 'stoltenberg.keshaun@example.org', '36135 Yesenia Lane\nSouth Vladimirhaven, IL 82045-8633', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(34, 'Miss Elda Goldner V', '17CSE273', 'natasha46@example.org', '622 Bernier Street\nGleasonchester, KY 69947-4142', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(35, 'Bradley Effertz', '17CSE497', 'kiarra46@example.net', '7830 Weissnat Rapid\nWest Vincenzashire, MN 83147-4325', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(36, 'Allison Morar', '17CSE25', 'natalie.dickens@example.com', '680 Gerlach Via\nPort Daryl, NY 48114-3937', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(37, 'Meda Davis', '17CSE150', 'helena19@example.com', '995 Halvorson Mews Suite 095\nNew Celineville, WV 12069', '2016-17', 1, 1, '2022-01-03 14:07:39', '2022-01-03 14:07:39'),
(39, 'Della Doyle IV', '17CSE129', 'durgan.donato@example.com', '643 Schneider Plains\nLake Reymundo, OH 37579-5627', '2016-17', 1, 1, '2022-01-03 14:08:10', '2022-01-03 14:08:10'),
(40, 'Prof. Enoch Schmidt III', '17CSE133', 'treva18@example.org', '861 Nienow Crest Suite 134\nPort Doris, WY 64705-8560', '2016-17', 1, 1, '2022-01-03 14:08:10', '2022-01-03 14:08:10'),
(41, 'Mr. Lambert Dickens', '17CSE244', 'tristian73@example.org', '34606 Harris Ramp Suite 137\nJeramiefurt, RI 99881', '2016-17', 1, 1, '2022-01-03 14:08:10', '2022-01-03 14:08:10'),
(42, 'Hilton Mante', '17CSE479', 'farrell.eugenia@example.com', '6479 Destany Hills\nPort Karenburgh, CA 61641-7530', '2016-17', 1, 1, '2022-01-03 14:08:10', '2022-01-03 14:08:10'),
(43, 'Cristina Gusikowski', '17CSE152', 'lavonne.cremin@example.org', '5264 Glover Coves Suite 380\nQueenieshire, FL 74847-4443', '2016-17', 1, 1, '2022-01-03 14:08:10', '2022-01-03 14:08:10'),
(44, 'Giovanna Hartmann', '17CSE228', 'antonette.wilkinson@example.com', '963 Kuhlman Light Apt. 168\nEstellfurt, NE 15860', '2016-17', 1, 1, '2022-01-03 14:08:10', '2022-01-03 14:08:10'),
(46, 'Mrs. Jada Erdman III', '17CSE10', 'ltowne@example.net', '825 Harvey Gateway\nHermistonchester, RI 30564', '2016-17', 1, 1, '2022-01-03 14:08:34', '2022-01-03 14:08:34'),
(47, 'Ivah Conroy', '17CSE24', 'gwiza@example.org', '71094 Greenholt Mountains Apt. 923\nPort Jordi, KY 53921-2267', '2016-17', 1, 1, '2022-01-03 14:08:34', '2022-01-03 14:08:34'),
(48, 'Mr. Jarvis Osinski', '17CSE50', 'qoconnell@example.net', '21206 Barbara Locks Apt. 062\nBreanabury, KS 97347-7924', '2016-17', 1, 1, '2022-01-03 14:08:34', '2022-01-03 14:08:34'),
(49, 'Ms. Brooklyn Rath', '17CSE38', 'audra84@example.net', '100 Strosin Lights\nPort Maevebury, OR 84882-2655', '2016-17', 1, 1, '2022-01-03 14:08:34', '2022-01-03 14:08:34'),
(50, 'Miss Mabel Hermiston', '17CSE37', 'hauck.hugh@example.org', '51091 Weissnat Junction Apt. 218\nWest Tanner, NC 82283-1817', '2016-17', 1, 1, '2022-01-03 14:08:34', '2022-01-03 14:08:34'),
(51, 'Judah Rempel', '17CSE35', 'kunde.monserrat@example.net', '15443 Boehm Courts Apt. 151\nWest Justinaport, NC 76756-6830', '2016-17', 1, 1, '2022-01-03 14:08:34', '2022-01-03 14:08:34'),
(52, 'Jacey Reinger MD', '17CSE43', 'sipes.colton@example.net', '7477 Lubowitz Lakes\nSchmidthaven, OR 50361', '2016-17', 1, 1, '2022-01-03 14:08:34', '2022-01-03 14:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attendance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `present` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `student_id`, `attendance_id`, `present`, `created_at`, `updated_at`) VALUES
(46, 1, 2, 1, NULL, '2022-01-04 09:27:50'),
(47, 4, 2, 1, NULL, '2022-01-04 09:29:22'),
(48, 5, 2, 1, NULL, '2022-01-04 09:29:22'),
(49, 6, 2, 0, NULL, NULL),
(50, 7, 2, 0, NULL, NULL),
(51, 8, 2, 1, NULL, '2022-01-04 09:29:24'),
(52, 9, 2, 0, NULL, NULL),
(53, 10, 2, 1, NULL, '2022-01-04 09:29:28'),
(54, 12, 2, 1, NULL, '2022-01-04 09:48:46'),
(55, 13, 2, 1, NULL, '2022-01-04 09:29:27'),
(56, 14, 2, 1, NULL, '2022-01-04 09:48:45'),
(57, 15, 2, 1, NULL, '2022-01-04 09:48:44'),
(58, 16, 2, 1, NULL, '2022-01-04 09:48:43'),
(59, 18, 2, 1, NULL, '2022-01-04 09:48:41'),
(60, 19, 2, 1, NULL, '2022-01-04 09:48:43'),
(61, 20, 2, 0, NULL, NULL),
(62, 21, 2, 0, NULL, NULL),
(63, 22, 2, 0, NULL, NULL),
(64, 24, 2, 0, NULL, NULL),
(65, 25, 2, 0, NULL, NULL),
(66, 26, 2, 0, NULL, NULL),
(67, 27, 2, 0, NULL, NULL),
(68, 28, 2, 0, NULL, NULL),
(69, 29, 2, 0, NULL, NULL),
(70, 30, 2, 0, NULL, NULL),
(71, 31, 2, 0, NULL, NULL),
(72, 32, 2, 0, NULL, NULL),
(73, 33, 2, 0, NULL, NULL),
(74, 34, 2, 0, NULL, NULL),
(75, 35, 2, 0, NULL, NULL),
(76, 36, 2, 0, NULL, NULL),
(77, 37, 2, 0, NULL, NULL),
(78, 39, 2, 0, NULL, NULL),
(79, 40, 2, 0, NULL, NULL),
(80, 41, 2, 0, NULL, NULL),
(81, 42, 2, 0, NULL, NULL),
(82, 43, 2, 0, NULL, NULL),
(83, 44, 2, 0, NULL, NULL),
(84, 46, 2, 0, NULL, NULL),
(85, 47, 2, 0, NULL, NULL),
(86, 48, 2, 0, NULL, NULL),
(87, 49, 2, 0, NULL, NULL),
(88, 50, 2, 0, NULL, NULL),
(89, 51, 2, 0, NULL, NULL),
(90, 52, 2, 0, NULL, NULL),
(91, 1, 3, 1, NULL, '2022-01-04 09:50:58'),
(92, 4, 3, 0, NULL, NULL),
(93, 5, 3, 1, NULL, '2022-01-04 09:50:57'),
(94, 6, 3, 0, NULL, NULL),
(95, 7, 3, 0, NULL, NULL),
(96, 8, 3, 0, NULL, NULL),
(97, 9, 3, 0, NULL, NULL),
(98, 10, 3, 0, NULL, NULL),
(99, 12, 3, 0, NULL, NULL),
(100, 13, 3, 0, NULL, NULL),
(101, 14, 3, 0, NULL, NULL),
(102, 15, 3, 1, NULL, '2022-01-04 09:50:55'),
(103, 16, 3, 0, NULL, NULL),
(104, 18, 3, 0, NULL, NULL),
(105, 19, 3, 0, NULL, NULL),
(106, 20, 3, 0, NULL, NULL),
(107, 21, 3, 0, NULL, NULL),
(108, 22, 3, 0, NULL, NULL),
(109, 24, 3, 0, NULL, NULL),
(110, 25, 3, 0, NULL, NULL),
(111, 26, 3, 0, NULL, NULL),
(112, 27, 3, 0, NULL, NULL),
(113, 28, 3, 1, NULL, '2022-01-04 09:50:52'),
(114, 29, 3, 0, NULL, NULL),
(115, 30, 3, 0, NULL, NULL),
(116, 31, 3, 0, NULL, NULL),
(117, 32, 3, 1, NULL, '2022-01-04 09:50:53'),
(118, 33, 3, 0, NULL, NULL),
(119, 34, 3, 0, NULL, NULL),
(120, 35, 3, 0, NULL, NULL),
(121, 36, 3, 0, NULL, NULL),
(122, 37, 3, 0, NULL, NULL),
(123, 39, 3, 0, NULL, NULL),
(124, 40, 3, 0, NULL, NULL),
(125, 41, 3, 0, NULL, NULL),
(126, 42, 3, 0, NULL, NULL),
(127, 43, 3, 0, NULL, NULL),
(128, 44, 3, 0, NULL, NULL),
(129, 46, 3, 0, NULL, NULL),
(130, 47, 3, 0, NULL, NULL),
(131, 48, 3, 0, NULL, NULL),
(132, 49, 3, 0, NULL, NULL),
(133, 50, 3, 0, NULL, NULL),
(134, 51, 3, 0, NULL, NULL),
(135, 52, 3, 0, NULL, NULL),
(136, 1, 4, 1, NULL, NULL),
(137, 4, 4, 1, NULL, NULL),
(138, 5, 4, 1, NULL, NULL),
(139, 6, 4, 1, NULL, NULL),
(140, 7, 4, 1, NULL, NULL),
(141, 8, 4, 1, NULL, NULL),
(142, 9, 4, 1, NULL, NULL),
(143, 10, 4, 1, NULL, NULL),
(144, 12, 4, 1, NULL, NULL),
(145, 13, 4, 1, NULL, NULL),
(146, 14, 4, 1, NULL, NULL),
(147, 15, 4, 1, NULL, NULL),
(148, 16, 4, 1, NULL, NULL),
(149, 18, 4, 1, NULL, NULL),
(150, 19, 4, 1, NULL, NULL),
(151, 20, 4, 1, NULL, NULL),
(152, 21, 4, 1, NULL, NULL),
(153, 22, 4, 1, NULL, NULL),
(154, 24, 4, 1, NULL, NULL),
(155, 25, 4, 1, NULL, NULL),
(156, 26, 4, 1, NULL, NULL),
(157, 27, 4, 1, NULL, NULL),
(158, 28, 4, 1, NULL, NULL),
(159, 29, 4, 1, NULL, NULL),
(160, 30, 4, 1, NULL, NULL),
(161, 31, 4, 1, NULL, NULL),
(162, 32, 4, 1, NULL, NULL),
(163, 33, 4, 1, NULL, NULL),
(164, 34, 4, 1, NULL, NULL),
(165, 35, 4, 1, NULL, NULL),
(166, 36, 4, 1, NULL, NULL),
(167, 37, 4, 1, NULL, NULL),
(168, 39, 4, 1, NULL, NULL),
(169, 40, 4, 1, NULL, NULL),
(170, 41, 4, 1, NULL, NULL),
(171, 42, 4, 1, NULL, NULL),
(172, 43, 4, 1, NULL, NULL),
(173, 44, 4, 1, NULL, NULL),
(174, 46, 4, 1, NULL, NULL),
(175, 47, 4, 1, NULL, NULL),
(176, 48, 4, 1, NULL, NULL),
(177, 49, 4, 1, NULL, NULL),
(178, 50, 4, 1, NULL, NULL),
(179, 51, 4, 1, NULL, NULL),
(180, 52, 4, 1, NULL, NULL),
(181, 1, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:04'),
(182, 4, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(183, 5, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(184, 6, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(185, 7, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(186, 8, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:02'),
(187, 9, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:01'),
(188, 10, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(189, 12, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(190, 13, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:20'),
(191, 14, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(192, 15, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(193, 16, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(194, 18, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(195, 19, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:18'),
(196, 20, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(197, 21, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(198, 22, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(199, 24, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(200, 25, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:17'),
(201, 26, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(202, 27, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(203, 28, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(204, 29, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:16'),
(205, 30, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(206, 31, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(207, 32, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(208, 33, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(209, 34, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:14'),
(210, 35, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(211, 36, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(212, 37, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(213, 39, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(214, 40, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(215, 41, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(216, 42, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(217, 43, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(218, 44, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:12'),
(219, 46, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(220, 47, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:11'),
(221, 48, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:10'),
(222, 49, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(223, 50, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54'),
(224, 51, 5, 0, '2022-01-27 07:04:54', '2022-01-27 07:05:09'),
(225, 52, 5, 1, '2022-01-27 07:04:54', '2022-01-27 07:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `test1s`
--

CREATE TABLE `test1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_panels`
--

CREATE TABLE `user_panels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panels`
--
ALTER TABLE `admin_panels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_department_id_foreign` (`department_id`),
  ADD KEY `attendances_batch_id_foreign` (`batch_id`),
  ADD KEY `attendances_course_id_foreign` (`course_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batches_department_id_foreign` (`department_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grows`
--
ALTER TABLE `grows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meetings_host_id_foreign` (`host_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participants_teacher_id_foreign` (`teacher_id`),
  ADD KEY `participants_meeting_id_foreign` (`meeting_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_roll_unique` (`roll`),
  ADD KEY `students_department_id_foreign` (`department_id`),
  ADD KEY `students_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attendance_student_id_foreign` (`student_id`),
  ADD KEY `student_attendance_attendance_id_foreign` (`attendance_id`);

--
-- Indexes for table `test1s`
--
ALTER TABLE `test1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_panels`
--
ALTER TABLE `user_panels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panels`
--
ALTER TABLE `admin_panels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grows`
--
ALTER TABLE `grows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `test1s`
--
ALTER TABLE `test1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_panels`
--
ALTER TABLE `user_panels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_host_id_foreign` FOREIGN KEY (`host_id`) REFERENCES `admin_panels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_meeting_id_foreign` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participants_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `admin_panels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_attendance_id_foreign` FOREIGN KEY (`attendance_id`) REFERENCES `attendances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_attendance_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
