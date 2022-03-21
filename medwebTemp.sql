-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 11:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL,
  `gendr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`user_id`, `first_name`, `last_name`, `email`, `password`, `country`, `city`, `major`, `phone`, `created`, `modified`, `status`, `admin`, `gendr`, `birth_date`, `photo`) VALUES
(1, 'علي', 'بيي', 'skdaatiah@gmail.com', 'bc08d4096ec9877255b666b01480e928', '', '', '20', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, NULL, NULL),
(2, 'عامر', 'حمود', 'daratiah@gmail.com', 'bc08d4096ec9877255b666b01480e928', '', '', '19', '+963933529276', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, NULL, NULL),
(3, 'Iskandar', 'sdsds', 'skndaratiah@gmail.com', '183ab8bf04b9641c66269b75aa60d057', '', '', '1', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(4, 'Iskandar', 'sds', 'skndawwwratiah@gmail.com', 'ee5efbc836b8f1a477d3a80a9b512114', '', '', '1', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(5, 'Iskandar', 'wq', 'skndarqwatiah@gmail.com', 'e2ebe1d3da713a5e26f8a1fae3728ecd', '', '', '2', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(6, 'Iskandar', 'dsad', 'sknasdasaratiah@gmail.com', '7b457170cf2de7c3f75ec24609042029', '', '', '2', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(7, 'Iskandar', 'asd', 'skndasadratiah@gmail.com', 'b5cf67b7365950020e91857581a67cbf', '', '', '1', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(8, 'Iskandar', 'ali', 'doc@gmail.com', '679b9d7f60b9d62fe34e614e73a800f2', '', '', '2', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(9, 'dd', 'dd', 'dd@dd.com', '679b9d7f60b9d62fe34e614e73a800f2', '', '', '1', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(10, 'ss', 'ss', 'ss@ss.com', '3ad5982dbdffc06c2cb0d31bf507cee3', '', '', '5', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(11, 'Iskandar', 'ddss', 'doc1@gmail.com', '532c5b9c8d2c71f5c0c3d66cb6ed3580', '', '', '1', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', NULL),
(12, 'hus', 'hus', 'hus1@gmail.com', 'cf17962f65e57dcdfaa5d01afea08e23', '', '', '4', '+14781649034', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', 0, NULL, '1940-01-01', '1be1cf196d81790f56ad7ee7ed5cd694.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `user_id` int(45) NOT NULL,
  `tall` int(45) DEFAULT NULL,
  `weight` int(45) DEFAULT NULL,
  `bood_type` varchar(4) DEFAULT NULL,
  `smooking` tinyint(1) NOT NULL DEFAULT 0,
  `Alcohol` tinyint(1) NOT NULL DEFAULT 0,
  `Social_status` varchar(45) NOT NULL,
  `Chronic_diseases` text DEFAULT NULL,
  `Chronic_diseases_info` text DEFAULT NULL,
  `family_history` text DEFAULT NULL,
  `relative_relation` text DEFAULT NULL,
  `Medicines` text DEFAULT NULL,
  `Medicines_info` text DEFAULT NULL,
  `allergy` varchar(200) DEFAULT NULL,
  `allergy_info` text DEFAULT NULL,
  `ml_surgery_name` varchar(200) DEFAULT NULL,
  `ml_center_name` varchar(200) DEFAULT NULL,
  `ml_test_result` varchar(200) DEFAULT NULL,
  `ml_test_result_date` date DEFAULT NULL,
  `rp_surgery_name` varchar(200) DEFAULT NULL,
  `rp_hospital_name` varchar(200) DEFAULT NULL,
  `rp_doctor_name` varchar(200) DEFAULT NULL,
  `rp_surgery_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`user_id`, `tall`, `weight`, `bood_type`, `smooking`, `Alcohol`, `Social_status`, `Chronic_diseases`, `Chronic_diseases_info`, `family_history`, `relative_relation`, `Medicines`, `Medicines_info`, `allergy`, `allergy_info`, `ml_surgery_name`, `ml_center_name`, `ml_test_result`, `ml_test_result_date`, `rp_surgery_name`, `rp_hospital_name`, `rp_doctor_name`, `rp_surgery_date`) VALUES
(0, NULL, NULL, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', NULL, NULL, NULL, NULL),
(3, 166, 166, 'A+', 0, 0, 'Widowed', 'botatto', 'asmsaklmcklsmcklndsclkndslsv', 'family problim,added,new', 'Father,added,new relative to his father', 'medeci', 'mmmmmesddd', 'alllegry', 'alllllllllllllaefffff', NULL, '', '', '0000-00-00', NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, 0, 0, 'Single', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, 0, 0, 'Divorced', 'set', 'get', 'حمى ', 'Brother', 'ccc', 'cccc', 'alllegry', 'asasss', NULL, '', '', '0000-00-00', NULL, NULL, NULL, NULL),
(9, 170, 71, 'A+', 1, 1, 'Widowed', 'None', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0000-00-00', NULL, NULL, NULL, NULL),
(11, 100, 100, 'A+', 1, 2, 'Married', 'dfasdf', 'asdfasdfasdfasdfasdf', 'dsfasdfasdf', 'Father', 'None', '', 'None', '', 'None', 'None', 'None', '0000-00-00', 'None', 'None', 'None', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gendr` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `birth_date` date DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `gendr`, `country`, `city`, `phone`, `created`, `modified`, `status`, `admin`, `birth_date`, `photo`) VALUES
(1, 'Iskandar', 'Atieh', 'skndaratiah@gmail.com', 'da35fb8f0085782e2bfe326b11877111', '1', 'Syria', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', 'beltran-rueda.png'),
(2, 'Huseen', 'hasan', 'huseen@gmail.com', '36fa0d1741f51452645535430beb1115', '1', '', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', 'beltran-rueda.png'),
(3, 'hasooooooooooon', 'ssssssssss', 'hh@hh.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', 'Afganistan', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', 'beltran-rueda.png'),
(5, 'sSs', 'sss', 'ss@ss.ss', 'd41d8cd98f00b204e9800998ecf8427e', '1', '', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', 'beltran-rueda.png'),
(8, 'hel', 'hel', 'hel@gmail.com', 'cf17962f65e57dcdfaa5d01afea08e23', '1', '', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', 'daniel-lopez.png'),
(9, 'hussein', 'hus', 'hus@gmail.com', 'aedd6a90ca6345a747bf3b20335837c5', '2', 'Afganistan', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', 'ebde5292f176340e883ae3d4abd93142.jpg'),
(10, 'hhh', 'hhh', 'hhh@gmail.com', 'cf17962f65e57dcdfaa5d01afea08e23', '1', '', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', NULL),
(11, 'ha', 'ha', 'ha@gmail.com', 'cf17962f65e57dcdfaa5d01afea08e23', '1', '', '', '+14781649034', NULL, NULL, '1', 0, '1940-01-01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
