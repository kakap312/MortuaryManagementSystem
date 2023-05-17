-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 02:41 PM
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
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accId`, `username`, `password`, `type`, `createdAt`, `updatedAt`) VALUES
('64521efec6c0a', 'stephen13', 'flow1995', 'user', '2023-05-03', '2023-05-03'),
('64521efec6c0q', 'stephen12', 'flow1995', 'admin', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corpId` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `billings` (`id`, `billId`, `corpId`, `billfor`, `dueDays`, `extraDays`, `fee`, `amount`, `createdAt`, `updatedAt`) VALUES
(1, '6463e9c7b48c7', 2, '', 2, 0, 0.00, 28.00, '2023-05-16', '2023-05-16'),
(2, '6463ffc1144dc', 1, '', 3, 0, 0.00, 90.00, '2023-05-17', '2023-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `billingservices`
--

CREATE TABLE `billingservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billServiceId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billId` bigint(20) UNSIGNED NOT NULL,
  `serviceId` bigint(20) UNSIGNED NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billingservices`
--

INSERT INTO `billingservices` (`id`, `billServiceId`, `billId`, `serviceId`, `createdAt`, `updatedAt`) VALUES
(1, '6463e9c85af71', 1, 2, '0000-00-00', '0000-00-00'),
(4, '64640064da78b', 2, 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clearanceId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corpseId` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corps`
--

CREATE TABLE `corps` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `fridgeId` bigint(20) UNSIGNED NOT NULL,
  `slotId` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corps`
--

INSERT INTO `corps` (`id`, `corpId`, `corpseCode`, `admissionDate`, `name`, `age`, `sex`, `hometown`, `relativeName`, `relativeContactOne`, `relativeContactTwo`, `collectionDate`, `remarks`, `releasedBy`, `updatedAt`, `fridgeId`, `slotId`, `category`) VALUES
(1, '64632f93e1561', 'OVM-A-FRG-A-A1', '2023-05-16', 'Albertaaa Kojofii', 34, 'M', 'Toki Krom', 'wewewe', '0540533008', '', '2023-05-19', '', 'dzzcxv', '0000-00-00', 4, 1, 'VIP'),
(2, '6463656c1f604', 'OVM-J-FRG-B-B1', '2023-05-16', 'John Atigu', 25, 'M', 'Toki Krom', 'Adasababa', '0540533008', '', '2023-05-18', '', 'dzzcxv', '0000-00-00', 1, 176, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `fridges`
--

CREATE TABLE `fridges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fridgeId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fridges`
--

INSERT INTO `fridges` (`id`, `fridgeId`, `name`, `location`, `state`) VALUES
(1, '645e6b2e37430', 'B', 'first floor room 4', 'free'),
(4, '645ec8287a024', 'A', 'first floor room 4', 'free');

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
(6, '2022_12_13_164511_slot', 6),
(7, '2022_12_11_181007_accounts', 7),
(8, '2022_12_11_182007_accounts', 8),
(9, '2022_12_13_133210_fridge', 9),
(10, '2022_12_13_103210_fridge', 10),
(11, '2022_12_13_111611_slot', 11),
(12, '2022_12_11_988913_Corps', 12),
(13, '2022_12_21_182809_service', 13),
(14, '2022_12_21_182909_service', 14),
(15, '2022_12_21_282909_service', 15),
(16, '2022_12_21_108304_billing', 16),
(17, '2023_04_01_221008_Payments', 17),
(18, '2023_04_07_113003_Clearance', 18),
(19, '2022_12_13_103260_fridge', 19),
(20, '2022_12_13_111601_slot', 20),
(21, '2022_12_11_988013_Corps', 21),
(22, '2022_12_21_282900_service', 22),
(23, '3022_12_21_108004_billing', 23),
(24, '2023_04_01_220008_Payments', 24),
(25, '2022_12_21_202900_service', 25),
(26, '3022_12_21_106004_billing', 26),
(27, '2023_05_01_221008_Payments', 27),
(28, '2022_12_21_202700_service', 28),
(29, '3022_12_21_006004_billing', 29),
(30, '2023_05_01_229008_Payments', 30),
(31, '2023_04_07_113703_Clearance', 31),
(32, '2022_12_13_110601_slot', 32),
(33, '2022_12_11_900013_Corps', 33),
(34, '2023_04_07_110003_Clearance', 34),
(35, '3022_12_21_106000_billing', 35),
(36, '2023_05_01_121008_Payments', 36);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paymentId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `billId` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `paymentId`, `amount`, `billId`, `description`, `createdAt`, `updatedAt`) VALUES
(1, '6463ea2915b0d', 28.00, 1, '', '2023-05-16', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serviceId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regularFee` double(8,2) NOT NULL,
  `vipFee` double(8,2) NOT NULL,
  `per` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `serviceId`, `name`, `regularFee`, `vipFee`, `per`, `createdAt`, `updatedAt`) VALUES
(2, '645ebbfd4af3c', 'Keeping in fridge', 14.00, 30.00, 'daily', '2023-05-12', '2023-05-12'),
(5, '645ec4d1ad547', 'Bathing', 80.00, 80.00, 'once', '2023-05-13', '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slotId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fridgeId` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slotId`, `name`, `fridgeId`, `state`) VALUES
(1, '64632ee4bc62b', 'A1', 4, 'used'),
(2, '64632ee4e16a7', 'A2', 4, 'free'),
(3, '64632ee4e8752', 'A3', 4, 'free'),
(4, '64632ee5203ad', 'A4', 4, 'free'),
(5, '64632ee52dbb1', 'A5', 4, 'free'),
(6, '64632ee535503', 'A6', 4, 'free'),
(7, '64632ee53df5e', 'A7', 4, 'free'),
(8, '64632ee545878', 'A8', 4, 'free'),
(9, '64632ee54e068', 'A9', 4, 'free'),
(10, '64632ee555e06', 'A10', 4, 'free'),
(11, '64632ee55e610', 'A11', 4, 'free'),
(12, '64632ee565ff0', 'A12', 4, 'free'),
(13, '64632ee573dd0', 'A13', 4, 'free'),
(14, '64632ee57bc0f', 'A14', 4, 'free'),
(15, '64632ee5843e0', 'A15', 4, 'free'),
(16, '64632ee58be59', 'A16', 4, 'free'),
(17, '64632ee594746', 'A17', 4, 'free'),
(18, '64632ee59c313', 'A18', 4, 'free'),
(19, '64632ee5a98d1', 'A19', 4, 'free'),
(20, '64632ee5b7b0b', 'A20', 4, 'free'),
(21, '64632ee5c7b22', 'A21', 4, 'free'),
(22, '64632ee5cf6cc', 'A22', 4, 'free'),
(23, '64632ee5e01a5', 'A23', 4, 'free'),
(24, '64632ee5e7b4d', 'A24', 4, 'free'),
(25, '64632ee5f30c1', 'A25', 4, 'free'),
(26, '64632ee623452', 'A26', 4, 'free'),
(27, '64632ee6318ff', 'A27', 4, 'free'),
(28, '64632ee63a33c', 'A28', 4, 'free'),
(29, '64632ee641dc6', 'A29', 4, 'free'),
(30, '64632ee64a792', 'A30', 4, 'free'),
(31, '64632ee6520ed', 'A31', 4, 'free'),
(32, '64632ee65acb3', 'A32', 4, 'free'),
(33, '64632ee665948', 'A33', 4, 'free'),
(34, '64632ee675a7d', 'A34', 4, 'free'),
(35, '64632ee67d420', 'A35', 4, 'free'),
(36, '64632ee688bb8', 'A36', 4, 'free'),
(37, '64632ee69037e', 'A37', 4, 'free'),
(38, '64632ee69b9d5', 'A38', 4, 'free'),
(39, '64632ee6a3292', 'A39', 4, 'free'),
(40, '64632ee6b13c5', 'A40', 4, 'free'),
(41, '64632ee6b8b58', 'A41', 4, 'free'),
(42, '64632ee6c3f2a', 'A42', 4, 'free'),
(43, '64632ee6d1af4', 'A43', 4, 'free'),
(44, '64632ee6df1c1', 'A44', 4, 'free'),
(45, '64632ee6e6bd3', 'A45', 4, 'free'),
(46, '64632ee706ef1', 'A46', 4, 'free'),
(47, '64632ee71e418', 'A47', 4, 'free'),
(48, '64632ee72e149', 'A48', 4, 'free'),
(49, '64632ee736bf6', 'A49', 4, 'free'),
(50, '64632ee747104', 'A50', 4, 'free'),
(51, '64632ee757176', 'A51', 4, 'free'),
(52, '64632ee764bfd', 'A52', 4, 'free'),
(53, '64632ee772345', 'A53', 4, 'free'),
(54, '64632ee779b25', 'A54', 4, 'free'),
(55, '64632ee7826a7', 'A55', 4, 'free'),
(56, '64632ee78ff2d', 'A56', 4, 'free'),
(57, '64632ee79aa9f', 'A57', 4, 'free'),
(58, '64632ee7a23d9', 'A58', 4, 'free'),
(59, '64632ee7afec4', 'A59', 4, 'free'),
(60, '64632ee7b875e', 'A60', 4, 'free'),
(61, '64632ee7c5634', 'A61', 4, 'free'),
(62, '64632ee7cdfb5', 'A62', 4, 'free'),
(63, '64632ee7d5c4b', 'A63', 4, 'free'),
(64, '64632ee7de4d2', 'A64', 4, 'free'),
(65, '64632ee7e5cca', 'A65', 4, 'free'),
(66, '64632ee7ee725', 'A66', 4, 'free'),
(67, '64632ee80212f', 'A67', 4, 'free'),
(68, '64632ee814e32', 'A68', 4, 'free'),
(69, '64632ee8285df', 'A69', 4, 'free'),
(70, '64632ee835c5f', 'A70', 4, 'free'),
(71, '64632ee846258', 'A71', 4, 'free'),
(72, '64632ee85afb7', 'A72', 4, 'free'),
(73, '64632ee874939', 'A73', 4, 'free'),
(74, '64632ee88fce2', 'A74', 4, 'free'),
(75, '64632ee8ad464', 'A75', 4, 'free'),
(76, '64632ee8caaf6', 'A76', 4, 'free'),
(77, '64632ee8d8671', 'A77', 4, 'free'),
(78, '64632ee8e80f7', 'A78', 4, 'free'),
(79, '64632ee8efc8a', 'A79', 4, 'free'),
(80, '64632ee904480', 'A80', 4, 'free'),
(81, '64632ee914955', 'A81', 4, 'free'),
(82, '64632ee9217a3', 'A82', 4, 'free'),
(83, '64632ee92a228', 'A83', 4, 'free'),
(84, '64632ee934f63', 'A84', 4, 'free'),
(85, '64632ee93c9ee', 'A85', 4, 'free'),
(86, '64632ee94529e', 'A86', 4, 'free'),
(87, '64632ee94fd65', 'A87', 4, 'free'),
(88, '64632ee957646', 'A88', 4, 'free'),
(89, '64632ee9625c6', 'A89', 4, 'free'),
(90, '64632ee970440', 'A90', 4, 'free'),
(91, '64632ee9834b4', 'A91', 4, 'free'),
(92, '64632ee98e2a4', 'A92', 4, 'free'),
(93, '64632ee995d48', 'A93', 4, 'free'),
(94, '64632ee99e5b4', 'A94', 4, 'free'),
(95, '64632ee9a929b', 'A95', 4, 'free'),
(96, '64632ee9b09b0', 'A96', 4, 'free'),
(97, '64632ee9b93c9', 'A97', 4, 'free'),
(98, '64632ee9c0f02', 'A98', 4, 'free'),
(99, '64632ee9c9731', 'A99', 4, 'free'),
(100, '64632ee9d10cb', 'A100', 4, 'free'),
(101, '64632ee9d9b5e', 'A101', 4, 'free'),
(102, '64632ee9e15dd', 'A102', 4, 'free'),
(103, '64632ee9eee21', 'A103', 4, 'free'),
(104, '64632eea03639', 'A104', 4, 'free'),
(105, '64632eea0b1e1', 'A105', 4, 'free'),
(106, '64632eea190e4', 'A106', 4, 'free'),
(107, '64632eea2c05c', 'A107', 4, 'free'),
(108, '64632eea36b98', 'A108', 4, 'free'),
(109, '64632eea3e747', 'A109', 4, 'free'),
(110, '64632eea46fa2', 'A110', 4, 'free'),
(111, '64632eea4e82c', 'A111', 4, 'free'),
(112, '64632eea5717b', 'A112', 4, 'free'),
(113, '64632eea60c2d', 'A113', 4, 'free'),
(114, '64632eea6a033', 'A114', 4, 'free'),
(115, '64632eea7d010', 'A115', 4, 'free'),
(116, '64632eea8a8ab', 'A116', 4, 'free'),
(117, '64632eea92009', 'A117', 4, 'free'),
(118, '64632eea9d6df', 'A118', 4, 'free'),
(119, '64632eeaa4e48', 'A119', 4, 'free'),
(120, '64632eeaada85', 'A120', 4, 'free'),
(121, '64632eeab875e', 'A121', 4, 'free'),
(122, '64632eeabfecf', 'A122', 4, 'free'),
(123, '64632eeac8935', 'A123', 4, 'free'),
(124, '64632eead00f9', 'A124', 4, 'free'),
(125, '64632eead8e95', 'A125', 4, 'free'),
(126, '64632eeae3921', 'A126', 4, 'free'),
(127, '64632eeaeb319', 'A127', 4, 'free'),
(128, '64632eeaf3c67', 'A128', 4, 'free'),
(129, '64632eeb0774f', 'A129', 4, 'free'),
(130, '64632eeb22bf7', 'A130', 4, 'free'),
(131, '64632eeb32811', 'A131', 4, 'free'),
(132, '64632eeb3b438', 'A132', 4, 'free'),
(133, '64632eeb4b753', 'A133', 4, 'free'),
(134, '64632eeb52eb6', 'A134', 4, 'free'),
(135, '64632eeb5b8b4', 'A135', 4, 'free'),
(136, '64632eeb6345a', 'A136', 4, 'free'),
(137, '64632eeb6be79', 'A137', 4, 'free'),
(138, '64632eeb7367e', 'A138', 4, 'free'),
(139, '64632eeb7c1bb', 'A139', 4, 'free'),
(140, '64632eeb83a55', 'A140', 4, 'free'),
(141, '64632eeb91c88', 'A141', 4, 'free'),
(142, '64632eeb99295', 'A142', 4, 'free'),
(143, '64632eeba1ed3', 'A143', 4, 'free'),
(144, '64632eeba9435', 'A144', 4, 'free'),
(145, '64632eebb2284', 'A145', 4, 'free'),
(146, '64632eebbf115', 'A146', 4, 'free'),
(147, '64632eebc7a0c', 'A147', 4, 'free'),
(148, '64632eebcf1f8', 'A148', 4, 'free'),
(149, '64632eebd7f7e', 'A149', 4, 'free'),
(150, '64632eebdf573', 'A150', 4, 'free'),
(151, '64632eebe8111', 'A151', 4, 'free'),
(152, '64632eebef758', 'A152', 4, 'free'),
(153, '64632eec0452d', 'A153', 4, 'free'),
(154, '64632eec0ba0d', 'A154', 4, 'free'),
(155, '64632eec1f19b', 'A155', 4, 'free'),
(156, '64632eec2c3fa', 'A156', 4, 'free'),
(157, '64632eec34eec', 'A157', 4, 'free'),
(158, '64632eec3c766', 'A158', 4, 'free'),
(159, '64632eec45222', 'A159', 4, 'free'),
(160, '64632eec4c9dc', 'A160', 4, 'free'),
(161, '64632eec55369', 'A161', 4, 'free'),
(162, '64632eec5cfd5', 'A162', 4, 'free'),
(163, '64632eec658f4', 'A163', 4, 'free'),
(164, '64632eec6d235', 'A164', 4, 'free'),
(165, '64632eec75caf', 'A165', 4, 'free'),
(166, '64632eec7d634', 'A166', 4, 'free'),
(167, '64632eec8607d', 'A167', 4, 'free'),
(168, '64632eec8d8be', 'A168', 4, 'free'),
(169, '64632eec9c84a', 'A169', 4, 'free'),
(170, '64632eeca66df', 'A170', 4, 'free'),
(171, '64632eecadcde', 'A171', 4, 'free'),
(172, '64632eecb6a87', 'A172', 4, 'free'),
(173, '64632eecbe210', 'A173', 4, 'free'),
(174, '64632eecc6dc0', 'A174', 4, 'free'),
(175, '64632eecce3d5', 'A175', 4, 'free'),
(176, '64632eecd6f25', 'B1', 1, 'used'),
(177, '64632eecdea53', 'B2', 1, 'free'),
(178, '64632eece74a7', 'B3', 1, 'free'),
(179, '64632eeceed8a', 'B4', 1, 'free'),
(180, '64632eed035d8', 'B5', 1, 'free'),
(181, '64632eed0adcc', 'B6', 1, 'free'),
(182, '64632eed1396e', 'B7', 1, 'free'),
(183, '64632eed2691b', 'B8', 1, 'free'),
(184, '64632eed33920', 'B9', 1, 'free'),
(185, '64632eed40ecd', 'B10', 1, 'free'),
(186, '64632eed49ab1', 'B11', 1, 'free'),
(187, '64632eed50ff7', 'B12', 1, 'free'),
(188, '64632eed59f26', 'B13', 1, 'free'),
(189, '64632eed614bb', 'B14', 1, 'free'),
(190, '64632eed6a1f2', 'B15', 1, 'free'),
(191, '64632eed71982', 'B16', 1, 'free'),
(192, '64632eed7a4fd', 'B17', 1, 'free'),
(193, '64632eed81b2d', 'B18', 1, 'free'),
(194, '64632eed8a878', 'B19', 1, 'free'),
(195, '64632eed92027', 'B20', 1, 'free'),
(196, '64632eed9ac39', 'B21', 1, 'free'),
(197, '64632eeda23ed', 'B22', 1, 'free'),
(198, '64632eedaafca', 'B23', 1, 'free'),
(199, '64632eedb26b3', 'B24', 1, 'free'),
(200, '64632eedbb2da', 'B25', 1, 'free'),
(201, '64632eedc2c3c', 'B26', 1, 'free'),
(202, '64632eedd02ea', 'B27', 1, 'free'),
(203, '64632eedd8ceb', 'B28', 1, 'free'),
(204, '64632eede0762', 'B29', 1, 'free'),
(205, '64632eede92c4', 'B30', 1, 'free'),
(206, '64632eedf0c85', 'B31', 1, 'free'),
(207, '64632eee0532a', 'B32', 1, 'free'),
(208, '64632eee0cc9f', 'B33', 1, 'free'),
(209, '64632eee1574a', 'B34', 1, 'free'),
(210, '64632eee32b30', 'B35', 1, 'free'),
(211, '64632eee3b1b2', 'B36', 1, 'free'),
(212, '64632eee42f17', 'B37', 1, 'free'),
(213, '64632eee4e39d', 'B38', 1, 'free'),
(214, '64632eee5b153', 'B39', 1, 'free'),
(215, '64632eee63a32', 'B40', 1, 'free'),
(216, '64632eee6b635', 'B41', 1, 'free'),
(217, '64632eee73fa0', 'B42', 1, 'free'),
(218, '64632eee7b816', 'B43', 1, 'free'),
(219, '64632eee84173', 'B44', 1, 'free'),
(220, '64632eee8bce5', 'B45', 1, 'free'),
(221, '64632eee946d6', 'B46', 1, 'free'),
(222, '64632eee9bfc5', 'B47', 1, 'free'),
(223, '64632eeea4a25', 'B48', 1, 'free'),
(224, '64632eeeac280', 'B49', 1, 'free'),
(225, '64632eeeb4d91', 'B50', 1, 'free'),
(226, '64632eeebc6e4', 'B51', 1, 'free'),
(227, '64632eeec5142', 'B52', 1, 'free'),
(228, '64632eeecc8b1', 'B53', 1, 'free'),
(229, '64632eeed529c', 'B54', 1, 'free'),
(230, '64632eeedcda5', 'B55', 1, 'free'),
(231, '64632eeee561f', 'B56', 1, 'free'),
(232, '64632eeeeec0f', 'B57', 1, 'free'),
(233, '64632eef06e26', 'B58', 1, 'free'),
(234, '64632eef0e8ef', 'B59', 1, 'free'),
(235, '64632eef17299', 'B60', 1, 'free'),
(236, '64632eef37bc7', 'B61', 1, 'free'),
(237, '64632eef51e55', 'B62', 1, 'free'),
(238, '64632eef5aa65', 'B63', 1, 'free'),
(239, '64632eef6b0ad', 'B64', 1, 'free'),
(240, '64632eef726ab', 'B65', 1, 'free'),
(241, '64632eef7b48d', 'B66', 1, 'free'),
(242, '64632eef82a64', 'B67', 1, 'free'),
(243, '64632eef8b774', 'B68', 1, 'free'),
(244, '64632eef92df9', 'B69', 1, 'free'),
(245, '64632eef9ba12', 'B70', 1, 'free'),
(246, '64632eefa3167', 'B71', 1, 'free'),
(247, '64632eefabdeb', 'B72', 1, 'free'),
(248, '64632eefb362e', 'B73', 1, 'free'),
(249, '64632eefbc1e7', 'B74', 1, 'free'),
(250, '64632eefc97a6', 'B75', 1, 'free'),
(251, '64632eefd9e36', 'B76', 1, 'free'),
(252, '64632eefe9849', 'B77', 1, 'free'),
(253, '64632ef0060e7', 'B78', 1, 'free'),
(254, '64632ef013c08', 'B79', 1, 'free'),
(255, '64632ef01e8e2', 'B80', 1, 'free'),
(256, '64632ef031071', 'B81', 1, 'free'),
(257, '64632ef04440f', 'B82', 1, 'free'),
(258, '64632ef04ba1e', 'B83', 1, 'free'),
(259, '64632ef054592', 'B84', 1, 'free'),
(260, '64632ef05bdb5', 'B85', 1, 'free'),
(261, '64632ef064b07', 'B86', 1, 'free'),
(262, '64632ef06c13d', 'B87', 1, 'free'),
(263, '64632ef074e40', 'B88', 1, 'free'),
(264, '64632ef07c77e', 'B89', 1, 'free'),
(265, '64632ef08d410', 'B90', 1, 'free'),
(266, '64632ef094c9b', 'B91', 1, 'free'),
(267, '64632ef09d788', 'B92', 1, 'free'),
(268, '64632ef0a4d7a', 'B93', 1, 'free'),
(269, '64632ef0adc9a', 'B94', 1, 'free'),
(270, '64632ef0b5081', 'B95', 1, 'free'),
(271, '64632ef0bde9b', 'B96', 1, 'free'),
(272, '64632ef0c5423', 'B97', 1, 'free'),
(273, '64632ef0cdfc7', 'B98', 1, 'free'),
(274, '64632ef0d5815', 'B99', 1, 'free'),
(275, '64632ef0de5b2', 'B100', 1, 'free'),
(276, '64632ef0e8673', 'B101', 1, 'free'),
(277, '64632ef0f1434', 'B102', 1, 'free'),
(278, '64632ef104538', 'B103', 1, 'free'),
(279, '64632ef10d574', 'B104', 1, 'free'),
(280, '64632ef11a1c6', 'B105', 1, 'free'),
(281, '64632ef1250a8', 'B106', 1, 'free'),
(282, '64632ef137d09', 'B107', 1, 'free'),
(283, '64632ef140b12', 'B108', 1, 'free'),
(284, '64632ef147e9c', 'B109', 1, 'free'),
(285, '64632ef150f67', 'B110', 1, 'free'),
(286, '64632ef158294', 'B111', 1, 'free'),
(287, '64632ef1611f4', 'B112', 1, 'free'),
(288, '64632ef168692', 'B113', 1, 'free'),
(289, '64632ef1715b2', 'B114', 1, 'free'),
(290, '64632ef178af8', 'B115', 1, 'free'),
(291, '64632ef1818a3', 'B116', 1, 'free'),
(292, '64632ef188e77', 'B117', 1, 'free'),
(293, '64632ef197c94', 'B118', 1, 'free'),
(294, '64632ef1a1e9e', 'B119', 1, 'free'),
(295, '64632ef1a9795', 'B120', 1, 'free'),
(296, '64632ef1b6ca8', 'B121', 1, 'free'),
(297, '64632ef1bfba5', 'B122', 1, 'free'),
(298, '64632ef1c7120', 'B123', 1, 'free'),
(299, '64632ef1cfccc', 'B124', 1, 'free'),
(300, '64632ef1d7317', 'B125', 1, 'free'),
(301, '64632ef1e0328', 'B126', 1, 'free'),
(302, '64632ef1e76d2', 'B127', 1, 'free'),
(303, '64632ef1f058b', 'B128', 1, 'free'),
(304, '64632ef203a37', 'B129', 1, 'free'),
(305, '64632ef20c4ec', 'B130', 1, 'free'),
(306, '64632ef213c32', 'B131', 1, 'free'),
(307, '64632ef21c958', 'B132', 1, 'free'),
(308, '64632ef2344f3', 'B133', 1, 'free'),
(309, '64632ef23fd3c', 'B134', 1, 'free'),
(310, '64632ef24754f', 'B135', 1, 'free'),
(311, '64632ef2500b0', 'B136', 1, 'free'),
(312, '64632ef25765f', 'B137', 1, 'free'),
(313, '64632ef260239', 'B138', 1, 'free'),
(314, '64632ef267c76', 'B139', 1, 'free'),
(315, '64632ef27072c', 'B140', 1, 'free'),
(316, '64632ef277fcc', 'B141', 1, 'free'),
(317, '64632ef280aa3', 'B142', 1, 'free'),
(318, '64632ef288233', 'B143', 1, 'free'),
(319, '64632ef290e1b', 'B144', 1, 'free'),
(320, '64632ef29dd28', 'B145', 1, 'free'),
(321, '64632ef2a6811', 'B146', 1, 'free'),
(322, '64632ef2adec9', 'B147', 1, 'free'),
(323, '64632ef2b6b93', 'B148', 1, 'free'),
(324, '64632ef2c0e8c', 'B149', 1, 'free'),
(325, '64632ef2c9a1c', 'B150', 1, 'free'),
(326, '64632ef2d1009', 'B151', 1, 'free'),
(327, '64632ef2d9c03', 'B152', 1, 'free'),
(328, '64632ef2e1501', 'B153', 1, 'free'),
(329, '64632ef2ea127', 'B154', 1, 'free'),
(330, '64632ef2f16e1', 'B155', 1, 'free'),
(331, '64632ef3062ec', 'B156', 1, 'free'),
(332, '64632ef30d7a6', 'B157', 1, 'free'),
(333, '64632ef316358', 'B158', 1, 'free'),
(334, '64632ef31dbe3', 'B159', 1, 'free'),
(335, '64632ef326a1d', 'B160', 1, 'free'),
(336, '64632ef339983', 'B161', 1, 'free'),
(337, '64632ef347022', 'B162', 1, 'free'),
(338, '64632ef34e5e7', 'B163', 1, 'free'),
(339, '64632ef35724b', 'B164', 1, 'free'),
(340, '64632ef364d30', 'B165', 1, 'free'),
(341, '64632ef36c079', 'B166', 1, 'free'),
(342, '64632ef375081', 'B167', 1, 'free'),
(343, '64632ef385143', 'B168', 1, 'free'),
(344, '64632ef38c814', 'B169', 1, 'free'),
(345, '64632ef395688', 'B170', 1, 'free'),
(346, '64632ef39cda5', 'B171', 1, 'free'),
(347, '64632ef3a5a02', 'B172', 1, 'free'),
(348, '64632ef3ad077', 'B173', 1, 'free'),
(349, '64632ef3b5dbb', 'B174', 1, 'free'),
(350, '64632ef3bd4c7', 'B175', 1, 'free'),
(351, '64632ef3c60b9', 'B176', 1, 'free'),
(352, '64632ef3cd8e1', 'B177', 1, 'free'),
(353, '64632ef3d61fa', 'B178', 1, 'free'),
(354, '64632ef3dd9c1', 'B179', 1, 'free'),
(355, '64632ef3e67a2', 'B180', 1, 'free'),
(356, '64632ef3edf3c', 'B181', 1, 'free'),
(357, '64632ef4027dc', 'B182', 1, 'free'),
(358, '64632ef409e91', 'B183', 1, 'free'),
(359, '64632ef412ae5', 'B184', 1, 'free'),
(360, '64632ef41a199', 'B185', 1, 'free'),
(361, '64632ef42b0bd', 'B186', 1, 'free'),
(362, '64632ef4483b7', 'B187', 1, 'free'),
(363, '64632ef453a6a', 'B188', 1, 'free'),
(364, '64632ef45ae27', 'B189', 1, 'free'),
(365, '64632ef463bcb', 'B190', 1, 'free'),
(366, '64632ef46b377', 'B191', 1, 'free'),
(367, '64632ef4740ff', 'B192', 1, 'free'),
(368, '64632ef47b511', 'B193', 1, 'free'),
(369, '64632ef4842bb', 'B194', 1, 'free'),
(370, '64632ef48babb', 'B195', 1, 'free'),
(371, '64632ef494859', 'B196', 1, 'free'),
(372, '64632ef49bcd0', 'B197', 1, 'free'),
(373, '64632ef4a4c41', 'B198', 1, 'free'),
(374, '64632ef4ac241', 'B199', 1, 'free'),
(375, '64632ef4b4f18', 'B200', 1, 'free');

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
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billings_corpid_foreign` (`corpId`),
  ADD KEY `billings_billid_index` (`billId`(191));

--
-- Indexes for table `billingservices`
--
ALTER TABLE `billingservices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billingservices_billid_foreign` (`billId`),
  ADD KEY `billingservices_serviceid_foreign` (`serviceId`),
  ADD KEY `billingservices_billserviceid_index` (`billServiceId`(191));

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clearance_corpseid_foreign` (`corpseId`),
  ADD KEY `clearance_clearanceid_index` (`clearanceId`(191));

--
-- Indexes for table `corps`
--
ALTER TABLE `corps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `corps_slotid_foreign` (`slotId`),
  ADD KEY `corps_fridgeid_foreign` (`fridgeId`),
  ADD KEY `corps_corpid_index` (`corpId`),
  ADD KEY `corps_corpsecode_index` (`corpseCode`),
  ADD KEY `corps_name_index` (`name`);

--
-- Indexes for table `fridges`
--
ALTER TABLE `fridges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fridges_fridgeid_index` (`fridgeId`),
  ADD KEY `fridges_name_index` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_billid_foreign` (`billId`),
  ADD KEY `payments_paymentid_index` (`paymentId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_serviceid_index` (`serviceId`(191));

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slots_fridgeid_foreign` (`fridgeId`),
  ADD KEY `slots_slotid_index` (`slotId`),
  ADD KEY `slots_name_index` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billingservices`
--
ALTER TABLE `billingservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `corps`
--
ALTER TABLE `corps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fridges`
--
ALTER TABLE `fridges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_corpid_foreign` FOREIGN KEY (`corpId`) REFERENCES `corps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `billingservices`
--
ALTER TABLE `billingservices`
  ADD CONSTRAINT `billingservices_billid_foreign` FOREIGN KEY (`billId`) REFERENCES `billings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `billingservices_serviceid_foreign` FOREIGN KEY (`serviceId`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clearance`
--
ALTER TABLE `clearance`
  ADD CONSTRAINT `clearance_corpseid_foreign` FOREIGN KEY (`corpseId`) REFERENCES `corps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `corps`
--
ALTER TABLE `corps`
  ADD CONSTRAINT `corps_fridgeid_foreign` FOREIGN KEY (`fridgeId`) REFERENCES `fridges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `corps_slotid_foreign` FOREIGN KEY (`slotId`) REFERENCES `slots` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_billid_foreign` FOREIGN KEY (`billId`) REFERENCES `billings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `slots_fridgeid_foreign` FOREIGN KEY (`fridgeId`) REFERENCES `fridges` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
