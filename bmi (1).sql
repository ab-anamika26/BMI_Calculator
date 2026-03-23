-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 05:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bmi_records`
--

CREATE TABLE `bmi_records` (
  `id` int(11) NOT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `calculated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi_records`
--

INSERT INTO `bmi_records` (`id`, `user_gender`, `weight`, `height`, `bmi`, `category`, `calculated_at`, `user_id`) VALUES
(5, 'female', 45, 150, 20, 'normalweight', '2025-06-18 16:55:55', 2),
(6, 'male', 60, 160, 23.44, 'normalweight', '2025-06-18 17:07:47', 4),
(8, 'male', 62, 160, 24.22, 'normalweight', '2025-06-19 05:28:18', 4),
(9, 'female', 50, 160, 19.53, 'normalweight', '2025-06-19 06:26:15', 8),
(10, 'female', 40, 160, 15.62, 'underweight', '2025-06-19 06:28:54', 8),
(11, 'male', 85, 171, 29.07, 'overweight', '2025-06-22 17:30:31', 9),
(13, 'female', 47, 162, 17.91, 'underweight', '2025-06-23 07:25:00', 8),
(14, 'female', 55, 155, 22.89, 'normalweight', '2025-06-23 09:00:20', 11),
(15, 'female', 38, 157, 15.42, 'underweight', '2025-06-23 09:14:24', 12);

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `email` varchar(255) DEFAULT NULL,
  `login_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_logs`
--

INSERT INTO `login_logs` (`log_id`, `user_id`, `user_type`, `email`, `login_date`) VALUES
(1, 4, 'user', 'abhi@gmail.com', '2025-06-18 16:06:39'),
(2, 1, 'user', 'athira12@gmail.com', '2025-06-18 16:52:19'),
(3, 2, 'user', 'amrutha@gmail.com', '2025-06-18 16:55:43'),
(4, 4, 'user', 'abhi@gmail.com', '2025-06-18 17:03:33'),
(6, 8, 'user', 'abhitha@gmail.com', '2025-06-19 06:25:48'),
(7, 9, 'user', 'ram@gmail.com', '2025-06-22 17:09:01'),
(10, 8, 'user', 'abhitha@gmail.com', '2025-06-23 07:21:07'),
(11, 8, 'user', 'abhitha@gmail.com', '2025-06-23 07:21:52'),
(12, 8, 'user', 'abhitha@gmail.com', '2025-06-23 07:23:39'),
(13, 11, 'user', 'anarghaa767@gmail.com', '2025-06-23 07:37:55'),
(14, 11, 'user', 'anarghaa767@gmail.com', '2025-06-23 08:40:41'),
(15, 12, 'user', 'adithyashaiju2005@gmail.com', '2025-06-23 09:13:52'),
(16, 9, 'user', 'ram@gmail.com', '2025-06-24 15:25:04'),
(17, 9, 'user', 'ram@gmail.com', '2025-06-24 15:30:54'),
(18, 9, 'user', 'ram@gmail.com', '2025-06-24 15:52:58'),
(19, 9, 'user', 'ram@gmail.com', '2025-06-24 15:59:03'),
(20, 9, 'user', 'ram@gmail.com', '2025-06-24 16:04:21'),
(21, 9, 'user', 'ram@gmail.com', '2025-06-24 16:09:49'),
(22, 9, 'user', 'ram@gmail.com', '2025-06-24 16:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `full_name`, `dob`, `age`, `mobile_number`, `email`, `password`, `height`, `weight`, `gender`, `city`, `address`, `created_at`, `user_type`) VALUES
(1, 'Athira K J', '2003-12-23', 20, '8063521458', 'athira12@gmail.com', '$2y$10$hYKBpCF4ajNRtVK6cy4m0.N.231K0FfDkwlJ/KlW0aL5Wytyttn3K', 161.00, 53.00, 'female', 'Kuttippuram', 'Valiyaparambil house,Thrissur', '2025-06-11 13:13:30', 'user'),
(2, 'Amrutha V', '1999-07-12', 25, '9087231330', 'amrutha@gmail.com', '$2y$10$YUDxhK4aprh3IeIO4K0lg.Wc.kt8Yww0hb9jdqrv6fQk6modKc0xi', 155.00, 78.00, 'female', 'Thriprayar', 'Chirakkal,Thriprayar', '2025-06-11 13:32:31', 'user'),
(4, 'Abhi', '2005-11-21', 19, '9745322156', 'abhi@gmail.com', '$2y$10$seVndcZBHWDRXRCmLlKYjO2J40sIgDQCdWDxH84Ck06wEYbR/SINq', 180.00, 70.00, 'male', 'Edappal', 'Pulikkal', '2025-06-14 12:58:29', 'user'),
(8, 'Abitha S', '2002-12-03', 22, '7684453210', 'abhitha@gmail.com', '$2y$10$ULjypSbbbU2SxZjZFY99E.WOtIrweKBCgrJ6nAVUnp7aJIfhTiIF.', 160.00, 50.00, 'female', 'Kochi', 'Pattikkara,Ernamkulam', '2025-06-19 06:24:47', 'user'),
(9, 'Ram P S', '1978-01-04', 47, '9875543211', 'ram@gmail.com', '$2y$10$SS2MsBYRnU6.yzQ5.Gb/4OiYgZe6FgQWapcz4HXcCi7sGpcX9v.6i', 171.00, 85.00, 'male', 'Mundur', 'Manakkal,Thrissur', '2025-06-22 17:05:54', 'user'),
(11, 'Anargha vp', '2005-07-31', 19, '7592015169', 'anarghaa767@gmail.com', '$2y$10$J0loL/CCaw9JE2WktJax4u5nwypc.dWf5GEihsj0m9LSNPAXONqKi', 155.00, 55.00, 'female', 'changaramkulam', 'Vattekkattu,changarakulam', '2025-06-23 07:33:06', 'user'),
(12, 'Adithya Shaiju', '2005-06-11', 20, '9061200919', 'adithyashaiju2005@gmail.com', '$2y$10$5n5G5yh8tdjnHM/3YJ3Zg.0ld99TCMG2PBeuMZhkrGDG1R1jp5gxm', 157.00, 38.00, 'female', 'Cherpu,Thriprayar', 'Pottekkattu house,PO Pazhuvil west', '2025-06-23 09:13:34', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmi_records`
--
ALTER TABLE `bmi_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmi_records`
--
ALTER TABLE `bmi_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bmi_records`
--
ALTER TABLE `bmi_records`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registrations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
