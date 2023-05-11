-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 01:36 AM
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
(27, '645d6733352a5', 18, 'ds', 9, 0, 0.00, 980.00, '2023-05-12', '2023-05-12');

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
(18, '645c298528368', 'OVM-K-FRG-B-B4', '2023-05-03', 'Kofi Aponsah', 25, 'M', 'Tweebreeooo', 'Adasababa', '0540533008', '', '2023-05-12', '', 'no name', '0000-00-00', 3, 405, 'VIP');

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
(2, '645a3b837f927', 'A', 'first floor room 4', 'free'),
(3, '645a3c5421014', 'B', 'first floor room 4', 'free');

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
(18, '2023_04_07_113003_Clearance', 18);

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

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serviceId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(8,2) NOT NULL,
  `per` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` date NOT NULL,
  `updatedAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(202, '645a3cd205ba0', 'A1', 2, 'used'),
(203, '645a3cd210879', 'A2', 2, 'used'),
(204, '645a3cd224366', 'A3', 2, 'used'),
(205, '645a3cd24f334', 'A4', 2, 'used'),
(206, '645a3cd256eb8', 'A5', 2, 'used'),
(207, '645a3cd277f61', 'A6', 2, 'used'),
(208, '645a3cd27f7c5', 'A7', 2, 'used'),
(209, '645a3cd2880f4', 'A8', 2, 'used'),
(210, '645a3cd28f914', 'A9', 2, 'free'),
(211, '645a3cd298550', 'A10', 2, 'free'),
(212, '645a3cd29fd40', 'A11', 2, 'free'),
(213, '645a3cd2a8a3d', 'A12', 2, 'free'),
(214, '645a3cd2b01e5', 'A13', 2, 'free'),
(215, '645a3cd2b89e3', 'A14', 2, 'free'),
(216, '645a3cd2c0372', 'A15', 2, 'free'),
(217, '645a3cd2cddde', 'A16', 2, 'free'),
(218, '645a3cd2d6749', 'A17', 2, 'free'),
(219, '645a3cd2de030', 'A18', 2, 'free'),
(220, '645a3cd2e6afa', 'A19', 2, 'free'),
(221, '645a3cd2ee4bc', 'A20', 2, 'free'),
(222, '645a3cd309716', 'A21', 2, 'free'),
(223, '645a3cd312be3', 'A22', 2, 'free'),
(224, '645a3cd31a9f4', 'A23', 2, 'free'),
(225, '645a3cd322efe', 'A24', 2, 'free'),
(226, '645a3cd32ab06', 'A25', 2, 'free'),
(227, '645a3cd333171', 'A26', 2, 'free'),
(228, '645a3cd33b549', 'A27', 2, 'free'),
(229, '645a3cd3433f5', 'A28', 2, 'free'),
(230, '645a3cd351247', 'A29', 2, 'free'),
(231, '645a3cd37152c', 'A30', 2, 'free'),
(232, '645a3cd37c47c', 'A31', 2, 'free'),
(233, '645a3cd38402b', 'A32', 2, 'free'),
(234, '645a3cd38c6d2', 'A33', 2, 'free'),
(235, '645a3cd39a2dc', 'A34', 2, 'free'),
(236, '645a3cd3a1c25', 'A35', 2, 'free'),
(237, '645a3cd3b2214', 'A36', 2, 'free'),
(238, '645a3cd3ba8f3', 'A37', 2, 'free'),
(239, '645a3cd3c7f41', 'A38', 2, 'free'),
(240, '645a3cd3cf9a6', 'A39', 2, 'free'),
(241, '645a3cd3e046c', 'A40', 2, 'free'),
(242, '645a3cd3f09ef', 'A41', 2, 'free'),
(243, '645a3cd409ce4', 'A42', 2, 'free'),
(244, '645a3cd4119f7', 'A43', 2, 'free'),
(245, '645a3cd41f850', 'A44', 2, 'free'),
(246, '645a3cd429efe', 'A45', 2, 'free'),
(247, '645a3cd43a5dc', 'A46', 2, 'free'),
(248, '645a3cd442027', 'A47', 2, 'free'),
(249, '645a3cd44a7f8', 'A48', 2, 'free'),
(250, '645a3cd452cbb', 'A49', 2, 'free'),
(251, '645a3cd45aa1f', 'A50', 2, 'free'),
(252, '645a3cd478cba', 'A51', 2, 'free'),
(253, '645a3cd486410', 'A52', 2, 'free'),
(254, '645a3cd49104d', 'A53', 2, 'free'),
(255, '645a3cd498ba8', 'A54', 2, 'free'),
(256, '645a3cd4a15d0', 'A55', 2, 'free'),
(257, '645a3cd4b1142', 'A56', 2, 'free'),
(258, '645a3cd4c7baa', 'A57', 2, 'free'),
(259, '645a3cd4dd2c0', 'A58', 2, 'free'),
(260, '645a3cd503af5', 'A59', 2, 'free'),
(261, '645a3cd51654a', 'A60', 2, 'free'),
(262, '645a3cd51e22e', 'A61', 2, 'free'),
(263, '645a3cd526a5d', 'A62', 2, 'free'),
(264, '645a3cd52e612', 'A63', 2, 'free'),
(265, '645a3cd536e0a', 'A64', 2, 'free'),
(266, '645a3cd53e82d', 'A65', 2, 'free'),
(267, '645a3cd54c771', 'A66', 2, 'free'),
(268, '645a3cd55a267', 'A67', 2, 'free'),
(269, '645a3cd57275f', 'A68', 2, 'free'),
(270, '645a3cd57a17f', 'A69', 2, 'free'),
(271, '645a3cd582ae6', 'A70', 2, 'free'),
(272, '645a3cd58ff41', 'A71', 2, 'free'),
(273, '645a3cd59b02d', 'A72', 2, 'free'),
(274, '645a3cd5a2bad', 'A73', 2, 'free'),
(275, '645a3cd5ab213', 'A74', 2, 'free'),
(276, '645a3cd5b5d16', 'A75', 2, 'free'),
(277, '645a3cd5bd69a', 'A76', 2, 'free'),
(278, '645a3cd5c6269', 'A77', 2, 'free'),
(279, '645a3cd5cddfd', 'A78', 2, 'free'),
(280, '645a3cd5d65cd', 'A79', 2, 'free'),
(281, '645a3cd5de160', 'A80', 2, 'free'),
(282, '645a3cd5ebfef', 'A81', 2, 'free'),
(283, '645a3cd5f3c24', 'A82', 2, 'free'),
(284, '645a3cd608119', 'A83', 2, 'free'),
(285, '645a3cd60fcff', 'A84', 2, 'free'),
(286, '645a3cd61b2ab', 'A85', 2, 'free'),
(287, '645a3cd6287e2', 'A86', 2, 'free'),
(288, '645a3cd63023f', 'A87', 2, 'free'),
(289, '645a3cd638a12', 'A88', 2, 'free'),
(290, '645a3cd6403d5', 'A89', 2, 'free'),
(291, '645a3cd648bac', 'A90', 2, 'free'),
(292, '645a3cd6511ac', 'A91', 2, 'free'),
(293, '645a3cd658a42', 'A92', 2, 'free'),
(294, '645a3cd669596', 'A93', 2, 'free'),
(295, '645a3cd679a22', 'A94', 2, 'free'),
(296, '645a3cd687382', 'A95', 2, 'free'),
(297, '645a3cd69499c', 'A96', 2, 'free'),
(298, '645a3cd6a23b6', 'A97', 2, 'free'),
(299, '645a3cd6b254a', 'A98', 2, 'free'),
(300, '645a3cd6bfd90', 'A99', 2, 'free'),
(301, '645a3cd6c7843', 'A100', 2, 'free'),
(302, '645a3cd6d01e3', 'A101', 2, 'free'),
(303, '645a3cd6d7c20', 'A102', 2, 'free'),
(304, '645a3cd6e070a', 'A103', 2, 'free'),
(305, '645a3cd6e7ef6', 'A104', 2, 'free'),
(306, '645a3cd6f09fa', 'A105', 2, 'free'),
(307, '645a3cd704119', 'A106', 2, 'free'),
(308, '645a3cd70f694', 'A107', 2, 'free'),
(309, '645a3cd716f82', 'A108', 2, 'free'),
(310, '645a3cd71f9c9', 'A109', 2, 'free'),
(311, '645a3cd727231', 'A110', 2, 'free'),
(312, '645a3cd72fdbd', 'A111', 2, 'free'),
(313, '645a3cd73d1d9', 'A112', 2, 'free'),
(314, '645a3cd744b57', 'A113', 2, 'free'),
(315, '645a3cd74d599', 'A114', 2, 'free'),
(316, '645a3cd755992', 'A115', 2, 'free'),
(317, '645a3cd773775', 'A116', 2, 'free'),
(318, '645a3cd780ce0', 'A117', 2, 'free'),
(319, '645a3cd7887bc', 'A118', 2, 'free'),
(320, '645a3cd79110c', 'A119', 2, 'free'),
(321, '645a3cd7989b3', 'A120', 2, 'free'),
(322, '645a3cd7a170a', 'A121', 2, 'free'),
(323, '645a3cd7a8faf', 'A122', 2, 'free'),
(324, '645a3cd7b1844', 'A123', 2, 'free'),
(325, '645a3cd7b9061', 'A124', 2, 'free'),
(326, '645a3cd7c19bc', 'A125', 2, 'free'),
(327, '645a3cd7cc439', 'A126', 2, 'free'),
(328, '645a3cd7d49c8', 'A127', 2, 'free'),
(329, '645a3cd7dc489', 'A128', 2, 'free'),
(330, '645a3cd7e4dfb', 'A129', 2, 'free'),
(331, '645a3cd7ec809', 'A130', 2, 'free'),
(332, '645a3cd800e70', 'A131', 2, 'free'),
(333, '645a3cd808935', 'A132', 2, 'free'),
(334, '645a3cd811219', 'A133', 2, 'free'),
(335, '645a3cd818cbe', 'A134', 2, 'free'),
(336, '645a3cd82157f', 'A135', 2, 'free'),
(337, '645a3cd828e00', 'A136', 2, 'free'),
(338, '645a3cd831834', 'A137', 2, 'free'),
(339, '645a3cd839874', 'A138', 2, 'free'),
(340, '645a3cd841370', 'A139', 2, 'free'),
(341, '645a3cd849a6f', 'A140', 2, 'free'),
(342, '645a3cd851572', 'A141', 2, 'free'),
(343, '645a3cd859d84', 'A142', 2, 'free'),
(344, '645a3cd86a38a', 'A143', 2, 'free'),
(345, '645a3cd87a7b9', 'A144', 2, 'free'),
(346, '645a3cd882353', 'A145', 2, 'free'),
(347, '645a3cd88a8b8', 'A146', 2, 'free'),
(348, '645a3cd892653', 'A147', 2, 'free'),
(349, '645a3cd89ad62', 'A148', 2, 'free'),
(350, '645a3cd8a6ef9', 'A149', 2, 'free'),
(351, '645a3cd8b0830', 'A150', 2, 'free'),
(352, '645a3cd8b81c8', 'A151', 2, 'free'),
(353, '645a3cd8c0948', 'A152', 2, 'free'),
(354, '645a3cd8c861f', 'A153', 2, 'free'),
(355, '645a3cd8d0baf', 'A154', 2, 'free'),
(356, '645a3cd8d9038', 'A155', 2, 'free'),
(357, '645a3cd8e0a9b', 'A156', 2, 'free'),
(358, '645a3cd8e945d', 'A157', 2, 'free'),
(359, '645a3cd8f0e44', 'A158', 2, 'free'),
(360, '645a3cd905673', 'A159', 2, 'free'),
(361, '645a3cd90d26c', 'A160', 2, 'free'),
(362, '645a3cd91583f', 'A161', 2, 'free'),
(363, '645a3cd91d2db', 'A162', 2, 'free'),
(364, '645a3cd925ef1', 'A163', 2, 'free'),
(365, '645a3cd92da68', 'A164', 2, 'free'),
(366, '645a3cd935edc', 'A165', 2, 'free'),
(367, '645a3cd93db8c', 'A166', 2, 'free'),
(368, '645a3cd9460ba', 'A167', 2, 'free'),
(369, '645a3cd94e06d', 'A168', 2, 'free'),
(370, '645a3cd956848', 'A169', 2, 'free'),
(371, '645a3cd95e3c2', 'A170', 2, 'free'),
(372, '645a3cd96ed44', 'A171', 2, 'free'),
(373, '645a3cd97c164', 'A172', 2, 'free'),
(374, '645a3cd98450c', 'A173', 2, 'free'),
(375, '645a3cd98c03f', 'A174', 2, 'free'),
(376, '645a3cd9948af', 'A175', 2, 'free'),
(377, '645a3cd99c2e0', 'A176', 2, 'free'),
(378, '645a3cd9a4ce3', 'A177', 2, 'free'),
(379, '645a3cd9ac754', 'A178', 2, 'free'),
(380, '645a3cd9b4fae', 'A179', 2, 'free'),
(381, '645a3cd9bca1c', 'A180', 2, 'free'),
(382, '645a3cd9c526d', 'A181', 2, 'free'),
(383, '645a3cd9cd4e0', 'A182', 2, 'free'),
(384, '645a3cd9d5132', 'A183', 2, 'free'),
(385, '645a3cd9dd7a5', 'A184', 2, 'free'),
(386, '645a3cd9eb09e', 'A185', 2, 'free'),
(387, '645a3cd9f2aae', 'A186', 2, 'free'),
(388, '645a3cda073c5', 'A187', 2, 'free'),
(389, '645a3cda0ee2f', 'A188', 2, 'free'),
(390, '645a3cda1775b', 'A189', 2, 'free'),
(391, '645a3cda1f177', 'A190', 2, 'free'),
(392, '645a3cda279c3', 'A191', 2, 'free'),
(393, '645a3cda2f3f6', 'A192', 2, 'free'),
(394, '645a3cda37e5d', 'A193', 2, 'free'),
(395, '645a3cda3f95b', 'A194', 2, 'free'),
(396, '645a3cda4800f', 'A195', 2, 'free'),
(397, '645a3cda4fa84', 'A196', 2, 'free'),
(398, '645a3cda5857e', 'A197', 2, 'free'),
(399, '645a3cda5ffce', 'A198', 2, 'free'),
(400, '645a3cda78b77', 'A199', 2, 'free'),
(401, '645a3cda839d9', 'A200', 2, 'free'),
(402, '645a3d09e73ed', 'B1', 3, 'used'),
(403, '645a3d09f2524', 'B2', 3, 'used'),
(404, '645a3d0a06b50', 'B3', 3, 'used'),
(405, '645a3d0a0e5a7', 'B4', 3, 'used'),
(406, '645a3d0a16d02', 'B5', 3, 'free'),
(407, '645a3d0a1ebed', 'B6', 3, 'free'),
(408, '645a3d0a27120', 'B7', 3, 'free'),
(409, '645a3d0a2ec48', 'B8', 3, 'free'),
(410, '645a3d0a375e9', 'B9', 3, 'free'),
(411, '645a3d0a44b29', 'B10', 3, 'free'),
(412, '645a3d0a4c8c9', 'B11', 3, 'free'),
(413, '645a3d0a54e05', 'B12', 3, 'free'),
(414, '645a3d0a5cb52', 'B13', 3, 'free'),
(415, '645a3d0a65223', 'B14', 3, 'free'),
(416, '645a3d0a6d62d', 'B15', 3, 'free'),
(417, '645a3d0a7509d', 'B16', 3, 'free'),
(418, '645a3d0a7d9ce', 'B17', 3, 'free'),
(419, '645a3d0a855b5', 'B18', 3, 'free'),
(420, '645a3d0a8db4b', 'B19', 3, 'free'),
(421, '645a3d0a95ce4', 'B20', 3, 'free'),
(422, '645a3d0a9e0c4', 'B21', 3, 'free'),
(423, '645a3d0aa5b5b', 'B22', 3, 'free'),
(424, '645a3d0aae3a6', 'B23', 3, 'free'),
(425, '645a3d0ab633b', 'B24', 3, 'free'),
(426, '645a3d0abe718', 'B25', 3, 'free'),
(427, '645a3d0aef2cb', 'B26', 3, 'free'),
(428, '645a3d0b02a48', 'B27', 3, 'free'),
(429, '645a3d0b1331b', 'B28', 3, 'free'),
(430, '645a3d0b1b45a', 'B29', 3, 'free'),
(431, '645a3d0b23352', 'B30', 3, 'free'),
(432, '645a3d0b2badc', 'B31', 3, 'free'),
(433, '645a3d0b33653', 'B32', 3, 'free'),
(434, '645a3d0b3bb23', 'B33', 3, 'free'),
(435, '645a3d0b43a58', 'B34', 3, 'free'),
(436, '645a3d0b4bf97', 'B35', 3, 'free'),
(437, '645a3d0b53c04', 'B36', 3, 'free'),
(438, '645a3d0b5c2b9', 'B37', 3, 'free'),
(439, '645a3d0b6469c', 'B38', 3, 'free'),
(440, '645a3d0b6c159', 'B39', 3, 'free'),
(441, '645a3d0b74a0c', 'B40', 3, 'free'),
(442, '645a3d0b7cb88', 'B41', 3, 'free'),
(443, '645a3d0b84753', 'B42', 3, 'free'),
(444, '645a3d0b8caed', 'B43', 3, 'free'),
(445, '645a3d0b9517d', 'B44', 3, 'free'),
(446, '645a3d0b9cbce', 'B45', 3, 'free'),
(447, '645a3d0ba55e5', 'B46', 3, 'free'),
(448, '645a3d0bacf7e', 'B47', 3, 'free'),
(449, '645a3d0bb5679', 'B48', 3, 'free'),
(450, '645a3d0bbd74c', 'B49', 3, 'free'),
(451, '645a3d0bcdc2a', 'B50', 3, 'free'),
(452, '645a3d0be36c8', 'B51', 3, 'free'),
(453, '645a3d0bee290', 'B52', 3, 'free'),
(454, '645a3d0c01d56', 'B53', 3, 'free'),
(455, '645a3d0c0a27d', 'B54', 3, 'free'),
(456, '645a3d0c11f87', 'B55', 3, 'free'),
(457, '645a3d0c1a497', 'B56', 3, 'free'),
(458, '645a3d0c229aa', 'B57', 3, 'free'),
(459, '645a3d0c2a41d', 'B58', 3, 'free'),
(460, '645a3d0c32eb4', 'B59', 3, 'free'),
(461, '645a3d0c3a8d4', 'B60', 3, 'free'),
(462, '645a3d0c4315e', 'B61', 3, 'free'),
(463, '645a3d0c4a9f3', 'B62', 3, 'free'),
(464, '645a3d0c667cf', 'B63', 3, 'free'),
(465, '645a3d0c70bf1', 'B64', 3, 'free'),
(466, '645a3d0c7e6e0', 'B65', 3, 'free'),
(467, '645a3d0c8684f', 'B66', 3, 'free'),
(468, '645a3d0c8e500', 'B67', 3, 'free'),
(469, '645a3d0c96c39', 'B68', 3, 'free'),
(470, '645a3d0c9e955', 'B69', 3, 'free'),
(471, '645a3d0ca9d92', 'B70', 3, 'free'),
(472, '645a3d0cb1934', 'B71', 3, 'free'),
(473, '645a3d0cb9e6b', 'B72', 3, 'free'),
(474, '645a3d0cc1b7d', 'B73', 3, 'free'),
(475, '645a3d0cca206', 'B74', 3, 'free'),
(476, '645a3d0cdaae5', 'B75', 3, 'free'),
(477, '645a3d0cea790', 'B76', 3, 'free'),
(478, '645a3d0cf2d2d', 'B77', 3, 'free'),
(479, '645a3d0d064a5', 'B78', 3, 'free'),
(480, '645a3d0d0ed75', 'B79', 3, 'free'),
(481, '645a3d0d19ef7', 'B80', 3, 'free'),
(482, '645a3d0d21580', 'B81', 3, 'free'),
(483, '645a3d0d29bf3', 'B82', 3, 'free'),
(484, '645a3d0d31ac1', 'B83', 3, 'free'),
(485, '645a3d0d39d91', 'B84', 3, 'free'),
(486, '645a3d0d4210a', 'B85', 3, 'free'),
(487, '645a3d0d49fba', 'B86', 3, 'free'),
(488, '645a3d0d52671', 'B87', 3, 'free'),
(489, '645a3d0d5a1c3', 'B88', 3, 'free'),
(490, '645a3d0d629db', 'B89', 3, 'free'),
(491, '645a3d0d6a6ce', 'B90', 3, 'free'),
(492, '645a3d0d72e1f', 'B91', 3, 'free'),
(493, '645a3d0d82e98', 'B92', 3, 'free'),
(494, '645a3d0d8ab0d', 'B93', 3, 'free'),
(495, '645a3d0d92f71', 'B94', 3, 'free'),
(496, '645a3d0d9b318', 'B95', 3, 'free'),
(497, '645a3d0da35a6', 'B96', 3, 'free'),
(498, '645a3d0daea24', 'B97', 3, 'free'),
(499, '645a3d0db6147', 'B98', 3, 'free'),
(500, '645a3d0dbe7cf', 'B99', 3, 'free'),
(501, '645a3d0dc6401', 'B100', 3, 'free'),
(502, '645a3d0dcec67', 'B101', 3, 'free'),
(503, '645a3d0ddf790', 'B102', 3, 'free'),
(504, '645a3d0e02dbd', 'B103', 3, 'free'),
(505, '645a3d0e0d97d', 'B104', 3, 'free'),
(506, '645a3d0e15d53', 'B105', 3, 'free'),
(507, '645a3d0e1df51', 'B106', 3, 'free'),
(508, '645a3d0e25f4e', 'B107', 3, 'free'),
(509, '645a3d0e2e25c', 'B108', 3, 'free'),
(510, '645a3d0e367b2', 'B109', 3, 'free'),
(511, '645a3d0e3e470', 'B110', 3, 'free'),
(512, '645a3d0e469f4', 'B111', 3, 'free'),
(513, '645a3d0e4e6bf', 'B112', 3, 'free'),
(514, '645a3d0e56cea', 'B113', 3, 'free'),
(515, '645a3d0e5ebfa', 'B114', 3, 'free'),
(516, '645a3d0e67396', 'B115', 3, 'free'),
(517, '645a3d0e6ed2c', 'B116', 3, 'free'),
(518, '645a3d0e775ae', 'B117', 3, 'free'),
(519, '645a3d0e7f22a', 'B118', 3, 'free'),
(520, '645a3d0e8773f', 'B119', 3, 'free'),
(521, '645a3d0e8f233', 'B120', 3, 'free'),
(522, '645a3d0e97b22', 'B121', 3, 'free'),
(523, '645a3d0e9fa35', 'B122', 3, 'free'),
(524, '645a3d0ea7f74', 'B123', 3, 'free'),
(525, '645a3d0eafba3', 'B124', 3, 'free'),
(526, '645a3d0eb8187', 'B125', 3, 'free'),
(527, '645a3d0ebfd96', 'B126', 3, 'free'),
(528, '645a3d0ec86a5', 'B127', 3, 'free'),
(529, '645a3d0ed0171', 'B128', 3, 'free'),
(530, '645a3d0eebd7a', 'B129', 3, 'free'),
(531, '645a3d0f04d07', 'B130', 3, 'free'),
(532, '645a3d0f0cd11', 'B131', 3, 'free'),
(533, '645a3d0f14ee5', 'B132', 3, 'free'),
(534, '645a3d0f1d0c8', 'B133', 3, 'free'),
(535, '645a3d0f256cb', 'B134', 3, 'free'),
(536, '645a3d0f2d121', 'B135', 3, 'free'),
(537, '645a3d0f35832', 'B136', 3, 'free'),
(538, '645a3d0f3d6f5', 'B137', 3, 'free'),
(539, '645a3d0f45ba5', 'B138', 3, 'free'),
(540, '645a3d0f4d85d', 'B139', 3, 'free'),
(541, '645a3d0f560cb', 'B140', 3, 'free'),
(542, '645a3d0f5ddfa', 'B141', 3, 'free'),
(543, '645a3d0f66326', 'B142', 3, 'free'),
(544, '645a3d0f6e040', 'B143', 3, 'free'),
(545, '645a3d0f768c2', 'B144', 3, 'free'),
(546, '645a3d0f7e1e9', 'B145', 3, 'free'),
(547, '645a3d0f86c79', 'B146', 3, 'free'),
(548, '645a3d0f8e54c', 'B147', 3, 'free'),
(549, '645a3d0f96b50', 'B148', 3, 'free'),
(550, '645a3d0f9ee7d', 'B149', 3, 'free'),
(551, '645a3d0fa6c74', 'B150', 3, 'free'),
(552, '645a3d0faf1da', 'B151', 3, 'free'),
(553, '645a3d0fb6ffb', 'B152', 3, 'free'),
(554, '645a3d0fbf586', 'B153', 3, 'free'),
(555, '645a3d0fc7370', 'B154', 3, 'free'),
(556, '645a3d0fcf986', 'B155', 3, 'free'),
(557, '645a3d100140c', 'B156', 3, 'free'),
(558, '645a3d1009037', 'B157', 3, 'free'),
(559, '645a3d1011bf6', 'B158', 3, 'free'),
(560, '645a3d101942a', 'B159', 3, 'free'),
(561, '645a3d102195c', 'B160', 3, 'free'),
(562, '645a3d1029cde', 'B161', 3, 'free'),
(563, '645a3d1031b88', 'B162', 3, 'free'),
(564, '645a3d1039c82', 'B163', 3, 'free'),
(565, '645a3d104224e', 'B164', 3, 'free'),
(566, '645a3d104a570', 'B165', 3, 'free'),
(567, '645a3d10521f5', 'B166', 3, 'free'),
(568, '645a3d105a788', 'B167', 3, 'free'),
(569, '645a3d10624f1', 'B168', 3, 'free'),
(570, '645a3d106ab2b', 'B169', 3, 'free'),
(571, '645a3d107284b', 'B170', 3, 'free'),
(572, '645a3d107ae72', 'B171', 3, 'free'),
(573, '645a3d1082bdf', 'B172', 3, 'free'),
(574, '645a3d108b1dc', 'B173', 3, 'free'),
(575, '645a3d1092d65', 'B174', 3, 'free'),
(576, '645a3d109b318', 'B175', 3, 'free'),
(577, '645a3d10a38b8', 'B176', 3, 'free'),
(578, '645a3d10ab410', 'B177', 3, 'free'),
(579, '645a3d10b3c83', 'B178', 3, 'free'),
(580, '645a3d10bf0b6', 'B179', 3, 'free'),
(581, '645a3d10c62f6', 'B180', 3, 'free'),
(582, '645a3d10ce952', 'B181', 3, 'free'),
(583, '645a3d10df75e', 'B182', 3, 'free'),
(584, '645a3d1105c88', 'B183', 3, 'free'),
(585, '645a3d110d9b1', 'B184', 3, 'free'),
(586, '645a3d1116018', 'B185', 3, 'free'),
(587, '645a3d111db41', 'B186', 3, 'free'),
(588, '645a3d112a14e', 'B187', 3, 'free'),
(589, '645a3d11337fa', 'B188', 3, 'free'),
(590, '645a3d113bbfb', 'B189', 3, 'free'),
(591, '645a3d1143d39', 'B190', 3, 'free'),
(592, '645a3d114bc98', 'B191', 3, 'free'),
(593, '645a3d1153e40', 'B192', 3, 'free'),
(594, '645a3d115c172', 'B193', 3, 'free'),
(595, '645a3d116428e', 'B194', 3, 'free'),
(596, '645a3d116f198', 'B195', 3, 'free'),
(597, '645a3d1177050', 'B196', 3, 'free'),
(598, '645a3d117f4f5', 'B197', 3, 'free'),
(599, '645a3d11873cf', 'B198', 3, 'free'),
(600, '645a3d118f88a', 'B199', 3, 'free'),
(601, '645a3d1197551', 'B200', 3, 'free');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `billingservices`
--
ALTER TABLE `billingservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `corps`
--
ALTER TABLE `corps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fridges`
--
ALTER TABLE `fridges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

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
