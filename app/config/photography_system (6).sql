-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 06:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography_system`
--
CREATE DATABASE IF NOT EXISTS `photography_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `photography_system`;

-- --------------------------------------------------------

--
-- Table structure for table `editoraction`
--

CREATE TABLE `editoraction` (
  `ID` int(11) NOT NULL,
  `EventID` int(11) DEFAULT NULL,
  `EditorID` int(11) DEFAULT NULL,
  `Action` enum('Pending','Accepted','Declined','Completed') DEFAULT 'Pending',
  `Comment` text DEFAULT NULL,
  `ActionDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editoraction`
--

INSERT INTO `editoraction` (`ID`, `EventID`, `EditorID`, `Action`, `Comment`, `ActionDateTime`) VALUES
(1, 49, 15, 'Pending', NULL, '2024-01-20 15:11:39'),
(2, 48, 24, 'Pending', NULL, '2024-01-20 15:13:01'),
(3, 51, 15, 'Declined', 'Busy', '2024-01-20 15:14:47'),
(4, 51, 24, 'Declined', 'Busy', '2024-01-20 15:48:17'),
(5, 51, 15, 'Declined', 'Busy', '2024-01-20 15:53:55'),
(6, 51, 24, 'Declined', 'Busy', '2024-01-20 16:10:38'),
(7, 53, 15, 'Declined', 'css', '2024-01-20 16:17:27'),
(8, 53, 24, 'Pending', NULL, '2024-01-21 03:37:23'),
(9, 51, 24, 'Declined', 'Busy', '2024-01-21 03:42:57'),
(10, 54, 15, 'Declined', 'Busy', '2024-01-23 02:49:52'),
(11, 55, 24, 'Pending', NULL, '2024-01-25 12:06:46'),
(12, 51, 15, 'Pending', NULL, '2024-01-29 07:01:11'),
(13, 56, 15, 'Pending', NULL, '2024-01-30 16:29:54'),
(14, 57, 24, 'Pending', NULL, '2024-01-30 16:31:08'),
(15, 58, 15, 'Pending', NULL, '2024-01-31 18:25:57'),
(16, 59, 24, 'Pending', NULL, '2024-01-31 18:33:01'),
(17, 60, 15, 'Pending', NULL, '2024-01-31 18:44:03'),
(18, 61, 15, 'Pending', NULL, '2024-02-14 18:23:02'),
(19, 65, 24, 'Pending', NULL, '2024-02-17 04:48:54'),
(20, 68, 15, 'Pending', NULL, '2024-02-17 07:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `EventDate` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Latitude` decimal(10,8) DEFAULT NULL,
  `Longitude` decimal(11,8) DEFAULT NULL,
  `AdditionalRequests` text DEFAULT NULL,
  `PackageID` int(11) DEFAULT NULL,
  `SelectedExtras` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `AdditionalCharges` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `TotalBudget` decimal(10,2) DEFAULT 10000.00,
  `Status` enum('Pencil','Accepted','Advanced','FullPaid','Ongoing','Covered','Completed','Canceled') DEFAULT NULL,
  `ManagerID` int(11) DEFAULT NULL,
  `PhotographerID` int(11) DEFAULT NULL,
  `EditorID` int(11) DEFAULT NULL,
  `PrintingFirmID` int(11) DEFAULT NULL,
  `RequestedPhotographer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `CustomerID`, `EventDate`, `StartTime`, `EndTime`, `Location`, `Latitude`, `Longitude`, `AdditionalRequests`, `PackageID`, `SelectedExtras`, `AdditionalCharges`, `TotalBudget`, `Status`, `ManagerID`, `PhotographerID`, `EditorID`, `PrintingFirmID`, `RequestedPhotographer`) VALUES
(48, 16, '2024-01-29', '00:09:00', '12:09:00', 'Diyatha Uyana Fountain, Sri Jayawardenapura Mawatha, Parliament Junction, Ethul Kotte, Sri Jayawardenepura Kotte, Colombo District, Western Province, 23010, Sri Lanka', '7.00000000', '80.00000000', '', 9, '[{&#34;name&#34;:&#34;Family Album - Rs. 10,000.00&#34;,&#34;price&#34;:&#34;10000.00&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;totalofEach&#34;:10000}]', '[{&#34;reason&#34;:&#34;travell&#34;,&#34;price&#34;:&#34;10000&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;total&#34;:10000}]', '111000.00', 'Accepted', NULL, 2, 24, 25, 2),
(49, 29, '2024-01-29', '00:33:00', '12:33:00', 'University of Colombo Playground, Queen&#39;s Road, Cinnamon Gardens, Colombo, Colombo District, Western Province, 00400, Sri Lanka', '6.90024498', '79.86051821', '', 10, '[{&#34;name&#34;:&#34;Signature Board - Rs. 4,000.00&#34;,&#34;price&#34;:&#34;4000.00&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;totalofEach&#34;:4000}]', NULL, '100000.00', 'Canceled', NULL, 19, 15, 21, 19),
(51, 17, '2024-03-22', '06:43:00', '20:43:00', 'Fort, Slave Island, Colombo, Colombo District, Western Province, 10110, Sri Lanka', '6.93396524', '79.82798800', '', 9, '[{&#34;name&#34;:&#34;Thanking Card - Rs. 70.00&#34;,&#34;price&#34;:&#34;70.00&#34;,&#34;quantity&#34;:&#34;100&#34;,&#34;totalofEach&#34;:7000},{&#34;name&#34;:&#34;20 x 30 Enlagement - Rs. 8,500.00&#34;,&#34;price&#34;:&#34;8500.00&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;totalofEach&#34;:8500}]', NULL, '50000.00', 'Pencil', NULL, 2, 15, 25, 23),
(53, 29, '2024-02-10', '08:56:00', '17:16:00', 'Sky Tailor&#39;s, 28/1, Kassapa Mawatha, Jawatte, Thimbirigasyaya, Colombo, Colombo District, Western Province, 00400, Sri Lanka', '6.89386065', '79.86423581', 'Eius quia minim est', 10, '[{&#34;name&#34;:&#34;Additional Album Page - Rs. 1,500.00&#34;,&#34;price&#34;:&#34;1500.00&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;totalofEach&#34;:1500}]', '[{&#34;reason&#34;:&#34;Travell&#34;,&#34;price&#34;:&#34;1000&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;total&#34;:1000}]', '51000.00', 'Advanced', NULL, 19, 24, 25, 23),
(54, 17, '2024-02-09', '03:28:00', '15:28:00', 'Stratford Avenue, Pamankada, Colombo, Colombo District, Western Province, 20200, Sri Lanka', '6.87452607', '79.87317246', '', 10, '[{&#34;name&#34;:&#34;Additional Album Page - Rs. 1,500.00&#34;,&#34;price&#34;:&#34;1500.00&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;totalofEach&#34;:1500}]', NULL, '26500.00', 'Canceled', NULL, 2, 15, 25, 2),
(55, 17, '2024-02-09', '05:29:00', '17:29:00', 'Church Street, Weekanda, Slave Island, Colombo, Colombo District, Western Province, 00200, Sri Lanka', '6.92251063', '79.85176336', '', 9, '[{&#34;name&#34;:&#34;Thanking Card - Rs. 70.00&#34;,&#34;price&#34;:&#34;70.00&#34;,&#34;quantity&#34;:&#34;1000&#34;,&#34;totalofEach&#34;:70000}]', NULL, '370000.00', 'Canceled', NULL, 19, 24, 21, 23),
(56, 29, '2024-02-17', '11:13:00', '23:14:00', 'Mihindu Mawatha, Technical Junction, Kehelwatte, St. Bastian, Colombo, Colombo District, Western Province, 01100, Sri Lanka', '6.93431670', '79.85683385', '', 10, '[{&#34;name&#34;:&#34;Thanking Card - Rs. 70.00&#34;,&#34;price&#34;:&#34;70.00&#34;,&#34;quantity&#34;:&#34;10&#34;,&#34;totalofEach&#34;:700}]', '', '25700.00', 'Advanced', NULL, 2, 15, 30, 23),
(57, 17, '2024-02-17', '01:57:00', '13:57:00', 'Silver ray', '6.65720210', '80.48814130', '', 10, '[{&#34;name&#34;:&#34;Thanking Card - Rs. 70.00&#34;,&#34;price&#34;:&#34;70.00&#34;,&#34;quantity&#34;:&#34;10&#34;,&#34;totalofEach&#34;:700}]', 'undefined', '25700.00', 'Advanced', NULL, 19, 24, 25, 19),
(58, 29, '2024-02-14', '11:53:00', '23:53:00', 'Ratnapura - Wellawaya Road, Ganegama, Ratnapura District, Sabaragamuwa Province, 70070, Sri Lanka', '6.65740010', '80.48821735', '', 9, '', 'undefined', '304000.00', 'Accepted', NULL, 19, 15, 25, 19),
(59, 29, '2024-02-15', '00:00:00', '19:00:00', 'Thalwatta, Kandy, Kandy District, Central Province, 20000, Sri Lanka', '7.28719377', '80.65316033', '', 9, '', '[{&#34;reason&#34;:&#34;travell&#34;,&#34;price&#34;:&#34;1000&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;total&#34;:1000}]', '309500.00', 'FullPaid', NULL, 2, 24, 30, 2),
(60, 29, '2024-02-16', '12:11:00', '12:11:00', 'Werahera - Ematiyagoda Road, Werahera, Ratnapura District, Sabaragamuwa Province, 70160, Sri Lanka', '6.51552051', '80.64691830', '', 16, '[{&#34;name&#34;:&#34;Additional Album Page - Rs. 1,500.00&#34;,&#34;price&#34;:&#34;1500.00&#34;,&#34;quantity&#34;:&#34;10&#34;,&#34;totalofEach&#34;:15000}]', NULL, '105000.00', 'Canceled', NULL, 19, 15, 21, 19),
(61, 29, '2024-02-29', '06:36:00', '18:36:00', 'Balangoda - Bowatte - Kaltota Road, Randola Junction, Kirimatithenna, Ratnapura District, Sabaragamuwa Province, 12345, Sri Lanka', '6.64811607', '80.70142078', '', 9, '', '[{&#34;reason&#34;:&#34;qqs&#34;,&#34;price&#34;:&#34;1000&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;total&#34;:1000}]', '315000.00', 'FullPaid', NULL, 23, 15, 21, 2),
(62, 29, '2024-02-29', '06:36:00', '18:36:00', 'Balangoda - Bowatte - Kaltota Road, Randola Junction, Kirimatithenna, Ratnapura District, Sabaragamuwa Province, 12345, Sri Lanka', '6.64811607', '80.70142078', '', 9, '', NULL, '314000.00', 'Pencil', NULL, NULL, NULL, NULL, 2),
(63, 29, '2024-02-29', '06:36:00', '18:36:00', 'Balangoda - Bowatte - Kaltota Road, Randola Junction, Kirimatithenna, Ratnapura District, Sabaragamuwa Province, 12345, Sri Lanka', '0.00000000', '0.00000000', '', 9, '', NULL, '300140.00', 'Pencil', NULL, NULL, NULL, NULL, 2),
(64, 29, '2024-02-29', '06:36:00', '18:36:00', 'Balangoda - Bowatte - Kaltota Road, Randola Junction, Kirimatithenna, Ratnapura District, Sabaragamuwa Province, 12345, Sri Lanka', '0.00000000', '0.00000000', '', 9, '', NULL, '300140.00', 'Pencil', NULL, NULL, NULL, NULL, 2),
(65, 29, '2024-02-29', '06:36:00', '18:36:00', 'Balangoda - Bowatte - Kaltota Road, Randola Junction, Kirimatithenna, Ratnapura District, Sabaragamuwa Province, 12345, Sri Lanka', '0.00000000', '0.00000000', '', 9, '[{&#34;name&#34;:&#34;Additional Album Page - Rs. 1,500.00&#34;,&#34;price&#34;:&#34;1500.00&#34;,&#34;quantity&#34;:&#34;21&#34;,&#34;totalofEach&#34;:31500}]', '[{&#34;reason&#34;:&#34;hello&#34;,&#34;price&#34;:&#34;1000&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;total&#34;:1000}]', '332500.00', 'Accepted', NULL, 2, 24, 30, 2),
(66, 29, '2024-02-29', '06:36:00', '18:36:00', 'Balangoda - Bowatte - Kaltota Road, Randola Junction, Kirimatithenna, Ratnapura District, Sabaragamuwa Province, 12345, Sri Lanka', '0.00000000', '0.00000000', '', 9, '[{&#34;name&#34;:&#34;Additional Album Page - Rs. 1,500.00&#34;,&#34;price&#34;:&#34;1500.00&#34;,&#34;quantity&#34;:&#34;21&#34;,&#34;totalofEach&#34;:31500}]', NULL, '331500.00', 'Pencil', NULL, NULL, NULL, NULL, 2),
(68, 29, '2024-03-02', '05:45:00', '11:57:00', 'Bambarabedda Road, Dewinnegama, Kandy District, Central Province, Sri Lanka', '0.00000000', '0.00000000', 'Voluptate sit sint', 9, '[{&#34;name&#34;:&#34;Thanking Card - Rs. 70.00&#34;,&#34;price&#34;:&#34;70.00&#34;,&#34;quantity&#34;:&#34;12&#34;,&#34;totalofEach&#34;:840}]', NULL, '300840.00', 'Pencil', NULL, 23, 15, 30, 2),
(69, 29, '2024-03-16', '10:04:00', '10:05:00', 'Kirinda - Kamburupitiya Road, Kirinda, Matara District, Southern Province, 81100, Sri Lanka', '6.05303807', '80.62932301', '', 9, '[{&#34;name&#34;:&#34;20 x 30 Enlagement - Rs. 8,500.00&#34;,&#34;price&#34;:&#34;8500.00&#34;,&#34;quantity&#34;:&#34;1&#34;,&#34;totalofEach&#34;:8500}]', NULL, '308500.00', 'Pencil', NULL, NULL, NULL, NULL, 23);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `PhotographerID` int(11) DEFAULT NULL,
  `EditorID` int(11) DEFAULT NULL,
  `EventID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Content` text NOT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `EventID` int(11) DEFAULT NULL,
  `Status` enum('unread','read') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationID`, `UserID`, `Type`, `Content`, `Link`, `EventID`, `Status`, `created_at`, `updated_at`) VALUES
(22, 23, 'action', 'Your event has been updated', 'events/loadEvent/61', 61, 'read', '2024-02-17 06:42:17', '2024-02-17 09:49:39'),
(23, 29, 'payment', 'Customer has made a payment for the event', 'events/loadEvent/59', 59, 'read', '2024-02-17 06:58:34', '2024-02-17 09:53:51'),
(24, 29, 'payment', 'Customer has made a payment for the event', 'events/loadEvent/61', 61, 'read', '2024-02-17 07:02:23', '2024-02-17 09:55:30'),
(25, 23, 'allocate', 'You have been allocated to an event', 'events/viewPartnerEvents/23', 68, 'read', '2024-02-17 07:17:20', '2024-02-17 10:13:06'),
(26, 15, 'allocate', 'You have been allocated to an event', 'events/viewPartnerEvents/15', 68, 'unread', '2024-02-17 07:17:20', '2024-02-17 07:17:20'),
(27, 30, 'allocate', 'You have been allocated to an event', 'events/viewPartnerEvents/30', 68, 'unread', '2024-02-17 07:17:20', '2024-02-17 07:17:20'),
(28, 16, 'action', 'Your event has been updated', 'events/loadEvent/61', 61, 'read', '2024-02-19 18:15:05', '2024-02-19 18:15:22'),
(29, 16, 'reschedule', 'You have a reschdule request', 'reschedules/', 51, 'read', '2024-02-28 07:25:27', '2024-02-28 07:31:27'),
(30, 17, 'reschedule', 'Your reschdule request has been approved', 'events/viewCustomerEvents/17', 51, 'unread', '2024-02-28 19:45:14', '2024-02-28 19:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `ServicesIncluded` text DEFAULT NULL,
  `Type` varchar(100) DEFAULT 'Other'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`PackageID`, `Name`, `Description`, `Price`, `ServicesIncluded`, `Type`) VALUES
(9, 'Wedding Photography', 'Full-day wedding photography', '300000.00', 'Ceremony coverage, Reception coverage, 300 edited photos, Online gallery', 'Other'),
(10, 'Portrait Photography', 'Portrait photography session', '25000.00', '1-hour session, 10 edited photos, Studio or outdoor location', 'Other'),
(11, 'Event Photography', 'Event photography coverage', '100000.00', '4-hour coverage, Unlimited photos, Candid shots', 'Other'),
(14, 'Travel Photography', 'Travel photography adventure', '500000.00', '3-day adventure, 100 edited photos, Customized itinerary', 'Other'),
(16, 'Pre-Shoot Photography', 'Morning OR Afternoon Photo Shoot Session', '90000.00', 'Photo Shoot coverage, 300 edited photos, Online gallery', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `TransactionDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` enum('FullPaid','Advanced','Canceled') DEFAULT NULL,
  `EventID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `CustomerID`, `Amount`, `TransactionDate`, `Status`, `EventID`) VALUES
(7, 17, '31550.00', '2024-01-20 15:16:11', 'Advanced', 51),
(8, 29, '10000.00', '2024-01-22 21:35:14', 'Advanced', 49),
(9, 29, '9000.00', '2024-01-22 21:38:23', '', 49),
(10, 17, '5000.00', '2024-01-23 06:46:16', 'Advanced', 51),
(11, 17, '4500.00', '2024-01-28 18:11:40', '', 51),
(12, 17, '2570.00', '2024-01-31 18:50:33', 'Advanced', 57),
(13, 29, '5100.00', '2024-02-01 06:06:04', 'Advanced', 53),
(14, 29, '2570.00', '2024-02-13 10:58:22', 'Advanced', 56),
(15, 29, '31500.00', '2024-02-17 06:48:40', 'Advanced', 61),
(16, 29, '30950.00', '2024-02-17 06:55:54', 'Advanced', 59),
(17, 29, '27855.00', '2024-02-17 06:58:34', '', 59),
(18, 29, '28350.00', '2024-02-17 07:02:23', 'FullPaid', 61);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `PermissionID` int(11) NOT NULL,
  `PermissionName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photographeraction`
--

CREATE TABLE `photographeraction` (
  `ID` int(11) NOT NULL,
  `EventID` int(11) DEFAULT NULL,
  `PhotographerID` int(11) DEFAULT NULL,
  `Action` enum('Pending','Accepted','Declined','Completed') DEFAULT 'Pending',
  `Comment` text DEFAULT NULL,
  `ActionDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photographeraction`
--

INSERT INTO `photographeraction` (`ID`, `EventID`, `PhotographerID`, `Action`, `Comment`, `ActionDateTime`) VALUES
(7, 49, 19, 'Pending', NULL, '2024-01-20 15:11:39'),
(8, 48, 2, 'Pending', NULL, '2024-01-20 15:13:01'),
(9, 51, 23, 'Declined', 'css', '2024-01-20 15:14:47'),
(10, 51, 2, 'Pending', NULL, '2024-01-20 15:48:17'),
(11, 51, 2, 'Pending', NULL, '2024-01-20 15:53:55'),
(12, 51, 2, 'Pending', NULL, '2024-01-20 16:10:38'),
(13, 53, 23, 'Declined', 'css', '2024-01-20 16:17:27'),
(14, 53, 23, 'Declined', 'css', '2024-01-20 16:27:56'),
(15, 53, 2, 'Declined', 'css', '2024-01-20 16:28:36'),
(16, 53, 23, 'Declined', 'css', '2024-01-20 16:32:08'),
(17, 53, 2, 'Pending', NULL, '2024-01-21 03:46:34'),
(18, 53, 19, 'Pending', NULL, '2024-01-21 03:46:43'),
(19, 54, 2, 'Pending', NULL, '2024-01-23 02:49:52'),
(20, 55, 23, 'Declined', 'Busy', '2024-01-25 12:06:46'),
(21, 55, 19, 'Pending', NULL, '2024-01-29 06:56:42'),
(22, 56, 2, 'Pending', NULL, '2024-01-30 16:29:54'),
(23, 57, 19, 'Pending', NULL, '2024-01-30 16:31:08'),
(24, 58, 19, 'Pending', NULL, '2024-01-31 18:25:57'),
(25, 59, 2, 'Pending', NULL, '2024-01-31 18:33:01'),
(26, 60, 19, 'Pending', NULL, '2024-01-31 18:44:03'),
(27, 61, 23, 'Accepted', 'Ok', '2024-02-14 18:23:02'),
(28, 65, 2, 'Pending', NULL, '2024-02-17 04:48:54'),
(29, 68, 23, 'Pending', NULL, '2024-02-17 07:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `printingfirmaction`
--

CREATE TABLE `printingfirmaction` (
  `ID` int(11) NOT NULL,
  `EventID` int(11) DEFAULT NULL,
  `PrintingFirmID` int(11) DEFAULT NULL,
  `Action` enum('Pending','Accepted','Declined','Completed') DEFAULT 'Pending',
  `Comment` text DEFAULT NULL,
  `ActionDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `printingfirmaction`
--

INSERT INTO `printingfirmaction` (`ID`, `EventID`, `PrintingFirmID`, `Action`, `Comment`, `ActionDateTime`) VALUES
(1, 49, 21, 'Declined', 'Busy', '2024-01-20 15:11:39'),
(2, 48, 25, 'Pending', NULL, '2024-01-20 15:13:01'),
(3, 51, 21, 'Pending', NULL, '2024-01-20 15:14:47'),
(4, 51, 25, 'Pending', NULL, '2024-01-20 15:48:17'),
(5, 51, 21, 'Pending', NULL, '2024-01-20 15:53:55'),
(6, 51, 25, 'Pending', NULL, '2024-01-20 16:10:38'),
(7, 53, 21, 'Declined', 'css', '2024-01-20 16:17:27'),
(8, 53, 25, 'Pending', NULL, '2024-01-21 03:37:27'),
(9, 54, 25, 'Pending', NULL, '2024-01-23 02:49:52'),
(10, 55, 21, 'Declined', 'Busy', '2024-01-25 12:06:46'),
(11, 56, 21, 'Declined', 'Busy', '2024-01-30 16:29:54'),
(12, 57, 25, 'Pending', NULL, '2024-01-30 16:31:08'),
(13, 55, 30, 'Declined', 'Busy', '2024-01-30 17:26:08'),
(14, 55, 21, 'Pending', NULL, '2024-01-30 17:29:29'),
(15, 56, 30, 'Pending', NULL, '2024-01-30 17:30:07'),
(16, 58, 25, 'Pending', NULL, '2024-01-31 18:25:57'),
(17, 59, 30, 'Pending', NULL, '2024-01-31 18:33:01'),
(18, 60, 21, 'Pending', NULL, '2024-01-31 18:44:03'),
(19, 61, 21, 'Pending', NULL, '2024-02-14 18:23:02'),
(20, 65, 30, 'Pending', NULL, '2024-02-17 04:48:54'),
(21, 68, 30, 'Pending', NULL, '2024-02-17 07:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `refundrequest`
--

CREATE TABLE `refundrequest` (
  `RefundRequestID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `EventID` int(11) DEFAULT NULL,
  `RefundAmount` decimal(10,2) DEFAULT NULL,
  `RequestDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` enum('Pending','Approved','Rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reschedule`
--

CREATE TABLE `reschedule` (
  `ID` int(11) NOT NULL,
  `EventID` int(11) DEFAULT NULL,
  `NewEventDate` date DEFAULT NULL,
  `NewStartTime` time DEFAULT NULL,
  `NewEndTime` time DEFAULT NULL,
  `NewLocation` varchar(255) DEFAULT NULL,
  `Reason` text DEFAULT NULL,
  `RequestDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `ApprovalStatus` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reschedule`
--

INSERT INTO `reschedule` (`ID`, `EventID`, `NewEventDate`, `NewStartTime`, `NewEndTime`, `NewLocation`, `Reason`, `RequestDateTime`, `ApprovalStatus`) VALUES
(1, 51, '2024-03-22', '06:43:00', '20:43:00', 'Fort, Slave Island, Colombo, Colombo District, Western Province, 10110, Sri Lanka', 'mm', '2024-02-28 07:03:17', 'Approved'),
(2, 51, '2024-03-21', '06:43:00', '20:43:00', 'Fort, Slave Island, Colombo, Colombo District, Western Province, 10110, Sri Lanka', 'dsad', '2024-02-28 07:24:55', 'Rejected'),
(3, 51, '2024-03-23', '06:43:00', '20:43:00', 'Fort, Slave Island, Colombo, Colombo District, Western Province, 10110, Sri Lanka', 'DSAD', '2024-02-28 07:25:27', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `SampleID` int(11) NOT NULL,
  `SampleName` varchar(255) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`SampleID`, `SampleName`, `ImagePath`, `CustomerID`, `Description`, `Date`) VALUES
(1, 'Family Portrait', 'family.jpg', 2, 'Outdoor family photo shoot', '2023-08-22'),
(3, 'Wedding Moments', 'wedding.jpg', 2, 'Wedding ceremony photos', '2023-08-28'),
(6, 'Pre-Shoot', 'preshoot.jpg', 17, 'Nish and Sandu Pre-Shoot', '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Availability` tinyint(1) DEFAULT 1,
  `Specialization` varchar(255) DEFAULT NULL,
  `Bio` text DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Email`, `Password`, `UserTypeID`, `FirstName`, `LastName`, `ContactNumber`, `Address`, `Availability`, `Specialization`, `Bio`, `RegistrationDate`) VALUES
(2, 'abc@mail.com', '$2y$10$Ay9PCZDlV/ODAFgAtUFzZeaRfCfHHsJTMWfHoKaH.oQe48.Cxs.5G', 3, 'Chamika', 'Gunathilaka', '0768507774', NULL, 1, '1', NULL, '2023-10-17 05:17:01'),
(7, 'abd@mail.com', '$2y$10$OwVN.gxCeJMoO0.aLZdRee1CBqgj4OY35V2vnmvkqYSryrXywuRxW', 1, 'Hello', 'Gunathila', '0768507777', NULL, 1, '', NULL, '2023-10-17 05:31:59'),
(8, 'wa@mail.com', '$2y$10$avrawVU9AUiIe9y3JpEWXOgBhAzk2qine5xyCyd0ANw3WB/eLg5Se', 1, 'Madh', 'as', '0712383291', NULL, 1, '', NULL, '2023-10-17 08:13:16'),
(9, 'abe@mail.com', '$2y$10$3uYZdsrW4BpVP7uFouOyoe1ZEks2I.W6akPmGHURjEgEQs4McKeCe', 1, 'Madh', 'as', '0712383292', NULL, 1, '', NULL, '2023-10-17 09:31:18'),
(10, 'abf@mail.com', '$2y$10$5pOg5Mlumzzp.ZcOneEYAu8.gObIFl0Z3wGRVIyxQ08SnS/dSS77i', 1, 'Madhw', 'as', '0712383293', NULL, 1, '', NULL, '2023-10-17 09:33:16'),
(12, 'man@gmail.com', '$2y$10$MtGAN.0OrNLCAxLa8BMAPOM0CZL1Cceo4gP9kT8DNP7JzlU9W8p9u', 2, 'Chamika', 'Gunathilaka', '0168507774', NULL, 1, '', NULL, '2023-10-17 11:36:09'),
(13, 'abl@mail.com', '$2y$10$MqAcf6sI3YE9SFoLdqHj6.yPcQuvy7MdrWCbEn58qGIB/479OF7GO', 1, 'Chamika', 'Gunathilaka', '0768507881', NULL, 1, '', NULL, '2023-10-19 14:06:40'),
(15, 'sl@gmail.com', '$2y$10$ft9T4sdVeIHtpbbo9ei9p.IVPJDat1t3j3PW9yzdX/co//Y4ChS6m', 4, 'sahan', 'lakshan', '0768517774', NULL, 1, 'Indoor', NULL, '2023-10-31 02:33:41'),
(16, 'manager@gmail.com', '$2y$10$93V9lt42/yUpoVpmVzx.3elGfKarJk/mKWt6IN04aYOKpvki8YBHK', 2, 'Chamika', 'Madhushan', '0768507780', NULL, 1, '', NULL, '2023-11-01 08:54:05'),
(17, 'customer@gmail.com', '$2y$10$mr3qQx1pKNZDbc/Nkk7Uzu9e2X9.xZZdxAcQI6SbaOaknNR3tIM.q', 1, 'Thevindu', 'Rathnayake', '0768507781', NULL, 1, '', NULL, '2023-11-01 08:56:21'),
(19, 'photographer@gmail.com', '$2y$10$mr3qQx1pKNZDbc/Nyykk7Uzu9e2X9.xZZdxAcQI6SbaOaknNR3tIM.q', 3, 'Sathurshika', 'Rathnayake', '0768507782', NULL, 1, 'Indoor', NULL, '2023-11-01 03:26:21'),
(20, 'admin@gmail.com', '$2y$10$mr3qQx1pKNZDbc/Nyykk7Uzu9e2X9.xZZdxAcQI6SbaOaknNR3tIM.q', 6, 'Venuri', 'Edirisinghe', '0768507783', NULL, 1, NULL, NULL, '2023-11-01 03:26:21'),
(21, 'printing@gmail.com', '$2y$10$SgkjaKnGtmbzrnFl2JvzYeKsN9BjXYt5jaaN7y0ReoY5eI/kGyzHG', 5, 'Ravindu', 'Nanayakkara', '0768507784', NULL, 1, '', NULL, '2023-11-01 16:36:26'),
(22, 'amal@gmail.com', '$2y$10$UOdYnIJWjp1KEzU4EtXqXOD6VV/WFRR5Fylv9zGanv1iuX8wZk50y', 1, 'amal', 'gunarathna', '0786554354', NULL, 1, '', NULL, '2023-11-02 12:35:25'),
(23, 'photo@gmail.com', '$2y$10$3pUxnv8IIfZK1w6sfX3N9.PsU7lMMz93jB49YxeRXNadY9PhY/owm', 3, 'Milan', 'Bhanuka', '0768507785', NULL, 1, '', NULL, '2023-11-02 15:52:14'),
(24, 'isindu@gmail.com', '$2y$10$RBPPJ9EJywPa7SIhqS/gyeJTELl31oxB4zKCK8IlKFT27K0Fn5Ueu', 4, 'Isindu', 'Tharudinitha', '0768507787', NULL, 1, 'Indoor', NULL, '2023-11-02 17:38:03'),
(25, 'milinda@gmail.com', '$2y$10$N1NbGSeU/GkdaG3r0KC6KeREaMgEg.Wf3R8sMDrHLP.Gnd2ENV6u6', 5, 'Milinda', 'Shehan', '0768507788', NULL, 1, '', NULL, '2023-11-02 17:38:51'),
(26, 'customer01@gmail.com', '$2y$10$MXjA2UxEaBRFyv/jQMOfjOtp3aIuyCk44cMdIZM/KlOLnOwrFgQiy', 1, 'amal', 'rathnayake', '0775647345', NULL, 1, '', NULL, '2023-11-03 02:34:56'),
(27, 'customer02@gmail.com', '$2y$10$E807tFMtNujdpSgn5wCpyeXBWeNNTLykNdbIkLvkF0ECvcoIFSCrK', 1, 'nimal', 'rathnayake', '0775467123', NULL, 1, '', NULL, '2023-11-03 03:04:21'),
(28, 'customer04@gmail.com', '$2y$10$kpe/TVBnN/WffLbtZcNjlOGgJF5UDZYxYwWrCJ9/lzqz1WjYutaOO', 1, 'amal', 'rathnayake', '0717221788', NULL, 1, '', NULL, '2023-11-03 03:39:38'),
(29, 'custo@gmail.com', '$2y$10$Vpv5WPQXhjF9F26UZFWIju.UMOqlWv3QbYPpkTxawzpt2StnEmgvG', 1, 'Saminda', 'Niroshan', '0768507123', NULL, 1, '', NULL, '2024-01-12 04:55:20'),
(30, 'celosuvab@mailinator.com', '$2y$10$/ZrGtCF7tSt0d2QLSvB0Ce2Z3wnjLdoztuQSV1HZ7vbuUoYUnFsSG', 5, 'Sonya', 'Olsen', '0768507745', NULL, 1, '', NULL, '2024-01-30 17:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(11) NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `PermissionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `UserType`, `PermissionID`) VALUES
(1, 'Customer', NULL),
(2, 'Manager', NULL),
(3, 'Photographer', NULL),
(4, 'Editor', NULL),
(5, 'Printing Firm', NULL),
(6, 'Admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editoraction`
--
ALTER TABLE `editoraction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EventID` (`EventID`),
  ADD KEY `FK_EditorID` (`EditorID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `PackageID` (`PackageID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ManagerID` (`ManagerID`),
  ADD KEY `PhotographerID` (`PhotographerID`),
  ADD KEY `EditorID` (`EditorID`),
  ADD KEY `PrintingFirmID` (`PrintingFirmID`),
  ADD KEY `RequestedPhotographer` (`RequestedPhotographer`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `PhotographerID` (`PhotographerID`),
  ADD KEY `EditorID` (`EditorID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PackageID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`PermissionID`);

--
-- Indexes for table `photographeraction`
--
ALTER TABLE `photographeraction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EventID` (`EventID`),
  ADD KEY `FK_PhotographerID` (`PhotographerID`);

--
-- Indexes for table `printingfirmaction`
--
ALTER TABLE `printingfirmaction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EventID` (`EventID`),
  ADD KEY `FK_PrintingFirmID` (`PrintingFirmID`);

--
-- Indexes for table `refundrequest`
--
ALTER TABLE `refundrequest`
  ADD PRIMARY KEY (`RefundRequestID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `reschedule`
--
ALTER TABLE `reschedule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `sample`
--
ALTER TABLE `sample`
  ADD PRIMARY KEY (`SampleID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `ContactNumber` (`ContactNumber`),
  ADD KEY `UserTypeID` (`UserTypeID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`),
  ADD KEY `PermissionID` (`PermissionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editoraction`
--
ALTER TABLE `editoraction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `PermissionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photographeraction`
--
ALTER TABLE `photographeraction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `printingfirmaction`
--
ALTER TABLE `printingfirmaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `refundrequest`
--
ALTER TABLE `refundrequest`
  MODIFY `RefundRequestID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reschedule`
--
ALTER TABLE `reschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sample`
--
ALTER TABLE `sample`
  MODIFY `SampleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `editoraction`
--
ALTER TABLE `editoraction`
  ADD CONSTRAINT `FK_EditorID` FOREIGN KEY (`EditorID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `editoraction_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`PackageID`) REFERENCES `package` (`PackageID`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`ManagerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `event_ibfk_4` FOREIGN KEY (`PhotographerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `event_ibfk_5` FOREIGN KEY (`EditorID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `event_ibfk_6` FOREIGN KEY (`PrintingFirmID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `event_ibfk_7` FOREIGN KEY (`RequestedPhotographer`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`PhotographerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`EditorID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `feedback_ibfk_4` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `photographeraction`
--
ALTER TABLE `photographeraction`
  ADD CONSTRAINT `FK_PhotographerID` FOREIGN KEY (`PhotographerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `photographeraction_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `printingfirmaction`
--
ALTER TABLE `printingfirmaction`
  ADD CONSTRAINT `FK_PrintingFirmID` FOREIGN KEY (`PrintingFirmID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `printingfirmaction_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `refundrequest`
--
ALTER TABLE `refundrequest`
  ADD CONSTRAINT `refundrequest_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `refundrequest_ibfk_2` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `reschedule`
--
ALTER TABLE `reschedule`
  ADD CONSTRAINT `reschedule_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`);

--
-- Constraints for table `sample`
--
ALTER TABLE `sample`
  ADD CONSTRAINT `sample_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`);

--
-- Constraints for table `usertype`
--
ALTER TABLE `usertype`
  ADD CONSTRAINT `usertype_ibfk_1` FOREIGN KEY (`PermissionID`) REFERENCES `permission` (`PermissionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
