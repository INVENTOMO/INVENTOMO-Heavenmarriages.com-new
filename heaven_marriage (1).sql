-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2026 at 10:41 PM
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
-- Database: `heaven_marriage`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `original_path` varchar(255) NOT NULL,
  `blurred_path` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `original_path`, `blurred_path`, `is_primary`, `uploaded_at`) VALUES
(1, 5, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:07'),
(2, 6, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:08'),
(3, 7, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:08'),
(4, 8, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:08'),
(5, 9, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:08'),
(6, 10, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:09'),
(7, 11, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:09'),
(8, 12, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:09'),
(9, 13, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:09'),
(10, 14, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:09'),
(11, 15, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:10'),
(12, 16, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:10'),
(13, 17, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:10'),
(14, 18, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:11'),
(15, 19, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:11'),
(16, 20, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:11'),
(17, 21, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:11'),
(18, 22, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:12'),
(19, 23, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:12'),
(20, 24, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:12'),
(21, 25, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:12'),
(22, 26, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:12'),
(23, 27, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:12'),
(24, 28, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:13'),
(25, 29, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:13'),
(26, 30, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:13'),
(27, 31, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:13'),
(28, 32, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:13'),
(29, 33, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:14'),
(30, 34, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:14'),
(31, 35, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:14'),
(32, 36, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:15'),
(33, 37, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:15'),
(34, 38, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:15'),
(35, 39, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:16'),
(36, 40, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:16'),
(37, 41, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:16'),
(38, 42, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:16'),
(39, 43, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:17'),
(40, 44, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:17'),
(41, 45, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:17'),
(42, 46, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:18'),
(43, 47, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:18'),
(44, 48, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:18'),
(45, 49, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:19'),
(46, 50, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:19'),
(47, 51, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:19'),
(48, 52, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:19'),
(49, 53, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:20'),
(50, 54, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:20'),
(51, 55, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:20'),
(52, 56, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:20'),
(53, 57, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:21'),
(54, 58, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:21'),
(55, 59, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:21'),
(56, 60, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:21'),
(57, 61, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:21'),
(58, 62, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:22'),
(59, 63, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:22'),
(60, 64, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:22'),
(61, 65, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:23'),
(62, 66, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:23'),
(63, 67, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:23'),
(64, 68, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:23'),
(65, 69, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:24'),
(66, 70, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:24'),
(67, 71, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:24'),
(68, 72, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:24'),
(69, 73, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:25'),
(70, 74, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:25'),
(71, 75, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:25'),
(72, 76, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:26'),
(73, 77, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:26'),
(74, 78, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:26'),
(75, 79, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:26'),
(76, 80, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:27'),
(77, 81, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:27'),
(78, 82, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:27'),
(79, 83, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:27'),
(80, 84, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:27'),
(81, 85, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:28'),
(82, 86, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:28'),
(83, 87, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:28'),
(84, 88, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:28'),
(85, 89, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:29'),
(86, 90, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:29'),
(87, 91, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:29'),
(88, 92, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:29'),
(89, 93, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:30'),
(90, 94, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:30'),
(91, 95, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:30'),
(92, 96, 'assets/images/female_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:30'),
(93, 97, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:31'),
(94, 98, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:31'),
(95, 99, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:31'),
(96, 100, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:31'),
(97, 101, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:31'),
(98, 102, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:32'),
(99, 103, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:32'),
(100, 104, 'assets/images/male_default.png', 'assets/images/locked.png', 1, '2026-01-14 13:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `city_origin` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `state_origin` varchar(100) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `partner_income` varchar(50) DEFAULT NULL,
  `partner_profession` varchar(100) DEFAULT NULL,
  `partner_education` varchar(100) DEFAULT NULL,
  `partner_caste` varchar(100) DEFAULT NULL,
  `partner_sect` varchar(50) DEFAULT NULL,
  `partner_religion` varchar(50) DEFAULT NULL,
  `partner_city` varchar(100) DEFAULT NULL,
  `partner_country` varchar(100) DEFAULT NULL,
  `partner_height_max` varchar(20) DEFAULT NULL,
  `partner_height_min` varchar(20) DEFAULT NULL,
  `partner_age_max` int(11) DEFAULT NULL,
  `partner_age_min` int(11) DEFAULT NULL,
  `partner_expectations` text DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `is_revert` enum('Yes','No') DEFAULT 'No',
  `sect` varchar(50) DEFAULT NULL,
  `caste` varchar(50) DEFAULT NULL,
  `marital_status` enum('Single','Divorced','Widowed','Separated') DEFAULT 'Single',
  `living_arrangement` varchar(100) DEFAULT NULL,
  `looking_to_marry` varchar(50) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `university` varchar(150) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `job_post` varchar(100) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `income` varchar(50) DEFAULT NULL,
  `monthly_income` varchar(50) DEFAULT NULL,
  `family_details` text DEFAULT NULL,
  `mother_tongue` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT 'Pakistan',
  `willing_to_relocate` varchar(50) DEFAULT NULL,
  `country_origin` varchar(100) DEFAULT NULL,
  `profile_color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `phone`, `gender`, `date_of_birth`, `city`, `city_origin`, `state`, `state_origin`, `bio`, `partner_income`, `partner_profession`, `partner_education`, `partner_caste`, `partner_sect`, `partner_religion`, `partner_city`, `partner_country`, `partner_height_max`, `partner_height_min`, `partner_age_max`, `partner_age_min`, `partner_expectations`, `religion`, `is_revert`, `sect`, `caste`, `marital_status`, `living_arrangement`, `looking_to_marry`, `education`, `university`, `occupation`, `job_post`, `height`, `weight`, `income`, `monthly_income`, `family_details`, `mother_tongue`, `country`, `willing_to_relocate`, `country_origin`, `profile_color`) VALUES
(4, 5, '+92300000001', 'Male', '1992-01-22', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'PU', 'Business Owner', 'Executive', '6\'9', NULL, NULL, 'PKR 59k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(5, 6, '+92300000002', 'Female', '2000-01-20', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'PU', 'Teacher', 'Executive', '6\'3', NULL, NULL, 'PKR 134k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(6, 7, '+92300000003', 'Female', '1996-01-21', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'UET', 'Business Owner', 'Junior', '6\'9', NULL, NULL, 'PKR 110k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(7, 8, '+92300000004', 'Female', '1993-01-21', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Manager', 'Senior', '6\'2', NULL, NULL, 'PKR 96k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(8, 9, '+92300000005', 'Male', '2000-01-20', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'PU', 'Software Engineer', 'Executive', '6\'11', NULL, NULL, 'PKR 87k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(9, 10, '+92300000006', 'Male', '2004-01-19', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'PU', 'Designer', 'Junior', '5\'5', NULL, NULL, 'PKR 143k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(10, 11, '+92300000007', 'Female', '2003-01-19', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Sikhism', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Sikhism', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'NUST', 'Teacher', 'Executive', '5\'4', NULL, NULL, 'PKR 115k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(11, 12, '+92300000008', 'Female', '1989-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'UET', 'Software Engineer', 'Senior', '6\'3', NULL, NULL, 'PKR 126k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(12, 13, '+92300000009', 'Female', '1986-01-23', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Master\'s', NULL, NULL, 'Hinduism', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Hinduism', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'FAST', 'Business Owner', 'Senior', '6\'4', NULL, NULL, 'PKR 140k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(13, 14, '+92300000010', 'Female', '1991-01-22', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'Virtual University', 'Manager', 'Executive', '5\'5', NULL, NULL, 'PKR 107k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(14, 15, '+92300000011', 'Female', '2004-01-19', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Intermediate', NULL, NULL, 'Sikhism', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Sikhism', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Teacher', 'Executive', '6\'9', NULL, NULL, 'PKR 100k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(15, 16, '+92300000012', 'Female', '1988-01-23', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'Virtual University', 'Software Engineer', 'Junior', '5\'2', NULL, NULL, 'PKR 109k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(16, 17, '+92300000013', 'Female', '1998-01-20', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'Virtual University', 'Business Owner', 'Junior', '6\'0', NULL, NULL, 'PKR 105k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(17, 18, '+92300000014', 'Female', '1993-01-21', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'UET', 'Designer', 'Senior', '5\'0', NULL, NULL, 'PKR 123k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(18, 19, '+92300000015', 'Female', '1986-01-23', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'FAST', 'Manager', 'Junior', '5\'1', NULL, NULL, 'PKR 73k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(19, 20, '+92300000016', 'Male', '1995-01-21', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Manager', 'Junior', '6\'5', NULL, NULL, 'PKR 76k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(20, 21, '+92300000017', 'Female', '1996-01-21', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Master\'s', NULL, NULL, 'Christianity', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Christianity', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Software Engineer', 'Executive', '5\'4', NULL, NULL, 'PKR 112k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(21, 22, '+92300000018', 'Female', '1992-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Designer', 'Executive', '5\'3', NULL, NULL, 'PKR 129k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(22, 23, '+92300000019', 'Female', '1993-01-21', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Master\'s', NULL, NULL, 'Hinduism', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Hinduism', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'NUST', 'Designer', 'Executive', '6\'4', NULL, NULL, 'PKR 61k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(23, 24, '+92300000020', 'Female', '1999-01-20', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'Virtual University', 'Business Owner', 'Executive', '6\'2', NULL, NULL, 'PKR 114k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(24, 25, '+92300000021', 'Female', '1995-01-21', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Teacher', 'Executive', '6\'6', NULL, NULL, 'PKR 118k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(25, 26, '+92300000022', 'Male', '1992-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Manager', 'Senior', '6\'0', NULL, NULL, 'PKR 60k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(26, 27, '+92300000023', 'Female', '1988-01-23', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Master\'s', NULL, NULL, 'Sikhism', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Sikhism', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Business Owner', 'Junior', '6\'9', NULL, NULL, 'PKR 78k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(27, 28, '+92300000024', 'Female', '1986-01-23', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Intermediate', NULL, NULL, 'Christianity', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Christianity', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Designer', 'Senior', '6\'3', NULL, NULL, 'PKR 130k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(28, 29, '+92300000025', 'Male', '1989-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'Virtual University', 'Teacher', 'Junior', '5\'5', NULL, NULL, 'PKR 149k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(29, 30, '+92300000026', 'Male', '2002-01-19', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'FAST', 'Software Engineer', 'Executive', '6\'4', NULL, NULL, 'PKR 114k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(30, 31, '+92300000027', 'Male', '2004-01-19', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'Virtual University', 'Designer', 'Junior', '5\'4', NULL, NULL, 'PKR 79k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(31, 32, '+92300000028', 'Female', '2000-01-20', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'Virtual University', 'Business Owner', 'Senior', '6\'11', NULL, NULL, 'PKR 139k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(32, 33, '+92300000029', 'Female', '1987-01-23', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Master\'s', NULL, NULL, 'Christianity', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Christianity', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Designer', 'Executive', '6\'5', NULL, NULL, 'PKR 59k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(33, 34, '+92300000030', 'Male', '1997-01-20', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'PU', 'Designer', 'Senior', '6\'2', NULL, NULL, 'PKR 73k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(34, 35, '+92300000031', 'Female', '1995-01-21', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'NUST', 'Designer', 'Junior', '5\'4', NULL, NULL, 'PKR 86k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(35, 36, '+92300000032', 'Male', '1990-01-22', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'Virtual University', 'Manager', 'Senior', '6\'3', NULL, NULL, 'PKR 96k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(36, 37, '+92300000033', 'Male', '1998-01-20', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Teacher', 'Senior', '5\'10', NULL, NULL, 'PKR 130k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(37, 38, '+92300000034', 'Female', '1989-01-22', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Business Owner', 'Executive', '6\'7', NULL, NULL, 'PKR 133k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(38, 39, '+92300000035', 'Female', '1988-01-23', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'Virtual University', 'Teacher', 'Junior', '6\'1', NULL, NULL, 'PKR 47k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(39, 40, '+92300000036', 'Male', '1986-01-23', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Software Engineer', 'Executive', '6\'2', NULL, NULL, 'PKR 46k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(40, 41, '+92300000037', 'Female', '1992-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'FAST', 'Teacher', 'Senior', '6\'7', NULL, NULL, 'PKR 81k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(41, 42, '+92300000038', 'Male', '1999-01-20', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Software Engineer', 'Executive', '6\'1', NULL, NULL, 'PKR 148k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(42, 43, '+92300000039', 'Female', '1986-01-23', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Manager', 'Senior', '6\'8', NULL, NULL, 'PKR 86k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(43, 44, '+92300000040', 'Female', '1989-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Designer', 'Junior', '6\'0', NULL, NULL, 'PKR 100k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(44, 45, '+92300000041', 'Male', '1990-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'FAST', 'Software Engineer', 'Junior', '6\'0', NULL, NULL, 'PKR 41k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(45, 46, '+92300000042', 'Male', '1993-01-21', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'PU', 'Designer', 'Junior', '5\'9', NULL, NULL, 'PKR 44k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(46, 47, '+92300000043', 'Male', '1995-01-21', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Designer', 'Junior', '5\'8', NULL, NULL, 'PKR 41k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(47, 48, '+92300000044', 'Male', '2004-01-19', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Accountant', 'Senior', '6\'3', NULL, NULL, 'PKR 45k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(48, 49, '+92300000045', 'Female', '1994-01-21', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'UET', 'Software Engineer', 'Senior', '5\'6', NULL, NULL, 'PKR 87k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(49, 50, '+92300000046', 'Male', '1996-01-21', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Christianity', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Christianity', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Business Owner', 'Junior', '5\'5', NULL, NULL, 'PKR 131k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(50, 51, '+92300000047', 'Female', '1996-01-21', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Teacher', 'Executive', '5\'9', NULL, NULL, 'PKR 104k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(51, 52, '+92300000048', 'Female', '2004-01-19', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'PU', 'Manager', 'Junior', '5\'4', NULL, NULL, 'PKR 53k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(52, 53, '+92300000049', 'Female', '2001-01-19', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'UET', 'Business Owner', 'Executive', '5\'9', NULL, NULL, 'PKR 140k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(53, 54, '+92300000050', 'Male', '1999-01-20', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'PU', 'Software Engineer', 'Executive', '5\'8', NULL, NULL, 'PKR 128k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(54, 55, '+92300000051', 'Female', '2002-01-19', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Manager', 'Junior', '5\'10', NULL, NULL, 'PKR 66k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(55, 56, '+92300000052', 'Female', '2003-01-19', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'Virtual University', 'Teacher', 'Junior', '6\'4', NULL, NULL, 'PKR 149k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(56, 57, '+92300000053', 'Male', '1987-01-23', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'Virtual University', 'Teacher', 'Executive', '6\'11', NULL, NULL, 'PKR 101k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(57, 58, '+92300000054', 'Female', '1996-01-21', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'PU', 'Manager', 'Senior', '5\'2', NULL, NULL, 'PKR 147k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(58, 59, '+92300000055', 'Female', '1998-01-20', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'Virtual University', 'Designer', 'Junior', '6\'0', NULL, NULL, 'PKR 97k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(59, 60, '+92300000056', 'Female', '1992-01-22', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'UET', 'Business Owner', 'Senior', '6\'2', NULL, NULL, 'PKR 116k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(60, 61, '+92300000057', 'Female', '1993-01-21', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Business Owner', 'Junior', '6\'10', NULL, NULL, 'PKR 127k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(61, 62, '+92300000058', 'Female', '1992-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'Virtual University', 'Accountant', 'Executive', '5\'0', NULL, NULL, 'PKR 148k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(62, 63, '+92300000059', 'Male', '1990-01-22', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'PU', 'Accountant', 'Senior', '6\'9', NULL, NULL, 'PKR 98k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(63, 64, '+92300000060', 'Male', '2002-01-19', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Designer', 'Junior', '6\'10', NULL, NULL, 'PKR 77k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(64, 65, '+92300000061', 'Male', '1996-01-21', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'PU', 'Designer', 'Executive', '6\'9', NULL, NULL, 'PKR 121k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(65, 66, '+92300000062', 'Male', '1999-01-20', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Software Engineer', 'Senior', '6\'6', NULL, NULL, 'PKR 143k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(66, 67, '+92300000063', 'Male', '2003-01-19', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'Virtual University', 'Business Owner', 'Junior', '5\'7', NULL, NULL, 'PKR 141k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(67, 68, '+92300000064', 'Female', '1996-01-21', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'FAST', 'Software Engineer', 'Senior', '5\'9', NULL, NULL, 'PKR 72k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(68, 69, '+92300000065', 'Female', '2003-01-19', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Manager', 'Senior', '6\'8', NULL, NULL, 'PKR 73k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(69, 70, '+92300000066', 'Female', '1998-01-20', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Accountant', 'Senior', '6\'7', NULL, NULL, 'PKR 46k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(70, 71, '+92300000067', 'Female', '1988-01-23', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'PU', 'Teacher', 'Senior', '5\'2', NULL, NULL, 'PKR 113k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(71, 72, '+92300000068', 'Female', '1990-01-22', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'UET', 'Accountant', 'Senior', '6\'6', NULL, NULL, 'PKR 45k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(72, 73, '+92300000069', 'Male', '2000-01-20', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Business Owner', 'Junior', '6\'1', NULL, NULL, 'PKR 93k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(73, 74, '+92300000070', 'Female', '1997-01-20', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'PU', 'Accountant', 'Junior', '5\'6', NULL, NULL, 'PKR 102k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(74, 75, '+92300000071', 'Male', '1991-01-22', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Software Engineer', 'Senior', '6\'7', NULL, NULL, 'PKR 56k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(75, 76, '+92300000072', 'Male', '2002-01-19', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'UET', 'Teacher', 'Senior', '5\'6', NULL, NULL, 'PKR 86k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(76, 77, '+92300000073', 'Female', '1990-01-22', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'FAST', 'Manager', 'Executive', '6\'1', NULL, NULL, 'PKR 145k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(77, 78, '+92300000074', 'Male', '1995-01-21', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'UET', 'Business Owner', 'Senior', '5\'3', NULL, NULL, 'PKR 116k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(78, 79, '+92300000075', 'Female', '1989-01-22', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Manager', 'Executive', '5\'5', NULL, NULL, 'PKR 50k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(79, 80, '+92300000076', 'Female', '1987-01-23', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'PU', 'Business Owner', 'Junior', '6\'11', NULL, NULL, 'PKR 73k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(80, 81, '+92300000077', 'Female', '2001-01-19', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'UET', 'Accountant', 'Junior', '6\'6', NULL, NULL, 'PKR 114k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(81, 82, '+92300000078', 'Female', '1987-01-23', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'PU', 'Software Engineer', 'Junior', '5\'4', NULL, NULL, 'PKR 67k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(82, 83, '+92300000079', 'Female', '2000-01-20', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'PU', 'Software Engineer', 'Executive', '6\'6', NULL, NULL, 'PKR 100k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(83, 84, '+92300000080', 'Female', '1990-01-22', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Designer', 'Junior', '6\'11', NULL, NULL, 'PKR 95k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(84, 85, '+92300000081', 'Male', '1991-01-22', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Master\'s', NULL, NULL, 'Hinduism', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Hinduism', 'No', 'N/A', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Accountant', 'Junior', '5\'9', NULL, NULL, 'PKR 51k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(85, 86, '+92300000082', 'Female', '1986-01-23', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'Virtual University', 'Business Owner', 'Executive', '6\'3', NULL, NULL, 'PKR 125k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(86, 87, '+92300000083', 'Female', '1993-01-21', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'PU', 'Business Owner', 'Junior', '5\'9', NULL, NULL, 'PKR 103k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(87, 88, '+92300000084', 'Female', '2001-01-19', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Business Owner', 'Junior', '6\'0', NULL, NULL, 'PKR 121k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(88, 89, '+92300000085', 'Male', '2004-01-19', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'UET', 'Teacher', 'Senior', '5\'6', NULL, NULL, 'PKR 146k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(89, 90, '+92300000086', 'Male', '1987-01-23', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'UET', 'Accountant', 'Senior', '6\'6', NULL, NULL, 'PKR 91k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(90, 91, '+92300000087', 'Male', '1997-01-20', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'NUST', 'Accountant', 'Junior', '6\'8', NULL, NULL, 'PKR 114k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(91, 92, '+92300000088', 'Male', '1996-01-21', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'Virtual University', 'Software Engineer', 'Junior', '6\'6', NULL, NULL, 'PKR 82k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(92, 93, '+92300000089', 'Male', '2003-01-19', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'UET', 'Business Owner', 'Junior', '5\'1', NULL, NULL, 'PKR 53k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(93, 94, '+92300000090', 'Female', '1986-01-23', 'Karachi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'PU', 'Accountant', 'Executive', '5\'7', NULL, NULL, 'PKR 101k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(94, 95, '+92300000091', 'Female', '1997-01-20', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'UET', 'Business Owner', 'Executive', '5\'9', NULL, NULL, 'PKR 81k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(95, 96, '+92300000092', 'Female', '1998-01-20', 'Islamabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Teacher', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'NUST', 'Software Engineer', 'Senior', '6\'11', NULL, NULL, 'PKR 94k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(96, 97, '+92300000093', 'Male', '1999-01-20', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Manager', 'Master\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'NUST', 'Teacher', 'Executive', '5\'5', NULL, NULL, 'PKR 119k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(97, 98, '+92300000094', 'Male', '1997-01-20', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Manager', 'Senior', '5\'3', NULL, NULL, 'PKR 79k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(98, 99, '+92300000095', 'Male', '1994-01-21', 'Faisalabad', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'Virtual University', 'Business Owner', 'Senior', '5\'10', NULL, NULL, 'PKR 141k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(99, 100, '+92300000096', 'Male', '2001-01-19', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Business Owner', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Business Owner', 'Junior', '5\'2', NULL, NULL, 'PKR 126k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(100, 101, '+92300000097', 'Male', '1997-01-20', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Intermediate', 'FAST', 'Software Engineer', 'Executive', '5\'10', NULL, NULL, 'PKR 78k', NULL, NULL, 'Pakistan', 'Yes', NULL, NULL),
(101, 102, '+92300000098', 'Male', '1988-01-23', 'Multan', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Software Engineer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'FAST', 'Designer', 'Junior', '5\'0', NULL, NULL, 'PKR 87k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(102, 103, '+92300000099', 'Male', '1991-01-22', 'Lahore', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Accountant', 'Bachelor\'s', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Bachelor\'s', 'PU', 'Designer', 'Junior', '6\'2', NULL, NULL, 'PKR 118k', NULL, NULL, 'Pakistan', 'No', NULL, NULL),
(103, 104, '+92300000100', 'Male', '1987-01-23', 'Rawalpindi', NULL, NULL, NULL, 'I am a simple person looking for a partner.', NULL, 'Designer', 'Intermediate', NULL, NULL, 'Islam', NULL, 'Pakistan', '6\'0', '5\'2\"\"', 35, 22, 'Simple, family-oriented', 'Islam', 'No', 'Sunni', NULL, 'Single', 'With Family', NULL, 'Master\'s', 'UET', 'Designer', 'Junior', '6\'2', NULL, NULL, 'PKR 108k', NULL, NULL, 'Pakistan', 'No', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) DEFAULT NULL,
  `setting_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
(1, 'whatsapp_number', '+923084742715'),
(2, 'site_title', 'Heaven Marriage'),
(3, 'hero_title', 'Find Your Perfect Match'),
(4, 'hero_subtitle', 'Trusted by Millions');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `is_premium` tinyint(1) DEFAULT 0,
  `status` varchar(50) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_fake` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `is_premium`, `status`, `created_at`, `is_fake`) VALUES
(1, 'Admin User', 'admin@heavenmarriage.com', '$2y$10$zM.hWLu8ukE6WofDKktrq.HWsmx0mOWoJYPztXwGgTKOthI7HWbpS', 'admin', 1, 'approved', '2026-01-01 11:20:45', 0),
(5, 'Zain Sheikh', 'user1@example.com', '$2y$10$bowM7wMmrae2vD2QoaqSROLbNYUqkxXQUvnovPnUNL9V84j8eaH/2', 'user', 0, 'approved', '2026-01-14 13:39:07', 1),
(6, 'Hira Ahmed', 'user2@example.com', '$2y$10$3HgSFE4c5s8BbPkkhS5LeeKZ5jWrmlmel4lpyDecLOnxBF82JwAXK', 'user', 0, 'approved', '2026-01-14 13:39:08', 1),
(7, 'Laiba Hussain', 'user3@example.com', '$2y$10$pNt4r4FvUJCIQ18RiX71Ru65CPJlCDnJ6.hBcZ.J31EAxw6W45a9q', 'user', 0, 'approved', '2026-01-14 13:39:08', 1),
(8, 'Hira Chaudhry', 'user4@example.com', '$2y$10$zyj3xETuvoz/MeKgJqbbR.pBTwJPkW2Du1dbU/bl/hg3yJm71Rj8O', 'user', 0, 'approved', '2026-01-14 13:39:08', 1),
(9, 'Hassan Khan', 'user5@example.com', '$2y$10$AyYKMi6y/dwD4swHuN.FVu6XNLRa3qS/qiH4j.awGT.aqNpCUd10e', 'user', 0, 'approved', '2026-01-14 13:39:08', 1),
(10, 'Adeel Hussain', 'user6@example.com', '$2y$10$GtM.cmubOGw7zVSemB96Q.BzEIzR9qbo.lPKNTyIVaY.4QJb3wJtC', 'user', 0, 'approved', '2026-01-14 13:39:09', 1),
(11, 'Noor Butt', 'user7@example.com', '$2y$10$801lnCdR9H6.Io8Y/0EAFuupiOT0w0K8O0Yupnj/Cdm7y7l7rLehO', 'user', 0, 'approved', '2026-01-14 13:39:09', 1),
(12, 'Ayesha Raza', 'user8@example.com', '$2y$10$vMt6R8s0UgSDX7B//NiNPOKeSM9gZWMofj3IKY9JQlClwmNUu4MLK', 'user', 0, 'approved', '2026-01-14 13:39:09', 1),
(13, 'Maryam Hussain', 'user9@example.com', '$2y$10$39Lei4lrbGn4tqwYO/8MReHBxMlbJt/ynVnLKYYFmoUyxMAYITH2.', 'user', 0, 'approved', '2026-01-14 13:39:09', 1),
(14, 'Ayesha Sheikh', 'user10@example.com', '$2y$10$0mqyafZdXj/HGB1dV3rX6.3LTi7MPIj3DEwABurMJ4QZkvwyacgri', 'user', 0, 'approved', '2026-01-14 13:39:09', 1),
(15, 'Laiba Butt', 'user11@example.com', '$2y$10$ufLceAdbM1p7ZO4Mzo9EwuVbJt1EDQsX11FxxiK6U1sVN2.mD8oiy', 'user', 0, 'approved', '2026-01-14 13:39:10', 1),
(16, 'Anum Ahmed', 'user12@example.com', '$2y$10$kkmiYl8O90In8VJ4cNIJ/OxpJVKTbmJYl2w9to2O0pJ5ARA2iZ4tC', 'user', 0, 'approved', '2026-01-14 13:39:10', 1),
(17, 'Iqra Khan', 'user13@example.com', '$2y$10$YrVLBJIyWxAUVcKZhR085eFhfjqdSPv/QEcfF8dIy1pwckOnEh2ha', 'user', 0, 'approved', '2026-01-14 13:39:10', 1),
(18, 'Hira Hussain', 'user14@example.com', '$2y$10$gzvk3ibCSeNsKemL1hC5r.EcYY8IU4dUoXuEuEt4zj8xxe4IbQynS', 'user', 0, 'approved', '2026-01-14 13:39:11', 1),
(19, 'Noor Butt', 'user15@example.com', '$2y$10$DR.25z.XPKZc9PKJOru.euOBNXlO18VMB4s3rfhhdnsyT22r08fg2', 'user', 0, 'approved', '2026-01-14 13:39:11', 1),
(20, 'Farhan Malik', 'user16@example.com', '$2y$10$iFh10b.wb2UUtWvmiaPSiuKaFnRz1LafXopIexh/6dmHetPwWKCZG', 'user', 0, 'approved', '2026-01-14 13:39:11', 1),
(21, 'Hira Malik', 'user17@example.com', '$2y$10$SOBnNrKvKMc1iByPINLmCuvlk.kqOW/Jn7evEUBbs.ouzebwYfnVG', 'user', 0, 'approved', '2026-01-14 13:39:11', 1),
(22, 'Iqra Hussain', 'user18@example.com', '$2y$10$BnPxZgaK.0lDBBh6yc57qOwqsiZndTfXC3Fjtb2Q9qfVV58.mWDrq', 'user', 0, 'approved', '2026-01-14 13:39:11', 1),
(23, 'Ayesha Malik', 'user19@example.com', '$2y$10$wAcUxIfX6N0IDDUY9UlxnuVvFTIzJykbntOvZJC8MLSidKid9O86m', 'user', 0, 'approved', '2026-01-14 13:39:12', 1),
(24, 'Zainab Malik', 'user20@example.com', '$2y$10$6YnvrDlkCwPThrHzeakvoOrM3eVQH2eqJE6OCRejwZJ4WvVc8zmQa', 'user', 0, 'approved', '2026-01-14 13:39:12', 1),
(25, 'Maryam Butt', 'user21@example.com', '$2y$10$WKMsRyiqBp5EQuj3NoW2LO5BV8lxuUg.OePggrCj64niWdNPEcitW', 'user', 0, 'approved', '2026-01-14 13:39:12', 1),
(26, 'Ahmed Butt', 'user22@example.com', '$2y$10$xEAdezddvSpVtQl9RHxjVu60NX7FTxXOD9xMJU86FjjfzDHIO2UEq', 'user', 0, 'approved', '2026-01-14 13:39:12', 1),
(27, 'Laiba Ahmed', 'user23@example.com', '$2y$10$4oDkQS/aFdlhOWnXI7KB5e0y9kGUaNBQXmuBmp1UPmRpzGApfRg62', 'user', 0, 'approved', '2026-01-14 13:39:12', 1),
(28, 'Anum Sheikh', 'user24@example.com', '$2y$10$dqIAuQEU963D6.vF9T8Wn.AUMGUGA3Ql8ZNp265TBitM22aXk.1m6', 'user', 0, 'approved', '2026-01-14 13:39:13', 1),
(29, 'Ahmed Ahmed', 'user25@example.com', '$2y$10$.TB2M7XUaeM/nlvhGBZ9.eqV8Cs1bd8ZkeIKW2FSJtOekSbKJogcy', 'user', 0, 'approved', '2026-01-14 13:39:13', 1),
(30, 'Imran Hussain', 'user26@example.com', '$2y$10$QTTVcGbQhzeXapq81pOWXeW72ASWsH1Z1QJ9gsMuhCdV6OOT.zeum', 'user', 0, 'approved', '2026-01-14 13:39:13', 1),
(31, 'Hassan Raza', 'user27@example.com', '$2y$10$EcU2B3P3bZSr357IciMpPOsCqgTzVaN0wPNYo20M.Q/QN.uKHPO6C', 'user', 0, 'approved', '2026-01-14 13:39:13', 1),
(32, 'Laiba Hussain', 'user28@example.com', '$2y$10$gfj73vfc2kfJAtu5m2k3huup/7uTpqxPD3U/QR5i7GpiCD1jFjPq2', 'user', 0, 'approved', '2026-01-14 13:39:13', 1),
(33, 'Hira Chaudhry', 'user29@example.com', '$2y$10$3Zq9Gs6G.4gJoeyk.CSQWu.fF8nKTaLzYNYAUwsHZS5ENukBJMnDO', 'user', 0, 'approved', '2026-01-14 13:39:14', 1),
(34, 'Usman Hussain', 'user30@example.com', '$2y$10$lyCegTdD2AbYlwonEOTKKeJvETBYIVAteRX/fTwlnPHVr2qXRKIr2', 'user', 0, 'approved', '2026-01-14 13:39:14', 1),
(35, 'Zainab Chaudhry', 'user31@example.com', '$2y$10$koHPe5OjNo39SxHtCpclu.8j12uYkLoBRlopa11Evt6N.fB..byjy', 'user', 0, 'approved', '2026-01-14 13:39:14', 1),
(36, 'Usman Khan', 'user32@example.com', '$2y$10$Rg7VqLJA4oHW6MQgwKu4uubmVQVLIa2D0XVxz0uhBKvI01VjJlx.i', 'user', 0, 'approved', '2026-01-14 13:39:15', 1),
(37, 'Bilal Khan', 'user33@example.com', '$2y$10$7XXU6Qdnya9eIpjskFykL.dxaoe/7PkXWcbCDa.8IrJPgqNYFLwkS', 'user', 0, 'approved', '2026-01-14 13:39:15', 1),
(38, 'Fatima Hussain', 'user34@example.com', '$2y$10$0d/BkTSZLQfN7Qw944CMae8S7bnXPihIWMhR7gcN4zHnd.7I9iVoe', 'user', 0, 'approved', '2026-01-14 13:39:15', 1),
(39, 'Maryam Malik', 'user35@example.com', '$2y$10$WFVdPUdR8S4eWJYuO5yR/u/DIGP81iJ5nsiN8Y.iSsapZ72yDAFe2', 'user', 0, 'approved', '2026-01-14 13:39:16', 1),
(40, 'Hamza Raza', 'user36@example.com', '$2y$10$/CWn2oaV4derDjTe1Db/m.uDrY2/Tf74hh1xzUsy5unE3.BGE5rby', 'user', 0, 'approved', '2026-01-14 13:39:16', 1),
(41, 'Ayesha Butt', 'user37@example.com', '$2y$10$m1ehhr8f/olepwUpOyHJv./KcUjSlGMRuW/orv1Ii6ey1YH1WwNn6', 'user', 0, 'approved', '2026-01-14 13:39:16', 1),
(42, 'Usman Malik', 'user38@example.com', '$2y$10$CUTh8uaLmaocrCcq/crcQejINahkNXbMyHVBmUYmoSRVTrYDPep7m', 'user', 0, 'approved', '2026-01-14 13:39:16', 1),
(43, 'Ayesha Khan', 'user39@example.com', '$2y$10$f3sgZna6pYGb0CerctWlnu8Q1tLssfPJRVTh4Eob6bcgmTc.LGpXC', 'user', 0, 'approved', '2026-01-14 13:39:17', 1),
(44, 'Zainab Malik', 'user40@example.com', '$2y$10$IVbaWUyyC4aM0fyzTCwvlOXEqstksfxRcMC2P5zqn3V.xdLfVb4I.', 'user', 0, 'approved', '2026-01-14 13:39:17', 1),
(45, 'Imran Malik', 'user41@example.com', '$2y$10$IYz8OD9N.q9fzQp4iPo3Eu5jZfuD6j2/EVxsRkxU.9Rmc04T4rdgC', 'user', 0, 'approved', '2026-01-14 13:39:17', 1),
(46, 'Bilal Chaudhry', 'user42@example.com', '$2y$10$5SsG89BK6Br7/j02Sm3ZUe6tj/Tswo10AAEGZVCXunDK.EMdqcU4C', 'user', 0, 'approved', '2026-01-14 13:39:18', 1),
(47, 'Farhan Hussain', 'user43@example.com', '$2y$10$yMUwOzXFa1i2bNq240hd1OMR.4Axsrfr6YOH8AzkaKsCTQUI4xYD6', 'user', 0, 'approved', '2026-01-14 13:39:18', 1),
(48, 'Hamza Butt', 'user44@example.com', '$2y$10$VbboS2XJ0Kd9K3WbRF25OuIkGB/hkDBMRJL3zGt3D3DtSu7hMhG7S', 'user', 0, 'approved', '2026-01-14 13:39:18', 1),
(49, 'Fatima Ahmed', 'user45@example.com', '$2y$10$maTbKn0NKnjI8c58lLOvbOP1FM9zgPAgYFjRfQAulVSPr/40Zxc5S', 'user', 0, 'approved', '2026-01-14 13:39:19', 1),
(50, 'Bilal Chaudhry', 'user46@example.com', '$2y$10$GV6EuRHDZQKRMEwP45GsTO2YGWnZ2X3AG.o5jDnJtIZ07.P1WcnvC', 'user', 0, 'approved', '2026-01-14 13:39:19', 1),
(51, 'Ayesha Chaudhry', 'user47@example.com', '$2y$10$o4LtmWRG37KEVn5YBxMAr.TrlB7MwMna75zXtoGdyFiL5OL1tmGIa', 'user', 0, 'approved', '2026-01-14 13:39:19', 1),
(52, 'Ayesha Butt', 'user48@example.com', '$2y$10$sQWb5s9imb8GBDj9Svo4a..9PS8oO8cHCfbszyfGIHZatlsriK6Ie', 'user', 0, 'approved', '2026-01-14 13:39:19', 1),
(53, 'Sana Malik', 'user49@example.com', '$2y$10$p/zK8ikC3fdlK87WY8hZzu2LxRq7vREk4eezsxDvZse57ERbKz2SK', 'user', 0, 'approved', '2026-01-14 13:39:20', 1),
(54, 'Usman Butt', 'user50@example.com', '$2y$10$xCaG1guPVrD485vmGtrbCuH9eRyGv1eUT5sSQNnFghByXRoUIA8yS', 'user', 0, 'approved', '2026-01-14 13:39:20', 1),
(55, 'Noor Ahmed', 'user51@example.com', '$2y$10$risU8cM9VT3wotgNmOrr7uLDJzEWu3e2JHDx7l8wT63/hSRxKYth6', 'user', 0, 'approved', '2026-01-14 13:39:20', 1),
(56, 'Hira Raza', 'user52@example.com', '$2y$10$FPPlCxgSA7IDxDIcS8U3de2f8z/2qQBbvrXRHAEXlg3DE8D5wl7ZO', 'user', 0, 'approved', '2026-01-14 13:39:20', 1),
(57, 'Usman Raza', 'user53@example.com', '$2y$10$iXKzNA4FPWwRG/ewY7eZAuW42iULbBGBYZUJURhZC63vdbSNs.1Su', 'user', 0, 'approved', '2026-01-14 13:39:21', 1),
(58, 'Ayesha Butt', 'user54@example.com', '$2y$10$ik9GeBiU0R4igALAyqRHzeETX17yTgC4GSFmH2sz96roEOhhvhGsK', 'user', 0, 'approved', '2026-01-14 13:39:21', 1),
(59, 'Fatima Malik', 'user55@example.com', '$2y$10$2ekg/Zbut3cOhZyTmwg13.MqNqBIXEp7RzVspv5bgIIQNza3NG4Si', 'user', 0, 'approved', '2026-01-14 13:39:21', 1),
(60, 'Ayesha Raza', 'user56@example.com', '$2y$10$qbDUb5D8bC70ziYgANRe7OA5..3I7EPgh0OLJvYhr6O3uGYnlQ2ZG', 'user', 0, 'approved', '2026-01-14 13:39:21', 1),
(61, 'Iqra Malik', 'user57@example.com', '$2y$10$6/YIMRqUpbfCLcDxKe4aN.Pt//0g/.wt4ZEmr3cRMp2jxi/y35Kum', 'user', 0, 'approved', '2026-01-14 13:39:21', 1),
(62, 'Zainab Sheikh', 'user58@example.com', '$2y$10$sfDHee3i.7hWMG6F0zHkf.rJHiHZkC0ZiR9xo1jY04kA6dePSgPnm', 'user', 0, 'approved', '2026-01-14 13:39:22', 1),
(63, 'Imran Butt', 'user59@example.com', '$2y$10$qT5SaLVHZa5ZkE0jBHufj.aMdf49rb.laRaY0rdCiM9/mphrkVk.G', 'user', 0, 'approved', '2026-01-14 13:39:22', 1),
(64, 'Farhan Khan', 'user60@example.com', '$2y$10$MvduV6EAroj3HB3COAd.2euw9V3R4qFdISNX.T7leqphcljTaBsBm', 'user', 0, 'approved', '2026-01-14 13:39:22', 1),
(65, 'Ahmed Raza', 'user61@example.com', '$2y$10$s5x4R9oBPJVyfSeeD5F6EOt9XsCtDVNZlz5z2Pj4vZWNc9Tkmi36u', 'user', 0, 'approved', '2026-01-14 13:39:23', 1),
(66, 'Farhan Chaudhry', 'user62@example.com', '$2y$10$YYxOBpNpd27GaqSeTj4MI.HTiI/ydP7R2yRM2oUNGCCw7tiJJc87e', 'user', 0, 'approved', '2026-01-14 13:39:23', 1),
(67, 'Farhan Raza', 'user63@example.com', '$2y$10$lIQhN1Il6OxRMsH7T253r.ZmVothsFadat0fzuDwqpbdMPOjQT4Re', 'user', 0, 'approved', '2026-01-14 13:39:23', 1),
(68, 'Noor Khan', 'user64@example.com', '$2y$10$PSDpoQYkb1y5AVZQ1QL0duTORKSGLZOsRtvBNqRPnz3jBdQ956eTW', 'user', 0, 'approved', '2026-01-14 13:39:23', 1),
(69, 'Anum Sheikh', 'user65@example.com', '$2y$10$.XRI7zrQ31E8rq0Ft4mmcewTOT266Wt0J70ZB0jbQkrjo3HVbMz0O', 'user', 0, 'approved', '2026-01-14 13:39:24', 1),
(70, 'Anum Hussain', 'user66@example.com', '$2y$10$LDu5iAq7cw5zMnajAZAuM.8ZJKRTGfqATUUBoa98eh5lOB.ZCJKdi', 'user', 0, 'approved', '2026-01-14 13:39:24', 1),
(71, 'Iqra Butt', 'user67@example.com', '$2y$10$uqZ1N3uYQ6ADxCBygSa2Muln89igtBgH9IAd40R1/N/QhsTNxOXvS', 'user', 0, 'approved', '2026-01-14 13:39:24', 1),
(72, 'Iqra Sheikh', 'user68@example.com', '$2y$10$hObQNSr51L3FNtPDlEgtjun37dXrWIv.ZsL408mWlTHhbCUzLELrK', 'user', 0, 'approved', '2026-01-14 13:39:24', 1),
(73, 'Imran Raza', 'user69@example.com', '$2y$10$7VcJVQsyPk0oNDgpf7yFBe6Gmw6PglhkFTsU29OoNXi7H3/qRZYKy', 'user', 0, 'approved', '2026-01-14 13:39:25', 1),
(74, 'Maryam Sheikh', 'user70@example.com', '$2y$10$HjGXHt86ORx.uVtu9ikWGenwOxbZzoMyNddkwCo7j4e3tEt.KOkym', 'user', 0, 'approved', '2026-01-14 13:39:25', 1),
(75, 'Usman Khan', 'user71@example.com', '$2y$10$8iXiMAyMetRc.VepXEgYKuWu4faJEqF61WKPGzGSnCb.PgXEAt2R.', 'user', 0, 'approved', '2026-01-14 13:39:25', 1),
(76, 'Adeel Malik', 'user72@example.com', '$2y$10$sCuPxxDX4RZvwO/rPNMBb.wamq.pmubjhHG83s8wCASXl4CBUgnR2', 'user', 0, 'approved', '2026-01-14 13:39:26', 1),
(77, 'Iqra Khan', 'user73@example.com', '$2y$10$nIahTovGcaGejHS99IrMi.eg4JKC7XDqF.SjZtVSd1onHrQPvbpga', 'user', 0, 'approved', '2026-01-14 13:39:26', 1),
(78, 'Hassan Sheikh', 'user74@example.com', '$2y$10$CnrRGWyUUOvtXHd/dXkGU.qUQCK5ukpT3CqsEcjN6XyHyEulfqqp.', 'user', 0, 'approved', '2026-01-14 13:39:26', 1),
(79, 'Anum Hussain', 'user75@example.com', '$2y$10$Z3Gyjq4U27dfQVvvPcZFC.xORJqinM20PAuM4cPONC80twrZ3ITa.', 'user', 0, 'approved', '2026-01-14 13:39:26', 1),
(80, 'Fatima Chaudhry', 'user76@example.com', '$2y$10$iAp09o3.sWBU4JL720x/CeOUVnEqTixpVVCshyhsvxCgJgQ8PaJv.', 'user', 0, 'approved', '2026-01-14 13:39:27', 1),
(81, 'Noor Sheikh', 'user77@example.com', '$2y$10$4.beO0S5K5dwJfWdqNtc.OCu0YbGlRk/yQ0rltk1PlSNnd7V6Sm36', 'user', 0, 'approved', '2026-01-14 13:39:27', 1),
(82, 'Fatima Malik', 'user78@example.com', '$2y$10$RZREcPRs6V4IyzHXkEH4HOMGI4afaMiG.Bsh0MNC70fqfm2L4BiLy', 'user', 0, 'approved', '2026-01-14 13:39:27', 1),
(83, 'Zainab Hussain', 'user79@example.com', '$2y$10$t99V4cgsJ5LBcWYndD/XveoK72PLgslfmx69ryKJS.DeLeHQ.OwOe', 'user', 0, 'approved', '2026-01-14 13:39:27', 1),
(84, 'Hira Khan', 'user80@example.com', '$2y$10$NUrJ7HBDqa8etiLRUDtfDuFJwWw/o7yL/dcGEkr/b4655iFEBJao.', 'user', 0, 'approved', '2026-01-14 13:39:27', 1),
(85, 'Ali Chaudhry', 'user81@example.com', '$2y$10$8Wc0CcXu18n6bQxO4ipX2.5lP.tW/BYJATFMWKjrcVgQCE5.HQBYG', 'user', 0, 'approved', '2026-01-14 13:39:28', 1),
(86, 'Laiba Sheikh', 'user82@example.com', '$2y$10$GYlTikeCXfp55sS77gKWw.mq27vVW2npv9On4V3Ajx9OUNIGXBx1u', 'user', 0, 'approved', '2026-01-14 13:39:28', 1),
(87, 'Zainab Raza', 'user83@example.com', '$2y$10$JM5rKcxYAvIkquVgFYqgUuw8MA3Igs9DN0du7hIqPjqjPyYKbV9H2', 'user', 0, 'approved', '2026-01-14 13:39:28', 1),
(88, 'Laiba Butt', 'user84@example.com', '$2y$10$8c2EKhkBNXAt4ru6EY0FUeAWBJqnmWP2RVcutMhcJx/nKKOa/Wlr2', 'user', 0, 'approved', '2026-01-14 13:39:28', 1),
(89, 'Hamza Khan', 'user85@example.com', '$2y$10$BsCstLgHf2C9oqIrhh3tiO0ofb1Pb5V.jjBoduGqzppY36B8Af9L.', 'user', 0, 'approved', '2026-01-14 13:39:29', 1),
(90, 'Adeel Sheikh', 'user86@example.com', '$2y$10$U6HBWV2Dv1ZDB3pque2v6e8kkj1/UT7DetdO/amcqsKg4J2nDRk6O', 'user', 0, 'approved', '2026-01-14 13:39:29', 1),
(91, 'Hamza Malik', 'user87@example.com', '$2y$10$BGwcTty/27IiJEJcmlgRAuwb.LAbPkFQJRyyAWthbLnJ0ELb4z6gW', 'user', 0, 'approved', '2026-01-14 13:39:29', 1),
(92, 'Ahmed Sheikh', 'user88@example.com', '$2y$10$n3jsLzUU2qV0onJAPB4etuxStaGFWZK2xUNYz7v97XTXfW3U/bGim', 'user', 0, 'approved', '2026-01-14 13:39:29', 1),
(93, 'Usman Khan', 'user89@example.com', '$2y$10$gX3S3LwfYSlOsZBzqpYJQ.8a/jSFcc0.eOgq4dWTnGc6gNshuKsUy', 'user', 0, 'approved', '2026-01-14 13:39:30', 1),
(94, 'Anum Hussain', 'user90@example.com', '$2y$10$8CIgbgFveLYIXDVuWNDxiOIRxCebaTaIejlzUo.SMRCFBeIniRjk6', 'user', 0, 'approved', '2026-01-14 13:39:30', 1),
(95, 'Hira Khan', 'user91@example.com', '$2y$10$i9KQgbU1K.EzueoncNo5MuEE4EyxxUDt2FePyQ/fUtN/hCegb7..u', 'user', 0, 'approved', '2026-01-14 13:39:30', 1),
(96, 'Iqra Sheikh', 'user92@example.com', '$2y$10$TFFeBi1JF9vGQXqfpyas5OqlZh64.PTLSdauefg.ku4fOF/ZNg80G', 'user', 0, 'approved', '2026-01-14 13:39:30', 1),
(97, 'Ahmed Malik', 'user93@example.com', '$2y$10$cZy6RGgLFxUOJWdWMcttnep3HJMGkfu3t26imLKaIFXjKPXT6BNgS', 'user', 0, 'approved', '2026-01-14 13:39:31', 1),
(98, 'Bilal Khan', 'user94@example.com', '$2y$10$hwg87ZQyYgpq36qaEXRpCOV6Nwy3TRdcqMsV4A1ilt/nqoNq9n3X.', 'user', 0, 'approved', '2026-01-14 13:39:31', 1),
(99, 'Farhan Ahmed', 'user95@example.com', '$2y$10$UgXjBJJ1adR9SyO4hoyrJeDvM44J5AUaEjISkQhOduoFRag.qKYeS', 'user', 0, 'approved', '2026-01-14 13:39:31', 1),
(100, 'Adeel Raza', 'user96@example.com', '$2y$10$5MM8m6POucrUM9ncva0RAOqIFgFdCAnRz1u9JpgI6rcyJVwoYVrTu', 'user', 0, 'approved', '2026-01-14 13:39:31', 1),
(101, 'Bilal Butt', 'user97@example.com', '$2y$10$ztFFWc5Y//SSQyjHK/qWceh1y38tQ/hXY3/NCc3w36wKpCkaU3F7u', 'user', 0, 'approved', '2026-01-14 13:39:31', 1),
(102, 'Adeel Butt', 'user98@example.com', '$2y$10$L6W2/jrYe5zXA2APrYduVOojOMUa6qzAOHNrr03j9p.srNCsJoHZK', 'user', 0, 'approved', '2026-01-14 13:39:32', 1),
(103, 'Zain Butt', 'user99@example.com', '$2y$10$sdbiVtN7o6u16wTv6fU6XeklNOYvzo7u71dWzPRO5c84j24SNyfhe', 'user', 0, 'approved', '2026-01-14 13:39:32', 1),
(104, 'Imran Sheikh', 'user100@example.com', '$2y$10$wGu/4P7DtvXDIbNLaQE20u7U/p5Yz0.0gpjFGOCvhmAUnWLMaadNm', 'user', 0, 'approved', '2026-01-14 13:39:32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
