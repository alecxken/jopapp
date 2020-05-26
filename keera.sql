-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 08:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keera`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `applicants_views`
-- (See below for the actual view)
--
CREATE TABLE `applicants_views` (
`title` varchar(255)
,`num` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `creterias`
--

CREATE TABLE `creterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cert_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cert_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cert_samples` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `memb_state` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `memb_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `memb_samples` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_edu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu_field` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sample_edu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creterias`
--

INSERT INTO `creterias` (`id`, `ref_token`, `cert_state`, `cert_body`, `cert_samples`, `memb_state`, `memb_body`, `memb_samples`, `state_edu`, `edu_field`, `sample_edu`, `created_at`, `updated_at`) VALUES
(1, 'KURA-YFE0W-2020-APR', 'Yes', 'cla', 'leadership', 'Yes', 'Institution of Engineers of Kenya (IEK)', 'iek', 'Yes', 'Doctorate,Masters', 'Bachelor’s  degree  in  Civil  Engineering', '2020-04-16 04:52:31', '2020-04-16 04:52:31'),
(2, 'KURA-8SN94-2020-APR', 'Yes', 'cpak', 'cpa', 'Yes', 'Institution of Engineers of Kenya (IEK)', 'iek', 'Yes', 'Doctorate,Advanced/Higher Diploma', 'Bachelor’s  degree  in  Civil  Engineering', '2020-04-18 21:05:42', '2020-04-18 21:05:42'),
(3, 'KURA-IROE0-2020-APR', 'Yes', 'cpak', 'cpa', 'Yes', 'Institution of Engineers of Kenya (IEK)', 'iek', 'Yes', 'Doctorate,Advanced/Higher Diploma', 'Bachelor’s  degree  in  Civil  Engineering', '2020-04-18 21:06:03', '2020-04-18 21:06:03'),
(4, 'KURA-FPHPH-2020-MAY', 'Yes', 'cpak', 'leadership', 'Yes', 'Institution of Engineers of Kenya (IEK)', 'iek', 'Yes', 'Masters,Advanced/Higher Diploma', 'Bachelor’s  degree  in  Civil  Engineering', '2020-05-25 14:18:28', '2020-05-25 14:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobapps`
--

CREATE TABLE `jobapps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobapps`
--

INSERT INTO `jobapps` (`id`, `token`, `ref_token`, `app_date`, `app_status`, `app_email`, `app_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AP-MXK5O-2020-APR', 'KURA-YFE0W-2020-APR', '2020-04-16 00:00:00', 'Complete', 'alecxkendagor@gmail.com', '1', 'Success', '2020-04-16 16:01:11', '2020-04-18 11:30:09'),
(2, 'AP-8T25N-2020-APR', 'KURA-IROE0-2020-APR', '2020-05-23 00:00:00', 'Pending', 'alecxkendagor@gmail.com', '1', 'Success', '2020-04-19 15:30:21', '2020-05-23 15:19:38'),
(3, 'AP-WPLTN-2020-MAY', 'KURA-FPHPH-2020-MAY', '2020-05-25 00:00:00', 'Pending', 'alecxkendagor@gmail.com', 'alecxkendagor@gmail.com', 'Success', '2020-05-25 14:18:54', '2020-05-25 16:09:52'),
(4, 'AP-ZCBPI-2020-MAY', 'AP-ZCBPI-2020-MAY', '2020-05-25 00:00:00', 'Pending', 'festuskipsang@gmail.com', 'festuskipsang@gmail.com', 'Success', '2020-05-25 16:00:26', '2020-05-25 16:00:26'),
(5, 'AP-ZCBPI-2020-MAY', 'AP-ZCBPI-2020-MAY', '2020-05-25 00:00:00', 'Pending', 'festuskipsang@gmail.com', 'festuskipsang@gmail.com', 'Success', '2020-05-25 16:01:16', '2020-05-25 16:01:16'),
(6, 'AP-ZCBPI-2020-MAY', 'AP-ZCBPI-2020-MAY', '2020-05-25 00:00:00', 'Pending', 'festuskipsang@gmail.com', 'festuskipsang@gmail.com', 'Success', '2020-05-25 16:01:57', '2020-05-25 16:01:57'),
(7, 'AP-VDWFY-2020-MAY', 'AP-ZCBPI-2020-MAY', '2020-05-25 00:00:00', 'Pending', 'alecxkendagor@gmail.com', '1', 'Success', '2020-05-25 16:20:13', '2020-05-25 16:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(170) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `token`, `prefix`, `title`, `responsibility`, `requirements`, `qualification`, `file`, `deadline`, `applicants`, `status`, `created_at`, `updated_at`) VALUES
(5, 'KURA-YFE0W-2020-APR', NULL, 'DIRECTOR, URBAN ROADS DEVELOPMENT   (JG 2)', 'a)  Overseeing preparation of short, medium and long term road works programmes;\r\nb)  Coordination of preliminary and detailed engineering road designs;\r\nc) Oversee the preparation of preliminary and detailed engineering designs of road structures;\r\nd)  Coordinating preparation and finalization of road works tender;\r\ne)  Overseeing preparation of procurement plans for road work programmes;\r\nf)   Liaising with external financing agencies for resource mobilization;\r\ng)  Reviewing standards and specifications for road works;\r\nh)  Supervision of roads and structures works contracts;\r\ni)   Coordinating preparation of directorate budget;\r\nj)   Ensuring expenditure controls and measures within the directorate;\r\nk)  Facilitating resource mobilization from government and development partners;\r\nl)   Facilitating resource mobilization through public private partnerships;\r\nm) Enhancing efficiency in utilization of financial resources;\r\nn)  Enhancing knowledge transfer and capacity building by encouraging partnership of foreign consultants and contractors with local firms in undertaking projects/consultancies;\r\no)  Building capacity of young professional graduates through internship in projects;\r\np)  Undertaking regular road safety audits during road development\r\nq)  Overall responsibility for implementation of the directorate strategic objectives; and building the capacity of staff and managing performance.', 'Have a minimum of twelve (12) years’ experience in relevant work and at least five (5) years in a management role in the Public Service or in the Private Sector;;Have  a  Bachelor’s  degree  in  Civil  Engineering  or  equivalent  qualification  from  a recognized institution.', '8', '1587023551.pdf', '2020-04-30', '0', 'Active', '2020-04-16 04:52:31', '2020-04-16 04:52:31'),
(6, 'KURA-IROE0-2020-APR', NULL, 'Personal Development', 'test', 'masters', '3', '1587254763.vsdx', '2020-04-28', '0', 'Active', '2020-04-18 21:06:03', '2020-04-18 21:06:03'),
(7, 'KURA-FPHPH-2020-MAY', NULL, 'URBAN ROADS DEVELOPMENT (JG 2) - REF: KURA/URD/D/19/1 – (1 POST)', 'test', 'masters', '3', '1590427108.docx', '2020-05-26', '0', 'Active', '2020-05-25 14:18:28', '2020-05-25 14:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `kura_attachments`
--

CREATE TABLE `kura_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kura_attachments`
--

INSERT INTO `kura_attachments` (`id`, `token`, `type`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AP-MXK5O-2020-APR', 'CV', 'AP-MXK5O-2020-APR-CV-1587220208.pdf', NULL, '2020-04-18 11:30:08', '2020-04-18 11:30:08'),
(2, 'AP-MXK5O-2020-APR', 'Support', '1587220209-SUPPORT-AP-MXK5O-2020-APR.pdf;1587220209-SUPPORT-AP-MXK5O-2020-APR.pdf', NULL, '2020-04-18 11:30:09', '2020-04-18 11:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `kura_certs`
--

CREATE TABLE `kura_certs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cert` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kura_certs`
--

INSERT INTO `kura_certs` (`id`, `token`, `cert`, `institution`, `year`, `marks`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'AP-MXK5O-2020-APR', 'CPA1', 'STRATHMORE', '2020', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kura_education`
--

CREATE TABLE `kura_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cert1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kura_education`
--

INSERT INTO `kura_education` (`id`, `token`, `edu`, `cert1`, `institution1`, `year1`, `marks`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'AP-MXK5O-2020-APR', 'Masters', 'tHEOLOGY', 'STRATHMORE', '2020', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kura_employers`
--

CREATE TABLE `kura_employers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kura_employers`
--

INSERT INTO `kura_employers` (`id`, `token`, `employer`, `position`, `from`, `to`, `contact_person`, `status`, `exp`, `created_at`, `updated_at`) VALUES
(1, 'AP-MXK5O-2020-APR', 'serf', 'tech', '2020-04-20', '2020-04-22', 'hhh', NULL, NULL, NULL, NULL),
(2, 'AP-MXK5O-2020-APR', 'serf', 'tech', '2020-04-20', '2020-04-22', 'hhh', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kura_memberships`
--

CREATE TABLE `kura_memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membno` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kura_memberships`
--

INSERT INTO `kura_memberships` (`id`, `token`, `member`, `body`, `membno`, `marks`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'AP-MXK5O-2020-APR', 'Engineering Board of EK', 'IEK', '526262', NULL, NULL, NULL, NULL),
(2, 'AP-MXK5O-2020-APR', 'TEST2', 'TESY', '6367337', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kura_others`
--

CREATE TABLE `kura_others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `training` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cert2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kura_referees`
--

CREATE TABLE `kura_referees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_position` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kura_referees`
--

INSERT INTO `kura_referees` (`id`, `token`, `ref_name`, `ref_company`, `ref_position`, `ref_email`, `ref_phone`, `created_at`, `updated_at`) VALUES
(1, 'AP-MXK5O-2020-APR', 'Festus Kipsang', 'wanafunzi', 'tom', 'festuskipsang@gmail.com', '0722744347', NULL, NULL),
(2, 'AP-MXK5O-2020-APR', 'Festus Kipsang', 'wanafunzi', 'tom', 'festuskipsang@gmail.com', '0722744347', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kura_skills`
--

CREATE TABLE `kura_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kurra_apps`
--

CREATE TABLE `kurra_apps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disabled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurra_apps`
--

INSERT INTO `kurra_apps` (`id`, `token`, `title`, `fname`, `lname`, `oname`, `po_box`, `postal_code`, `phone_no`, `email`, `dob`, `gender`, `passport`, `county`, `district`, `is_disabled`, `disability`, `created_at`, `updated_at`) VALUES
(2, 'AP-MXK5O-2020-APR', 'Mr', 'alex', 'bett', 'kendagor', '20152', '20152', '0718392279', 'alecxkendagor@gmail.com', '1995-04-30', 'Male', '32308939', 'Nairobi', 'Molo', 'No', NULL, '2020-04-16 16:02:03', '2020-04-16 16:02:03'),
(3, 'AP-ZCBPI-2020-MAY', 'Mrs', 'Festus', 'Kipsang', 'kendagor', '20152', '00100', '0722744347', 'festuskipsang@gmail.com', '2020-05-19', 'Male', '32308939', 'Machakos', 'Molo', 'No', 'sww', '2020-05-25 16:00:27', '2020-05-25 16:00:27'),
(4, 'AP-4Z59W-2020-MAY', 'Mr', 'alex', 'bett', 'kendagor', '20152', '20152', '722744347', 'alecxkendagor@gmail.com', '2020-05-26', 'Female', '32308939', 'Nairobi', 'Molo', 'No', 'sww', '2020-05-25 16:09:52', '2020-05-25 16:09:52');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_04_02_190916_create_jobs_table', 1),
(9, '2020_04_04_070301_create_jobapps_table', 2),
(19, '2020_04_04_104113_create_kurra_apps_table', 3),
(20, '2020_04_16_053425_create_creterias_table', 3),
(21, '2020_04_16_053455_create_requireds_table', 3),
(22, '2020_04_16_144659_create_kura_education_table', 4),
(23, '2020_04_16_144734_create_kura_certs_table', 4),
(24, '2020_04_16_144746_create_kura_memberships_table', 4),
(25, '2020_04_16_144800_create_kura_skills_table', 4),
(26, '2020_04_16_144811_create_kura_referees_table', 4),
(27, '2020_04_16_152932_create_kura_others_table', 4),
(28, '2020_04_17_043157_create_kura_employers_table', 5),
(29, '2020_04_17_043315_create_kura_attachments_table', 5),
(30, '2020_04_18_230717_create_applicants_views_table', 6);

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
-- Table structure for table `requireds`
--

CREATE TABLE `requireds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requireds`
--

INSERT INTO `requireds` (`id`, `ref_token`, `requirement`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KURA-YFE0W-2020-APR', 'Have a minimum of twelve (12) years’ experience in relevant work and at least five (5) years in a management role in the Public Service or in the Private Sector;', 'ok', NULL, NULL),
(2, 'KURA-YFE0W-2020-APR', 'Have  a  Bachelor’s  degree  in  Civil  Engineering  or  equivalent  qualification  from  a recognized institution.', 'ok', NULL, NULL),
(3, 'KURA-IROE0-2020-APR', 'masters', 'ok', NULL, NULL),
(4, 'KURA-FPHPH-2020-MAY', 'masters', 'ok', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alex bett', 'alecxkendagor@gmail.com', NULL, '1', '$2y$10$wgI0xij7bvD0UYnD8b9dKeICTfPkluBAXS.Lu9hM4RlXdKnXo7BbK', NULL, '2020-04-02 16:31:51', '2020-04-02 16:31:51');

-- --------------------------------------------------------

--
-- Structure for view `applicants_views`
--
DROP TABLE IF EXISTS `applicants_views`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applicants_views`  AS  select `a`.`title` AS `title`,count(`b`.`token`) AS `num` from (`jobs` `a` left join `jobapps` `b` on(`b`.`ref_token` = `a`.`token`)) group by `a`.`title` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creterias`
--
ALTER TABLE `creterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobapps`
--
ALTER TABLE `jobapps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_attachments`
--
ALTER TABLE `kura_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_certs`
--
ALTER TABLE `kura_certs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_education`
--
ALTER TABLE `kura_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_employers`
--
ALTER TABLE `kura_employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_memberships`
--
ALTER TABLE `kura_memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_others`
--
ALTER TABLE `kura_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_referees`
--
ALTER TABLE `kura_referees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kura_skills`
--
ALTER TABLE `kura_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurra_apps`
--
ALTER TABLE `kurra_apps`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `requireds`
--
ALTER TABLE `requireds`
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
-- AUTO_INCREMENT for table `creterias`
--
ALTER TABLE `creterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobapps`
--
ALTER TABLE `jobapps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kura_attachments`
--
ALTER TABLE `kura_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kura_certs`
--
ALTER TABLE `kura_certs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kura_education`
--
ALTER TABLE `kura_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kura_employers`
--
ALTER TABLE `kura_employers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kura_memberships`
--
ALTER TABLE `kura_memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kura_others`
--
ALTER TABLE `kura_others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kura_referees`
--
ALTER TABLE `kura_referees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kura_skills`
--
ALTER TABLE `kura_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kurra_apps`
--
ALTER TABLE `kurra_apps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `requireds`
--
ALTER TABLE `requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
