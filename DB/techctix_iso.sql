-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 08:17 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techctix_iso`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_plan`
--

CREATE TABLE `audit_plan` (
  `id` int(11) NOT NULL,
  `audit_number` varchar(100) NOT NULL,
  `company` int(11) NOT NULL,
  `objective` varchar(200) NOT NULL,
  `scope` varchar(100) NOT NULL,
  `standard` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `plan_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `auditor` varchar(100) NOT NULL,
  `auditee` varchar(100) NOT NULL,
  `document_ref` varchar(100) DEFAULT NULL,
  `relevant_clause` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `circulate` varchar(100) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit_program`
--

CREATE TABLE `audit_program` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `audit_frequency` varchar(50) NOT NULL,
  `start` varchar(100) NOT NULL,
  `end` varchar(100) NOT NULL,
  `standard` varchar(100) NOT NULL,
  `scope` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `actual` varchar(100) NOT NULL,
  `audit_number` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `draft` varchar(20) DEFAULT NULL,
  `circulate` int(11) DEFAULT '0',
  `circulate_created` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` tinyint(4) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `country` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `program_id` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `program_id`, `created_at`, `updated_at`) VALUES
(1, 'haifads', '28,29,30,', '2021-10-06 17:40:28', '2021-10-06 17:40:28'),
(2, 'asfsdfads', '28,29,30,', '2021-10-06 17:41:01', '2021-10-06 17:41:01'),
(3, 'dcds', '28,29,30,', '2021-10-06 17:43:36', '2021-10-06 17:43:36'),
(4, 'cdss', '28,29,30,', '2021-10-06 17:44:28', '2021-10-06 17:44:28'),
(5, 'chnage the department name', '28,29,30,', '2021-10-07 16:34:42', '2021-10-07 16:34:42'),
(6, 'change month in jul', '28,29,30,', '2021-10-07 16:35:02', '2021-10-07 16:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tools_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paytype` tinyint(4) NOT NULL,
  `tools_totalamount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `tools_id`, `company_name`, `company_email`, `logo`, `company_website`, `package_id`, `deleted_at`, `created_at`, `updated_at`, `paytype`, `tools_totalamount`) VALUES
(1, '', 'TCX', 'tcx@gmail.com', NULL, 'tcx.com', 4, NULL, '2021-01-12 20:17:02', '2021-01-12 20:17:02', 2, NULL),
(4, '1,2,3,4,5,6,7', 'COMPANY 2', 'company@gmail.com', NULL, 'TCX', 1, NULL, '2021-01-18 20:37:30', '2021-01-18 20:37:30', 2, NULL),
(6, '', 'Company 3', 'company12@gmail.com', NULL, NULL, 3, NULL, '2021-02-12 12:44:15', '2021-02-12 18:31:31', 2, NULL),
(7, '', 'Comapny New', 'companynew@gmail.com', NULL, NULL, 2, NULL, '2021-02-12 18:42:18', '2021-02-12 18:42:34', 2, NULL),
(8, '1,2,3,4,5,6', 'trello', 'kamal@trello.com', NULL, NULL, 3, NULL, '2021-02-19 01:39:16', '2021-02-19 01:39:16', 2, '84.00'),
(9, '1,2,3,4,5,6,7', 'slack', 'kamal@slack.com', NULL, NULL, 3, NULL, '2021-02-19 01:53:13', '2021-02-19 01:53:13', 2, '95.00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(4) NOT NULL,
  `country` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents_name`
--

CREATE TABLE `documents_name` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents_name`
--

INSERT INTO `documents_name` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'First Document', NULL, '2021-02-12 12:45:59', '2021-02-12 12:45:59');

-- --------------------------------------------------------

--
-- Table structure for table `documents_templates`
--

CREATE TABLE `documents_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents_templates`
--

INSERT INTO `documents_templates` (`id`, `document_id`, `content`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>From template</p>', NULL, '2021-02-12 12:46:26', '2021-02-12 12:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqueid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `toolsamount` decimal(10,2) NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package` int(11) NOT NULL,
  `packagename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tools` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `toolsname` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `uniqueid`, `company`, `description`, `toolsamount`, `totalamount`, `status`, `deleted_at`, `created_at`, `updated_at`, `package`, `packagename`, `tools`, `toolsname`) VALUES
