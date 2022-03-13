-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 07:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `user_id`, `card`, `personal_card`, `recept`, `created_at`, `updated_at`, `cost`) VALUES
(8, 8, 'teeth/alternatives/9W0lBF4t2dO306QxIipOOjqfaXHsFriz7XVrTDBp.jpg', 'teeth/alternatives/CGRI6Wk1jb2dD8VzTiaRHklYH1towtAVjyqCPK8Q.jpg', 'teeth/alternatives/OjqRB6guzWBpusagaiasIbV7mui21peNwsv6Fuk0.jpg', '2022-03-06 16:04:45', '2022-03-06 16:04:45', 'teeth/alternatives/JTebaOYxfJ5CwdpuMk1QNcXlxXljAVAmvuGQg2XM.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clinicscerts`
--

CREATE TABLE `clinicscerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engineer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `police_certificae` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wedding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultantcards`
--

CREATE TABLE `consultantcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temporary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationfees`
--

CREATE TABLE `educationfees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evictioncerts`
--

CREATE TABLE `evictioncerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `health` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attorney` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiencecerts`
--

CREATE TABLE `experiencecerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `License` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recruitment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assignment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movements` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(34, '2014_09_16_235819_create_unions_table', 1),
(35, '2014_09_17_000042_create_roles_table', 1),
(36, '2014_10_12_000000_create_users_table', 1),
(37, '2014_10_12_100000_create_password_resets_table', 1),
(38, '2019_08_19_000000_create_failed_jobs_table', 1),
(39, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(40, '2022_02_17_000139_create_services_table', 1),
(41, '2022_02_17_000425_create_service_user_table', 1),
(42, '2022_02_17_000740_create_user_user_table', 1),
(43, '2022_02_17_000913_create_union_service_table', 1),
(44, '2022_02_17_001406_create_renewals_table', 1),
(45, '2022_02_17_001450_create_alternatives_table', 1),
(46, '2022_02_17_002035_create_treatments_table', 1),
(47, '2022_02_17_002557_create_educationfees_table', 1),
(48, '2022_02_17_002640_create_diseases_table', 1),
(49, '2022_02_17_002709_create_conditions_table', 1),
(50, '2022_02_17_002842_create_noworks_table', 1),
(51, '2022_02_17_003148_create_evictioncerts_table', 1),
(52, '2022_02_17_003214_create_experiencecerts_table', 1),
(53, '2022_02_17_003322_create_clinicscerts_table', 1),
(54, '2022_02_17_003401_create_recruitments_table', 1),
(55, '2022_02_17_114318_create_consultantcards_table', 1),
(56, '2022_02_17_114439_create_specialistcards_table', 1),
(57, '2022_02_17_114518_create_professionlicenses_table', 1),
(58, '2022_02_17_114544_create_privateclinics_table', 1),
(59, '2022_02_17_114632_create_specialiststables_table', 1),
(60, '2022_02_17_114714_create_professionlicens_table', 1),
(61, '2022_02_17_232354_rename_name_in_services_table', 2),
(62, '2022_02_17_233229_add_namear_to_services_table', 3),
(63, '2022_02_19_160150_change_union_service_table_name', 4),
(64, '2022_02_19_161258_change_unions_services_table_name', 5),
(65, '2022_02_20_120943_rename_union_service_table', 6),
(66, '2022_02_20_123146_create_union_services_table', 7),
(67, '2022_02_20_125910_rename_union_services_table', 8),
(68, '2022_02_21_145012_add_user_id_to_renewals_table', 9),
(69, '2022_02_21_145812_add_user_id_to_alternatives_table', 10),
(70, '2022_02_21_145847_add_user_id_to_treatments_table', 10),
(71, '2022_02_21_181625_remove_id_row_service_colum_from_service_user_table', 11),
(72, '2022_02_22_205910_drop_user_user_table', 12),
(73, '2022_02_22_210006_create_user_user_table', 12),
(74, '2022_03_01_192233_add_union_num_to_users_table', 13),
(75, '2022_03_02_165508_add_union_number_to_users_table', 14),
(76, '2022_03_04_140633_add_cost_to_clinicscerts_table', 15),
(77, '2022_03_04_140718_add_cost_to_alternatives_table', 15),
(78, '2022_03_04_140733_add_cost_to_conditions_table', 15),
(79, '2022_03_04_140746_add_cost_to_consultantcards_table', 15),
(80, '2022_03_04_140802_add_cost_to_diseases_table', 15),
(81, '2022_03_04_140818_add_cost_to_educationfees_table', 15),
(82, '2022_03_04_140834_add_cost_to_evictioncerts_table', 15),
(83, '2022_03_04_140904_add_cost_to_experiencecerts_table', 15),
(84, '2022_03_04_140921_add_cost_to_failed_jobs_table', 15),
(85, '2022_03_04_140952_add_cost_to_noworks_table', 15),
(86, '2022_03_04_141104_add_cost_to_privateclinics_table', 15),
(87, '2022_03_04_141121_add_cost_to_professionlicens_table', 15),
(88, '2022_03_04_141134_add_cost_to_professionlicenses_table', 15),
(89, '2022_03_04_141148_add_cost_to_recruitments_table', 15),
(90, '2022_03_04_141201_add_cost_to_renewals_table', 15),
(91, '2022_03_04_141223_add_cost_to_specialistcards_table', 15),
(92, '2022_03_04_141245_add_cost_to_treatments_table', 15),
(93, '2022_03_04_141302_add_cost_to_specialiststables_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `noworks`
--

CREATE TABLE `noworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disclaimer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fulltime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ministry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endServ` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privateclinics`
--

CREATE TABLE `privateclinics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professionlicens`
--

CREATE TABLE `professionlicens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professionlicenses`
--

CREATE TABLE `professionlicenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `graduation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excellence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fesh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitments`
--

CREATE TABLE `recruitments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recruitment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `army_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `renewals`
--

CREATE TABLE `renewals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renewals`
--

INSERT INTO `renewals` (`id`, `card`, `personal_card`, `user_id`, `created_at`, `updated_at`, `cost`) VALUES
(3, 'teeth/renewals/upqTnVEjWDWHcrKZ3pScH5Is9QsI7NxlF2pY8siB.jpg', 'teeth/renewals/Dc9p3EKy7AZlRdVr50hubGVbWkl2Ps1Il9JmPqoe.jpg', 8, '2022-03-06 16:08:16', '2022-03-06 16:08:16', 'teeth/renewals/f5jQM8C4mS6TtYnLUGkvHnxa3snIAdGfmsNllAs2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2022-02-17 21:01:04', '2022-02-17 21:01:04'),
(2, 'admin', '2022-02-17 21:01:04', '2022-02-17 21:01:04'),
(3, 'member', '2022-02-17 21:01:04', '2022-02-17 21:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nameen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `nameen`, `namear`, `created_at`, `updated_at`) VALUES
(1, 'renewals', 'تجديد العضوية', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(2, 'alternatives', 'استخراج بدل فائد للكارنية', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(3, 'treatments', 'اعانة العلاج الشهري', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(4, 'educationfees', 'اعانة رسوم التعليم', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(5, 'diseases', 'اعانة الامراض المزمنة', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(6, 'conditions', 'اعانة ظروف حبس احتياطي', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(7, 'noworks', 'القيد بجدول غير المشتغلين', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(8, 'evictioncerts', 'استخراج شهادة إخلاء طرف', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(9, 'experiencecerts', 'استخراج شهادة خبرة من إدارة الصيدلة', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(10, 'clinicscerts', 'القيد بسجل العيادات البيطرية', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(11, 'recruitments', 'اعانة تجنيد', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(12, 'consultantcards', 'استخراج كارنية استشاري', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(13, 'specialistcards', 'استخراج كارنية أخصائي', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(14, 'professionlicenses', 'استخراج ترخيص مزاولة المهنة', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(15, 'privateclinics', 'تسجيل عيادة خاصة', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(16, 'specialiststables', 'القيد بجدول االخصائيين', '2022-02-17 21:59:03', '2022-02-17 21:59:03'),
(17, 'professionlicens', 'استخراج ترخيص مزاولة المهنة', '2022-02-17 21:59:03', '2022-02-17 21:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `service_user`
--

CREATE TABLE `service_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialistcards`
--

CREATE TABLE `specialistcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialiststables`
--

CREATE TABLE `specialiststables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fellowship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Professional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `user_id`, `report`, `personal_card`, `receipt`, `created_at`, `updated_at`, `cost`) VALUES
(4, 8, 'teeth/treatments/yseH5gwllm2Iv7rpD5jCxg6Yyn9ECHX7QkGcH8nY.jpg', 'teeth/treatments/cKlXb5lSHdF51UxBHy8YU3orw2GpB01YgrpQM01u.jpg', 'teeth/treatments/abBuk9yrDzoeduroEgyNkNlsLVJT8tyV3ouwwKq4.jpg', '2022-03-06 16:08:33', '2022-03-06 16:08:33', 'teeth/treatments/DNwd1p8s5aawabBnAgsO75gPNkV3gUmSp7KX27kh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE `unions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unions`
--

INSERT INTO `unions` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'الصيدلة', '01012547812', '2022-02-17 21:11:54', '2022-02-17 21:11:54'),
(2, 'الاسنان', '01123456789', '2022-02-17 21:11:54', '2022-02-17 21:11:54'),
(3, 'طب بشري', '01231549678', '2022-02-17 21:11:54', '2022-02-17 21:11:54'),
(4, 'طب بطري', '01312461845', '2022-02-17 21:11:54', '2022-02-17 21:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `union_service`
--

CREATE TABLE `union_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_cost` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `union_service`
--

INSERT INTO `union_service` (`id`, `union_id`, `service_id`, `service_cost`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1000.00, NULL, NULL),
(2, 2, 1, 1000.00, NULL, NULL),
(3, 3, 1, 1000.00, NULL, NULL),
(4, 4, 1, 1000.00, NULL, NULL),
(5, 1, 2, 1000.00, NULL, NULL),
(6, 2, 2, 1000.00, NULL, NULL),
(7, 3, 2, 1000.00, NULL, NULL),
(8, 4, 2, 1000.00, NULL, NULL),
(9, 1, 3, 1000.00, NULL, NULL),
(10, 2, 3, 1000.00, NULL, NULL),
(11, 3, 3, 1000.00, NULL, NULL),
(12, 4, 3, 1000.00, NULL, NULL),
(13, 1, 4, 1000.00, NULL, NULL),
(14, 2, 4, 1000.00, NULL, NULL),
(15, 3, 4, 1000.00, NULL, NULL),
(16, 4, 4, 1000.00, NULL, NULL),
(17, 1, 5, 1000.00, NULL, NULL),
(18, 2, 5, 1000.00, NULL, NULL),
(19, 3, 5, 1000.00, NULL, NULL),
(20, 4, 5, 1000.00, NULL, NULL),
(21, 1, 6, 1000.00, NULL, NULL),
(22, 2, 6, 1000.00, NULL, NULL),
(23, 3, 6, 1000.00, NULL, NULL),
(24, 4, 6, 1000.00, NULL, NULL),
(27, 1, 8, 1000.00, NULL, NULL),
(28, 1, 9, 1000.00, NULL, NULL),
(29, 4, 10, 1000.00, NULL, NULL),
(30, 1, 11, 1000.00, NULL, NULL),
(31, 2, 11, 1000.00, NULL, NULL),
(32, 3, 11, 1000.00, NULL, NULL),
(33, 4, 11, 1000.00, NULL, NULL),
(34, 3, 12, 0.00, NULL, NULL),
(36, 1, 8, 2000.00, NULL, NULL),
(37, 4, 7, 1000.00, NULL, NULL),
(38, 3, 13, 1000.00, NULL, NULL),
(39, 2, 14, 1000.00, NULL, NULL),
(40, 3, 15, 1000.00, NULL, NULL),
(41, 4, 16, 1000.00, NULL, NULL),
(42, 1, 17, 1000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ssn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `union_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `union_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `ssn`, `phone`, `sex`, `union_number`, `union_id`, `role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'عصام حمدي العجمي', 'essam@gmail.com', '$2y$10$cR9e28paBrYX3zBgrpIyhukkp6dfMAoqWP5ZfdDacH1bzj/mBr5OK', '0101277772', '0101999999', 'male', NULL, 1, 1, NULL, NULL, '2022-03-02 15:15:00', '2022-03-02 15:15:00'),
(2, 'عبد الهادي مصطفي', 'abdo@gmail.com', '$2y$10$w9My2mjxQdRYpGU244PK3uykT0EipJjyqf2JHdb.Gs76XhFu0J6Re', '12124545', '01741547812', 'male', NULL, 2, 1, NULL, NULL, '2022-03-02 15:15:00', '2022-03-02 15:15:00'),
(3, 'عزت صادق', 'ezat@gmail.com', '$2y$10$ufO3pV9aydAJK9IT9Efa6uz7KRpfEpYgGPXv.dAQZNT.F1XX6kk56', '01013217812', '01013211812', 'male', NULL, 3, 1, NULL, NULL, '2022-03-02 15:15:01', '2022-03-02 15:15:01'),
(4, 'احمد زيان', 'ahmed@gmail.com', '$2y$10$szoWS2XsMYfsFMhkGFTt5ueKppdueiCtZ26CT6EUwHGr7LCDhO/hS', '755552775', '010125841812', 'male', NULL, 4, 1, NULL, NULL, '2022-03-02 15:15:01', '2022-03-02 15:15:01'),
(5, 'ميار احمد', 'mayar@GMAIL.COM', '$2y$10$SdE51kFtJWdLXcbOlhO4Z.aMMpcTLIqX64VnQEI1uZ7XxqcW3LPoS', '121212', '010111111', 'male', NULL, 1, 2, NULL, NULL, '2022-03-02 15:18:33', '2022-03-02 15:18:33'),
(6, 'حمدي محمد', 'hamdy@GMAIL.COM', '$2y$10$loZ0L5Kicw2zxgfDhSYG1u21sjF658isbI5c3drnCLes.mLvkDtvC', '45454', '8888888', 'male', '999999', 1, 3, NULL, NULL, '2022-03-02 15:21:59', '2022-03-02 15:24:15'),
(7, 'ارسراء', 'esraa@GMAIL.COM', '$2y$10$iEteG1NaP4rDVT3CQ64Df.z9CmIxlFx/ivOiyTCIvCOChVnxmDprm', '10210210', '120120120', 'female', NULL, 2, 2, NULL, NULL, '2022-03-06 14:51:14', '2022-03-06 14:51:14'),
(8, 'خالد محمد', 'khaled@GMAIL.COM', '$2y$10$ytR4zCG..gxeekkxQEZueOEGG8CyycBRF21ba0UlSpC/cF2AEcH4C', '7777777777', '7777777777', 'male', '7777777777', 2, 3, NULL, NULL, '2022-03-06 14:53:57', '2022-03-06 14:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_user`
--

CREATE TABLE `user_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user1_id` bigint(20) UNSIGNED NOT NULL,
  `user2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT 'جاري مراجعة البيانات',
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT 'جاري مراجعة البيانات',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_user`
--

INSERT INTO `user_user` (`id`, `user1_id`, `user2_id`, `service_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(44, 8, NULL, 2, 'جاري مراجعة البيانات', 'جاري مراجعة البيانات', '2022-03-06 16:04:45', '2022-03-06 16:04:45'),
(45, 8, NULL, 1, 'جاري مراجعة البيانات', 'جاري مراجعة البيانات', '2022-03-06 16:08:16', '2022-03-06 16:08:16'),
(46, 8, NULL, 3, 'جاري مراجعة البيانات', 'جاري مراجعة البيانات', '2022-03-06 16:08:33', '2022-03-06 16:08:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_user_id_foreign` (`user_id`);

--
-- Indexes for table `clinicscerts`
--
ALTER TABLE `clinicscerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultantcards`
--
ALTER TABLE `consultantcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationfees`
--
ALTER TABLE `educationfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evictioncerts`
--
ALTER TABLE `evictioncerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiencecerts`
--
ALTER TABLE `experiencecerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noworks`
--
ALTER TABLE `noworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privateclinics`
--
ALTER TABLE `privateclinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professionlicens`
--
ALTER TABLE `professionlicens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professionlicenses`
--
ALTER TABLE `professionlicenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renewals`
--
ALTER TABLE `renewals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `renewals_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_user`
--
ALTER TABLE `service_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_user_user_id_foreign` (`user_id`),
  ADD KEY `service_user_service_id_foreign` (`service_id`);

--
-- Indexes for table `specialistcards`
--
ALTER TABLE `specialistcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialiststables`
--
ALTER TABLE `specialiststables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `treatments_user_id_foreign` (`user_id`);

--
-- Indexes for table `unions`
--
ALTER TABLE `unions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `union_service`
--
ALTER TABLE `union_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `union_services_union_id_foreign` (`union_id`),
  ADD KEY `union_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_ssn_unique` (`ssn`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_union_id_foreign` (`union_id`);

--
-- Indexes for table `user_user`
--
ALTER TABLE `user_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_user_user1_id_foreign` (`user1_id`),
  ADD KEY `user_user_user2_id_foreign` (`user2_id`),
  ADD KEY `user_user_service_id_foreign` (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clinicscerts`
--
ALTER TABLE `clinicscerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultantcards`
--
ALTER TABLE `consultantcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationfees`
--
ALTER TABLE `educationfees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evictioncerts`
--
ALTER TABLE `evictioncerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiencecerts`
--
ALTER TABLE `experiencecerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `noworks`
--
ALTER TABLE `noworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privateclinics`
--
ALTER TABLE `privateclinics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professionlicens`
--
ALTER TABLE `professionlicens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professionlicenses`
--
ALTER TABLE `professionlicenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `renewals`
--
ALTER TABLE `renewals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service_user`
--
ALTER TABLE `service_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialistcards`
--
ALTER TABLE `specialistcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialiststables`
--
ALTER TABLE `specialiststables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unions`
--
ALTER TABLE `unions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `union_service`
--
ALTER TABLE `union_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_user`
--
ALTER TABLE `user_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `renewals`
--
ALTER TABLE `renewals`
  ADD CONSTRAINT `renewals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_user`
--
ALTER TABLE `service_user`
  ADD CONSTRAINT `service_user_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `service_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `union_service`
--
ALTER TABLE `union_service`
  ADD CONSTRAINT `union_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `union_services_union_id_foreign` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_union_id_foreign` FOREIGN KEY (`union_id`) REFERENCES `unions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_user`
--
ALTER TABLE `user_user`
  ADD CONSTRAINT `user_user_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_user_user1_id_foreign` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_user_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
