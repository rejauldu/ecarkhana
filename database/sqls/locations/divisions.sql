-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 02:24 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onbiponi`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(1) NOT NULL,
  `name` varchar(25) NOT NULL,
  `bn_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `url`, `updated_at`, `created_at`) VALUES
(1, 'Chattagram', 'চট্টগ্রাম', 'www.chittagongdiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29'),
(2, 'Rajshahi', 'রাজশাহী', 'www.rajshahidiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29'),
(3, 'Khulna', 'খুলনা', 'www.khulnadiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29'),
(4, 'Barisal', 'বরিশাল', 'www.barisaldiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29'),
(5, 'Sylhet', 'সিলেট', 'www.sylhetdiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29'),
(6, 'Dhaka', 'ঢাকা', 'www.dhakadiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29'),
(7, 'Rangpur', 'রংপুর', 'www.rangpurdiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29'),
(8, 'Mymensingh', 'ময়মনসিংহ', 'www.mymensinghdiv.gov.bd', '2020-01-06 17:51:29', '2020-01-06 17:51:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
