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
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `upazila_id` int(11) DEFAULT NULL,
  `union_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `division_id`, `district_id`, `upazila_id`, `union_id`, `name`, `bn_name`, `created_at`, `updated_at`) VALUES
(1, 6, 0, NULL, NULL, 'Adabor', NULL, '2020-06-27 06:47:25', '2020-06-28 02:54:51'),
(2, 6, 0, 0, 0, 'Azampur', NULL, '2020-06-28 02:57:22', '2020-06-28 02:57:22'),
(3, 6, 0, NULL, NULL, 'Badda', NULL, '2020-06-27 06:48:06', '2020-06-28 02:58:11'),
(4, 6, 0, NULL, NULL, 'Bangshal', NULL, '2020-06-27 06:48:41', '2020-06-28 02:58:22'),
(5, 6, 0, NULL, NULL, 'Biman Bandar', NULL, '2020-06-27 06:49:34', '2020-06-28 02:58:28'),
(6, 6, 0, NULL, NULL, 'Cantonment', NULL, '2020-06-27 06:50:42', '2020-06-28 02:58:48'),
(7, 6, 0, NULL, NULL, 'Chawkbazar', NULL, '2020-06-27 06:51:41', '2020-06-28 02:58:55'),
(8, 6, 0, NULL, NULL, 'Dakshinkhan', NULL, '2020-06-27 06:52:11', '2020-06-28 02:59:03'),
(9, 6, 0, NULL, NULL, 'Darus Salam', NULL, '2020-06-27 06:53:04', '2020-06-28 02:59:27'),
(10, 6, 0, NULL, NULL, 'Demra', NULL, '2020-06-27 06:53:20', '2020-06-28 02:59:38'),
(11, 6, 0, NULL, NULL, 'Dhanmondi', NULL, '2020-06-27 06:53:38', '2020-06-28 02:59:43'),
(12, 6, 0, NULL, NULL, 'Gendaria', NULL, '2020-06-27 06:54:20', '2020-06-28 03:00:03'),
(13, 6, 0, NULL, NULL, 'Gulshan', NULL, '2020-06-27 06:54:42', '2020-06-28 03:00:13'),
(14, 6, 0, NULL, NULL, 'Hazaribagh', NULL, '2020-06-27 08:50:34', '2020-06-28 03:00:19'),
(15, 6, 0, NULL, NULL, 'Jatrabari', NULL, '2020-06-27 08:51:09', '2020-06-28 03:00:30'),
(16, 6, 0, NULL, NULL, 'Kadamtali', NULL, '2020-06-27 08:51:47', '2020-06-28 03:01:13'),
(17, 6, 0, NULL, NULL, 'Kafrul', NULL, '2020-06-27 08:52:02', '2020-06-28 03:01:25'),
(18, 6, 0, NULL, NULL, 'Kalabagan', NULL, '2020-06-27 08:52:41', '2020-06-28 03:02:41'),
(19, 6, 0, NULL, NULL, 'Kamrangirchar', NULL, '2020-06-27 08:53:01', '2020-06-28 03:02:48'),
(20, 6, 0, NULL, NULL, 'Keraniganj', NULL, '2020-06-27 08:53:38', '2020-06-28 03:03:10'),
(21, 6, 0, NULL, NULL, 'Khilgaon', NULL, '2020-06-27 08:53:54', '2020-06-28 03:03:16'),
(22, 6, 0, NULL, NULL, 'Khilkhet', NULL, '2020-06-27 08:54:32', '2020-06-28 03:03:20'),
(23, 6, 0, NULL, NULL, 'Kotwali', NULL, '2020-06-28 03:03:53', '2020-06-28 03:03:53'),
(24, 6, 0, NULL, NULL, 'Lalbagh', NULL, '2020-06-27 08:54:59', '2020-06-28 03:05:25'),
(25, 6, 0, NULL, NULL, 'Mirpur', NULL, '2020-06-27 08:55:25', '2020-06-28 03:05:31'),
(26, 6, 0, NULL, NULL, 'Mohammadpur', NULL, '2020-06-27 08:55:51', '2020-06-28 03:05:53'),
(27, 6, 0, NULL, NULL, 'Motijheel', NULL, '2020-06-27 08:56:30', '2020-06-28 03:06:07'),
(28, 6, 0, NULL, NULL, 'New market', NULL, '2020-06-27 08:56:57', '2020-06-28 03:06:13'),
(29, 6, 0, NULL, NULL, 'Pallabi', NULL, '2020-06-27 08:57:28', '2020-06-28 03:06:28'),
(30, 6, 0, NULL, NULL, 'Paltan', NULL, '2020-06-27 08:57:45', '2020-06-28 03:06:37'),
(31, 6, 0, 0, 0, 'Panthapath', NULL, '2020-06-28 03:07:14', '2020-06-28 03:07:14'),
(32, 6, 0, NULL, NULL, 'Ramna', NULL, '2020-06-27 08:57:58', '2020-06-28 03:07:56'),
(33, 6, 0, NULL, NULL, 'Rampura', NULL, '2020-06-27 08:58:28', '2020-06-28 03:08:26'),
(34, 6, 0, NULL, NULL, 'Sabujbagh', NULL, '2020-06-27 08:58:48', '2020-06-28 03:08:35'),
(35, 6, 0, 0, 0, 'Shah Ali', NULL, '2020-06-28 03:09:31', '2020-06-28 03:09:31'),
(36, 6, 0, NULL, NULL, 'Savar', NULL, '2020-06-27 08:59:25', '2020-06-27 15:11:49'),
(37, 6, 0, NULL, NULL, 'Shahbagh', NULL, '2020-06-27 09:00:05', '2020-06-27 15:11:49'),
(38, 6, 0, NULL, NULL, 'Sher-e-bangla Nagar', NULL, '2020-06-27 09:01:02', '2020-06-27 15:11:49'),
(39, 6, 0, NULL, NULL, 'Shympur', NULL, '2020-06-27 09:01:38', '2020-06-27 15:11:49'),
(40, 6, 0, NULL, NULL, 'Sutrapur', NULL, '2020-06-27 09:01:53', '2020-06-27 15:11:49'),
(41, 6, 0, NULL, NULL, 'Tejgaon', NULL, '2020-06-27 09:02:20', '2020-06-27 15:11:49'),
(42, 6, 0, NULL, NULL, 'Tejgaon Industrial Area', NULL, '2020-06-27 09:02:50', '2020-06-27 15:11:49'),
(43, 6, 0, NULL, NULL, 'Turag', NULL, '2020-06-27 09:03:18', '2020-06-27 15:11:49'),
(44, 6, 0, NULL, NULL, 'Uttara', NULL, '2020-06-27 09:03:41', '2020-06-27 15:11:49'),
(45, 6, 0, NULL, NULL, 'Uttar Khan', NULL, '2020-06-27 09:04:00', '2020-06-27 15:11:49'),
(46, 6, 0, NULL, NULL, 'Vatara', NULL, '2020-06-27 21:14:07', '2020-06-28 03:15:53'),
(47, 6, 0, NULL, NULL, 'Wari', NULL, '2020-06-27 21:14:25', '2020-06-28 03:16:00'),
(48, 6, 0, NULL, NULL, 'Gazipur', NULL, '2020-06-27 21:32:58', '2020-06-27 21:32:58'),
(49, 6, 0, NULL, NULL, 'Kishoreganj', NULL, '2020-06-27 21:33:35', '2020-06-27 21:33:35'),
(50, 6, 0, NULL, NULL, 'Manikganj', NULL, '2020-06-27 21:33:56', '2020-06-27 21:33:56'),
(51, 6, 0, NULL, NULL, 'Munshiganj', NULL, '2020-06-27 21:34:26', '2020-06-27 21:34:26'),
(52, 6, 0, NULL, NULL, 'Narayanganj', NULL, '2020-06-27 21:34:43', '2020-06-27 21:34:43'),
(53, 6, 0, NULL, NULL, 'Narsingdi', NULL, '2020-06-27 21:35:06', '2020-06-27 21:35:06'),
(54, 6, 0, NULL, NULL, 'Tangail', NULL, '2020-06-27 21:35:56', '2020-06-27 21:35:56'),
(55, 6, 0, NULL, NULL, 'Faridpur', NULL, '2020-06-27 21:36:42', '2020-06-27 21:36:42'),
(56, 6, 0, NULL, NULL, 'Gopalganj', NULL, '2020-06-27 21:37:15', '2020-06-27 21:37:15'),
(57, 6, 0, NULL, NULL, 'Madaripur', NULL, '2020-06-27 21:37:44', '2020-06-27 21:37:44'),
(58, 6, 0, NULL, NULL, 'Rajbari', NULL, '2020-06-27 21:38:11', '2020-06-27 21:38:11'),
(59, 6, 0, NULL, NULL, 'Shariatpur', NULL, '2020-06-27 21:38:43', '2020-06-27 21:38:43'),
(60, 4, 0, NULL, NULL, 'Barisal', NULL, '2020-06-27 22:42:39', '2020-06-27 22:42:39'),
(61, 4, 0, NULL, NULL, 'Barguna', NULL, '2020-06-27 22:42:56', '2020-06-27 22:42:56'),
(62, 4, 0, NULL, NULL, 'Bhola', NULL, '2020-06-27 22:43:13', '2020-06-27 22:43:13'),
(63, 4, 0, NULL, NULL, 'Jhalokati', NULL, '2020-06-27 22:43:31', '2020-06-27 22:43:31'),
(64, 4, 0, NULL, NULL, 'Patuakhali', NULL, '2020-06-27 22:43:57', '2020-06-27 22:43:57'),
(65, 4, 0, NULL, NULL, 'Pirojpur', NULL, '2020-06-27 22:44:15', '2020-06-27 22:44:15'),
(66, 1, 0, NULL, NULL, 'Brahmanbaria', NULL, '2020-06-27 22:45:16', '2020-06-27 22:45:16'),
(67, 1, 0, NULL, NULL, 'Comilla', NULL, '2020-06-27 22:45:39', '2020-06-27 22:45:39'),
(68, 1, 0, NULL, NULL, 'Chandpur', NULL, '2020-06-27 22:46:07', '2020-06-27 22:46:07'),
(69, 1, 0, NULL, NULL, 'Lakshmipur', NULL, '2020-06-27 22:46:23', '2020-06-27 22:46:23'),
(70, 1, 0, NULL, NULL, 'Noakhali', NULL, '2020-06-27 22:46:52', '2020-06-27 22:46:52'),
(71, 1, 0, NULL, NULL, 'Feni', NULL, '2020-06-27 22:47:16', '2020-06-27 22:47:16'),
(72, 1, 0, NULL, NULL, 'Khagrachhari', NULL, '2020-06-27 22:47:44', '2020-06-27 22:47:44'),
(73, 1, 0, NULL, NULL, 'Rangamati', NULL, '2020-06-27 22:48:05', '2020-06-27 22:48:05'),
(74, 1, 0, NULL, NULL, 'Bandarban', NULL, '2020-06-27 22:48:23', '2020-06-27 22:48:23'),
(75, 1, 0, NULL, NULL, 'Chattagram', NULL, '2020-06-27 22:48:54', '2020-06-27 22:48:54'),
(76, 1, 0, NULL, NULL, 'Cox\'s Bazar', NULL, '2020-06-27 22:49:18', '2020-06-27 22:49:18'),
(77, 3, 0, NULL, NULL, 'Bagerhat', NULL, '2020-06-27 22:50:29', '2020-06-27 22:50:29'),
(78, 3, 0, NULL, NULL, 'Chuadanga', NULL, '2020-06-27 22:50:43', '2020-06-27 22:50:43'),
(79, 3, 0, NULL, NULL, 'Jessore', NULL, '2020-06-27 22:50:57', '2020-06-27 22:50:57'),
(80, 3, 0, NULL, NULL, 'Jhenaidah', NULL, '2020-06-27 22:51:14', '2020-06-27 22:51:14'),
(81, 3, 0, NULL, NULL, 'Khulna', NULL, '2020-06-27 22:51:33', '2020-06-27 22:51:33'),
(82, 3, 0, NULL, NULL, 'Kushtia', NULL, '2020-06-27 22:51:45', '2020-06-27 22:51:45'),
(83, 3, 0, NULL, NULL, 'Magura', NULL, '2020-06-27 22:51:59', '2020-06-27 22:51:59'),
(84, 3, 0, NULL, NULL, 'Meherpur', NULL, '2020-06-27 22:52:18', '2020-06-27 22:52:18'),
(85, 3, 0, NULL, NULL, 'Narail', NULL, '2020-06-27 22:52:36', '2020-06-27 22:52:36'),
(86, 3, 0, NULL, NULL, 'Satkhira', NULL, '2020-06-27 22:52:51', '2020-06-27 22:52:51'),
(87, 8, 0, NULL, NULL, 'Mymensingh', NULL, '2020-06-27 22:53:38', '2020-06-27 22:53:38'),
(88, 8, 0, NULL, NULL, 'Netrokona', NULL, '2020-06-27 22:53:53', '2020-06-27 22:53:53'),
(89, 8, 0, NULL, NULL, 'Jamalpur', NULL, '2020-06-27 22:54:12', '2020-06-27 22:54:12'),
(90, 8, 0, NULL, NULL, 'Sherpur', NULL, '2020-06-27 22:54:27', '2020-06-27 22:54:27'),
(91, 2, 0, NULL, NULL, 'Bogura', NULL, '2020-06-27 22:55:32', '2020-06-27 22:55:32'),
(92, 2, 0, NULL, NULL, 'Chapainawabganj', NULL, '2020-06-27 22:55:49', '2020-06-27 22:55:49'),
(93, 2, 0, NULL, NULL, 'Joypurhat', NULL, '2020-06-27 22:56:06', '2020-06-27 22:56:06'),
(94, 2, 0, NULL, NULL, 'Naogaon', NULL, '2020-06-27 22:56:19', '2020-06-27 22:56:19'),
(95, 2, 0, NULL, NULL, 'Natore', NULL, '2020-06-27 22:56:32', '2020-06-27 22:56:32'),
(96, 2, 0, NULL, NULL, 'Pabna', NULL, '2020-06-27 22:56:46', '2020-06-27 22:56:46'),
(97, 2, 0, NULL, NULL, 'Rajshahi', NULL, '2020-06-27 22:56:58', '2020-06-27 22:56:58'),
(98, 2, 0, NULL, NULL, 'Sirajgonj', NULL, '2020-06-27 22:57:08', '2020-06-27 22:57:08'),
(99, 7, 0, NULL, NULL, 'Rangpur', NULL, '2020-06-27 22:57:52', '2020-06-27 22:57:52'),
(100, 7, 0, NULL, NULL, 'Dinajpur', NULL, '2020-06-27 22:58:07', '2020-06-27 22:58:07'),
(101, 7, 0, NULL, NULL, 'Kurigram', NULL, '2020-06-27 22:58:20', '2020-06-27 22:58:20'),
(102, 7, 0, NULL, NULL, 'Nilphamari', NULL, '2020-06-27 22:58:35', '2020-06-27 22:58:35'),
(103, 7, 0, NULL, NULL, 'Gaibandha', NULL, '2020-06-27 22:58:47', '2020-06-27 22:58:47'),
(104, 7, 0, NULL, NULL, 'Thakurgaon', NULL, '2020-06-27 22:59:04', '2020-06-27 22:59:04'),
(105, 7, 0, NULL, NULL, 'Panchagarh', NULL, '2020-06-27 22:59:19', '2020-06-27 22:59:19'),
(106, 7, 0, NULL, NULL, 'Lalmonirhat', NULL, '2020-06-27 22:59:36', '2020-06-27 22:59:36'),
(107, 5, 0, NULL, NULL, 'Habiganj', NULL, '2020-06-27 23:00:16', '2020-06-27 23:00:16'),
(108, 5, 0, NULL, NULL, 'Moulvibazar', NULL, '2020-06-27 23:00:30', '2020-06-27 23:00:30'),
(109, 5, 0, NULL, NULL, 'Sunamganj', NULL, '2020-06-27 23:00:44', '2020-06-27 23:00:44'),
(110, 5, 0, NULL, NULL, 'Sylhet', NULL, '2020-06-27 23:00:57', '2020-06-27 23:00:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `upazila_id` (`upazila_id`),
  ADD KEY `union_id` (`union_id`),
  ADD KEY `division_id` (`division_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
