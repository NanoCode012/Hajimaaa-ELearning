-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 08:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `gradeass`
--

CREATE TABLE `gradeass` (
  `student_file_id` int(11) NOT NULL,
  `marks` int(3) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gradeass`
--

INSERT INTO `gradeass` (`student_file_id`, `marks`, `comments`) VALUES
(888, 8, 'hsghsgijk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gradeass`
--
ALTER TABLE `gradeass`
  ADD KEY `student_file_id` (`student_file_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gradeass`
--
ALTER TABLE `gradeass`
  ADD CONSTRAINT `gradeass_ibfk_1` FOREIGN KEY (`student_file_id`) REFERENCES `student_files` (`student_file_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
