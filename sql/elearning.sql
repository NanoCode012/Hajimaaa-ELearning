-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2021 at 10:58 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--
CREATE DATABASE IF NOT EXISTS `elearning` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `elearning`;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--
-- Creation: Apr 11, 2021 at 10:28 AM
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `assignments`:
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--
-- Creation: Apr 11, 2021 at 10:16 AM
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_code` varchar(10) DEFAULT NULL,
  `class_instructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `class`:
--

-- --------------------------------------------------------

--
-- Table structure for table `class_enrolled`
--
-- Creation: Apr 11, 2021 at 10:17 AM
--

DROP TABLE IF EXISTS `class_enrolled`;
CREATE TABLE `class_enrolled` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `class_enrolled`:
--   `class_id`
--       `class` -> `class_id`
--   `user_id`
--       `users` -> `user_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--
-- Creation: Apr 11, 2021 at 10:22 AM
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `assignments_id` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `files`:
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--
-- Creation: Apr 11, 2021 at 10:21 AM
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `posts`:
--

-- --------------------------------------------------------

--
-- Table structure for table `student_files`
--
-- Creation: Apr 11, 2021 at 10:27 AM
--

DROP TABLE IF EXISTS `student_files`;
CREATE TABLE `student_files` (
  `student_file_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `file_path` text NOT NULL,
  `time_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `student_files`:
--   `student_id`
--       `users` -> `user_id`
--   `assignment_id`
--       `assignments` -> `assignment_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 11, 2021 at 09:32 AM
-- Last update: Apr 11, 2021 at 09:32 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_type` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_enrolled`
--
ALTER TABLE `class_enrolled`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `student_files`
--
ALTER TABLE `student_files`
  ADD PRIMARY KEY (`student_file_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_enrolled`
--
ALTER TABLE `class_enrolled`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_files`
--
ALTER TABLE `student_files`
  MODIFY `student_file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_enrolled`
--
ALTER TABLE `class_enrolled`
  ADD CONSTRAINT `class_enrolled_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_enrolled_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `student_files`
--
ALTER TABLE `student_files`
  ADD CONSTRAINT `student_files_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `student_files_ibfk_2` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;