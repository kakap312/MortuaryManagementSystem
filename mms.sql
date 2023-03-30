-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 07:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accId`, `username`, `password`, `createdAt`, `updatedAt`) VALUES
('012234221', 'stephen12', 'flow1995', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `billId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corpId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billfor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dueDays` smallint(6) NOT NULL,
  `extraDays` smallint(6) NOT NULL,
  `fee` double(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`billId`, `corpId`, `billfor`, `dueDays`, `extraDays`, `fee`, `amount`, `createdAt`, `updatedAt`) VALUES
('6424cfb21db5a', 'OVM-K-FRG-B-B2', 'this bill is for both', 4, 5, 12.00, 108.00, '2023-03-29', '2023-03-29'),
('6424d9716981d', 'OVM-K-FRG-B-B2', 'no comment', 0, 0, 2.00, 0.00, '2023-03-29', '2023-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `corps`
--

CREATE TABLE `corps` (
  `corpId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corpseCode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admissionDate` date NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` smallint(6) NOT NULL,
  `sex` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometown` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relativeName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relativeContactOne` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relativeContactTwo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collectionDate` date NOT NULL,
  `remarks` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `releasedBy` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updatedAt` date NOT NULL,
  `fridgeId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slotId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corps`
--

INSERT INTO `corps` (`corpId`, `corpseCode`, `admissionDate`, `name`, `age`, `sex`, `hometown`, `relativeName`, `relativeContactOne`, `relativeContactTwo`, `collectionDate`, `remarks`, `releasedBy`, `updatedAt`, `fridgeId`, `slotId`, `category`) VALUES
('64234c4b2d023', 'OVM-K-FRG-B-B2', '2023-03-20', 'Kofi Minta', 23, 'M', 'Kwemuman', 'stephany', '0540533008', '0540533008', '2023-03-24', 'no comment', 'Stephen Odiodiodio', '0000-00-00', '123433232', '00001266', 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `fridges`
--

CREATE TABLE `fridges` (
  `fridgeId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fridges`
--

INSERT INTO `fridges` (`fridgeId`, `name`, `location`, `state`) VALUES
('123433232', 'B', 'floor one', 'free'),
('78904567', 'C', 'floor one', 'free');

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
(1, '2022_12_13_153810_fridge', 1),
(2, '2022_12_13_133810_fridge', 2),
(3, '2022_12_21_182709_service', 3),
(4, '2022_12_11_181027_accounts', 4),
(5, '2022_12_13_133010_fridge', 5),
(6, '2022_12_13_164511_slot', 6);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(8,2) NOT NULL,
  `per` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `name`, `fee`, `per`, `createdAt`, `updatedAt`) VALUES
('02234543212', 'Cleaning of coprse', 20.00, 'Day', '0000-00-00', '0000-00-00'),
('23323122343', 'Medication of coprse', 10.00, 'Day', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slotId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fridgeId` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slotId`, `name`, `fridgeId`, `state`) VALUES
('00001233', 'B1', '123433232', 'used'),
('00001266', 'B2', '123433232', 'used'),
('322212322', 'C3', '78904567', 'used');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accId`),
  ADD KEY `accounts_username_index` (`username`);

--
-- Indexes for table `fridges`
--
ALTER TABLE `fridges`
  ADD PRIMARY KEY (`fridgeId`),
  ADD KEY `fridges_name_index` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slotId`),
  ADD KEY `slots_name_index` (`name`),
  ADD KEY `slots_fridgeid_index` (`fridgeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `slots_fridgeid_foreign` FOREIGN KEY (`fridgeId`) REFERENCES `fridges` (`fridgeId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