(1, 'INV00000001', 1, '', '95.00', '100.00', 1, NULL, '2021-01-12 20:17:02', '2021-01-12 20:17:02', 4, 'Medium', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]'),
(4, 'INV00000004', 4, '', '95.00', '0.00', 1, NULL, '2021-01-18 20:37:30', '2021-01-18 20:37:30', 1, 'Trial', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]'),
(5, 'INV00000005', 6, '', '95.00', '0.00', 1, NULL, '2021-02-12 12:44:15', '2021-02-12 12:44:15', 2, 'Free', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]'),
(6, 'INV00000006', 6, '', '95.00', '50.00', 1, NULL, '2021-02-12 12:51:41', '2021-02-12 12:51:41', 3, 'Starter', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]'),
(7, 'INV00000007', 6, '', '95.00', '100.00', 1, NULL, '2021-02-12 12:55:15', '2021-02-12 12:55:15', 4, 'Medium', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]'),
(8, 'INV00000008', 6, '', '95.00', '50.00', 1, NULL, '2021-02-12 18:31:31', '2021-02-12 18:31:31', 3, 'Starter', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]'),
(9, 'INV00000009', 7, '', '95.00', '0.00', 1, NULL, '2021-02-12 18:42:18', '2021-02-12 18:42:18', 2, 'Free', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]'),
(10, 'INV00000010', 8, '', '84.00', '50.00', 1, NULL, '2021-02-19 01:39:16', '2021-02-19 01:39:16', 3, 'Starter', '1,2,3,4,5,6', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ]'),
(11, 'INV00000011', 9, '', '95.00', '50.00', 1, NULL, '2021-02-19 01:53:13', '2021-02-19 01:53:13', 3, 'Starter', '1,2,3,4,5,6,7', 'Document Audit [ Price : 12.00 ],<br>Internal Audit [ Price : 12.00 ],<br>MRM [ Price : 14.00 ],<br>Customer Satisfaction Survey [ Price : 15.00 ],<br>Objectives [ Price : 16.00 ],<br>Customer complaint, Inspections NCR [ Price : 15.00 ],<br>Quality, HSE Checklist [ Price : 11.00 ]');

-- --------------------------------------------------------

--
-- Table structure for table `mc_activity`
--

CREATE TABLE `mc_activity` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mc_activity`
--

INSERT INTO `mc_activity` (`id`, `company`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'Audit', 1, '2021-10-21 06:07:22', '2021-10-21 06:07:22', '2021-10-21 06:07:22'),
(2, 7, 'Meeting', 1, '2021-10-21 06:07:46', '2021-10-21 06:07:46', '2021-10-21 06:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `mc_department`
--

CREATE TABLE `mc_department` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `shortname` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc_department`
--

