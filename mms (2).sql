-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 02:36 AM
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
(1, '645ed56f30c3b', 1, 'no purpose', 2, 0, 0.00, 108.00, '2023-05-12', '2023-05-12');

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
(2, '645ed5aee026f', 1, 2, '0000-00-00', '0000-00-00'),
(3, '645ed5af05aee', 1, 5, '0000-00-00', '0000-00-00');

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
(1, '645ec9c04e532', 'OVM-K-FRG-B-B1', '2023-05-12', 'Kofi Aponsah', 25, 'M', 'Tweebreeooo', 'Adasababa', '0540533008', '', '2023-05-14', '', 'no name', '0000-00-00', 1, 645, 'Regular');

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
(30, '2023_05_01_229008_Payments', 30);

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
(377, '645ec880e81fe', 'A1', 4, 'free'),
(378, '645ec88103af4', 'A2', 4, 'free'),
(379, '645ec8810c55f', 'A3', 4, 'free'),
(380, '645ec8812a2e8', 'A4', 4, 'free'),
(381, '645ec881313fa', 'A5', 4, 'free'),
(382, '645ec8813a57f', 'A6', 4, 'free'),
(383, '645ec88141a06', 'A7', 4, 'free'),
(384, '645ec8814a9be', 'A8', 4, 'free'),
(385, '645ec88151d45', 'A9', 4, 'free'),
(386, '645ec8815ad33', 'A10', 4, 'free'),
(387, '645ec88161e98', 'A11', 4, 'free'),
(388, '645ec8816b075', 'A12', 4, 'free'),
(389, '645ec881721e6', 'A13', 4, 'free'),
(390, '645ec8817b2cb', 'A14', 4, 'free'),
(391, '645ec88182764', 'A15', 4, 'free'),
(392, '645ec8818b5d2', 'A16', 4, 'free'),
(393, '645ec88192b52', 'A17', 4, 'free'),
(394, '645ec881a19b4', 'A18', 4, 'free'),
(395, '645ec881abf7e', 'A19', 4, 'free'),
(396, '645ec881bc978', 'A20', 4, 'free'),
(397, '645ec881c6ed4', 'A21', 4, 'free'),
(398, '645ec881ce4de', 'A22', 4, 'free'),
(399, '645ec881d726d', 'A23', 4, 'free'),
(400, '645ec881de5e2', 'A24', 4, 'free'),
(401, '645ec881e73d9', 'A25', 4, 'free'),
(402, '645ec881ee96a', 'A26', 4, 'free'),
(403, '645ec882036c5', 'A27', 4, 'free'),
(404, '645ec882267a2', 'A28', 4, 'free'),
(405, '645ec8822db32', 'A29', 4, 'free'),
(406, '645ec88236cb3', 'A30', 4, 'free'),
(407, '645ec8823ded2', 'A31', 4, 'free'),
(408, '645ec882470bf', 'A32', 4, 'free'),
(409, '645ec8825bc9d', 'A33', 4, 'free'),
(410, '645ec88264bc1', 'A34', 4, 'free'),
(411, '645ec8826c20e', 'A35', 4, 'free'),
(412, '645ec88274d0b', 'A36', 4, 'free'),
(413, '645ec8827c583', 'A37', 4, 'free'),
(414, '645ec882852df', 'A38', 4, 'free'),
(415, '645ec8828c908', 'A39', 4, 'free'),
(416, '645ec8829561d', 'A40', 4, 'free'),
(417, '645ec8829cb5f', 'A41', 4, 'free'),
(418, '645ec882a5722', 'A42', 4, 'free'),
(419, '645ec882ace10', 'A43', 4, 'free'),
(420, '645ec882b5d06', 'A44', 4, 'free'),
(421, '645ec882bd1f7', 'A45', 4, 'free'),
(422, '645ec882c606f', 'A46', 4, 'free'),
(423, '645ec882cd6b7', 'A47', 4, 'free'),
(424, '645ec882d63ff', 'A48', 4, 'free'),
(425, '645ec882dd7a1', 'A49', 4, 'free'),
(426, '645ec882e67c4', 'A50', 4, 'free'),
(427, '645ec882edb6b', 'A51', 4, 'free'),
(428, '645ec88302903', 'A52', 4, 'free'),
(429, '645ec88320294', 'A53', 4, 'free'),
(430, '645ec8832cfea', 'A54', 4, 'free'),
(431, '645ec8833de9b', 'A55', 4, 'free'),
(432, '645ec88345668', 'A56', 4, 'free'),
(433, '645ec8834e36c', 'A57', 4, 'free'),
(434, '645ec883559f2', 'A58', 4, 'free'),
(435, '645ec883614ca', 'A59', 4, 'free'),
(436, '645ec8836876d', 'A60', 4, 'free'),
(437, '645ec8837140e', 'A61', 4, 'free'),
(438, '645ec8837c036', 'A62', 4, 'free'),
(439, '645ec883837b2', 'A63', 4, 'free'),
(440, '645ec8838c610', 'A64', 4, 'free'),
(441, '645ec8839385a', 'A65', 4, 'free'),
(442, '645ec8839c8be', 'A66', 4, 'free'),
(443, '645ec883a3e28', 'A67', 4, 'free'),
(444, '645ec883accfc', 'A68', 4, 'free'),
(445, '645ec883b3f5f', 'A69', 4, 'free'),
(446, '645ec883bce8a', 'A70', 4, 'free'),
(447, '645ec883c441d', 'A71', 4, 'free'),
(448, '645ec883cf48a', 'A72', 4, 'free'),
(449, '645ec883d80d4', 'A73', 4, 'free'),
(450, '645ec883e59a7', 'A74', 4, 'free'),
(451, '645ec883ecba9', 'A75', 4, 'free'),
(452, '645ec88406fef', 'A76', 4, 'free'),
(453, '645ec8841c9e2', 'A77', 4, 'free'),
(454, '645ec88434fd0', 'A78', 4, 'free'),
(455, '645ec8843c0fa', 'A79', 4, 'free'),
(456, '645ec8844516e', 'A80', 4, 'free'),
(457, '645ec8844c80b', 'A81', 4, 'free'),
(458, '645ec884556b6', 'A82', 4, 'free'),
(459, '645ec8845c9b5', 'A83', 4, 'free'),
(460, '645ec88465a21', 'A84', 4, 'free'),
(461, '645ec8846cfb7', 'A85', 4, 'free'),
(462, '645ec88475b90', 'A86', 4, 'free'),
(463, '645ec8847d0a4', 'A87', 4, 'free'),
(464, '645ec8848609c', 'A88', 4, 'free'),
(465, '645ec8848d707', 'A89', 4, 'free'),
(466, '645ec884964a5', 'A90', 4, 'free'),
(467, '645ec8849d78c', 'A91', 4, 'free'),
(468, '645ec884a67e8', 'A92', 4, 'free'),
(469, '645ec884adcf8', 'A93', 4, 'free'),
(470, '645ec884b6b90', 'A94', 4, 'free'),
(471, '645ec884be096', 'A95', 4, 'free'),
(472, '645ec884c6eee', 'A96', 4, 'free'),
(473, '645ec884ce181', 'A97', 4, 'free'),
(474, '645ec884d72d5', 'A98', 4, 'free'),
(475, '645ec884de830', 'A99', 4, 'free'),
(476, '645ec884e7591', 'A100', 4, 'free'),
(477, '645ec884eea06', 'A101', 4, 'free'),
(478, '645ec885033e7', 'A102', 4, 'free'),
(479, '645ec8850ff7f', 'A103', 4, 'free'),
(480, '645ec8851e656', 'A104', 4, 'free'),
(481, '645ec88525c85', 'A105', 4, 'free'),
(482, '645ec8852eaf1', 'A106', 4, 'free'),
(483, '645ec88535fa1', 'A107', 4, 'free'),
(484, '645ec8853ec07', 'A108', 4, 'free'),
(485, '645ec88546284', 'A109', 4, 'free'),
(486, '645ec8854efc2', 'A110', 4, 'free'),
(487, '645ec8855673a', 'A111', 4, 'free'),
(488, '645ec8855f359', 'A112', 4, 'free'),
(489, '645ec88566966', 'A113', 4, 'free'),
(490, '645ec885722c9', 'A114', 4, 'free'),
(491, '645ec885797a2', 'A115', 4, 'free'),
(492, '645ec885825a4', 'A116', 4, 'free'),
(493, '645ec88589b3c', 'A117', 4, 'free'),
(494, '645ec8859744a', 'A118', 4, 'free'),
(495, '645ec885a019a', 'A119', 4, 'free'),
(496, '645ec885a74b2', 'A120', 4, 'free'),
(497, '645ec885b0728', 'A121', 4, 'free'),
(498, '645ec885b7930', 'A122', 4, 'free'),
(499, '645ec885c0dbb', 'A123', 4, 'free'),
(500, '645ec885c7d90', 'A124', 4, 'free'),
(501, '645ec885d0cf7', 'A125', 4, 'free'),
(502, '645ec885d8377', 'A126', 4, 'free'),
(503, '645ec885e3c77', 'A127', 4, 'free'),
(504, '645ec885eae2c', 'A128', 4, 'free'),
(505, '645ec885f3d72', 'A129', 4, 'free'),
(506, '645ec8860710a', 'A130', 4, 'free'),
(507, '645ec8862af43', 'A131', 4, 'free'),
(508, '645ec88632609', 'A132', 4, 'free'),
(509, '645ec8863b318', 'A133', 4, 'free'),
(510, '645ec88642b48', 'A134', 4, 'free'),
(511, '645ec8864b54d', 'A135', 4, 'free'),
(512, '645ec88652a9f', 'A136', 4, 'free'),
(513, '645ec8865b99e', 'A137', 4, 'free'),
(514, '645ec886630b8', 'A138', 4, 'free'),
(515, '645ec8866bd41', 'A139', 4, 'free'),
(516, '645ec88673671', 'A140', 4, 'free'),
(517, '645ec8867bf88', 'A141', 4, 'free'),
(518, '645ec8868351d', 'A142', 4, 'free'),
(519, '645ec8868c5ae', 'A143', 4, 'free'),
(520, '645ec88693b74', 'A144', 4, 'free'),
(521, '645ec886a27ae', 'A145', 4, 'free'),
(522, '645ec886acdde', 'A146', 4, 'free'),
(523, '645ec886bcdb6', 'A147', 4, 'free'),
(524, '645ec886c4174', 'A148', 4, 'free'),
(525, '645ec886cd1e0', 'A149', 4, 'free'),
(526, '645ec886d461f', 'A150', 4, 'free'),
(527, '645ec886dd56f', 'A151', 4, 'free'),
(528, '645ec886e4a65', 'A152', 4, 'free'),
(529, '645ec886ed900', 'A153', 4, 'free'),
(530, '645ec88700a70', 'A154', 4, 'free'),
(531, '645ec88709a23', 'A155', 4, 'free'),
(532, '645ec887168c2', 'A156', 4, 'free'),
(533, '645ec887269d9', 'A157', 4, 'free'),
(534, '645ec8872f985', 'A158', 4, 'free'),
(535, '645ec88736e33', 'A159', 4, 'free'),
(536, '645ec8873fcec', 'A160', 4, 'free'),
(537, '645ec88746f78', 'A161', 4, 'free'),
(538, '645ec8874fed0', 'A162', 4, 'free'),
(539, '645ec887572b1', 'A163', 4, 'free'),
(540, '645ec8876031b', 'A164', 4, 'free'),
(541, '645ec8876768a', 'A165', 4, 'free'),
(542, '645ec88770548', 'A166', 4, 'free'),
(543, '645ec88777a05', 'A167', 4, 'free'),
(544, '645ec88780932', 'A168', 4, 'free'),
(545, '645ec88787e76', 'A169', 4, 'free'),
(546, '645ec88790e59', 'A170', 4, 'free'),
(547, '645ec887981ed', 'A171', 4, 'free'),
(548, '645ec887a0fb0', 'A172', 4, 'free'),
(549, '645ec887a84f1', 'A173', 4, 'free'),
(550, '645ec887b150a', 'A174', 4, 'free'),
(551, '645ec887b8a3e', 'A175', 4, 'free'),
(552, '645ec9346c7ca', 'A1', 4, 'free'),
(553, '645ec9347718f', 'A2', 4, 'free'),
(554, '645ec93485510', 'A3', 4, 'free'),
(555, '645ec9349029e', 'A4', 4, 'free'),
(556, '645ec9349757c', 'A5', 4, 'free'),
(557, '645ec934a06c1', 'A6', 4, 'free'),
(558, '645ec934a797a', 'A7', 4, 'free'),
(559, '645ec934b088f', 'A8', 4, 'free'),
(560, '645ec934b7ea1', 'A9', 4, 'free'),
(561, '645ec934c0e06', 'A10', 4, 'free'),
(562, '645ec934c801a', 'A11', 4, 'free'),
(563, '645ec934d1194', 'A12', 4, 'free'),
(564, '645ec934d84f4', 'A13', 4, 'free'),
(565, '645ec934e1520', 'A14', 4, 'free'),
(566, '645ec934e8855', 'A15', 4, 'free'),
(567, '645ec934f1642', 'A16', 4, 'free'),
(568, '645ec93504ad1', 'A17', 4, 'free'),
(569, '645ec9350d968', 'A18', 4, 'free'),
(570, '645ec93514c50', 'A19', 4, 'free'),
(571, '645ec9351dd54', 'A20', 4, 'free'),
(572, '645ec93524f4d', 'A21', 4, 'free'),
(573, '645ec9352de41', 'A22', 4, 'free'),
(574, '645ec9354d8cc', 'A23', 4, 'free'),
(575, '645ec93556958', 'A24', 4, 'free'),
(576, '645ec9355dd20', 'A25', 4, 'free'),
(577, '645ec93566d2c', 'A26', 4, 'free'),
(578, '645ec9356debe', 'A27', 4, 'free'),
(579, '645ec93577048', 'A28', 4, 'free'),
(580, '645ec9357e178', 'A29', 4, 'free'),
(581, '645ec93594be2', 'A30', 4, 'free'),
(582, '645ec9359e6dd', 'A31', 4, 'free'),
(583, '645ec935a78df', 'A32', 4, 'free'),
(584, '645ec935ae87c', 'A33', 4, 'free'),
(585, '645ec935b7d05', 'A34', 4, 'free'),
(586, '645ec935beeef', 'A35', 4, 'free'),
(587, '645ec935c83d8', 'A36', 4, 'free'),
(588, '645ec935cf157', 'A37', 4, 'free'),
(589, '645ec935d84ff', 'A38', 4, 'free'),
(590, '645ec935df4bc', 'A39', 4, 'free'),
(591, '645ec935e897b', 'A40', 4, 'free'),
(592, '645ec935efa47', 'A41', 4, 'free'),
(593, '645ec93604985', 'A42', 4, 'free'),
(594, '645ec9360b99e', 'A43', 4, 'free'),
(595, '645ec93614d00', 'A44', 4, 'free'),
(596, '645ec9361be89', 'A45', 4, 'free'),
(597, '645ec93624f8c', 'A46', 4, 'free'),
(598, '645ec9362c058', 'A47', 4, 'free'),
(599, '645ec93635207', 'A48', 4, 'free'),
(600, '645ec93640692', 'A49', 4, 'free'),
(601, '645ec9364abbc', 'A50', 4, 'free'),
(602, '645ec936520d3', 'A51', 4, 'free'),
(603, '645ec9365b08c', 'A52', 4, 'free'),
(604, '645ec9366232b', 'A53', 4, 'free'),
(605, '645ec9366b495', 'A54', 4, 'free'),
(606, '645ec93672739', 'A55', 4, 'free'),
(607, '645ec9367b967', 'A56', 4, 'free'),
(608, '645ec9368282c', 'A57', 4, 'free'),
(609, '645ec93693d87', 'A58', 4, 'free'),
(610, '645ec936a41df', 'A59', 4, 'free'),
(611, '645ec936ab1a3', 'A60', 4, 'free'),
(612, '645ec936b4310', 'A61', 4, 'free'),
(613, '645ec936bb899', 'A62', 4, 'free'),
(614, '645ec936c47d3', 'A63', 4, 'free'),
(615, '645ec936cba9d', 'A64', 4, 'free'),
(616, '645ec936d4c40', 'A65', 4, 'free'),
(617, '645ec936dbfa9', 'A66', 4, 'free'),
(618, '645ec936e4cd0', 'A67', 4, 'free'),
(619, '645ec936ec382', 'A68', 4, 'free'),
(620, '645ec93700ed0', 'A69', 4, 'free'),
(621, '645ec9370845d', 'A70', 4, 'free'),
(622, '645ec93711372', 'A71', 4, 'free'),
(623, '645ec9371863d', 'A72', 4, 'free'),
(624, '645ec93721771', 'A73', 4, 'free'),
(625, '645ec93728b59', 'A74', 4, 'free'),
(626, '645ec93731880', 'A75', 4, 'free'),
(627, '645ec93738c77', 'A76', 4, 'free'),
(628, '645ec93741c82', 'A77', 4, 'free'),
(629, '645ec93749035', 'A78', 4, 'free'),
(630, '645ec93752132', 'A79', 4, 'free'),
(631, '645ec937595c1', 'A80', 4, 'free'),
(632, '645ec9376250a', 'A81', 4, 'free'),
(633, '645ec9376983e', 'A82', 4, 'free'),
(634, '645ec93772839', 'A83', 4, 'free'),
(635, '645ec93779ce6', 'A84', 4, 'free'),
(636, '645ec93782966', 'A85', 4, 'free'),
(637, '645ec93789fcd', 'A86', 4, 'free'),
(638, '645ec93797969', 'A87', 4, 'free'),
(639, '645ec937a5208', 'A88', 4, 'free'),
(640, '645ec937add34', 'A89', 4, 'free'),
(641, '645ec937b52ec', 'A90', 4, 'free'),
(642, '645ec937be14a', 'A91', 4, 'free'),
(643, '645ec937c57b3', 'A92', 4, 'free'),
(644, '645ec937ce6e4', 'A93', 4, 'free'),
(645, '645ec937d5cd2', 'A94', 4, 'free'),
(646, '645ec937dea4a', 'A95', 4, 'free'),
(647, '645ec937e5ef2', 'A96', 4, 'free'),
(648, '645ec937eeddb', 'A97', 4, 'free'),
(649, '645ec93801ef9', 'A98', 4, 'free'),
(650, '645ec938131ac', 'A99', 4, 'free'),
(651, '645ec9381a238', 'A100', 4, 'free'),
(652, '645ec938234c5', 'A101', 4, 'free'),
(653, '645ec9382a6b8', 'A102', 4, 'free'),
(654, '645ec93833a68', 'A103', 4, 'free'),
(655, '645ec9383a84b', 'A104', 4, 'free'),
(656, '645ec93843cf9', 'A105', 4, 'free'),
(657, '645ec9384acb8', 'A106', 4, 'free'),
(658, '645ec93853e69', 'A107', 4, 'free'),
(659, '645ec9385b0f7', 'A108', 4, 'free'),
(660, '645ec9386420c', 'A109', 4, 'free'),
(661, '645ec9386b46d', 'A110', 4, 'free'),
(662, '645ec93874584', 'A111', 4, 'free'),
(663, '645ec9387b6b5', 'A112', 4, 'free'),
(664, '645ec93884717', 'A113', 4, 'free'),
(665, '645ec9388bc03', 'A114', 4, 'free'),
(666, '645ec9389bfe1', 'A115', 4, 'free'),
(667, '645ec938b171e', 'A116', 4, 'free'),
(668, '645ec938bd4f4', 'A117', 4, 'free'),
(669, '645ec938c449b', 'A118', 4, 'free'),
(670, '645ec938cd8b4', 'A119', 4, 'free'),
(671, '645ec938d46ee', 'A120', 4, 'free'),
(672, '645ec938dda2b', 'A121', 4, 'free'),
(673, '645ec938e4cac', 'A122', 4, 'free'),
(674, '645ec938edf8c', 'A123', 4, 'free'),
(675, '645ec93900be1', 'A124', 4, 'free'),
(676, '645ec9390a09e', 'A125', 4, 'free'),
(677, '645ec939111be', 'A126', 4, 'free'),
(678, '645ec9391a484', 'A127', 4, 'free'),
(679, '645ec93921287', 'A128', 4, 'free'),
(680, '645ec9392a837', 'A129', 4, 'free'),
(681, '645ec9393165f', 'A130', 4, 'free'),
(682, '645ec9393a9ec', 'A131', 4, 'free'),
(683, '645ec93941995', 'A132', 4, 'free'),
(684, '645ec9394ad94', 'A133', 4, 'free'),
(685, '645ec9395b235', 'A134', 4, 'free'),
(686, '645ec939620d1', 'A135', 4, 'free'),
(687, '645ec9396b5fa', 'A136', 4, 'free'),
(688, '645ec939723e1', 'A137', 4, 'free'),
(689, '645ec9397b911', 'A138', 4, 'free'),
(690, '645ec9398296f', 'A139', 4, 'free'),
(691, '645ec9398bb81', 'A140', 4, 'free'),
(692, '645ec939a4b5a', 'A141', 4, 'free'),
(693, '645ec939b5f64', 'A142', 4, 'free'),
(694, '645ec939bf213', 'A143', 4, 'free'),
(695, '645ec939c908e', 'A144', 4, 'free'),
(696, '645ec939d20f2', 'A145', 4, 'free'),
(697, '645ec939d8f02', 'A146', 4, 'free'),
(698, '645ec939e2474', 'A147', 4, 'free'),
(699, '645ec939e948d', 'A148', 4, 'free'),
(700, '645ec939f2906', 'A149', 4, 'free'),
(701, '645ec93a05409', 'A150', 4, 'free'),
(702, '645ec93a0e8e4', 'A151', 4, 'free'),
(703, '645ec93a156a5', 'A152', 4, 'free'),
(704, '645ec93a1ec6e', 'A153', 4, 'free'),
(705, '645ec93a25b5a', 'A154', 4, 'free'),
(706, '645ec93a2ee34', 'A155', 4, 'free'),
(707, '645ec93a35f16', 'A156', 4, 'free'),
(708, '645ec93a3f212', 'A157', 4, 'free'),
(709, '645ec93a4636c', 'A158', 4, 'free'),
(710, '645ec93a4f6b9', 'A159', 4, 'free'),
(711, '645ec93a5650b', 'A160', 4, 'free'),
(712, '645ec93a5fa37', 'A161', 4, 'free'),
(713, '645ec93a66871', 'A162', 4, 'free'),
(714, '645ec93a6fbaf', 'A163', 4, 'free'),
(715, '645ec93a76e6b', 'A164', 4, 'free'),
(716, '645ec93a8015a', 'A165', 4, 'free'),
(717, '645ec93a86f67', 'A166', 4, 'free'),
(718, '645ec93a9019d', 'A167', 4, 'free'),
(719, '645ec93aa3281', 'A168', 4, 'free'),
(720, '645ec93ab09a4', 'A169', 4, 'free'),
(721, '645ec93ab7c52', 'A170', 4, 'free'),
(722, '645ec93ac0ed7', 'A171', 4, 'free'),
(723, '645ec93ac7d98', 'A172', 4, 'free'),
(724, '645ec93ad128d', 'A173', 4, 'free'),
(725, '645ec93ad843a', 'A174', 4, 'free'),
(726, '645ec93ae71a9', 'A175', 4, 'free'),
(727, '645ec93af193f', 'B1', 1, 'used'),
(728, '645ec93b04818', 'B2', 1, 'used'),
(729, '645ec93b0d9b8', 'B3', 1, 'used'),
(730, '645ec93b14d9a', 'B4', 1, 'free'),
(731, '645ec93b1ddc7', 'B5', 1, 'free'),
(732, '645ec93b24f50', 'B6', 1, 'free'),
(733, '645ec93b2df13', 'B7', 1, 'free'),
(734, '645ec93b3536b', 'B8', 1, 'free'),
(735, '645ec93b3e3ce', 'B9', 1, 'free'),
(736, '645ec93b455f9', 'B10', 1, 'free'),
(737, '645ec93b4e76a', 'B11', 1, 'free'),
(738, '645ec93b55b70', 'B12', 1, 'free'),
(739, '645ec93b5eaaa', 'B13', 1, 'free'),
(740, '645ec93b65f2b', 'B14', 1, 'free'),
(741, '645ec93b6ede7', 'B15', 1, 'free'),
(742, '645ec93b760e9', 'B16', 1, 'free'),
(743, '645ec93b7f248', 'B17', 1, 'free'),
(744, '645ec93b865e6', 'B18', 1, 'free'),
(745, '645ec93b8f631', 'B19', 1, 'free'),
(746, '645ec93b9682b', 'B20', 1, 'free'),
(747, '645ec93ba8af4', 'B21', 1, 'free'),
(748, '645ec93bb536f', 'B22', 1, 'free'),
(749, '645ec93bbc479', 'B23', 1, 'free'),
(750, '645ec93bc56de', 'B24', 1, 'free'),
(751, '645ec93bcc5e4', 'B25', 1, 'free'),
(752, '645ec93bd58cc', 'B26', 1, 'free'),
(753, '645ec93bdcba2', 'B27', 1, 'free'),
(754, '645ec93be5df2', 'B28', 1, 'free'),
(755, '645ec93bed0a2', 'B29', 1, 'free'),
(756, '645ec93c01f0c', 'B30', 1, 'free'),
(757, '645ec93c09082', 'B31', 1, 'free'),
(758, '645ec93c122fc', 'B32', 1, 'free'),
(759, '645ec93c191e6', 'B33', 1, 'free'),
(760, '645ec93c27f19', 'B34', 1, 'free'),
(761, '645ec93c39d39', 'B35', 1, 'free'),
(762, '645ec93c480a4', 'B36', 1, 'free'),
(763, '645ec93c58eb3', 'B37', 1, 'free'),
(764, '645ec93c65d02', 'B38', 1, 'free'),
(765, '645ec93c751b8', 'B39', 1, 'free'),
(766, '645ec93c8e936', 'B40', 1, 'free'),
(767, '645ec93c9e98e', 'B41', 1, 'free'),
(768, '645ec93cbb732', 'B42', 1, 'free'),
(769, '645ec93cc7159', 'B43', 1, 'free'),
(770, '645ec93cce538', 'B44', 1, 'free'),
(771, '645ec93cd75f4', 'B45', 1, 'free'),
(772, '645ec93cde6ea', 'B46', 1, 'free'),
(773, '645ec93ce7b01', 'B47', 1, 'free'),
(774, '645ec93ceec2e', 'B48', 1, 'free'),
(775, '645ec93d03cc0', 'B49', 1, 'free'),
(776, '645ec93d0ac7b', 'B50', 1, 'free'),
(777, '645ec93d13fb4', 'B51', 1, 'free'),
(778, '645ec93d1aed2', 'B52', 1, 'free'),
(779, '645ec93d26dec', 'B53', 1, 'free'),
(780, '645ec93d2dc0e', 'B54', 1, 'free'),
(781, '645ec93d36fc0', 'B55', 1, 'free'),
(782, '645ec93d3dff3', 'B56', 1, 'free'),
(783, '645ec93d47237', 'B57', 1, 'free'),
(784, '645ec93d4e294', 'B58', 1, 'free'),
(785, '645ec93d576ae', 'B59', 1, 'free'),
(786, '645ec93d5e8be', 'B60', 1, 'free'),
(787, '645ec93d67bdb', 'B61', 1, 'free'),
(788, '645ec93d6e9e1', 'B62', 1, 'free'),
(789, '645ec93d7a8f8', 'B63', 1, 'free'),
(790, '645ec93d81af4', 'B64', 1, 'free'),
(791, '645ec93d8adeb', 'B65', 1, 'free'),
(792, '645ec93d91e06', 'B66', 1, 'free'),
(793, '645ec93d9b1a8', 'B67', 1, 'free'),
(794, '645ec93dadd19', 'B68', 1, 'free'),
(795, '645ec93db8c17', 'B69', 1, 'free'),
(796, '645ec93dbfd44', 'B70', 1, 'free'),
(797, '645ec93dc90b5', 'B71', 1, 'free'),
(798, '645ec93dcfeee', 'B72', 1, 'free'),
(799, '645ec93dd93e7', 'B73', 1, 'free'),
(800, '645ec93de04e1', 'B74', 1, 'free'),
(801, '645ec93de976a', 'B75', 1, 'free'),
(802, '645ec93df0584', 'B76', 1, 'free'),
(803, '645ec93e056b4', 'B77', 1, 'free'),
(804, '645ec93e0c7e3', 'B78', 1, 'free'),
(805, '645ec93e15a32', 'B79', 1, 'free'),
(806, '645ec93e1cb8f', 'B80', 1, 'free'),
(807, '645ec93e25f0a', 'B81', 1, 'free'),
(808, '645ec93e2ce85', 'B82', 1, 'free'),
(809, '645ec93e350b0', 'B83', 1, 'free'),
(810, '645ec93e3e15e', 'B84', 1, 'free'),
(811, '645ec93e454bb', 'B85', 1, 'free'),
(812, '645ec93e4e4ca', 'B86', 1, 'free'),
(813, '645ec93e55b1c', 'B87', 1, 'free'),
(814, '645ec93e5ea53', 'B88', 1, 'free'),
(815, '645ec93e65da2', 'B89', 1, 'free'),
(816, '645ec93e6ede3', 'B90', 1, 'free'),
(817, '645ec93e76032', 'B91', 1, 'free'),
(818, '645ec93e7f15e', 'B92', 1, 'free'),
(819, '645ec93e864a1', 'B93', 1, 'free'),
(820, '645ec93e8f60e', 'B94', 1, 'free'),
(821, '645ec93e96677', 'B95', 1, 'free'),
(822, '645ec93e9f7aa', 'B96', 1, 'free'),
(823, '645ec93eae914', 'B97', 1, 'free'),
(824, '645ec93ebee53', 'B98', 1, 'free'),
(825, '645ec93ec8543', 'B99', 1, 'free'),
(826, '645ec93ed30da', 'B100', 1, 'free'),
(827, '645ec93ed9fd5', 'B101', 1, 'free'),
(828, '645ec93ee3143', 'B102', 1, 'free'),
(829, '645ec93ef3453', 'B103', 1, 'free'),
(830, '645ec93f06384', 'B104', 1, 'free'),
(831, '645ec93f0f6e2', 'B105', 1, 'free'),
(832, '645ec93f16766', 'B106', 1, 'free'),
(833, '645ec93f1fadb', 'B107', 1, 'free'),
(834, '645ec93f26a7e', 'B108', 1, 'free'),
(835, '645ec93f37d08', 'B109', 1, 'free'),
(836, '645ec93f3ee5b', 'B110', 1, 'free'),
(837, '645ec93f48366', 'B111', 1, 'free'),
(838, '645ec93f4f0e6', 'B112', 1, 'free'),
(839, '645ec93f584d4', 'B113', 1, 'free'),
(840, '645ec93f5f59e', 'B114', 1, 'free'),
(841, '645ec93f68a5b', 'B115', 1, 'free'),
(842, '645ec93f6fa1f', 'B116', 1, 'free'),
(843, '645ec93f78c67', 'B117', 1, 'free'),
(844, '645ec93f7fb7b', 'B118', 1, 'free'),
(845, '645ec93f88f27', 'B119', 1, 'free'),
(846, '645ec93f8ff54', 'B120', 1, 'free'),
(847, '645ec93f99753', 'B121', 1, 'free'),
(848, '645ec93fa437a', 'B122', 1, 'free'),
(849, '645ec93fba120', 'B123', 1, 'free'),
(850, '645ec93fc8b65', 'B124', 1, 'free'),
(851, '645ec93fd1e10', 'B125', 1, 'free'),
(852, '645ec93fd8fcd', 'B126', 1, 'free'),
(853, '645ec93fe24de', 'B127', 1, 'free'),
(854, '645ec93fed552', 'B128', 1, 'free'),
(855, '645ec940039ed', 'B129', 1, 'free'),
(856, '645ec9400aa0f', 'B130', 1, 'free'),
(857, '645ec94013dc2', 'B131', 1, 'free'),
(858, '645ec9401ad51', 'B132', 1, 'free'),
(859, '645ec94039cf7', 'B133', 1, 'free'),
(860, '645ec94040b75', 'B134', 1, 'free'),
(861, '645ec9404a038', 'B135', 1, 'free'),
(862, '645ec940538df', 'B136', 1, 'free'),
(863, '645ec9405cc5e', 'B137', 1, 'free'),
(864, '645ec94063d07', 'B138', 1, 'free'),
(865, '645ec9406d2a0', 'B139', 1, 'free'),
(866, '645ec940741d0', 'B140', 1, 'free'),
(867, '645ec9407d38c', 'B141', 1, 'free'),
(868, '645ec94084434', 'B142', 1, 'free'),
(869, '645ec9408da31', 'B143', 1, 'free'),
(870, '645ec9409481f', 'B144', 1, 'free'),
(871, '645ec9409db16', 'B145', 1, 'free'),
(872, '645ec940a4da6', 'B146', 1, 'free'),
(873, '645ec940b3c21', 'B147', 1, 'free'),
(874, '645ec940c6648', 'B148', 1, 'free'),
(875, '645ec940cd846', 'B149', 1, 'free'),
(876, '645ec940d6907', 'B150', 1, 'free'),
(877, '645ec940dd9aa', 'B151', 1, 'free'),
(878, '645ec940e6cca', 'B152', 1, 'free'),
(879, '645ec940edf1f', 'B153', 1, 'free'),
(880, '645ec94102e2a', 'B154', 1, 'free'),
(881, '645ec9410a042', 'B155', 1, 'free'),
(882, '645ec94113044', 'B156', 1, 'free'),
(883, '645ec9411a1ee', 'B157', 1, 'free'),
(884, '645ec941234ea', 'B158', 1, 'free'),
(885, '645ec9412a50c', 'B159', 1, 'free'),
(886, '645ec94133611', 'B160', 1, 'free'),
(887, '645ec9413a723', 'B161', 1, 'free'),
(888, '645ec9414390c', 'B162', 1, 'free'),
(889, '645ec9414ad81', 'B163', 1, 'free'),
(890, '645ec94153f52', 'B164', 1, 'free'),
(891, '645ec9415af6e', 'B165', 1, 'free'),
(892, '645ec94164080', 'B166', 1, 'free'),
(893, '645ec9416b332', 'B167', 1, 'free'),
(894, '645ec94174643', 'B168', 1, 'free'),
(895, '645ec9417b6e8', 'B169', 1, 'free'),
(896, '645ec94184b6a', 'B170', 1, 'free'),
(897, '645ec94191feb', 'B171', 1, 'free'),
(898, '645ec94199078', 'B172', 1, 'free'),
(899, '645ec941a2562', 'B173', 1, 'free'),
(900, '645ec941a9612', 'B174', 1, 'free'),
(901, '645ec941c48f7', 'B175', 1, 'free'),
(902, '645ec941d03f8', 'B176', 1, 'free'),
(903, '645ec941d72be', 'B177', 1, 'free'),
(904, '645ec941e0590', 'B178', 1, 'free'),
(905, '645ec941e78e1', 'B179', 1, 'free'),
(906, '645ec941f0c0e', 'B180', 1, 'free'),
(907, '645ec942062f2', 'B181', 1, 'free'),
(908, '645ec942151a1', 'B182', 1, 'free'),
(909, '645ec9421d102', 'B183', 1, 'free'),
(910, '645ec9422412d', 'B184', 1, 'free'),
(911, '645ec9422a59a', 'B185', 1, 'free'),
(912, '645ec942318b8', 'B186', 1, 'free'),
(913, '645ec94237df8', 'B187', 1, 'free'),
(914, '645ec9423edb4', 'B188', 1, 'free'),
(915, '645ec9424588f', 'B189', 1, 'free'),
(916, '645ec9424c950', 'B190', 1, 'free'),
(917, '645ec94252eb6', 'B191', 1, 'free'),
(918, '645ec94259fb5', 'B192', 1, 'free'),
(919, '645ec9426089a', 'B193', 1, 'free'),
(920, '645ec942679c9', 'B194', 1, 'free'),
(921, '645ec9426e0eb', 'B195', 1, 'free'),
(922, '645ec9427509c', 'B196', 1, 'free'),
(923, '645ec9427b924', 'B197', 1, 'free'),
(924, '645ec94282a2c', 'B198', 1, 'free'),
(925, '645ec94289069', 'B199', 1, 'free'),
(926, '645ec94290253', 'B200', 1, 'free');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billingservices`
--
ALTER TABLE `billingservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `corps`
--
ALTER TABLE `corps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fridges`
--
ALTER TABLE `fridges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=927;

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
