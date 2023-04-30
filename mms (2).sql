-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 07:17 PM
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
('1', 'stephen12', 'flow1995', 'admin', '0000-00-00', '0000-00-00'),
('2', 'stephen13', 'flow1995', 'user', '0000-00-00', '0000-00-00');

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
('644d9216ba1d3', 'OVM-N-FRG-A-A2', 'for both daily and extra', 5, 8, 0.00, 312.00, '2023-04-22', '2023-04-22'),
('644ea1bb70f8e', 'OVM-K-FRG-A-A4', 'no purpose', 1, 15, 0.00, 274.00, '2023-04-19', '2023-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `billingservices`
--

CREATE TABLE `billingservices` (
  `billServiceId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billingservices`
--

INSERT INTO `billingservices` (`billServiceId`, `billId`, `serviceId`, `createdAt`, `updatedAt`) VALUES
('644d90bdb1dae', '644d90bd7ec42', '644d846f46129', '0000-00-00', '0000-00-00'),
('644d90bdbca70', '644d90bd7ec42', '644d849678345', '0000-00-00', '0000-00-00'),
('644e978845b1a', '644d9216ba1d3', '644d846f46129', '0000-00-00', '0000-00-00'),
('644e978864f81', '644d9216ba1d3', '644d849678345', '0000-00-00', '0000-00-00'),
('644e978870a5b', '644d9216ba1d3', '644e97103f605', '0000-00-00', '0000-00-00'),
('644ea25bde96a', '644ea1bb70f8e', '644d849678345', '0000-00-00', '0000-00-00'),
('644ea25c063f1', '644ea1bb70f8e', '644e97103f605', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `clearanceId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corpseId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`clearanceId`, `corpseId`, `status`, `createdAt`, `updatedAt`) VALUES
('64385d9a7443c', 'OVM-K-FRG-A-A1', 'true', '2023-04-13', '2023-04-13'),
('64402a6f3eb85', 'OVM-K-FRG-A-A10', 'true', '2023-04-19', '0000-00-00'),
('6440ef17e8caa', 'OVM-N-FRG-A-A2', 'true', '2023-04-20', '0000-00-00');

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
('6431fbf60a1d1', 'OVM-K-FRG-A-A1', '2023-04-08', 'Kofi minta Mintin', 23, 'M', 'Kwemuman', 'stephany', '0540533008', '0540533008', '2023-04-09', 'no remarks', 'Stephen Odiodiodio', '0000-00-00', '6429635a440b6', '642963e3997fb', 'VIP'),
('6431fc518b40b', 'OVM-K-FRG-A-A10', '2023-04-08', 'Ken Agyakum Kufio', 45, 'F', 'Nima Manobi road', 'Konte', '0241705289', '0248759658', '2023-04-12', 'no commment', 'ggg', '0000-00-00', '6429635a440b6', '642963e41b432', 'VIP'),
('6439d39a2b19f', 'OVM-K-FRG-A-A4', '2023-04-14', 'Kweku Minta', 34, 'M', 'Twifo', 'Eva Atingule', '0540533008', '0540533008', '2023-04-15', 'no comment', 'Mr. Edu Jamfi', '0000-00-00', '6429635a440b6', '642963e3d9560', 'VIP'),
('643c8a74bcc4c', 'OVM-N-FRG-A-A2', '2023-04-16', 'Nimo Frimpong', 34, 'M', 'Tono', 'Kofi Abanga', '0540533008', '0540533008', '2023-04-21', '', 'Akupama Mandof', '0000-00-00', '6429635a440b6', '642963e3b7589', 'Normal');

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
('6429635a440b6', 'A', 'first floor room 4', 'free'),
('642963889c50f', 'B', 'first floor room 4', 'free');

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
(7, '2022_12_11_181007_accounts', 7);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `billId` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `amount`, `billId`, `description`, `createdAt`, `updatedAt`) VALUES
('6435d76da23b5', 12.00, '64354246026be', 'yes description', '2023-04-12', '0000-00-00'),
('643675d5d66aa', 90.00, '64354246026be', 'payment for extra', '2023-04-13', '0000-00-00'),
('64373365c23d0', 34.00, '64354246026be', 'paid in full', '2023-04-12', '0000-00-00'),
('64401449d4450', 132.00, '6440118d350f0', 'payment for bills', '2023-04-19', '0000-00-00'),
('6440ee75e9539', 60.00, '6440edfb38f82', 'bill fees', '2023-04-13', '0000-00-00');

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
('644d846f46129', 'Bathing', 80.00, 'once', '2023-05-06', '2023-05-06'),
('644d849678345', 'Keeping in fridge', 14.00, 'daily', '2023-05-06', '2023-05-06'),
('644e97103f605', 'Embalmment', 50.00, 'once', '2023-04-30', '2023-04-30'),
('644e97361804b', 'Pant for Male', 20.00, 'once', '2023-04-30', '2023-04-30'),
('644e9742b874e', 'Pant for Female', 20.00, 'once', '2023-04-30', '2023-04-30');

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
('642963e3997fb', 'A1', '6429635a440b6', 'used'),
('642963e3b7589', 'A2', '6429635a440b6', 'used'),
('642963e3c1ef7', 'A3', '6429635a440b6', 'free'),
('642963e3d9560', 'A4', '6429635a440b6', 'used'),
('642963e3e51d6', 'A5', '6429635a440b6', 'free'),
('642963e3ec4cc', 'A6', '6429635a440b6', 'free'),
('642963e40130e', 'A7', '6429635a440b6', 'free'),
('642963e40859a', 'A8', '6429635a440b6', 'free'),
('642963e4141c0', 'A9', '6429635a440b6', 'free'),
('642963e41b432', 'A10', '6429635a440b6', 'used'),
('642963e424315', 'A11', '6429635a440b6', 'free'),
('642963e42b75c', 'A12', '6429635a440b6', 'free'),
('642963e4346c3', 'A13', '6429635a440b6', 'free'),
('642963e43bb3c', 'A14', '6429635a440b6', 'free'),
('642963e444b4f', 'A15', '6429635a440b6', 'free'),
('642963e44f75e', 'A16', '6429635a440b6', 'free'),
('642963e456b8a', 'A17', '6429635a440b6', 'free'),
('642963e45fa6c', 'A18', '6429635a440b6', 'free'),
('642963e466ef1', 'A19', '6429635a440b6', 'free'),
('642963e46fdfd', 'A20', '6429635a440b6', 'free'),
('642963e4773a7', 'A21', '6429635a440b6', 'free'),
('642963e47ffba', 'A22', '6429635a440b6', 'free'),
('642963e48758d', 'A23', '6429635a440b6', 'free'),
('642963e4904ee', 'A24', '6429635a440b6', 'free'),
('642963e49793b', 'A25', '6429635a440b6', 'free'),
('642963e4a06d4', 'A26', '6429635a440b6', 'free'),
('642963e4b0ca9', 'A27', '6429635a440b6', 'free'),
('642963e4b80a4', 'A28', '6429635a440b6', 'free'),
('642963e4c11e7', 'A29', '6429635a440b6', 'free'),
('642963e4cd2c4', 'A30', '6429635a440b6', 'free'),
('642963e4d6c9e', 'A31', '6429635a440b6', 'free'),
('642963e4dddf5', 'A32', '6429635a440b6', 'free'),
('642963e4e6f0d', 'A33', '6429635a440b6', 'free'),
('642963e4ee190', 'A34', '6429635a440b6', 'free'),
('642963e502f9f', 'A35', '6429635a440b6', 'free'),
('642963e50a321', 'A36', '6429635a440b6', 'free'),
('642963e513499', 'A37', '6429635a440b6', 'free'),
('642963e51a667', 'A38', '6429635a440b6', 'free'),
('642963e523602', 'A39', '6429635a440b6', 'free'),
('642963e52a7c9', 'A40', '6429635a440b6', 'free'),
('642963e533aac', 'A41', '6429635a440b6', 'free'),
('642963e53add6', 'A42', '6429635a440b6', 'free'),
('642963e543c84', 'A43', '6429635a440b6', 'free'),
('642963e54b158', 'A44', '6429635a440b6', 'free'),
('642963e5542bf', 'A45', '6429635a440b6', 'free'),
('642963e55b4b1', 'A46', '6429635a440b6', 'free'),
('642963e56443c', 'A47', '6429635a440b6', 'free'),
('642963e56b81d', 'A48', '6429635a440b6', 'free'),
('642963e574997', 'A49', '6429635a440b6', 'free'),
('642963e57bba0', 'A50', '6429635a440b6', 'free'),
('642963e584d2c', 'A51', '6429635a440b6', 'free'),
('642963e58bf10', 'A52', '6429635a440b6', 'free'),
('642963e59522e', 'A53', '6429635a440b6', 'free'),
('642963e59c281', 'A54', '6429635a440b6', 'free'),
('642963e5a5221', 'A55', '6429635a440b6', 'free'),
('642963e5ac636', 'A56', '6429635a440b6', 'free'),
('642963e5b57a6', 'A57', '6429635a440b6', 'free'),
('642963e5bc98a', 'A58', '6429635a440b6', 'free'),
('642963e5c5afe', 'A59', '6429635a440b6', 'free'),
('642963e5cccbb', 'A60', '6429635a440b6', 'free'),
('642963e5d5ccf', 'A61', '6429635a440b6', 'free'),
('642963e5dd06b', 'A62', '6429635a440b6', 'free'),
('642963e5e61fc', 'A63', '6429635a440b6', 'free'),
('642963e5ed1a6', 'A64', '6429635a440b6', 'free'),
('642963e606a7b', 'A65', '6429635a440b6', 'free'),
('642963e60f9c4', 'A66', '6429635a440b6', 'free'),
('642963e616c5e', 'A67', '6429635a440b6', 'free'),
('642963e61fb2a', 'A68', '6429635a440b6', 'free'),
('642963e626f1b', 'A69', '6429635a440b6', 'free'),
('642963e62fe74', 'A70', '6429635a440b6', 'free'),
('642963e637428', 'A71', '6429635a440b6', 'free'),
('642963e640268', 'A72', '6429635a440b6', 'free'),
('642963e6477b0', 'A73', '6429635a440b6', 'free'),
('642963e65044c', 'A74', '6429635a440b6', 'free'),
('642963e657b0f', 'A75', '6429635a440b6', 'free'),
('642963e660988', 'A76', '6429635a440b6', 'free'),
('642963e667ea4', 'A77', '6429635a440b6', 'free'),
('642963e670ce8', 'A78', '6429635a440b6', 'free'),
('642963e67821e', 'A79', '6429635a440b6', 'free'),
('642963e681022', 'A80', '6429635a440b6', 'free'),
('642963e688540', 'A81', '6429635a440b6', 'free'),
('642963e6912f5', 'A82', '6429635a440b6', 'free'),
('642963e6988f7', 'A83', '6429635a440b6', 'free'),
('642963e6a15b9', 'A84', '6429635a440b6', 'free'),
('642963e6a8ae3', 'A85', '6429635a440b6', 'free'),
('642963e6b1af8', 'A86', '6429635a440b6', 'free'),
('642963e6b8e29', 'A87', '6429635a440b6', 'free'),
('642963e6c1d5e', 'A88', '6429635a440b6', 'free'),
('642963e6c93ba', 'A89', '6429635a440b6', 'free'),
('642963e6d22f0', 'A90', '6429635a440b6', 'free'),
('642963e6d96f9', 'A91', '6429635a440b6', 'free'),
('642963e6e2498', 'A92', '6429635a440b6', 'free'),
('642963e6e9a8a', 'A93', '6429635a440b6', 'free'),
('642963e6f2907', 'A94', '6429635a440b6', 'free'),
('642963e705b99', 'A95', '6429635a440b6', 'free'),
('642963e70ea7f', 'A96', '6429635a440b6', 'free'),
('642963e715f2d', 'A97', '6429635a440b6', 'free'),
('642963e71ec8e', 'A98', '6429635a440b6', 'free'),
('642963e726249', 'A99', '6429635a440b6', 'free'),
('642963e72ef89', 'A100', '6429635a440b6', 'free'),
('642963e736704', 'A101', '6429635a440b6', 'free'),
('642963e73f4b8', 'A102', '6429635a440b6', 'free'),
('642963e7467b8', 'A103', '6429635a440b6', 'free'),
('642963e74f725', 'A104', '6429635a440b6', 'free'),
('642963e75d14b', 'A105', '6429635a440b6', 'free'),
('642963e764522', 'A106', '6429635a440b6', 'free'),
('642963e76d60c', 'A107', '6429635a440b6', 'free'),
('642963e774899', 'A108', '6429635a440b6', 'free'),
('642963e77d998', 'A109', '6429635a440b6', 'free'),
('642963e784c0a', 'A110', '6429635a440b6', 'free'),
('642963e78de56', 'A111', '6429635a440b6', 'free'),
('642963e794f81', 'A112', '6429635a440b6', 'free'),
('642963e79e07e', 'A113', '6429635a440b6', 'free'),
('642963e7a50fc', 'A114', '6429635a440b6', 'free'),
('642963e7ae401', 'A115', '6429635a440b6', 'free'),
('642963e7b5660', 'A116', '6429635a440b6', 'free'),
('642963e7be7b2', 'A117', '6429635a440b6', 'free'),
('642963e7c59d9', 'A118', '6429635a440b6', 'free'),
('642963e7cead6', 'A119', '6429635a440b6', 'free'),
('642963e7d5d72', 'A120', '6429635a440b6', 'free'),
('642963e7dee67', 'A121', '6429635a440b6', 'free'),
('642963e7e60b9', 'A122', '6429635a440b6', 'free'),
('642963e7ef1db', 'A123', '6429635a440b6', 'free'),
('642963e8021ea', 'A124', '6429635a440b6', 'free'),
('642963e80b316', 'A125', '6429635a440b6', 'free'),
('642963e81255f', 'A126', '6429635a440b6', 'free'),
('642963e81b4b5', 'A127', '6429635a440b6', 'free'),
('642963e8228d7', 'A128', '6429635a440b6', 'free'),
('642963e82ba1c', 'A129', '6429635a440b6', 'free'),
('642963e832a57', 'A130', '6429635a440b6', 'free'),
('642963e83bdb6', 'A131', '6429635a440b6', 'free'),
('642963e842faf', 'A132', '6429635a440b6', 'free'),
('642963e84c127', 'A133', '6429635a440b6', 'free'),
('642963e85312c', 'A134', '6429635a440b6', 'free'),
('642963e85ee7b', 'A135', '6429635a440b6', 'free'),
('642963e868cc0', 'A136', '6429635a440b6', 'free'),
('642963e871ca6', 'A137', '6429635a440b6', 'free'),
('642963e8790dd', 'A138', '6429635a440b6', 'free'),
('642963e88220f', 'A139', '6429635a440b6', 'free'),
('642963e88944b', 'A140', '6429635a440b6', 'free'),
('642963e8923f9', 'A141', '6429635a440b6', 'free'),
('642963e899789', 'A142', '6429635a440b6', 'free'),
('642963e8a291d', 'A143', '6429635a440b6', 'free'),
('642963e8a98e2', 'A144', '6429635a440b6', 'free'),
('642963e8b2b3f', 'A145', '6429635a440b6', 'free'),
('642963e8b9ca1', 'A146', '6429635a440b6', 'free'),
('642963e8c3026', 'A147', '6429635a440b6', 'free'),
('642963e8ca1d2', 'A148', '6429635a440b6', 'free'),
('642963e8d339e', 'A149', '6429635a440b6', 'free'),
('642963e8da4d4', 'A150', '6429635a440b6', 'free'),
('642963e8e3706', 'A151', '6429635a440b6', 'free'),
('642963e8ea8b8', 'A152', '6429635a440b6', 'free'),
('642963e8f3897', 'A153', '6429635a440b6', 'free'),
('642963e906a1e', 'A154', '6429635a440b6', 'free'),
('642963e90f9b1', 'A155', '6429635a440b6', 'free'),
('642963e916d98', 'A156', '6429635a440b6', 'free'),
('642963e91fb8d', 'A157', '6429635a440b6', 'free'),
('642963e92bec9', 'A158', '6429635a440b6', 'free'),
('642963e93550e', 'A159', '6429635a440b6', 'free'),
('642963e93ca8e', 'A160', '6429635a440b6', 'free'),
('642963e9458ce', 'A161', '6429635a440b6', 'free'),
('642963e94ce6c', 'A162', '6429635a440b6', 'free'),
('642963e955e16', 'A163', '6429635a440b6', 'free'),
('642963e95d1e0', 'A164', '6429635a440b6', 'free'),
('642963e968335', 'A165', '6429635a440b6', 'free'),
('642963e970cb8', 'A166', '6429635a440b6', 'free'),
('642963e978234', 'A167', '6429635a440b6', 'free'),
('642963e980fb0', 'A168', '6429635a440b6', 'free'),
('642963e9885ae', 'A169', '6429635a440b6', 'free'),
('642963e9913cd', 'A170', '6429635a440b6', 'free'),
('642963e99891b', 'A171', '6429635a440b6', 'free'),
('642963e9a15c0', 'A172', '6429635a440b6', 'free'),
('642963e9a8c8e', 'A173', '6429635a440b6', 'free'),
('642963e9b18e6', 'A174', '6429635a440b6', 'free'),
('642963e9b90d6', 'A175', '6429635a440b6', 'free'),
('642964d113153', 'B1', '642963889c50f', 'free'),
('642964d12aaa6', 'B2', '642963889c50f', 'free'),
('642964d131723', 'B3', '642963889c50f', 'free'),
('642964d13a87d', 'B4', '642963889c50f', 'free'),
('642964d141c9f', 'B5', '642963889c50f', 'free'),
('642964d14ac05', 'B6', '642963889c50f', 'free'),
('642964d152053', 'B7', '642963889c50f', 'free'),
('642964d15af8d', 'B8', '642963889c50f', 'free'),
('642964d1622c7', 'B9', '642963889c50f', 'free'),
('642964d16b497', 'B10', '642963889c50f', 'free'),
('642964d17267c', 'B11', '642963889c50f', 'free'),
('642964d17b697', 'B12', '642963889c50f', 'free'),
('642964d188fa8', 'B13', '642963889c50f', 'free'),
('642964d196805', 'B14', '642963889c50f', 'free'),
('642964d19da68', 'B15', '642963889c50f', 'free'),
('642964d1a6c3d', 'B16', '642963889c50f', 'free'),
('642964d1adc2d', 'B17', '642963889c50f', 'free'),
('642964d1b6e0d', 'B18', '642963889c50f', 'free'),
('642964d1be14f', 'B19', '642963889c50f', 'free'),
('642964d1c7054', 'B20', '642963889c50f', 'free'),
('642964d1ce4c9', 'B21', '642963889c50f', 'free'),
('642964d1d8f94', 'B22', '642963889c50f', 'free'),
('642964d200c6f', 'B23', '642963889c50f', 'free'),
('642964d208248', 'B24', '642963889c50f', 'free'),
('642964d210ff1', 'B25', '642963889c50f', 'free'),
('642964d218549', 'B26', '642963889c50f', 'free'),
('642964d221368', 'B27', '642963889c50f', 'free'),
('642964d2288b6', 'B28', '642963889c50f', 'free'),
('642964d231545', 'B29', '642963889c50f', 'free'),
('642964d238ad0', 'B30', '642963889c50f', 'free'),
('642964d241a5c', 'B31', '642963889c50f', 'free'),
('642964d248f89', 'B32', '642963889c50f', 'free'),
('642964d251ddb', 'B33', '642963889c50f', 'free'),
('642964d259331', 'B34', '642963889c50f', 'free'),
('642964d262178', 'B35', '642963889c50f', 'free'),
('642964d2696a3', 'B36', '642963889c50f', 'free'),
('642964d272501', 'B37', '642963889c50f', 'free'),
('642964d279a0d', 'B38', '642963889c50f', 'free'),
('642964d282890', 'B39', '642963889c50f', 'free'),
('642964d29570f', 'B40', '642963889c50f', 'free'),
('642964d2a06b8', 'B41', '642963889c50f', 'free'),
('642964d2a7929', 'B42', '642963889c50f', 'free'),
('642964d2b0813', 'B43', '642963889c50f', 'free'),
('642964d2b7d2f', 'B44', '642963889c50f', 'free'),
('642964d2c0b3f', 'B45', '642963889c50f', 'free'),
('642964d2c8009', 'B46', '642963889c50f', 'free'),
('642964d2d10a8', 'B47', '642963889c50f', 'free'),
('642964d2d837f', 'B48', '642963889c50f', 'free'),
('642964d2e1309', 'B49', '642963889c50f', 'free'),
('642964d2e86f9', 'B50', '642963889c50f', 'free'),
('642964d2f17d0', 'B51', '642963889c50f', 'free'),
('642964d30482d', 'B52', '642963889c50f', 'free'),
('642964d30d8db', 'B53', '642963889c50f', 'free'),
('642964d314a79', 'B54', '642963889c50f', 'free'),
('642964d31da8b', 'B55', '642963889c50f', 'free'),
('642964d324f2f', 'B56', '642963889c50f', 'free'),
('642964d32dfeb', 'B57', '642963889c50f', 'free'),
('642964d335100', 'B58', '642963889c50f', 'free'),
('642964d33e41b', 'B59', '642963889c50f', 'free'),
('642964d348d99', 'B60', '642963889c50f', 'free'),
('642964d35030e', 'B61', '642963889c50f', 'free'),
('642964d3591c3', 'B62', '642963889c50f', 'free'),
('642964d36072f', 'B63', '642963889c50f', 'free'),
('642964d36952d', 'B64', '642963889c50f', 'free'),
('642964d370a0a', 'B65', '642963889c50f', 'free'),
('642964d3798bf', 'B66', '642963889c50f', 'free'),
('642964d383ac9', 'B67', '642963889c50f', 'free'),
('642964d391f46', 'B68', '642963889c50f', 'free'),
('642964d39f631', 'B69', '642963889c50f', 'free'),
('642964d3a68aa', 'B70', '642963889c50f', 'free'),
('642964d3af9e1', 'B71', '642963889c50f', 'free'),
('642964d3b6cc7', 'B72', '642963889c50f', 'free'),
('642964d3bfd19', 'B73', '642963889c50f', 'free'),
('642964d3c71a6', 'B74', '642963889c50f', 'free'),
('642964d3d00a2', 'B75', '642963889c50f', 'free'),
('642964d3d74f1', 'B76', '642963889c50f', 'free'),
('642964d3e045d', 'B77', '642963889c50f', 'free'),
('642964d3e78b5', 'B78', '642963889c50f', 'free'),
('642964d3f07b1', 'B79', '642963889c50f', 'free'),
('642964d4039ec', 'B80', '642963889c50f', 'free'),
('642964d410876', 'B81', '642963889c50f', 'free'),
('642964d419f14', 'B82', '642963889c50f', 'free'),
('642964d42158c', 'B83', '642963889c50f', 'free'),
('642964d42a2a4', 'B84', '642963889c50f', 'free'),
('642964d431986', 'B85', '642963889c50f', 'free'),
('642964d43a45e', 'B86', '642963889c50f', 'free'),
('642964d441d28', 'B87', '642963889c50f', 'free'),
('642964d44aa00', 'B88', '642963889c50f', 'free'),
('642964d451fd9', 'B89', '642963889c50f', 'free'),
('642964d45adf7', 'B90', '642963889c50f', 'free'),
('642964d46d0d8', 'B91', '642963889c50f', 'free'),
('642964d480a24', 'B92', '642963889c50f', 'free'),
('642964d48ac65', 'B93', '642963889c50f', 'free'),
('642964d4a441e', 'B94', '642963889c50f', 'free'),
('642964d4b1681', 'B95', '642963889c50f', 'free'),
('642964d4c1761', 'B96', '642963889c50f', 'free'),
('642964d4d1ee6', 'B97', '642963889c50f', 'free'),
('642964d4e482b', 'B98', '642963889c50f', 'free'),
('642964d4f350e', 'B99', '642963889c50f', 'free'),
('642964d50e445', 'B100', '642963889c50f', 'free'),
('642964d515b10', 'B101', '642963889c50f', 'free'),
('642964d51e7ea', 'B102', '642963889c50f', 'free'),
('642964d525e45', 'B103', '642963889c50f', 'free'),
('642964d52ea0d', 'B104', '642963889c50f', 'free'),
('642964d5361a8', 'B105', '642963889c50f', 'free'),
('642964d53ecc1', 'B106', '642963889c50f', 'free'),
('642964d54651c', 'B107', '642963889c50f', 'free'),
('642964d54f234', 'B108', '642963889c50f', 'free'),
('642964d556873', 'B109', '642963889c50f', 'free'),
('642964d55f3ca', 'B110', '642963889c50f', 'free'),
('642964d566bfe', 'B111', '642963889c50f', 'free'),
('642964d56f927', 'B112', '642963889c50f', 'free'),
('642964d577080', 'B113', '642963889c50f', 'free'),
('642964d5847f7', 'B114', '642963889c50f', 'free'),
('642964d58d460', 'B115', '642963889c50f', 'free'),
('642964d5a2e9e', 'B116', '642963889c50f', 'free'),
('642964d5b30c7', 'B117', '642963889c50f', 'free'),
('642964d5c0933', 'B118', '642963889c50f', 'free'),
('642964d5c80e9', 'B119', '642963889c50f', 'free'),
('642964d5d0ef7', 'B120', '642963889c50f', 'free'),
('642964d5d8420', 'B121', '642963889c50f', 'free'),
('642964d5e1409', 'B122', '642963889c50f', 'free'),
('642964d5e87be', 'B123', '642963889c50f', 'free'),
('642964d5f1602', 'B124', '642963889c50f', 'free'),
('642964d604911', 'B125', '642963889c50f', 'free'),
('642964d60d72d', 'B126', '642963889c50f', 'free'),
('642964d614c8b', 'B127', '642963889c50f', 'free'),
('642964d61dad2', 'B128', '642963889c50f', 'free'),
('642964d624fcf', 'B129', '642963889c50f', 'free'),
('642964d62dcdc', 'B130', '642963889c50f', 'free'),
('642964d635340', 'B131', '642963889c50f', 'free'),
('642964d63e1a9', 'B132', '642963889c50f', 'free'),
('642964d6454bc', 'B133', '642963889c50f', 'free'),
('642964d64e530', 'B134', '642963889c50f', 'free'),
('642964d655a1a', 'B135', '642963889c50f', 'free'),
('642964d65e8e5', 'B136', '642963889c50f', 'free'),
('642964d665bf8', 'B137', '642963889c50f', 'free'),
('642964d66ec59', 'B138', '642963889c50f', 'free'),
('642964d676110', 'B139', '642963889c50f', 'free'),
('642964d67efbb', 'B140', '642963889c50f', 'free'),
('642964d686483', 'B141', '642963889c50f', 'free'),
('642964d68f3ec', 'B142', '642963889c50f', 'free'),
('642964d69cd49', 'B143', '642963889c50f', 'free'),
('642964d6acefc', 'B144', '642963889c50f', 'free'),
('642964d6b43a3', 'B145', '642963889c50f', 'free'),
('642964d6bd05e', 'B146', '642963889c50f', 'free'),
('642964d6c4717', 'B147', '642963889c50f', 'free'),
('642964d6cd5ec', 'B148', '642963889c50f', 'free'),
('642964d6d4a66', 'B149', '642963889c50f', 'free'),
('642964d6dd834', 'B150', '642963889c50f', 'free'),
('642964d6e4dea', 'B151', '642963889c50f', 'free'),
('642964d6edce2', 'B152', '642963889c50f', 'free'),
('642964d700f1b', 'B153', '642963889c50f', 'free'),
('642964d709fa9', 'B154', '642963889c50f', 'free'),
('642964d7112ab', 'B155', '642963889c50f', 'free'),
('642964d71a1bc', 'B156', '642963889c50f', 'free'),
('642964d72162e', 'B157', '642963889c50f', 'free'),
('642964d72a3ac', 'B158', '642963889c50f', 'free'),
('642964d731996', 'B159', '642963889c50f', 'free'),
('642964d73a893', 'B160', '642963889c50f', 'free'),
('642964d741b40', 'B161', '642963889c50f', 'free'),
('642964d74aade', 'B162', '642963889c50f', 'free'),
('642964d751f5c', 'B163', '642963889c50f', 'free'),
('642964d75af7f', 'B164', '642963889c50f', 'free'),
('642964d7623f5', 'B165', '642963889c50f', 'free'),
('642964d76b1f9', 'B166', '642963889c50f', 'free'),
('642964d77276e', 'B167', '642963889c50f', 'free'),
('642964d77b67e', 'B168', '642963889c50f', 'free'),
('642964d78292b', 'B169', '642963889c50f', 'free'),
('642964d78b9fb', 'B170', '642963889c50f', 'free'),
('642964d7a5e95', 'B171', '642963889c50f', 'free'),
('642964d7b40bb', 'B172', '642963889c50f', 'free'),
('642964d7bb6e3', 'B173', '642963889c50f', 'free'),
('642964d7c4487', 'B174', '642963889c50f', 'free'),
('642964d7cba95', 'B175', '642963889c50f', 'free');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