INSERT INTO `mc_department` (`id`, `company`, `name`, `shortname`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'IT', 'IT', 1, NULL, '2021-10-21 02:59:41', '2021-10-21 02:59:41'),
(2, 7, 'Quality', 'quality', 1, NULL, '2021-10-21 03:00:24', '2021-10-21 03:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `mc_designation`
--

CREATE TABLE `mc_designation` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc_designation`
--

INSERT INTO `mc_designation` (`id`, `company`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'GM', 1, NULL, '2021-10-21 06:12:54', '2021-10-21 06:12:54'),
(2, 7, 'MD', 1, NULL, '2021-10-21 06:13:13', '2021-10-21 06:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `mc_documenttype`
--

CREATE TABLE `mc_documenttype` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `type` varchar(155) NOT NULL,
  `shortname` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc_documenttype`
--

INSERT INTO `mc_documenttype` (`id`, `company`, `type`, `shortname`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'Procedure', 'procedure', 1, NULL, '2021-10-21 03:01:39', '2021-10-21 03:01:39'),
(2, 7, 'Form', 'form', 1, NULL, '2021-10-21 03:02:36', '2021-10-21 03:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `mc_scope`
--

CREATE TABLE `mc_scope` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc_scope`
--

INSERT INTO `mc_scope` (`id`, `company`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'Design', 1, NULL, '2021-10-21 06:06:07', '2021-10-21 06:06:07'),
(2, 7, 'Manufacture', 1, NULL, '2021-10-21 06:06:23', '2021-10-21 06:06:23'),
(3, 7, 'Supply', 1, NULL, '2021-10-21 06:06:36', '2021-10-21 06:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `mc_standard`
--

CREATE TABLE `mc_standard` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mc_standard`
--

INSERT INTO `mc_standard` (`id`, `company`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 7, 'ISO 27001-Information Security Management System', 1, NULL, '2021-10-21 05:28:59', '2021-10-21 05:28:59'),
(2, 7, 'ISO 50001', 1, NULL, '2021-10-21 05:29:18', '2021-10-21 05:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_department`
--

CREATE TABLE `m_department` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `shortname` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_department`
--

INSERT INTO `m_department` (`id`, `name`, `shortname`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Department 134', 'department 707', 1, '2021-01-18 21:40:33', '2021-01-18 21:40:33', '2021-01-18 16:10:33'),
(2, 'Deparment test', 'DT', 1, NULL, '2021-02-12 12:47:17', '2021-02-12 12:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `m_designation`
--

CREATE TABLE `m_designation` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_designation`
--

INSERT INTO `m_designation` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Designation 11', 1, NULL, '2021-01-18 19:49:47', '2021-01-18 19:49:47'),
(2, 'Designation 123', 1, '2021-01-18 13:49:24', '2021-01-18 13:49:24', '2021-01-18 19:49:24'),
(3, 'test', 1, NULL, '2021-01-18 14:19:22', '2021-01-18 14:19:22'),
(4, 'Designation 3', 1, NULL, '2021-02-12 12:47:36', '2021-02-12 12:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `m_documenttype`
--

CREATE TABLE `m_documenttype` (
  `id` int(11) NOT NULL,
  `type` varchar(155) NOT NULL,
  `shortname` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_scope`
--

CREATE TABLE `m_scope` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_scope`
--

INSERT INTO `m_scope` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Scope 1', 1, '2021-01-18 13:50:45', '2021-01-18 13:50:45', '2021-01-18 19:50:45'),
(2, 'Scope 2', 1, NULL, '2021-01-18 19:50:33', '2021-01-18 19:50:33'),
(3, 'SCOPE 3', 1, NULL, '2021-02-12 12:48:23', '2021-02-12 12:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `m_standard`
--

CREATE TABLE `m_standard` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_standard`
--

INSERT INTO `m_standard` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'BRC', 1, '2021-01-18 13:50:11', '2021-01-18 13:50:11', '2021-01-18 19:50:11'),
(2, 'BVC', 1, '2021-01-18 21:40:03', '2021-01-18 21:40:03', '2021-01-18 16:10:03'),
(3, 'CVC', 1, NULL, '2021-02-12 12:48:00', '2021-02-12 12:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `max_storage_size` int(11) NOT NULL,
  `max_file_size` int(11) DEFAULT NULL,
  `annual_price` decimal(8,2) NOT NULL,
  `monthly_price` decimal(8,2) NOT NULL,
  `max_employees` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `max_storage_size`, `max_file_size`, `annual_price`, `monthly_price`, `max_employees`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Trial', 'Its a trial package', 100, 10, '0.00', '0.00', 20, NULL, '2020-12-17 13:18:27', '2021-01-12 20:15:52'),
(2, 'Free', 'It\'s a free package.', 500, 10, '0.00', '0.00', 20, NULL, '2020-12-17 13:20:17', '2021-01-12 20:14:36'),
(3, 'Starter', 'Quidem deserunt nobis asperiores fuga Ullamco corporis culpa', 1024, 30, '500.00', '50.00', 50, NULL, '2020-12-17 13:21:12', '2021-01-12 20:15:31'),
(4, 'Medium', 'Quidem deserunt nobis asperiores fuga Ullamco corporis culpa', 3072, 50, '1000.00', '100.00', 100, NULL, '2020-12-17 13:22:04', '2021-01-12 20:15:02'),
(5, 'Larger', 'Quidem deserunt nobis asperiores fuga Ullamco corporis culpa', 10240, 100, '5000.00', '500.00', 500, NULL, '2020-12-17 13:23:04', '2021-01-12 20:14:48'),
(6, 'test free package test', 'test description', 85, 1, '45.00', '78.00', 12, '2021-02-12 12:40:24', '2021-02-12 12:21:57', '2021-02-12 12:40:24'),
(7, 'Free test package', 'test description', 12, 1, '1000.00', '100.00', 12, '2021-02-12 12:41:36', '2021-02-12 12:40:59', '2021-02-12 12:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`, `price`, `status`) VALUES
(1, 'Document Audit', NULL, NULL, '2021-02-12 12:20:06', '12.00', 1),
(2, 'Internal Audit', NULL, NULL, NULL, '12.00', 1),
(3, 'MRM', NULL, NULL, NULL, '14.00', 1),
(4, 'Customer Satisfaction Survey', NULL, NULL, NULL, '15.00', 1),
(5, 'Objectives', NULL, NULL, NULL, '16.00', 1),
(6, 'Customer complaint, Inspections NCR', NULL, NULL, NULL, '15.00', 1),
(7, 'Quality, HSE Checklist', NULL, NULL, '2021-01-12 20:30:47', '11.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathername` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opensource` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auditee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetaddress` text COLLATE utf8mb4_unicode_ci,
  `zipcode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `name`, `fathername`, `gender`, `email`, `remember_token`, `password`, `opensource`, `dob`, `role`, `status`, `auditor`, `auditee`, `department`, `phone`, `streetaddress`, `zipcode`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sudhakar', 'S', NULL, 'sudhakar@techcmantix.com', NULL, '$2y$10$5Mjmom91Sux0l.Uk2mAlHuzqv2ZWGmos6aVo8SGC7DKkLIdwHG9xm', 'demo1234', NULL, 0, '', '', '', NULL, NULL, NULL, NULL, NULL, '2020-12-17 12:12:07', '2020-12-17 12:12:11'),
(2, 1, 'TCX', NULL, NULL, 'tcx@gmail.com', NULL, '$2y$10$rb3KGn5sfInjiVOKGuXMDuqh7tVGNSAlnZFlFHHANtS78UBe1xnOy', '123123123', NULL, 1, '', '', '', NULL, '8807446505', 'Trichy\r\nTrichy 2', '620009', NULL, '2021-01-12 20:17:02', '2021-01-12 20:17:02'),
(5, 4, 'COMPANY 2', NULL, NULL, 'company@gmail.com', NULL, '$2y$10$c3GbC.ttSHiir6qJLh1XvO0gA3lS22/atNyjax.bPyA.vNM6uCIvS', '123123123', NULL, 6, 'audit', 'N', 'Y', 'Purchase', '8807446505', 'Trichy\r\nTrichy 2', '620009', NULL, '2021-01-18 20:37:30', '2021-01-18 20:37:30'),
(7, 7, 'Company 3', NULL, NULL, 'company12@gmail.com', NULL, '$2y$10$FSrwGaOST7SaUDVpRgAKzeVoFDI3R73.fBT4jji..vADzgfnffu1O', '123123123', NULL, 6, 'audit', 'Y', 'Y', 'Production', '8807446505', 'Trichy', '620009', NULL, '2021-02-12 12:44:15', '2021-02-12 18:31:31'),
(8, 7, 'Companynew', NULL, NULL, 'companynew@gmail.com', NULL, '$2y$10$7vU/kwGnfAZealn4Nc/U9.ookbuA3Hj0bCa1WJXgf0axa.q4eAmd.', 'top123', NULL, 4, 'company', '', '', NULL, '8807446505', 'Trichy', '620009', NULL, '2021-02-12 18:42:18', '2021-10-21 02:40:16'),
(9, 7, 'trello', NULL, NULL, 'kamal@trello.com', NULL, '$2y$10$EQxPoztZhzMqn9nILp60Xupo79KJG1hrKPd0bnMFOF9M5r1Lo4Opq', 'demo1234', NULL, 6, 'audit', 'Y', 'N', 'Sales', '987987987', 'some addresss', '876876876', NULL, '2021-02-19 01:39:16', '2021-02-19 01:39:16'),
(10, 9, 'slack', NULL, NULL, 'kamal@slack.com', NULL, '$2y$10$883MU/twcpjqAxtrjwwdV.Gk.jB6u0ZIu4LsVy798XL0.S25lqsNi', 'demo1234', NULL, 5, '', '', '', NULL, '9879879879', 'asdfasdf', '456456456', NULL, '2021-02-19 01:53:13', '2021-02-19 01:53:13'),
(19, 7, 'Sales', NULL, NULL, 'sales@gmail.com', NULL, '$2y$10$bt.35v3GBZ4giPe1CJjbBu0y9DRJgBdM42PMueQYHhgBZ.VZMHHf6', 'sales123', NULL, 4, 'head', '', '', NULL, NULL, NULL, NULL, NULL, '2021-09-15 10:20:25', '2021-09-15 10:20:25'),
(20, 7, 'Sales', NULL, NULL, 'production@gmail.com', NULL, '$2y$10$WoDK7ykklpG.VJzSqnkrO.Je/IbCjB2/dSiG124ogV7lgrIiN9aqC', 'production123', NULL, 6, 'audit', 'Y', 'Y', 'Sales', NULL, NULL, NULL, NULL, '2021-09-15 10:20:56', '2021-09-15 10:20:56'),
(21, 7, 'Production', NULL, NULL, 'purchase@gmail.com', NULL, '$2y$10$jg2JVCp89EQiIqaYiQzh5uBWXFJ9WlfPMKiyyiMNu73J0LfrJ9OAy', 'purchase123', NULL, 6, 'audit', 'N', 'Y', 'Production', NULL, NULL, NULL, '2021-10-21 02:39:32', '2021-09-15 10:21:24', '2021-10-21 02:39:32'),
(22, 7, 'kaviya', NULL, NULL, 'kavi@gmail.com', NULL, '$2y$10$UM.VBynfaibfIp4/Es66P.HbVFvMmQVfinjPdR1JqqMnfh.6JYqaS', 'kavi', NULL, 4, 'head', '', '', NULL, NULL, NULL, NULL, '2021-10-21 02:39:23', '2021-10-20 09:36:05', '2021-10-21 02:39:23'),
(23, 7, 'jnkn', NULL, NULL, 'jknj', NULL, '$2y$10$6X1cSqvWmIeLbS/bXVdj9OY9I45Vuw7EQHqxeJ35e3XSkQlSJZeJe', 'nj', NULL, 4, 'head', '', '', NULL, NULL, NULL, NULL, '2021-10-21 02:39:15', '2021-10-20 10:57:11', '2021-10-21 02:39:15'),
(25, 7, 'company', NULL, NULL, 'companystaff@gmail.com', NULL, '$2y$10$Bduoi2bSWTDGFnxhdh/qte8JLhaHn4HUh59.ZPIujhTlbsznGrBEG', '123456', NULL, 5, 'topmanagement', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-21 02:48:06', '2021-10-21 02:48:06'),
(26, 7, 'Auditor', NULL, NULL, 'audit@gmail.com', NULL, '$2y$10$afUdyYaQFeqWqT3SispCne5gZWshiKqcHT0KtoTSjpWSVh8muc1Fa', 'auditor1', NULL, 6, 'audit', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL, '2021-10-21 02:48:56', '2021-10-21 02:55:41'),
(27, 7, 'IT', NULL, NULL, 'it@gmail.com', NULL, '$2y$10$FSeacS1F1vTMHgmPEJDHE.6sN1glqt3eyW4Nnaa4lI8.lg4fi0gpW', '123456', NULL, 4, 'head', '', '', NULL, NULL, NULL, NULL, NULL, '2021-10-21 02:59:41', '2021-10-21 02:59:41'),
(28, 7, 'Quality', NULL, NULL, 'quality@gmail.com', NULL, '$2y$10$hZ3AHsNvfL.j/a1LyLtToeIBWgFnMPsARBq/y.IxGYstTkNO.z7jC', '123456', NULL, 4, 'head', '', '', NULL, NULL, NULL, NULL, NULL, '2021-10-21 03:00:24', '2021-10-21 03:00:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_plan`
--
ALTER TABLE `audit_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_program`
--
ALTER TABLE `audit_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents_name`
--
ALTER TABLE `documents_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents_templates`
--
ALTER TABLE `documents_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_activity`
--
ALTER TABLE `mc_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_department`
--
ALTER TABLE `mc_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_designation`
--
ALTER TABLE `mc_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_documenttype`
--
ALTER TABLE `mc_documenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_scope`
--
ALTER TABLE `mc_scope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_standard`
--
ALTER TABLE `mc_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_department`
--
ALTER TABLE `m_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_designation`
--
ALTER TABLE `m_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_documenttype`
--
ALTER TABLE `m_documenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_scope`
--
ALTER TABLE `m_scope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_standard`
--
ALTER TABLE `m_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
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
-- AUTO_INCREMENT for table `audit_plan`
--
ALTER TABLE `audit_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_program`
--
ALTER TABLE `audit_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents_name`
--
ALTER TABLE `documents_name`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents_templates`
--
ALTER TABLE `documents_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mc_activity`
--
ALTER TABLE `mc_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mc_department`
--
ALTER TABLE `mc_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mc_designation`
--
ALTER TABLE `mc_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mc_documenttype`
--
ALTER TABLE `mc_documenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mc_scope`
--
ALTER TABLE `mc_scope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mc_standard`
--
ALTER TABLE `mc_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_department`
--
ALTER TABLE `m_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_designation`
--
ALTER TABLE `m_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_documenttype`
--
ALTER TABLE `m_documenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_scope`
--
ALTER TABLE `m_scope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_standard`
--
ALTER TABLE `m_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
