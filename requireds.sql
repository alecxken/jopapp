-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 01:13 AM
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
(4, 'KURA-FPHPH-2020-MAY', 'masters', 'ok', NULL, NULL),
(5, 'KURA-QRRBS-2020-MAY', 'Relevant Experience (min 8 years)', 'ok', NULL, NULL),
(6, 'KURA-QRRBS-2020-MAY', 'Supervisory Experience ( min3 years)', 'ok', NULL, NULL),
(7, 'KURA-QRRBS-2020-MAY', 'Implementation of ERP systems  (3 years)', 'ok', NULL, NULL),
(8, 'KURA-QRRBS-2020-MAY', 'Bachelors\' Degree (IT, Computer Science/Engineering, BIT)', 'ok', NULL, NULL),
(9, 'KURA-QRRBS-2020-MAY', 'Professional Qualification  Certifications (CCNP, MCSE, MCP, MCSD, Oracle)', 'ok', NULL, NULL),
(10, 'KURA-QRRBS-2020-MAY', 'Professional  Qualification System Analysis, Design & Implementation skills', 'ok', NULL, NULL),
(11, 'KURA-QRRBS-2020-MAY', 'Certificate in Management Course', 'ok', NULL, NULL),
(12, 'KURA-MKSLK-2020-MAY', 'Relevant Experience (min 8 years)', 'ok', NULL, NULL),
(13, 'KURA-MKSLK-2020-MAY', 'Supervisory Experience ( min3 years)', 'ok', NULL, NULL),
(14, 'KURA-MKSLK-2020-MAY', 'Implementation of ERP systems  (3 years)', 'ok', NULL, NULL),
(15, 'KURA-MKSLK-2020-MAY', 'Bachelors\' Degree (IT, Computer Science/Engineering, BIT)', 'ok', NULL, NULL),
(16, 'KURA-MKSLK-2020-MAY', 'Professional Certifications (CCNP, MCSE, MCP, MCSD, Oracle', 'ok', NULL, NULL),
(17, 'KURA-MKSLK-2020-MAY', 'System Analysis, Design & Implementation skills', 'ok', NULL, NULL),
(18, 'KURA-MKSLK-2020-MAY', 'Certificate in Management Course', 'ok', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requireds`
--
ALTER TABLE `requireds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requireds`
--
ALTER TABLE `requireds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
