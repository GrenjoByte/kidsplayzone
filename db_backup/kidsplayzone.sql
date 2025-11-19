-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 03:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidsplayzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_profiles`
--

CREATE TABLE `client_profiles` (
  `client_id` int(11) NOT NULL,
  `guardian_name` varchar(100) NOT NULL,
  `guardian_contact` varchar(30) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `birthdate` date NOT NULL,
  `profile_image` text NOT NULL,
  `client_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_profiles`
--

INSERT INTO `client_profiles` (`client_id`, `guardian_name`, `guardian_contact`, `full_name`, `gender`, `birthdate`, `profile_image`, `client_status`) VALUES
(3, 'Juan Nemoi', '0923-197-2329', 'Darwin Nemoi', 'M', '2021-04-04', 'Darwin_Nemoi_2021_04_04.png', 1),
(4, 'Juan Nemoi', '0992-203-2198', 'Aivan Zilmar', 'M', '2020-12-15', 'Aivan_Zilmar_2020_12_15.png', 1),
(5, 'Renzo Advincula', '0992-203-2198', 'Sealthiel Rose Advincula', 'F', '2022-12-01', 'Sealthiel_Rose_Advincula_2022_12_01.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_checkouts`
--

CREATE TABLE `pos_checkouts` (
  `pos_checkout_id` int(11) NOT NULL,
  `pos_checkout_code` varchar(50) NOT NULL,
  `pos_item_id` int(11) NOT NULL,
  `pos_item_name` varchar(255) NOT NULL,
  `pos_item_price` decimal(10,2) NOT NULL,
  `pos_item_count` int(11) NOT NULL,
  `pos_item_unit` varchar(50) NOT NULL,
  `pos_item_image` varchar(255) DEFAULT NULL,
  `pos_item_subtotal` decimal(10,2) NOT NULL,
  `pos_checkout_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_checkouts`
--

INSERT INTO `pos_checkouts` (`pos_checkout_id`, `pos_checkout_code`, `pos_item_id`, `pos_item_name`, `pos_item_price`, `pos_item_count`, `pos_item_unit`, `pos_item_image`, `pos_item_subtotal`, `pos_checkout_date`) VALUES
(14, 'POS-20251119-412338', 5, 'Motor', 256665.00, 2, 'pieces', 'Motor_1760172430740.png', 513330.00, '2025-11-19 22:01:55'),
(15, 'POS-20251119-412338', 4, 'PSA Mug (Philsys)', 240.50, 3, 'pieces', 'PSA_Mug_(NID)_1760172375096.png', 721.50, '2025-11-19 22:01:55'),
(16, 'POS-20251119-412338', 3, 'Civago Tumbler', 540.00, 4, 'pieces', 'Civago_Tumbler_1760172256175.png', 2160.00, '2025-11-19 22:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `pos_inventory`
--

CREATE TABLE `pos_inventory` (
  `pos_item_id` int(11) NOT NULL,
  `pos_item_name` varchar(200) NOT NULL,
  `pos_item_price` decimal(10,2) NOT NULL,
  `pos_item_image` text NOT NULL,
  `pos_item_stock` int(11) NOT NULL,
  `pos_item_unit` varchar(10) NOT NULL,
  `pos_item_low` int(11) NOT NULL,
  `pos_item_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_inventory`
--

INSERT INTO `pos_inventory` (`pos_item_id`, `pos_item_name`, `pos_item_price`, `pos_item_image`, `pos_item_stock`, `pos_item_unit`, `pos_item_low`, `pos_item_status`) VALUES
(1, 'Airforce 1 (Blue)', 6500.00, 'pos_item_1760171746.png', 93, 'pair', 2, 1),
(3, 'Civago Tumbler', 540.00, 'Civago_Tumbler_1760172256175.png', 61, 'piece', 5, 1),
(4, 'PSA Mug (Philsys)', 240.50, 'PSA_Mug_(NID)_1760172375096.png', 76, 'piece', 5, 1),
(5, 'Motor', 256665.00, 'Motor_1760172430740.png', 159, 'piece', 1, 1),
(8, 'Veithdia Glasses Case (Black-silver)', 250.00, 'Veithdia_Glasses_Case_(Black-silver)_1760691396301.png', 175, 'pair', 5, 1),
(9, 'Kopiko Lucky Day', 38.00, 'Kopiko_Lucky_Day_1761282950808.png', 20, 'piece', 3, 1),
(10, 'Steam Deck OLED', 35000.00, 'Steam_Deck_OLED_1762009656478.png', 7, 'set', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pos_logs`
--

CREATE TABLE `pos_logs` (
  `pos_log_id` int(11) NOT NULL,
  `pos_activity_type` varchar(10) NOT NULL,
  `pos_code` varchar(50) NOT NULL,
  `pos_activity` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_logs`
--

INSERT INTO `pos_logs` (`pos_log_id`, `pos_activity_type`, `pos_code`, `pos_activity`, `timestamp`) VALUES
(1, '', '4', '<strong>Updated:</strong><br>Item Name', '2025-10-18 02:37:03'),
(2, '', '8', 'PSA Mug (Philsys) (2 pieces), Veithdia Glasses Case (Black-silver) (2 pairs)', '2025-10-31 11:54:44'),
(3, '', '8', 'PSA Mug (Philsys) (2 pieces), Veithdia Glasses Case (Black-silver) (2 pairs)', '2025-10-31 11:55:29'),
(4, '', '10', '<strong>Item \'Steam Deck OLED\' created.</strong>\n	            <br>Price: ₱35000\n	            <br>Stock: 3 sets\n	            <br>Low: 3 sets\n	        ', '2025-11-01 15:28:41'),
(5, '', 'STK--538248', '<strong>STK--538248 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-09 17:29:42'),
(6, '', 'STK--538248', '<strong>STK--538248 items:</strong><br>Airforce 1 (Blue) (2 pair), PSA Mug (Philsys) (23 piece)', '2025-11-09 17:29:42'),
(7, '', 'STK--9CF7A4', '<strong>STK--9CF7A4 items:</strong><br>Motor (3 piece)', '2025-11-09 17:29:59'),
(8, '', 'STK--C4FF79', '<strong>STK--C4FF79 items:</strong><br>Veithdia Glasses Case (Black-silver) (32 pair)', '2025-11-09 17:30:44'),
(9, '', 'STK--CC3A05', '<strong>STK--CC3A05 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-09 17:32:12'),
(10, '', 'STK--D9BA84', '<strong>STK--D9BA84 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-09 17:32:48'),
(11, '', 'STK--950072', '<strong>STK--950072 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-11 16:49:07'),
(12, '', 'STK--950072', '<strong>STK--950072 items:</strong><br>Airforce 1 (Blue) (2 pair), PSA Mug (Philsys) (2 piece)', '2025-11-11 16:49:07'),
(13, '', 'STK--950072', '<strong>STK--950072 items:</strong><br>Airforce 1 (Blue) (2 pair), PSA Mug (Philsys) (2 piece), Veithdia Glasses Case (Black-silver) (2 pair)', '2025-11-11 16:49:07'),
(14, '', 'STK--6837FE', '<strong>STK--6837FE items:</strong><br>Civago Tumbler (2 piece)', '2025-11-11 16:57:51'),
(15, '', 'STK--6837FE', '<strong>STK--6837FE items:</strong><br>Civago Tumbler (2 piece), Motor (2 piece)', '2025-11-11 16:57:51'),
(16, '', 'STK--CD1BC4', '<strong>STK--CD1BC4 items:</strong><br>Airforce 1 (Blue) (4 pair)', '2025-11-11 16:58:33'),
(17, '', 'STK-2025-11-12-55C7EA', '<strong>STK-2025-11-12-55C7EA items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-12 05:40:56'),
(18, '', 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair)', '2025-11-14 03:06:27'),
(19, '', 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece)', '2025-11-14 03:06:27'),
(20, '', 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair)', '2025-11-14 03:06:27'),
(21, '', 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece)', '2025-11-14 03:06:27'),
(22, '', 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece), PSA Mug (Philsys) (2 piece)', '2025-11-14 03:06:27'),
(23, '', 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece), PSA Mug (Philsys) (2 piece), Civago Tumbler (7 piece)', '2025-11-14 03:06:27'),
(24, '', 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece), PSA Mug (Philsys) (2 piece), Civago Tumbler (7 piece), Steam Deck OLED (2 set)', '2025-11-14 03:06:27'),
(25, '', 'STK-2025-11-18-BB3274', '<strong>STK-2025-11-18-BB3274 items:</strong><br>Steam Deck OLED (4 set)', '2025-11-18 16:18:57'),
(26, '', 'STK-2025-11-19-A260A6', '<strong>STK-2025-11-19-A260A6 items:</strong><br>Civago Tumbler (23 piece)', '2025-11-18 16:23:14'),
(27, '', 'STK-2025-11-19-A260A6', '<strong>STK-2025-11-19-A260A6 items:</strong><br>Civago Tumbler (23 piece), Motor (2 piece)', '2025-11-18 16:23:14'),
(28, '', 'POS-20251119-412338', 'Motor (2 pieces)<br>PSA Mug (Philsys) (3 pieces)<br>Civago Tumbler (4 pieces)', '2025-11-19 14:01:55'),
(29, '', 'STK-2025-11-19-470964', 'Airforce 1 (Blue) (23 pair)<br>PSA Mug (Philsys) (3 piece)<br>Veithdia Glasses Case (Black-silver) (2 pair)', '2025-11-19 14:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `pos_restocking`
--

CREATE TABLE `pos_restocking` (
  `pos_restocking_id` int(11) NOT NULL,
  `pos_restocking_code` varchar(50) NOT NULL,
  `pos_item_id` int(11) NOT NULL,
  `pos_item_count` int(11) NOT NULL,
  `pos_restocking_date` date NOT NULL,
  `pos_restocking_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos_restocking`
--

INSERT INTO `pos_restocking` (`pos_restocking_id`, `pos_restocking_code`, `pos_item_id`, `pos_item_count`, `pos_restocking_date`, `pos_restocking_timestamp`) VALUES
(11, 'STK-2025-11-19-470964', 1, 23, '2025-11-19', '2025-11-19 14:08:21'),
(12, 'STK-2025-11-19-470964', 4, 3, '2025-11-19', '2025-11-19 14:08:21'),
(13, 'STK-2025-11-19-470964', 8, 2, '2025-11-19', '2025-11-19 14:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `supply_checkouts`
--

CREATE TABLE `supply_checkouts` (
  `supply_checkout_id` int(11) NOT NULL,
  `supply_checkout_code` varchar(50) NOT NULL,
  `supply_item_id` int(11) NOT NULL,
  `supply_item_name` varchar(255) NOT NULL,
  `supply_item_price` decimal(10,2) NOT NULL,
  `supply_item_count` int(11) NOT NULL,
  `supply_item_unit` varchar(50) NOT NULL,
  `supply_item_image` varchar(255) DEFAULT NULL,
  `supply_item_subtotal` decimal(10,2) NOT NULL,
  `supply_checkout_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply_inventory`
--

CREATE TABLE `supply_inventory` (
  `supply_item_id` int(11) NOT NULL,
  `supply_item_name` varchar(200) NOT NULL,
  `supply_item_price` decimal(10,2) NOT NULL,
  `supply_item_image` text NOT NULL,
  `supply_item_stock` int(11) NOT NULL,
  `supply_item_unit` varchar(10) NOT NULL,
  `supply_item_low` int(11) NOT NULL,
  `supply_item_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supply_inventory`
--

INSERT INTO `supply_inventory` (`supply_item_id`, `supply_item_name`, `supply_item_price`, `supply_item_image`, `supply_item_stock`, `supply_item_unit`, `supply_item_low`, `supply_item_status`) VALUES
(1, 'Airforce 1 (Blue)', 6500.00, 'pos_item_1760171746.png', 70, 'pair', 2, 1),
(3, 'Civago Tumbler', 540.00, 'Civago_Tumbler_1760172256175.png', 65, 'piece', 5, 1),
(4, 'PSA Mug (Philsys)', 240.50, 'PSA_Mug_(NID)_1760172375096.png', 76, 'piece', 5, 1),
(5, 'Motor', 256665.00, 'Motor_1760172430740.png', 161, 'piece', 1, 1),
(8, 'Veithdia Glasses Case (Black-silver)', 250.00, 'Veithdia_Glasses_Case_(Black-silver)_1760691396301.png', 173, 'pair', 5, 1),
(9, 'Kopiko Lucky Day', 38.00, 'Kopiko_Lucky_Day_1761282950808.png', 20, 'piece', 3, 1),
(10, 'Steam Deck OLED', 35000.00, 'Steam_Deck_OLED_1762009656478.png', 7, 'set', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supply_logs`
--

CREATE TABLE `supply_logs` (
  `supply_log_id` int(11) NOT NULL,
  `supply_code` varchar(50) NOT NULL,
  `supply_activity` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supply_logs`
--

INSERT INTO `supply_logs` (`supply_log_id`, `supply_code`, `supply_activity`, `timestamp`) VALUES
(1, '4', '<strong>Updated:</strong><br>Item Name', '2025-10-18 02:37:03'),
(2, '8', 'PSA Mug (Philsys) (2 pieces), Veithdia Glasses Case (Black-silver) (2 pairs)', '2025-10-31 11:54:44'),
(3, '8', 'PSA Mug (Philsys) (2 pieces), Veithdia Glasses Case (Black-silver) (2 pairs)', '2025-10-31 11:55:29'),
(4, '10', '<strong>Item \'Steam Deck OLED\' created.</strong>\n	            <br>Price: ₱35000\n	            <br>Stock: 3 sets\n	            <br>Low: 3 sets\n	        ', '2025-11-01 15:28:41'),
(5, 'STK--538248', '<strong>STK--538248 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-09 17:29:42'),
(6, 'STK--538248', '<strong>STK--538248 items:</strong><br>Airforce 1 (Blue) (2 pair), PSA Mug (Philsys) (23 piece)', '2025-11-09 17:29:42'),
(7, 'STK--9CF7A4', '<strong>STK--9CF7A4 items:</strong><br>Motor (3 piece)', '2025-11-09 17:29:59'),
(8, 'STK--C4FF79', '<strong>STK--C4FF79 items:</strong><br>Veithdia Glasses Case (Black-silver) (32 pair)', '2025-11-09 17:30:44'),
(9, 'STK--CC3A05', '<strong>STK--CC3A05 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-09 17:32:12'),
(10, 'STK--D9BA84', '<strong>STK--D9BA84 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-09 17:32:48'),
(11, 'STK--950072', '<strong>STK--950072 items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-11 16:49:07'),
(12, 'STK--950072', '<strong>STK--950072 items:</strong><br>Airforce 1 (Blue) (2 pair), PSA Mug (Philsys) (2 piece)', '2025-11-11 16:49:07'),
(13, 'STK--950072', '<strong>STK--950072 items:</strong><br>Airforce 1 (Blue) (2 pair), PSA Mug (Philsys) (2 piece), Veithdia Glasses Case (Black-silver) (2 pair)', '2025-11-11 16:49:07'),
(14, 'STK--6837FE', '<strong>STK--6837FE items:</strong><br>Civago Tumbler (2 piece)', '2025-11-11 16:57:51'),
(15, 'STK--6837FE', '<strong>STK--6837FE items:</strong><br>Civago Tumbler (2 piece), Motor (2 piece)', '2025-11-11 16:57:51'),
(16, 'STK--CD1BC4', '<strong>STK--CD1BC4 items:</strong><br>Airforce 1 (Blue) (4 pair)', '2025-11-11 16:58:33'),
(17, 'STK-2025-11-12-55C7EA', '<strong>STK-2025-11-12-55C7EA items:</strong><br>Airforce 1 (Blue) (2 pair)', '2025-11-12 05:40:56'),
(18, 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair)', '2025-11-14 03:06:27'),
(19, 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece)', '2025-11-14 03:06:27'),
(20, 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair)', '2025-11-14 03:06:27'),
(21, 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece)', '2025-11-14 03:06:27'),
(22, 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece), PSA Mug (Philsys) (2 piece)', '2025-11-14 03:06:27'),
(23, 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece), PSA Mug (Philsys) (2 piece), Civago Tumbler (7 piece)', '2025-11-14 03:06:27'),
(24, 'STK-2025-11-14-1D6EB9', '<strong>STK-2025-11-14-1D6EB9 items:</strong><br>Airforce 1 (Blue) (21 pair), Motor (76 piece), Veithdia Glasses Case (Black-silver) (45 pair), Kopiko Lucky Day (43 piece), PSA Mug (Philsys) (2 piece), Civago Tumbler (7 piece), Steam Deck OLED (2 set)', '2025-11-14 03:06:27'),
(25, 'STK-2025-11-18-BB3274', '<strong>STK-2025-11-18-BB3274 items:</strong><br>Steam Deck OLED (4 set)', '2025-11-18 16:18:57'),
(26, 'STK-2025-11-19-A260A6', '<strong>STK-2025-11-19-A260A6 items:</strong><br>Civago Tumbler (23 piece)', '2025-11-18 16:23:14'),
(27, 'STK-2025-11-19-A260A6', '<strong>STK-2025-11-19-A260A6 items:</strong><br>Civago Tumbler (23 piece), Motor (2 piece)', '2025-11-18 16:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `supply_restocking`
--

CREATE TABLE `supply_restocking` (
  `supply_restocking_id` int(11) NOT NULL,
  `supply_restocking_code` varchar(50) NOT NULL,
  `supply_item_id` int(11) NOT NULL,
  `supply_item_count` int(11) NOT NULL,
  `supply_restocking_date` date NOT NULL,
  `supply_restocking_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_logs`
--

CREATE TABLE `time_logs` (
  `log_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `activity` text NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_logs`
--

INSERT INTO `time_logs` (`log_id`, `client_id`, `activity`, `time_stamp`) VALUES
(1, 1, '<strong>Account Created</strong>', '2025-10-02 00:42:54'),
(2, 1, '<strong>Time Created:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-10-02 00:43:11'),
(3, 2, '<strong>Account Created</strong>', '2025-10-03 00:34:43'),
(4, 3, '<strong>Account Created</strong>', '2025-10-03 01:38:52'),
(5, 4, '<strong>Account Created</strong>', '2025-10-03 05:55:25'),
(6, 1, '<strong>Time Created:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-10-03 06:14:06'),
(7, 5, '<strong>Account Created</strong>', '2025-10-09 01:23:36'),
(8, 2, '\r\n				    <strong>Item \'Air\' created.</strong>\r\n				    <br>Price: ₱200\r\n				    <br>Stock: 20 pieces\r\n				', '2025-10-11 08:08:32'),
(9, 1, '\r\n	            <strong>Item \'Airforce 1 (Blue)\' created.</strong>\r\n	            <br>Price: ₱6500\r\n	            <br>Stock: 6 pairs\r\n	        ', '2025-10-11 08:35:46'),
(10, 2, '\r\n	            <strong>Item \'Civago Tumbler\' created.</strong>\r\n	            <br>Price: ₱540\r\n	            <br>Stock: 20 pieces\r\n	        ', '2025-10-11 08:42:45'),
(11, 3, '\r\n	            <strong>Item \'Civago Tumbler\' created.</strong>\r\n	            <br>Price: ₱540\r\n	            <br>Stock: 24 pieces\r\n	        ', '2025-10-11 08:44:17'),
(12, 4, '\r\n	            <strong>Item \'PSA Mug (NID)\' created.</strong>\r\n	            <br>Price: ₱240.50\r\n	            <br>Stock: 41 pieces\r\n	        ', '2025-10-11 08:46:16'),
(13, 5, '\r\n	            <strong>Item \'Motor\' created.</strong>\r\n	            <br>Price: ₱256665\r\n	            <br>Stock: 2 pieces\r\n	        ', '2025-10-11 08:47:13'),
(14, 6, '\r\n	            <strong>Item \'Veithdia Glasses Case (Black/silver)\' created.</strong>\r\n	            <br>Price: ₱250\r\n	            <br>Stock: 22 pieces\r\n	            <br>Low: 22 pieces\r\n	        ', '2025-10-17 08:54:51'),
(15, 7, '\r\n	            <strong>Item \'Veithdia Glasses Case (Black-silver)\' created.</strong>\r\n	            <br>Price: ₱250\r\n	            <br>Stock: 22 pieces\r\n	            <br>Low: 22 pieces\r\n	        ', '2025-10-17 08:56:14'),
(16, 8, '\r\n	            <strong>Item \'Veithdia Glasses Case (Black-silver)\' created.</strong>\r\n	            <br>Price: ₱250\r\n	            <br>Stock: 22 pieces\r\n	            <br>Low: 22 pieces\r\n	        ', '2025-10-17 08:57:02'),
(17, 3, '<strong>Time Created:</strong><br>Time: Unlimited, Rate: ₱350.00', '2025-10-24 05:07:30'),
(18, 4, '<strong>Time Created:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-10-24 05:07:55'),
(19, 5, '<strong>Time Created:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-10-24 05:09:41'),
(20, 9, '\r\n	            <strong>Item \'Kopiko Lucky Day\' created.</strong>\r\n	            <br>Price: ₱38\r\n	            <br>Stock: 20 pieces\r\n	            <br>Low: 20 pieces\r\n	        ', '2025-10-24 05:15:52'),
(21, 4, '<strong>Time Ended:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-10-24 06:08:31'),
(22, 3, '<strong>Time Created:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-11-19 12:10:40'),
(23, 3, '<strong>Time Cancelled:</strong><br>Time: Unlimited, Rate: ₱', '2025-11-19 12:17:17'),
(24, 3, '<strong>Time Cancelled:</strong><br>Time: Unlimited, Rate: ₱', '2025-11-19 12:17:37'),
(25, 3, '<strong>Time Cancelled:</strong><br>Time: Unlimited, Rate: ₱', '2025-11-19 12:19:14'),
(26, 4, '<strong>Time Created:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-11-19 12:19:27'),
(27, 4, '<strong>Time Cancelled:</strong><br>Time: 1 hour, Rate: ₱180.00', '2025-11-19 12:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `time_manager`
--

CREATE TABLE `time_manager` (
  `client_id` int(11) NOT NULL,
  `time_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `rate_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_rates`
--

CREATE TABLE `time_rates` (
  `rate_id` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `minute` int(11) NOT NULL,
  `price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_rates`
--

INSERT INTO `time_rates` (`rate_id`, `hour`, `minute`, `price`) VALUES
(0, 0, 0, 350.00),
(1, 1, 0, 180.00),
(2, 0, 30, 100.00);

-- --------------------------------------------------------

--
-- Table structure for table `time_reports`
--

CREATE TABLE `time_reports` (
  `report_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `rate` float NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_reports`
--

INSERT INTO `time_reports` (`report_id`, `client_id`, `time`, `rate`, `time_stamp`) VALUES
(1, 1, '1:0', 180, '2025-10-03 00:27:59'),
(2, 1, '1:0', 180, '2025-10-07 00:32:53'),
(3, 4, '1:0', 180, '2025-10-24 06:08:31'),
(4, 5, '1:0', 180, '2025-10-25 01:55:42'),
(5, 3, '0:0', 350, '2025-10-25 01:55:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_profiles`
--
ALTER TABLE `client_profiles`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `pos_checkouts`
--
ALTER TABLE `pos_checkouts`
  ADD PRIMARY KEY (`pos_checkout_id`);

--
-- Indexes for table `pos_inventory`
--
ALTER TABLE `pos_inventory`
  ADD PRIMARY KEY (`pos_item_id`);

--
-- Indexes for table `pos_logs`
--
ALTER TABLE `pos_logs`
  ADD PRIMARY KEY (`pos_log_id`);

--
-- Indexes for table `pos_restocking`
--
ALTER TABLE `pos_restocking`
  ADD PRIMARY KEY (`pos_restocking_id`);

--
-- Indexes for table `supply_checkouts`
--
ALTER TABLE `supply_checkouts`
  ADD PRIMARY KEY (`supply_checkout_id`);

--
-- Indexes for table `supply_inventory`
--
ALTER TABLE `supply_inventory`
  ADD PRIMARY KEY (`supply_item_id`);

--
-- Indexes for table `supply_logs`
--
ALTER TABLE `supply_logs`
  ADD PRIMARY KEY (`supply_log_id`);

--
-- Indexes for table `supply_restocking`
--
ALTER TABLE `supply_restocking`
  ADD PRIMARY KEY (`supply_restocking_id`);

--
-- Indexes for table `time_logs`
--
ALTER TABLE `time_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `time_manager`
--
ALTER TABLE `time_manager`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `time_rates`
--
ALTER TABLE `time_rates`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `time_reports`
--
ALTER TABLE `time_reports`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_profiles`
--
ALTER TABLE `client_profiles`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pos_checkouts`
--
ALTER TABLE `pos_checkouts`
  MODIFY `pos_checkout_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pos_inventory`
--
ALTER TABLE `pos_inventory`
  MODIFY `pos_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pos_logs`
--
ALTER TABLE `pos_logs`
  MODIFY `pos_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pos_restocking`
--
ALTER TABLE `pos_restocking`
  MODIFY `pos_restocking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supply_checkouts`
--
ALTER TABLE `supply_checkouts`
  MODIFY `supply_checkout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply_inventory`
--
ALTER TABLE `supply_inventory`
  MODIFY `supply_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supply_logs`
--
ALTER TABLE `supply_logs`
  MODIFY `supply_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `supply_restocking`
--
ALTER TABLE `supply_restocking`
  MODIFY `supply_restocking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_logs`
--
ALTER TABLE `time_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `time_manager`
--
ALTER TABLE `time_manager`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_rates`
--
ALTER TABLE `time_rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_reports`
--
ALTER TABLE `time_reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
