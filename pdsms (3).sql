-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 06:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aboutbanner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vmgpicture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visiontitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visionprgph1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visionprgph2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missiontitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `missionprgph1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `missionprgph2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goaltitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goalprgph1` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goalprgph2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintitledescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weddesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cfdescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievementbg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `happydesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievementdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yearsofexp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hscustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patientsperyear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `aboutbanner`, `vmgpicture`, `visiontitle`, `visionprgph1`, `visionprgph2`, `missiontitle`, `missionprgph1`, `missionprgph2`, `goaltitle`, `goalprgph1`, `goalprgph2`, `picture`, `maintitle`, `maintitledescription`, `weddesc`, `cfdescription`, `ccdesc`, `achievementbg`, `happydesc`, `achievementdesc`, `yearsofexp`, `hscustomer`, `patientsperyear`, `created_at`, `updated_at`) VALUES
(1, 'bg-1docnelson.jpg', 'about.jpg', 'We Offer High Quality Services', 'The Polytechnic University of the Philippines Taguig Clinic aims to provide prompt, efficient and quality health care services to students, school personnel and its adopted community. It strives in providing holistic medical and dental care that will facilitate mental, physical and emotional development of every students and employees.', 'The school clinic also endeavors in participating actively in activities and programs which will promote and improve the health of the community.', 'To Accomodate All Patients', 'In line with the mission of Polytechnic University of the Philippines to educate the mind, body and soul, the mission of the campus clinic is to assure that the health of the students is at optimum condition for learning.', 'The campus clinic also provides health services to the institutions faculty and administrative staff so that effective service would be delivered to the student body.', 'Help Our Customers Needs', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur', 'doc_nelson.jpg', 'PDSMS with a personal touch', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'bg-1docnelson.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '12', '7890', '888', '2021-07-27 07:44:29', '2021-07-27 07:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcementtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcementdescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement1`, `announcement2`, `announcement3`, `announcementtitle`, `announcementdescription`, `created_at`, `updated_at`) VALUES
(1, '1629445128.jpg', 'dms_for_page_banner2.jpg', 'dms_for_page_banner3.jpg', 'Attention to all students of PUP Taguig', 'Due to pandemic, dental clinic of PUP Taguig is still closed. Sorry for the inconvinience.', '2021-07-27 07:44:29', '2021-08-28 06:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'No description.',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `service_id`, `date`, `time`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 54, 8, '2021-08-20', '8:00 - 9:00 AM', 'fdfdfadfsdfsdfsdff', 'Closed', '2021-07-28 16:24:07', '2021-08-27 04:51:11', NULL),
(2, 42, 1, '2021-07-30', '8:00 - 9:00 AM', NULL, 'Closed', '2021-07-28 16:25:31', '2021-08-30 09:40:16', NULL),
(3, 43, 1, '2021-07-30', '8:00 - 9:00 AM', NULL, 'Scheduled', '2021-07-28 16:26:00', '2021-08-27 04:53:03', NULL),
(4, 44, 1, '2021-07-30', '13:26:00', NULL, 'Pending', '2021-07-28 16:26:30', '2021-07-28 16:26:30', NULL),
(5, 45, 4, '2021-08-25', '3:00 - 4:00 PM', NULL, 'Closed', '2021-07-28 16:32:22', '2021-08-25 01:34:57', NULL),
(6, 46, 5, '2021-07-31', '10:35:00', NULL, 'Pending', '2021-07-28 16:33:38', '2021-07-28 16:33:38', NULL),
(7, 47, 6, '2021-07-31', '11:33:00', NULL, 'Pending', '2021-07-28 16:34:01', '2021-07-28 16:34:01', NULL),
(8, 48, 12, '2021-08-01', '8:00 - 9:00 AM', NULL, 'Scheduled', '2021-07-28 16:34:27', '2021-09-01 18:44:15', NULL),
(9, 49, 14, '2021-08-02', '11:34:00', NULL, 'Pending', '2021-07-28 16:34:53', '2021-07-28 16:34:53', NULL),
(10, 50, 2, '2021-08-03', '13:36:00', NULL, 'Pending', '2021-07-28 16:36:49', '2021-07-28 16:36:49', NULL),
(11, 51, 4, '2021-08-10', '10:00 - 11:00 AM', NULL, 'Closed', '2021-07-28 16:38:11', '2021-09-06 00:10:57', NULL),
(12, 52, 7, '2021-08-19', '14:38:00', NULL, 'Pending', '2021-07-28 16:38:45', '2021-07-28 16:38:45', NULL),
(13, 55, 3, '2021-08-26', '10:00 - 11:00 AM', NULL, 'Scheduled', '2021-07-28 16:39:24', '2021-09-11 14:51:02', NULL),
(14, 82, 2, '2021-07-29', '8:00 - 9:00 AM', 'Done!', 'Closed', '2021-07-28 17:24:20', '2021-09-08 19:19:42', NULL),
(15, 54, 1, '2021-08-25', '04:06:00', NULL, 'Closed', '2021-08-23 10:04:53', '2021-08-23 10:28:28', NULL),
(16, 1, 3, '2021-09-22', '9:00 - 10:00 AM', NULL, 'Scheduled', '2021-08-24 03:16:50', '2021-09-20 15:18:19', NULL),
(17, 64, 2, '2021-09-22', '8:00 - 9:00 AM', NULL, 'Pending', '2021-09-20 18:33:17', '2021-09-20 18:33:17', NULL),
(18, 60, 5, '2021-09-22', '9:00 - 10:00 AM', NULL, 'Pending', '2021-09-20 18:35:24', '2021-09-20 18:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_transactions`
--

CREATE TABLE `appointment_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointments_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_transactions`
--

INSERT INTO `appointment_transactions` (`id`, `appointments_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 18, 1, '2021-09-20 18:35:25', '2021-09-20 18:35:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dentists`
--

CREATE TABLE `dentists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dentistbanner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dentistbannertitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titletext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff1image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff1name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff1position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff1desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff1twitterlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff1fblink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff1instalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff1gmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff2image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff2name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff2position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff2desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff2twitterlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff2fblink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff2instalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff2gmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dentists`
--

INSERT INTO `dentists` (`id`, `dentistbanner`, `dentistbannertitle`, `titletext`, `shortdesc`, `staff1image`, `staff1name`, `staff1position`, `staff1desc`, `staff1twitterlink`, `staff1fblink`, `staff1instalink`, `staff1gmail`, `staff2image`, `staff2name`, `staff2position`, `staff2desc`, `staff2twitterlink`, `staff2fblink`, `staff2instalink`, `staff2gmail`, `created_at`, `updated_at`) VALUES
(1, 'bg-1docnelson.jpg', 'Well Experienced Dentists', 'Meet Our Experience Dentist', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.', 'doc_nelson.jpg', 'Nelson P. Angeles', 'University Dentist', 'Far far away, behind the word mountains, far from the countries Vokalia', '#', '#', '#', '#', 'doc_lim.jpg', 'Ronilo I. Lim', 'Dental Aide', 'Far far away, behind the word mountains, far from the countries Vokalia', '#', '#', '#', '#', '2021-07-27 07:44:29', '2021-07-27 07:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banneronetitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banneronedescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannertwotitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannertwodescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannerthreetitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannerthreedescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallerydesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `systemtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `systemdescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dentaltwitterlink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dentalfblink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dentalinstalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dentaladdress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dentalphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dentalemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `logo`, `banner1`, `banneronetitle`, `banneronedescription`, `banner2`, `bannertwotitle`, `bannertwodescription`, `banner3`, `bannerthreetitle`, `bannerthreedescription`, `gallerydesc`, `picture1`, `picture2`, `picture3`, `picture4`, `contactdesc`, `systemtitle`, `systemdescription`, `dentaltwitterlink`, `dentalfblink`, `dentalinstalink`, `dentaladdress`, `dentalphone`, `dentalemail`, `created_at`, `updated_at`) VALUES
(1, 'pdsms_site_logo.png', 'dms_for_page_banner1.jpg', 'Modern Dentistry in a Calm and Relaxed Environment', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'dms_for_page_banner2.jpg', 'Modern Achieve Your Desired Perfect Smile', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'dms_for_page_banner3.jpg', 'Dentists Make Great Flossophers', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', '1629442528.jpg', 'gallery-2.jpg', 'gallery-3.jpg', 'gallery-4.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'PATIENT AND DENTAL SUPPLY MONITORING SYSTEM', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '#', '#', '#', 'General Santos Avenue, Lower Bicutan, Taguig City', '12345678900', 'puptdental@gmail.com', '2021-07-27 07:44:29', '2021-08-19 22:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration_date` date NOT NULL,
  `date_received` date NOT NULL,
  `unit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `danger_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`, `expiration_date`, `date_received`, `unit`, `danger_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mefenamic Acid - 500mg', '2021-09-22', '2021-09-12', 'pcs', '20', '2021-09-12 14:44:17', '2021-09-20 21:13:02', NULL),
(2, 'Paracetamol 500-mg', '2022-05-16', '2021-09-16', 'pcs', '20', '2021-09-16 06:16:42', '2021-09-16 06:16:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stocks`
--

CREATE TABLE `medicine_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicines_id` bigint(20) UNSIGNED NOT NULL,
  `current_stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `consumed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_stocks`
--

INSERT INTO `medicine_stocks` (`id`, `medicines_id`, `current_stock`, `consumed`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '0', '0', '0', '2021-09-12 14:44:19', '2021-09-12 14:57:51', NULL),
(2, 2, '200', '180', '20', '2021-09-16 06:16:46', '2021-09-20 20:06:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_transactions`
--

CREATE TABLE `medicine_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicines_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_transactions`
--

INSERT INTO `medicine_transactions` (`id`, `medicines_id`, `user_id`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, '+200', '2021-09-16 06:17:44', '2021-09-16 06:17:44', NULL),
(2, 2, 1, '-100', '2021-09-16 06:18:17', '2021-09-16 06:18:17', NULL),
(3, 2, 1, '-80', '2021-09-20 20:06:38', '2021-09-20 20:06:38', NULL),
(4, 2, 1, '-10', '2021-09-20 20:09:03', '2021-09-20 20:09:03', NULL);

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
(6, '2021_05_04_222348_create_assets_table', 1),
(7, '2021_05_04_222540_create_teams_table', 1),
(8, '2021_05_04_222636_create_stocks_table', 1),
(9, '2021_05_04_222749_create_transactions_table', 1),
(10, '2021_05_04_222954_add_relationship_fields_to_users', 1),
(11, '2021_05_04_223115_add_relationship_fields_to_stocks_table', 1),
(12, '2021_05_04_223219_add_relationship_fields_to_transactions_table', 1),
(13, '2021_05_04_223321_make_asset_and_team_unique_in_stocks_table', 1),
(14, '2021_05_04_223443_add_danger_level_field_to_assets_table', 1),
(31, '2021_05_07_002426_create_supplys_table', 3),
(39, '2021_05_20_173051_create_clients_table', 7),
(40, '2021_05_20_173211_create_appointments_table', 7),
(41, '2021_05_27_065632_create_services_table', 8),
(79, '2014_10_12_000000_create_users_table', 9),
(80, '2014_10_12_100000_create_password_resets_table', 9),
(81, '2019_08_19_000000_create_failed_jobs_table', 9),
(82, '2021_05_01_081554_create_permission_tables', 9),
(83, '2021_05_09_072854_create_supplys_table', 9),
(84, '2021_05_10_052810_create_medicines_table', 9),
(85, '2021_05_10_093058_create_patients_table', 9),
(86, '2021_05_27_090032_create_services_table', 9),
(87, '2021_06_02_161946_create_announcements_table', 9),
(88, '2021_06_08_081850_create_dentists_table', 9),
(89, '2021_06_10_021911_create_site_services_table', 9),
(90, '2021_06_10_071425_create_abouts_table', 9),
(91, '2021_06_12_012746_create_homes_table', 9),
(92, '2021_06_15_172115_create_appointments_table', 9),
(93, '2021_07_06_150749_create_events_table', 9),
(94, '2021_08_24_160136_add_patient_category_to_patients_table', 10),
(97, '2021_08_29_193141_add_group_class_to_patients_table', 11),
(98, '2021_09_02_164303_create_supply_stocks_table', 12),
(99, '2021_09_02_171522_create_supply_transactions_table', 13),
(100, '2021_09_10_141744_create_medicine_stocks_table', 14),
(101, '2021_09_10_141949_create_medicine_transactions_table', 14),
(102, '2021_09_13_085253_create_notifications_table', 15),
(103, '2021_09_21_020527_create_appointment_transactions_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('25f2c7e4-e7ab-4ff5-a7a8-3fcfc65154d5', 'App\\Notifications\\AppointmentTodayNotification', 'App\\Models\\User', 1, '{\"appointment\":\"Dentist have an appointment today.\"}', '2021-09-20 17:38:12', '2021-09-20 16:52:20', '2021-09-20 17:38:12'),
('30773e6d-7b9e-4849-9360-c49ff92e39ca', 'App\\Notifications\\ExpiredMedicineNotification', 'App\\Models\\User', 1, '{\"expired_medicine\":\"Expired medicine alert.\"}', '2021-09-23 14:19:23', '2021-09-21 16:57:57', '2021-09-23 14:19:23'),
('5d588658-eee5-4071-9c22-644b6e78fc9d', 'App\\Notifications\\ExpiredMedicineNotification', 'App\\Models\\User', 2, '{\"expired_medicine\":\"Expired medicine alert.\"}', NULL, '2021-09-21 16:57:57', '2021-09-21 16:57:57'),
('6c01a80e-ae45-42c6-838c-f05c1897d508', 'App\\Notifications\\AppointmentTomorrowNotification', 'App\\Models\\User', 1, '{\"appointment\":\"Dentist have an appointment tomorrow.\"}', '2021-09-20 17:38:12', '2021-09-20 17:11:07', '2021-09-20 17:38:12'),
('86a077dc-3989-4761-aa71-9c66b4462d00', 'App\\Notifications\\AppointmentTodayNotification', 'App\\Models\\User', 2, '{\"appointment\":\"Dentist have an appointment today.\"}', NULL, '2021-09-20 16:52:21', '2021-09-20 16:52:21'),
('d257ff8b-f6aa-4704-a299-1a6325b3980a', 'App\\Notifications\\AppointmentTomorrowNotification', 'App\\Models\\User', 1, '{\"appointment\":\"Dentist have an appointment tomorrow.\"}', '2021-09-20 17:38:12', '2021-09-20 17:22:17', '2021-09-20 17:38:12'),
('ddd97e42-1c1c-410d-a04b-81862c3bd4ab', 'App\\Notifications\\AppointmentTomorrowNotification', 'App\\Models\\User', 2, '{\"appointment\":\"Dentist have an appointment tomorrow.\"}', NULL, '2021-09-20 17:11:08', '2021-09-20 17:11:08'),
('ef03da6d-7e2d-4093-961e-8fa68d8cdf5c', 'App\\Notifications\\AppointmentTomorrowNotification', 'App\\Models\\User', 2, '{\"appointment\":\"Dentist have an appointment tomorrow.\"}', NULL, '2021-09-20 17:22:17', '2021-09-20 17:22:17');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extensionname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactnumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `streetnumber` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `streetname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brgy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `med_history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allergies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medication` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `middlename`, `lastname`, `extensionname`, `patient_category`, `group_class`, `picture`, `gender`, `birthday`, `email`, `contactnumber`, `streetnumber`, `streetname`, `brgy`, `district`, `city`, `med_history`, `allergies`, `medication`, `others`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Patient', 'Patient', 'Patient', NULL, 'Administrator', 'N/A', '1629827668.jpg', 'Male', '2000-11-28', 'patient@gmail.com', '09241230992', '123', 'Niyog', 'BF Homes', 'District II', 'Paranaque', '[\"High Blood\",\"Heart Attack\",\"Stroke\",\"Respiratory Disease\",\"Diabetes\",\"Heart Disease\",\"Infection Disease\",\"Asthma\",\"Cancer\",\"Kidney Disease\",\"Thyroid Problems\",\"Ulcer\",\"Blood Disease\"]', NULL, NULL, NULL, NULL, '2021-07-27 08:28:38', '2021-09-07 22:57:55', NULL),
(2, 'Ursa', 'Major', 'Radiant', 'IV', 'Dependent', NULL, NULL, 'Female', '2000-12-15', 'xmi@yahoo.com', '09124560098', '345', 'Niyog', 'San Antonio', 'District 7', 'Taguig', NULL, NULL, NULL, NULL, NULL, '2021-07-27 10:26:59', '2021-08-24 10:17:27', NULL),
(42, 'Ed Mhar', 'Delante', 'Apura', NULL, 'Student', NULL, NULL, 'Male', '2000-03-20', 'mhar.apura@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-08-24 10:03:35', NULL),
(43, 'Jayson', 'Senias', 'Balatong', NULL, 'Student', NULL, NULL, 'Male', '1999-12-13', 'j.balatong1999@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(44, 'Chirstian Elvin', 'Rilvera', 'Bangga', NULL, 'Student', NULL, NULL, 'Male', '1998-12-13', 'ecbangga@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(45, 'Lailynette', 'Dela Cruz', 'Burton', NULL, 'Student', NULL, NULL, 'Female', '1999-10-08', 'llynttburton08@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-08-25 02:07:25', NULL),
(46, 'Charmie', 'Ablon', 'Cabanela', NULL, 'Student', NULL, NULL, 'Female', '2000-04-24', 'cabanelacharmie24@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(47, 'Joshua', 'Angob', 'Capalaran', NULL, 'Student', NULL, NULL, 'Male', '1999-11-27', 'joshuacapalaran27@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(48, 'Quiel Jeremiah', 'Ledesma', 'Cariaso', NULL, 'Student', NULL, NULL, 'Male', '2000-03-04', 'quieljeremiahcariaso04@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(49, 'Ken Zedric', 'Corpuz', 'Cortes', NULL, 'Student', NULL, NULL, 'Male', '1999-10-07', 'kzcortes27@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(50, 'John Russel', 'Larraquel', 'Dacanay', NULL, 'Student', NULL, NULL, 'Male', '2000-08-19', 'johnrusseldacanay@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(51, 'Edmon', 'Madronio', 'Dela Cruz', NULL, 'Student', NULL, NULL, 'Male', '1999-08-17', 'rhingmakz21@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-08-31 09:50:00', NULL),
(52, 'Erjohn', 'Sarmiento', 'Espuerta', NULL, 'Student', NULL, NULL, 'Male', '1999-03-30', 'erjohn13@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(53, 'Froilan', 'Dumaguin', 'Fernandez', NULL, 'Student', NULL, NULL, 'Male', '1999-03-26', 'froilanfernandez08@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(54, 'Raymond', NULL, 'Gabito', NULL, 'Student', NULL, NULL, 'Male', '1999-08-05', 'gabitoraymond358@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-08-31 07:33:56', NULL),
(55, 'Jerome', 'Bermudez', 'Jalandoon', NULL, 'Student', NULL, NULL, 'Male', '1999-04-28', 'jerome.jalandoon@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(56, 'Crisologo', 'Proto', 'Lapitan', 'IV', 'Student', NULL, NULL, 'Male', '2000-07-20', 'choilapitan47@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(57, 'Van Joakhim', 'Balquin', 'Laude', NULL, 'Student', NULL, NULL, 'Male', '1999-07-26', 'khimlaude@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(58, 'Christian', 'Cordero', 'Lazaro', NULL, 'Student', NULL, NULL, 'Male', '1999-11-03', 'lazarochan03@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(59, 'David', 'Laguiab', 'Limba', NULL, 'Student', NULL, NULL, 'Male', '1997-09-19', 'davidlimba19@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(60, 'Lenard', 'Jundis', 'Llacer', NULL, 'Student', NULL, NULL, 'Male', '2000-04-25', 'linijin17@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(61, 'Pauline Jane', 'Santos', 'Llagas', NULL, 'Student', NULL, NULL, 'Female', '1999-07-02', 'paulinellagas@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(62, 'Zairanih', 'Khusin', 'Lumabi', NULL, 'Student', NULL, NULL, 'Female', '1999-08-10', 'zklumabi@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(63, 'Nerissa', 'Copada', 'Maglente', NULL, 'Student', NULL, NULL, 'Female', '1999-12-03', 'nerissamaglente2@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(64, 'Jamrei', 'Marcelo', 'Manalo', NULL, 'Student', NULL, NULL, 'Male', '2000-10-06', 'jamreimanalo@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(65, 'Marcus Kim', 'Vibal', 'Manuel', NULL, 'Student', NULL, NULL, 'Male', '1998-04-29', 'marcusmanuel.pupt@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(66, 'Meriel Necole', 'Tagayong', 'Manuel', NULL, 'Student', NULL, NULL, 'Female', '2000-03-27', 'mnmerielmanuel@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(67, 'Jonh Carlo', 'Wamar', 'Navaja', NULL, 'Student', NULL, NULL, 'Male', '2000-02-29', 'jcnavaja28@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(68, 'Lessa Anne', 'Panganiban', 'Pascubillo', NULL, 'Student', NULL, NULL, 'Female', '2000-07-09', 'lezzaanne@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(69, 'Jillian', NULL, 'Pollescas', NULL, 'Student', NULL, NULL, 'Female', '1999-11-25', 'jillianpollescas@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(70, 'Mary Grace', 'Mallen', 'Ragpala', NULL, 'Student', NULL, NULL, 'Female', '2000-09-07', 'grasyamallen@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(71, 'Jasmine', 'Del Rosario', 'Rakim', NULL, 'Student', NULL, NULL, 'Female', '2000-09-03', 'rakimjasmine@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(72, 'Shailyn Joyce', 'Piloton', 'Sa - An', NULL, 'Student', NULL, NULL, 'Female', '2000-04-09', 'shailynjoycesaan@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(73, 'Jamie', 'Babaran', 'Samar', NULL, 'Student', NULL, NULL, 'Female', '1999-09-18', 'jamiesamar18@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(74, 'Aldrin', 'Inojales', 'Seroje', NULL, 'Student', NULL, NULL, 'Male', '1999-08-25', 'serojealdrin@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(75, 'John Timothy', 'Llega', 'Sescar', NULL, 'Student', NULL, NULL, 'Male', '2000-08-02', 'tmbrccl@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(76, 'Bernadette', 'Villanaba', 'Tradio', NULL, 'Student', NULL, NULL, 'Female', '1999-07-30', 'bernatrads4@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(77, 'Irish', 'Dacuma', 'Traquena', NULL, 'Student', NULL, NULL, 'Female', '2000-11-18', 'virginiatraquena@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:38:43', NULL),
(78, 'Carl Jon', 'Cruz', 'Ualat', NULL, 'Student', NULL, NULL, 'Male', '2000-04-06', 'siiidyyeeeyy@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(79, 'Alyssa Joanna', 'Oribe', 'Villanueva', NULL, 'Student', NULL, NULL, 'Female', '1999-10-14', 'alyvillanueva14@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(80, 'John Harvey', 'Caralde', 'Villegas', NULL, 'Student', NULL, NULL, 'Male', '1999-10-26', 'harveyjohn1926@gmail.com', '19999999999', '#1', 'Street', 'Brgy', 'District', 'City', NULL, NULL, NULL, NULL, NULL, '2021-07-27 12:28:38', '2021-07-27 12:28:38', NULL),
(81, 'Patientzero', NULL, 'Subzero', NULL, 'Faculty', NULL, NULL, 'Male', '1999-11-28', 'patient0@gmail.com', '09999999992', '1', 'Street', 'brgy', 'district', 'city', NULL, 'Seafoods', 'dfdfdfd', 'fdfdfdf', NULL, '2021-07-27 13:14:06', '2021-07-28 17:16:10', NULL),
(82, 'Juan', NULL, 'Cruz', NULL, 'Faculty', NULL, NULL, 'Male', '2001-06-29', 'juan@gmail.com', '09124444441', '111', 'Chico', 'San dionisio', 'District 5', 'Paranaque', NULL, NULL, NULL, NULL, NULL, '2021-07-28 17:22:54', '2021-08-24 10:18:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list role', 'The user can view list of roles', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(2, 'create role', 'The user can create roles', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(3, 'edit role', 'The user can edit roles', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(4, 'create permission', 'The user can create permissions', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(5, 'show dashboard', 'The user can see dashboard', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(6, 'receive notification', 'The user can receive notification', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(7, 'create appointments', 'The user can create appointments', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(8, 'manage users', 'The user can manage users', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(9, 'create user', 'The user/admin can create user', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(10, 'manage account', 'The user can manage his/her account', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(11, 'manage patient', 'The user/admin can manage patients', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(12, 'manage medicines', 'The user can manage medicines', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(13, 'manage supply', 'The user/admin can manage supply', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(14, 'print reports', 'The user/admin can print reports', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(15, 'manage services', 'The user/admin can manage services', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(16, 'manage website', 'The user/admin can manage website', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(17, 'see notification', 'The user can see notifications', 'web', '2021-09-19 20:11:41', '2021-09-19 20:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-07-27 07:48:42', '2021-07-27 07:48:42'),
(2, 'Student Assistant', 'web', '2021-07-28 16:49:39', '2021-07-28 16:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Consultation', NULL, '2021-07-27 09:09:18', '2021-09-10 13:16:23', '2021-09-10 13:16:23'),
(2, 'Consultation with Medicine', NULL, '2021-07-27 09:09:18', '2021-07-27 09:09:18', NULL),
(3, 'Consultation with Prescription', NULL, '2021-07-27 09:09:18', '2021-07-27 09:09:18', NULL),
(4, 'Oral Prophylaxis', NULL, '2021-07-27 09:09:19', '2021-07-27 09:09:19', NULL),
(5, 'Amalgam', NULL, '2021-07-27 09:09:19', '2021-07-27 09:09:19', NULL),
(6, 'Composite', NULL, '2021-07-27 09:09:19', '2021-07-27 09:09:19', NULL),
(7, 'Temporary Filling', NULL, '2021-07-27 09:09:19', '2021-07-27 09:09:19', NULL),
(8, 'Extraction', NULL, '2021-07-27 09:09:19', '2021-07-27 09:09:19', NULL),
(9, 'Odontectomy', NULL, '2021-07-27 09:09:19', '2021-07-27 09:09:19', NULL),
(10, 'Frenectomy', NULL, '2021-07-27 09:09:20', '2021-07-27 09:09:20', NULL),
(11, 'Gingevectomy', NULL, '2021-07-27 09:09:20', '2021-07-27 09:09:20', NULL),
(12, 'Wound Suturing', NULL, '2021-07-27 09:09:20', '2021-07-27 09:09:20', NULL),
(13, 'Maryland Bridge', NULL, '2021-07-27 09:09:20', '2021-07-27 09:09:20', NULL),
(14, 'Suture Removal', NULL, '2021-07-27 09:09:20', '2021-07-27 09:09:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_services`
--

CREATE TABLE `site_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicebanner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicebannertitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicetitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicedescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tcdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qbdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dcdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `didesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tbdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_services`
--

INSERT INTO `site_services` (`id`, `servicebanner`, `servicebannertitle`, `servicetitle`, `servicedescription`, `twdesc`, `tcdesc`, `qbdesc`, `madesc`, `dcdesc`, `didesc`, `tbdesc`, `created_at`, `updated_at`) VALUES
(1, 'bg-1docnelson.jpg', 'Our Service Keeps you Smile', 'Our Service Keeps you Smile', 'A small river named Duden flows by their place and supplies it with the necessary regelialia.', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', '2021-07-27 07:44:29', '2021-07-27 07:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `supplys`
--

CREATE TABLE `supplys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supply_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danger_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_received` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplys`
--

INSERT INTO `supplys` (`id`, `supply_name`, `picture`, `unit`, `danger_level`, `date_received`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Supply 1', NULL, 'roll', '20', '2021-09-06', '2021-09-06 04:24:07', '2021-09-14 02:54:44', NULL),
(2, 'Supply 2', NULL, 'pcs', '40', '2021-09-07', '2021-09-06 17:15:54', '2021-09-06 17:15:54', NULL),
(3, 'Face masks', NULL, 'pcs', '20', '2021-09-16', '2021-09-16 06:45:14', '2021-09-16 06:45:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supply_stocks`
--

CREATE TABLE `supply_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplys_id` bigint(20) UNSIGNED NOT NULL,
  `current_stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `consumed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_stocks`
--

INSERT INTO `supply_stocks` (`id`, `supplys_id`, `current_stock`, `consumed`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '0', '0', '0', '2021-09-06 04:24:07', '2021-09-13 12:28:02', NULL),
(2, 2, '100', '50', '50', '2021-09-06 17:15:54', '2021-09-16 06:10:06', NULL),
(3, 3, '200', '50', '150', '2021-09-16 06:45:14', '2021-09-16 06:47:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supply_transactions`
--

CREATE TABLE `supply_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplys_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_transactions`
--

INSERT INTO `supply_transactions` (`id`, `supplys_id`, `user_id`, `stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '+100', '2021-09-13 12:25:59', '2021-09-13 12:25:59', NULL),
(2, 1, 1, '-20', '2021-09-13 12:26:18', '2021-09-13 12:26:18', NULL),
(3, 2, 1, '+100', '2021-09-16 06:09:30', '2021-09-16 06:09:30', NULL),
(4, 2, 1, '-50', '2021-09-16 06:10:03', '2021-09-16 06:10:03', NULL),
(5, 3, 1, '+200', '2021-09-16 06:46:57', '2021-09-16 06:46:57', NULL),
(6, 3, 1, '-50', '2021-09-16 06:47:23', '2021-09-16 06:47:23', NULL),
(7, 2, 1, '-20', '2021-09-20 19:51:44', '2021-09-20 19:51:44', NULL),
(8, 2, 1, '-20', '2021-09-20 19:53:26', '2021-09-20 19:53:26', NULL),
(9, 2, 1, '-100', '2021-09-20 19:56:31', '2021-09-20 19:56:31', NULL);

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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `photo`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Froilan Fernandez', 'admin@gmail.com', NULL, '$2y$10$JTevIny.aK4HFURfliTfH.uNMj5UdJhtLlQ9E3zsWECO10GqjojSG', NULL, '1629741041.jpg', NULL, '2021-07-27 07:48:41', '2021-08-23 09:50:41', NULL),
(2, 'Student Assistant', 'sa@gmail.com', NULL, '$2y$10$FDBAy.vSMkUuA4gBAXGvwueDuC8jVJDtTinNdq.Ygg0ue8lZTp4RO', '09122222221', 'avatar.jpg', NULL, '2021-07-28 16:51:33', '2021-07-28 16:51:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

--
-- Indexes for table `appointment_transactions`
--
ALTER TABLE `appointment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_transactions_appointments_id_foreign` (`appointments_id`),
  ADD KEY `appointment_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `dentists`
--
ALTER TABLE `dentists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_stocks`
--
ALTER TABLE `medicine_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_stocks_medicines_id_foreign` (`medicines_id`);

--
-- Indexes for table `medicine_transactions`
--
ALTER TABLE `medicine_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_transactions_medicines_id_foreign` (`medicines_id`),
  ADD KEY `medicine_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_services`
--
ALTER TABLE `site_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplys`
--
ALTER TABLE `supplys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply_stocks`
--
ALTER TABLE `supply_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supply_stocks_supplys_id_foreign` (`supplys_id`);

--
-- Indexes for table `supply_transactions`
--
ALTER TABLE `supply_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supply_transactions_supplys_id_foreign` (`supplys_id`),
  ADD KEY `supply_transactions_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `appointment_transactions`
--
ALTER TABLE `appointment_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentists`
--
ALTER TABLE `dentists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_stocks`
--
ALTER TABLE `medicine_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicine_transactions`
--
ALTER TABLE `medicine_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `site_services`
--
ALTER TABLE `site_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplys`
--
ALTER TABLE `supplys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supply_stocks`
--
ALTER TABLE `supply_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supply_transactions`
--
ALTER TABLE `supply_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment_transactions`
--
ALTER TABLE `appointment_transactions`
  ADD CONSTRAINT `appointment_transactions_appointments_id_foreign` FOREIGN KEY (`appointments_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicine_stocks`
--
ALTER TABLE `medicine_stocks`
  ADD CONSTRAINT `medicine_stocks_medicines_id_foreign` FOREIGN KEY (`medicines_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicine_transactions`
--
ALTER TABLE `medicine_transactions`
  ADD CONSTRAINT `medicine_transactions_medicines_id_foreign` FOREIGN KEY (`medicines_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicine_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supply_stocks`
--
ALTER TABLE `supply_stocks`
  ADD CONSTRAINT `supply_stocks_supplys_id_foreign` FOREIGN KEY (`supplys_id`) REFERENCES `supplys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supply_transactions`
--
ALTER TABLE `supply_transactions`
  ADD CONSTRAINT `supply_transactions_supplys_id_foreign` FOREIGN KEY (`supplys_id`) REFERENCES `supplys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supply_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
