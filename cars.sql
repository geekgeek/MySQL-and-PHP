-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2017 at 01:11 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2158264_typhousdbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(6) UNSIGNED NOT NULL,
  `brandname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `carname` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brandname`, `carname`) VALUES
(1, 'toyota', 'nr1'),
(2, 'bmw', 'nr2'),
(3, 'audi', 'nr3'),
(4, 'tesla', 'nr4'),
(5, 'volvo', 'nr5'),
(6, 'skoda', 'nr6'),
(7, 'nissan', 'nr7'),
(8, '2017-07-05 22:36:12', 'z3'),
(9, '2017-07-05 23:00:11', 'z3'),
(10, '2017-07-05 23:10:32', 'z3'),
(11, '2017-07-05 23:30:12', 'z3'),
(12, '2017-07-05 23:50:10', 'z3'),
(13, '2017-07-06 00:10:06', 'z3'),
(14, '2017-07-06 00:20:07', 'z3'),
(15, '2017-07-06 00:30:06', 'z3'),
(16, '2017-07-06 00:40:07', 'z3'),
(17, '2017-07-06 00:50:11', 'z3'),
(18, '2017-07-06 01:00:13', 'z3'),
(19, '2017-07-06 01:20:12', 'z3'),
(20, '2017-07-06 01:30:06', 'z3'),
(21, '2017-07-06 01:40:06', 'z3'),
(22, '2017-07-06 01:50:32', 'z3'),
(23, '2017-07-06 02:00:03', 'z3'),
(24, '2017-07-06 02:10:09', 'z3'),
(25, '2017-07-06 02:20:02', 'z3'),
(26, '2017-07-06 02:30:05', 'z3'),
(27, '2017-07-06 02:40:10', 'z3'),
(28, '2017-07-06 02:50:10', 'z3'),
(29, '2017-07-06 03:00:10', 'z3'),
(30, '2017-07-06 03:10:06', 'z3'),
(31, '2017-07-06 03:20:06', 'z3'),
(32, '2017-07-06 03:30:34', 'z3'),
(33, '2017-07-06 03:50:13', 'z3'),
(34, '2017-07-06 04:00:07', 'z3'),
(35, '2017-07-06 04:10:09', 'z3'),
(36, '2017-07-06 04:20:06', 'z3'),
(37, '2017-07-06 04:30:07', 'z3'),
(38, '2017-07-06 04:40:05', 'z3'),
(39, '2017-07-06 04:50:10', 'z3'),
(40, '2017-07-06 05:00:07', 'z3'),
(41, '2017-07-06 05:10:06', 'z3'),
(42, '2017-07-06 05:20:06', 'z3'),
(43, '2017-07-06 05:40:09', 'z3'),
(44, '2017-07-06 05:50:02', 'z3'),
(45, '2017-07-06 06:10:06', 'z3'),
(46, '2017-07-06 06:20:07', 'z3'),
(47, '2017-07-06 06:30:12', 'z3'),
(48, '2017-07-06 06:40:06', 'z3'),
(49, '2017-07-06 06:50:10', 'z3'),
(50, '2017-07-06 07:00:04', 'z3'),
(51, '2017-07-06 07:10:06', 'z3'),
(52, '2017-07-06 07:20:12', 'z3'),
(53, '2017-07-06 07:30:08', 'z3'),
(54, '2017-07-06 07:40:10', 'z3'),
(55, '2017-07-06 07:50:10', 'z3'),
(56, '2017-07-06 08:00:11', 'z3'),
(57, '2017-07-06 08:10:10', 'z3'),
(58, '2017-07-06 08:20:34', 'z3'),
(59, '2017-07-06 08:30:13', 'z3'),
(60, '2017-07-06 08:40:33', 'z3'),
(61, '2017-07-06 08:50:06', 'z3'),
(62, '2017-07-06 09:00:11', 'z3'),
(63, '2017-07-06 09:20:10', 'z3'),
(64, '2017-07-06 09:30:03', 'z3'),
(65, '2017-07-06 09:40:11', 'z3'),
(66, '2017-07-06 10:00:10', 'z3'),
(67, '2017-07-06 10:10:12', 'z3'),
(68, '2017-07-06 10:20:07', 'z3'),
(69, '2017-07-06 10:30:06', 'z3'),
(70, '2017-07-06 10:40:09', 'z3'),
(71, '2017-07-06 11:00:12', 'z3'),
(72, '2017-07-06 11:10:33', 'z3'),
(73, '2017-07-06 11:20:31', 'z3'),
(74, '2017-07-06 11:30:11', 'z3'),
(75, '2017-07-06 11:40:06', 'z3'),
(76, '2017-07-06 11:50:10', 'z3'),
(77, '2017-07-06 12:00:07', 'z3'),
(78, '2017-07-06 12:10:13', 'z3'),
(79, '2017-07-06 12:20:32', 'z3'),
(80, '2017-07-06 12:30:34', 'z3'),
(81, '2017-07-06 12:40:36', 'z3'),
(82, '2017-07-06 12:50:36', 'z3'),
(83, '2017-07-06 13:00:42', 'z3'),
(84, 'bmw', 'z3'),
(85, 'bmw', 'z3'),
(86, 'bmw', 'z3'),
(87, 'bmw', 'z3'),
(88, 'bmw', 'z3'),
(89, 'bmw', 'z3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
