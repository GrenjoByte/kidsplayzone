-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 10:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `statop-pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assignment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progress_points`
--

CREATE TABLE `progress_points` (
  `point_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `point_desciption` varchar(200) NOT NULL,
  `point_deadline` date NOT NULL,
  `point_percent` float(10,2) NOT NULL,
  `point_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(100) NOT NULL,
  `project_description` text NOT NULL,
  `project_start` date NOT NULL,
  `project_deadline` date NOT NULL,
  `project_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_title`, `project_description`, `project_start`, `project_deadline`, `project_status`) VALUES
(9, '2022 CAF', '<p class=\"text-align-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: justify; color: rgb(53, 54, 58); font-family: Hind, sans-serif; font-size: 18px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">WHAT IS CAF?</span></p><p class=\"text-align-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: justify; color: rgb(53, 54, 58); font-family: Hind, sans-serif; font-size: 18px;\">The CENSUS OF AGRICULTURE AND FISHERIES (CAF) is a large-scale government undertaking that is geared towards the collection and compilation of basic information on the agriculture and fishery sectors in the country. Data collected will serve as the bases for policymaking and other purposes.</p><p class=\"text-align-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: justify; color: rgb(53, 54, 58); font-family: Hind, sans-serif; font-size: 18px;\"><span style=\"box-sizing: border-box; font-weight: bolder;\">OBJECTIVES</span></p><p class=\"text-align-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: justify; color: rgb(53, 54, 58); font-family: Hind, sans-serif; font-size: 18px;\">The 2022 CAF Census will be conducted to provide government planners, policymakers, and administrators with agriculture and fisheries data on which to base their social and economic development plans, policies, and programs.</p><p class=\"text-align-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: justify; color: rgb(53, 54, 58); font-family: Hind, sans-serif; font-size: 18px;\">The 2022 CAF is envisioned to achieve the following objectives&nbsp;<br style=\"box-sizing: border-box;\">1. Determine the structural characteristics of agriculture and fishery sectors in the country;&nbsp;<br style=\"box-sizing: border-box;\">2. Provide sampling frames for the conduct of census’ periodic agricultural and fishery surveys;&nbsp;<br style=\"box-sizing: border-box;\">3. Provide basic data on the agriculture, aquaculture, and fishing characteristics for use in the government’s national and local development planning; and&nbsp;<br style=\"box-sizing: border-box;\">4. Provide data on the agricultural, aquaculture, and fishery facilities and services available in the barangay.</p>', '2024-01-09', '2024-03-28', 400),
(10, 'CAF 2022 v2', '\r\n						<p class=\"text-align-justify\" style=\"margin-top: 0in; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><strong><span style=\"font-size:10.5pt;font-family:Hind;\r\ncolor:#35363A\">WHAT IS CAF?</span></strong><span style=\"font-size:10.5pt;\r\nfont-family:Hind;color:#35363A\"><o:p></o:p></span></p><p class=\"text-align-justify\" style=\"margin-top: 0in; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-sizing: border-box; margin-bottom: 1rem;\"><span style=\"font-size:10.5pt;font-family:Hind;color:#35363A\">The\r\nCENSUS OF AGRICULTURE AND FISHERIES (CAF) is a large-scale government\r\nundertaking that is geared towards the collection and compilation of basic\r\ninformation on the agriculture and fishery sectors in the country. Data\r\ncollected will serve as the bases for policymaking and other purposes.<o:p></o:p></span></p><p class=\"text-align-justify\" style=\"margin-top: 0in; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-sizing: border-box; margin-bottom: 1rem;\"><strong style=\"box-sizing: border-box\"><span style=\"font-size:10.5pt;font-family:Hind;color:#35363A\">OBJECTIVES</span></strong><span style=\"font-size:10.5pt;font-family:Hind;color:#35363A\"><o:p></o:p></span></p><p class=\"text-align-justify\" style=\"margin-top: 0in; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-sizing: border-box; margin-bottom: 1rem;\"><span style=\"font-size:10.5pt;font-family:Hind;color:#35363A\">The\r\n2022 CAF Census will be conducted to provide government planners, policymakers,\r\nand administrators with agriculture and fisheries data on which to base their\r\nsocial and economic development plans, policies, and programs.<o:p></o:p></span></p><p class=\"text-align-justify\" style=\"margin-top: 0in; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-sizing: border-box; margin-bottom: 1rem;\"><span style=\"font-size:10.5pt;font-family:Hind;color:#35363A\">The\r\n2022 CAF is envisioned to achieve the following objectives&nbsp;<br style=\"box-sizing: border-box\">\r\n1. Determine the structural characteristics of agriculture and fishery sectors\r\nin the country;&nbsp;<br style=\"box-sizing: border-box\">\r\n2. Provide sampling frames for the conduct of census’ periodic agricultural and\r\nfishery surveys;&nbsp;<br style=\"box-sizing: border-box\">\r\n3. Provide basic data on the agriculture, aquaculture, and fishing\r\ncharacteristics for use in the government’s national and local development\r\nplanning; and&nbsp;<br style=\"box-sizing: border-box\">\r\n4. Provide data on the agricultural, aquaculture, and fishery facilities and\r\nservices available in the barangay.<o:p></o:p></span></p><p class=\"text-align-justify\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-align: justify; color: rgb(53, 54, 58); font-family: Hind, sans-serif; font-size: 18px;\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><span style=\"font-size:8.0pt;line-height:107%\">&nbsp;</span></p>\r\n					', '2024-01-09', '2024-02-28', 400);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `image` varchar(400) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_pass`
--

CREATE TABLE `user_pass` (
  `user_id` int(11) NOT NULL,
  `pass_key` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `assignment_project_id_constraint` (`project_id`),
  ADD KEY `assignment_user_id_constraint` (`user_id`);

--
-- Indexes for table `progress_points`
--
ALTER TABLE `progress_points`
  ADD PRIMARY KEY (`point_id`),
  ADD KEY `progress_points_project_id_contraint` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_pass`
--
ALTER TABLE `user_pass`
  ADD KEY `user_id_constraint` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress_points`
--
ALTER TABLE `progress_points`
  MODIFY `point_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignment_project_id_constraint` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_user_id_constraint` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress_points`
--
ALTER TABLE `progress_points`
  ADD CONSTRAINT `progress_points_project_id_contraint` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_pass`
--
ALTER TABLE `user_pass`
  ADD CONSTRAINT `user_id_constraint` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
