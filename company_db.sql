-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2026 at 04:21 PM
-- Server version: 8.0.46
-- PHP Version: 8.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `application_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `resume_file` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`application_id`, `name`, `phone`, `email`, `message`, `resume_file`, `created_at`) VALUES
(1, 'h', 's', 'h', 'math.', 'uploads/1783301649_test.docx', '2026-07-06 01:34:09'),
(2, 'a', 'a', 'a', 'w', 'uploads/1783362501_test.docx', '2026-07-06 18:28:21'),
(3, 'a', 'b', 'c', '', 'uploads/1783387444_test.docx', '2026-07-07 01:24:04'),
(4, 'h', 'h', 'h', '', 'uploads/1783388829_test.docx', '2026-07-07 01:47:09'),
(5, 'a', '123', 'email', 'a', 'uploads/1783560633_test.docx', '2026-07-09 01:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int NOT NULL,
  `student_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parent_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `style` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `student_name`, `parent_name`, `phone`, `email`, `message`, `status`, `created_at`, `style`, `subject`, `user_id`) VALUES
(1, 'h', 'h', 'h', 'h', '', 'pending', '2026-07-05 01:03:58', 'In-Person', 'English', NULL),
(2, 'h', 'h', '1234', '2', 'hi', 'pending', '2026-07-05 01:04:17', 'In-Person', 'Test', NULL),
(3, 'h', 'h', '1234', '2', 'hi', 'pending', '2026-07-05 01:07:22', 'In-Person', 'Test', NULL),
(4, 'h', 's', '1234', '2222', 'abc', 'pending', '2026-07-06 00:34:43', 'In-Person', 'Test', NULL),
(5, 'a', 'b', '1', 'd', 'q', 'pending', '2026-07-06 18:27:42', 'Online', 'Math', NULL),
(6, 'a', 'b', '1', 'd', 'q', 'pending', '2026-07-06 18:27:41', 'Online', 'Math', NULL),
(7, 'a', 'b', 'c', 'd', '', 'pending', '2026-07-07 01:18:21', 'In-Person', 'Robotics', NULL),
(10, 'a', 'b', '1234', 'hi@email', 'hello', 'pending', '2026-07-09 02:55:18', 'In-Person', 'French', 2),
(11, 'a', 'bbbb', 'aaaa', 'wwwd', 'sfqwf', 'pending', '2026-07-09 19:35:23', 'Online', 'Writing', NULL),
(12, 'ab', 'ab', '1234', 'asdaw', 'wfesf', 'pending', '2026-07-09 19:36:41', 'In-Person', 'Essay', NULL),
(13, 'g', 'g', 'g', 'g', 'g', 'pending', '2026-07-09 19:38:27', 'In-Person', 'Summer', NULL),
(14, 'g', 'g', 'g', 'g', 'g', 'pending', '2026-07-09 19:38:43', 'In-Person', 'Summer', NULL),
(15, 'a', 'a', 'a', 'a', 'a', 'pending', '2026-07-09 19:43:27', 'In-Person', 'Learning', NULL),
(16, 'a', 'a', 'h', 'a', 'a', 'pending', '2026-07-09 19:44:55', 'In-Person', 'Essay', NULL),
(17, 'a', 'a', 'a', 'a', 'a', 'pending', '2026-07-16 17:48:42', 'Online', 'Chemistry', 2),
(18, 'a', 'a', 'a', 'a', 'a', 'pending', '2026-07-16 17:51:15', 'In-Person', 'Test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `name`) VALUES
(1, 'Math'),
(2, 'English'),
(3, 'French'),
(4, 'Biology'),
(5, 'Chemistry'),
(6, 'Physics'),
(7, 'Coding'),
(8, 'History'),
(9, 'Geography'),
(10, 'Reading'),
(11, 'Writing'),
(12, 'Robotics'),
(13, 'Exam Preparation'),
(14, 'Test Preparation'),
(15, 'Homework Help'),
(16, 'Essay Writing'),
(17, 'Summer Learning Plan'),
(18, 'College and University Preparation'),
(19, 'Learning and studying Coaching'),
(20, 'STEM Program');

-- --------------------------------------------------------

--
-- Table structure for table `service_ratings`
--

CREATE TABLE `service_ratings` (
  `rating_id` int NOT NULL,
  `service_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `submission_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_ratings`
--

INSERT INTO `service_ratings` (`rating_id`, `service_name`, `rating`, `message`, `submission_date`) VALUES
(1, 'English', 3, 'a', '2026-07-07 00:14:28'),
(2, 'English', 2, 'abc.', '2026-07-08 16:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `student_progress`
--

CREATE TABLE `student_progress` (
  `progress_id` int NOT NULL,
  `student_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `progress_notes` text COLLATE utf8mb4_general_ci NOT NULL,
  `session_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_progress`
--

INSERT INTO `student_progress` (`progress_id`, `student_name`, `subject`, `progress_notes`, `session_date`) VALUES
(1, 'a', 'Biology', 'b', '2026-07-08 00:02:41'),
(2, 'b', 'qwe', 'ghjk.', '2026-07-09 01:11:48'),
(3, 'b', 'French', 'ghd.', '2026-07-09 01:11:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `active` int DEFAULT '1',
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `active`, `email`) VALUES
(1, 'admin', '$2y$10$jFE.cFOraAtq9mPkUlFdturn728CmWrmy.rBK5/TjEtDIehm3aDlK', 1, NULL),
(2, 'aaa', '$2y$10$tWaET5EEnrQK06bNHkqscOvWDw5zj0c4li98DwXX.bk0gI0PWFsQy', 1, '123@email.com'),
(9, 'hello', '$2y$10$BgKoMO69DG5L/K29KSYBoe6SPuoT6nWRA7p/SR/iniko1G.QEZ5R2', 1, '1@hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_ratings`
--
ALTER TABLE `service_ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `student_progress`
--
ALTER TABLE `student_progress`
  ADD PRIMARY KEY (`progress_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `application_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service_ratings`
--
ALTER TABLE `service_ratings`
  MODIFY `rating_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_progress`
--
ALTER TABLE `student_progress`
  MODIFY `progress_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
